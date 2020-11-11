<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\Param;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Utility;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class RecordOperations
{

	/**
	 * The method to get record
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getRecord(string $id, string $moduleAPIName, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to update record
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateRecord(string $id, string $moduleAPIName, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete record
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deleteRecord(string $id, string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getRecords(string $moduleAPIName, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to create records
	 * @param string $moduleAPIName A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function createRecords(string $moduleAPIName, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to update records
	 * @param string $moduleAPIName A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function updateRecords(string $moduleAPIName, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_PUT); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deleteRecords(string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to upsert records
	 * @param string $moduleAPIName A string
	 * @param BodyWrapper $request An instance of BodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function upsertRecords(string $moduleAPIName, BodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/upsert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_ACTION); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get deleted records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @param HeaderMap $headerInstance An instance of HeaderMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getDeletedRecords(string $moduleAPIName, ParameterMap $paramInstance=null, HeaderMap $headerInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/deleted'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		$handlerInstance->setHeader($headerInstance); 
		return $handlerInstance->apiCall(DeletedRecordsHandler::class, 'application/json'); 

	}

	/**
	 * The method to search records
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function searchRecords(string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/search'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to convert lead
	 * @param string $id A string
	 * @param ConvertBodyWrapper $request An instance of ConvertBodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function convertLead(string $id, ConvertBodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/Leads/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/actions/convert'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		Utility::getFields("Deals"); 
		return $handlerInstance->apiCall(ConvertActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get photo
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getPhoto(string $id, string $moduleAPIName)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/photo'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		return $handlerInstance->apiCall(DownloadHandler::class, 'application/x-download'); 

	}

	/**
	 * The method to upload photo
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @param FileBodyWrapper $request An instance of FileBodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function uploadPhoto(string $id, string $moduleAPIName, FileBodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/photo'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_CREATE); 
		$handlerInstance->setContentType('multipart/form-data'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		return $handlerInstance->apiCall(FileHandler::class, 'application/json'); 

	}

	/**
	 * The method to delete photo
	 * @param string $id A string
	 * @param string $moduleAPIName A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function deletePhoto(string $id, string $moduleAPIName)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/'); 
		$apiPath=$apiPath.(strval($id)); 
		$apiPath=$apiPath.('/photo'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_DELETE); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_METHOD_DELETE); 
		return $handlerInstance->apiCall(FileHandler::class, 'application/json'); 

	}

	/**
	 * The method to mass update records
	 * @param string $moduleAPIName A string
	 * @param MassUpdateBodyWrapper $request An instance of MassUpdateBodyWrapper
	 * @return APIResponse An instance of APIResponse
	 */
	public  function massUpdateRecords(string $moduleAPIName, MassUpdateBodyWrapper $request)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/actions/mass_update'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_POST); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_UPDATE); 
		$handlerInstance->setContentType('application/json'); 
		$handlerInstance->setRequest($request); 
		$handlerInstance->setMandatoryChecker(true); 
		Utility::getFields($moduleAPIName); 
		$handlerInstance->setModuleAPIName($moduleAPIName); 
		return $handlerInstance->apiCall(MassUpdateActionHandler::class, 'application/json'); 

	}

	/**
	 * The method to get mass update status
	 * @param string $moduleAPIName A string
	 * @param ParameterMap $paramInstance An instance of ParameterMap
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getMassUpdateStatus(string $moduleAPIName, ParameterMap $paramInstance=null)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/'); 
		$apiPath=$apiPath.(strval($moduleAPIName)); 
		$apiPath=$apiPath.('/actions/mass_update'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->setParam($paramInstance); 
		return $handlerInstance->apiCall(MassUpdateResponseHandler::class, 'application/json'); 

	}
} 
class GetRecordParam
{
	public static final function approved()
	{
		return new Param('approved', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function converted()
	{
		return new Param('converted', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function cvid()
	{
		return new Param('cvid', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function uid()
	{
		return new Param('uid', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function startDateTime()
	{
		return new Param('startDateTime', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function endDateTime()
	{
		return new Param('endDateTime', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function territoryId()
	{
		return new Param('territory_id', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}
	public static final function includeChild()
	{
		return new Param('include_child', 'com.zoho.crm.api.Record.GetRecordParam'); 

	}

}

class GetRecordHeader
{
	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.Record.GetRecordHeader'); 

	}

}

class DeleteRecordParam
{
	public static final function wfTrigger()
	{
		return new Param('wf_trigger', 'com.zoho.crm.api.Record.DeleteRecordParam'); 

	}

}

class GetRecordsParam
{
	public static final function approved()
	{
		return new Param('approved', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function converted()
	{
		return new Param('converted', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function cvid()
	{
		return new Param('cvid', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function uid()
	{
		return new Param('uid', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function startDateTime()
	{
		return new Param('startDateTime', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function endDateTime()
	{
		return new Param('endDateTime', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function territoryId()
	{
		return new Param('territory_id', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function includeChild()
	{
		return new Param('include_child', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}

}

class GetRecordsHeader
{
	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.Record.GetRecordsHeader'); 

	}

}

class DeleteRecordsParam
{
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Record.DeleteRecordsParam'); 

	}
	public static final function wfTrigger()
	{
		return new Param('wf_trigger', 'com.zoho.crm.api.Record.DeleteRecordsParam'); 

	}

}

class GetDeletedRecordsParam
{
	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Record.GetDeletedRecordsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Record.GetDeletedRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Record.GetDeletedRecordsParam'); 

	}

}

class GetDeletedRecordsHeader
{
	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.Record.GetDeletedRecordsHeader'); 

	}

}

class SearchRecordsParam
{
	public static final function criteria()
	{
		return new Param('criteria', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function email()
	{
		return new Param('email', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function phone()
	{
		return new Param('phone', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function word()
	{
		return new Param('word', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function converted()
	{
		return new Param('converted', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function approved()
	{
		return new Param('approved', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Record.SearchRecordsParam'); 

	}

}

class GetMassUpdateStatusParam
{
	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.Record.GetMassUpdateStatusParam'); 

	}

}
