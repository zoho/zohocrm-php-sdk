<?php
namespace samples\src\com\zoho\crm\api\attachments;

use com\zoho\crm\api\attachments\AttachmentsOperations;

use com\zoho\crm\api\attachments\ResponseWrapper;

use com\zoho\crm\api\attachments\APIException;

use com\zoho\crm\api\attachments\FileBodyWrapper;

use com\zoho\crm\api\util\StreamWrapper;

use com\zoho\crm\api\attachments\SuccessResponse;

use com\zoho\crm\api\attachments\ActionWrapper;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\attachments\DeleteAttachmentsParam;

use com\zoho\crm\api\attachments\GetAttachmentsParam;

use com\zoho\crm\api\attachments\UploadLinkAttachmentParam;

class Attachment
{
    /**
	 * <h3> Get Attachments</h3>
	 * This method is used to get a single record's attachments' details with ID and print the response.
	 * @throws Exception
	 * @param moduleAPIName The API Name of the record's module
     * @param recordId The ID of the record to get attachments
	 */
    public static function getAttachments(string $moduleAPIName, string $recordId)
    {
        //example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
        
        //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
        $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);

        //Get instance of ParameterMap Class
        $paramInstance = new ParameterMap();

        //Possible parameters of Get Attachments Operation
        $paramInstance->add(GetAttachmentsParam::fields(), "id,Modified_Time");

        $paramInstance->add(GetAttachmentsParam::page(), 1);

        $paramInstance->add(GetAttachmentsParam::perPage(), 100);
        
        //Call getAttachments method that takes ParameterMap instance as parameter
        $response = $attachmentOperations->getAttachments($paramInstance);
        
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

                //Get the list of obtained Attachment instances
                $attachments = $responseWrapper->getData();
                
