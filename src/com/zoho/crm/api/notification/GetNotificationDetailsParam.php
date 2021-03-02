<?php 
namespace com\zoho\crm\api\notification;

use com\zoho\crm\api\Param;

class GetNotificationDetailsParam
{

	public static final function page()
	{
		return new Param('page', 'com.zoho.crm.api.Notification.GetNotificationDetailsParam'); 

	}
	public static final function perPage()
	{
		return new Param('per_page', 'com.zoho.crm.api.Notification.GetNotificationDetailsParam'); 

	}
	public static final function channelId()
	{
		return new Param('channel_id', 'com.zoho.crm.api.Notification.GetNotificationDetailsParam'); 

	}
	public static final function module()
	{
		return new Param('module', 'com.zoho.crm.api.Notification.GetNotificationDetailsParam'); 

	}
} 
