<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Campaigns
{

	public static final function Status()
	{
		return new Field('Status'); 

	}
	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function CampaignName()
	{
		return new Field('Campaign_Name'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function EndDate()
	{
		return new Field('End_Date'); 

	}
	public static final function Type()
	{
		return new Field('Type'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function NumSent()
	{
		return new Field('Num_sent'); 

	}
	public static final function ExpectedRevenue()
	{
		return new Field('Expected_Revenue'); 

	}
	public static final function ActualCost()
	{
		return new Field('Actual_Cost'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function ExpectedResponse()
	{
		return new Field('Expected_Response'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function ParentCampaign()
	{
		return new Field('Parent_Campaign'); 

	}
	public static final function StartDate()
	{
		return new Field('Start_Date'); 

	}
	public static final function BudgetedCost()
	{
		return new Field('Budgeted_Cost'); 

	}
} 