                foreach ($attachments as $attachment)
                {
                    //Get the owner User instance of each attachment
                    $owner = $attachment->getOwner();

                    //Check if owner is not null
                    if($owner != null)
                    {
                        //Get the Name of the Owner
                        echo("Attachment Owner User-Name: " . $owner->getName() . "\n");
                        
                        //Get the ID of the Owner
                        echo("Attachment Owner User-ID: " . $owner->getId() . "\n");
                        
                        //Get the Email of the Owner
                        echo("Attachment Owner User-Email: " . $owner->getEmail() . "\n");
                    }

                    //Get the modified time of each attachment
                    echo("Attachment Modified Time: ");

                    print_r($attachment->getModifiedTime());
                    
                    echo("\n");
                    
                    //Get the name of the File
                    echo("Attachment File Name: " . $attachment->getFileName() . "\n");
                    
                    //Get the created time of each attachment
                    echo("Attachment Created Time: " );

                    print_r($attachment->getCreatedTime());

                    echo("\n");
                    
                    //Get the Attachment file size
                    echo("Attachment File Size: " . $attachment->getSize() . "\n");
                    
                    //Get the parentId Record instance of each attachment
                    $parentId = $attachment->getParentId();

                    //Check if parentId is not null
                    if($parentId != null)
                    {	
                        //Get the parent record Name of each attachment
                        echo("Attachment parent record Name: " . $parentId->getKeyValue("name") . "\n");
                        
                        //Get the parent record ID of each attachment
                        echo("Attachment parent record ID: " . $parentId->getId() . "\n");
                    }

                    //Get the attachment is Editable
                    echo("Attachment is Editable: " . $attachment->getEditable() . "\n");
                    
                    //Get the file ID of each attachment
                    echo("Attachment File ID: " . $attachment->getFileId() . "\n");
                    
                    //Get the type of each attachment
                    echo("Attachment File Type: " . $attachment->getType() . "\n");
                    
                    //Get the seModule of each attachment
                    echo("Attachment seModule: " . $attachment->getSeModule() . "\n");
                    
                    //Get the modifiedBy User instance of each attachment
                    $modifiedBy = $attachment->getModifiedBy();

                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("Attachment Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("Attachment Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        
                        //Get the Email of the modifiedBy User
                        echo("Attachment Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                    }
                    
                    //Get the state of each attachment
                    echo("Attachment State: " . $attachment->getState() . "\n");
                    
                    //Get the ID of each attachment
                    echo("Attachment ID: " . $attachment->getId() . "\n");
                    
                    //Get the createdBy User instance of each attachment
                    $createdBy = $attachment->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the name of the createdBy User
                        echo("Attachment Created By User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("Attachment Created By User-ID: " . $createdBy->getId() . "\n");
                        
                        //Get the Email of the createdBy User
                        echo("Attachment Created By User-Email: " . $createdBy->getEmail() . "\n");
                    }
                    
                    //Get the linkUrl of each attachment
                    echo("Attachment LinkUrl: " . $attachment->getLinkUrl() . "\n");
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
	 * <h3> Upload Attachments</h3>
	 * This method is used to upload an attachment to a single record of a module with ID and print the response.
	 * @throws Exception
	 * @param moduleAPIName The API Name of the record's module
     * @param recordId The ID of the record to upload attachment
     * @param absoluteFilePath The absolute file path of the file to be attached
	 */
    public static function uploadAttachments(string $moduleAPIName, string $recordId, string $absoluteFilePath)
    {
        //example
		//$moduleAPIName = "Leads";
        //$recordId = "3477061000005177002";
        //$absoluteFilePath = "/Users/use_name/Desktop/image.png"
        
        //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
        $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
        
        //Get instance of FileBodyWrapper class that will contain the request file
        $fileBodyWrapper = new FileBodyWrapper();

        //Get instance of StreamWrapper class that takes absolute path of the file to be attached as parameter
        $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
        
        //Set file to the FileBodyWrapper instance
		$fileBodyWrapper->setFile($streamWrapper);
		
        //Call uploadAttachment method that takes FileBodyWrapper instance as parameter
        $response = $attachmentOperations->uploadAttachment($fileBodyWrapper);
        
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

    /**
	 * <h3> Delete Attachments</h3>
	 * This method is used to Delete attachments to a single record of a module with ID and print the response.
	 * @param moduleAPIName The API Name of the record's module
	 * @param recordId The ID of the record to delete attachment
	 * @param attachmentIds The List of attachment IDs to be deleted
	 */
	public static function deleteAttachments(string $moduleAPIName, string $recordId, array $attachmentIds)
	{
		//example
		//$moduleAPIName = "Leads";
        //$recordId = "3477061000005177002";
        //$attachmentIds = array("3477061000005177001","3477061000005177003");
		
		//Get instance of RecordOperations Class that takes recordId and moduleAPIName as parameter
		$attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($attachmentIds as $attachmentId)
		{
			$paramInstance->add(DeleteAttachmentsParam::ids(), $attachmentId);
		}
		
		//Call deleteAttachments method that takes paramInstance as parameter
        $response = $attachmentOperations->deleteAttachments($paramInstance);
        
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

    /**
	 * <h3> Download Attachment</h3>
	 * This method is used to download an attachment of a single record of a module with ID and attachment ID and write the file in the specified destination.
	 * @throws Exception
	 * @param moduleAPIName The API Name of the record's module
     * @param recordId The ID of the record to download attachment
     * @param attachmentId The ID of the attachment to be downloaded
     * @param destinationFolder The absolute path of the destination folder to store the attachment
	 */
    public static function downloadAttachment(string $moduleAPIName, string $recordId, string $attachmentId, string $destinationFolder)
    {
        //example
		//moduleAPIName = "Leads";
		//recordId = "3477061000005177002";
		//attachmentId = "3477061000005177023";
        //destinationFolder = "/Users/user_name/Desktop"
        
		//Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
        $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);

        //Call downloadAttachment method that takes attachmentId as parameters
        $response = $attachmentOperations->downloadAttachment($attachmentId);
        
        if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            if($response->getStatusCode() == 204)
            {
                echo("No Content\n");

                return;
            }

            //Get object from response
            $responseHandler = $response->getObject();

            if($responseHandler instanceof FileBodyWrapper)
            {
                    //Get the received FileBodyWrapper instance
                    $fileBodyWrapper = $responseHandler;

                    //Get StreamWrapper instance from the returned FileBodyWrapper instance
                    $streamWrapper = $fileBodyWrapper->getFile();
                    
                    //Create a file instance with the absolute_file_path
                    $fp = fopen($destinationFolder."/".$streamWrapper->getName(), "w");
                    
                    //Get stream from the response
                    $stream = $streamWrapper->getStream();

                    fputs($fp, $stream);

                    fclose($fp);	
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
	 * <h3> Delete Attachment</h3>
	 * This method is used to delete an attachment to a single record of a module with ID and print the response.
	 * @param moduleAPIName The API Name of the record's module
	 * @param recordId The ID of the record to delete attachment
	 * @param attachmentId The ID of the attachment to be deleted
	 */
    public static function deleteAttachment(string $moduleAPIName, string $recordId, string $attachmentId)
	{
		//example
		//$moduleAPIName = "Leads";
        //$recordId = "3477061000005177002";
        //$attachmentIds = array("3477061000005177001","3477061000005177003");
		
		//Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
		$attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
		
		//Call deleteAttachment method that takes attachmentId as parameter
        $response = $attachmentOperations->deleteAttachment($attachmentId);
        
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
                        
                        if($successResponse->getDetails() != null)
                        {
                            echo("Details: " );
                        
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
                            echo("Details: " );
                        
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
	 * <h3> Upload Link Attachments</h3>
	 * This method is used to upload link attachment to a single record of a module with ID and print the response.
	 * @param moduleAPIName The API Name of the record's module
	 * @param recordId The ID of the record to upload Link attachment
	 * @param attachmentURL The attachmentURL of the doc or image link to be attached
	 */
    public static function uploadLinkAttachments(string $moduleAPIName, string $recordId, string $attachmentURL)
    {
        //example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$attachmentURL = "https://5.imimg.com/data5/KJ/UP/MY-8655440/zoho-crm-500x500.png";
		
        //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
        $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
        
        //Get instance of ParameterMap Class
        $paramInstance = new ParameterMap();
        
		$paramInstance->add(UploadLinkAttachmentParam::attachmentUrl(), $attachmentURL);
		
        //Call uploadAttachment method that takes paramInstance as parameter
        $response = $attachmentOperations->uploadLinkAttachment($paramInstance);

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