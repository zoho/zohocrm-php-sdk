<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\Param;

class RemoveTagsFromRecordParam
{

	public static final function tagNames()
	{
		return new Param('tag_names', 'com.zoho.crm.api.Tags.RemoveTagsFromRecordParam'); 

	}
} 
