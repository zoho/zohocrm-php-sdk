<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Param;

class DelinkRecordsParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.RelatedRecords.DelinkRecordsParam'); 

	}
} 
