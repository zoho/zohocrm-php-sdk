<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Vendors
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function Email()
	{
		return new Field('Email'); 

	}
	public static final function Category()
	{
		return new Field('Category'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function VendorName()
	{
		return new Field('Vendor_Name'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function Website()
	{
		return new Field('Website'); 

	}
	public static final function City()
	{
		return new Field('City'); 

	}
	public static final function RecordImage()
	{
		return new Field('Record_Image'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function Phone()
	{
		return new Field('Phone'); 

	}
	public static final function State()
	{
		return new Field('State'); 

	}
	public static final function GLAccount()
	{
		return new Field('GL_Account'); 

	}
	public static final function Street()
	{
		return new Field('Street'); 

	}
	public static final function Country()
	{
		return new Field('Country'); 

	}
	public static final function ZipCode()
	{
		return new Field('Zip_Code'); 

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
