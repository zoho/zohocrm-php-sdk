<?php 
namespace com\zoho\crm\api\notification;

use com\zoho\crm\api\Param;

class DisableNotificationsParam
{

	public static final function channelIds()
	{
		return new Param('channel_ids', 'com.zoho.crm.api.Notification.DisableNotificationsParam'); 

	}
} 
