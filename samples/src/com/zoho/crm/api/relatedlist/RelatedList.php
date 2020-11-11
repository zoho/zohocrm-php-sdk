<?php
namespace samples\src\com\zoho\crm\api\relatedlist;

use com\zoho\crm\api\relatedlists\APIException;

use com\zoho\crm\api\relatedlists\RelatedListsOperations;

use com\zoho\crm\api\relatedlists\ResponseWrapper;

class RelatedList
{
	/**
	 * <h3> Get RelatedLists </h3>
	 * This method is used to get the related list data of a particular module and print the response.
	 * @param moduleAPIName - The API Name of the module to get related lists
	 * @throws Exception
	 */
	public static function getRelatedLists(string $moduleAPIName)
	{
		//example, moduleAPIName = "Leads";
		
		//Get instance of RelatedListsOperations Class that takes moduleAPIName as parameter
		$relatedListsOperations = new RelatedListsOperations($moduleAPIName);
		
		//Call getRelatedLists method
		$response = $relatedListsOperations->getRelatedLists();
		
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
                
                //Get the list of obtained RelatedList instances
                $relatedLists = $responseWrapper->getRelatedLists();
            
                foreach($relatedLists as $relatedList)
                {
                    //Get the SequenceNumber of each RelatedList
                    echo("RelatedList SequenceNumber: " . $relatedList->getSequenceNumber() . "\n");
                    
                    //Get the DisplayLabel of each RelatedList
                    echo("RelatedList DisplayLabel: " . $relatedList->getDisplayLabel() . "\n");
                    
                    //Get the APIName of each RelatedList
                    echo("RelatedList APIName: " . $relatedList->getAPIName() . "\n");
                    
                    //Get the Module of each RelatedList
                    echo("RelatedList Module: " . $relatedList->getModule() . "\n");
                    
                    //Get the Name of each RelatedList
                    echo("RelatedList Name: " . $relatedList->getName() . "\n");
                    
                    //Get the Action of each RelatedList
                    echo("RelatedList Action: " . $relatedList->getAction() . "\n");

                    //Get the ID of each RelatedList
                    echo("RelatedList ID: " . $relatedList->getId() . "\n");
                    
                    //Get the Href of each RelatedList
                    echo("RelatedList Href: " . $relatedList->getHref() . "\n");
                    
                    //Get the Type of each RelatedList
                    echo("RelatedList Type: " . $relatedList->getType() . "\n");
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
	 * <h3> Get RelatedList </h3>
	 * This method is used to get the single related list data of a particular module with relatedListId and print the response.
	 * @param moduleAPIName - The API Name of the module to get related list
	 * @param relatedListId - The ID of the relatedList to be obtained
	 * @throws Exception
	 */
	public static function getRelatedList(string $moduleAPIName, string $relatedListId)
	{
		//example,
		//moduleAPIName = "Leads";
		//relatedListId = "525508000005067912";
	
		//Get instance of RelatedListsOperations Class that takes moduleAPIName as parameter
		$relatedListsOperations = new RelatedListsOperations($moduleAPIName);
		
		//Call getRelatedLists method which takes relatedListId as parameter
		$response = $relatedListsOperations->getRelatedList($relatedListId);
		
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
                $responseWrapper = $responseHandler;
                
                //Get the list of obtained CustomView instances
                $relatedLists = $responseWrapper->getRelatedLists();
            
                foreach($relatedLists as $relatedList)
                {
                    //Get the SequenceNumber of each RelatedList
                    echo("RelatedList SequenceNumber: " . $relatedList->getSequenceNumber() . "\n");
                    
                    //Get the DisplayLabel of each RelatedList
                    echo("RelatedList DisplayLabel: " . $relatedList->getDisplayLabel() . "\n");
                    
                    //Get the APIName of each RelatedList
                    echo("RelatedList APIName: " . $relatedList->getAPIName() . "\n");
                    
                    //Get the Module of each RelatedList
                    echo("RelatedList Module: " . $relatedList->getModule() . "\n");
                    
                    //Get the Name of each RelatedList
                    echo("RelatedList Name: " . $relatedList->getName() . "\n");
                    
                    //Get the Action of each RelatedList
                    echo("RelatedList Action: " . $relatedList->getAction() . "\n");

                    //Get the ID of each RelatedList
                    echo("RelatedList ID: " . $relatedList->getId() . "\n");
                    
                    //Get the Href of each RelatedList
                    echo("RelatedList Href: " . $relatedList->getHref() . "\n");
                    
                    //Get the Type of each RelatedList
                    echo("RelatedList Type: " . $relatedList->getType() . "\n");
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