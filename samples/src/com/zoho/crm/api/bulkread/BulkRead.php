<?php
namespace samples\src\com\zoho\crm\api\bulkread;

use com\zoho\crm\api\bulkread\BulkReadOperations;

use com\zoho\crm\api\bulkread\ResponseWrapper;

use com\zoho\crm\api\bulkread\CallBack;

use com\zoho\crm\api\util\Choice;

use com\zoho\crm\api\bulkread\Query;

use com\zoho\crm\api\bulkread\Criteria;

use com\zoho\crm\api\bulkread\ActionWrapper;

use com\zoho\crm\api\bulkread\SuccessResponse;

use com\zoho\crm\api\bulkread\APIException;

use com\zoho\crm\api\bulkread\RequestWrapper;

use com\zoho\crm\api\bulkread\FileBodyWrapper;

class BulkRead
{
	/**
	 * <h3> Create BulkRead Job </h3>
	 * This method is used to create a Bulkread job to export records.
	 * @param moduleAPIName The API Name of the record's module
	 * @throws Exception
	 */
	public static function createBulkReadJob(string $moduleAPIName)
	{
		//Get instance of BulkReadOperations Class
		$bulkReadOperations = new BulkReadOperations();
		
		//Get instance of RequestWrapper Class that will contain the request body
		$requestWrapper = new RequestWrapper();
		
		//Get instance of CallBack Class
		$callback = new CallBack();
		
		// To set valid callback URL.
		$callback->setUrl("https://www.example.com/callback");
		
		//To set the HTTP method of the callback URL. The allowed value is post.
		$callback->setMethod(new Choice("post"));
		
		//The Bulkread Job's details is posted to this URL on successful completion / failure of job.
		$requestWrapper->setCallback($callback);
		
		//Get instance of Query Class
		$query = new Query();
		
		//Specifies the API Name of the module to be read.
		$query->setModule($moduleAPIName);
		
		//Specifies the unique ID of the custom view whose records you want to export.
		$query->setCvid("3477061000000087501");
		
		// List of Field API Names
		$fieldAPINames = array();
		
		array_push($fieldAPINames, "Last_Name");
		
		//Specifies the API Name of the fields to be fetched.
		$query->setFields($fieldAPINames);
		
		//To set page value, By default value is 1.
		$query->setPage(1);
		
		//Get instance of Criteria Class
		$criteria = new Criteria();
		
		// To set API name of a field.
		$criteria->setAPIName("Created_Time");
		
		// To set comparator(eg: equal, greater_than.).
		$criteria->setComparator(new Choice("between"));
		
		$createdTime = array("2020-06-03T17:31:48+05:30", "2020-06-03T17:31:48+05:30");
		
		// To set the value to be compare.
		$criteria->setValue($createdTime);
		
		//To filter the records to be exported.
		$query->setCriteria($criteria);
		
		//To set query JSON object.
		$requestWrapper->setQuery($query);
		
		//Specify the value for this key as "ics" to export all records in the Events module as an ICS file.
		// $requestWrapper->setFileType(new Choice("ics"));
		
		//Call createBulkReadJob method that takes RequestWrapper instance as parameter 
        $response = $bulkReadOperations->createBulkReadJob($requestWrapper);
        
        if($response != null)
        {
            //Get the status code from response
            echo("Status code : " . $response->getStatusCode() . "\n");
            
            //Get object from response
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $actionWrapper->getData();
                
                foreach ($actionResponses as $actionResponse)
                {
                    //Check if the request is successful
                    if($actionResponse instanceof SuccessResponse)
                    {
                        //Get the received SuccessResponse instance
                        $successResponse = $actionResponse;
                        
                        //Get the Status
                        echo("Status: " . $successResponse->getStatus()->getValue(). "\n");
                        
                        //Get the Code
                        echo("Code: " . $successResponse->getCode()->getValue(). "\n");
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " );

                            print_r($value);

                            echo("\n");
                        }
                        
                        //Get the Message
                        echo("Message: " . $successResponse->getMessage()->getValue(). "\n");
                    }
                    //Check if the request returned an exception
                    else if($actionResponse instanceof APIException)
                    {
                        //Get the received APIException instance
                        $exception = $actionResponse;
                        
                        //Get the Status
                        echo("Status: " . $exception->getStatus()->getValue(). "\n");
                        
                        //Get the Code
                        echo("Code: " . $exception->getCode()->getValue(). "\n");
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " . $value . "\n");
                        }
                        
                        //Get the Message
                        echo("Message: " . $exception->getMessage()->getValue(). "\n");
                    }
                }
            }
            //Check if the request returned an exception
            else if($actionHandler instanceof APIException)
            {
            //Get the received APIException instance
            $exception = $actionHandler;
                        
            //Get the Status
            echo("Status: " . $exception->getStatus()->getValue(). "\n");
            
            //Get the Code
            echo("Code: " . $exception->getCode()->getValue(). "\n");
            
            echo("Details: " );
            
            //Get the details map
            foreach($exception->getDetails() as $key => $value)
            {
                //Get each value in the map
                echo($key . " : " . $value . "\n");
            }
            
            //Get the Message
            echo("Message: " . $exception->getMessage()->getValue(). "\n");
            }
        }
    }
	
	/**
	 * <h3> Get BulkRead Job Details</h3>
	 * This method is used to get the details of a Bulkread job performed previously.
	 * @param jobId The unique ID of the Bulkread job.
	 * @throws Exception
	 */
	public static function getBulkReadJobDetails(string $jobId)
	{
		//example
		//String jobId = "3477061000005177002";
		
		//Get instance of BulkReadOperations Class
		$bulkReadOperations = new BulkReadOperations();
		
		//Call getBulkReadJobDetails method that takes jobId as parameter
        $response = $bulkReadOperations->getBulkReadJobDetails($jobId);
        
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
                
                //Get the list of obtained jobDetail instances
                $jobDetails = $responseWrapper->getData();
            
                foreach($jobDetails as $jobDetail)
                {
                    //Get the Job ID of each jobDetail
                    echo("Bulkread Job ID: " . $jobDetail->getId(). "\n");
                    
                    //Get the Operation of each jobDetail
                    echo("Bulkread Operation: " . $jobDetail->getOperation(). "\n");
                    
                    //Get the Operation of each jobDetail
                    echo("Bulkread State: " . $jobDetail->getState()->getValue(). "\n");
                    
                    //Get the Result instance of each jobDetail
                    $result = $jobDetail->getResult();
                    
                    //Check if Result is not null
                    if($result != null)
                    {
                        //Get the Page of the Result
                        echo("Bulkread Result Page: " . $result->getPage(). "\n");
                        
                        //Get the Count of the Result
                        echo("Bulkread Result Count: " . $result->getCount(). "\n");
                        
                        //Get the Download URL of the Result
                        echo("Bulkread Result Download URL: " . $result->getDownloadUrl(). "\n");
                        
                        //Get the Per_Page of the Result
                        echo("Bulkread Result Per_Page: " . $result->getPerPage(). "\n");
                        
                        //Get the MoreRecords of the Result
                        echo("Bulkread Result MoreRecords: " . $result->getMoreRecords(). "\n");
                    }
                    
                    // Get the Query instance of each jobDetail
                    $query = $jobDetail->getQuery();
                    
                    if($query != null)
                    {
                        //Get the Module Name of the Query
                        echo("Bulkread Query Module: " . $query->getModule(). "\n");
                        
                        //Get the Page of the Query
                        echo("Bulkread Query Page: " . $query->getPage(). "\n");
                        
                        //Get the cvid of the Query
                        echo("Bulkread Query cvid: " . $query->getCvid(). "\n");
                        
                        //Get the fields List of each Query
                        $fields = $query->getFields();
                        
                        //Check if fields is not null
                        if($fields != null)
                        {
                            foreach($fields as $fieldName)
                            {
                                //Get the Field Name of the Query
                                echo("Bulkread Query Fields: " . $fieldName. "\n");
                            }
                        }
                        
                        // Get the Criteria instance of each Query
                        $criteria = $query->getCriteria();
                        
                        //Check if criteria is not null
                        if($criteria != null)
                        {
                            BulkRead::printCriteria($criteria);
                        }
                    }
                    
                    //Get the CreatedBy User instance of each jobDetail
                    $createdBy = $jobDetail->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the ID of the CreatedBy User
                        echo("Bulkread Created By User-ID: " . $createdBy->getId(). "\n");
                        
                        //Get the Name of the CreatedBy User
                        echo("Bulkread Created By user-Name: " . $createdBy->getName(). "\n");
                    }
                    
                    //Get the CreatedTime of each jobDetail
                    echo("Bulkread CreatedTime: " );

                    print_r($jobDetail->getCreatedTime());

                    echo("\n");
                    
                    //Get the ID of each jobDetail
                    echo("Bulkread File Type: " . $jobDetail->getFileType(). "\n");
                }
            }
            //Check if the request returned an exception
            else if($responseHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $responseHandler;
                
                //Get the Status
                echo("Status: " . $exception->getStatus()->getValue(). "\n");
                
                //Get the Code
                echo("Code: " . $exception->getCode()->getValue(). "\n");
                
                echo("Details: " );
                
                //Get the details map
                foreach($exception->getDetails() as $key => $value)
                {
                    //Get each value in the map
                    echo($key . " : " . $value . "\n");
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue(). "\n");
            }
        }
    }
	
	private static function printCriteria(Criteria $criteria)
    {
		//Get the APIName of the Criteria
		echo("Bulkread Query Criteria APIName: " . $criteria->getAPIName(). "\n");
		
		if($criteria->getComparator()!= null)
		{
			//Get the Comparator of the Criteria
			echo("Bulkread Query Criteria Comparator: " . $criteria->getComparator()->getValue(). "\n");
		}
		
		if($criteria->getValue() != null)
		{
			//Get the Value of the Query
            echo("Bulkread Query Criteria Value: ");

            print_r($criteria->getValue());

            echo("\n");
		}
		
		//Get the List of Criteria instance of each Criteria
		$criteriaGroup = $criteria->getGroup();
		
		if($criteriaGroup != null)
		{
			foreach($criteriaGroup as $criteria1)
			{
				BulkRead::printCriteria($criteria1);
			}
		}
		
		if($criteria->getGroupOperator() != null)
		{
			//Get the Group Operator of the Criteria
			echo("Bulkread Query Criteria Group Operator: " . $criteria->getGroupOperator()->getValue(). "\n");
		}
    }
	
	/**
	 * <h3> Download Result</h3>
	 * This method is used to download the Bulkread job as a CSV or an ICS file (only for the Events module). 
	 * @param jobId The unique ID of the Bulkread job.
	 * @param destinationFolder The absolute path where downloaded file has to be stored.
	 * @throws Exception
	 */
	public static function downloadResult(string $jobId, string $destinationFolder)
	{
		//example
		//String jobId = "3477061000005177002";
		
		//Get instance of BulkReadOperations Class
		$bulkReadOperations = new BulkReadOperations();
		
		//Call downloadResult method that takes jobId as parameters
        $response = $bulkReadOperations->downloadResult($jobId);

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
