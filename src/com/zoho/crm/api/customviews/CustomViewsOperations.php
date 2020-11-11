<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class CustomViewsOperations
{

	private  $module;

	/**
	 * Creates an instance of CustomViewsOperations with the given parameters
	 * @param string $module A string
	 */
	public function __Construct(string $module=null)
	{
		$this->module=$module; 

	}

	/**
	 * The method to get custom views
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getCustomViews(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/custom_views'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.CustomViews.GetCustomViewsParam'), $this->module); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get custom view
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getCustomView(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/custom_views/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.CustomViews.GetCustomViewParam'), $this->module); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
class GetCustomViewsParam
{
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.CustomViews.GetCustomViewsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.CustomViews.GetCustomViewsParam'); 

	}

}

class GetCustomViewParam
{

}
