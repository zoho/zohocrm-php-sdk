<?php
namespace samples\src\com\zoho\crm\api\contactroles;

use com\zoho\crm\api\contactroles\BodyWrapper;

use com\zoho\crm\api\contactroles\ContactRolesOperations;

use com\zoho\crm\api\contactroles\ContactRole;

use com\zoho\crm\api\contactroles\ResponseWrapper;

use com\zoho\crm\api\contactroles\DeleteContactRolesParam;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\contactroles\APIException;

use com\zoho\crm\api\contactroles\ActionWrapper;

use com\zoho\crm\api\contactroles\SuccessResponse;

use com\zoho\crm\api\contactroles\GetAllContactRolesOfDealParam;

use com\zoho\crm\api\contactroles\RecordResponseWrapper;

use com\zoho\crm\api\contactroles\RecordBodyWrapper;

use com\zoho\crm\api\contactroles\RecordActionWrapper;

use com\zoho\crm\api\contactroles\ContactRoleWrapper;

class ContactRoles
{
	/**
	 * <h3> Get Contact Roles </h3>
	 * This method is used to get all the Contact Roles and print the response.
	 * @throws Exception
	 */
	public static function getContactRoles()
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Call getContactRoles method
		$response = $contactRolesOperations->getContactRoles();

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

                //Get the list of obtained ContactRole instances
                $contactRoles = $responseWrapper->getContactRoles();

