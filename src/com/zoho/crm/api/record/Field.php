<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\layouts\Layout;
use com\zoho\crm\api\record\InventoryLineItems;
use com\zoho\crm\api\record\Participants;
use com\zoho\crm\api\record\PricingDetails;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\record\RemindAt;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Field
{

	private  $apiName;

	/**
	 * Creates an instance of Field with the given parameters
	 * @param string $apiName A string
	 */
	public function __Construct(string $apiName)
	{
		$this->apiName=$apiName; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}
} 
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


class Tasks
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
		public static final function DueDate()
		{
			return new Field('Due_Date'); 

		}
		public static final function Priority()
		{
			return new Field('Priority'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function ClosedTime()
		{
			return new Field('Closed_Time'); 

		}
		public static final function Subject()
		{
			return new Field('Subject'); 

		}
		public static final function SendNotificationEmail()
		{
			return new Field('Send_Notification_Email'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function RecurringActivity()
		{
			return new Field('Recurring_Activity'); 

		}
		public static final function WhatId()
		{
			return new Field('What_Id'); 

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
		public static final function RemindAt()
		{
			return new Field('Remind_At'); 

		}
		public static final function WhoId()
		{
			return new Field('Who_Id'); 

		}
} 


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


class Calls
{

		public static final function CallDuration()
		{
			return new Field('Call_Duration'); 

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
		public static final function Reminder()
		{
			return new Field('Reminder'); 

		}
		public static final function CallerID()
		{
			return new Field('Caller_ID'); 

		}
		public static final function CTIEntry()
		{
			return new Field('CTI_Entry'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function CallStartTime()
		{
			return new Field('Call_Start_Time'); 

		}
		public static final function Subject()
		{
			return new Field('Subject'); 

		}
		public static final function CallAgenda()
		{
			return new Field('Call_Agenda'); 

		}
		public static final function CallResult()
		{
			return new Field('Call_Result'); 

		}
		public static final function CallType()
		{
			return new Field('Call_Type'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function WhatId()
		{
			return new Field('What_Id'); 

		}
		public static final function CallDurationInSeconds()
		{
			return new Field('Call_Duration_in_seconds'); 

		}
		public static final function CallPurpose()
		{
			return new Field('Call_Purpose'); 

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
		public static final function DialledNumber()
		{
			return new Field('Dialled_Number'); 

		}
		public static final function CallStatus()
		{
			return new Field('Call_Status'); 

		}
		public static final function WhoId()
		{
			return new Field('Who_Id'); 

		}
} 


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


class Deals
{

		public static final function Owner()
		{
			return new Field('Owner'); 

		}
		public static final function Description()
		{
			return new Field('Description'); 

		}
		public static final function CampaignSource()
		{
			return new Field('Campaign_Source'); 

		}
		public static final function ClosingDate()
		{
			return new Field('Closing_Date'); 

		}
		public static final function LastActivityTime()
		{
			return new Field('Last_Activity_Time'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function LeadConversionTime()
		{
			return new Field('Lead_Conversion_Time'); 

		}
		public static final function DealName()
		{
			return new Field('Deal_Name'); 

		}
		public static final function ExpectedRevenue()
		{
			return new Field('Expected_Revenue'); 

		}
		public static final function OverallSalesDuration()
		{
			return new Field('Overall_Sales_Duration'); 

		}
		public static final function Stage()
		{
			return new Field('Stage'); 

		}
		public static final function id()
		{
			return new Field('id'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

		}
		public static final function Territory()
		{
			return new Field('Territory'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function Amount()
		{
			return new Field('Amount'); 

		}
		public static final function Probability()
		{
			return new Field('Probability'); 

		}
		public static final function NextStep()
		{
			return new Field('Next_Step'); 

		}
		public static final function ContactName()
		{
			return new Field('Contact_Name'); 

		}
		public static final function SalesCycleDuration()
		{
			return new Field('Sales_Cycle_Duration'); 

		}
		public static final function Type()
		{
			return new Field('Type'); 

		}
		public static final function DealCategoryStatus()
		{
			return new Field('Deal_Category_Status'); 

		}
		public static final function LeadSource()
		{
			return new Field('Lead_Source'); 

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


class Quotes
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
		public static final function ValidTill()
		{
			return new Field('Valid_Till'); 

		}
		public static final function BillingCountry()
		{
			return new Field('Billing_Country'); 

		}
		public static final function AccountName()
		{
			return new Field('Account_Name'); 

		}
		public static final function Team()
		{
			return new Field('Team'); 

		}
		public static final function id()
		{
			return new Field('id'); 

		}
		public static final function Carrier()
		{
			return new Field('Carrier'); 

		}
		public static final function QuoteStage()
		{
			return new Field('Quote_Stage'); 

		}
		public static final function GrandTotal()
		{
			return new Field('Grand_Total'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

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
		public static final function QuoteNumber()
		{
			return new Field('Quote_Number'); 

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
		public static final function ShippingStreet()
		{
			return new Field('Shipping_Street'); 

		}
} 


class Invoices
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
		public static final function ShippingState()
		{
			return new Field('Shipping_State'); 

		}
		public static final function Tax()
		{
			return new Field('Tax'); 

		}
		public static final function InvoiceDate()
		{
			return new Field('Invoice_Date'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

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
		public static final function SalesOrder()
		{
			return new Field('Sales_Order'); 

		}
		public static final function Status()
		{
			return new Field('Status'); 

		}
		public static final function GrandTotal()
		{
			return new Field('Grand_Total'); 

		}
		public static final function SalesCommission()
		{
			return new Field('Sales_Commission'); 

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
		public static final function InvoiceNumber()
		{
			return new Field('Invoice_Number'); 

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
		public static final function ShippingStreet()
		{
			return new Field('Shipping_Street'); 

		}
} 


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


class Price_Books
{

		public static final function Owner()
		{
			return new Field('Owner'); 

		}
		public static final function Active()
		{
			return new Field('Active'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

		}
		public static final function PricingDetails()
		{
			return new Field('Pricing_Details'); 

		}
		public static final function PricingModel()
		{
			return new Field('Pricing_Model'); 

		}
		public static final function Description()
		{
			return new Field('Description'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function PriceBookName()
		{
			return new Field('Price_Book_Name'); 

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


class Contacts
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
		public static final function VendorName()
		{
			return new Field('Vendor_Name'); 

		}
		public static final function MailingZip()
		{
			return new Field('Mailing_Zip'); 

		}
		public static final function ReportsTo()
		{
			return new Field('Reports_To'); 

		}
		public static final function OtherPhone()
		{
			return new Field('Other_Phone'); 

		}
		public static final function MailingState()
		{
			return new Field('Mailing_State'); 

		}
		public static final function Twitter()
		{
			return new Field('Twitter'); 

		}
		public static final function OtherZip()
		{
			return new Field('Other_Zip'); 

		}
		public static final function MailingStreet()
		{
			return new Field('Mailing_Street'); 

		}
		public static final function OtherState()
		{
			return new Field('Other_State'); 

		}
		public static final function Salutation()
		{
			return new Field('Salutation'); 

		}
		public static final function OtherCountry()
		{
			return new Field('Other_Country'); 

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
		public static final function AsstPhone()
		{
			return new Field('Asst_Phone'); 

		}
		public static final function RecordImage()
		{
			return new Field('Record_Image'); 

		}
		public static final function Department()
		{
			return new Field('Department'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function SkypeID()
		{
			return new Field('Skype_ID'); 

		}
		public static final function Assistant()
		{
			return new Field('Assistant'); 

		}
		public static final function Phone()
		{
			return new Field('Phone'); 

		}
		public static final function MailingCountry()
		{
			return new Field('Mailing_Country'); 

		}
		public static final function AccountName()
		{
			return new Field('Account_Name'); 

		}
		public static final function id()
		{
			return new Field('id'); 

		}
		public static final function EmailOptOut()
		{
			return new Field('Email_Opt_Out'); 

		}
		public static final function ReportingTo()
		{
			return new Field('Reporting_To'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

		}
		public static final function DateOfBirth()
		{
			return new Field('Date_of_Birth'); 

		}
		public static final function MailingCity()
		{
			return new Field('Mailing_City'); 

		}
		public static final function OtherCity()
		{
			return new Field('Other_City'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function Title()
		{
			return new Field('Title'); 

		}
		public static final function OtherStreet()
		{
			return new Field('Other_Street'); 

		}
		public static final function Mobile()
		{
			return new Field('Mobile'); 

		}
		public static final function Territories()
		{
			return new Field('Territories'); 

		}
		public static final function HomePhone()
		{
			return new Field('Home_Phone'); 

		}
		public static final function LastName()
		{
			return new Field('Last_Name'); 

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
		public static final function SecondaryEmail()
		{
			return new Field('Secondary_Email'); 

		}
} 


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


class Events
{

		public static final function AllDay()
		{
			return new Field('All_day'); 

		}
		public static final function Owner()
		{
			return new Field('Owner'); 

		}
		public static final function CheckInState()
		{
			return new Field('Check_In_State'); 

		}
		public static final function CheckInAddress()
		{
			return new Field('Check_In_Address'); 

		}
		public static final function Description()
		{
			return new Field('Description'); 

		}
		public static final function StartDateTime()
		{
			return new Field('Start_DateTime'); 

		}
		public static final function Latitude()
		{
			return new Field('Latitude'); 

		}
		public static final function Participants()
		{
			return new Field('Participants'); 

		}
		public static final function EventTitle()
		{
			return new Field('Event_Title'); 

		}
		public static final function EndDateTime()
		{
			return new Field('End_DateTime'); 

		}
		public static final function CheckInBy()
		{
			return new Field('Check_In_By'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function CheckInCity()
		{
			return new Field('Check_In_City'); 

		}
		public static final function id()
		{
			return new Field('id'); 

		}
		public static final function CheckInComment()
		{
			return new Field('Check_In_Comment'); 

		}
		public static final function RemindAt()
		{
			return new Field('Remind_At'); 

		}
		public static final function WhoId()
		{
			return new Field('Who_Id'); 

		}
		public static final function CheckInStatus()
		{
			return new Field('Check_In_Status'); 

		}
		public static final function CheckInCountry()
		{
			return new Field('Check_In_Country'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

		}
		public static final function Venue()
		{
			return new Field('Venue'); 

		}
		public static final function ZIPCode()
		{
			return new Field('ZIP_Code'); 

		}
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

		}
		public static final function Longitude()
		{
			return new Field('Longitude'); 

		}
		public static final function CheckInTime()
		{
			return new Field('Check_In_Time'); 

		}
		public static final function RecurringActivity()
		{
			return new Field('Recurring_Activity'); 

		}
		public static final function WhatId()
		{
			return new Field('What_Id'); 

		}
		public static final function CheckInSubLocality()
		{
			return new Field('Check_In_Sub_Locality'); 

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


class Purchase_Orders
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
		public static final function VendorName()
		{
			return new Field('Vendor_Name'); 

		}
		public static final function ShippingState()
		{
			return new Field('Shipping_State'); 

		}
		public static final function Tax()
		{
			return new Field('Tax'); 

		}
		public static final function PODate()
		{
			return new Field('PO_Date'); 

		}
		public static final function ModifiedBy()
		{
			return new Field('Modified_By'); 

		}
		public static final function BillingCountry()
		{
			return new Field('Billing_Country'); 

		}
		public static final function id()
		{
			return new Field('id'); 

		}
		public static final function Carrier()
		{
			return new Field('Carrier'); 

		}
		public static final function Status()
		{
			return new Field('Status'); 

		}
		public static final function GrandTotal()
		{
			return new Field('Grand_Total'); 

		}
		public static final function SalesCommission()
		{
			return new Field('Sales_Commission'); 

		}
		public static final function ModifiedTime()
		{
			return new Field('Modified_Time'); 

		}
		public static final function PONumber()
		{
			return new Field('PO_Number'); 

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
		public static final function TrackingNumber()
		{
			return new Field('Tracking_Number'); 

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
		public static final function RequisitionNo()
		{
			return new Field('Requisition_No'); 

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
		public static final function ShippingStreet()
		{
			return new Field('Shipping_Street'); 

		}
} 


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


class Notes
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
		public static final function CreatedTime()
		{
			return new Field('Created_Time'); 

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
		public static final function NoteTitle()
		{
			return new Field('Note_Title'); 

		}
		public static final function NoteContent()
		{
			return new Field('Note_Content'); 

		}
} 

