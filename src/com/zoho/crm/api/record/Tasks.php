<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\record\RemindAt;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

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
