<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class RelatedRecordsOperations
{

	private  $moduleAPIName;
	private  $recordId;
	private  $relatedListAPIName;

	/**
	 * Creates an instance of RelatedRecordsOperations with the given parameters
	 * @param string $relatedListAPIName A string
	 * @param string $recordId A string
	 * @param string $moduleAPIName A string
	 */
	public function __Construct(string $relatedListAPIName, string $recordId, string $moduleAPIName)
	{
		$this->relatedListAPIName=$relatedListAPIName; 
		$this->recordId=$recordId; 
		$this->moduleAPIName=$moduleAPIName; 

	}

	/**
	 * The method to get related records
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getRelatedRecords(ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related records
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateRelatedRecords(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delink records
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function delinkRecords(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get related record
	 * @param string $relatedRecordId A string
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getRelatedRecord(string $relatedRecordId, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update related record
	 * @param string $relatedRecordId A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateRelatedRecord(string $relatedRecordId, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		Utility::getRelatedLists($this->relatedListAPIName, $this->moduleAPIName, $handlerInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delink record
	 * @param string $relatedRecordId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function delinkRecord(string $relatedRecordId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($this->moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->recordId)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($this->relatedListAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($relatedRecordId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
class GetRelatedRecordsParam
{
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordsParam'); 

	}

}

class GetRelatedRecordsHeader
{
	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordsHeader'); 

	}

}

class DelinkRecordsParam
{
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.RelatedRecords.DelinkRecordsParam'); 

	}

}

class GetRelatedRecordHeader
{
	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordHeader'); 

	}

}
