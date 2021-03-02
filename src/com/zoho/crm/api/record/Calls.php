<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

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
