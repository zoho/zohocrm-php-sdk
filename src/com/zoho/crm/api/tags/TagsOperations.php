<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class TagsOperations
{

	/**
	 * The method to get tags
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getTags(ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to create tags
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function createTags(BodyWrapper $request, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update tags
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateTags(BodyWrapper $request, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update tag
	 * @param string $id A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateTag(string $id, BodyWrapper $request, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete tag
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deleteTag(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to merge tags
	 * @param string $id A string
	 * @param MergeWrapper $request An instance of MergeWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function mergeTags(string $id, MergeWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/merge'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to add tags to record
	 * @param string $recordId A string
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function addTagsToRecord(string $recordId, string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/actions/add_tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to remove tags from record
	 * @param string $recordId A string
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function removeTagsFromRecord(string $recordId, string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($recordId)); 
		$apiPath=$apiPath.('/actions/remove_tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to add tags to multiple records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function addTagsToMultipleRecords(string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/actions/add_tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to remove tags from multiple records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function removeTagsFromMultipleRecords(string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/actions/remove_tags'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setMandatoryChecker(true); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(RecordActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get record count for tag
	 * @param string $id A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getRecordCountForTag(string $id, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/tags/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/records_count'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(CountHandler::class, 'application/json'); 

	}
} 
class GetTagsParam
{
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.GetTagsParam'); 

	}
	public static final function myTags()
	{
		return new Param('my_tags', 'com.zoho.crm.api.Tags.GetTagsParam'); 

	}

}

class CreateTagsParam
{
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.CreateTagsParam'); 

	}

}

class UpdateTagsParam
{
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.UpdateTagsParam'); 

	}

}

class UpdateTagParam
{
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.UpdateTagParam'); 

	}

}

class AddTagsToRecordParam
{
	public static final function tagNames()
	{
		return new Param('tag_names', 'com.zoho.crm.api.Tags.AddTagsToRecordParam'); 

	}
	public static final function overWrite()
	{
		return new Param('over_write', 'com.zoho.crm.api.Tags.AddTagsToRecordParam'); 

	}

}

class RemoveTagsFromRecordParam
{
	public static final function tagNames()
	{
		return new Param('tag_names', 'com.zoho.crm.api.Tags.RemoveTagsFromRecordParam'); 

	}

}

class AddTagsToMultipleRecordsParam
{
	public static final function tagNames()
	{
		return new Param('tag_names', 'com.zoho.crm.api.Tags.AddTagsToMultipleRecordsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Tags.AddTagsToMultipleRecordsParam'); 

	}
	public static final function overWrite()
	{
		return new Param('over_write', 'com.zoho.crm.api.Tags.AddTagsToMultipleRecordsParam'); 

	}

}

class RemoveTagsFromMultipleRecordsParam
{
	public static final function tagNames()
	{
		return new Param('tag_names', 'com.zoho.crm.api.Tags.RemoveTagsFromMultipleRecordsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Tags.RemoveTagsFromMultipleRecordsParam'); 

	}

}

class GetRecordCountForTagParam
{
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Tags.GetRecordCountForTagParam'); 

	}

}