                foreach($contactRoles as $contactRole)
                {
                    //Get the ID of each ContactRole
                    echo("ContactRole ID: " . $contactRole->getId() . "\n");

                    //Get the name of each ContactRole
                    echo("ContactRole Name: " . $contactRole->getName() . "\n");

                    //Get the sequence number each ContactRole
                    echo("ContactRole SequenceNumber: " . $contactRole->getSequenceNumber() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($responseHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $responseHandler;

                //Get the Status
                echo("Status: " . $exception->getStatus()->getValue());

                //Get the Code
                echo("Code: " . $exception->getCode()->getValue());

                echo("Details: " );

                //Get the details map
                foreach($exception->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo($key . ": " . $value);
                }

                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue());
            }
        }
    }

	/**
	 * <h3> Create Contact Roles </h3>
	 * This method is used to create Contact Roles and print the response.
	 * @throws Exception
	 */
	public static function createContactRoles()
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();

		//List of ContactRole instances
		$contactRoles = array();

		for($i = 1; $i <= 5; $i++)
		{
			//Get instance of ContactRole Class
			$contactRole = new ContactRole();

			//Set name of the Contact Role
			$contactRole->setName("contactRole123" . strval($i));

			//Set sequence number of the Contact Role
			$contactRole->setSequenceNumber($i);

			//Add ContactRole instance to the list
			array_push($contactRoles, $contactRole);
		}

		//Set the list to contactRoles in BodyWrapper instance
		$bodyWrapper->setContactRoles($contactRoles);

		//Call createContactRoles method that takes BodyWrapper instance as parameter
		$response = $contactRolesOperations->createContactRoles($bodyWrapper);

        if($response != null)
        {
            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getContactRoles();

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

                        if($successResponse->getDetails() != null)
                        {
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
	}

	/**
	 * <h3> Update Contact Roles </h3>
	 * This method is used to update Contact Roles and print the response.
	 * @throws Exception
	 */
	public static function updateContactRoles()
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();

		//List of ContactRole instances
		$contactRolesList = array();

		//Get instance of ContactRole Class
		$cr1 = new ContactRole();

		//Set ID to the ContactRole instance
		$cr1->setId("3477061000007231007");

		//Set name to the ContactRole instance
		$cr1->setName("Edited1");

		//Add ContactRole instance to the list
		array_push($contactRolesList, $cr1);

		//Get instance of ContactRole Class
		$cr2 = new ContactRole();

		//Set ID to the ContactRole instance
		$cr2->setId("3477061000007230011");

		//Set name to the ContactRole instance
		$cr2->setName("Edited2");

		//Add ContactRole instance to the list
		array_push($contactRolesList, $cr2);

		//Set the list to contactRoles in BodyWrapper instance
		$bodyWrapper->setContactRoles($contactRolesList);

		//Call updateContactRoles method that takes BodyWrapper instance as parameter
        $response = $contactRolesOperations->updateContactRoles($bodyWrapper);

        if($response != null)
        {
            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getContactRoles();

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

                        if($successResponse->getDetails() != null)
                        {
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
    }

	/**
	 * <h3> Delete Contact Roles </h3>
	 * This method is used to delete Contact Roles and print the response.
	 * @param contactRoleIds - The ID of the ContactRole to be obtainted
	 * @throws Exception
	 */
	public static function deleteContactRoles(array $contactRoleIds)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();

		foreach($contactRoleIds as $id)
		{
			$paramInstance->add(DeleteContactRolesParam::ids(), $id);
		}

		//Call deleteContactRoles method that takes paramInstance as parameter
        $response = $contactRolesOperations->deleteContactRoles($paramInstance);

        if($response != null)
        {

            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getContactRoles();

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

                        if($successResponse->getDetails() != null)
                        {
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
    }

	/**
	 * <h3> Get Contact Role </h3>
	 * This method is used to get single Contact Role with ID and print the response.
	 * @param contactRoleId - The ID of the ContactRole to be obtainted
	 * @throws Exception
	 */
	public static function getContactRole(string $contactRoleId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Call getContactRole method that takes contactRoleId as parameter
        $response = $contactRolesOperations->getContactRole($contactRoleId);

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

                //Get the list of obtained ContactRole instances
                $contactRoles = $responseWrapper->getContactRoles();

                foreach($contactRoles as $contactRole)
                {
                    //Get the ID of each ContactRole
                    echo("ContactRole ID: " . $contactRole->getId() . "\n");

                    //Get the name of each ContactRole
                    echo("ContactRole Name: " . $contactRole->getName() . "\n");

                    //Get the sequence number each ContactRole
                    echo("ContactRole SequenceNumber: " . $contactRole->getSequenceNumber() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($responseHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $responseHandler;

                //Get the Status
                echo("Status: " . $exception->getStatus()->getValue());

                //Get the Code
                echo("Code: " . $exception->getCode()->getValue());

                echo("Details: " );

                //Get the details map
                foreach($exception->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo($key . ": " . $value);
                }

                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue());
            }
        }
    }

	/**
	 * <h3> Update Contact Role </h3>
	 * This method is used to update single Contact Role with ID and print the response.
	 * @param contactRoleId The ID of the ContactRole to be obtainted
	 * @throws Exception
	 */
	public static function updateContactRole(string $contactRoleId)
	{
		//ID of the ContactRole to be updated
		//$contactRoleId = 525508000005067923L;

		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();

		//List of ContactRole instances
		$contactRolesList = array();

		//Get instance of ContactRole Class
		$cr1 = new ContactRole();

		//Set name to the ContactRole instance
		$cr1->setName("contactRole4");

		//Set sequence number to the ContactRole instance
		$cr1->setSequenceNumber(2);

		//Add ContactRole instance to the list
		array_push($contactRolesList, $cr1);

		//Set the list to contactRoles in BodyWrapper instance
		$bodyWrapper->setContactRoles($contactRolesList);

		//Call updateContactRole method that takes BodyWrapper instance and contactRoleId as parameters
		$response = $contactRolesOperations->updateContactRole($contactRoleId,$bodyWrapper);

		if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getContactRoles();

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

                        if($successResponse->getDetails() != null)
                        {
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
    }

	/**
	 * <h3> Delete Contact Role </h3>
	 * This method is used to delete single Contact Role with ID and print the response.
	 * @param contactRoleId ID of the ContactRole to be deleted
	 * @throws Exception
	 */
	public static function deleteContactRole(string $contactRoleId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Call deleteContactRole which takes contactRoleId as parameter
        $response = $contactRolesOperations->deleteContactRole($contactRoleId);

        if($response != null)
        {
            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getContactRoles();

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

                        if($successResponse->getDetails() != null)
                        {
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
    }

    /**
	 * <h3> Get All ContactRoles Of Deal </h3>
	 * @param dealId ID of the Deals
	 * @throws Exception
	 */
    public static function getAllContactRolesOfDeal($dealId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();

        // $paramInstance->add(GetAllContactRolesOfDealParam::ids(),[""]);
		
		//Call getAllContactRolesOfDeal method that takes Param instance as parameter 
		$response = $contactRolesOperations->getAllContactRolesOfDeal($dealId, $paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get the object from response
				$responseHandler = $response->getObject();
				
				if($responseHandler instanceof RecordResponseWrapper)
				{
					//Get the received ResponseWrapper instance
					$responseWrapper = $responseHandler;
					
					//Get the obtained Record instances
					$records = $responseWrapper->getData();
					
					foreach($records as $record)
					{					
						//Get the ID of each Record
						echo("Record ID: " . $record->getId() . "\n");
						
						//Get the createdBy User instance of each Record
						$createdBy = $record->getCreatedBy();
						
						//Check if createdBy is not null
						if($createdBy != null)
						{
							//Get the ID of the createdBy User
							echo("Record Created By User-ID: " . $createdBy->getId() . "\n");
							
							//Get the name of the createdBy User
							echo("Record Created By User-Name: " . $createdBy->getName() . "\n");
							
							//Get the Email of the createdBy User
							echo("Record Created By User-Email: " . $createdBy->getEmail() . "\n");
						}
						
						//Get the CreatedTime of each Record
						echo("Record CreatedTime: "); print_r($record->getCreatedTime()); echo("\n");
						
						//Get the modifiedBy User instance of each Record
						$modifiedBy = $record->getModifiedBy();
						
						//Check if modifiedBy is not null
						if($modifiedBy != null)
						{
							//Get the ID of the modifiedBy User
							echo("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");
							
							//Get the name of the modifiedBy User
							echo("Record Modified By User-Name: " . $modifiedBy->getName() . "\n");
							
							//Get the Email of the modifiedBy User
							echo("Record Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
						}
						
						//Get the ModifiedTime of each Record
                        echo("Record CreatedTime: "); print_r($record->getModifiedTime()); echo("\n");
						
						//To get particular field value 
						echo("Record Field Value: " . $record->getKeyValue("Last_Name") . "\n");// FieldApiName
						
						echo("Record KeyValues: \n");
						
						//Get the KeyValue map
                        foreach($record->getKeyValues() as $keyName => $value)
                        {
                            if($value != null)
                            {
                                if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
                                {
                                    echo("Record KeyName : " . $keyName . "\n");
                                    
                                    $dataList = $value;
                                    
                                    foreach($dataList as $data)
                                    {
                                        if(is_array($data))
                                        {
                                            echo("Record KeyName : " . $keyName  . " - Value :  \n");
                                            
                                            foreach($data as $key => $arrayValue)
                                            {
                                                echo($key . " : " . $arrayValue);
                                            }
                                        }
                                        else
                                        {
                                            print_r($data); echo("\n");
                                        }
                                    }
                                }
                                else
                                {
                                    echo("Record KeyName : " . $keyName  . " - Value : " . print_r($value));
                                }
                            }
                        }
                    }
					//Get the Object obtained Info instance
					$info = $responseWrapper->getInfo();
					
					//Check if info is not null
					if($info != null)
					{
						if($info->getCount() != null)
						{
							//Get the Count of the Info
							echo("Record Info Count: " . $info->getCount() . "\n");
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

    public static function getContactRoleOfDeal($contactId, $dealId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();

		//Call getContactRoleOfDeal method that takes Param instance as parameter 
		$response = $contactRolesOperations->getContactRoleOfDeal($contactId, $dealId);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Check if expected response is received
			if($response->isExpected())
			{
				//Get the object from response
				$responseHandler = $response->getObject();
				
				if($responseHandler instanceof RecordResponseWrapper)
				{
					//Get the received ResponseWrapper instance
					$responseWrapper = $responseHandler;
					
					//Get the obtained Record instances
					$records = $responseWrapper->getData();
					
					foreach($records as $record)
					{					
						//Get the ID of each Record
						echo("Record ID: " . $record->getId() . "\n");
						
						//Get the createdBy User instance of each Record
						$createdBy = $record->getCreatedBy();
						
						//Check if createdBy is not null
						if($createdBy != null)
						{
							//Get the ID of the createdBy User
							echo("Record Created By User-ID: " . $createdBy->getId() . "\n");
							
							//Get the name of the createdBy User
							echo("Record Created By User-Name: " . $createdBy->getName() . "\n");
							
							//Get the Email of the createdBy User
							echo("Record Created By User-Email: " . $createdBy->getEmail() . "\n");
						}
						
						//Get the CreatedTime of each Record
						echo("Record CreatedTime: "); print_r($record->getCreatedTime()); echo("\n");
						
						//Get the modifiedBy User instance of each Record
						$modifiedBy = $record->getModifiedBy();
						
						//Check if modifiedBy is not null
						if($modifiedBy != null)
						{
							//Get the ID of the modifiedBy User
							echo("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");
							
							//Get the name of the modifiedBy User
							echo("Record Modified By User-Name: " . $modifiedBy->getName() . "\n");
							
							//Get the Email of the modifiedBy User
							echo("Record Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
						}
						
						//Get the ModifiedTime of each Record
                        echo("Record CreatedTime: "); print_r($record->getModifiedTime()); echo("\n");
						
						//To get particular field value 
						echo("Record Field Value: " . $record->getKeyValue("Last_Name") . "\n");// FieldApiName
						
						echo("Record KeyValues: \n");
						
						//Get the KeyValue map
                        foreach($record->getKeyValues() as $keyName => $value)
                        {
                            if($value != null)
                            {
                                if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
                                {
                                    echo("Record KeyName : " . $keyName . "\n");
                                    
                                    $dataList = $value;
                                    
                                    foreach($dataList as $data)
                                    {
                                        if(is_array($data))
                                        {
                                            echo("Record KeyName : " . $keyName  . " - Value :  \n");
                                            
                                            foreach($data as $key => $arrayValue)
                                            {
                                                echo($key . " : " . $arrayValue);
                                            }
                                        }
                                        else
                                        {
                                            print_r($data); echo("\n");
                                        }
                                    }
                                }
                                else
                                {
                                    echo("Record KeyName : " . $keyName  . " - Value : " . print_r($value));
                                }
                            }
                        }
                    }
					//Get the Object obtained Info instance
					$info = $responseWrapper->getInfo();
					
					//Check if info is not null
					if($info != null)
					{
						if($info->getCount() != null)
						{
							//Get the Count of the Info
							echo("Record Info Count: " . $info->getCount() . "\n");
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

    public static function addContactRoleToDeal($contactId, $dealId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new RecordBodyWrapper();

		//Get instance of ContactRole Class
        $contactRole = new ContactRoleWrapper();

        //Set name of the Contact Role
        $contactRole->setContactRole("contactRole1");

		//Set the list to contactRoles in BodyWrapper instance
		$bodyWrapper->setData([$contactRole]);

		//Call createContactRoles method that takes BodyWrapper instance as parameter
		$response = $contactRolesOperations->addContactRoleToDeal($contactId, $dealId, $bodyWrapper);

        if($response != null)
        {
            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof RecordActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getData();

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

                        if($successResponse->getDetails() != null)
                        {
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
	}

    public static function removeContactRoleFromDeal($contactId, $dealId)
	{
		//Get instance of ContactRolesOperations Class
		$contactRolesOperations = new ContactRolesOperations();

		//Call createContactRoles method that takes BodyWrapper instance as parameter
		$response = $contactRolesOperations->removeContactRoleFromDeal($contactId, $dealId);

        if($response != null)
        {
            //Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof RecordActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getData();

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

                        if($successResponse->getDetails() != null)
                        {
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
	}
}