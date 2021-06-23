<?php 
namespace com\zoho\crm\api\contactroles;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class ContactRolesOperations
{

	/**
	 * The method to get contact roles
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getContactRoles()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to create contact roles
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function createContactRoles(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update contact roles
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateContactRoles(BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete contact roles
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deleteContactRoles(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get contact role
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getContactRole(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update contact role
	 * @param string $id A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateContactRole(string $id, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete contact role
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deleteContactRole(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Contacts/roles/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get all contact roles of deal
	 * @param string $dealId A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getAllContactRolesOfDeal(string $dealId, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Deals/'); 
		$apiPath=$apiPath.(strval($dealId)); 
		$apiPath=$apiPath.('/Contact_Roles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		Utility::getFields("Contacts"); 
		return $handlerInstance->apiCall(RecordResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get contact role of deal
	 * @param string $contactId A string
	 * @param string $dealId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getContactRoleOfDeal(string $contactId, string $dealId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Deals/'); 
		$apiPath=$apiPath.(strval($dealId)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contactId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		Utility::getFields("Contacts"); 
		return $handlerInstance->apiCall(RecordResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to add contact role to deal
	 * @param string $contactId A string
	 * @param string $dealId A string
	 * @param RecordBodyWrapper $request An instance of RecordBodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function addContactRoleToDeal(string $contactId, string $dealId, RecordBodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Deals/'); 
		$apiPath=$apiPath.(strval($dealId)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contactId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to remove contact role from deal
	 * @param string $contactId A string
	 * @param string $dealId A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function removeContactRoleFromDeal(string $contactId, string $dealId)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Deals/'); 
		$apiPath=$apiPath.(strval($dealId)); 
		$apiPath=$apiPath.('/Contact_Roles/'); 
		$apiPath=$apiPath.(strval($contactId)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}
} 
