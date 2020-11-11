<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class BulkWriteOperations
{

	/**
	 * The method to upload file
	 * @param FileBodyWrapper $request An instance of FileBodyWrapper
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function uploadFile(FileBodyWrapper $request, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('https://content.zohoapis.com/crm/v2/upload'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('multipart/form-data'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(ActionResponse::class, 'application/json'); 

	}

	/**
	 * The method to create bulk write job
	 * @param RequestWrapper $request An instance of RequestWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function createBulkWriteJob(RequestWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/bulk/v2/write'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionResponse::class, 'application/json'); 

	}

	/**
	 * The method to get bulk write job details
	 * @param string $jobId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getBulkWriteJobDetails(string $jobId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/bulk/v2/write/'); 
		$apiPath=$apiPath.(strval($jobId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseWrapper::class, 'application/json'); 

	}

	/**
	 * The method to download bulk write result
	 * @param string $downloadUrl A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function downloadBulkWriteResult(string $downloadUrl)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($downloadUrl)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/octet-stream'); 

	}
} 
class UploadFileHeader
{
	public static final function feature()
	{
		return new Header('feature', 'com.zoho.crm.api.BulkWrite.UploadFileHeader'); 

	}
	public static final function XCRMORG()
	{
		return new Header('X-CRM-ORG', 'com.zoho.crm.api.BulkWrite.UploadFileHeader'); 

	}

}
