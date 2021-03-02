<?php 
namespace com\zoho\crm\api\file;

use com\zoho\crm\api\Param;

class UploadFilesParam
{

	public static final function type()
	{
		return new Param('type', 'com.zoho.crm.api.File.UploadFilesParam'); 

	}
} 
