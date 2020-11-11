<?php
namespace samples\src\com\zoho\crm\api\fields;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\fields\APIException;

use com\zoho\crm\api\fields\FieldsOperations;

use com\zoho\crm\api\fields\GetFieldsParam;

use com\zoho\crm\api\fields\ResponseWrapper;

class Fields
{
	/**
	 * <h3> Get Fields </h3>
	 * This method is used to get metadata about all the fields of a module and print the response.
	 * @throws Exception
	 * @param moduleAPIName The API Name of the module to get fields
	 */
	public static function getFields(string $moduleAPIName)
	{
		//example, moduleAPIName = "Leads";
		
		//Get instance of FieldsOperations Class that takes moduleAPIName as parameter
		$fieldOperations = new FieldsOperations($moduleAPIName);
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		// $paramInstance->add(GetFieldsParam::type(), "Unused");
		
		//Call getFields method that takes paramInstance as parameter 
		$response = $fieldOperations->getFields($paramInstance);
		
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
                
                //Get the list of obtained Field instances
                $fields = $responseWrapper->getFields();
            
                if($fields != null)
                {
                    foreach($fields as $field)
                    {
                        //Get the SystemMandatory of each Field
                        echo("Field SystemMandatory: " );

                        print_r($field->getSystemMandatory());

                        echo("\n");
                        
                        //Get the Webhook of each Field
                        echo("Field Webhook: " . $field->getWebhook() . "\n");
                        
                        //Get the JsonType of each Field
                        echo("Field JsonType: " . $field->getJsonType() . "\n");

                        //Get the private info of each field
                        $privateInfo = $field->getPrivate();

                        //Check if privateInfo is not null
                        if($privateInfo != null)
                        {
                            echo("Private Details\n");

                            //Get the type
                            echo("Field Private Type: " . $privateInfo->getType() . "\n");

                            //Get the Export
                            echo("Field Private Export: " . $privateInfo->getExport() . "\n");

                            //Get the Restricted
                            echo("Field Private Restricted: " . $privateInfo->getRestricted() . "\n");
                        }
                        
                        //Get the obtained Crypt instance
                        $crypt = $field->getCrypt();
                        
                        //Check if crypt is not null
                        if($crypt != null)
                        {
                            //Get the Mode of the Crypt
                            echo("Field Crypt Mode: " . $crypt->getMode() . "\n");
                            
                            //Get the Column of the Crypt
                            echo("Field Crypt Column: " . $crypt->getColumn() . "\n");
                            
                            //Get the Table of the Crypt
                            echo("Field Crypt Table: " . $crypt->getTable() . "\n");
                            
                            //Get the Status of the Crypt
                            echo("Field Crypt Status: " . $crypt->getStatus() . "\n");
                        }
                        
                        //Get the FieldLabel of each Field
                        echo("Field FieldLabel: " . $field->getFieldLabel() . "\n");
                        
                        //Get the Object obtained ToolTip instance
                        $tooltip = $field->getTooltip();
                        
                        //Check if tooltip is not null
                        if($tooltip != null)
                        {
                            //Get the Name of the ToolTip
                            echo("Field ToolTip Name: " . $tooltip->getName() . "\n");
                            
                            //Get the Value of the ToolTip
                            echo("Field ToolTip Value: " . $tooltip->getValue() . "\n");
                        }
                        
                        //Get the CreatedSource of each Field
                        echo("Field CreatedSource: " . $field->getCreatedSource() . "\n");
                        
                        //Get the FieldReadOnly of each Field
                        echo("Field FieldReadOnly: " . $field->getFieldReadOnly() . "\n");
                        
                        //Get the DisplayLabel of each Field
                        echo("Field DisplayLabel: " . $field->getDisplayLabel() . "\n");
                        
                        //Get the ReadOnly of each Field
                        echo("Field ReadOnly: " . $field->getReadOnly() . "\n");
                        
                        //Get the Object obtained AssociationDetails instance
                        $associationDetails = $field->getAssociationDetails();
                        
                        //Check if associationDetails is not null
                        if($associationDetails != null)
                        {
                            //Get the Object obtained LookupField instance
                            $lookupField = $associationDetails->getLookupField();
                            
                            //Check if lookupField is not null
                            if($lookupField != null)
                            {
                                //Get the ID of the LookupField
                                echo("Field AssociationDetails LookupField ID: " . $lookupField->getId() . "\n");
                                
                                //Get the Name of the LookupField
                                echo("Field AssociationDetails LookupField Name: " . $lookupField->getName() . "\n");
                            }
                            
                            //Get the Object obtained LookupField instance
                            $relatedField = $associationDetails->getRelatedField();
                            
                            //Check if relatedField is not null
                            if($relatedField != null)
                            {
                                //Get the ID of the LookupField
                                echo("Field AssociationDetails RelatedField ID: " . $relatedField->getId() . "\n");
                                
                                //Get the Name of the LookupField
                                echo("Field AssociationDetails RelatedField Name: " . $relatedField->getName() . "\n");
                            }
                        }
                        
                        if($field->getQuickSequenceNumber() != null)
                        {
                            //Get the QuickSequenceNumber of each Field
                            echo("Field QuickSequenceNumber: " . $field->getQuickSequenceNumber() . "\n");
                        }
                        
                        //Get the BusinesscardSupported of each Field
                        echo("Field BusinesscardSupported: " . $field->getBusinesscardSupported() . "\n");
                        
                        //Check if MultiModuleLookup is not null
                        if($field->getMultiModuleLookup() != null)
                        {
                            //Get the MultiModuleLookup map
                            foreach($field->getMultiModuleLookup() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . ": " . $value . "\n");
                            }
                        }
                        
                        //Get the Object obtained Currency instance
                        $currency = $field->getCurrency();
                        
                        //Check if currency is not null
                        if($currency != null)
                        {
                            //Get the RoundingOption of the Currency
                            echo("Field Currency RoundingOption: " . $currency->getRoundingOption() . "\n");
                            
                            if($currency->getPrecision() != null)
                            {
                                //Get the Precision of the Currency
                                echo("Field Currency Precision: " . $currency->getPrecision() . "\n");
                            }
                        }
                        
                        //Get the ID of each Field
                        echo("Field ID: " . $field->getId() . "\n");
                        
                        if($field->getCustomField() != null)
                        {
                            //Get the CustomField of each Field
                            echo("Field CustomField: " . $field->getCustomField() . "\n");
                        }
                        
                        //Get the Object obtained Module instance
                        $lookup = $field->getLookup();
                        
                        //Check if lookup is not null
                        if($lookup != null)
                        {
                            //Get the Object obtained Layout instance
                            $layout = $lookup->getLayout();
                            
                            //Check if layout is not null
                            if($layout != null)
                            {
                                //Get the ID of the Layout
                                echo("Field ModuleLookup Layout ID: " . $layout->getId() . "\n");
                                
                                //Get the Name of the Layout
                                echo("Field ModuleLookup Layout Name: " . $layout->getName() . "\n");
                            }
                            
                            //Get the DisplayLabel of the Module
                            echo("Field ModuleLookup DisplayLabel: " . $lookup->getDisplayLabel() . "\n");
                            
                            //Get the APIName of the Module
                            echo("Field ModuleLookup APIName: " . $lookup->getAPIName() . "\n");
                            
                            //Get the Module of the Module
                            echo("Field ModuleLookup Module: " . $lookup->getModule() . "\n");
                            
                            if($lookup->getId() != null)
                            {
                                //Get the ID of the Module
                                echo("Field ModuleLookup ID: " . $lookup->getId() . "\n");
                            }
                        }
                        
                        if($field->getVisible() != null)
                        {
                            //Get the Visible of each Field
                            echo("Field Visible: " . $field->getVisible() . "\n");
                        }
                        
                        if($field->getLength() != null)
                        {
                            //Get the Length of each Field
                            echo("Field Length: " . $field->getLength() . "\n");
                        }
                        
                        //Get the Object obtained ViewType instance
                        $viewType = $field->getViewType();
                        
                        //Check if viewType is not null
                        if($viewType != null)
                        {
                            //Get the View of the ViewType
                            echo("Field ViewType View: " . $viewType->getView() . "\n");
                            
                            //Get the Edit of the ViewType
                            echo("Field ViewType Edit: " . $viewType->getEdit() . "\n");
                            
                            //Get the Create of the ViewType
                            echo("Field ViewType Create: " . $viewType->getCreate() . "\n");
                            
                            //Get the View of the ViewType
                            echo("Field ViewType QuickCreate: " . $viewType->getQuickCreate() . "\n");
                        }
                        
                        //Get the Object obtained Module instance
                        $subform = $field->getSubform();
                        
                        //Check if subform is not null
                        if($subform != null)
                        {
                            //Get the Object obtained Layout instance
                            $layout = $subform->getLayout();
                            
                            //Check if layout is not null
                            if($layout != null)
                            {
                                //Get the ID of the Layout
                                echo("Field Subform Layout ID: " . $layout->getId() . "\n");
                                
                                //Get the Name of the Layout
                                echo("Field Subform Layout Name: " . $layout->getName() . "\n");
                            }
                            
                            if($subform->getDisplayLabel() != null)
                            {
                                //Get the DisplayLabel of the Module
                                echo("Field Subform DisplayLabel: " . $subform->getDisplayLabel() . "\n");    
                            }
                        
                            //Get the APIName of the Module
                            echo("Field Subform APIName: " . $subform->getAPIName() . "\n");
                            
                            //Get the Module of the Module
                            echo("Field Subform Module: " . $subform->getModule() . "\n");
                            
                            if($subform->getId() != null)
                            {
                                //Get the ID of the Module
                                echo("Field Subform ID: " . $subform->getId() . "\n");	
                            }
                        }
                        
                        //Get the APIName of each Field
                        echo("Field APIName: " . $field->getAPIName() . "\n");
                        
                        //Get the Object obtained Unique instance
                        $unique = $field->getUnique();
                        
                        //Check if unique is not null
                        if($unique != null)
                        {
                            //Get the Casesensitive of the Unique
                            echo("Field Unique Casesensitive : " . $unique->getCasesensitive() . "\n");
                        }
                        
                        if($field->getHistoryTracking() != null)
                        {
                            //Get the HistoryTracking of each Field
                            echo("Field HistoryTracking: " . $field->getHistoryTracking() . "\n");
                        }
                        
                        //Get the DataType of each Field
                        echo("Field DataType: " . $field->getDataType() . "\n");
                        
                        //Get the Object obtained Formula instance
                        $formula = $field->getFormula();
                        
                        //Check if formula is not null
                        if($formula != null)
                        {
                            //Get the ReturnType of the Formula
                            echo("Field Formula ReturnType : " . $formula->getReturnType() . "\n");
                            
                            if($formula->getExpression() != null)
                            {
                                //Get the Expression of the Formula
                                echo("Field Formula Expression : " . $formula->getExpression() . "\n");
                            }
                        }
                        
                        if($field->getDecimalPlace() != null)
                        {
                            //Get the DecimalPlace of each Field
                            echo("Field DecimalPlace: " . $field->getDecimalPlace() . "\n");
                        }
                        
                        //Get the MassUpdate of each Field
                        echo("Field MassUpdate: " . $field->getMassUpdate() . "\n");
                        
                        if($field->getBlueprintSupported() != null)
                        {
                            //Get the BlueprintSupported of each Field
                            echo("Field BlueprintSupported: " . $field->getBlueprintSupported() . "\n");
                        }
                        
                        //Get all entries from the MultiSelectLookup instance
                        $multiSelectLookup = $field->getMultiselectlookup();
                        
                        //Check if formula is not null
                        if($multiSelectLookup != null)
                        {
                            //Get the DisplayValue of the MultiSelectLookup
                            echo("Field MultiSelectLookup DisplayLabel: " . $multiSelectLookup->getDisplayLabel() . "\n");
                            
                            //Get the LinkingModule of the MultiSelectLookup
                            echo("Field MultiSelectLookup LinkingModule: " . $multiSelectLookup->getLinkingModule() . "\n");
                            
                            //Get the LookupApiname of the MultiSelectLookup
                            echo("Field MultiSelectLookup LookupApiname: " . $multiSelectLookup->getLookupApiname() . "\n");
                            
                            //Get the APIName of the MultiSelectLookup
                            echo("Field MultiSelectLookup APIName: " . $multiSelectLookup->getAPIName() . "\n");
                            
                            //Get the ConnectedlookupApiname of the MultiSelectLookup
                            echo("Field MultiSelectLookup ConnectedlookupApiname: " . $multiSelectLookup->getConnectedlookupApiname() . "\n");
                            
                            //Get the ID of the MultiSelectLookup
                            echo("Field MultiSelectLookup ID: " . $multiSelectLookup->getId() . "\n");
                        }
                        
                        //Get the PickListValue of each Field
                        $pickListValues = $field->getPickListValues();
                        
                        //Check if formula is not null
                        if($pickListValues != null)
                        {
                            foreach($pickListValues as $pickListValue)
                            {
                                //Get the DisplayValue of each PickListValues
                                echo("Field PickListValue DisplayValue: " . $pickListValue->getDisplayValue() . "\n");
                                
                                if($pickListValue->getSequenceNumber() != null)
                                {
                                    //Get the SequenceNumber of each PickListValues
                                    echo(" Field PickListValue SequenceNumber: " . $pickListValue->getSequenceNumber() . "\n");
                                }
                                
                                //Get the ExpectedDataType of each PickListValues
                                echo("Field PickListValue ExpectedDataType: " . $pickListValue->getExpectedDataType() . "\n");
                                
                                //Get the ActualValue of each PickListValues
                                echo("Field PickListValue ActualValue: " . $pickListValue->getActualValue() . "\n");
                                
                                if($pickListValue->getMaps() != null)
                                {
                                    foreach($pickListValue->getMaps() as $map)
                                    {
                                        //Get each value from the map
                                        echo($map . "\n");
                                    }
                                }
                                
                                //Get the SysRefName of each PickListValues
                                echo("Field PickListValue SysRefName: " . $pickListValue->getSysRefName() . "\n");
                                
                                //Get the Type of each PickListValues
                                echo("Field PickListValue Type: " . $pickListValue->getType() . "\n");
                            }
                        }
                        
                        //Get the AutoNumber of each Field
                        $autoNumber = $field->getAutoNumber();
                        
                        //Check if formula is not null
                        if($autoNumber != null)
                        {
                            //Get the Prefix of the AutoNumber
                            echo("Field AutoNumber Prefix: " . $autoNumber->getPrefix() . "\n");
                            
                            //Get the Suffix of the AutoNumber
                            echo("Field AutoNumber Suffix: " . $autoNumber->getSuffix() . "\n");
                            
                            if($autoNumber->getStartNumber() != null)
                            {
                                //Get the StartNumber of the AutoNumber
                                echo("Field AutoNumber StartNumber: " . $autoNumber->getStartNumber() . "\n");
                            }
                        }
                        
                        if($field->getDefaultValue() != null)
                        {
                            //Get the DefaultValue of each Field
                            echo("Field DefaultValue: " . $field->getDefaultValue() . "\n");
                        }
                        
                        if($field->getSectionId() != null)
                        {
                            //Get the SectionId of each Field
                            echo("Field SectionId: " . $field->getSectionId() . "\n");
                        }
                        
                        //Check if ValidationRule is not null
                        if($field->getValidationRule() != null)
                        {
                            //Get the details map
                            foreach($field->getValidationRule() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . " : " . $value . "\n");
                            }
                        }
                        
                        //Check if ConvertMapping is not null
                        if($field->getConvertMapping() != null)
                        {
                            //Get the details map
                            foreach($field->getConvertMapping() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . " : " . $value . "\n");
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
	
	/**
	 * <h3> Get Field </h3>
	 * This method is used to get metadata about a single field of a module with fieldID and print the response.
	 * @param moduleAPIName The API Name of the field's module
	 * @param fieldId The ID of the field to be obtained
	 * @throws Exception
	 */
	public static function getField(string $moduleAPIName, string $fieldId)
	{
		//example,
		//moduleAPIName = "Leads";
		//fieldId = "525508000005067912";
		
		//Get instance of FieldsOperations Class that takes moduleAPIName as parameter
		$fieldOperations = new FieldsOperations($moduleAPIName);
		
		//Call getField method which takes fieldId as parameter
		$response = $fieldOperations->getField($fieldId);
		
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
                
                //Get the list of obtained Field instances
                $fields = $responseWrapper->getFields();
            
                foreach($fields as $field)
                {
                    //Get the SystemMandatory of each Field
                    echo("Field SystemMandatory: " );

                    print_r($field->getSystemMandatory());

                    echo("\n");
                    
                    //Get the Webhook of each Field
                    echo("Field Webhook: " . $field->getWebhook() . "\n");
                    
                    //Get the JsonType of each Field
                    echo("Field JsonType: " . $field->getJsonType() . "\n");

                    //Get the private info of each field
                    $privateInfo = $field->getPrivate();

                    //Check if privateInfo is not null
                    if($privateInfo != null)
                    {
                        echo("Private Details\n");

                        //Get the type
                        echo("Field Private Type: " . $privateInfo->getType() . "\n");

                        //Get the Export
                        echo("Field Private Export: " . $privateInfo->getExport() . "\n");

                        //Get the Restricted
                        echo("Field Private Restricted: " . $privateInfo->getRestricted() . "\n");
                    }
                    
                    //Get the Object obtained Crypt instance
                    $crypt = $field->getCrypt();
                    
                    //Check if crypt is not null
                    if($crypt != null)
                    {
                        //Get the Mode of the Crypt
                        echo("Field Crypt Mode: " . $crypt->getMode() . "\n");
                        
                        //Get the Column of the Crypt
                        echo("Field Crypt Column: " . $crypt->getColumn() . "\n");
                        
                        //Get the Table of the Crypt
                        echo("Field Crypt Table: " . $crypt->getTable() . "\n");
                        
                        //Get the Status of the Crypt
                        echo("Field Crypt Status: " . $crypt->getStatus() . "\n");
                    }
                    
                    //Get the FieldLabel of each Field
                    echo("Field FieldLabel: " . $field->getFieldLabel() . "\n");
                    
                   //Get the Object obtained ToolTip instance
                   $tooltip = $field->getTooltip();
                    
                   //Check if tooltip is not null
                   if($tooltip != null)
                   {
                       //Get the Name of the ToolTip
                       echo("Field ToolTip Name: " . $tooltip->getName() . "\n");
                       
                       //Get the Value of the ToolTip
                       echo("Field ToolTip Value: " . $tooltip->getValue() . "\n");
                   }
                    
                    //Get the CreatedSource of each Field
                    echo("Field CreatedSource: " . $field->getCreatedSource() . "\n");
                    
                    //Get the FieldReadOnly of each Field
                    echo("Field FieldReadOnly: " . $field->getFieldReadOnly() . "\n");
                    
                    //Get the DisplayLabel of each Field
                    echo("Field DisplayLabel: " . $field->getDisplayLabel() . "\n");
                    
                    //Get the ReadOnly of each Field
                    echo("Field ReadOnly: " . $field->getReadOnly() . "\n");
                    
                    //Get the Object obtained AssociationDetails instance
                    $associationDetails = $field->getAssociationDetails();
                    
                    //Check if associationDetails is not null
                    if($associationDetails != null)
                    {
                        //Get the Object obtained LookupField instance
                        $lookupField = $associationDetails->getLookupField();
                        
                        //Check if lookupField is not null
                        if($lookupField != null)
                        {
                            //Get the ID of the LookupField
                            echo("Field AssociationDetails LookupField ID: " . $lookupField->getId() . "\n");
                            
                            //Get the Name of the LookupField
                            echo("Field AssociationDetails LookupField Name: " . $lookupField->getName() . "\n");
                        }
                        
                        //Get the Object obtained LookupField instance
                        $relatedField = $associationDetails->getRelatedField();
                        
                        //Check if relatedField is not null
                        if($relatedField != null)
                        {
                            //Get the ID of the LookupField
                            echo("Field AssociationDetails RelatedField ID: " . $relatedField->getId() . "\n");
                            
                            //Get the Name of the LookupField
                            echo("Field AssociationDetails RelatedField Name: " . $relatedField->getName() . "\n");
                        }
                    }
                    
                    if($field->getQuickSequenceNumber() != null)
                    {
                        //Get the QuickSequenceNumber of each Field
                        echo("Field QuickSequenceNumber: " . $field->getQuickSequenceNumber() . "\n");
                    }
                    
                    //Get the BusinesscardSupported of each Field
                    echo("Field BusinesscardSupported: " . $field->getBusinesscardSupported() . "\n");
                    
                    //Check if MultiModuleLookup is not null
                    if($field->getMultiModuleLookup() != null)
                    {
                        //Get the MultiModuleLookup map
                        foreach($field->getMultiModuleLookup() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . ": " . $value . "\n");
                        }
                    }
                    
                    //Get the Object obtained Currency instance
                    $currency = $field->getCurrency();
                    
                    //Check if currency is not null
                    if($currency != null)
                    {
                        //Get the RoundingOption of the Currency
                        echo("Field Currency RoundingOption: " . $currency->getRoundingOption() . "\n");
                        
                        if($currency->getPrecision() != null)
                        {
                            //Get the Precision of the Currency
                            echo("Field Currency Precision: " . $currency->getPrecision() . "\n");
                        }
                    }
                    
                    //Get the ID of each Field
                    echo("Field ID: " . $field->getId() . "\n");
                    
                    if($field->getCustomField() != null)
                    {
                        //Get the CustomField of each Field
                        echo("Field CustomField: " . $field->getCustomField() . "\n");
                    }
                    
                    //Get the Object obtained Module instance
                    $lookup = $field->getLookup();
                    
                    //Check if lookup is not null
                    if($lookup != null)
                    {
                        //Get the Object obtained Layout instance
                        $layout = $lookup->getLayout();
                        
                        //Check if layout is not null
                        if($layout != null)
                        {
                            //Get the ID of the Layout
                            echo("Field ModuleLookup Layout ID: " . $layout->getId() . "\n");
                            
                            //Get the Name of the Layout
                            echo("Field ModuleLookup Layout Name: " . $layout->getName() . "\n");
                        }
                        
                        //Get the DisplayLabel of the Module
                        echo("Field ModuleLookup DisplayLabel: " . $lookup->getDisplayLabel() . "\n");
                    
                        //Get the APIName of the Module
                        echo("Field ModuleLookup APIName: " . $lookup->getAPIName() . "\n");
                        
                        //Get the Module of the Module
                        echo("Field ModuleLookup Module: " . $lookup->getModule() . "\n");
                        
                        if($lookup->getId() != null)
                        {
                            //Get the ID of the Module
                            echo("Field ModuleLookup ID: " . $lookup->getId() . "\n");
                        }
                    }
                    
                    if($field->getVisible() != null)
                    {
                        //Get the Visible of each Field
                        echo("Field Visible: " . $field->getVisible() . "\n");
                    }
                    
                    if($field->getLength() != null)
                    {
                        //Get the Length of each Field
                        echo("Field Length: " . $field->getLength() . "\n");
                    }
                    
                    //Get the Object obtained ViewType instance
                    $viewType = $field->getViewType();
                    
                    //Check if viewType is not null
                    if($viewType != null)
                    {
                        //Get the View of the ViewType
                        echo("Field ViewType View: " . $viewType->getView() . "\n");
                        
                        //Get the Edit of the ViewType
                        echo("Field ViewType Edit: " . $viewType->getEdit() . "\n");
                        
                        //Get the Create of the ViewType
                        echo("Field ViewType Create: " . $viewType->getCreate() . "\n");
                        
                        //Get the View of the ViewType
                        echo("Field ViewType QuickCreate: " . $viewType->getQuickCreate() . "\n");
                    }
                    
                    //Get the Object obtained Module instance
                    $subform = $field->getSubform();
                
                    //Check if subform is not null
                    if($subform != null)
                    {
                        //Get the Object obtained Layout instance
                        $layout = $subform->getLayout();
                        
                        //Check if layout is not null
                        if($layout != null)
                        {
                            //Get the ID of the Layout
                            echo("Field Subform Layout ID: " . $layout->getId() . "\n");
                            
                            //Get the Name of the Layout
                            echo("Field Subform Layout Name: " . $layout->getName() . "\n");
                        }
                        
                        //Get the DisplayLabel of the Module
                        echo("Field Subform DisplayLabel: " . $subform->getDisplayLabel() . "\n");
                        
                        //Get the APIName of the Module
                        echo("Field Subform APIName: " . $subform->getAPIName() . "\n");
                        
                        //Get the Module of the Module
                        echo("Field Subform Module: " . $subform->getModule() . "\n");
                        
                        if($subform->getId() != null)
                        {
                            //Get the ID of the Module
                            echo("Field Subform ID: " . $subform->getId() . "\n");	
                        }
                    }
                    
                    //Get the APIName of each Field
                    echo("Field APIName: " . $field->getAPIName() . "\n");
                    
                    //Get the Object obtained Unique instance
                    $unique = $field->getUnique();
                
                    //Check if unique is not null
                    if($unique != null)
                    {
                        //Get the Casesensitive of the Unique
                        echo("Field Unique Casesensitive : " . $unique->getCasesensitive() . "\n");
                    }
                    
                    if($field->getHistoryTracking() != null)
                    {
                        //Get the HistoryTracking of each Field
                        echo("Field HistoryTracking: " . $field->getHistoryTracking() . "\n");
                    }
                    
                    //Get the DataType of each Field
                    echo("Field DataType: " . $field->getDataType() . "\n");
                    
                    //Get the Object obtained Formula instance
                    $formula = $field->getFormula();
                    
                    //Check if formula is not null
                    if($formula != null)
                    {
                        //Get the ReturnType of the Formula
                        echo("Field Formula ReturnType : " . $formula->getReturnType() . "\n");
                        
                        if($formula->getExpression() != null)
                        {
                            //Get the Expression of the Formula
                            echo("Field Formula Expression : " . $formula->getExpression() . "\n");
                        }
                    }
                    
                    if($field->getDecimalPlace() != null)
                    {
                        //Get the DecimalPlace of each Field
                        echo("Field DecimalPlace: " . $field->getDecimalPlace() . "\n");
                    }
                    
                    //Get the MassUpdate of each Field
                    echo("Field MassUpdate: " . $field->getMassUpdate() . "\n");
                    
                    if($field->getBlueprintSupported() != null)
                    {
                        //Get the BlueprintSupported of each Field
                        echo("Field BlueprintSupported: " . $field->getBlueprintSupported() . "\n");
                    }
                    
                    //Get all entries from the MultiSelectLookup instance
                    $multiSelectLookup = $field->getMultiselectlookup();
                    
                    //Check if formula is not null
                    if($multiSelectLookup != null)
                    {
                        //Get the DisplayValue of the MultiSelectLookup
                        echo("Field MultiSelectLookup DisplayLabel: " . $multiSelectLookup->getDisplayLabel() . "\n");
                       
                        //Get the LinkingModule of the MultiSelectLookup
                        echo("Field MultiSelectLookup LinkingModule: " . $multiSelectLookup->getLinkingModule() . "\n");
                        
                        //Get the LookupApiname of the MultiSelectLookup
                        echo("Field MultiSelectLookup LookupApiname: " . $multiSelectLookup->getLookupApiname() . "\n");
                        
                        //Get the APIName of the MultiSelectLookup
                        echo("Field MultiSelectLookup APIName: " . $multiSelectLookup->getAPIName() . "\n");
                        
                        //Get the ConnectedlookupApiname of the MultiSelectLookup
                        echo("Field MultiSelectLookup ConnectedlookupApiname: " . $multiSelectLookup->getConnectedlookupApiname() . "\n");
                        
                        //Get the ID of the MultiSelectLookup
                        echo("Field MultiSelectLookup ID: " . $multiSelectLookup->getId() . "\n");
                    }
                    
                    //Get the PickListValue of each Field
                    $pickListValues = $field->getPickListValues();
                
                    //Check if formula is not null
                    if($pickListValues != null)
                    {
                        foreach($pickListValues as $pickListValue)
                        {
                            //Get the DisplayValue of each PickListValues
                            echo("Field PickListValue DisplayValue: " . $pickListValue->getDisplayValue() . "\n");
                            
                            if($pickListValue->getSequenceNumber() != null)
                            {
                                //Get the SequenceNumber of each PickListValues
                                echo(" Field PickListValue SequenceNumber: " . $pickListValue->getSequenceNumber() . "\n");
                            }
                            
                            //Get the ExpectedDataType of each PickListValues
                            echo("Field PickListValue ExpectedDataType: " . $pickListValue->getExpectedDataType() . "\n");
                            
                            //Get the ActualValue of each PickListValues
                            echo("Field PickListValue ActualValue: " . $pickListValue->getActualValue() . "\n");
                            
                            if($pickListValue->getMaps() != null)
                            {
                                foreach($pickListValue->getMaps() as $map)
                                {
                                    //Get each value from the map
                                    echo($map . "\n");
                                }
                            }
                            
                            //Get the SysRefName of each PickListValues
                            echo("Field PickListValue SysRefName: " . $pickListValue->getSysRefName() . "\n");
                            
                            //Get the Type of each PickListValues
                            echo("Field PickListValue Type: " . $pickListValue->getType() . "\n");
                        }
                    }
                    
                    //Get the AutoNumber of each Field
                    $autoNumber = $field->getAutoNumber();
                    
                    //Check if formula is not null
                    if($autoNumber != null)
                    {
                        //Get the Prefix of the AutoNumber
                        echo("Field AutoNumber Prefix: " . $autoNumber->getPrefix() . "\n");
                        
                        //Get the Suffix of the AutoNumber
                        echo("Field AutoNumber Suffix: " . $autoNumber->getSuffix() . "\n");
                        
                        if($autoNumber->getStartNumber() != null)
                        {
                            //Get the StartNumber of the AutoNumber
                            echo("Field AutoNumber StartNumber: " . $autoNumber->getStartNumber() . "\n");
                        }
                    }
                    
                    if($field->getDefaultValue() != null)
                    {
                        //Get the DefaultValue of each Field
                        echo("Field DefaultValue: " . $field->getDefaultValue() . "\n");
                    }
                    
                    if($field->getSectionId() != null)
                    {
                        //Get the SectionId of each Field
                        echo("Field SectionId: " . $field->getSectionId() . "\n");
                    }
                    
                    //Check if ValidationRule is not null
                    if($field->getValidationRule() != null)
                    {
                        //Get the details map
                        foreach($field->getValidationRule() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " . $value . "\n");
                        }
                    }
                    
                    //Check if ConvertMapping is not null
                    if($field->getConvertMapping() != null)
                    {
                        //Get the details map
                        foreach($field->getConvertMapping() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . " : " . $value . "\n");
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
