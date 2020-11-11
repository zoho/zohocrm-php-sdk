<?php
namespace samples\src\com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\bulkwrite\FileBodyWrapper;

use com\zoho\crm\api\bulkwrite\BulkWriteOperations;

use com\zoho\crm\api\util\StreamWrapper;

use com\zoho\crm\api\bulkwrite\UploadFileHeader;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\bulkwrite\SuccessResponse;

use com\zoho\crm\api\bulkwrite\APIException;

use com\zoho\crm\api\bulkwrite\RequestWrapper;

use com\zoho\crm\api\bulkwrite\CallBack;

use com\zoho\crm\api\util\Choice;

use com\zoho\crm\api\bulkwrite\Resource;

use com\zoho\crm\api\bulkwrite\FieldMapping;

use com\zoho\crm\api\bulkwrite\BulkWriteResponse;

class BulkWrite
{
	/**
	 * <h3> Upload File</h3>
	 * This method is used to upload a CSV file in ZIP format for bulk write API. The response contains the file_id.
	 * Use this ID while making the bulk write request.
	 * @param orgID The unique ID (zgid) of your organization obtained through the Organization API.
	 * @param absoluteFilePath To give the zip file path you want to upload.
	 * @throws Exception
	 */
	public static function uploadFile(string $orgID, string $absoluteFilePath)
	{
		//Get instance of BulkWriteOperations Class
		$bulkWriteOperations = new BulkWriteOperations();
		
		//Get instance of FileBodyWrapper class that will contain the request file
		$fileBodyWrapper = new FileBodyWrapper();
		
		//Get instance of StreamWrapper class that takes absolute path of the file to be attached as parameter
	    $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
		
        // $file = fopen($absoluteFilePath, "rb");
         
        // $stream = fread($file, filesize($absoluteFilePath));
        
        // fclose($file);
		
		//Get instance of StreamWrapper class that takes file name and stream of the file to be attached as parameter
		// $streamWrapper = new StreamWrapper(basename($absoluteFilePath), $stream);
		
		//Set file to the FileBodyWrapper instance
		$fileBodyWrapper->setFile($streamWrapper);
		
		//Get instance of HeaderMap Class
		$headerInstance = new HeaderMap();
		
		//To indicate that this a bulk write operation
		$headerInstance->add(UploadFileHeader::feature(), "bulk-write");
		
		$headerInstance->add(UploadFileHeader::XCRMORG(), $orgID);
		
		//Call uploadFile method that takes FileBodyWrapper instance and headerInstance as parameter
        $response = $bulkWriteOperations->uploadFile($fileBodyWrapper, $headerInstance);
        
        if($response != null)
        {
		
            //Get the status code from response
            echo("Status code : " . $response->getStatusCode() . "\n");
                
            //Get object from response
            $actionResponse = $response->getObject();
            
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
                foreach($successResponse->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo( $key . " : ");

                    print_r($value);

                    echo("\n");
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
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }
	
	/**
	 * <h3> Create BulkWrite Job</h3>
	 * This method is used to create a bulk write job.
	 * @param moduleAPIName The API Name of the record's module.
	 * @param fileId The ID of the uploaded file to create BulkWrite Job.
	 */
	public static function createBulkWriteJob(string $moduleAPIName, string $fileId)
	{
		//Get instance of BulkWriteOperations Class
		$bulkWriteOperations = new BulkWriteOperations();
		
		//Get instance of RequestWrapper Class that will contain the request body
		$requestWrapper = new RequestWrapper();
		
		//Get instance of CallBack Class
		$callback = new CallBack();
		
		// To set valid callback URL.
		$callback->setUrl("https://www.example.com/callback");
		
		//To set the HTTP method of the callback URL. The allowed value is post.
		$callback->setMethod(new Choice("post"));
		
		//The Bulk Write Job's details are posted to this URL on successful completion of job or on failure of job.
		$requestWrapper->setCallback($callback);
		
		//To set the charset of the uploaded file
		$requestWrapper->setCharacterEncoding("UTF-8");
		
		//To set the type of operation you want to perform on the bulk write job.
		$requestWrapper->setOperation(new Choice("insert"));
		
		$resource = array();
		
		//Get instance of Resource Class
		$resourceIns = new Resource();
		
		// To set the type of module that you want to import. The value is data.
		$resourceIns->setType(new Choice("data"));
		
		//To set API name of the module that you select for bulk write job.
		$resourceIns->setModule($moduleAPIName);
		
		//To set the file_id obtained from file upload API.
		$resourceIns->setFileId($fileId);
		
		//True - Ignores the empty values.The default value is false. 
		$resourceIns->setIgnoreEmpty(true);
		
		// To set a field as a unique field or ID of a record. 
		//resourceIns.setFindBy("");
		
		$fieldMappings = array();
		
		//Get instance of FieldMapping Class
		$fieldMapping = new FieldMapping();
		
		//To set API name of the field present in Zoho module object that you want to import. 
		$fieldMapping->setAPIName("Last_Name");
		
		//To set the column index of the field you want to map to the CRM field.
		$fieldMapping->setIndex(0);
		
		array_push($fieldMappings, $fieldMapping);

        $fieldMapping = new FieldMapping();
        
        $fieldMapping->setAPIName("Email");
		
		$fieldMapping->setIndex(1);
		
		array_push($fieldMappings, $fieldMapping);
		
		$fieldMapping = new FieldMapping();
        
        $fieldMapping->setAPIName("Company");
		
		$fieldMapping->setIndex(2);
		
		array_push($fieldMappings, $fieldMapping);
		
		$fieldMapping = new FieldMapping();
        
        $fieldMapping->setAPIName("Phone");
		
		$fieldMapping->setIndex(3);
		
		array_push($fieldMappings, $fieldMapping);
		
		$fieldMapping = new FieldMapping();
        
        $fieldMapping->setAPIName("Website");
		
        //$fieldMapping->setFormat("");
        
        //$fieldMapping->setFindBy("");
        
        $defaultValue = array();
        
        $defaultValue["value"] = "https://www.zohoapis.com";
        
        //To set the default value for an empty column in the uploaded file.
        $fieldMapping->setDefaultValue($defaultValue);
        
		array_push($fieldMappings, $fieldMapping);
		
		$resourceIns->setFieldMappings($fieldMappings);
		
		array_push($resource, $resourceIns);
		
		$requestWrapper->setResource($resource);
       
		//Call createBulkWriteJob method that takes RequestWrapper instance as parameter 
        $response = $bulkWriteOperations->createBulkWriteJob($requestWrapper);
        
        if($response != null)
        {
            
            //Get the status code from response
            echo("Status code : " . $response->getStatusCode() . "\n");
            
            //Get object from response
            $actionResponse = $response->getObject();
            
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
                foreach($successResponse->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo( $key . ": ");

                    print_r($value);

                    echo("\n");
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
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }
	
	/**
	 * <h3> Get BulkWriteJob Details</h3>
	 * This method is used to get the details of a bulk write job performed previously.
	 * @param jobId The unique ID of the bulk write job.
	 * @throws Exception
	 */
	public static function getBulkWriteJobDetails(string $jobId)
	{
		//example
		//String jobId = "3477061000005615003";
		
		//Get instance of BulkWriteOperations Class
		$bulkWriteOperations = new BulkWriteOperations();
		
		//Call getBulkWriteJobDetails method that takes jobId as parameter
		$response = $bulkWriteOperations->getBulkWriteJobDetails($jobId);
		
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
            $responseWrapper = $response->getObject();
            
            if($responseWrapper instanceof BulkWriteResponse)
            {
                //Get the received BulkWriteResponse instance
                $bulkWriteResponse = $responseWrapper;
                
                //Get the Job Status of each bulkWriteResponse
                echo("Bulkwrite Job Status: " . $bulkWriteResponse->getStatus() . "\n");
                
                //Get the CharacterEncoding of each bulkWriteResponse
                echo("Bulkwrite CharacterEncoding: " . $bulkWriteResponse->getCharacterEncoding() . "\n");
                
                $resources = $bulkWriteResponse->getResource();
                
                if($resources != null)
                {
                    foreach($resources as $resource)
                    {
                        //Get the Status of each Resource
                        echo("Bulkwrite Resource Status: " . $resource->getStatus()->getValue() . "\n");
                        
                        //Get the Type of each Resource
                        echo("Bulkwrite Resource Type: " . $resource->getType()->getValue() . "\n");
                        
                        //Get the Module of each Resource
                        echo("Bulkwrite Resource Module: " . $resource->getModule() . "\n");
                        
                        $fieldMappings = $resource->getFieldMappings();
                        
                        if($fieldMappings != null)
                        {
                            foreach($fieldMappings as $fieldMapping)
                            {
                                //Get the APIName of each FieldMapping
                                echo("Bulkwrite Resource FieldMapping Module: " . $fieldMapping->getAPIName() . "\n");
                                
                                if($fieldMapping->getIndex() != null)
                                {
                                    //Get the Index of each FieldMapping
                                    echo("Bulkwrite Resource FieldMapping Index: " . $fieldMapping->getIndex() . "\n");
                                }
                                
                                if($fieldMapping->getFormat() != null)
                                {
                                    //Get the Format of each FieldMapping
                                    echo("Bulkwrite Resource FieldMapping Format: " . $fieldMapping->getFormat() . "\n");
                                }
                                
                                if($fieldMapping->getFindBy() != null)
                                {
                                    //Get the FindBy of each FieldMapping
                                    echo("Bulkwrite Resource FieldMapping FindBy: " . $fieldMapping->getFindBy() . "\n");
                                }
                                
                                if($fieldMapping->getDefaultValue() != null)
                                {
                                    //Get all entries from the keyValues map
                                    foreach($fieldMapping->getDefaultValue() as $key => $value)
                                    {
                                        //Get each value from the map
                                        echo($key . ": " . $value . "\n");
                                    }
                                }
                            }
                        }
                        
                        $file = $resource->getFile();
                        
                        if($file != null)
                        {
                            //Get the Status of each File
                            echo("Bulkwrite Resource File Status: " . $file->getStatus()->getValue() . "\n");
                            
                            //Get the Name of each File
                            echo("Bulkwrite Resource File Name: " . $file->getName() . "\n");
                            
                            //Get the AddedCount of each File
                            echo("Bulkwrite Resource File AddedCount: " . $file->getAddedCount() . "\n");
                            
                            //Get the SkippedCount of each File
                            echo("Bulkwrite Resource File SkippedCount: " . $file->getSkippedCount() . "\n");
                            
                            //Get the UpdatedCount of each File
                            echo("Bulkwrite Resource File UpdatedCount: " . $file->getUpdatedCount() . "\n");
                            
                            //Get the TotalCount of each File
                            echo("Bulkwrite Resource File TotalCount: " . $file->getTotalCount() . "\n");
                        }
                    }
                }
                
                //Get the ID of each BulkWriteResponse
                echo("Bulkwrite ID: " . $bulkWriteResponse->getId() . "\n");
                
                $result = $bulkWriteResponse->getResult();
                
                if($result != null)
                {
                    //Get the DownloadUrl of the Result
                    echo("Bulkwrite DownloadUrl: " . $result->getDownloadUrl() . "\n");
                }

                //Get the CreatedBy User instance of each BulkWriteResponse
                $createdBy = $bulkWriteResponse->getCreatedBy();
                
                //Check if createdBy is not null
                if($createdBy != null)
                {
                    //Get the ID of the CreatedBy User
                    echo("Bulkread Created By User-ID: " . $createdBy->getId() . "\n");
                    
                    //Get the Name of the CreatedBy User
                    echo("Bulkread Created By user-Name: " . $createdBy->getName() . "\n");
                }
                
                //Get the Operation of each BulkWriteResponse
                echo("Bulkwrite Operation: " . $bulkWriteResponse->getOperation() . "\n");
                
                //Get the CreatedTime of each BulkWriteResponse
                echo("Bulkwrite File CreatedTime: ");

                print_r($bulkWriteResponse->getCreatedTime());

                echo("\n");
            }
            //Check if the request returned an exception
            else if($responseWrapper instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $responseWrapper;
                
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
                        echo($key . " : " . $value);
                    }    
                }
            
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }
	
	/**
	 * <h3> Download BulkWrite Result</h3>
	 * This method is used to download the result of the bulk write job as a CSV file.
	 * @param downloadUrl The URL present in the download_url parameter in the response of Get Bulk Write Job Details.
	 * @param destinationFolder The absolute path where downloaded file has to be stored.
	 * @throws Exception
	 */
	public static function downloadBulkWriteResult(string $downloadUrl, string $destinationFolder)
	{
		//example
		//String downloadUrl = "https://download-accl.zoho.com/v2/crm/6735/bulk-write/347706122009/347706122009.zip";
		
		//Get instance of BulkWriteOperations Class
		$bulkWriteOperations = new BulkWriteOperations();
		
		//Call downloadBulkWriteResult method that takes downloadUrl as parameters
        $response = $bulkWriteOperations->downloadBulkWriteResult($downloadUrl);
        
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
                
                if($exception->getStatus() != null)
                {
                    //Get the Status
                    echo("Status: " . $exception->getStatus()->getValue());
                }
                
                if($exception->getCode() != null)
                {
                    //Get the Code
                    echo("Code: " . $exception->getCode()->getValue());
                }
                
                if($exception->getDetails() != null)
                {
                    echo("Details: " );
                    
                    //Get the details map
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " . $value);
                    }
                }
                
                if($exception->getMessage() != null)
                {
                    //Get the Message
                    echo("Message: " . $exception->getMessage()->getValue());
                }
                
                if($exception->getXError() != null)
                {
                    //Get the Message
                    echo("XError: " . $exception->getXError()->getValue());
                }
                
                if($exception->getXInfo() != null)
                {
                    //Get the Message
                    echo("XInfo: " . $exception->getXInfo()->getValue());
                }
                
                if($exception->getHttpStatus() != null)
                {
                    //Get the Message
                    echo("Message: " . $exception->getHttpStatus());
                }
            }
        }
    }
}