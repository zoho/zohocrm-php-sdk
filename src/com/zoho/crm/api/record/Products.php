<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Products
{

	public static final function ProductCategory()
	{
		return new Field('Product_Category'); 

	}
	public static final function QtyInDemand()
	{
		return new Field('Qty_in_Demand'); 

	}
	public static final function Owner()
	{
		return new Field('Owner'); 

	}
	public static final function Description()
	{
		return new Field('Description'); 

	}
	public static final function VendorName()
	{
		return new Field('Vendor_Name'); 

	}
	public static final function Tax()
	{
		return new Field('Tax'); 

	}
	public static final function SalesStartDate()
	{
		return new Field('Sales_Start_Date'); 

	}
	public static final function ProductActive()
	{
		return new Field('Product_Active'); 

	}
	public static final function RecordImage()
	{
		return new Field('Record_Image'); 

	}
	public static final function ModifiedBy()
	{
		return new Field('Modified_By'); 

	}
	public static final function ProductCode()
	{
		return new Field('Product_Code'); 

	}
	public static final function Manufacturer()
	{
		return new Field('Manufacturer'); 

	}
	public static final function id()
	{
		return new Field('id'); 

	}
	public static final function SupportExpiryDate()
	{
		return new Field('Support_Expiry_Date'); 

	}
	public static final function ModifiedTime()
	{
		return new Field('Modified_Time'); 

	}
	public static final function CreatedTime()
	{
		return new Field('Created_Time'); 

	}
	public static final function CommissionRate()
	{
		return new Field('Commission_Rate'); 

	}
	public static final function ProductName()
	{
		return new Field('Product_Name'); 

	}
	public static final function Handler()
	{
		return new Field('Handler'); 

	}
	public static final function SupportStartDate()
	{
		return new Field('Support_Start_Date'); 

	}
	public static final function UsageUnit()
	{
		return new Field('Usage_Unit'); 

	}
	public static final function QtyOrdered()
	{
		return new Field('Qty_Ordered'); 

	}
	public static final function QtyInStock()
	{
		return new Field('Qty_in_Stock'); 

	}
	public static final function CreatedBy()
	{
		return new Field('Created_By'); 

	}
	public static final function Tag()
	{
		return new Field('Tag'); 

	}
	public static final function SalesEndDate()
	{
		return new Field('Sales_End_Date'); 

	}
	public static final function UnitPrice()
	{
		return new Field('Unit_Price'); 

	}
	public static final function Taxable()
	{
		return new Field('Taxable'); 

	}
	public static final function ReorderLevel()
	{
		return new Field('Reorder_Level'); 

	}
} 
