<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\record\Record;

use com\zoho\crm\api\record\FileDetails;

use com\zoho\crm\api\util\DataTypeConverter;

use com\zoho\crm\api\util\Constants;

use com\zoho\crm\api\util\Utility;

/**
 * This class processes the API response object to the POJO object and POJO object to a JSON object.
 */
class JSONConverter extends Converter
{
    private $_uniqueValuesMap = array();

    public function __construct($commonAPIHandler)
    {
        parent::__construct($commonAPIHandler);
    }

    public function appendToRequest(&$requestBase, $requestObject)
    {
        $requestBase[CURLOPT_POSTFIELDS] = json_encode($requestObject, JSON_UNESCAPED_UNICODE);
    }

    public function formRequest($requestInstance, $pack, $instanceNumber, $memberDetail=null)
    {
        $classDetail = Initializer::$jsonDetails[$pack];

        if (array_key_exists(Constants::INTERFACE_KEY, $classDetail) && $classDetail[Constants::INTERFACE_KEY] == true)
        {
            $classes = $classDetail[Constants::CLASSES];

            $requestObjectClassName = get_class($requestInstance);

            foreach ($classes as $className)
            {
                if (strtolower($className)== strtolower($requestObjectClassName)) 
                {
                    $classDetail = Initializer::$jsonDetails[$requestObjectClassName];

                    break;
                }
            }
        }

        if ($requestInstance instanceof Record) 
        {
            $moduleAPIName = $this->commonAPIHandler->getModuleAPIName();
            
            $returnJSON = $this->isRecordRequest($requestInstance, $classDetail,$instanceNumber,$memberDetail);
            
            $this->commonAPIHandler->setModuleAPIName($moduleAPIName);
            
            return $returnJSON;
        }
        else 
        {
            return $this->isNotRecordRequest($requestInstance, $classDetail, $instanceNumber, $memberDetail);
        }
    }

    private function isNotRecordRequest($requestInstance, $classDetail, $instanceNumber, $classMemberDetail = null)
    {
        $lookUp = false;
        
        $skipMandatory = false;
        
        $classMemberName = null;
        
        if ($classMemberDetail !== null)
        {    
            if (array_key_exists(Constants::LOOKUP, $classMemberDetail))
            {
                $lookUp = $classMemberDetail[Constants::LOOKUP];
            }
            
            if (array_key_exists(Constants::SKIP_MANDATORY, $classMemberDetail))
            {
                $skipMandatory = $classMemberDetail[Constants::SKIP_MANDATORY];
            }
            
            $classMemberName = $this->buildName($classMemberDetail[Constants::NAME]);
        }

        $reflector = new \ReflectionClass($requestInstance);

        $requestJSON = array();

        $primaryKeys = array();
		
		$requiredKeys = array();
		
		$requiredInUpdateKeys = array();

        foreach ($classDetail as $memberName => $memberDetail) 
        {
            $modification = null;

            // check and neglect read_only
            if ((array_key_exists(Constants::READ_ONLY, $memberDetail) && ($memberDetail[Constants::READ_ONLY])) || !array_key_exists(Constants::NAME, $memberDetail))// read only or no keyName
            {
                continue;
            }

            $keyName = $memberDetail[Constants::NAME];
            
            try 
            {
                $modification = $reflector->getMethod(Constants::IS_KEY_MODIFIED)->invoke($requestInstance, $keyName);
            } 
            catch (\Exception $ex) 
            {
                throw new SDKException(Constants::EXCEPTION_IS_KEY_MODIFIED, null, null, $ex);
            }

            if (array_key_exists(Constants::REQUIRED, $memberDetail) && $memberDetail[Constants::REQUIRED] == true)
            {
                $requiredKeys[$keyName] = 1;
            }
            if (array_key_exists(Constants::PRIMARY, $memberDetail) && $memberDetail[Constants::PRIMARY] == true)
            {
                $primaryKeys[$keyName] = 1;
            }
            if (array_key_exists(Constants::REQUIRED_IN_UPDATE, $memberDetail) && $memberDetail[Constants::REQUIRED_IN_UPDATE] == true)
            {
                $requiredInUpdateKeys[$keyName] = 1;
            }

            $fieldValue = null;

            if ($modification != null && $modification != 0 ) 
            {
                $field = $reflector->getProperty($memberName);

                $field->setAccessible(true);

                $fieldValue = $field->getValue($requestInstance);
                
                if ($this->valueChecker(get_class($requestInstance), $memberName, $memberDetail, $fieldValue, $this->_uniqueValuesMap, $instanceNumber))
                {
                    if ($fieldValue !== null)
                    {   
                        if (array_key_exists($keyName, $requiredKeys))
                        {
                            unset($requiredKeys[$keyName]);
                        }
                        
                        if (array_key_exists($keyName, $primaryKeys))
                        {
                            unset($primaryKeys[$keyName]);
                        }

                        if (array_key_exists($keyName, $requiredInUpdateKeys))
                        {
                            unset($requiredInUpdateKeys[$keyName]);
                        }
                    }
                  

                    if ($requestInstance instanceof FileDetails)
                    {
                        if($keyName === Constants::ATTACHMENT_ID)
                        {
                            $requestJSON[strtolower($keyName)] = $fieldValue;
                        }
                        else if($keyName == Constants::FILE_ID)
                        {
                            $requestJSON[strtolower($keyName)] = $fieldValue;
                        }
                        else
                        {
                            if($fieldValue == null || $fieldValue == "null")
                            {
                                $requestJSON[strtolower($keyName)] = null;
                            }
                            else
                            {
                                $requestJSON[strtolower($keyName)] = $fieldValue;
                            }
                        }
                    }
                    else
                    {
                        $requestJSON[$keyName] = $this->setData($memberDetail, $fieldValue);
                    }
                }
            }
        }

        if ($skipMandatory === true || $this->checkException($classMemberName, $requestInstance, $instanceNumber, $lookUp, $requiredKeys, $primaryKeys, $requiredInUpdateKeys) === true)
        {
            return $requestJSON;
        }
    }
    
