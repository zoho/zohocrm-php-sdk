<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\Param;

class DeleteAttachmentsParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Attachments.DeleteAttachmentsParam'); 

	}
} 
