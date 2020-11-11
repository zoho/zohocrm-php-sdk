<?php
namespace samples\src\com\zoho\crm\api\blueprint;

use com\zoho\crm\api\blueprint\BluePrintOperations;

use com\zoho\crm\api\blueprint\BodyWrapper;

use com\zoho\crm\api\blueprint\ResponseWrapper;

use com\zoho\crm\api\blueprint\APIException;

use com\zoho\crm\api\record\Record;

use com\zoho\crm\api\blueprint\SuccessResponse;

class BluePrint
{
	/**
	 * <h3> Get Blueprint </h3>
	 * This method is used to get a single record's Blueprint details with ID and print the response.
	 * @param moduleAPIName The API Name of the record's module
	 * @param recordId The ID of the record to get Blueprint
	 * @throws Exception
	 */
	public static function getBlueprint(string $moduleAPIName, string $recordId)
	{
		//Get instance of BluePrintOperations Class that takes recordId and moduleAPIName as parameter
	    $bluePrintOperations = new BluePrintOperations($recordId,$moduleAPIName);
		
		//Call getBlueprint method
        $response = $bluePrintOperations->getBlueprint();

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

                //Get the obtained BluePrint instance
                $bluePrint = $responseWrapper->getBlueprint();
                
                //Get the ProcessInfo instance of the obtained BluePrint
                $processInfo = $bluePrint->getProcessInfo();
                    
                //Check if ProcessInfo is not null
                if($processInfo != null)
                {
                    //Get the Field ID of the ProcessInfo
                    echo("ProcessInfo Field-ID: " . $processInfo->getFieldId() . "\n");
                    
                    //Get the isContinuous of the ProcessInfo
                    echo("ProcessInfo isContinuous: " . $processInfo->getIsContinuous() . "\n");
                    
                    //Get the API Name of the ProcessInfo
                    echo("ProcessInfo API Name: " . $processInfo->getAPIName() . "\n");
                    
                    //Get the Continuous of the ProcessInfo
                    echo("ProcessInfo Continuous: " . $processInfo->getContinuous() . "\n");
                    
                    //Get the FieldLabel of the ProcessInfo
                    echo("ProcessInfo FieldLabel: " . $processInfo->getFieldLabel() . "\n");
                    
                    //Get the Name of the ProcessInfo
                    echo("ProcessInfo Name: " . $processInfo->getName() . "\n");
                    
                    //Get the ColumnName of the ProcessInfo
                    echo("ProcessInfo ColumnName: " . $processInfo->getColumnName() . "\n");
                    
                    //Get the FieldValue of the ProcessInfo
                    echo("ProcessInfo FieldValue: " . $processInfo->getFieldValue() . "\n");
                    
                    //Get the ID of the ProcessInfo
                    echo("ProcessInfo ID: " . $processInfo->getId() . "\n");
                    
                    //Get the FieldName of the ProcessInfo
                    echo("ProcessInfo FieldName: " . $processInfo->getFieldName() . "\n");
                }
                
                //Get the list of transitions from BluePrint instance
                $transitions = $bluePrint->getTransitions();
                
                foreach($transitions as $transition)
                {
                    $nextTransitions = $transition->getNextTransitions();
                    
                    foreach($nextTransitions as $nextTransition)
                    {
                        //Get the ID of the NextTransition
                        echo("NextTransition ID: " . $nextTransition->getId() . "\n");
                        
                        //Get the Name of the NextTransition
                        echo("NextTransition Name: " . $nextTransition->getName() . "\n");
                    }
                    
                    //Get the PercentPartialSave of each Transition
                    echo("Transition PercentPartialSave: " . $transition->getPercentPartialSave() . "\n");
                    
                    $data = $transition->getData();
                    
                    if($data != null)
                    {
                        //Get the ID of each record
                        echo("Record ID: " . $data->getId() . "\n");
                        
                        //Get the createdBy User instance of each record
                        $createdBy = $data->getCreatedBy();
                        
                        if($createdBy != null)
                        {
                            //Get the ID of the createdBy User
                            echo("Record Created By User-ID: " . $createdBy->getId() . "\n");
                            
                            //Get the name of the createdBy User
                            echo("Record Created By User-Name: " . $createdBy->getName() . "\n");
                        }
                        
                        //Check if the created time is not null
                        if($data->getCreatedTime() != null)
                        {
                            //Get the created time of each record
                            echo("Record Created Time: " . $data->getCreatedTime() . "\n");
                        }
                        
                        //Check if the modified time is not null
                        if($data->getModifiedTime() != null)
                        {
                            //Get the modified time of each record
                            echo("Record Modified Time: " . $data->getModifiedTime() . "\n");
                        }
                        
                        //Get the modifiedBy User instance of each record
                        $modifiedBy = $data->getModifiedBy();
    
                        //Check if modifiedByUser is not null
                        if($modifiedBy != null)
                        {
                            //Get the ID of the modifiedBy User
                            echo("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");
                            
                            //Get the name of the modifiedBy User
                            echo("Record Modified By user-Name: " . $modifiedBy->getName() . "\n");
                        }
                        
                        //Get all entries from the keyValues map
                        foreach($data->getKeyValues() as $key => $value)
                        {
                            //Get each value from the map
                            echo($key . ": " . $value . "\n");
                        }
                    }
                    
                    //Get the NextFieldValue of the Transition
                    echo("Transition NextFieldValue: " . $transition->getNextFieldValue() . "\n");
                    
                    //Get the Name of each Transition
                    echo("Transition Name: " . $transition->getName() . "\n");
                    
                    //Get the CriteriaMatched of the Transition
                    echo("Transition CriteriaMatched: " . $transition->getCriteriaMatched() . "\n");
                    
                    //Get the ID of the Transition
                    echo("Transition ID: " . $transition->getId() . "\n");
                    
                    $fields = $transition->getFields();
                    
                    foreach($fields as $field)
                    {
                        //Get the webhook of each Field
                        echo("Webhook" . $field->getWebhook() . "\n");
                        
                        //Get the JsonType of each Field
                        echo("JsonType: " . $field->getJsonType() . "\n");
                        
                        //Get the DisplayLabel of each Field
                        echo("DisplayLabel: " . $field->getDisplayLabel() . "\n");
                        
                        //Get the DataType of each Field
                        echo("DataType: " . $field->getDataType() . "\n");
                        
                        //Get the ColumnName of each Field
                        echo("ColumnName: " . $field->getColumnName() . "\n");
                        
                        //Get the PersonalityName of each Field
                        echo("PersonalityName: " . $field->getPersonalityName() . "\n");
                        
                        //Get the ID of each Field
                        echo("ID: " . $field->getId() . "\n");
                        
                        //Get the TransitionSequence of each Field
                        echo("TransitionSequence: " . $field->getTransitionSequence() . "\n");
                        
                        if($field->getMandatory() != null)
                        {
                            //Get the Mandatory of each Field
                            echo("Mandatory: " . $field->getMandatory() . "\n");
                        }
                        
                        $layout = $field->getLayouts();
                        
                        if($layout != null)
                        {
                            //Get the ID of the Layout
                            echo("Layout ID: " . $layout->getId() . "\n");
                            
                            //Get the name of the Layout
                            echo("Layout Name: " . $layout->getName() . "\n");
                        }
                        
                        //Get the APIName of each Field
                        echo("APIName: " . $field->getAPIName() . "\n");
                        
                        //Get the Content of each Field
                        echo("Content: " . $field->getContent() . "\n");
                        
                        if($field->getSystemMandatory() != null)
                        {
                            //Get the SystemMandatory of each Field
                            echo("SystemMandatory: " . $field->getSystemMandatory() . "\n");
                        }
                        
                        //Get the Crypt of each Field
                        echo("Crypt: " . $field->getCrypt() . "\n");
                        
                        //Get the FieldLabel of each Field
                        echo("FieldLabel: " . $field->getFieldLabel() . "\n");
                        
                        //Get the Tooltip of each Field
                        $toolTip = $field->getTooltip();
                        
                        if($toolTip != null)
                        {
                            //Get the Tooltip Name
                            echo("Tooltip Name: " . $toolTip->getName() . "\n");
                            
                            //Get the Tooltip Value
                            echo("Tooltip Value: " . $toolTip->getValue() . "\n");
                        }
                        
                        //Get the CreatedSource of each Field
                        echo("CreatedSource: " . $field->getCreatedSource() . "\n");
                        
                        if($field->getFieldReadOnly() != null)
                        {
                            //Get the FieldReadOnly of each Field
                            echo("FieldReadOnly: " . $field->getFieldReadOnly() . "\n");
                        }
                        
                        if($field->getReadOnly() != null)
                        {
                            //Get the ReadOnly of each Field
                            echo("ReadOnly: " . $field->getReadOnly() . "\n");
                        }
                        
                        //Get the AssociationDetails of each Field
                        echo("AssociationDetails: " . $field->getAssociationDetails() . "\n");
                        
                        //Get the DisplayLabel of each Field
                        echo("DisplayLabel: " . $field->getDisplayLabel() . "\n");
                        
                        //Get the DisplayLabel of each Field
                        echo("DisplayLabel: " . $field->getDisplayLabel() . "\n");
                        
                        if($field->getQuickSequenceNumber() != null)
                        {
                            //Get the QuickSequenceNumber of each Field
                            echo("QuickSequenceNumber: " . $field->getQuickSequenceNumber() . "\n");
                        }
                        
                        if($field->getCustomField() != null)
                        {
                            //Get the CustomField of each Field
                            echo("CustomField: " . $field->getCustomField() . "\n");
                        }
                        
                        if($field->getVisible() != null)
                        {
                            //Get the Visible of each Field
                            echo("Visible: " . $field->getVisible() . "\n");
                        }
                        
                        if($field->getLength() != null)
                        {
                            //Get the Length of each Field
                            echo("Length: " . $field->getLength() . "\n");
                        }
                        
                        //Get the DecimalPlace of each Field
                        echo("DecimalPlace: " . $field->getDecimalPlace() . "\n");
                        
                        $viewType = $field->getViewType();
                        
                        if($viewType != null)
                        {
                            //Get the View of the ViewType
                            echo("View: " . $viewType->getView() . "\n");
                            
                            //Get the Edit of the ViewType
                            echo("Edit: " . $viewType->getEdit() . "\n");
                            
                            //Get the Create of the ViewType
                            echo("Create: " . $viewType->getCreate() . "\n");
                            
                            //Get the View of the ViewType
                            echo("QuickCreate: " . $viewType->getQuickCreate() . "\n");
                        }
                        
                        $pickListValues = $field->getPickListValues();
                        
                        if($pickListValues != null)
                        {
                            foreach($pickListValues  as  $pickListValue)
                            {
                                //Get the DisplayValue of each PickListValues
                                echo("DisplayValue: " . $pickListValue->getDisplayValue() . "\n");
                                
                                //Get the SequenceNumber of each PickListValues
                                echo("SequenceNumber: " . $pickListValue->getSequenceNumber() . "\n");
                                
                                //Get the ExpectedDataType of each PickListValues
                                echo("ExpectedDataType: " . $pickListValue->getExpectedDataType() . "\n");
                                
                                //Get the ActualValue of each PickListValues
                                echo("ActualValue: " . $pickListValue->getActualValue() . "\n");
                                
                                foreach($pickListValue->getMaps() as $map)
                                {
                                    //Get each value from the map
                                    echo($map . "\n");
                                }
                            }
                        }
                        
                        //Get all entries from the MultiSelectLookup instance
                        $multiSelectLookup = $field->getMultiselectlookup();
                        
                        if($multiSelectLookup != null)
                        {
                            //Get the DisplayValue of the MultiSelectLookup
                            echo("DisplayLabel: " . $multiSelectLookup->getDisplayLabel() . "\n");
                            
                            //Get the LinkingModule of the MultiSelectLookup
                            echo("LinkingModule: " . $multiSelectLookup->getLinkingModule() . "\n");
                            
                            //Get the LookupApiname of the MultiSelectLookup
                            echo("LookupApiname: " . $multiSelectLookup->getLookupApiname() . "\n");
                            
                            //Get the APIName of the MultiSelectLookup
                            echo("APIName: " . $multiSelectLookup->getAPIName() . "\n");
                            
                            //Get the ConnectedlookupApiname of the MultiSelectLookup
                            echo("ConnectedlookupApiname: " . $multiSelectLookup->getConnectedlookupApiname() . "\n");
                            
                            //Get the ID of the MultiSelectLookup
                            echo("ID: " . $multiSelectLookup->getId() . "\n");
                        }
                        
                        //Get the AutoNumber of each Field
                        $autoNumber = $field->getAutoNumber();
                        
                        if($autoNumber != null)
                        {
                            //Get the Prefix of the AutoNumber
                            echo("Prefix: " . $autoNumber->getPrefix() . "\n");
                            
                            //Get the Suffix of the AutoNumber
                            echo("Suffix: " . $autoNumber->getSuffix() . "\n");
                            
                            if($autoNumber->getStartNumber() != null)
                            {
                                //Get the StartNumber of the AutoNumber
                                echo("StartNumber: " . $autoNumber->getStartNumber() . "\n");
                            }
                        }
                    }
                    
                    //Get the CriteriaMessage of each Transition
                    echo("Transition CriteriaMessage: " . $transition->getCriteriaMessage() . "\n");
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
	 * <h3> Update Blueprint </h3>
	 * This method is used to update a single record's Blueprint details with ID and print the response.
	 * @param moduleAPIName The API Name of the record's module
	 * @param recordId The ID of the record to get Blueprint
	 * @param transitionId The ID of the Blueprint transition Id
	 * @throws Exception
	 */
	public static function updateBlueprint(string $moduleAPIName, string $recordId, string $transitionId)
	{
		//ID of the BluePrint to be updated
		//$transitionId = "3477061000000173096";
				
		//Get instance of BluePrintOperations Class that takes moduleAPIName and recordId as parameter
	    $bluePrintOperations = new BluePrintOperations($recordId,$moduleAPIName);
        
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of BluePrint instances
		$bluePrintList = array();

        $bluePrintClass = 'com\zoho\crm\api\blueprint\BluePrint'; 
        
		//Get instance of BluePrint Class
        $bluePrint = new $bluePrintClass();
		
		//Set transition_id to the BluePrint instance
		$bluePrint->setTransitionId($transitionId);
        
		//Get instance of Record Class
        $data = new Record();

		$lookup = array();
		
		$lookup["Phone"] = "8940372937";
		
		$lookup["id"] = "8940372937";
		
		// $data->addKeyValue("Lookup_2", (object)$lookup);
		
		$data->addKeyValue("Phone", "8940372937");
		
        $data->addKeyValue("Notes", "Updated via blueprint");
        
        $attachments = array();
		
		$fileIds = array();
		
		array_push($fileIds, "blojtd2d13b5f044e4041a3315e0793fb21ef");
		
		$attachments['$file_id'] = $fileIds;
		
		$data->addKeyValue("Attachments", $attachments);
		
		$checkLists = array();
		
		$list = array();
		
		$list["list 1"] = true;
		
		array_push($checkLists, $list);
		
		$list = array();
		
		$list["list 2"] = true;
		
		array_push($checkLists, $list);
		
		$list = array();
		
		$list["list 3"] =  true;
		
		array_push($checkLists, $list);
		
		$data->addKeyValue("CheckLists", $checkLists);
		
		//Set data to the BluePrint instance
		$bluePrint->setData($data);
		
		//Add BluePrint instance to the list
        array_push($bluePrintList, $bluePrint);
       
		//Set the list to bluePrint in BodyWrapper instance
        $bodyWrapper->setBlueprint($bluePrintList);
        
        // var_dump($bodyWrapper);
		
		//Call updateBluePrint method that takes BodyWrapper instance 
        $response = $bluePrintOperations->updateBlueprint($bodyWrapper);
        
        if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

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
}
