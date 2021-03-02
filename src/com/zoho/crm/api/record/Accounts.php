<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Accounts
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Ownership()
	{
		return new Field('Ownership'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function AccountType()
	{
		return new Field('Account_Type'); 

	}
	public static final function Rating()
	{
		return new Field('Rating'); 

	}
	public static final function SICCode()
	{
		return new Field('SIC_Code'); 

	}
	public static final function ShippingState()
	{
		return new Field('Shipping_State'); 

	}
	public static final function Website()
	{
		return new Field('Website'); 

	}
	public static final function Employees()
	{
		return new Field('Employees'); 

	}
	public static final function LastActivityTime()
	{
		return new Field('Last_Activity_Time'); 

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
	public static final function AccountSite()
	{
		return new Field('Account_Site'); 

	}
	public static final function Phone()
	{
		return new Field('Phone'); 

	}
	public static final function BillingCountry()
	{
		return new Field('Billing_Country'); 

	}
	public static final function AccountName()
	{
		return new Field('Account_Name'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function AccountNumber()
	{
		return new Field('Account_Number'); 

	}
	public static final function TickerSymbol()
	{
		return new Field('Ticker_Symbol'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function BillingStreet()
	{
		return new Field('Billing_Street'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function BillingCode()
	{
		return new Field('Billing_Code'); 

	}
	public static final function Territories()
	{
		return new Field('Territories'); 

	}
	public static final function ParentAccount()
	{
		return new Field('Parent_Account'); 

	}
	public static final function ShippingCity()
	{
		return new Field('Shipping_City'); 

	}
	public static final function ShippingCountry()
	{
		return new Field('Shipping_Country'); 

	}
	public static final function ShippingCode()
	{
		return new Field('Shipping_Code'); 

	}
	public static final function BillingCity()
	{
		return new Field('Billing_City'); 

	}
	public static final function BillingState()
	{
		return new Field('Billing_State'); 

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
	public static final function ShippingStreet()
	{
		return new Field('Shipping_Street'); 

	}
} 
