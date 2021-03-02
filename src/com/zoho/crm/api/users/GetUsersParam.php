<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\Param;

class GetUsersParam
{

	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.Users.GetUsersParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Users.GetUsersParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Users.GetUsersParam'); 

	}
} 
