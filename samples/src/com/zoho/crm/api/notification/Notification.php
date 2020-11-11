<?php
namespace samples\src\com\zoho\crm\api\notification;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\notification\APIException;

use com\zoho\crm\api\notification\ActionWrapper;

use com\zoho\crm\api\notification\BodyWrapper;

use com\zoho\crm\api\notification\NotificationOperations;

use com\zoho\crm\api\notification\DisableNotificationsParam;

use com\zoho\crm\api\notification\GetNotificationDetailsParam;

use com\zoho\crm\api\notification\ResponseWrapper;

use com\zoho\crm\api\notification\SuccessResponse;

class Notification
{
	/**
	 * <h3> Enable Notifications </h3>
	 * This method is used to Enable Notifications and print the response.
	 * @throws Exception
	 */
	public static function enableNotifications()
	{
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Notification instances
		$notifications = array();
        
        $notificationClass = 'com\zoho\crm\api\notification\Notification';
        
        //Get instance of Notification Class
		$notification = new $notificationClass();
		
		//Set channel Id of the Notification
		$notification->setChannelId("100000006800211");
		
		$events = array();
		
		array_push($events, "Deals.all");
		
		//To subscribe based on particular operations on given modules.
		$notification->setEvents($events);
		
		//To set the expiry time for instant notifications. 
		$notification->setChannelExpiry(date_create("2019-05-07T15:32:24")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
		
		//To ensure that the notification is sent from Zoho CRM, by sending back the given value in notification URL body.
		//By using this value, user can validate the notifications.
		$notification->setToken("TOKEN_FOR_VERIFICATION_OF_1000000068002");
		
		//URL to be notified (POST request)
		$notification->setNotifyUrl("https://www.zohoapis.com");
		
		//Add Notification instance to the list
		array_push($notifications, $notification);
		
		//Get instance of Notification Class
		$notification2 = new $notificationClass();
		
		//Set channel Id of the Notification
		$notification2->setChannelId("100000006800211");
		
		$events2 = array();
		
		array_push($events2, "Accounts.all");
		
		//To subscribe based on particular operations on given modules.
		$notification2->setEvents($events2);
		
		//To set the expiry time for instant notifications. 
		$dateTime = date_create("2019-05-07T15:32:24")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
		
		$notification2->setChannelExpiry($dateTime);
		
		//To ensure that the notification is sent from Zoho CRM, by sending back the given value in notification URL body.
		//By using this value, user can validate the notifications.
		$notification2->setToken("TOKEN_FOR_VERIFICATION_OF_1000000068002");
		
		//URL to be notified (POST request)
		$notification2->setNotifyUrl("https://www.zohoapis.com");
		
		//Add Notification instance to the list
		array_push($notifications, $notification2);
		
		//Set the list to notifications in BodyWrapper instance
		$bodyWrapper->setWatch($notifications);
		
		//Call enableNotifications method that takes BodyWrapper instance as parameter 
		$response = $notificationOperations->enableNotifications($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode());
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper =  $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getWatch();
					
					foreach ($actionResponses as $actionResponse)
					{
						//Check if the request is successful
						if($actionResponse instanceof SuccessResponse)
						{
							//Get the received SuccessResponse instance
							$successResponse = $actionResponse;
							
							//Get the Status
							echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        
							//Get the Code
							echo("Code: " . $successResponse->getCode()->getValue() . "\n");
							
							echo("Details: " );
							
							//Get the details map
							foreach($successResponse->getDetails() as $keyName => $value)
							{
								if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
								{
									if($value[0] instanceof $notificationClass)
									{
										$eventList = $value;
										
										foreach($eventList as $event)
										{
											//Get the ChannelExpiry of each Notification
											echo("Notification ChannelExpiry: "); print_r($event->getChannelExpiry());
											
											//Get the ResourceUri each Notification
											echo("Notification ResourceUri: " . $event->getResourceUri() . "\n");
											
											//Get the ResourceId each Notification
											echo("Notification ResourceId: " . $event->getResourceId() . "\n");
											
											//Get the ResourceName each Notification
											echo("Notification ResourceName: " . $event->getResourceName() . "\n");
											
											//Get the ChannelId each Notification
											echo("Notification ChannelId: " . $event->getChannelId() . "\n");
										}
									}
								}
								else
								{
									//Get each value in the map
									echo($keyName . ": "); print_r($value);
								}
							}
							
							//Get the Message
							echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						}
						//Check if the request returned an exception
						else if($actionResponse instanceof APIException)
						{
							//Get the received APIException instance
							$exception = $actionResponse;
							
							//Get the Status
							echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        
							//Get the Code
							echo("Code: " . $exception->getCode()->getValue() . "\n");
							
							echo("Details: " );
							
							if($exception->getDetails() != null)
							{
								//Get the details map
								foreach ($exception->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}
							}
							
							//Get the Message
							echo("Message: " . $exception->getMessage()->getValue() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($actionHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $actionHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue() . "\n");
                
					//Get the Code
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					
					echo("Details: " );
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue() . "\n");
				}
			}
			else
			{//If response is not as expected
				
				//Get model object from response
				print_r($response);
			}
		}
	}
	
