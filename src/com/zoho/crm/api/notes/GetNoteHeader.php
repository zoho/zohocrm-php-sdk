<?php 
namespace com\zoho\crm\api\notes;

use com\zoho\crm\api\Header;

class GetNoteHeader
{

	public static final function IfModifiedSince()
	{
		return new Header('If-Modified-Since', 'com.zoho.crm.api.Notes.GetNoteHeader'); 

	}
} 
