<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Solutions
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
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function Comments()
	{
		return new Field('Comments'); 

	}
	public static final function NoOfComments()
	{
		return new Field('No_of_comments'); 

	}
	public static final function ProductName()
	{
		return new Field('Product_Name'); 

	}
	public static final function AddComment()
	{
		return new Field('Add_Comment'); 

	}
	public static final function SolutionNumber()
	{
		return new Field('Solution_Number'); 

	}
	public static final function Answer()
	{
		return new Field('Answer'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function SolutionTitle()
	{
		return new Field('Solution_Title'); 

	}
	public static final function Published()
	{
		return new Field('Published'); 

	}
	public static final function Question()
	{
		return new Field('Question'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
} 
