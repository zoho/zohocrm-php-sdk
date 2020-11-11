<?php
namespace samples\src\com\zoho\crm\api\territories;

use com\zoho\crm\api\territories\APIException;

use com\zoho\crm\api\territories\ResponseWrapper;

use com\zoho\crm\api\territories\TerritoriesOperations;

class Territory
{
	/**
	 * <h3> Get Territories </h3>
	 * This method is used to get the list of territories enabled for your organization and print the response.
	 * @throws Exception
	 */
	public static function getTerritories()
	{
		//example, $moduleAPIName = "Leads";
		
		//Get instance of TerritoriesOperations Class
		$territoriesOperations = new TerritoriesOperations();
		
		//Call getTerritories method
		$response = $territoriesOperations->getTerritories();
		
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
                
                //Get the list of obtained Territory instances
                $territoryList = $responseWrapper->getTerritories();

                if($territoryList != null)
                {
                    foreach($territoryList as $territory)
                    {
                        //Get the CreatedTime of each Territory
                        echo("Territory CreatedTime: " );
                        
                        print_r($territory->getCreatedTime());
                        
                        echo("\n");
                        
                        //Get the ModifiedTime of each Territory
                        echo("Territory ModifiedTime: " );
                        
                        print_r($territory->getModifiedTime());
                        
                        echo("\n");
                        
                        //Get the manager User instance of each Territory
                        $manager = $territory->getManager();
                        
                        //Check if manager is not null
                        if($manager != null)
                        {
                            //Get the Name of the Manager
                            echo("Territory Manager User-Name: " . $manager->getName() . "\n");
                            
                            //Get the ID of the Manager
                            echo("Territory Manager User-ID: " . $manager->getId() . "\n");
                        }
                        
                        //Get the ParentId of each Territory
                        echo("Territory ParentId: " . $territory->getParentId() . "\n");
                        
                        // Get the Criteria instance of each Territory
                        $criteria = $territory->getCriteria();
                        
                        //Check if criteria is not null
                        if($criteria != null)
                        {
                            self::printCriteria($criteria);
                        }
                        
                        //Get the Name of each Territory
                        echo("Territory Name: " . $territory->getName() . "\n");
                        
                        //Get the modifiedBy User instance of each Territory
                        $modifiedBy = $territory->getModifiedBy();
                        
                        //Check if modifiedBy is not null
                        if($modifiedBy != null)
                        {
                            //Get the Name of the modifiedBy User
                            echo("Territory Modified By User-Name: " . $modifiedBy->getName() . "\n");
                            
                            //Get the ID of the modifiedBy User
                            echo("Territory Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        }
                        
                        //Get the Description of each Territory
                        echo("Territory Description: " . $territory->getDescription() . "\n");
                        
                        //Get the ID of each Territory
                        echo("Territory ID: " . $territory->getId() . "\n");
                        
                        //Get the createdBy User instance of each Territory
                        $createdBy = $territory->getCreatedBy();
                        
                        //Check if createdBy is not null
                        if($createdBy != null)
                        {
                            //Get the Name of the createdBy User
                            echo("Territory Created By User-Name: " . $createdBy->getName() . "\n");
                            
                            //Get the ID of the createdBy User
                            echo("Territory Created By User-ID: " . $createdBy->getId() . "\n");
                        }
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
	 * <h3> Get Territory </h3>
	 * This method is used to get the single territory and print the response.
	 * @param territoryId - The ID of the Territory to be obtainted
	 * @throws Exception
	 */
	public static function getTerritory(string $territoryId)
	{
		//Get instance of TerritoriesOperations Class
		$territoriesOperations = new TerritoriesOperations();
		
		//Call getRelatedLists method
		$response = $territoriesOperations->getTerritory($territoryId);
		
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
                
                //Get the list of obtained Territory instances
                $territoryList = $responseWrapper->getTerritories();

                if($territoryList != null)
                {
                    foreach($territoryList as $territory)
                    {
                        //Get the CreatedTime of each Territory
                        echo("Territory CreatedTime: " );
                        
                        print_r($territory->getCreatedTime());
                        
                        echo("\n");
                        
                        //Get the ModifiedTime of each Territory
                        echo("Territory ModifiedTime: " );
                        
                        print_r($territory->getModifiedTime());
                        
                        echo("\n");
                        
                        //Get the manager User instance of each Territory
                        $manager = $territory->getManager();
                        
                        //Check if manager is not null
                        if($manager != null)
                        {
                            //Get the Name of the Manager
                            echo("Territory Manager User-Name: " . $manager->getName() . "\n");
                            
                            //Get the ID of the Manager
                            echo("Territory Manager User-ID: " . $manager->getId() . "\n");
                        }
                        
                        //Get the ParentId of each Territory
                        echo("Territory ParentId: " . $territory->getParentId() . "\n");
                        
                        // Get the Criteria instance of each Territory
                        $criteria = $territory->getCriteria();
                        
                        //Check if criteria is not null
                        if($criteria != null)
                        {
                            self::printCriteria($criteria);
                        }
                        
                        //Get the Name of each Territory
                        echo("Territory Name: " . $territory->getName() . "\n");
                        
                        //Get the modifiedBy User instance of each Territory
                        $modifiedBy = $territory->getModifiedBy();
                        
                        //Check if modifiedBy is not null
                        if($modifiedBy != null)
                        {
                            //Get the Name of the modifiedBy User
                            echo("Territory Modified By User-Name: " . $modifiedBy->getName() . "\n");
                            
                            //Get the ID of the modifiedBy User
                            echo("Territory Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        }
                        
                        //Get the Description of each Territory
                        echo("Territory Description: " . $territory->getDescription() . "\n");
                        
                        //Get the ID of each Territory
                        echo("Territory ID: " . $territory->getId() . "\n");
                        
                        //Get the createdBy User instance of each Territory
                        $createdBy = $territory->getCreatedBy();
                        
                        //Check if createdBy is not null
                        if($createdBy != null)
                        {
                            //Get the Name of the createdBy User
                            echo("Territory Created By User-Name: " . $createdBy->getName() . "\n");
                            
                            //Get the ID of the createdBy User
                            echo("Territory Created By User-ID: " . $createdBy->getId() . "\n");
                        }
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
	
	private static function printCriteria($criteria)
    {
		if($criteria->getField() != null)
		{
			//Get the Field of the Criteria
			echo("Territory Criteria Field: " . $criteria->getField() . "\n");
		}
		
		if($criteria->getComparator() != null)
		{
			//Get the Comparator of the Criteria
			echo("Territory Criteria Comparator: " . $criteria->getComparator()->getValue() . "\n");
		}
		
		if($criteria->getValue() != null)
		{
			//Get the Value of the Criteria
			echo("Territory Criteria Value: " . $criteria->getValue() . "\n");
		}
		
		// Get the List of Criteria instance of each Criteria
		$criteriaGroup = $criteria->getGroup();
		
		if($criteriaGroup != null)
		{
			foreach($criteriaGroup as $criteria1)
			{
				self::printCriteria($criteria1);
			}
		}
		
		if($criteria->getGroupOperator() != null)
		{
			//Get the Group Operator of the Criteria
			echo("Territory Criteria Group Operator: " . $criteria->getGroupOperator()->getValue() . "\n");
		}
		
    }
}