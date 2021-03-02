<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\Param;

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
