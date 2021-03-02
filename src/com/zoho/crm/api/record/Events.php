<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Participants;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;

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
