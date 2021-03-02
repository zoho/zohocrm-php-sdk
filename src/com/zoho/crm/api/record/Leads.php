<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\layouts\Layout;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Leads
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Company()
	{
		return new Field('Company'); 

	}
	public static final function Email()
	{
		return new Field('Email'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function Rating()
	{
		return new Field('Rating'); 

	}
	public static final function Website()
	{
		return new Field('Website'); 

	}
	public static final function Twitter()
	{
		return new Field('Twitter'); 

	}
	public static final function Salutation()
	{
		return new Field('Salutation'); 

	}
	public static final function LastActivityTime()
	{
		return new Field('Last_Activity_Time'); 

	}
	public static final function FirstName()
	{
		return new Field('First_Name'); 

	}
	public static final function FullName()
	{
		return new Field('Full_Name'); 

	}
	public static final function LeadStatus()
	{
		return new Field('Lead_Status'); 

	}
	public static final function Industry()
	{
		return new Field('Industry'); 

	}
	public static final function RecordImage()
	{
		return new Field('Record_Image'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function SkypeID()
	{
		return new Field('Skype_ID'); 

	}
	public static final function Phone()
	{
		return new Field('Phone'); 

	}
	public static final function Street()
	{
		return new Field('Street'); 

	}
	public static final function ZipCode()
	{
		return new Field('Zip_Code'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function EmailOptOut()
	{
		return new Field('Email_Opt_Out'); 

	}
	public static final function Designation()
	{
		return new Field('Designation'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function City()
	{
		return new Field('City'); 

	}
	public static final function NoOfEmployees()
	{
		return new Field('No_of_Employees'); 

	}
	public static final function Mobile()
	{
		return new Field('Mobile'); 

	}
	public static final function ConvertedDateTime()
	{
		return new Field('Converted_Date_Time'); 

	}
	public static final function LastName()
	{
		return new Field('Last_Name'); 

	}
	public static final function Layout()
	{
		return new Field('Layout'); 

	}
	public static final function State()
	{
		return new Field('State'); 

	}
	public static final function LeadSource()
	{
		return new Field('Lead_Source'); 

	}
	public static final function IsRecordDuplicate()
	{
		return new Field('Is_Record_Duplicate'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Fax()
	{
		return new Field('Fax'); 

	}
	public static final function AnnualRevenue()
	{
		return new Field('Annual_Revenue'); 

	}
	public static final function SecondaryEmail()
	{
		return new Field('Secondary_Email'); 

	}
} 
