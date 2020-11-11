<?php
namespace samples\src\com\zoho\crm\api\variablegroups;

use com\zoho\crm\api\variablegroups\APIException;

use com\zoho\crm\api\variablegroups\ResponseWrapper;

use com\zoho\crm\api\variablegroups\VariableGroupsOperations;

class VariableGroup
{
	/**
	 * <h3> Get Variable Groups </h3>
	 * This method is used to get the details of any variable group and print the response.
	 * @throws Exception
	 */
	public static function getVariableGroups()
	{
		//Get instance of VariableGroupsOperations Class
		$variableGroupsOperations = new VariableGroupsOperations();
		
		//Call getVariableGroups method 
		$response = $variableGroupsOperations->getVariableGroups();
		
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
                
                //Get the obtained VariableGroup instance
                $variableGroups = $responseWrapper->getVariableGroups();

                if($variableGroups != null)
                {
                    foreach($variableGroups as $variableGroup)
                    {	
                        //Get the DisplayLabel of each VariableGroup
                        echo("VariableGroup DisplayLabel: " . $variableGroup->getDisplayLabel() . "\n");
                        
                        //Get the APIName of each VariableGroup
                        echo("VariableGroup APIName: " . $variableGroup->getAPIName() . "\n");

                        //Get the Name of each VariableGroup
                        echo("VariableGroup Name: " . $variableGroup->getName() . "\n");
                        
                        //Get the Description of each VariableGroup
                        echo("VariableGroup Description: " . $variableGroup->getDescription() . "\n");
                        
                        //Get the ID of each VariableGroup
                        echo("VariableGroup ID: " . $variableGroup->getId() . "\n");
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
	}

	/**
	 * <h3> Get Variable Group By Id </h3>
	 * This method is used to get the details of any variable group with group id and print the response.
	 * @param variableGroupId - The ID of the VariableGroup to be obtainted
	 * @throws Exception
	 */
	public static function getVariableGroupById(string $variableGroupId)
	{
		//Get instance of VariableGroupsOperations Class
		$variableGroupsOperations = new VariableGroupsOperations();
		
		//Call getVariableGroupById method that takes variableGroupId as parameter 
		$response = $variableGroupsOperations->getVariableGroupById($variableGroupId);
        
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
                
                //Get the obtained VariableGroup instance
                $variableGroups = $responseWrapper->getVariableGroups();

                if($variableGroups != null)
                {
                    foreach($variableGroups as $variableGroup)
                    {	
                        //Get the DisplayLabel of each VariableGroup
                        echo("VariableGroup DisplayLabel: " . $variableGroup->getDisplayLabel() . "\n");
                        
                        //Get the APIName of each VariableGroup
                        echo("VariableGroup APIName: " . $variableGroup->getAPIName() . "\n");

                        //Get the Name of each VariableGroup
                        echo("VariableGroup Name: " . $variableGroup->getName() . "\n");
                        
                        //Get the Description of each VariableGroup
                        echo("VariableGroup Description: " . $variableGroup->getDescription() . "\n");
                        
                        //Get the ID of each VariableGroup
                        echo("VariableGroup ID: " . $variableGroup->getId() . "\n");
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
	}
	
	/**
	 * <h3> Get Variable Group By APIName </h3>
	 * This method is used to get the details of any variable group with group name and print the response.
	 * @param variableGroupName - The ID of the VariableGroup to be obtainted
	 * @throws Exception
	 */
	public static function getVariableGroupByAPIName(string $variableGroupName)
	{
		//Get instance of VariableGroupsOperations Class
		$variableGroupsOperations = new VariableGroupsOperations();
		
		//Call getVariableGroupByAPIName method that takes variableGroupName as parameter
		$response = $variableGroupsOperations->getVariableGroupByAPIName($variableGroupName);
		
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
                
                //Get the obtained VariableGroup instance
                $variableGroups = $responseWrapper->getVariableGroups();

                if($variableGroups != null)
                {
                    foreach($variableGroups as $variableGroup)
                    {	
                        //Get the DisplayLabel of each VariableGroup
                        echo("VariableGroup DisplayLabel: " . $variableGroup->getDisplayLabel() . "\n");
                        
                        //Get the APIName of each VariableGroup
                        echo("VariableGroup APIName: " . $variableGroup->getAPIName() . "\n");

                        //Get the Name of each VariableGroup
                        echo("VariableGroup Name: " . $variableGroup->getName() . "\n");
                        
                        //Get the Description of each VariableGroup
                        echo("VariableGroup Description: " . $variableGroup->getDescription() . "\n");
                        
                        //Get the ID of each VariableGroup
                        echo("VariableGroup ID: " . $variableGroup->getId() . "\n");
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
	}
}