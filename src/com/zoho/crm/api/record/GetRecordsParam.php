<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Param;

class GetRecordsParam
{

	public static final function approved()
	{
		return new Param('approved', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function converted()
	{
		return new Param('converted', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function cvid()
	{
		return new Param('cvid', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function ids()
	{
		return new Param('ids', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function uid()
	{
		return new Param('uid', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function fields()
	{
		return new Param('fields', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function sortBy()
	{
		return new Param('sort_by', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function sortOrder()
	{
		return new Param('sort_order', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function startDateTime()
	{
		return new Param('startDateTime', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function endDateTime()
	{
		return new Param('endDateTime', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function territoryId()
	{
		return new Param('territory_id', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
	public static final function includeChild()
	{
		return new Param('include_child', 'com.zoho.crm.api.Record.GetRecordsParam'); 

	}
} 
