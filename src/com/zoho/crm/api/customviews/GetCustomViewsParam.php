<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\Param;

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
