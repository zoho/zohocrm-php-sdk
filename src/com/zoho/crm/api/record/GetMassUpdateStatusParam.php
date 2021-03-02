<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Param;

class GetMassUpdateStatusParam
{

	public static final function jobId()
	{
		return new Param('job_id', 'com.zoho.crm.api.Record.GetMassUpdateStatusParam'); 

	}
} 
