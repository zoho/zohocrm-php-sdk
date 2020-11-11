<?php
namespace samples\src\com\zoho\crm\api\sharerecords;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\modules\Module;

use com\zoho\crm\api\sharerecords\APIException;

use com\zoho\crm\api\sharerecords\ActionWrapper;

use com\zoho\crm\api\sharerecords\BodyWrapper;

use com\zoho\crm\api\sharerecords\DeleteActionWrapper;

use com\zoho\crm\api\sharerecords\ResponseWrapper;

use com\zoho\crm\api\sharerecords\ShareRecord;

use com\zoho\crm\api\sharerecords\ShareRecordsOperations;

use com\zoho\crm\api\sharerecords\GetSharedRecordDetailsParam;

use com\zoho\crm\api\sharerecords\SharedThrough;

use com\zoho\crm\api\sharerecords\SuccessResponse;

use com\zoho\crm\api\users\User;

class ShareRecords
{
	/**
	 * <h3> Get Shared Record Details </h3>
	 * This method is used to get the details of a shared record and print the response.
	 * @param moduleAPIName - The API Name of the module to get shared record details.
	 * @param recordId - The ID of the record to be obtained.
	 * @throws Exception
	 */
	public static function getSharedRecordDetails(string $moduleAPIName, string $recordId)
	{
		//example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		
		//Get instance of ShareRecordsOperations Class that takes moduleAPIName and recordId as parameter
	    $shareRecordsOperations = new ShareRecordsOperations( $recordId,$moduleAPIName);
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetSharedRecordDetailsParam::view(), "summary");
		
		// $paramInstance->add(GetSharedRecordDetailsParam::sharedTo(), "3477061000005791024");
		
		//Call getSharedRecordDetails method that takes paramInstance as parameter
		$response = $shareRecordsOperations->getSharedRecordDetails($paramInstance);
		
		if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");

