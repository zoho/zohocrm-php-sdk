<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class FieldsOperations
{

	private  $module;

	/**
	 * Creates an instance of FieldsOperations with the given parameters
	 * @param string $module A string
	 */
	public function __Construct(string $module=null)
	{
		$this->module=$module; 

	}

	/**
	 * The method to get fields
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getFields(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/fields'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.Fields.GetFieldsParam'), $this->module); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get field
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getField(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/fields/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addParam(new Param('module', 'com.zoho.crm.api.Fields.GetFieldParam'), $this->module); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
class GetFieldsParam
{
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Fields.GetFieldsParam'); 

	}

}

class GetFieldParam
{

}
