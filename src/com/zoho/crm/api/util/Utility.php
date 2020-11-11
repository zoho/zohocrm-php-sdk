<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\fields\FieldsOperations;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\fields\ResponseWrapper;

use com\zoho\crm\api\fields\APIException;

use com\zoho\crm\api\modules\ModulesOperations;

use com\zoho\crm\api\Header;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\util\Constants;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\relatedlists\RelatedListsOperations;

use com\zoho\api\logger\SDKLogger;

/**
 * This class handles module field details.
 */
class Utility
{

    public static $apiTypeVsdataType = array();

    public static $apiTypeVsStructureName = array();

    public static $jsonDetails;

    public static $newFile = false;

    public static $getModifiedModules = false;

    public static $forceRefresh = false;

    private static $sdkException = 'com\zoho\crm\api\exception\SDKException';

    /**
     * This method to fetch field details of the current module for the current user and store the result in a JSON file.
     * @param string $moduleAPIName
     * A string containing the CRM module API name.
     */
    public static function getFields($moduleAPIName)
    {
        $recordFieldDetailsPath = null;

        $lastModifiedTime = null;

        try
        {
            if ($moduleAPIName != null && self::searchJSONDetails($moduleAPIName) != null) 
            {
                return;
            }
            
            $resourcesPath = Initializer::getInitializer()->getResourcePath() . DIRECTORY_SEPARATOR . Constants::FIELD_DETAILS_DIRECTORY;

            if (!file_exists($resourcesPath)) 
            {
                mkdir($resourcesPath);
            }

            $recordFieldDetailsPath = $resourcesPath . DIRECTORY_SEPARATOR . self::getFileName();

            if (file_exists($recordFieldDetailsPath)) 
            {
                $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

                if(Initializer::getInitializer()->getSDKConfig()->getautoRefreshFields() && !self::$newFile && !self::$getModifiedModules && (!array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson) || self::$forceRefresh || (round(microtime(true) * 1000) - $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME]) > 3600000))
                {
                    self::$getModifiedModules = true;

                    $lastModifiedTime = array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson) ?  $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] : null;
                    
