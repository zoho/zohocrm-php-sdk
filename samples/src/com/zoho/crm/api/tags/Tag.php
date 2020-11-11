<?php
namespace samples\src\com\zoho\crm\api\tags;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\tags\APIException;

use com\zoho\crm\api\tags\ActionWrapper;

use com\zoho\crm\api\tags\BodyWrapper;

use com\zoho\crm\api\tags\ConflictWrapper;

use com\zoho\crm\api\tags\CountWrapper;

use com\zoho\crm\api\tags\MergeWrapper;

use com\zoho\crm\api\tags\RecordActionWrapper;

use com\zoho\crm\api\tags\ResponseWrapper;

use com\zoho\crm\api\tags\SuccessResponse;

use com\zoho\crm\api\tags\TagsOperations;

use com\zoho\crm\api\tags\CreateTagsParam;

use com\zoho\crm\api\tags\GetRecordCountForTagParam;

use com\zoho\crm\api\tags\GetTagsParam;

use com\zoho\crm\api\tags\RemoveTagsFromMultipleRecordsParam;

use com\zoho\crm\api\tags\RemoveTagsFromRecordParam;

use com\zoho\crm\api\tags\UpdateTagParam;

use com\zoho\crm\api\tags\UpdateTagsParam;

use com\zoho\crm\api\tags\AddTagsToMultipleRecordsParam;

use com\zoho\crm\api\tags\AddTagsToRecordParam;

