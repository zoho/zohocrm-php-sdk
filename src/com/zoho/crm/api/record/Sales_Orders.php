<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\InventoryLineItems;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Sales_Orders
{

	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Discount()
	{
		return new Field('Discount'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function CustomerNo()
	{
		return new Field('Customer_No'); 

	}
	public static final function ShippingState()
	{
		return new Field('Shipping_State'); 

	}
	public static final function Tax()
	{
		return new Field('Tax'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function DealName()
	{
		return new Field('Deal_Name'); 

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
	public static final function Carrier()
	{
		return new Field('Carrier'); 

	}
	public static final function QuoteName()
	{
		return new Field('Quote_Name'); 

	}
	public static final function Status()
	{
		return new Field('Status'); 

	}
	public static final function SalesCommission()
	{
		return new Field('Sales_Commission'); 

	}
	public static final function GrandTotal()
	{
		return new Field('Grand_Total'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function DueDate()
	{
		return new Field('Due_Date'); 

	}
	public static final function BillingStreet()
	{
		return new Field('Billing_Street'); 

	}
	public static final function Adjustment()
	{
		return new Field('Adjustment'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function TermsAndConditions()
	{
		return new Field('Terms_and_Conditions'); 

	}
	public static final function SubTotal()
	{
		return new Field('Sub_Total'); 

	}
	public static final function BillingCode()
	{
		return new Field('Billing_Code'); 

	}
	public static final function ProductDetails()
	{
		return new Field('Product_Details'); 

	}
	public static final function Subject()
	{
		return new Field('Subject'); 

	}
	public static final function ContactName()
	{
		return new Field('Contact_Name'); 

	}
	public static final function ExciseDuty()
	{
		return new Field('Excise_Duty'); 

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
	public static final function SONumber()
	{
		return new Field('SO_Number'); 

	}
	public static final function PurchaseOrder()
	{
		return new Field('Purchase_Order'); 

	}
	public static final function BillingState()
	{
		return new Field('Billing_State'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function Pending()
	{
		return new Field('Pending'); 

	}
	public static final function ShippingStreet()
	{
		return new Field('Shipping_Street'); 

	}
} 
