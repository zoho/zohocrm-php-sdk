<?php 
namespace com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\Param;

class GetRelatedRecordsParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.RelatedRecords.GetRelatedRecordsParam'); 

	}
} 