					self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);
					
					self::$getModifiedModules = false;
                }
                else if(!Initializer::getInitializer()->getSDKConfig()->getautoRefreshFields() && self::$forceRefresh && !self::$getModifiedModules)
                {
                    self::$getModifiedModules = true;

                    self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);

                    self::$getModifiedModules = false;
                }

                $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

                if ($moduleAPIName == null || array_key_exists(strtolower($moduleAPIName), $recordFieldDetailsJson) && isset($recordFieldDetailsJson[strtolower($moduleAPIName)])) 
                {
                    return;
                } 
                else 
                {
                    self::fillDataType();

                    $recordFieldDetailsJson[strtolower($moduleAPIName)] = array();
                    
                    file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
                    
                    $fieldDetails = self::getFieldDetails($moduleAPIName);
                    
                    $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

                    $recordFieldDetailsJson[strtolower($moduleAPIName)] = $fieldDetails;

                    file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
                }
            } 
            else if(Initializer::getInitializer()->getSDKConfig()->getautoRefreshFields())
            {
                self::$newFile = true;

                self::fillDataType();

                $moduleAPINames = self::getModules(null);

                $recordFieldDetailsJson = array();

                $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = round(microtime(true) * 1000);

                foreach($moduleAPINames as $module)
				{
					if(!array_key_exists(strtolower($module), $recordFieldDetailsJson))
					{
						$recordFieldDetailsJson[strtolower($module)] = array();
						
						file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));

                        $fieldDetails = Utility::getFieldDetails($module);
                        
                        $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

                        $recordFieldDetailsJson[strtolower($module)] = $fieldDetails;

                        file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
					}
				}
				
				self::$newFile = false;
            }
            else if(self::$forceRefresh && !self::$getModifiedModules)
            {
                self::$getModifiedModules = true;

                $recordFieldDetailsJson = array();

                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));

                self::modifyFields($recordFieldDetailsPath, $lastModifiedTime);

                self::$getModifiedModules = false;
            }
            else
            {
                Utility::fillDataType();

                $recordFieldDetailsJson = array();

                $recordFieldDetailsJson[strtolower($moduleAPIName)] = array();

                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));

                $fieldDetails = Utility::getFieldDetails($moduleAPIName);
                
                $recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

                $recordFieldDetailsJson[strtolower($moduleAPIName)] = $fieldDetails;

                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
            }
        }
        catch (\Exception $e)
		{
            if($recordFieldDetailsPath != null && file_exists($recordFieldDetailsPath))
			{
                $recordFieldDetailsJson = array();
                
				try 
				{
					$recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);

					if(array_key_exists(strtolower($moduleAPIName), $recordFieldDetailsJson))
					{
						unset($recordFieldDetailsJson[strtolower($moduleAPIName)]);
                    }
                    if(self::$newFile)
					{
						if(array_key_exists(Constants::FIELDS_LAST_MODIFIED_TIME, $recordFieldDetailsJson) && $recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] != null)
						{
							unset($recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME]);
						}
						
						self::$newFile = false;
					}
					
					if(self::$getModifiedModules || self::$forceRefresh)
					{
                        self::$getModifiedModules = false;
                        
                        self::$forceRefresh = false;
						
						if($lastModifiedTime != null)
						{
							$recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = $lastModifiedTime;
						}
					}
					
					file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
				} 
				catch (\Exception $ex) 
				{
                    if(!($ex instanceof self::$sdkException))
                    {
                        $ex = new SDKException(null, null, null, $ex);
                    }

                    SDKLogger::severeError(Constants::EXCEPTION, $ex);
                    
                    throw $ex;
				}
            }

            if(!($e instanceof self::$sdkException))
            {
                $e = new SDKException(null, null, null, $e);
            }

            SDKLogger::severeError(Constants::EXCEPTION, $e);
            
            throw $e;
		}
    }

    private static function modifyFields($recordFieldDetailsPath, $modifiedTime)
	{		
        $modifiedModules = self::getModules($modifiedTime);
        
		$recordFieldDetailsJson = Initializer::getJSON($recordFieldDetailsPath);
		
		$recordFieldDetailsJson[Constants::FIELDS_LAST_MODIFIED_TIME] = round(microtime(true) * 1000);
		
		file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
		
		if(!empty($modifiedModules))
		{
			foreach($modifiedModules as $module)
			{
				if(array_key_exists(strtolower($module), $recordFieldDetailsJson))
				{
					unset($recordFieldDetailsJson[strtolower($module)]);
				}
			}
            
            file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJson));
            
			foreach($modifiedModules as $module)
			{
				Utility::getFields($module);
			}
		}
    }

    public static function deleteFields(&$recordFieldDetailsJson, $module)
    {
        $subformModules = array();

        $fieldsJSON = $recordFieldDetailsJson[strtolower($module)];

        foreach ($fieldsJSON as $key => $value) 
        {
            if(array_key_exists(Constants::SUBFORM, $value) && $value[Constants::SUBFORM] == true && $recordFieldDetailsJson[$value[Constants::MODULE]])
            {
                array_push($subformModules, $value[Constants::MODULE]);
            }
        }

        unset($recordFieldDetailsJson[strtolower($module)]);

        if(count($subformModules) > 0)
        {
            foreach($subformModules as $subformModule)
            {
                self::deleteFields($recordFieldDetailsJson, $subformModule);
            }
        }

    }
    
    private static function getFileName()
	{
        $fileName = Initializer::getInitializer()->getUser()->getEmail();

        $fileName = explode("@", $fileName)[0] . Initializer::getInitializer()->getEnvironment()->getUrl();

        $input = unpack('C*', utf8_encode($fileName));

        $str = base64_encode(implode(array_map("chr", $input)));
        
        return  $str . ".json";
    }
    
    public static function getRelatedLists($relatedModuleName, $moduleAPIName, &$commonAPIHandler)
	{
		try
		{
			$isNewData = false;

			$key = strtolower($moduleAPIName . Constants::UNDERSCORE . Constants::RELATED_LISTS);
			
			$resourcesPath = Initializer::getInitializer()->getResourcePath() . DIRECTORY_SEPARATOR . Constants::FIELD_DETAILS_DIRECTORY;

            if (!file_exists($resourcesPath)) 
            {
                mkdir($resourcesPath);
            }

            $recordFieldDetailsPath = $resourcesPath . DIRECTORY_SEPARATOR . self::getFileName();
			
			if(!file_exists($recordFieldDetailsPath) || (file_exists($recordFieldDetailsPath) && (!array_key_exists($key, Initializer::getJSON($recordFieldDetailsPath)) || (is_null(Initializer::getJSON($recordFieldDetailsPath)[$key]) || count(Initializer::getJSON($recordFieldDetailsPath)[$key]) <= 0 ))))
			{
                $isNewData = true;
                
                $relatedListValues = self::getRelatedListDetails($moduleAPIName);
                
                $recordFieldDetailsJSON = file_exists($recordFieldDetailsPath) ?  Initializer::getJSON($recordFieldDetailsPath) : array();
                
                $recordFieldDetailsJSON[$key] = $relatedListValues;
                
                file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJSON));
			}
			
			$recordFieldDetailsJSON = Initializer::getJSON($recordFieldDetailsPath);
			
			$modulerelatedList = array_key_exists($key, $recordFieldDetailsJSON) ? $recordFieldDetailsJSON[$key] : array();
			
			if(!self::checkRelatedListExists($relatedModuleName, $modulerelatedList, $commonAPIHandler) && !$isNewData)
			{
				unset($recordFieldDetailsJSON[$key]);
				
				file_put_contents($recordFieldDetailsPath, json_encode($recordFieldDetailsJSON));
				
                self::getRelatedLists($relatedModuleName, $moduleAPIName, $commonAPIHandler);
			}
		}
		catch (SDKException $ex)
		{
		    SDKLogger::severeError(Constants::EXCEPTION, $ex);
		     
		    throw $ex;
		}
		catch (\Exception $e)
		{
		    $exception = new SDKException(Constants::EXCEPTION, null,null,$e);
		    
		    SDKLogger::severeError(Constants::EXCEPTION, $exception);
			
			throw $exception;
		}
	}
	
	private static function checkRelatedListExists($relatedModuleName, $modulerelatedListJA, $commonAPIHandler)
	{
		foreach($modulerelatedListJA as $relatedListJO)
		{
			if(array_key_exists(Constants::API_NAME, $relatedListJO) && ($relatedListJO[Constants::API_NAME] != null && strtolower($relatedListJO[Constants::API_NAME]) == strtolower($relatedModuleName)))
			{
                if($relatedListJO[Constants::HREF] === Constants::NULL_VALUE)
                {
			        throw new SDKException(Constants::UNSUPPORTED_IN_API, $commonAPIHandler->getHttpMethod() . " " . $commonAPIHandler->getAPIPath() . " " . Constants::UNSUPPORTED_IN_API_MESSAGE);
                }
                
                if($relatedListJO[Constants::MODULE] === Constants::NULL_VALUE)
                {
    				$commonAPIHandler->setModuleAPIName($relatedListJO[Constants::MODULE]);
    				
    				self::getFields($relatedListJO[Constants::MODULE]);
			    }
    				
				return true;
			}
		}
		
		return false;
	}
	
	private static function getRelatedListDetails($moduleAPIName)
	{
		$relatedListsOperations = new RelatedListsOperations($moduleAPIName);
		
		$response = $relatedListsOperations->getRelatedLists();
		
		$relatedListJA = array();
		
		if($response != null)
		{
            if(strval($response->getStatusCode()) == Constants::NO_CONTENT_STATUS_CODE)
			{
				return $relatedListJA;
            }
            
            $responseHandler = $response->getObject();
            
            $relatedlistsResponseWrapper = 'com\zoho\crm\api\relatedlists\ResponseWrapper';

            $relatedlistsAPIException = 'com\zoho\crm\api\relatedlists\APIException';
				
            if($responseHandler instanceof $relatedlistsResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                
                $relatedLists = $responseWrapper->getRelatedLists();
                
                foreach($relatedLists as $relatedList)
                {
                    $relatedListDetail = array();
                    
                    $relatedListDetail[Constants::API_NAME] = $relatedList->getAPIName();
                    
                    $relatedListDetail[Constants::MODULE] = $relatedList->getModule() != null ? $relatedList->getModule() : Constants::NULL_VALUE;
                    
                    $relatedListDetail[Constants::NAME] = $relatedList->getName();
                    
                    $relatedListDetail[Constants::HREF] = $relatedList->getHref() != null ? $relatedList->getHref() : Constants::NULL_VALUE;
                    
                    array_push($relatedListJA, $relatedListDetail);
                }
            }
            else if($responseHandler instanceof $relatedlistsAPIException)
            {
                $exception = $responseHandler;
                
                $errorResponse = array();
                
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                
                $errorResponse[Constants::MESSAGE] = $exception->getMessage()->getValue();
                
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
			else
			{
				$errorResponse = array();
				
				$errorResponse[Constants::CODE] = $response->getStatusCode();
				
				throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
        }

		return $relatedListJA;	
	}

    /**
     * This method to get module field data from Zoho CRM.
     * @param string $moduleAPIName A string containing the CRM module API name.
     * @return array[] A array[] representing the Zoho CRM module field details.
     */
    public static function getFieldDetails($moduleAPIName)
    {
        $fieldsDetails = array();
        
        $fieldOperation = new FieldsOperations($moduleAPIName);

        $response = $fieldOperation->getFields(new ParameterMap());

        if($response != null)
		{
            if(strval($response->getStatusCode()) == Constants::NO_CONTENT_STATUS_CODE)
			{
				return $fieldsDetails;
            }

            $responseHandler = $response->getObject();

            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;

                $fields = $responseWrapper->getFields();

                foreach ($fields as $field) 
                {
                    $keyName = $field->getAPIName();

                    if (in_array($keyName, Constants::KEYSTOSKIP))
                    {
                        continue;
                    }
                    
                    $fieldDetail = array();

                    $fieldDetail = Utility::setDataType($fieldDetail, $field, $moduleAPIName);

                    $fieldsDetails[$field->getAPIName()] = $fieldDetail;
                }

                if(in_array(strtolower($moduleAPIName), Constants::INVENTORY_MODULES))
                {
                    $fieldDetail = array();
                    
                    $fieldDetail[Constants::NAME] = Constants::ATTACHMENTS;
                    
                    $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
                    
                    $fieldDetail[Constants::STRUCTURE_NAME] = Constants::ATTACHMENTS_NAMESPACE;
                    
                    $fieldsDetails[Constants::ATTACHMENTS] =  $fieldDetail;
                }
                if(strtolower($moduleAPIName) === strtolower(Constants::NOTES))
                {
                    $fieldDetail = array();
                    
                    $fieldDetail[Constants::NAME] = Constants::LINE_TAX;
                    
                    $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
                    
                    $fieldDetail[Constants::STRUCTURE_NAME] = Constants::LINETAX;
                    
                    $fieldsDetails[Constants::LINE_TAX] =  $fieldDetail;
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                
                $errorResponse = array();
                
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                
                $errorResponse[Constants::MESSAGE] = $exception->getMessage()->getValue();
                
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
        }
        else
        {
            $errorResponse = array();
            
            $errorResponse[Constants::CODE] = $response->getStatusCode();
            
            throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
        }

        return $fieldsDetails;
    }

    public static function searchJSONDetails($key)
    {
        $key = Constants::PACKAGE_NAMESPACE . "\\record\\" . $key;

        foreach (Initializer::$jsonDetails as $keyInJSON => $value) 
        {
            if ($key == $keyInJSON) 
            {
                $returnJSON = array();

                $returnJSON[Constants::MODULEPACKAGENAME] = $keyInJSON;
                
                $returnJSON[Constants::MODULEDETAILS] = $value;
                
                return $returnJSON;
            }
        }

        return null;
    }

    private static function getModules($header)
	{
		$apiNames = array();
		
		$headerMap = new HeaderMap();
		
		if($header != null)
		{
            $datetime = new \DateTime(date("Y-m-d H:i:s", intval($header/1000)));
            
            $datetime->setTimezone(new \DateTimeZone(date_default_timezone_get()));

            $moduleHeader = new Header(Constants::IF_MODIFIED_SINCE);
            
			$headerMap->add($moduleHeader, $datetime);
		}
        
        $modulesOperations = new ModulesOperations();

        $response = $modulesOperations->getModules($headerMap);
        
        if($response != null)
		{
            if(in_array(strval($response->getStatusCode()), array(Constants::NO_CONTENT_STATUS_CODE, Constants::NOT_MODIFIED_STATUS_CODE)))
            {
				return $apiNames;
            }

            $responseObject = $response->getObject();
            
            $moduleResponseWrapper = Constants::MODULE_RESPONSEWRAPPER;
            
            $apiException =Constants::MODULE_API_EXCEPTION;
            
            if($responseObject instanceof $moduleResponseWrapper)
            {
                $modules = $responseObject->getModules();
                
                foreach($modules as $module)
                {
                    if($module->getAPISupported())
                    {
                        array_push($apiNames, $module->getAPIName());
                    }
                }
            }
            else if ($responseObject instanceOf $apiException)
            {
                $exception = $responseObject;
                
                $errorResponse = array();
                
                $errorResponse[Constants::CODE] = $exception->getCode()->getValue();
                
                $errorResponse[Constants::STATUS] = $exception->getStatus()->getValue();
                
                $errorResponse[Constants::MESSAGE] = $exception->getMessage()->getValue();
                
                throw new SDKException(Constants::API_EXCEPTION, null, $errorResponse);
            }
        }

		return $apiNames;
    }
    
    public static function refreshModules()
    {
        self::$forceRefresh = true;

        self::getFields(null);

        self::$forceRefresh = false;
    }

    public static function getJSONObject($json, $key)
    {
        foreach ($json as $keyJSON => $value) 
        {
            if (strtolower($key) == strtolower($keyJSON))
            {
                return $value;
            }
        }

        return null;
    }

    public static function setDataType($fieldDetail, $field, $moduleAPIName)
    {
        $apiType = $field->getDataType();

        $keyName = $field->getAPIName();

        $module = "";

        if($field->getSystemMandatory() != null && $field->getSystemMandatory() == true && !(strtolower($moduleAPIName) == strtolower(Constants::CALLS) && strtolower($keyName) == strtolower(Constants::CALL_DURATION)))
		{
			$fieldDetail[Constants::REQUIRED] = true;
		}

        if (strtolower($keyName) == Constants::PRODUCT_DETAILS && in_array(strtolower($moduleAPIName), Constants::INVENTORY_MODULES))
        {
            $fieldDetail[Constants::NAME] = $keyName;
            
            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
            
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::INVENTORY_LINE_ITEMS;

            $fieldDetail[Constants::SKIP_MANDATORY] = true;
            
            return $fieldDetail;
        } 
        else if ($keyName == Constants::PRICING_DETAILS && strtolower($moduleAPIName) == Constants::PRICE_BOOKS)
        {
            $fieldDetail[Constants::NAME] = $keyName;

            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;

            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::PRICINGDETAILS;

            $fieldDetail[Constants::SKIP_MANDATORY] = true;

            return $fieldDetail;
        } 
        else if (strtolower($keyName) == Constants::PARTICIPANT_API_NAME && (strtolower($moduleAPIName) == Constants::EVENTS || strtolower($moduleAPIName) == Constants::ACTIVITIES))
        {
            $fieldDetail[Constants::NAME] = $keyName;

            $fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;

            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::PARTICIPANTS;

            $fieldDetail[Constants::SKIP_MANDATORY] = true;

            return $fieldDetail;
        } 
        else if (strtolower($keyName) == Constants::COMMENTS && (strtolower($moduleAPIName) == Constants::SOLUTIONS || strtolower($moduleAPIName) == Constants::CASES))
		{
			$fieldDetail[Constants::NAME] = $keyName;
			
			$fieldDetail[Constants::TYPE] = Constants::LIST_NAMESPACE;
			
            $fieldDetail[Constants::STRUCTURE_NAME] = Constants::COMMENT_NAMESPACE;
            
            $fieldDetail[Constants::LOOKUP] = true;

			return $fieldDetail;
		}
        else if (strtolower($keyName) == Constants::LAYOUT)
		{
			$fieldDetail[Constants::NAME] = $keyName;
			
			$fieldDetail[Constants::TYPE] = Constants::LAYOUT_NAMESPACE;
			
			$fieldDetail[Constants::STRUCTURE_NAME] = Constants::LAYOUT_NAMESPACE;
			
			return $fieldDetail;
		}
        else if (array_key_exists($apiType, Utility::$apiTypeVsdataType)) 
        {
            $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsdataType[$apiType];
        }
        else if(strtolower($apiType) == Constants::FORMULA)
        {
            if($field->getFormula() != null)
            {
                $returnType = $field->getFormula()->getReturnType();

                if($returnType != null && array_key_exists($returnType, Utility::$apiTypeVsdataType))
                {
                    $fieldDetail[Constants::TYPE] = Utility::$apiTypeVsdataType[$returnType];
                }
            }

            $fieldDetail[Constants::READ_ONLY] = true;
        }
        else 
        {
            return;
        }

        if(strpos(strtolower($apiType), Constants::LOOKUP) !== false)
        {
            $fieldDetail[Constants::LOOKUP] = true;
        }

        if(strtolower($apiType) == Constants::CONSENT_LOOKUP)
        {
            $fieldDetail[Constants::SKIP_MANDATORY] = true;
        }

        if (array_key_exists($apiType, Utility::$apiTypeVsStructureName)) 
        {
            $fieldDetail[Constants::STRUCTURE_NAME] = Utility::$apiTypeVsStructureName[$apiType];
        }

        if (strtolower($apiType) == Constants::PICKLIST && $field->getPickListValues() != null && sizeof($field->getPickListValues()) > 0) 
        {
            $fieldDetail[Constants::PICKLIST] = true;

            $values = array();
            
            foreach ($field->getPickListValues() as $plv) 
            {
                $values[] = $plv->getDisplayValue();
            }

            $fieldDetail[Constants::VALUES] = $values;
        }

        if ($apiType == Constants::SUBFORM) 
        {
            $module = $field->getSubform()->getModule();

            $fieldDetail[Constants::MODULE] = $module;

            $fieldDetail[Constants::SKIP_MANDATORY] = true;

            $fieldDetail[Constants::SUBFORM] = true;
        }

        if ($apiType == Constants::LOOKUP) 
        {
            if($field->getLookup() != null)
            {
                $module = $field->getLookup()->getModule();
        
                if ($module != null && strtolower($module) != Constants::SE_MODULE) 
                {
                    $fieldDetail[Constants::MODULE] = $module;
    
                    if(strtolower($module) == Constants::ACCOUNTS && !$field->getCustomField())
                    {
                        $fieldDetail[Constants::SKIP_MANDATORY] = true;
                    }
                } 
                else 
                {
                    $module = "";
                }
    
                $fieldDetail[Constants::LOOKUP] = true;
            }
        }

        if (strlen($module) > 0) 
        {
            Utility::getFields($module);
        }

        $fieldDetail[Constants::NAME] = $keyName;

        return $fieldDetail;
    }

    public static function fillDataType()
    {
        if(count(self::$apiTypeVsdataType) > 0)
        {
            return;
        }

        $fieldAPINamesString = ["textarea", "text", "website", "email", "phone", "mediumtext","multiselectlookup", "profileimage"];
        
        $fieldAPINamesInteger = ["integer"];
        
        $fieldAPINamesBoolean = ["boolean"];
        
        $fieldAPINamesLong = ["long", "bigint", "autonumber"];
        
        $fieldAPINamesDouble = ["double", "percent", "lookup", "currency"];
        
        $fieldAPINamesFile = ["imageupload"];

        $fieldAPINamesFieldFile = ["fileupload"];
        
        $fieldAPINamesDateTime = ["datetime", "event_reminder"];

        $fieldAPINamesDate = ["date"];

        $fieldAPINamesLookup = ["lookup"];

        $fieldAPINamesPickList = ["picklist"];

        $fieldAPINamesMultiSelectPickList = ["multiselectpicklist"];

        $fieldAPINamesSubForm = ["subform"];

        $fieldAPINamesOwnerLookUp = ["ownerlookup", "userlookup"];

        $fieldAPINamesMultiUserLookUp = ["multiuserlookup"];

        $fieldAPINamesMultiModuleLookUp = ["multimodulelookup"];

        $fieldAPINameTaskRemindAt = ["ALARM"];

        $fieldAPINameRecurringActivity = ["RRULE"];

        $fieldAPINameReminder = ["multireminder"];

        $fieldAPINameConsentLookUp = ["consent_lookup"];

        foreach ($fieldAPINamesString as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::STRING_NAMESPACE;
        }

        foreach ($fieldAPINamesInteger as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::INTEGER_NAMESPACE;
        }
        
        foreach ($fieldAPINamesBoolean as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::BOOLEAN_NAMESPACE;
        }

        foreach ($fieldAPINamesLong as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::LONG_NAMESPACE;
        }
        
        foreach ($fieldAPINamesDouble as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::FLOAT_NAMESPACE;
        }
        
        foreach ($fieldAPINamesFile as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::FILE_NAMESPACE;
        }
        
        foreach ($fieldAPINamesDateTime as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::DATETIME_NAMESPACE;
        }
        
        foreach ($fieldAPINamesDate as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::DATE;
        }

        foreach ($fieldAPINamesLookup as $fieldAPIName) 
        {
            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;

            self::$apiTypeVsdataType[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }

        foreach ($fieldAPINamesPickList as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::CHOICE_NAMESPACE;
        }

        foreach ($fieldAPINamesMultiSelectPickList as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;

            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::CHOICE_NAMESPACE;
        }

        foreach ($fieldAPINamesSubForm as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;

            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECORD_NAMESPACE;
        }

        foreach ($fieldAPINamesOwnerLookUp as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::USER_NAMESPACE;

            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::USER_NAMESPACE;
        }

        foreach ($fieldAPINamesMultiUserLookUp as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;

            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::USER_NAMESPACE;
        }

        foreach ($fieldAPINamesMultiModuleLookUp as $fieldAPIName) 
        {
            self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;

            self::$apiTypeVsStructureName[$fieldAPIName] = Constants::MODULE_NAMESPACE;
        }

        foreach ($fieldAPINamesFieldFile as $fieldAPIName)
		{
			self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::FIELD_FILE_NAMESPACE;
		}
		
		foreach ($fieldAPINameTaskRemindAt as $fieldAPIName)
		{
			self::$apiTypeVsdataType[$fieldAPIName] = Constants::REMINDAT_NAMESPACE;
			
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::REMINDAT_NAMESPACE;
        }
        
        foreach ($fieldAPINameRecurringActivity as $fieldAPIName)
		{
			self::$apiTypeVsdataType[$fieldAPIName] = Constants::RECURRING_ACTIVITY_NAMESPACE;
			
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::RECURRING_ACTIVITY_NAMESPACE;
        }
        
        foreach ($fieldAPINameReminder as $fieldAPIName)
		{
			self::$apiTypeVsdataType[$fieldAPIName] = Constants::LIST_NAMESPACE;
			
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::REMINDER_NAMESPACE;
        }
        
        foreach ($fieldAPINameConsentLookUp as $fieldAPIName)
		{
			self::$apiTypeVsdataType[$fieldAPIName] = Constants::CONSENT_NAMESPACE;
			
			self::$apiTypeVsStructureName[$fieldAPIName] = Constants::CONSENT_NAMESPACE;
		}
    }
}
?>