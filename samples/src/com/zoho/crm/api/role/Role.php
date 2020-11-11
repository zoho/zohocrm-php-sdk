<?php
namespace samples\src\com\zoho\crm\api\role;

use com\zoho\crm\api\roles\APIException;

use com\zoho\crm\api\roles\ResponseWrapper;

use com\zoho\crm\api\roles\RolesOperations;

class Role
{
	/**
	 * <h3> Get Roles </h3>
	 * This method is used to retrieve the data of roles through an API request and print the response.
	 * @throws Exception
	 */
	public static function getRoles()
	{
		//example, moduleAPIName = "Leads";
		
		//Get instance of RolesOperations Class
		$rolesOperations = new RolesOperations();
		
		//Call getRoles method
		$response = $rolesOperations->getRoles();
		
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
                
                //Get the list of obtained Role instances
                $roles = $responseWrapper->getRoles();
            
                foreach($roles as $role)
                {
                    //Get the DisplayLabel of each Role
                    echo("Role DisplayLabel: " . $role->getDisplayLabel() . "\n");
                    
                    //Get the forecastManager User instance of each Role
                    $forecastManager = $role->getForecastManager();
                    
                    //Check if forecastManager is not null
                    if($forecastManager != null)
                    {
                        //Get the ID of the forecast Manager
                        echo("Role Forecast Manager User-ID: " . $forecastManager->getId() . "\n");
                        
                        //Get the name of the forecast Manager
                        echo("Role Forecast Manager User-Name: " . $forecastManager->getName() . "\n");
                    }
                    
                    //Get the ShareWithPeers of each Role
                    echo("Role ShareWithPeers: " . $role->getShareWithPeers() . "\n");
                    
                    //Get the Name of each Role
                    echo("Role Name: " . $role->getName() . "\n");
                    
                    //Get the Description of each Role
                    echo("Role Description: " . $role->getDescription() . "\n");
                    
                    //Get the Id of each Role
                    echo("Role ID: " . $role->getId() . "\n");
                    
                    //Get the reportingTo User instance of each Role
                    $reportingTo = $role->getReportingTo();
                    
                    //Check if reportingTo is not null
                    if($reportingTo != null)
                    {
                        //Get the ID of the reportingTo User
                        echo("Role ReportingTo User-ID: " . $reportingTo->getId() . "\n");
                        
                        //Get the name of the reportingTo User
                        echo("Role ReportingTo User-Name: " . $reportingTo->getName() . "\n");
                    }
                    
                    //Get the AdminUser of each Role
                    echo("Role AdminUser: " . $role->getAdminUser() . "\n");
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
				
				echo("Details: " );
				
				//Get the details map4
				foreach($exception->getDetails() as $key => $value)
				{
					//Get each value in the map
					echo($key . ": " .$value . "\n");
				}
				
				//Get the Message
				echo("Message: " . $exception->getMessage()->getValue() . "\n");
			}
		}
	}
	
	/**
	 * <h3> Get Role </h3>
	 * This method is used to retrieve the data of single role through an API request and print the response.
	 * @param roleId The ID of the Role to be obtained
	 * @throws Exception
	 */
	public static function getRole(string $roleId)
	{
		//example, roleId = "3477061000000003881";
		
		//Get instance of RolesOperations Class
		$rolesOperations = new RolesOperations();
		
		//Call getRoles method
		$response = $rolesOperations->getRole($roleId);
		
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
                
                //Get the list of obtained Role instances
                $roles = $responseWrapper->getRoles();
            
                foreach($roles as $role)
                {
                    //Get the DisplayLabel of each Role
                    echo("Role DisplayLabel: " . $role->getDisplayLabel() . "\n");
                    
                    //Get the forecastManager User instance of each Role
                    $forecastManager = $role->getForecastManager();
                    
                    //Check if forecastManager is not null
                    if($forecastManager != null)
                    {
                        //Get the ID of the forecast Manager
                        echo("Role Forecast Manager User-ID: " . $forecastManager->getId() . "\n");
                        
                        //Get the name of the forecast Manager
                        echo("Role Forecast Manager User-Name: " . $forecastManager->getName() . "\n");
                    }
                    
                    //Get the ShareWithPeers of each Role
                    echo("Role ShareWithPeers: " . $role->getShareWithPeers() . "\n");
                    
                    //Get the Name of each Role
                    echo("Role Name: " . $role->getName() . "\n");
                    
                    //Get the Description of each Role
                    echo("Role Description: " . $role->getDescription() . "\n");
                    
                    //Get the Id of each Role
                    echo("Role ID: " . $role->getId() . "\n");
                    
                    //Get the reportingTo User instance of each Role
                    $reportingTo = $role->getReportingTo();
                    
                    //Check if reportingTo is not null
                    if($reportingTo != null)
                    {
                        //Get the ID of the reportingTo User
                        echo("Role ReportingTo User-ID: " . $reportingTo->getId() . "\n");
                        
                        //Get the name of the reportingTo User
                        echo("Role ReportingTo User-Name: " . $reportingTo->getName() . "\n");
                    }
                    
                    //Get the AdminUser of each Role
                    echo("Role AdminUser: " . $role->getAdminUser() . "\n");
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
				
				echo("Details: " );
				
				//Get the details map4
				foreach($exception->getDetails() as $key => $value)
				{
					//Get each value in the map
					echo($key . ": " .$value . "\n");
				}
				
				//Get the Message
				echo("Message: " . $exception->getMessage()->getValue() . "\n");
			}
		}
	}
}