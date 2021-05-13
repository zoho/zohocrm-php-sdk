<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Header;

class SearchRecordsHeader
{

	public static final function XEXTERNAL()
	{
		return new Header('X-EXTERNAL', 'com.zoho.crm.api.Record.SearchRecordsHeader'); 

	}
} 
