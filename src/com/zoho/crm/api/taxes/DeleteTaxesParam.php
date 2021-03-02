<?php 
namespace com\zoho\crm\api\taxes;

use com\zoho\crm\api\Param;

class DeleteTaxesParam
{

	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Taxes.DeleteTaxesParam'); 

	}
} 