    public function checkException($memberName, $requestInstance, $instanceNumber, $lookup, $requiredKeys, $primaryKeys, $requiredInUpdateKeys = array())
    {
        if (sizeof($requiredInUpdateKeys) > 0 && $this->commonAPIHandler->getCategoryMethod() != null && strtolower($this->commonAPIHandler->getCategoryMethod()) == strtolower(Constants::REQUEST_CATEGORY_UPDATE))
        {
            $error = array();

            $error[Constants::FIELD] = $memberName;
            
            $error[Constants::TYPE] = get_class($requestInstance);
            
            $error[Constants::KEYS] = array_keys($requiredInUpdateKeys);
            
            if(!is_null($instanceNumber))
            {
                $error[Constants::INSTANCE_NUMBER] = $instanceNumber;
            }
            
            throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR ,$error);
        }
        
        if($this->commonAPIHandler->isMandatoryChecker() != null && $this->commonAPIHandler->isMandatoryChecker())
        {
            if (strtolower($this->commonAPIHandler->getCategoryMethod()) == strtolower(Constants::REQUEST_CATEGORY_CREATE))
            {
                if($lookup == true)
                {
                    if(sizeof($primaryKeys) > 0)
                    {
                        $error = array();

                        $error[Constants::FIELD] = $memberName;
                        
                        $error[Constants::TYPE] = get_class($requestInstance);
                        
                        $error[Constants::KEYS] = array_keys($primaryKeys);
                        
                        if(!is_null($instanceNumber))
                        {
                            $error[Constants::INSTANCE_NUMBER] = $instanceNumber;
                        }
                        
                        throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::PRIMARY_KEY_ERROR ,$error);
                    }
                }
                else if(sizeof($requiredKeys) > 0)
                {
                    $error = array();
                
                    $error[Constants::FIELD] = $memberName;
                
                    $error[Constants::TYPE] = get_class($requestInstance);
                
                    $error[Constants::KEYS] = array_keys($requiredKeys);

                    if(!is_null($instanceNumber))
                    {
                        $error[Constants::INSTANCE_NUMBER] = $instanceNumber;
                    }
                
                    throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::MANDATORY_KEY_ERROR ,$error);
                }
            }

            if (strtolower($this->commonAPIHandler->getCategoryMethod()) == strtolower(Constants::REQUEST_CATEGORY_UPDATE) && sizeof($primaryKeys) > 0)
            {
                $error = array();
                
                $error[Constants::FIELD] = $memberName;
                
                $error[Constants::TYPE] = get_class($requestInstance);
                
                $error[Constants::KEYS] = array_keys($primaryKeys);
                
                if(!is_null($instanceNumber))
                {
                    $error[Constants::INSTANCE_NUMBER] = $instanceNumber;
                }
                
                throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::PRIMARY_KEY_ERROR ,$error);
            }
        }
        else if($lookup === true  && strtolower($this->commonAPIHandler->getCategoryMethod()) == strtolower(Constants::REQUEST_CATEGORY_UPDATE))
        {
            if (sizeof($primaryKeys) > 0)
            {
                $error = array();
            
                $error[Constants::FIELD] = $memberName;
                
                $error[Constants::TYPE] = get_class($requestInstance);
                
                $error[Constants::KEYS] = array_keys($primaryKeys);
                
                if(!is_null($instanceNumber))
                {
                    $error[Constants::INSTANCE_NUMBER] = $instanceNumber;
                }
                
                throw new SDKException(Constants::MANDATORY_VALUE_ERROR, Constants::PRIMARY_KEY_ERROR ,$error);
            }
        }
        return true;
    }

    public function isRecordRequest($recordInstance, $classDetail,$instanceNumber, $memberDetail =null)
    {
        $lookUp = false;
        
        $skipMandatory = false;
        
        $classMemberName = null;
        
        if ($memberDetail != null){
            
            if (array_key_exists(Constants::LOOKUP, $memberDetail))
            {
                $lookUp = $memberDetail[Constants::LOOKUP];
            }
            
            if (array_key_exists(Constants::SKIP_MANDATORY, $memberDetail))
            {
                $skipMandatory = $memberDetail[Constants::SKIP_MANDATORY];
            }
            
            $classMemberName = $this->buildName($memberDetail[Constants::NAME]);
        }

        $requestJSON = array();

        $moduleDetail = array();

        $moduleAPIName = $this->commonAPIHandler->getModuleAPIName();

        if ($moduleAPIName != null) // entry
        {
            $this->commonAPIHandler->setModuleAPIName(null);

            $fullDetail = Utility::searchJSONDetails($moduleAPIName);// to get correct moduleapiname in proper format

            if ($fullDetail != null) // from Jsondetails
            {
                $moduleDetail = $fullDetail[Constants::MODULEDETAILS];
            } 
            else // from user spec
            {
                $moduleDetail = $this->getModuleDetailFromUserSpecJSON($moduleAPIName);
            }
        } 
        else // inner case
        {
            $moduleDetail = $classDetail;

            $classDetail = Initializer::$jsonDetails[Constants::RECORD_NAMESPACE];
        }// class detail must contain record structure at this point

        $cl = get_class($recordInstance);

        $scl = get_parent_class($recordInstance);

        if ($scl != null && $scl == Constants::RECORD_NAMESPACE) 
        {
            $cl = $scl;
        }

        $reflector = new \ReflectionClass($cl);

        $keyValueField = $reflector->getProperty(Constants::KEY_VALUES);

        $keyValueField->setAccessible(true);

        $keyModifiedField = $reflector->getProperty(Constants::KEY_MODIFIED);

        $keyModifiedField->setAccessible(true);

        $keyValues = $keyValueField->getValue($recordInstance);

        $keyModified = $keyModifiedField->getValue($recordInstance);

        $requiredKeys = array();

		$primaryKeys = array();
		
        if($skipMandatory !== true)
        { 
            foreach ($moduleDetail as $keyName => $keyDetail)
			{
			    $name = $keyDetail[Constants::NAME];
			    
			    if ($keyDetail != null && array_key_exists(Constants::REQUIRED, $keyDetail) && $keyDetail[Constants::REQUIRED] == true)
				{
				    $requiredKeys[$name] = 1;
				}
				if ($keyDetail != null && array_key_exists(Constants::PRIMARY, $keyDetail) && $keyDetail[Constants::PRIMARY] == true)
				{
				    $primaryKeys[$name] = 1;
				}
            }
            
			foreach ($classDetail as $keyName => $keyDetail)
			{
			    $name = $keyDetail[Constants::NAME];
			    
			    if (array_key_exists(Constants::REQUIRED, $keyDetail) && $keyDetail[Constants::REQUIRED] == true)
				{
				    $requiredKeys[$name] = 1;
				}
				if (array_key_exists(Constants::PRIMARY, $keyDetail) && $keyDetail[Constants::PRIMARY] == true)
				{
				    $primaryKeys[$name] = 1;
				}
			}
        
		}
        foreach ($keyModified as $keyName => $keyVal) 
        {
            if ($keyVal != 1)
			{
				continue;
			}
			
            $keyDetail = array();

            $keyValue = array_key_exists($keyName, $keyValues) ? $keyValues[$keyName] : null;
            $jsonValue = null;

            if ($keyValue !== null)
            {
                if (array_key_exists($keyName, $requiredKeys))
                {
                    unset($requiredKeys[$keyName]);
                }

                if (array_key_exists($keyName, $primaryKeys))
                {
                    unset($primaryKeys[$keyName]);
                }
            }
            $memberName = $this->buildName($keyName);
              
            if ($moduleDetail != null && sizeof($moduleDetail) > 0 && (array_key_exists($keyName, $moduleDetail) || array_key_exists($memberName, $moduleDetail))) 
            {
                if (array_key_exists($keyName, $moduleDetail)) 
                {
                    $keyDetail = $moduleDetail[$keyName];// incase of user spec json
                }
                else 
                {
                    $keyDetail = $moduleDetail[$memberName];// json details
                }
            } 
            else if (array_key_exists($memberName, $classDetail)) 
            {
                $keyDetail = $classDetail[$memberName];
            }

            if (sizeof($keyDetail) > 0) 
            {
                if ((array_key_exists(Constants::READ_ONLY, $keyDetail) && ($keyDetail[Constants::READ_ONLY] == true)) || ! array_key_exists(Constants::NAME, $keyDetail))// read only or no keyName
                {
                    continue;
                }

                if ($this->valueChecker($cl, $memberName, $keyDetail, $keyValue,  $this->_uniqueValuesMap, $instanceNumber) == true)
				{
				    $jsonValue = $this->setData($keyDetail, $keyValue);
				}
               
            } 
            else 
            {
                $jsonValue = $this->redirectorForObjectToJSON($keyValue);
            }
            
            $requestJSON[$keyName] = $jsonValue;
        }
        if ($skipMandatory === true || $this->checkException($classMemberName, $recordInstance, $instanceNumber, $lookUp, $requiredKeys, $primaryKeys))
        {
            return $requestJSON;
        }

        return $requestJSON;
    }

    public function setData($memberDetail, $fieldValue)
    {
        if ($fieldValue !== null) 
        {
            $type = $memberDetail[Constants::TYPE];

            if ($type == Constants::LIST_NAMESPACE) 
            {
                return $this->setJSONArray($fieldValue, $memberDetail);
            }
            else if ($type == Constants::MAP_NAMESPACE) 
            {
                return $this->setJSONObject($fieldValue, $memberDetail);
            } 
            else if ($type == Constants::CHOICE_NAMESPACE || (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail) && $memberDetail[Constants::STRUCTURE_NAME] == Constants::CHOICE_NAMESPACE)) 
            {
                return $fieldValue->getValue();
            }
            else if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail) && array_key_exists(Constants::MODULE, $memberDetail)) 
            {
                return $this->isRecordRequest($fieldValue, $this->getModuleDetailFromUserSpecJSON($memberDetail[Constants::MODULE]), null, $memberDetail);
            } 
            else if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail)) 
            {
                return $this->formRequest($fieldValue, $memberDetail[Constants::STRUCTURE_NAME], null, $memberDetail);
            } 
            else 
            {
                return DataTypeConverter::postConvert($fieldValue, $type);
            }
        } 
        
        return null;
    }

    public function setJSONObject($requestObject, $memberDetail)
    {
        $jsonObject = array();

        if (sizeof($requestObject) > 0) 
        {
            if ($memberDetail == null || ($memberDetail != null && ! array_key_exists(Constants::KEYS, $memberDetail))) 
            {
                foreach ($requestObject as $key => $value) 
                {
                    $jsonObject[$key] = $this->redirectorForObjectToJSON($value);
                }
            } 
            else 
            {
                if (array_key_exists(Constants::KEYS, $memberDetail)) 
                {
                    $keysDetail = $memberDetail[Constants::KEYS];

                    foreach ($keysDetail as $keyDetail) 
                    {
                        $keyName = $keyDetail[Constants::NAME];

                        $keyValue = null;
                        
                        if (array_key_exists($keyName, $requestObject) && $requestObject[$keyName] != null) 
                        {
                            $keyValue = $this->setData($keyDetail, $requestObject[$keyName]);
                        
                            $jsonObject[$keyName] = $keyValue;
                        }
                    }
                }
            }
        }

        return $jsonObject;
    }

    public function setJSONArray($requestObjects, $memberDetail)
    {
        $jsonArray = array();

        if (sizeof($requestObjects) > 0) 
        {
            if ($memberDetail == null || ($memberDetail != null && ! array_key_exists(Constants::STRUCTURE_NAME, $memberDetail))) 
            {
                foreach ($requestObjects as $request) 
                {
                    $jsonArray[] = $this->redirectorForObjectToJSON($request);
                }
            } 
            else 
            {
                $pack = $memberDetail[Constants::STRUCTURE_NAME];

                if (strtolower($pack) == strtolower(Constants::CHOICE_NAMESPACE))
                {
                    foreach ($requestObjects as $request) 
                    {
                        $jsonArray[] = $request->getValue();
                    }
                } 
                else if (array_key_exists(Constants::MODULE, $memberDetail) && $memberDetail[Constants::MODULE] != null) 
                {
                    $instanceCount = 0;

                    foreach ($requestObjects as $request) 
                    {
                        $jsonArray[] = $this->isRecordRequest($request, $this->getModuleDetailFromUserSpecJSON($memberDetail[Constants::MODULE]), $instanceCount, $memberDetail);
                        
                        $instanceCount++;
                    }
                } 
                else 
                {
                    $instanceCount = 0;

                    foreach ($requestObjects as $request) 
                    {
                        $jsonArray[] = $this->formRequest($request, $pack, $instanceCount,$memberDetail);

                        $instanceCount++;
                    }
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
                    $type = Constants::MAP_NAMESPACE;
                }

                break;
            }

            if ($type == Constants::MAP_NAMESPACE) 
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

    public function getWrappedResponse($response, $pack)
    {
        list ($headers, $content) = explode("\r\n\r\n", $response, 2);

        $responseObject = json_decode($content, true);

        if ($responseObject == NULL && $content != null) 
        {
            list ($headers, $content) = explode("\r\n\r\n", $content, 2);

            $responseObject = json_decode($content, true);
        }
        
        if ($responseObject != null) 
        {
            return $this->getResponse($responseObject, $pack);
        }

        return null;
    }

    public function getResponse($responseJson, $packageName)
    {
        $instance = null;

        if (empty($responseJson) || $responseJson == null) 
        {
            return $instance;
        }

        $classDetail = Initializer::$jsonDetails[$packageName];

        if (array_key_exists(Constants::INTERFACE_KEY, $classDetail) && $classDetail[Constants::INTERFACE_KEY] == true) // if interface
        {
            $classes = $classDetail[Constants::CLASSES];

            $instance = $this->findMatch($classes, $responseJson);// findmatch returns instance(calls getresponse() recursively)
        } 
        else 
        {
            $instance = new $packageName();

            if ($instance instanceof Record)// if record -> based on response json data will be assigned to field Values
            {
                $moduleAPIName = $this->commonAPIHandler->getModuleAPIName();

                $instance = $this->isRecordResponse($responseJson, $classDetail, $packageName);

                $this->commonAPIHandler->setModuleAPIName($moduleAPIName);
            } 
            else 
            {
                $instance = $this->notRecordResponse($instance, $responseJson, $classDetail);// based on json details data will be assigned
            }
        }

        return $instance;
    }

    public function notRecordResponse($instance, $responseJSON, $classDetail)
    {
        foreach ($classDetail as $memberName => $keyDetail) 
        {
            $keyName = array_key_exists(Constants::NAME, $keyDetail) ? $keyDetail[Constants::NAME] : null;// api-name of the member

            if ($keyName != null && array_key_exists($keyName, $responseJSON ) && $responseJSON[$keyName] !== null && !is_null($responseJSON[$keyName])) 
            {
                $keyData = $responseJSON[$keyName];
                
                $reflector = new \ReflectionClass($instance);

                $member = $reflector->getProperty($memberName);

                $member->setAccessible(true);
                
                $memberValue = $this->getData($keyData, $keyDetail);

                $member->setValue($instance, $memberValue);
            }
        }

        return $instance;
    }

    public function isRecordResponse($responseJSON, $classDetail, $pack)
    {
        $recordInstance = new $pack();

        $moduleAPIName = $this->commonAPIHandler->getModuleAPIName();
        
        $moduleDetail = array();

        if ($moduleAPIName != null) // entry
        {
            $this->commonAPIHandler->setModuleAPIName(null);

            $fullDetail = Utility::searchJSONDetails($moduleAPIName);// to get correct moduleapiname in proper format

            if ($fullDetail != null) // from Jsondetails
            {
                $moduleDetail = $fullDetail[Constants::MODULEDETAILS];

                $recordInstance = new $fullDetail[Constants::MODULEPACKAGENAME]();
            } 
            else // from user spec
            {
                $moduleDetail = $this->getModuleDetailFromUserSpecJSON($moduleAPIName);
            }
        } 
       
        $moduleDetail = array_merge($moduleDetail, $classDetail);
        
        $recordDetail = Initializer::$jsonDetails[Constants::RECORD_NAMESPACE];
        
        $cl = get_class($recordInstance);
        
        $scl = get_parent_class($recordInstance);
        
        if ($scl != null && $scl == Constants::RECORD_NAMESPACE) 
        {
            $cl = $scl;
        }

        $reflector = new \ReflectionClass($cl);

        $member = $reflector->getProperty(Constants::KEY_VALUES);

        $member->setAccessible(true);

        $keyValues = array();

        foreach ($responseJSON as $keyName => $keyValue) 
        {
            $memberName = $this->buildName($keyName);
        
            $keyDetail = array();
        
            if ($moduleDetail != null && sizeof($moduleDetail) > 0 && (array_key_exists($keyName, $moduleDetail) || array_key_exists($memberName, $moduleDetail))) 
            {
                if (array_key_exists($keyName, $moduleDetail)) 
                {
                    $keyDetail = $moduleDetail[$keyName];
                } 
                else 
                {
                    $keyDetail = $moduleDetail[$memberName];
                }
            } 
            else if (array_key_exists($memberName, $recordDetail)) 
            {
                $keyDetail = $recordDetail[$memberName];
            }

            $keyValue = null;
            
            $keyData = $responseJSON[$keyName];

            if ($keyDetail != null && sizeof($keyDetail) > 0) 
            {
                $keyName = $keyDetail[Constants::NAME];

                $keyValue = $this->getData($keyData, $keyDetail);
            }
            else// if not key detail
            {
                $keyValue = $this->redirectorForJSONToObject($keyData);
            }

            $keyValues[$keyName] = $keyValue;
        }

        $member->setValue($recordInstance, $keyValues);

        return $recordInstance;
    }

    public function getData($keyData, $memberDetail)
    {
        $memberValue = null;

        if(!is_null($keyData))
        {
            $type = $memberDetail[Constants::TYPE];

            if ($type == Constants::LIST_NAMESPACE) 
            {
                $memberValue = $this->getCollectionsData($keyData, $memberDetail);
            }
            else if ($type == Constants::MAP_NAMESPACE) 
            {
                $memberValue = $this->getMapData($keyData, $memberDetail);
            }
            else if ($type == Constants::CHOICE_NAMESPACE || (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail) && $memberDetail[Constants::STRUCTURE_NAME] == Constants::CHOICE_NAMESPACE)) 
            {
                $memberValue = new Choice($keyData);
            }
            else if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail) && array_key_exists(Constants::MODULE, $memberDetail)) 
            {
                $memberValue = $this->isRecordResponse($keyData, $this->getModuleDetailFromUserSpecJSON($memberDetail[Constants::MODULE]),$memberDetail[Constants::STRUCTURE_NAME]);
            }
            else if (array_key_exists(Constants::STRUCTURE_NAME, $memberDetail)) 
            {
                $memberValue = $this->getResponse($keyData, $memberDetail[Constants::STRUCTURE_NAME]);
            } 
            else 
            {
                $memberValue = DataTypeConverter::preConvert($keyData, $type);
             
            }
        }
        
        return $memberValue;
    }

    public function getMapData($response, $memberDetail)
    {
        $mapInstance = array();

        if(sizeof($response)>0)
        {
            if ($memberDetail == null || ($memberDetail != null && ! array_key_exists(Constants::KEYS, $memberDetail))) 
            {
                foreach ($response as $key => $response) 
                {
                    $mapInstance[$key] = $this->redirectorForJSONToObject($response);
                }
            } 
            else// member must have keys
            {
                if(array_key_exists(Constants::KEYS, $memberDetail))
                {
                    $keysDetail = $memberDetail[Constants::KEYS];

                    foreach ($keysDetail as $keyDetail) 
                    {
                        $keyName = $keyDetail[Constants::NAME];
                        
                        $keyValue = null;
                        
                        if(array_key_exists($keyName, $response) && $response[$keyName]!=null)
                        {
                            $keyValue = $this->getData($response[$keyName], $keyDetail);

                            $mapInstance[$keyName]= $keyValue;
                        }
                    }
                }  
            }
        }

        return $mapInstance;
    }

    public function getCollectionsData($responses, $memberDetail)
    {
        $values = array();

        if(sizeof($responses) > 0)
        {
            if ($memberDetail == null || ($memberDetail != null && ! array_key_exists(Constants::STRUCTURE_NAME, $memberDetail))) 
            {
                foreach ($responses as $response) 
                {
                    $values[] = $this->redirectorForJSONToObject($response);
                }
            } 
            else // need to have structure Name in memberDetail
            {
                $pack = $memberDetail[Constants::STRUCTURE_NAME];
                
                if ($pack == Constants::CHOICE_NAMESPACE) 
                {
                    foreach ($responses as $response) 
                    {
                        $values[] = new Choice($response);
                    }
                } 
                else if (array_key_exists(Constants::MODULE, $memberDetail) && $memberDetail[Constants::MODULE] != null) 
                {
                    foreach ($responses as $response) 
                    {
                        $values[] = $this->isRecordResponse($response, $this->getModuleDetailFromUserSpecJSON($memberDetail[Constants::MODULE]), $pack);
                    }
                } 
                else 
                {
                    foreach ($responses as $response) 
                    {
                        $values[] = $this->getResponse($response, $pack);
                    }
                }
            }
        }

        return $values;
    }

    public function getModuleDetailFromUserSpecJSON($module)
    {
        $moduleDetail = Utility::getJSONObject(Initializer::getJSON($this->getEncodedFileName()), $module);

        return $moduleDetail;
    }
   
    public function redirectorForJSONToObject($keyData)
    {
        $type = gettype($keyData);

        if ($type == Constants::ARRAY_KEY) 
        {
            foreach (array_keys($keyData) as $key) 
            {
                if (gettype($key) == strtolower(Constants::STRING_NAMESPACE)) 
                {
                    $type = Constants::MAP_NAMESPACE;
                }

                break;
            }

            if ($type == Constants::MAP_NAMESPACE) 
            {
                return $this->getMapData($keyData, null);
            } 
            else 
            {
                return $this->getCollectionsData($keyData, null);
            }
        } 
        else 
        {
            return $keyData;
        }
    }

    public function findMatch($classes, $responseJson)
    {
        $pack = "";

        $ratio = 0;

        foreach ($classes as $className) 
        {
            $matchRatio = $this->findRatio($className, $responseJson);

            if ($matchRatio == 1.0) 
            {
                $pack = $className;

                $ratio = 1;

                break;
            } 
            else if ($matchRatio > $ratio) 
            {
                $pack = $className;

                $ratio = $matchRatio;
            }
        }
        
        return $this->getResponse($responseJson, $pack);
    }
    
    public function findRatio($className, $responseJson)
    {
        $classDetail = array();

        $classDetail = Initializer::$jsonDetails[$className];

        $totalPoints = sizeof(array_keys($classDetail));

        $matches = 0;

        if ($totalPoints == 0) 
        {
            return 0;
        }
        else 
        {
            foreach ($classDetail as $memberName => $memberDetail) 
            {
                $memberDetail = $classDetail[$memberName];

                $keyName = null;

                if(array_key_exists(Constants::NAME, $memberDetail))
                {
                    $keyName = $memberDetail[Constants::NAME];
                }
                
                if ($keyName != null && array_key_exists($keyName, $responseJson) && (is_array($responseJson[$keyName]) || $responseJson[$keyName] != null))
                {
                    $keyData = $responseJson[$keyName];

                    $type = gettype($keyData);

                    $structureName = null;
                    
                    if(array_key_exists(Constants::STRUCTURE_NAME, $memberDetail))
                    {
                        $structureName = $memberDetail[Constants::STRUCTURE_NAME];
                    }

                    if ($type == Constants::ARRAY_KEY) 
                    {
                        if(sizeof($keyData) > 0)
                        {
                            foreach ($keyData as $key => $value) 
                            {
                                if (gettype($key) == strtolower(Constants::STRING_NAMESPACE)) 
                                {
                                    $type = Constants::MAP_NAMESPACE;
                                } 
                                else 
                                {
                                    $type = Constants::LIST_NAMESPACE;
                                }
    
                                break;
                            }
                        }
                        else
                        {
                            $type = Constants::LIST_NAMESPACE;
                        }
                        
                    }

                    if (strtolower($type) == strtolower($memberDetail[Constants::TYPE])) 
                    {
                        $matches++;
                    }
                    else if (strtolower($memberDetail[Constants::TYPE]) == strtolower(Constants::CHOICE_NAMESPACE)) 
                    {
                        foreach ($memberDetail[Constants::VALUES] as $value) 
                        {
                            if ($value == $keyData) 
                            {
                                $matches ++;

                                break;
                            }
                        }
                    }

                    if($structureName != null && $structureName == $memberDetail[Constants::TYPE])
                    {
                        if(array_key_exists(Constants::VALUES, $memberDetail))
                        {
                            foreach($memberDetail[Constants::VALUES] as $value)
                            {
                                if($value == $keyData)
                                {
                                    $matches ++;
                                    
                                    break;
                                }
                            }
                        }
                        else
                        {
                            $matches ++;
                        }
                    }
                }
            }
        }

        return $matches / $totalPoints;
    }

    public function buildName($memberName)
    {
        $name = explode("_", $memberName);

        $sdkName = lcfirst($name[0]);

        for ($nameIndex = 1; $nameIndex < count($name); $nameIndex ++) 
        {
            $firstLetterUppercase = ucfirst($name[$nameIndex]);

            $sdkName = $sdkName . $firstLetterUppercase;
        }

        return $sdkName;
    }
}