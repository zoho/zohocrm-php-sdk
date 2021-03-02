<?php 
namespace com\zoho\crm\api\sharerecords;

use com\zoho\crm\api\Param;

class GetSharedRecordDetailsParam
{

	public static final function sharedTo()
	{
		return new Param('sharedTo', 'com.zoho.crm.api.ShareRecords.GetSharedRecordDetailsParam'); 

	}
	public static final function view()
	{
		return new Param('view', 'com.zoho.crm.api.ShareRecords.GetSharedRecordDetailsParam'); 

	}
} 