class Tag
{
	/**
	 * <h3> Get Tags </h3>
	 * This method is used to get all the tags in an organization.
	 * @param moduleAPIName - The API Name of the module to get tags.
	 * @throws Exception
	 */
	public static function getTags(string $moduleAPIName)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetTagsParam::module(), $moduleAPIName);

		// $paramInstance->add(GetTagsParam::myTags(), ""); //Displays the names of the tags created by the current user.
		
		//Call getTags method that takes paramInstance as parameter
		$response = $tagsOperations->getTags($paramInstance);
		
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
                $tags = $responseWrapper->getTags();
                
                if($tags != null)
                {
                    foreach($tags as $tag)
                    {	
                        //Get the CreatedTime of each Tag
                        echo("Tag CreatedTime: ");

                        print_r($tag->getCreatedTime());
                        
                        echo("\n");
                        
                        //Get the ModifiedTime of each Tag
                        echo("Tag ModifiedTime: ");

                        print_r($tag->getModifiedTime());

                        echo("\n");
                        
                        //Get the Name of each Tag
                        echo("Tag Name: " . $tag->getName() . "\n");
                        
                        //Get the modifiedBy User instance of each Tag
                        $modifiedBy = $tag->getModifiedBy();
                        
                        //Check if modifiedBy is not null
                        if($modifiedBy != null)
                        {
                            //Get the ID of the modifiedBy User
                            echo("Tag Modified By User-ID: " . $modifiedBy->getId() . "\n");
                            
                            //Get the name of the modifiedBy User
                            echo("Tag Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        }
                        
                        //Get the ID of each Tag
                        echo("Tag ID: " . $tag->getId() . "\n");
                        
                        //Get the createdBy User instance of each Tag
                        $createdBy = $tag->getCreatedBy();
                        
                        //Check if createdBy is not null
                        if($createdBy != null)
                        {
                            //Get the ID of the createdBy User
                            echo("Tag Created By User-ID: " . $createdBy->getId() . "\n");
                            
                            //Get the name of the createdBy User
                            echo("Tag Created By User-Name: " . $createdBy->getName() . "\n");
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
                        echo("Tag Info Count: " . $info->getCount() . "\n");
                    }
                    
                    if($info->getAllowedCount() != null)
                    {
                        //Get the AllowedCount of the Info
                        echo("Tag Info AllowedCount: " . $info->getAllowedCount() . "\n");
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
	 * <h3> Create Tags </h3>
	 * This method is used to create new tags and print the response.
	 * @param moduleAPIName - The API Name of the module to create tags.
	 * @throws Exception
	 */
	public static function createTags(string $moduleAPIName)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(CreateTagsParam::module(), $moduleAPIName);
		
		//List of Tag instances
		$tagList = array();
        
        $tagClass = 'com\zoho\crm\api\tags\Tag';

		//Get instance of Tag Class
		$tag1 = new $tagClass();
		
		$tag1->setName("tagName");
		
		array_push($tagList, $tag1);
		
		$request->setTags($tagList);
		
		//Call createTags method that takes BodyWrapper instance and paramInstance as parameter
		$response = $tagsOperations->createTags($request, $paramInstance);
		
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
                $actionResponses = $actionWrapper->getTags();
                
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
	 * <h3> Update Tags </h3>
	 * This method is used to update multiple tags simultaneously and print the response.
	 * @param moduleAPIName - The API Name of the module to update tags.
	 * @throws Exception
	 */
	public static function updateTags(string $moduleAPIName)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(UpdateTagsParam::module(), $moduleAPIName);
		
		//List of Tag instances
        $tagList = array();
        
        $tagClass = 'com\zoho\crm\api\tags\Tag';
		
		//Get instance of Tag Class
		$tag1 = new $tagClass();
		
		$tag1->setId("3477061000006454014");
		
		$tag1->setName("tagName1");
		
		array_push($tagList, $tag1);
		
		$request->setTags($tagList);
		
		//Call updateTags method that takes BodyWrapper instance and paramInstance as parameter
		$response = $tagsOperations->updateTags($request, $paramInstance);
		
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
               $actionResponses = $actionWrapper->getTags();
               
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
	 * <h3> Update Tag </h3>
	 * This method is used to update single tag and print the response.
	 * @param moduleAPIName - The API Name of the module to update tag.
	 * @param tagId - The ID of the tag to be obtained.
	 * @throws Exception
	 */
	public static function updateTag(string $moduleAPIName, string $tagId)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(UpdateTagParam::module(), $moduleAPIName);
		
		//List of Tag instances
		$tagList = array();
		
		$tagClass = 'com\zoho\crm\api\tags\Tag';
		
		//Get instance of Tag Class
		$tag1 = new $tagClass();
		
		$tag1->setName("tagName13");
		
		array_push($tagList, $tag1);
		
		$request->setTags($tagList);
		
		//Call updateTags method that takes BodyWrapper instance, paramInstance and tagId as parameter
		$response = $tagsOperations->updateTag($tagId,$request, $paramInstance);
		
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
               $actionResponses = $actionWrapper->getTags();
               
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
	 * <h3> Delete Tag </h3>
	 * This method is used to delete a tag from the module and print the response.
	 * @param tagId - The ID of the tag to be obtained.
	 * @throws Exception
	 */
	public static function deleteTag(string $tagId)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Call deleteTag method that takes tag id as parameter
		$response = $tagsOperations->deleteTag($tagId);
		
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
               $actionResponses = $actionWrapper->getTags();
               
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
	
	/**
	 * <h3> Merge Tag </h3>
	 * This method is used to merge tags and put all the records under the two tags into a single tag and print the response.
	 * @param tagId - The ID of the tag to be obtained.
	 * @param conflictId - - The ID of the conflict tag to be obtained.
	 * @throws Exception
	 */
	public static function mergeTags(string $tagId, string $conflictId)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of MergeWrapper Class that will contain the request body
		$request = new MergeWrapper();
		
		//List of Tag ConflictWrapper
		$tags = array();
		
		//Get instance of ConflictWrapper Class
		$mergeTag = new ConflictWrapper();
		
		$mergeTag->setConflictId($conflictId);
		
		array_push($tags, $mergeTag);
		
		$request->setTags($tags);
		
		//Call deleteTag method that takes MergeWrapper instance and tag id as parameter
		$response = $tagsOperations->mergeTags($tagId,$request);
		
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
               $actionResponses = $actionWrapper->getTags();
               
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
	 * <h3> Add Tags To Record </h3>
	 * This method is used to add tags to a specific record and print the response.
	 * @param moduleAPIName - The API Name of the module to add tag.
	 * @param recordId - The ID of the record to be obtained.
	 * @param tagNames - The names of the tags to be added.
	 * @throws Exception
	 */
	public static function addTagsToRecord(string $moduleAPIName, string $recordId, array $tagNames)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($tagNames as $tagName)
		{
			$paramInstance->add(AddTagsToRecordParam::tagNames(), $tagName);
		}
		
		$paramInstance->add(AddTagsToRecordParam::overWrite(), "false");
		
		//Call addTagsToRecord method that takes paramInstance, moduleAPIName and recordId as parameter
		$response = $tagsOperations->addTagsToRecord($recordId, $moduleAPIName,$paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $recordActionHandler = $response->getObject();
            
            if($recordActionHandler instanceof RecordActionWrapper)
            {
                //Get the received RecordActionWrapper instance
                $recordActionWrapper = $recordActionHandler;
                
                //Get the list of obtained RecordActionResponse instances
                $actionResponses = $recordActionWrapper->getData();
                
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
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : ");

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
                        
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                           //Get each value in the map
                           echo($key . " : ");

                           print_r($value);

                           echo("\n");
                        }
                        
                        //Get the Message
                        echo("Message: " . $exception->getMessage()->getValue() . "\n");
                    }
                }
            }
            //Check if the request returned an exception
            else if($recordActionHandler instanceof APIException)
            {
                //Check if the request returned an exception
                $exception = $recordActionHandler;
                
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
	 * <h3> Remove Tags From Record </h3>
	 * This method is used to delete the tag associated with a specific record and print the response.
	 * @param moduleAPIName - The API Name of the module to remove tag.
	 * @param recordId - The ID of the record to be obtained.
	 * @param tagNames - The names of the tags to be remove.
	 * @throws Exception
	 */
	public static function removeTagsFromRecord(string $moduleAPIName, string $recordId, array $tagNames)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($tagNames as $tagName)
		{
			$paramInstance->add(RemoveTagsFromRecordParam::tagNames(), $tagName);
		}
		
		//Call removeTagsFromRecord method that takes paramInstance, moduleAPIName and recordId as parameter
		$response = $tagsOperations->removeTagsFromRecord($recordId, $moduleAPIName,$paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $recordActionHandler = $response->getObject();
            
            if($recordActionHandler instanceof RecordActionWrapper)
            {
                //Get the received RecordActionWrapper instance
                $recordActionWrapper = $recordActionHandler;
                
                //Get the list of obtained RecordActionResponse instances
                $actionResponses = $recordActionWrapper-> getData();
                
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
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                           //Get each value in the map
                           echo($key . " : ");

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
            else if($recordActionHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $recordActionHandler;
                
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
	 * <h3> Add Tags To Multiple Records </h3>
	 * This method is used to add tags to multiple records simultaneously and print the response.
	 * @param moduleAPIName - The API Name of the module to add tags.
	 * @param recordIds - The ID of the record to be obtained.
	 * @param tagNames - The names of the tags to be add.
	 * @throws Exception
	 */
	public static function addTagsToMultipleRecords(string $moduleAPIName, array $recordIds, array $tagNames)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($tagNames as $tagName)
		{
			$paramInstance->add(AddTagsToMultipleRecordsParam::tagNames(), $tagName);
		}
		
		foreach($recordIds as $recordId)
		{
			$paramInstance->add(AddTagsToMultipleRecordsParam::ids(), $recordId);
		}
		
		$paramInstance->add(AddTagsToMultipleRecordsParam::overWrite(), "false");
		
		//Call addTagsToMultipleRecords method that takes paramInstance, moduleAPIName as parameter
		$response = $tagsOperations->addTagsToMultipleRecords($moduleAPIName,$paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $recordActionHandler = $response->getObject();
            
            if($recordActionHandler instanceof RecordActionWrapper)
            {
                //Get the received RecordActionWrapper instance
                $recordActionWrapper = $recordActionHandler;
                
                //Get the list of obtained RecordActionResponse instances
                $actionResponses = $recordActionWrapper->getData();
                
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
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : ");

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
                
                //Check if locked count is null
                if($recordActionWrapper->getLockedCount() != null)
                {
                    echo("Locked Count: " . $recordActionWrapper->getLockedCount() . "\n");
                }
                
                //Check if success count is null
                if($recordActionWrapper->getSuccessCount() != null)
                {
                    echo("Success Count: " . $recordActionWrapper->getSuccessCount() . "\n");
                }
                
                //Check if wf scheduler is null
                if($recordActionWrapper->getWfScheduler() != null)
                {
                    echo("WF Scheduler: " . $recordActionWrapper->getWfScheduler() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($recordActionHandler instanceof APIException)
            {
                //Check if the request returned an exception
                $exception = $recordActionHandler;
                
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
	 * <h3> Remove Tags From Multiple Records </h3>
	 * This method is used to delete the tags associated with multiple records and print the response.
	 * @param moduleAPIName - The API Name of the module to remove tags.
	 * @param recordIds - The ID of the record to be obtained.
	 * @param tagNames - The names of the tags to be remove.
	 * @throws Exception
	 */
	public static function removeTagsFromMultipleRecords(string $moduleAPIName, array $recordIds, array $tagNames)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		$paramInstance = new ParameterMap();
		
		foreach($tagNames as $tagName)
		{
			$paramInstance->add(RemoveTagsFromMultipleRecordsParam::tagNames(), $tagName);
		}
		
		foreach($recordIds as $recordId)
		{
			$paramInstance->add(RemoveTagsFromMultipleRecordsParam::ids(), $recordId);
		}
		
		//Call RemoveTagsFromMultipleRecordsParam method that takes paramInstance, moduleAPIName as parameter
		$response = $tagsOperations->removeTagsFromMultipleRecords($moduleAPIName, $paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $recordActionHandler = $response->getObject();

            if($recordActionHandler instanceof RecordActionWrapper)
            {
                //Get the received RecordActionWrapper instance
                $recordActionWrapper = $recordActionHandler;
                
                //Get the list of obtained RecordActionResponse instances
                $actionResponses = $recordActionWrapper->getData();
                
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
                        
                        echo("Details: " );
                        
                        //Get the details map
                        foreach($successResponse->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : ");

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
                
                //Check if locked count is null
                if($recordActionWrapper->getLockedCount() != null)
                {
                    echo("Locked Count: " . $recordActionWrapper->getLockedCount() . "\n");
                }
                
                //Check if success count is null
                if($recordActionWrapper->getSuccessCount() != null)
                {
                    echo("Success Count: " . $recordActionWrapper->getSuccessCount() . "\n");
                }
                
                //Check if wf scheduler is null
                if($recordActionWrapper->getWfScheduler() != null)
                {
                    echo("WF Scheduler: " . $recordActionWrapper->getWfScheduler() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($recordActionHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $recordActionHandler;
                
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
	 * <h3> Get Record Count For Tag </h3>
	 * This method is used to get the total number of records under a tag and print the response.
	 * @param moduleAPIName - The API Name of the module.
	 * @param tagId - The ID of the tag to be obtained.
	 * @throws Exception
	 */
	public static function getRecordCountForTag(string $moduleAPIName, string $tagId)
	{
		//Get instance of TagsOperations Class
		$tagsOperations = new TagsOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetRecordCountForTagParam::module(), $moduleAPIName);

		//Call getRecordCountForTag method that takes paramInstance and tagId as parameter
		$response = $tagsOperations->getRecordCountForTag($tagId,$paramInstance);
		
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
            $countHandler = $response->getObject();
				
            if($countHandler instanceof CountWrapper)
            {
                //Get the received CountWrapper instance
                $countWrapper = $countHandler;
                
                //Get the Count of Tag
                echo("Tag Count: " . $countWrapper->getCount() . "\n");
            }
            //Check if the request returned an exception
            else if($countHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $countHandler;
                
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