                return;
            }
            
            //Get object from response
            $responseHandler = $response->getObject();
            
            if($responseHandler instanceof ResponseWrapper)
            {
                //Get the received ResponseWrapper instance
                $responseWrapper = $responseHandler;
                
                //Get the obtained ShareRecord instance
                $shareRecords = $responseWrapper->getShare();

                if($shareRecords != null)
                {
                    foreach($shareRecords as $shareRecord)
                    {					
                        //Get the ShareRelatedRecords of each ShareRecord
                        echo("ShareRecord ShareRelatedRecords: " . $shareRecord->getShareRelatedRecords() . "\n");
                        
                        //Get the SharedThrough instance of each ShareRecord
                        $sharedThrough = $shareRecord->getSharedThrough();
                        
                        //Check if sharedThrough is not null
                        if($sharedThrough != null)
                        {
                            //Get the Module instance of each ShareRecord
                            $module = $sharedThrough->getModule();
                            
                            if($module != null)
                            {
                                //Get the ID of the Module
                                echo("RelatedRecord SharedThrough Module ID: " . $module->getId() . "\n");
                                
                                //Get the name of the Module
                                echo("RelatedRecord SharedThrough Module Name: " . $module->getName() . "\n");
                            }
                            
                            //Get the ID of the SharedThrough
                            echo("RelatedRecord SharedThrough ID: " . $sharedThrough->getId() . "\n");
                        }
                        
                        //Get the Permission of each ShareRecord
                        echo("ShareRecord Permission: " . $shareRecord->getPermission() . "\n");
                        
                        //Get the shared User instance of each ShareRecord
                        $user = $shareRecord->getUser();
                        
                        //Check if user is not null
                        if($user != null)
                        {
                            //Get the ID of the shared User
                            echo("ShareRecord User-ID: " . $user->getId() . "\n");
                            
                            //Get the FullName of the shared User
                            echo("RelatedRecord User-FullName: " . $user->getFullName() . "\n");
                            
                            //Get the Zuid of the shared User
                            echo("RelatedRecord User-Zuid: " . $user->getZuid() . "\n");
                        }
                    }
                }
                if($responseWrapper->getShareableUser() != null)
                {
                    $shareableUsers = $responseWrapper->getShareableUser();
                    
                    foreach($shareableUsers as $shareableUser)
                    {
                        //Get the ID of the shareable User
                        echo("ShareRecord User-ID: " . $shareableUser->getId());
                        
                        //Get the FullName of the shareable User
                        echo("ShareRecord User-FullName: " . $shareableUser->getFullName());
                        
                        //Get the Zuid of the shareable User
                        echo("ShareRecord User-Zuid: " . $shareableUser->getZuid());
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
                    echo("Details: " );
				
                    //Get the details map4
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " .$value . "\n");
                    }
                }
				
				//Get the Message
				echo("Message: " . $exception->getMessage()->getValue() . "\n");
			}
		}
	}
	
	/**
	 * <h3> Share Record </h3>
	 * This method is used to share the record and print the response.
	 * @param moduleAPIName - The API Name of the module to shared record.
	 * @param recordId - The ID of the record to be obtained.
	 * @throws Exception
	 */
	public static function shareRecord(string $moduleAPIName, string $recordId)
	{
		//example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		
		//Get instance of ShareRecordsOperations Class that takes moduleAPIName and recordId as parameter
	    $shareRecordsOperations = new ShareRecordsOperations( $recordId,$moduleAPIName);
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of ShareRecord instances
		$shareList = array();
		
		//Get instance of ShareRecord Class
		$share1 = new ShareRecord();
		
		for($i = 0; $i < 1; $i++)
		{
			//Get instance of ShareRecord Class
			$share1 = new ShareRecord();
			
// 			Set the record is shared with or without related records.
			$share1->setShareRelatedRecords(true);
			
			//Set the access permission given to the user for that record.
			$share1->setPermission("read_write");
			
			$user = new User();
			
			$user->setId("3477061000005791024");
			
			//Set the users details with whom the record is shared.
			$share1->setUser($user);
			
			array_push($shareList, $share1);
        }
        
        $share1 = new ShareRecord();
		
		$share1->setShareRelatedRecords(true);
		
		$share1->setPermission("read_write");
		
		$user = new User();
		
		$user->setId("3477061000005791024");
		
		$share1->setUser($user);
		
		array_push($shareList, $share1);
		
		$request->setShare($shareList);
		
		//Call getSharedRecordDetails method that takes paramInstance as parameter
		$response = $shareRecordsOperations->shareRecord($request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $actionWrapper->getShare();
                
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
                            echo("Details: " );
                        
                            //Get the details map
                            foreach($successResponse->getDetails() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . " : " . $value . "\n");
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
                        
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " . $value . "\n");
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
                
                //Get the details map
                foreach($exception->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo($key . " : " . $value . "\n");
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}

	/**
	 * <h3> Update Share Permissions </h3>
	 * This method is used to update the sharing permissions of a record granted to users as Read-Write, Read-only, or grant full access.
	 * @param moduleAPIName - The API Name of the module to update share permissions.
	 * @param recordId - The ID of the record to be obtained.
	 * @throws Exception
	 */
	public static function updateSharePermissions(string $moduleAPIName, string $recordId)
	{
		//example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		
		//Get instance of ShareRecordsOperations Class that takes moduleAPIName and recordId as parameter
	    $shareRecordsOperations = new ShareRecordsOperations( $recordId,$moduleAPIName);
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of ShareRecord instances
		$shareList = array();
		
		//Get instance of ShareRecord Class
		$share1 = new ShareRecord();
		
		$share1->setShareRelatedRecords(true);
		
		$share1->setPermission("full_access");
		
		$user = new User();
		
		$user->setId("3477061000005791024");
		
		$share1->setUser($user);
		
		array_push($shareList, $share1);
		
		$request->setShare($shareList);
		
		//Call updateSharePermissions method that takes BodyWrapper instance as parameter
		$response = $shareRecordsOperations->updateSharePermissions($request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
            
            //Get object from response
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $actionWrapper->getShare();
                
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
                            echo("Details: " );
                        
                            //Get the details map
                            foreach($successResponse->getDetails() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . " : " . $value . "\n");
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
                        
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " . $value . "\n");
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
                
                //Get the details map
                foreach($exception->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo($key . " : " . $value . "\n");
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
	
	/**
	 * <h3> Revoke Shared Record </h3>
	 * This method is used to revoke access to a shared record that was shared to users and print the response.
	 * @param moduleAPIName - The API Name of the module to update share permissions.
	 * @param recordId - The ID of the record to be obtained.
	 * @throws Exception
	 */
	public static function revokeSharedRecord(string $moduleAPIName, string $recordId)
	{
		//example
		//moduleAPIName = "Leads";
		//recordId = "3477061000005177002";
		
		//Get instance of ShareRecordsOperations Class that takes moduleAPIName and recordId as parameter
	    $shareRecordsOperations = new ShareRecordsOperations( $recordId,$moduleAPIName);
		
		//Call revokeSharedRecord method
		$response = $shareRecordsOperations->revokeSharedRecord();
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $deleteActionHandler = $response->getObject();
            
            if($deleteActionHandler instanceof DeleteActionWrapper)
            {
                //Get the received DeleteActionWrapper instance
                $deleteActionWrapper = $deleteActionHandler;
                
                //Get the received DeleteActionResponse instance
                $deleteActionResponse = $deleteActionWrapper->getShare();
                
                //Check if the request is successful
                if($deleteActionResponse instanceof SuccessResponse)
                {
                    //Get the received SuccessResponse instance
                    $successResponse = $deleteActionResponse;
                    
                    //Get the Status
                    echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                    
                    //Get the Code
                    echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                    
                    echo("Details: " );
                    
                    //Get the details map
                    foreach($successResponse->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . " : " . $value . "\n");
                    }
                    
                    //Get the Message
                    echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                }
                //Check if the request returned an exception
                else if($deleteActionResponse instanceof APIException)
                {
                    //Get the received APIException instance
                    $exception = $deleteActionResponse;
                    
                    //Get the Status
                    echo("Status: " . $exception->getStatus()->getValue() . "\n");
                            
                    //Get the Code
                    echo("Code: " . $exception->getCode()->getValue() . "\n");
                    
                    echo("Details: " );
                    
                    //Get the details map
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . " : " . $value . "\n");
                    }
                    
                    //Get the Message
                    echo("Message: " . $exception->getMessage()->getValue() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($deleteActionHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $deleteActionHandler;
                
                //Get the Status
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        
                //Get the Code
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if($exception->getDetails() != null)
                {
                    echo("Details: " );
                
                    //Get the details map
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . " : " . $value . "\n");
                    }
                }
                 
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
}