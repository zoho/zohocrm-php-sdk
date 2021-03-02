<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\User;

class Attachments
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function FileName()
	{
		return new Field('File_Name'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function Size()
	{
		return new Field('Size'); 

	}
	public static final function ParentId()
	{
		return new Field('Parent_Id'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
} 
