<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\util\Constants;

use com\zoho\api\logger\SDKLogger;

/**
 * This class is to process the upload file and stream.
 */
class FormDataConverter extends Converter
{
    private $_uniqueValuesMap = array();
    
    public function __construct($commonAPIHandler)
    {
        parent::__construct($commonAPIHandler);
    }

    public function formRequest($requestInstance, $pack, $instanceNumber, $classMemberDetail = NULL)
    {
        $classDetail = Initializer::$jsonDetails[$pack];
        
        $reflector = new \ReflectionClass($requestInstance);
        
        $request = array();
        
        foreach ($classDetail as $memberName => $memberDetail)
        {
            $modification = null;
            
            if ((array_key_exists(Constants::READ_ONLY, $memberDetail) && ($memberDetail[Constants::READ_ONLY])) || ! array_key_exists(Constants::NAME, $memberDetail))
            {
                continue;
            }
            
            try
            {
                $modification = $reflector->getMethod(Constants::IS_KEY_MODIFIED)->invoke($requestInstance, $memberDetail[Constants::NAME]);
            }
            catch (\Exception $ex)
            {
                throw new SDKException(Constants::EXCEPTION_IS_KEY_MODIFIED, null, null, $ex);
            }

            // check required
            if ($modification == null && $modification == 0 && array_key_exists(Constants::REQUIRED, $memberDetail) && (bool) $memberDetail[Constants::REQUIRED])
            {
                throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR . $memberName);
            }
            
            $field = $reflector->getProperty($memberName);
            
            $field->setAccessible(true);
            
            $fieldValue = $field->getValue($requestInstance);
            
            if ($modification != null && $modification != 0 && $this->valueChecker(get_class($requestInstance), $memberName, $memberDetail, $fieldValue, $this->_uniqueValuesMap, $instanceNumber))
            {
                if ($fieldValue != null)
                {
                    $keyName = $memberDetail[Constants::NAME];
                    
                    $type = $memberDetail[Constants::TYPE];
                    
                    if ($type == Constants::LIST_NAMESPACE)
                    {
                        $request[$keyName] = $this->setJSONArray($fieldValue, $memberDetail);
                    }
                    else if ($type == Constants::MAP_NAMESPACE)
                    {
                        $request[$keyName] = $this->setJSONObject($fieldValue, $memberDetail);
                    }
                    else if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail))
                    {
                        $request[$keyName] = $this->formRequest($fieldValue, $memberDetail[Constants::STRUCTURE_NAME], 1, $memberDetail);
                    }
                    else
                    {
                        $request[$keyName] = $fieldValue;
                    }
                }
            }
        }
        
        return $request;
    }

    
    public function appendToRequest(&$requestBase, $requestObject)
    {
        if(is_array($requestObject))
        {
            $data = array();

            foreach ($requestObject as $key => $value)
            {
                if(is_array($value))
                {
                    $keysDetail = $value;
                    
                    $lineEnd = "\r\n";
                    
                    $hypen = "--";
                    
                    $date = new \DateTime();
                    
                    $data = utf8_encode($lineEnd);
                    
                    $current_time_long = $date->getTimestamp();
                    
                    $boundaryStart = utf8_encode($hypen.(string)$current_time_long.$lineEnd);
                    
                    for ($i = 0; $i < sizeof($keysDetail); $i++)
                    {
                        $fileObject = $keysDetail[$i];
                        
                        if($fileObject instanceof StreamWrapper)
                        {
                            $fileName = $fileObject->getName();
                            
                            $fileData = $fileObject->getStream();
                            
                            $data = $data . $boundaryStart;
                            
                            $contentDisp = "Content-Disposition: form-data; name=\"".$key."\";filename=\"".$fileName."\"".$lineEnd.$lineEnd;
                            
                            $data = $data.utf8_encode($contentDisp);
                            
                            $data = $data.$fileData.utf8_encode($lineEnd);
                        }                  
                    }
                    $boundaryend = $hypen . (string)$current_time_long . $hypen . $lineEnd . $lineEnd;
                    
                    $data = $data . utf8_encode($boundaryend);
                    
                    $header = ['ENCTYPE: multipart/form-data','Content-Type:multipart/form-data;boundary=' . (string)$current_time_long];
                    
                    $requestBase[CURLOPT_HTTPHEADER] = $header;
                }
                else if($value instanceof StreamWrapper)
                {
                    $fileName = $value->getName();
                    
                    $fileData = $value->getStream();
                    
                    $date = new \DateTime();
                    
                    $current_time_long= $date->getTimestamp();
                    
                    $lineEnd = "\r\n";
                    
                    $hypen = "--";
                    
                    $contentDisp = "Content-Disposition: form-data; name=\"".$key."\";filename=\"".$fileName."\"".$lineEnd.$lineEnd;
                    
                    $header = ['ENCTYPE: multipart/form-data','Content-Type:multipart/form-data;boundary='.(string)$current_time_long];
                    
                    $data = utf8_encode($lineEnd);
                    
                    $boundaryStart = utf8_encode($hypen.(string)$current_time_long.$lineEnd) ;
                    
                    $data = $data.$boundaryStart;
                    
                    $data = $data.utf8_encode($contentDisp);
                    
                    $data = $data.$fileData.utf8_encode($lineEnd);
                    
                    $boundaryend = $hypen.(string)$current_time_long.$hypen.$lineEnd.$lineEnd;
                    
                    $data = $data.utf8_encode($boundaryend);
                    
                    $requestBase[CURLOPT_HTTPHEADER] = $header;
                    
                    $requestBase[CURLOPT_POSTFIELDS]= $data;
                }
                else
                {
                    $data[$key] = $value;
                }
            }

            $requestBase[CURLOPT_POSTFIELDS]= $data;
        }
    }
    
    public function setJSONObject($fieldValue, $memberDetail)
    {
        $jsonObject = array();
        
        if ($memberDetail == null)
        {
            foreach ($fieldValue as $key => $value)
            {
                $jsonObject[$key] = $this->redirectorForObjectToJSON($value);
            }
        }
        else
        {
            $keysDetail = $memberDetail[Constants::KEYS];
            
            foreach ($keysDetail as $keyDetail)
            {
                $keyName = $keyDetail[Constants::NAME];
                
                $type = $keyDetail[Constants::TYPE];
                
                $keyValue = null;
                
                if (array_key_exists($keyName, $fieldValue) && $fieldValue[$keyName] != null)
                {
                    if (array_key_exists(Constants::STRUCTURE_NAME, $keyDetail))
                    {
                        $keyValue = $this->formRequest($fieldValue[$keyName], $keyDetail[Constants::STRUCTURE_NAME], 1, $memberDetail);
                    }
                    else
                    {
                        $keyValue = $this->redirectorForObjectToJSON($fieldValue[$keyName]);
                    }
                    
                    $varType = gettype($keyValue);
                    
                    if (in_array($varType, Constants::PRIMITIVE_TYPES))
                    {
                        $test = strcasecmp($varType, $type);
                        
                        if ($test)
                        {
                            throw new SDKException(Constants::DATATYPE_VALIDATE, $keyName . " Expected datatype {$type}");
                        }
                    }

                    $jsonObject[$keyName] = $keyValue;
                }
            }
        }
        
        return $jsonObject;
    }

    public function setJSONArray($requestObjects, $memberDetail)
    {
        $jsonArray = array();
        
        if ($memberDetail == null)
        {
            foreach ($requestObjects as $request)
            {
                $jsonArray[] = $this->redirectorForObjectToJSON($request);
            }
        }
        else
        {
            if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail))
            {
                $instanceCount = 0;
                
                $pack = $memberDetail[Constants::STRUCTURE_NAME];
                
                foreach ($requestObjects as $request)
                {
                    $jsonArray[] = $this->formRequest($request, $pack, ++ $instanceCount, $memberDetail);
                }
            }
            else
            {
                foreach ($requestObjects as $request)
                {
                    $jsonArray[] = $this->redirectorForObjectToJSON($request);
                }
            }
        }
        
        return $jsonArray;
    }

    public function redirectorForObjectToJSON($request)
    {
        $type = gettype($request);
        
        if ($type == Constants::ARRAY_KEY)
        {
            foreach (array_keys($request) as $key)
            {
                if (gettype($key) == strtolower(Constants::STRING_NAMESPACE))
                {
                    $type = strtolower(Constants::MAP_NAMESPACE);
                }
                
                break;
            }
            
            if ($type == strtolower(Constants::MAP_NAMESPACE))
            {
                return $this->setJSONObject($request, null);
            }
            else
            {
                return $this->setJSONArray($request, null);
            }
        }
        else 
        {
            return $request;
        }
    }

    public function getWrappedResponse($responseObject, $pack)
    {
        return NULL;
    }

    public function getResponse($responseJson, $pack)
    {
        return NULL;
    }
}