	/**
	 * <h3> Get Notification Details </h3>
	 * This method is used to get all the Notification and print the response.
	 * @throws Exception
	 */
	public static function getNotificationDetails()
	{
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetNotificationDetailsParam::channelId(), "100000006800211");
		
		$paramInstance->add(GetNotificationDetailsParam::module(), "Accounts");
		
		$paramInstance->add(GetNotificationDetailsParam::page(), 1);
		
		$paramInstance->add(GetNotificationDetailsParam::perPage(), 2);
		
		//Call getNotificationDetails method
		$response = $notificationOperations->getNotificationDetails($paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");

                return;
            }
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
				$responseHandler = $response->getObject();
				
				if($responseHandler instanceof ResponseWrapper)
				{
					//Get the received ResponseWrapper instance
					$responseWrapper = $responseHandler;
					
					//Get the list of obtained Notification instances
					$notifications = $responseWrapper->getWatch();
					
					foreach($notifications as $notification)
					{
						//Get the NotifyOnRelatedAction of each Notification
						echo("Notification NotifyOnRelatedAction: " . $notification->getNotifyOnRelatedAction() . "\n");
						
						//Get the ChannelExpiry of each Notification
						echo("Notification ChannelExpiry: "); print_r($notification->getChannelExpiry());
						
						//Get the ResourceUri each Notification
						echo("Notification ResourceUri: " . $notification->getResourceUri() . "\n");
						
						//Get the ResourceId each Notification
						echo("Notification ResourceId: " . $notification->getResourceId() . "\n");
						
						//Get the NotifyUrl each Notification
						echo("Notification NotifyUrl: " . $notification->getNotifyUrl() . "\n");
						
						//Get the ResourceName each Notification
						echo("Notification ResourceName: " . $notification->getResourceName() . "\n");
						
						//Get the ChannelId each Notification
						echo("Notification ChannelId: " . $notification->getChannelId() . "\n");
						
						//Get the events List of each Notification
						$fields = $notification->getEvents();
						
						//Check if fields is not null
						if($fields != null)
						{
							foreach($fields as $fieldName)
							{
								//Get the Events
								echo("Notification Events: " . $fieldName . "\n");
							}
						}
						
						//Get the Token each Notification
						echo("Notification Token: " . $notification->getToken() . "\n");
					}
					
					//Get the Object obtained Info instance
					$info = $responseWrapper->getInfo();
					
					//Check if info is not null
					if($info != null)
					{
						if($info->getPerPage() != null)
						{
							//Get the PerPage of the Info
							echo("Record Info PerPage: " . $info->getPerPage() . "\n");
						}
						
						if($info->getCount() != null)
						{
							//Get the Count of the Info
							echo("Record Info Count: " . $info->getCount() . "\n");
						}
	
						if($info->getPage() != null)
						{
							//Get the Page of the Info
							echo("Record Info Page: " . $info->getPage() . "\n");
						}
						
						if($info->getMoreRecords() != null)
						{
							//Get the MoreRecords of the Info
							echo("Record Info MoreRecords: " . $info->getMoreRecords() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($responseHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $responseHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue() . "\n");

					//Get the Code
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue() . "\n");
				}
			}
			else if($response->getStatusCode() != 204 )
			{//If response is not as expected
				print_r($response);
			}
		}
	}
	
	/**
	 * <h3> Update Notifications </h3>
	 * This method is used to update Notifications and print the response.
	 * @throws Exception
	 */
	public static function updateNotifications()
	{
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Notification instances
		$notificationList = array();

		$notificationClass = 'com\zoho\crm\api\notification\Notification';

		//Get instance of Notification Class
		$notification = new $notificationClass();
		
		//Set ChannelId to the Notification instance
		$notification->setChannelId("100000006800211");
		
        $events = array();
		
		array_push($events, "Accounts.all");
		
		//To subscribe based on particular operations on given modules.
		$notification->setEvents($events);
		
		//Set name to the Notification instance
		$notification->setChannelExpiry(date_create("2021-02-26T15:28:34+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
		
		//To ensure that the notification is sent from Zoho CRM, by sending back the given value in notification URL body.
		//By using this value, user can validate the notifications.
		$notification->setToken("TOKEN_FOR_VERIFICATION_OF_1000000068002");
		
		//URL to be notified (POST request)
		$notification->setNotifyUrl("https://www.zohoapis.com");
		
		//Add Notification instance to the list
		array_push($notificationList, $notification);
		
		//Set the list to notification in BodyWrapper instance
		$bodyWrapper->setWatch($notificationList);
		
		//Call updateNotifications method that takes BodyWrapper instance as parameter
		$response = $notificationOperations->updateNotifications($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode());
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getWatch();
					
					foreach($actionResponses as $actionResponse)
					{
						//Check if the request is successful
						if($actionResponse instanceof SuccessResponse)
						{
							//Get the received SuccessResponse instance
							$successResponse = $actionResponse;
							
							//Get the Status
							echo("Status: " . $successResponse->getStatus()->getValue());
							
							//Get the Code
							echo("Code: " . $successResponse->getCode()->getValue());
							
							echo("Details: " );
							
							//Get the details map
							foreach($successResponse->getDetails() as $keyName => $value)
							{
								if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
								{
									if($value[0] instanceof $notificationClass)
									{
										$eventList = $value;
										
										foreach($eventList as $event)
										{
											//Get the ChannelExpiry of each Notification
											echo("Notification ChannelExpiry: "); print_r($event->getChannelExpiry());
											
											//Get the ResourceUri each Notification
											echo("Notification ResourceUri: " . $event->getResourceUri() . "\n");
											
											//Get the ResourceId each Notification
											echo("Notification ResourceId: " . $event->getResourceId() . "\n");
											
											//Get the ResourceName each Notification
											echo("Notification ResourceName: " . $event->getResourceName() . "\n");
											
											//Get the ChannelId each Notification
											echo("Notification ChannelId: " . $event->getChannelId() . "\n");
										}
									}
								}
								else
								{
									//Get each value in the map
									echo($keyName . ": "); print_r($value);
								}
							}
							
							//Get the Message
							echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						}
						//Check if the request returned an exception
						else if($actionResponse instanceof APIException)
						{
							//Get the received APIException instance
							$exception = $actionResponse;
							
							//Get the Status
							echo("Status: " . $exception->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $exception->getCode()->getValue() . "\n");
							
							echo("Details: " );
							
							if($exception->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($exception->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $exception->getMessage()->getValue() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($actionHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $actionHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue() . "\n");
					
					//Get the Code
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					
					echo("Details: " );
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue() . "\n");
				}
			}
			else
			{//If response is not as expected
				print_r($response);
			}	
		}
	}
	
	/**
	 * <h3> Update Specific Information of a Notification </h3>
	 * This method is used to update single Notification and print the response.
	 * @throws Exception
	 */
	public static function updateNotification()
	{
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Notification instances
		$notificationList = array();

		//Get instance of Notification Class

		$notificationClass = 'com\zoho\crm\api\notification\Notification';

		$notification = new $notificationClass();
		
		//Set ChannelId to the Notification instance
		$notification->setChannelId("100000006800212");
		
        $events = array();
		
		array_push($events, "Deals.all");
		
		//To subscribe based on particular operations on given modules.
		$notification->setEvents($events);
		
		//Set name to the Notification instance
		$notification->setChannelExpiry(date_create("2021-02-26T15:28:34+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
		
		//To ensure that the notification is sent from Zoho CRM, by sending back the given value in notification URL body.
		//By using this value, user can validate the notifications.
		$notification->setToken("TOKEN_FOR_VERIFICATION_OF_1000000068002");
		
		//URL to be notified (POST request)
		$notification->setNotifyUrl("https://www.zohoapis.com");
		
		//Add Notification instance to the list
		array_push($notificationList, $notification);
		
		//Set the list to notification in BodyWrapper instance
		$bodyWrapper->setWatch($notificationList);
		
		//Call updateNotification method that takes BodyWrapper instance as parameters
		$response = $notificationOperations->updateNotification($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
			    $actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getWatch();
					
					foreach($actionResponses as $actionResponse)
					{
						//Check if the request is successful
						if($actionResponse instanceof SuccessResponse)
						{
							//Get the received SuccessResponse instance
							$successResponse = $actionResponse;
							
							//Get the Status
							echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $successResponse->getCode()->getValue() . "\n");
							
							echo("Details: \n");
							
							//Get the details map
							foreach($successResponse->getDetails() as $keyName => $value)
							{
								if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
								{
									if($value[0] instanceof $notificationClass)
									{
										$eventList = $value;
										
										foreach($eventList as $event)
										{
											//Get the ChannelExpiry of each Notification
											echo("Notification ChannelExpiry: "); print_r($event->getChannelExpiry());
											
											//Get the ResourceUri each Notification
											echo("Notification ResourceUri: " . $event->getResourceUri() . "\n");
											
											//Get the ResourceId each Notification
											echo("Notification ResourceId: " . $event->getResourceId() . "\n");
											
											//Get the ResourceName each Notification
											echo("Notification ResourceName: " . $event->getResourceName() . "\n");
											
											//Get the ChannelId each Notification
											echo("Notification ChannelId: " . $event->getChannelId() . "\n");
										}
									}
								}
								else
								{
									//Get each value in the map
									echo($keyName . ": " . $value);
								}
							}
							
							//Get the Message
							echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						}
						//Check if the request returned an exception
						else if($actionResponse instanceof APIException)
						{
							//Get the received APIException instance
							$exception = $actionResponse;
							
							//Get the Status
							echo("Status: " . $exception->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $exception->getCode()->getValue() . "\n");
							
							if($exception->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($exception->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $exception->getMessage()->getValue() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($actionHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $actionHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue());
					
					//Get the Code
					echo("Code: " . $exception->getCode()->getValue());
					
					echo("Details: " );
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue());
				}
			}
			else
			{//If response is not as expected
				print_r($response);
			}
		}
	}
	
	/**
	 * <h3> Disable Notifications </h3>
	 * To stop all the instant notifications enabled by the user for a channel.
	 * @param channelIds - Specify the unique IDs of the notification channels to be disabled.
	 * @throws Exception
	 */
	public static function disableNotifications(array $channelIds)
	{
		//example
		//$channelIds = array(3477061000005208001);
		
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($channelIds as $id)
		{
			$paramInstance->add(DisableNotificationsParam::channelIds(), $id);
		}
		
		//Call disableNotifications method that takes paramInstance as parameter 
		$response = $notificationOperations->disableNotifications($paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode());
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained Notification instances
					$actionResponses = $actionWrapper->getWatch();
					
					foreach($actionResponses as $actionResponse)
					{
						//Check if the request is successful
						if($actionResponse instanceof SuccessResponse)
						{
							//Get the received SuccessResponse instance
							$successResponse = $actionResponse;
							
							//Get the Status
							echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $successResponse->getCode()->getValue() . "\n");
							
							echo("Details: " );
							
							if($successResponse->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($successResponse->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						}
						//Check if the request returned an exception
						else if($actionResponse instanceof APIException)
						{
							//Get the received APIException instance
							$exception = $actionResponse;
							
							//Get the Status
							echo("Status: " . $exception->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $exception->getCode()->getValue() . "\n");
							
							echo("Details: " );
							
							if($exception->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($exception->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $exception->getMessage()->getValue() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($actionHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $actionHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue() . "\n");
					
					//Get the Code
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					
					echo("Details: " );
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue() . "\n");
				}
			}
			else
			{//If response is not as expected
				print_r($response);
			}
		}
	}
	
	/**
	 * <h3> Disable Specific Notifications </h3>
	 * This method is used to disable notifications for the specified events in a channel.
	 * @throws Exception
	 */
	public static function disableNotification()
	{
		//Get instance of NotificationOperations Class
		$notificationOperations = new NotificationOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Notification instances
		$notificationList = array();

		//Get instance of Notification Class
		$notificationClass = 'com\zoho\crm\api\notification\Notification';

		$notification = new $notificationClass();
		
		//Set ChannelId to the Notification instance
		$notification->setChannelId("100000006800211");
		
        $events = array();
		
		array_push($events, "Deals.edit");
		
		//To subscribe based on particular operations on given modules.
		$notification->setEvents($events);
		
		$notification->setDeleteevents(true);
		
		//Add Notification instance to the list
		array_push($notificationList, $notification);
		
		//Set the list to notification in BodyWrapper instance
		$bodyWrapper->setWatch($notificationList);
		
		//Call disableNotification which takes BodyWrapper instance as parameter
		$response = $notificationOperations->disableNotification($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getWatch();
					
					foreach($actionResponses as $actionResponse)
					{
						//Check if the request is successful
						if($actionResponse instanceof SuccessResponse)
						{
							//Get the received SuccessResponse instance
							$successResponse = $actionResponse;
							
							//Get the Status
							echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $successResponse->getCode()->getValue() . "\n");
							
							if($successResponse->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($successResponse->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
						}
						//Check if the request returned an exception
						else if($actionResponse instanceof APIException)
						{
							//Get the received APIException instance
							$exception = $actionResponse;
							
							//Get the Status
							echo("Status: " . $exception->getStatus()->getValue() . "\n");
							
							//Get the Code
							echo("Code: " . $exception->getCode()->getValue() . "\n");
							
							if($exception->getDetails() != null)
							{
								echo("Details: \n");
							
								//Get the details map
								foreach ($exception->getDetails() as $keyName => $keyValue) 
								{
									//Get each value in the map
									echo($keyName . ": " . $keyValue . "\n");
								}    
							}
							
							//Get the Message
							echo("Message: " . $exception->getMessage()->getValue() . "\n");
						}
					}
				}
				//Check if the request returned an exception
				else if($actionHandler instanceof APIException)
				{
					//Get the received APIException instance
					$exception = $actionHandler;
					
					//Get the Status
					echo("Status: " . $exception->getStatus()->getValue() . "\n");
					
					//Get the Code
					echo("Code: " . $exception->getCode()->getValue() . "\n");
					
					if($exception->getDetails() != null)
					{
						echo("Details: \n");
					
						//Get the details map
						foreach ($exception->getDetails() as $keyName => $keyValue) 
						{
							//Get each value in the map
							echo($keyName . ": " . $keyValue . "\n");
						}    
					}
					
					//Get the Message
					echo("Message: " . $exception->getMessage()->getValue() . "\n");
				}
			}
			else
			{//If response is not as expected
				print_r($response);
			}
		}
	}
}
