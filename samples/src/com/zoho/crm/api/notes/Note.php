<?php
namespace samples\src\com\zoho\crm\api\notes;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\notes\APIException;

use com\zoho\crm\api\notes\ActionWrapper;

use com\zoho\crm\api\notes\BodyWrapper;

use com\zoho\crm\api\notes\NotesOperations;

use com\zoho\crm\api\notes\DeleteNotesParam;

use com\zoho\crm\api\notes\GetNotesHeader;

use com\zoho\crm\api\notes\GetNotesParam;

use com\zoho\crm\api\notes\ResponseWrapper;

use com\zoho\crm\api\notes\SuccessResponse;

use com\zoho\crm\api\record\Record;

class Note
{
	/**
	 * <h3> Get Notes </h3>
	 * This method is used to get the list of notes and print the response.
	 * @throws Exception
	 */
	public static function getNotes()
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetNotesParam::page(), 1);
		
		//$paramInstance->add(GetNotesParam::perPage(), 1);
		
		//Get instance of HeaderMap Class
		$headerInstance = new HeaderMap();
        
		$headerInstance->add(GetNotesHeader::IfModifiedSince(), date_create("2019-05-07T15:32:24")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
		
		//Call getNotes method that takes paramInstance and headerInstance as parameters
		$response = $notesOperations->getNotes($paramInstance, $headerInstance);
		
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
                //Get the received ActionWrapper instance
                $responseWrapper = $responseHandler;
                
                //Get the list of obtained Note instances
                $notes = $responseWrapper->getData();
            
                foreach($notes as $note)
                {
                    //Get the owner User instance of each Note
                    $owner = $note->getOwner();
                    
                    //Check if owner is not null
                    if($owner != null)
                    {
                        //Get the name of the owner User
                        echo("Note Owner User-Name: " . $owner->getName() . "\n");
                        
                        //Get the ID of the owner User
                        echo("Note Owner User-ID: " . $owner->getId() . "\n");
                        
                        //Get the Email of the owner User
                        echo("Note Owner Email: " . $owner->getEmail() . "\n");
                    }
                    
                    //Get the ModifiedTime of each Module
                    echo("Note ModifiedTime: ");

                    print_r($note->getModifiedTime());

                    echo("\n");
                    
                    //Get the list of Attachment instance each Note
                    $attachments = $note->getAttachments();
                    
                    //Check if attachments is not null
                    if($attachments != null)
                    {
                        foreach($attachments as $attachment)
                        {
                            self::printAttachment($attachment);
                        }
                    }
                    
                    //Get the CreatedTime of each Note
                    echo("Note CreatedTime: ");

                    print_r($note->getCreatedTime());

                    echo("\n");
                    
                    //Get the parentId Record instance of each Note
                    $parentId = $note->getParentId();
                    
                    //Check if parentId is not null
                    if($parentId != null)
                    {
                        if($parentId->getKeyValue("name") != null)
                        {
                            //Get the parent record Name of each Note
                            echo("Note parent record Name: " . $parentId->getKeyValue("name") . "\n");
                        }
                        
                        //Get the parent record ID of each Note
                        echo("Note parent record ID: " . $parentId->getId() . "\n");
                    }
                    
                    //Get the Editable of each Note
                    echo("Note Editable: " . $note->getEditable() . "\n");
                    
                    //Get the SeModule of each Note
                    echo("Note SeModule: " . $note->getSeModule() . "\n");
                    
                    //Get the IsSharedToClient of each Note
                    echo("Note IsSharedToClient: " . $note->getIsSharedToClient() . "\n");
                    
                    //Get the modifiedBy User instance of each Note
                    $modifiedBy = $note->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("Note Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("Note Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        
                        //Get the Email of the modifiedBy User
                        echo("Note Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                    }
                    
                    //Get the Size of each Note
                    echo("Note Size: " . $note->getSize() . "\n");
                    
                    //Get the State of each Note
                    echo("Note State: " . $note->getState() . "\n");
                    
                    //Get the VoiceNote of each Note
                    echo("Note VoiceNote: " . $note->getVoiceNote() . "\n");
                    
                    //Get the Id of each Note
                    echo("Note Id: " . $note->getId() . "\n");
                    
                    //Get the createdBy User instance of each Note
                    $createdBy = $note->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("Note Created By User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("Note Created By User-ID: " . $createdBy->getId() . "\n");
                        
                        //Get the Email of the createdBy User
                        echo("Note Created By User-Email: " . $createdBy->getEmail() . "\n");
                    }
                    
                    //Get the NoteTitle of each Note
                    echo("Note NoteTitle: " . $note->getNoteTitle() . "\n");
                    
                    //Get the NoteContent of each Note
                    echo("Note NoteContent: " . $note->getNoteContent() . "\n");
                }
                
                //Get the Object obtained Info instance
                $info = $responseWrapper->getInfo();
                
                if($info != null)
                {
                    if($info->getPerPage() != null)
                    {
                        //Get the PerPage of the Info
                        echo("Note Info PerPage: " . $info->getPerPage() . "\n");
                    }
                    
                    if($info->getCount() != null)
                    {
                        //Get the Count of the Info
                        echo("Note Info Count: " . $info->getCount() . "\n");
                    }
                    
                    if($info->getPage() != null)
                    {
                        //Get the Default of the Info
                        echo("Note Info Page: " . $info->getPage() . "\n");
                    }
                    
                    if($info->getMoreRecords() != null)
                    {
                        //Get the Default of the Info
                        echo("Note Info MoreRecords: " . $info->getMoreRecords() . "\n");
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
	
	private static function printAttachment($attachment)
	{
		//Get the createdBy User instance of each attachment
		$owner = $attachment->getOwner();
		
		//Check if owner is not null
		if($owner != null)
		{
			//Get the Name of the Owner
			echo("Note Attachment Owner User-Name: " . $owner->getName() . "\n");
			
			//Get the ID of the Owner
			echo("Note Attachment Owner User-Name: " . $owner->getId() . "\n");
			
			//Get the Email of the Owner
			echo("Note Attachment Owner User-Email: " . $owner->getEmail() . "\n");
		}
		
		//Get the modified time of each attachment
        echo("Note Attachment Modified Time: " );
        
        print_r($attachment->getModifiedTime());

        echo("\n");
		
		//Get the name of the File
		echo("Note Attachment File Name: " . $attachment->getFileName() . "\n");
		
		//Get the created time of each attachment
        echo("Note Attachment Created Time: ");
        
        print_r($attachment->getCreatedTime());
        
        echo("\n");
		
		//Get the Attachment file size
		echo("Note Attachment File Size: " . $attachment->getSize() . "\n");
		
		//Get the parentId Record instance of each attachment
		$parentId = $attachment->getParentId();
		
		//Check if parentId is not null
		if($parentId != null)
		{	
			//Get the parent record Name of each attachment
			echo("Note Attachment parent record Name: " . $parentId->getKeyValue("name") . "\n");
			
			//Get the parent record ID of each attachment
			echo("Note Attachment parent record ID: " . $parentId->getId() . "\n");
		}
		
		//Get the attachment is Editable
		echo("Note Attachment is Editable: " . $attachment->getEditable() . "\n");
		
		//Get the file ID of each attachment
		echo("Note Attachment File ID: " . $attachment->getFileId() . "\n");
		
		//Get the type of each attachment
		echo("Note Attachment File Type: " . $attachment->getType() . "\n");
		
		//Get the seModule of each attachment
		echo("Note Attachment seModule: " . $attachment->getSeModule() . "\n");
		
		//Get the modifiedBy User instance of each attachment
		$modifiedBy = $attachment->getModifiedBy();
		
		//Check if modifiedBy is not null
		if($modifiedBy != null)
		{
			//Get the Name of the modifiedBy User
			echo("Note Attachment Modified By User-Name: " . $modifiedBy->getName() . "\n");
			
			//Get the ID of the modifiedBy User
			echo("Note Attachment Modified By User-ID: " . $modifiedBy->getId() . "\n");
			
			//Get the Email of the modifiedBy User
			echo("Note Attachment Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
		}
		
		//Get the state of each attachment
		echo("Note Attachment State: " . $attachment->getState() . "\n");
		
		//Get the ID of each attachment
		echo("Note Attachment ID: " . $attachment->getId() . "\n");
		
		//Get the createdBy User instance of each attachment
		$createdBy = $attachment->getCreatedBy();
		
		//Check if createdBy is not null
		if($createdBy != null)
		{
			//Get the name of the createdBy User
			echo("Note Attachment Created By User-Name: " . $createdBy->getName() . "\n");
			
			//Get the ID of the createdBy User
			echo("Note Attachment Created By User-ID: " . $createdBy->getId() . "\n");
			
			//Get the Email of the createdBy User
			echo("Note Attachment Created By User-Email: " . $createdBy->getEmail() . "\n");
		}
		
		//Get the linkUrl of each attachment
		echo("Note Attachment LinkUrl: " . $attachment->getLinkUrl() . "\n");
	}
	
	/**
	 * <h3> Create Notes </h3>
	 * This method is used to add new notes and print the response.
	 * @throws Exception 
	 */
	public static function createNotes()
	{	
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Note instances
		$notes = array();
		
		for($i = 1; $i <= 5; $i++)
		{
            $nodeClass = 'com\zoho\crm\api\notes\Note';

			//Get instance of Note Class
			$note = new $nodeClass();
			
			//Set Note_Title of the Note
			$note->setNoteTitle("Contacted");
			
			//Set NoteContent of the Note
			$note->setNoteContent("Need to do further tracking");
			
			//Get instance of Record Class
			$parentRecord = new Record();
			
			//Set ID of the Record
			$parentRecord->setId("3477061000005702002");
			
			//Set ParentId of the Note
			$note->setParentId($parentRecord);
			
			//Set SeModule of the Record
			$note->setSeModule("Leads");
			
			//Add Note instance to the list
			array_push($notes, $note);
		}
		
		//Set the list to notes in BodyWrapper instance
		$bodyWrapper->setData($notes);
		
		//Call createNotes method that takes BodyWrapper instance as parameter 
		$response = $notesOperations->createNotes($bodyWrapper);
		
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
                                echo($keyName . " : ");

                                print_r($keyValue);

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
	 * <h3> Update Notes</h3>
	 * This method is used to update an existing note and print the response.
	 * @throws Exception
	 */
	public static function updateNotes()
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Note instances
		$notes = array();
        
        $noteClass = 'com\zoho\crm\api\notes\Note';

		//Get instance of Note Class
		$note = new $noteClass();
		
		$note->setId("3477061000006154001");
		
		//Set Note_Title of the Note
		$note->setNoteTitle("Contacted12");
		
		//Set NoteContent of the Note
		$note->setNoteContent("Need to do further tracking12");
		
		//Add Note instance to the list
		array_push($notes, $note);
		
		$note = new $noteClass();
		
		$note->setId("3477061000006153004");
		
		//Set Note_Title of the Note
		$note->setNoteTitle("Contacted13");
		
		//Set NoteContent of the Note
		$note->setNoteContent("Need to do further tracking13");
		
		//Add Note instance to the list
		array_push($notes, $note);
		
		//Set the list to notes in BodyWrapper instance
		$bodyWrapper->setData($notes);
		
		//Call updateNotes method that takes BodyWrapper instance as parameter 
		$response = $notesOperations->updateNotes($bodyWrapper);
		
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
                                echo($keyName . " : ");

                                print_r($keyValue);
                                
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
	 * This method is used to delete notes in bulk and print the response.
	 * @param notesID - The ID of the record to delete notes
	 * @throws Exception
	 */
	public static function deleteNotes(array $notesID)
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($notesID as $id)
		{
			$paramInstance->add(DeleteNotesParam::ids(), $id);
		}
		
		//Call deleteNotes method that takes paramInstance as parameter 
		$response = $notesOperations->deleteNotes($paramInstance);
		
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
	 * <h3> Get Note </h3>
	 * This method is used to get the note and print the response.
	 * @param noteId - The ID of the Note to be obtainted
	 * @throws Exception
	 */
	public static function getNote(string $noteId)
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Call getNote method
		$response = $notesOperations->getNote($noteId);
		
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
               //Get the received ActionWrapper instance
               $responseWrapper = $responseHandler;
                
               //Get the list of obtained Note instances
               $notes = $responseWrapper->getData();
           
               foreach($notes as $note)
               {
                   //Get the owner User instance of each Note
                   $owner = $note->getOwner();
                    
                    //Check if owner is not null
                    if($owner != null)
                    {
                        //Get the name of the owner User
                        echo("Note Owner User-Name: " . $owner->getName() . "\n");
                        
                        //Get the ID of the owner User
                        echo("Note Owner User-ID: " . $owner->getId() . "\n");
                        
                        //Get the Email of the owner User
                        echo("Note Owner Email: " . $owner->getEmail() . "\n");
                    }
                    
                    //Get the ModifiedTime of each Module
                    echo("Note ModifiedTime: ");

                    print_R($note->getModifiedTime());

                    echo("\n");
                    
                    //Get the list of Attachment instance each Note
                    $attachments = $note->getAttachments();
                    
                    //Check if attachments is not null
                    if($attachments != null)
                    {
                        foreach($attachments as $attachment)
                        {
                            self::printAttachment($attachment);
                        }
                    }
                    
                    //Get the CreatedTime of each Note
                    echo("Note CreatedTime: ");

                    print_r($note->getCreatedTime());

                    echo("\n");
                    
                    //Get the parentId Record instance of each Note
                    $parentId = $note->getParentId();
                    
                    //Check if parentId is not null
                    if($parentId != null)
                    {
                        if($parentId->getKeyValue("name") != null)
                        {
                            //Get the parent record Name of each Note
                            echo("Note parent record Name: " . $parentId->getKeyValue("name") . "\n");
                        }
                        
                        //Get the parent record ID of each Note
                        echo("Note parent record ID: " . $parentId->getId() . "\n");
                    }
                    
                    //Get the Editable of each Note
                    echo("Note Editable: " . $note->getEditable() . "\n");
                    
                    //Get the SeModule of each Note
                    echo("Note SeModule: " . $note->getSeModule() . "\n");
                    
                    //Get the IsSharedToClient of each Note
                    echo("Note IsSharedToClient: " . $note->getIsSharedToClient() . "\n");
                    
                    //Get the modifiedBy User instance of each Note
                    $modifiedBy = $note->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("Note Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("Note Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        
                        //Get the Email of the modifiedBy User
                        echo("Note Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                    }
                    
                    //Get the Size of each Note
                    echo("Note Size: " . $note->getSize() . "\n");
                    
                    //Get the State of each Note
                    echo("Note State: " . $note->getState() . "\n");
                    
                    //Get the VoiceNote of each Note
                    echo("Note VoiceNote: " . $note->getVoiceNote() . "\n");
                    
                    //Get the Id of each Note
                    echo("Note Id: " . $note->getId() . "\n");
                    
                    //Get the createdBy User instance of each Note
                    $createdBy = $note->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("Note Created By User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("Note Created By User-ID: " . $createdBy->getId() . "\n");
                        
                        //Get the Email of the createdBy User
                        echo("Note Created By User-Email: " . $createdBy->getEmail() . "\n");
                    }
                    
                    //Get the NoteTitle of each Note
                    echo("Note NoteTitle: " . $note->getNoteTitle() . "\n");
                    
                    //Get the NoteContent of each Note
                    echo("Note NoteContent: " . $note->getNoteContent() . "\n");
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
	 * <h3> Update Note</h3>
	 * This method is used to update an existing note and print the response.
	 * @param noteId - The ID of the Note to be obtainted
	 * @throws Exception
	 */
	public static function updateNote(string $noteId)
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Note instances
        $notes = array();
        
        $nodeClass = 'com\zoho\crm\api\notes\Note';
		
		$note = new $nodeClass();
		
		//Set Note_Title of the Note
		$note->setNoteTitle("Contacted12");
		
		//Set NoteContent of the Note
		$note->setNoteContent("Need to do further tracking12");
		
		//Add Note instance to the list
		array_push($notes, $note);
		
		//Set the list to notes in BodyWrapper instance
		$bodyWrapper->setData($notes);
		
		//Call updateNote method that takes BodyWrapper instance and noteId as parameter 
		$response = $notesOperations->updateNote($noteId,$bodyWrapper);
		
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
                                echo($keyName . " : ");

                                print_r($keyValue);

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
	 * <h3> Delete Note </h3>
	 * This method is used to delete single Note with ID and print the response.
	 * @param notesID - The ID of the Note to be deleted
	 * @throws Exception
	 */
	public static function deleteNote(string $noteID)
	{
		//Get instance of NotesOperations Class
		$notesOperations = new NotesOperations();
		
		//Call deleteNotes method that takes BodyWrapper instance as parameter 
		$response = $notesOperations->deleteNote($noteID);
		
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
