<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Cases
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Email()
	{
		return new Field('Email'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function InternalComments()
	{
		return new Field('Internal_Comments'); 

	}
	public static final function NoOfComments()
	{
		return new Field('No_of_comments'); 

	}
	public static final function ReportedBy()
	{
		return new Field('Reported_By'); 

	}
	public static final function CaseNumber()
	{
		return new Field('Case_Number'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function DealName()
	{
		return new Field('Deal_Name'); 

	}
	public static final function Phone()
	{
		return new Field('Phone'); 

	}
	public static final function AccountName()
	{
		return new Field('Account_Name'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function Solution()
	{
		return new Field('Solution'); 

	}
	public static final function Status()
	{
		return new Field('Status'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Priority()
	{
		return new Field('Priority'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function Comments()
	{
		return new Field('Comments'); 

	}
	public static final function ProductName()
	{
		return new Field('Product_Name'); 

	}
	public static final function AddComment()
	{
		return new Field('Add_Comment'); 

	}
	public static final function CaseOrigin()
	{
		return new Field('Case_Origin'); 

	}
	public static final function Subject()
	{
		return new Field('Subject'); 

	}
	public static final function CaseReason()
	{
		return new Field('Case_Reason'); 

	}
	public static final function Type()
	{
		return new Field('Type'); 

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
	public static final function RelatedTo()
	{
		return new Field('Related_To'); 

	}
} 
