<?php 
namespace com\zoho\crm\api\bulkread;

use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class BulkReadOperations
{

	/**
	 * The method to get bulk read job details
	 * @param string $jobId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getBulkReadJobDetails(string $jobId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/bulk/v2/read/'); 
		$apiPath=$apiPath.(strval($jobId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to download result
	 * @param string $jobId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function downloadResult(string $jobId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/bulk/v2/read/'); 
		$apiPath=$apiPath.(strval($jobId)); 
		$apiPath=$apiPath.('/result'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/x-download'); 

	}

	/**
	 * The method to create bulk read job
	 * @param RequestWrapper $request An instance of RequestWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function createBulkReadJob(RequestWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/bulk/v2/read'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
