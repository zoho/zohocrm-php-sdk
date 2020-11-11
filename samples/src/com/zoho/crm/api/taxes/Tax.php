<?php
namespace samples\src\com\zoho\crm\api\taxes;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\taxes\APIException;

use com\zoho\crm\api\taxes\ActionWrapper;

use com\zoho\crm\api\taxes\BodyWrapper;

use com\zoho\crm\api\taxes\ResponseWrapper;

use com\zoho\crm\api\taxes\SuccessResponse;

use com\zoho\crm\api\taxes\TaxesOperations;

use com\zoho\crm\api\taxes\DeleteTaxesParam;

class Tax
{
	/**
	 * <h3> Get Taxes </h3>
	 * This method is used to get all the Organization Taxes and print the response.
	 * @throws Exception
	 */
	public static function getTaxes()
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Call getTaxes method 
		$response = $taxesOperations->getTaxes();
		
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
				
				////Get the list of obtained Tax instances
				$taxes = $responseWrapper->getTaxes();

				if($taxes != null)
				{
					foreach($taxes as $tax)
					{	
						//Get the DisplayLabel of each Tax
						echo("Tax DisplayLabel: " . $tax->getDisplayLabel() . "\n");
						
						//Get the Name of each Tax
						echo("Tax Name: " . $tax->getName() . "\n");
						
						//Get the ID of each Tax
						echo("Tax ID: " . $tax->getId() . "\n");
						
						//Get the Value of each Tax
						echo("Tax Value: " . $tax->getValue() . "\n");
					}
					
					//Get the Preference instance of Tag
					$preference = $responseWrapper->getPreference();
					
					//Check if preference is not null
					if($preference != null)
					{
						//Get the AutoPopulateTax of each Preference
						echo("Preference AutoPopulateTax: " . $preference->getAutoPopulateTax() . "\n");
						
						//Get the ModifyTaxRates of each Preference
						echo("Preference ModifyTaxRates: " . $preference->getModifyTaxRates() . "\n");
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
	}
	
	/**
	 * <h3> Create Taxes </h3>
	 * This method is used to create Organization Taxes and print the response.
	 * @throws Exception
	 */
	public static function createTaxes()
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of Tax instances
		$taxList = array();
		
		$tagClass = 'com\zoho\crm\api\taxes\Tax';

		//Get instance of Tax Class
		$tax1 = new $tagClass();
		
		$tax1->setName("MyTax22");
		
		$tax1->setSequenceNumber(2);
		
		$tax1->setValue(10.0);
		
		array_push($taxList, $tax1);
		
		$tax1 = new $tagClass();
		
		$tax1->setName("MyTax23");
		
		$tax1->setValue(12.0);
		
		array_push($taxList, $tax1);
		
		$request->setTaxes($taxList);

		//Call createTags method that takes BodyWrapper class instance as parameter
		$response = $taxesOperations->createTaxes($request);
		
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
				$actionResponses = $actionWrapper->getTaxes();
				
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
                                echo($key . " : ");

                                print_r($value);

                                echo("\n");
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
	 * <h3> Update Taxes </h3>
	 * This method is used to update Organization Taxes and print the response.
	 * @throws Exception
	 */
	public static function updateTaxes()
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of Tax instances
		$taxList = array();
		
		$taxClass = 'com\zoho\crm\api\taxes\Tax';
		
		//Get instance of Tax Class
		$tax1 = new $taxClass();
		
		$tax1->setId("3477061000006499001");
		
		$tax1->setName("MyTax1134");
		
		$tax1->setSequenceNumber(1);
		
		$tax1->setValue(15.0);
		
		array_push($taxList, $tax1);
		
		//Get instance of Tax Class
		$tax1 = new $taxClass();
		
		$tax1->setId("3477061000006499002");
		
		$tax1->setValue(25.0);
		
		array_push($taxList, $tax1);
		
		$tax1 = new $taxClass();
		
		$tax1->setId("3477061000000339001");
		
		$tax1->setSequenceNumber(2);
		
		array_push($taxList, $tax1);
		
		$request->setTaxes($taxList);
		
		//Call updateTaxes method that takes BodyWrapper instance as parameter
		$response = $taxesOperations->updateTaxes($request);
		
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
				$actionResponses = $actionWrapper->getTaxes();
				
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
                                echo($key . " : ");

                                print_r($value);

                                echo("\n");
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
	 * <h3> Delete Taxes </h3>
	 * This method is used to delete Organization Taxes and print the response.
	 * @param taxIds - The ID of the tax to be obtainted
	 * @throws Exception
	 */
	public static function deleteTaxes(array $taxIds)
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($taxIds as $taxId)
		{
			$paramInstance->add(DeleteTaxesParam::ids(), $taxId);
		}
		
		//Call deleteTaxes method that takes paramInstance as parameter
		$response = $taxesOperations->deleteTaxes($paramInstance);
		
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
				$actionResponses = $actionWrapper->getTaxes();
				
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
                                echo($key . " : ");

                                print_r($value);

                                echo("\n");
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
	 * <h3> Get Tax </h3>
	 * This method is used to get the Organization Tax and print the response.
	 * @param taxId - The ID of the tax to be obtainted
	 * @throws Exception
	 */
	public static function getTax(string $taxId)
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Call getTax method that takes taxId as parameter 
		$response = $taxesOperations->getTax($taxId);
		
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
				
				////Get the list of obtained Tax instances
				$taxes = $responseWrapper->getTaxes();

				if($taxes != null)
				{
					foreach($taxes as $tax)
					{	
						//Get the DisplayLabel of each Tax
						echo("Tax DisplayLabel: " . $tax->getDisplayLabel() . "\n");
						
						//Get the Name of each Tax
						echo("Tax Name: " . $tax->getName() . "\n");
						
						//Get the ID of each Tax
						echo("Tax ID: " . $tax->getId() . "\n");
						
						//Get the Value of each Tax
						echo("Tax Value: " . $tax->getValue() . "\n");
					}
					
					//Get the Preference instance of Tag
					$preference = $responseWrapper->getPreference();
					
					//Check if preference is not null
					if($preference != null)
					{
						//Get the AutoPopulateTax of each Preference
						echo("Preference AutoPopulateTax: " . $preference->getAutoPopulateTax() . "\n");
						
						//Get the ModifyTaxRates of each Preference
						echo("Preference ModifyTaxRates: " . $preference->getModifyTaxRates() . "\n");
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
	}
	
	/**
	 * <h3> Delete Tax </h3>
	 * This method is used to delete Organization Tax and print the response.
	 * @param taxId - The ID of the tax to be obtainted
	 * @throws Exception
	 */
	public static function deleteTax(string $taxId)
	{
		//Get instance of TaxesOperations Class
		$taxesOperations = new TaxesOperations();
		
		//Call deleteTaxes method that takes taxId as parameter
		$response = $taxesOperations->deleteTax($taxId);
		
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
				$actionResponses = $actionWrapper->getTaxes();
				
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
                                echo($key . " : ");

                                print_r($value);

                                echo("\n");
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
}