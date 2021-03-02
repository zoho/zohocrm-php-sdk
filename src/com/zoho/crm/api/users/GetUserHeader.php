<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\Header;

class GetUserHeader
{

	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.Users.GetUserHeader'); 

	}
} 
