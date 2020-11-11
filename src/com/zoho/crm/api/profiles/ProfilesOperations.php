<?php 
namespace com\zoho\crm\api\profiles;

use com\zoho\crm\api\Header;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\CommonAPIHandler;
use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\APIResponse;

class ProfilesOperations
{

	private  $ifModifiedSince;

	/**
	 * Creates an instance of ProfilesOperations with the given parameters
	 * @param \DateTime $ifModifiedSince An instance of \DateTime
	 */
	public function __Construct(\DateTime $ifModifiedSince=null)
	{
		$this->ifModifiedSince=$ifModifiedSince; 

	}

	/**
	 * The method to get profiles
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getProfiles()
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/profiles'); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addHeader(new Header('If-Modified-Since', 'com.zoho.crm.api.Profiles.GetProfilesHeader'), $this->ifModifiedSince); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}

	/**
	 * The method to get profile
	 * @param string $id A string
	 * @return APIResponse An instance of APIResponse
	 */
	public  function getProfile(string $id)
	{
		$handlerInstance=new CommonAPIHandler(); 
		$apiPath=""; 
		$apiPath=$apiPath.('/crm/v2/settings/profiles/'); 
		$apiPath=$apiPath.(strval($id)); 
		$handlerInstance->setAPIPath($apiPath); 
		$handlerInstance->setHttpMethod(Constants::REQUEST_METHOD_GET); 
		$handlerInstance->setCategoryMethod(Constants::REQUEST_CATEGORY_READ); 
		$handlerInstance->addHeader(new Header('If-Modified-Since', 'com.zoho.crm.api.Profiles.GetProfileHeader'), $this->ifModifiedSince); 
		return $handlerInstance->apiCall(ResponseHandler::class, 'application/json'); 

	}
} 
class GetProfilesHeader
{

}

class GetProfileHeader
{

}
