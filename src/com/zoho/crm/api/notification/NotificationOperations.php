<?php 
namespace com\zoho\crm\api\notification;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class NotificationOperations
{

	/**
	 * The method to enable notifications
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function enableNotifications(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get notification details
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getNotificationDetails(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update notifications
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateNotifications(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update notification
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateNotification(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod('PATCH'); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to disable notifications
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function disableNotifications(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to disable notification
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function disableNotification(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/actions/watch'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod('PATCH'); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}
} 
