<?php
namespace samples\src\com\zoho\crm\api\relatedrecords;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\layouts\Layout;

use com\zoho\crm\api\record\FileDetails;

use com\zoho\crm\api\record\InventoryLineItems;

use com\zoho\crm\api\record\LineTax;

use com\zoho\crm\api\record\PricingDetails;

use com\zoho\crm\api\relatedrecords\APIException;

use com\zoho\crm\api\relatedrecords\ActionWrapper;

use com\zoho\crm\api\relatedrecords\BodyWrapper;

use com\zoho\crm\api\relatedrecords\RelatedRecordsOperations;

use com\zoho\crm\api\relatedrecords\DelinkRecordsParam;

use com\zoho\crm\api\relatedrecords\GetRelatedRecordHeader;

use com\zoho\crm\api\relatedrecords\GetRelatedRecordsHeader;

use com\zoho\crm\api\relatedrecords\GetRelatedRecordsParam;

use com\zoho\crm\api\relatedrecords\ResponseWrapper;

use com\zoho\crm\api\relatedrecords\SuccessResponse;

use com\zoho\crm\api\tags\Tag;

use com\zoho\crm\api\users\User;

use com\zoho\crm\api\util\Choice;

use com\zoho\crm\api\record\Record;

use com\zoho\crm\api\record\Consent;

use com\zoho\crm\api\record\Comment;

use com\zoho\crm\api\record\Participants;

use com\zoho\crm\api\relatedrecords\FileBodyWrapper;

use com\zoho\crm\api\attachments\Attachment;

class RelatedRecords
{
	/**
	 * <h3> Get Related Records </h3>
	 * This method is used to get the related list records and print the response.
	 * @param moduleAPIName - The API Name of the module to get related records.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @throws Exception
	 */
	public static function getRelatedRecords(string $moduleAPIName, string $recordId, string $relatedListAPIName)
	{
		//example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations( $relatedListAPIName,  $recordId,  $moduleAPIName);
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetRelatedRecordsParam::page(), 1);
		
		$paramInstance->add(GetRelatedRecordsParam::perPage(), 2);
		
		//Get instance of HeaderMap Class
		$headerInstance = new HeaderMap();

		$datetime = date_create("2019-02-26T15:28:34+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
		
		$headerInstance->add(GetRelatedRecordsHeader::IfModifiedSince(), $datetime);
		
		//Call getRelatedRecords method that takes paramInstance, headerInstance as parameter
		$response = $relatedRecordsOperations->getRelatedRecords($paramInstance, $headerInstance);
		
		if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");

                return;
			}
			
			if($response->isExpected())
			{
				//Get object from response
				$responseHandler = $response->getObject();
				
				if($responseHandler instanceof ResponseWrapper)
				{
					//Get the received ResponseWrapper instance
					$responseWrapper = $responseHandler;
					
					//Get the obtained Record instance
					$records = $responseWrapper->getData();
	
					if($records != null)
					{
						foreach($records as $record)
						{					
							//Get the ID of each Record
							echo("RelatedRecord ID: " . $record->getId() . "\n");
							
							//Get the createdBy User instance of each Record
							$createdBy = $record->getCreatedBy();
							
							//Check if createdBy is not null
							if($createdBy != null)
							{
								//Get the ID of the createdBy User
								echo("RelatedRecord Created By User-ID: " . $createdBy->getId() . "\n");
								
								//Get the name of the createdBy User
								echo("RelatedRecord Created By User-Name: " . $createdBy->getName() . "\n");
								
								//Get the Email of the createdBy User
								echo("RelatedRecord Created By User-Email: " . $createdBy->getEmail() . "\n");
							}
							
							//Get the CreatedTime of each Record
							echo("RelatedRecord CreatedTime: ");
							
							print_r($record->getCreatedTime());
							
							echo("\n");
							
							//Get the modifiedBy User instance of each Record
							$modifiedBy = $record->getModifiedBy();
							
							//Check if modifiedBy is not null
							if($modifiedBy != null)
							{
								//Get the ID of the modifiedBy User
								echo("RelatedRecord Modified By User-ID: " . $modifiedBy->getId() . "\n");
								
								//Get the name of the modifiedBy User
								echo("RelatedRecord Modified By User-Name: " . $modifiedBy->getName() . "\n");
								
								//Get the Email of the modifiedBy User
								echo("RelatedRecord Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
							}
							
							//Get the ModifiedTime of each Record
							echo("RelatedRecord ModifiedTime: ");
							
							print_r($record->getModifiedTime());
	
							echo("\n");
							
							//Get the list of Tag instance each Record
							$tags = $record->getTag();
							
							//Check if tags is not null
							if($tags != null)
							{
								foreach($tags as $tag)
								{
									//Get the Name of each Tag
									echo("RelatedRecord Tag Name: " . $tag->getName() . "\n");
									
									//Get the Id of each Tag
									echo("RelatedRecord Tag ID: " . $tag->getId() . "\n");
								}
							}
							
							//To get particular field value 
							echo("RelatedRecord Field Value: " . $record->getKeyValue("Last_Name") . "\n");// FieldApiName
							
							echo("RelatedRecord KeyValues : \n" );
							
							//Get the KeyValue map
							foreach($record->getKeyValues() as $keyName => $value)
							{
								if($value != null)
								{
									if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
									{
										if($value[0] instanceof FileDetails)
										{
											$fileDetails = $value;
											
											foreach($fileDetails as $fileDetail)
											{
												//Get the Extn of each FileDetails
												echo("RelatedRecord FileDetails Extn: " . $fileDetail->getExtn() . "\n");
												
												//Get the IsPreviewAvailable of each FileDetails
												echo("RelatedRecord FileDetails IsPreviewAvailable: " . $fileDetail->getIsPreviewAvailable() . "\n");
												
												//Get the DownloadUrl of each FileDetails
												echo("RelatedRecord FileDetails DownloadUrl: " . $fileDetail->getDownloadUrl() . "\n");
												
												//Get the DeleteUrl of each FileDetails
												echo("RelatedRecord FileDetails DeleteUrl: " . $fileDetail->getDeleteUrl() . "\n");
												
												//Get the EntityId of each FileDetails
												echo("RelatedRecord FileDetails EntityId: " . $fileDetail->getEntityId() . "\n");
												
												//Get the Mode of each FileDetails
												echo("RelatedRecord FileDetails Mode: " . $fileDetail->getMode() . "\n");
												
												//Get the OriginalSizeByte of each FileDetails
												echo("RelatedRecord FileDetails OriginalSizeByte: " . $fileDetail->getOriginalSizeByte() . "\n");
												
												//Get the PreviewUrl of each FileDetails
												echo("RelatedRecord FileDetails PreviewUrl: " . $fileDetail->getPreviewUrl() . "\n");
												
												//Get the FileName of each FileDetails
												echo("RelatedRecord FileDetails FileName: " . $fileDetail->getFileName() . "\n");
												
												//Get the FileId of each FileDetails
												echo("RelatedRecord FileDetails FileId: " . $fileDetail->getFileId() . "\n");
												
												//Get the AttachmentId of each FileDetails
												echo("RelatedRecord FileDetails AttachmentId: " . $fileDetail->getAttachmentId() . "\n");
												
												//Get the FileSize of each FileDetails
												echo("RelatedRecord FileDetails FileSize: " . $fileDetail->getFileSize() . "\n");
												
												//Get the CreatorId of each FileDetails
												echo("RelatedRecord FileDetails CreatorId: " . $fileDetail->getCreatorId() . "\n");
												
												//Get the LinkDocs of each FileDetails
												echo("RelatedRecord FileDetails LinkDocs: " . $fileDetail->getLinkDocs() . "\n");
											}
										}
										else if($value[0] instanceof InventoryLineItems)
										{
											$productDetails = $value;
											
											foreach($productDetails as $productDetail)
											{
												$lineItemProduct = $productDetail->getProduct();
												
												if($lineItemProduct != null)
												{
													echo("RelatedRecord ProductDetails LineItemProduct ProductCode: " . $lineItemProduct->getProductCode() . "\n");
													
													echo("RelatedRecord ProductDetails LineItemProduct Currency: " . $lineItemProduct->getCurrency() . "\n");
													
													echo("RelatedRecord ProductDetails LineItemProduct Name: " . $lineItemProduct->getName() . "\n");
													
													echo("RelatedRecord ProductDetails LineItemProduct Id: " . $lineItemProduct->getId() . "\n");
												}
												
												echo("RelatedRecord ProductDetails Quantity: " . $productDetail->getQuantity(). "\n");
												
												echo("RelatedRecord ProductDetails Discount: " . $productDetail->getDiscount() . "\n");
												
												echo("RelatedRecord ProductDetails TotalAfterDiscount: " . $productDetail->getTotalAfterDiscount(). "\n");
												
												echo("RelatedRecord ProductDetails NetTotal: " . $productDetail->getNetTotal(). "\n");
												
												if($productDetail->getBook() != null)
												{
													echo("RelatedRecord ProductDetails Book: " . $productDetail->getBook(). "\n");
												}
												
												echo("RelatedRecord ProductDetails Tax: " . $productDetail->getTax(). "\n");
												
												echo("RelatedRecord ProductDetails ListPrice: " . $productDetail->getListPrice(). "\n");
												
												echo("RelatedRecord ProductDetails UnitPrice: " . $productDetail->getUnitPrice(). "\n");
												
												echo("RelatedRecord ProductDetails QuantityInStock: " . $productDetail->getQuantityInStock(). "\n");
												
												echo("RelatedRecord ProductDetails Total: " . $productDetail->getTotal(). "\n");
												
												echo("RelatedRecord ProductDetails ID: " . $productDetail->getId() . "\n");
												
												echo("RelatedRecord ProductDetails ProductDescription: " . $productDetail->getProductDescription() . "\n");
												
												$lineTaxes = $productDetail->getLineTax();
													
												foreach($lineTaxes as $lineTax)
												{
													echo("RelatedRecord ProductDetails LineTax Percentage: " . $lineTax->getPercentage(). "\n");
													
													echo("RelatedRecord ProductDetails LineTax Name: " . $lineTax->getName() . "\n");
													
													echo("RelatedRecord ProductDetails LineTax Id: " . $lineTax->getId() . "\n");
													
													echo("RelatedRecord ProductDetails LineTax Value: " . $lineTax->getValue(). "\n");
												}
											}
										}
										else if($value[0] instanceof Tag)
										{
											$tagList = $value;
											
											foreach($tagList as $tag)
											{
												//Get the Name of each Tag
												echo("RelatedRecord Tag Name: " . $tag->getName() . "\n");
												
												//Get the Id of each Tag
												echo("RelatedRecord Tag ID: " . $tag->getId() . "\n");
											}
										}
										else if($value[0] instanceof PricingDetails)
										{
											$pricingDetails = $value;
											
											foreach($pricingDetails as $pricingDetail)
											{
												echo("RelatedRecord PricingDetails ToRange: " . $pricingDetail->getToRange(). "\n");
												
												echo("RelatedRecord PricingDetails Discount: " . $pricingDetail->getDiscount(). "\n");
												
												echo("RelatedRecord PricingDetails ID: " . $pricingDetail->getId() . "\n");
												
												echo("RelatedRecord PricingDetails FromRange: " . $pricingDetail->getFromRange(). "\n");
											}
										}
										else if($value[0] instanceof Participants)
										{
											$participants = $value;
											
											foreach($participants as $participant)
											{
												echo("RelatedRecord Participants Name: " . $participant->getName() . "\n");
												
												echo("RelatedRecord Participants Invited: " . $participant->getInvited() . "\n");
												
												echo("RelatedRecord Participants ID: " . $participant->getId() . "\n");
												
												echo("RelatedRecord Participants Type: " . $participant->getType() . "\n");
												
												echo("RelatedRecord Participants Participant: " . $participant->getParticipant() . "\n");
												
												echo("RelatedRecord Participants Status: " . $participant->getStatus() . "\n");
											}
										}
										else if($value[0] instanceof Record)
										{
											$recordList = $value;
											
											foreach($recordList as $record1)
											{
												//Get the details map
												foreach($record1->getKeyValues() as $key => $value1)
												{
													//Get each value in the map
													echo($key . " : " );
	
													print_r($value1);
	
													echo("\n");
												}
											}
										}
										else if($value[0] instanceof LineTax)
										{
											$lineTaxes = $value;
											
											foreach($lineTaxes as $lineTax)
											{
												echo("RelatedRecord ProductDetails LineTax Percentage: " . $lineTax->getPercentage(). "\n");
												
												echo("RelatedRecord ProductDetails LineTax Name: " . $lineTax->getName() . "\n");
												
												echo("RelatedRecord ProductDetails LineTax Id: " . $lineTax->getId() . "\n");
												
												echo("RelatedRecord ProductDetails LineTax Value: " . $lineTax->getValue(). "\n");
											}
										}
										else if($value[0] instanceof Choice)
										{
											$choice = $value;
											
											foreach($choice as $choiceValue)
											{
												echo("RelatedRecord " . $keyName . " : " . $choiceValue->getValue() . "\n");
											}
										}
										else if($value[0] instanceof Comment)
										{
											$comments = $value;
											
											foreach($comments as $comment)
											{
												echo("Record Comment CommentedBy: " . $comment->getCommentedBy() . "\n");
												
												echo("Record Comment CommentedTime: ");
												
												print_r($comment->getCommentedTime());
												
												echo("\n");
												
												echo("Record Comment CommentContent: " . $comment->getCommentContent(). "\n");
												
												echo("Record Comment Id: " . $comment->getId() . "\n");
											}
										}
										else if($value[0] instanceof Attachment)
										{
											$attachments = $value;
		
											foreach ($attachments as $attachment)
											{
												//Get the owner User instance of each attachment
												$owner = $attachment->getOwner();
		
												//Check if owner is not null
												if($owner != null)
												{
													//Get the Name of the Owner
													echo("RelatedRecord Attachment Owner User-Name: " . $owner->getName() . "\n");
													
													//Get the ID of the Owner
													echo("RelatedRecord Attachment Owner User-ID: " . $owner->getId() . "\n");
													
													//Get the Email of the Owner
													echo("RelatedRecord Attachment Owner User-Email: " . $owner->getEmail() . "\n");
												}
		
												//Get the modified time of each attachment
												echo("RelatedRecord Attachment Modified Time: ");
		
												print_r($attachment->getModifiedTime());
												
												echo("\n");
												
												//Get the name of the File
												echo("RelatedRecord Attachment File Name: " . $attachment->getFileName() . "\n");
												
												//Get the created time of each attachment
												echo("RelatedRecord Attachment Created Time: " );
		
												print_r($attachment->getCreatedTime());
		
												echo("\n");
												
												//Get the Attachment file size
												echo("RelatedRecord Attachment File Size: " . $attachment->getSize() . "\n");
												
												//Get the parentId Record instance of each attachment
												$parentId = $attachment->getParentId();
		
												//Check if parentId is not null
												if($parentId != null)
												{	
													//Get the parent record Name of each attachment
													echo("RelatedRecord Attachment parent record Name: " . $parentId->getKeyValue("name") . "\n");
													
													//Get the parent record ID of each attachment
													echo("RelatedRecord Attachment parent record ID: " . $parentId->getId() . "\n");
												}
		
												//Get the attachment is Editable
												echo("RelatedRecord Attachment is Editable: " . $attachment->getEditable() . "\n");
												
												//Get the file ID of each attachment
												echo("RelatedRecord Attachment File ID: " . $attachment->getFileId() . "\n");
												
												//Get the type of each attachment
												echo("RelatedRecord Attachment File Type: " . $attachment->getType() . "\n");
												
												//Get the seModule of each attachment
												echo("RelatedRecord Attachment seModule: " . $attachment->getSeModule() . "\n");
												
												//Get the modifiedBy User instance of each attachment
												$modifiedBy = $attachment->getModifiedBy();
		
												//Check if modifiedBy is not null
												if($modifiedBy != null)
												{
													//Get the Name of the modifiedBy User
													echo("RelatedRecord Attachment Modified By User-Name: " . $modifiedBy->getName() . "\n");
													
													//Get the ID of the modifiedBy User
													echo("RelatedRecord Attachment Modified By User-ID: " . $modifiedBy->getId() . "\n");
													
													//Get the Email of the modifiedBy User
													echo("RelatedRecord Attachment Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
												}
												
												//Get the state of each attachment
												echo("RelatedRecord Attachment State: " . $attachment->getState() . "\n");
												
												//Get the ID of each attachment
												echo("RelatedRecord Attachment ID: " . $attachment->getId() . "\n");
												
												//Get the createdBy User instance of each attachment
												$createdBy = $attachment->getCreatedBy();
												
												//Check if createdBy is not null
												if($createdBy != null)
												{
													//Get the name of the createdBy User
													echo("RelatedRecord Attachment Created By User-Name: " . $createdBy->getName() . "\n");
													
													//Get the ID of the createdBy User
													echo("RelatedRecord Attachment Created By User-ID: " . $createdBy->getId() . "\n");
													
													//Get the Email of the createdBy User
													echo("RelatedRecord Attachment Created By User-Email: " . $createdBy->getEmail() . "\n");
												}
												
												//Get the linkUrl of each attachment
												echo("RelatedRecord Attachment LinkUrl: " . $attachment->getLinkUrl() . "\n");
											}
										}
										else
										{
											echo($keyName . " : ");
	
											print_r($value);
	
											echo("\n");
										}
									}
									else if($value instanceof Layout)
									{
										$layout = $value;
										
										if($layout != null)
										{
											echo("RelatedRecord " . $keyName. " ID: " . $layout->getId() . "\n");
											
											echo("RelatedRecord " . $keyName . " Name: " . $layout->getName() . "\n");
										}
									}
									else if($value instanceof User)
									{
										$user = $value;
										
										if($user != null)
										{
											echo("RelatedRecord " . $keyName . " User-ID: " . $user->getId() . "\n");
											
											echo("RelatedRecord " . $keyName . " User-Name: " . $user->getName() . "\n");
											
											echo("RelatedRecord " . $keyName . " User-Email: " . $user->getEmail() . "\n");
										}
									}
									else if($value instanceof Choice)
									{
										$choiceValue = $value;
										
										echo("RelatedRecord " . $keyName . " : " . $choiceValue->getValue() . "\n");
									}
									else if($value instanceof Record)
									{
										$recordValue = $value;
										
										echo("RelatedRecord " . $keyName . " ID: " . $recordValue->getId() . "\n");
										
										echo("RelatedRecord " . $keyName . " Name: " . $recordValue->getKeyValue("name") . "\n");
									}
									else if($value instanceof Consent)
									{
										$consent = $value;
			
										echo("RelatedRecord Consent ID: " . $consent->getId());
			
										//Get the Owner User instance of each attachment
										$owner = $consent->getOwner();
											
										//Check if owner is not null
										if($owner != null)
										{
											//Get the name of the owner User
											echo("RelatedRecord Consent Owner Name: " . $owner->getName());
											
											//Get the ID of the owner User
											echo("RelatedRecord Consent Owner ID: " . $owner->getId());
											
											//Get the Email of the owner User
											echo("RelatedRecord Consent Owner Email: " . $owner->getEmail());
										}
											
										$consentCreatedBy = $consent->getCreatedBy();
										
										//Check if createdBy is not null
										if($consentCreatedBy != null)
										{
											//Get the name of the CreatedBy User
											echo("RelatedRecord Consent CreatedBy Name: " . $consentCreatedBy->getName());
											
											//Get the ID of the CreatedBy User
											echo("RelatedRecord Consent CreatedBy ID: " . $consentCreatedBy->getId());
											
											//Get the Email of the CreatedBy User
											echo("RelatedRecord Consent CreatedBy Email: " . $consentCreatedBy->getEmail());
										}
										
										$consentModifiedBy = $consent->getModifiedBy();
										
										//Check if createdBy is not null
										if($consentModifiedBy != null)
										{
											//Get the name of the ModifiedBy User
											echo("RelatedRecord Consent ModifiedBy Name: " . $consentModifiedBy->getName());
											
											//Get the ID of the ModifiedBy User
											echo("RelatedRecord Consent ModifiedBy ID: " . $consentModifiedBy->getId());
											
											//Get the Email of the ModifiedBy User
											echo("RelatedRecord Consent ModifiedBy Email: " . $consentModifiedBy->getEmail());
										}
										
										echo("RelatedRecord Consent CreatedTime: " . $consent->getCreatedTime());
										
										echo("RelatedRecord Consent ModifiedTime: " . $consent->getModifiedTime());
			
										echo("RelatedRecord Consent ContactThroughEmail: " . $consent->getContactThroughEmail());
										
										echo("RelatedRecord Consent ContactThroughSocial: " . $consent->getContactThroughSocial());
										
										echo("RelatedRecord Consent ContactThroughSurvey: " . $consent->getContactThroughSurvey());
										
										echo("RelatedRecord Consent ContactThroughPhone: " . $consent->getContactThroughPhone());
			
										echo("RelatedRecord Consent MailSentTime: " . $consent->getMailSentTime().toString());
			
										echo("RelatedRecord Consent ConsentDate: " . $consent->getConsentDate().toString());
			
										echo("RelatedRecord Consent ConsentRemarks: " . $consent->getConsentRemarks());
			
										echo("RelatedRecord Consent ConsentThrough: " . $consent->getConsentThrough());
			
										echo("RelatedRecord Consent DataProcessingBasis: " . $consent->getDataProcessingBasis());
										
										//To get custom values
										echo("RelatedRecord Consent Lawful Reason: " . $consent->getKeyValue("Lawful_Reason"));
									}
									else
									{
										//Get each value in the map
										echo($keyName . " : ");
	
										print_r($value);
	
										echo("\n");
									}
								}
							}
						}
					}
					
					//Get the Object obtained Info instance
					$info = $responseWrapper->getInfo();
					
					//Check if info is not null
					if($info != null)
					{
						if($info->getPerPage() != null)
						{
							//Get the PerPage of the Info
							echo("RelatedRecord Info PerPage: " . $info->getPerPage(). "\n");
						}
						
						if($info->getCount() != null)
						{
							//Get the Count of the Info
							echo("RelatedRecord Info Count: " . $info->getCount(). "\n");
						}
	
						if($info->getPage() != null)
						{
							//Get the Page of the Info
							echo("RelatedRecord Info Page: " . $info->getPage(). "\n");
						}
						
						if($info->getMoreRecords() != null)
						{
							//Get the MoreRecords of the Info
							echo("RelatedRecord Info MoreRecords: " . $info->getMoreRecords(). "\n");
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
	
					if($exception->getDetails() != null)
					{
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
			else
			{
				print_r($response);
			}
		}
	}

	/**
	 * <h3> Update Related Records </h3>
	 * This method is used to update the relation between the records and print the response.
	 * @param moduleAPIName - The API Name of the module to update related records.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @throws Exception
	 */
	public static function updateRelatedRecords(string $moduleAPIName, string $recordId, string $relatedListAPIName)
	{
		//API Name of the module to update record
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName,  $recordId,  $moduleAPIName);
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of Record instances
		$records = array();
		
		//Get instance of Record Class
		$record1 = new Record();
		
		/*
		 * Call addKeyValue method that takes two arguments
		 * 1 -> A string that is the Field's API Name
		 * 2 -> Value
		 */
		$record1->addKeyValue("id", "3477061000005919001");
		
		$record1->addKeyValue("list_price", 50.56);
		
		//Add Record instance to the list
		array_push($records, $record1);
		
		//Get instance of Record Class
		$record2 = new Record();
		
		/*
		 * Call addKeyValue method that takes two arguments
		 * 1 -> A string that is the Field's API Name
		 * 2 -> Value
		 */
		$record2->addKeyValue("id", "3477061000005917011");
		
		$record2->addKeyValue("list_price", 50.56);
		
		//Add Record instance to the list
		array_push($records, $record2);
		
		//Set the list to Records in BodyWrapper instance
		$request->setData($records);
	
		//Call updateRecord method that takes BodyWrapper instance as parameter.
		$response = $relatedRecordsOperations->updateRelatedRecords($request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");

			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getData();
					
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
								echo($key . " : " . $value . "\n");
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
			else
			{
				print_r($response);
			}
		}
	}
	
	/**
	 * <h3> Delink Records </h3>
	 * This method is used to delete the association between modules and print the response.
	 * @param moduleAPIName - The API Name of the module to delink related records.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @param relatedListIds - The ID of the related record.
	 * @throws Exception
	 */
	public static function delinkRecords(string $moduleAPIName, string $recordId, string $relatedListAPIName, array $relatedListIds)
	{
		//API Name of the module to update record
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName,  $recordId,  $moduleAPIName);
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		foreach($relatedListIds as $relatedListId)
		{
			$paramInstance->add(DelinkRecordsParam::ids(), $relatedListId);
		}
		
		//Call delinkRecords method that takes paramInstance instance as parameter.
		$response = $relatedRecordsOperations->delinkRecords($paramInstance);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");

			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getData();
					
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
								echo($key . " : " . $value . "\n");
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
			else
			{
				print_r($response);
			}
		}
	}

	/**
	 * <h3> Get Related Record </h3>
	 * This method is used to get the single related list record and print the response.
	 * @param moduleAPIName - The API Name of the module to get related record.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @param relatedListId - The ID of the related record.
	 * @throws Exception
	 */
	public static function getRelatedRecord(string $moduleAPIName, string $recordId, string $relatedListAPIName, string $relatedListId, string $destinationFolder)
	{
		//example
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		//$relatedRecordId = "3477061000004994115";
		//$destinationFolder = "/Users/user_name/Desktop";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName,  $recordId,  $moduleAPIName);
		
		$headerInstance = new HeaderMap();

		$ifmodifiedsince = date_create("2020-07-15T17:58:47+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
		
		$headerInstance->add(GetRelatedRecordHeader::IfModifiedSince(), $ifmodifiedsince);
		
		//Call getRelatedRecord method that takes headerInstance and relatedRecordId as parameter
		$response = $relatedRecordsOperations->getRelatedRecord($relatedListId,$headerInstance );
		
		if($response != null)
		{
            //Get the status code from response
            echo("Status code " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");

                return;
			}
			
			if($response->isExpected())
			{
				//Get object from response
				$responseHandler = $response->getObject();
				
				if($responseHandler instanceof ResponseWrapper)
				{
					$responseWrapper = $responseHandler;
					
					//Get the obtained Record instance
					$records = $responseWrapper->getData();
					
					foreach($records as $record)
					{					
						//Get the ID of each Record
						echo("RelatedRecord ID: " . $record->getId() . "\n");
						
						//Get the createdBy User instance of each Record
						$createdBy = $record->getCreatedBy();
						
						//Check if createdBy is not null
						if($createdBy != null)
						{
							//Get the ID of the createdBy User
							echo("RelatedRecord Created By User-ID: " . $createdBy->getId() . "\n");
							
							//Get the name of the createdBy User
							echo("RelatedRecord Created By User-Name: " . $createdBy->getName() . "\n");
							
							//Get the Email of the createdBy User
							echo("RelatedRecord Created By User-Email: " . $createdBy->getEmail() . "\n");
						}
						
						//Get the CreatedTime of each Record
						echo("RelatedRecord CreatedTime: ");
						
						print_r($record->getCreatedTime());
						
						echo("\n");
						
						//Get the modifiedBy User instance of each Record
						$modifiedBy = $record->getModifiedBy();
						
						//Check if modifiedBy is not null
						if($modifiedBy != null)
						{
							//Get the ID of the modifiedBy User
							echo("RelatedRecord Modified By User-ID: " . $modifiedBy->getId() . "\n");
							
							//Get the name of the modifiedBy User
							echo("RelatedRecord Modified By User-Name: " . $modifiedBy->getName() . "\n");
							
							//Get the Email of the modifiedBy User
							echo("RelatedRecord Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
						}
						
						//Get the ModifiedTime of each Record
						echo("RelatedRecord ModifiedTime: ");
						
						print_r($record->getModifiedTime());
	
						echo("\n");
						
						//Get the list of Tag instance each Record
						$tags = $record->getTag();
						
						//Check if tags is not null
						if($tags != null)
						{
							foreach($tags as $tag)
							{
								//Get the Name of each Tag
								echo("RelatedRecord Tag Name: " . $tag->getName() . "\n");
								
								//Get the Id of each Tag
								echo("RelatedRecord Tag ID: " . $tag->getId() . "\n");
							}
						}
						
						//To get particular field value 
						echo("RelatedRecord Field Value: " . $record->getKeyValue("Last_Name") . "\n");// FieldApiName
						
						echo("RelatedRecord KeyValues : \n" );
						
						//Get the KeyValue map
						foreach($record->getKeyValues() as $keyName => $value)
						{
							if($value != null)
							{
								if((is_array($value) && sizeof($value) > 0) && isset($value[0]))
								{
									if($value[0] instanceof FileDetails)
									{
										$fileDetails = $value;
										
										foreach($fileDetails as $fileDetail)
										{
											//Get the Extn of each FileDetails
											echo("RelatedRecord FileDetails Extn: " . $fileDetail->getExtn() . "\n");
											
											//Get the IsPreviewAvailable of each FileDetails
											echo("RelatedRecord FileDetails IsPreviewAvailable: " . $fileDetail->getIsPreviewAvailable() . "\n");
											
											//Get the DownloadUrl of each FileDetails
											echo("RelatedRecord FileDetails DownloadUrl: " . $fileDetail->getDownloadUrl() . "\n");
											
											//Get the DeleteUrl of each FileDetails
											echo("RelatedRecord FileDetails DeleteUrl: " . $fileDetail->getDeleteUrl() . "\n");
											
											//Get the EntityId of each FileDetails
											echo("RelatedRecord FileDetails EntityId: " . $fileDetail->getEntityId() . "\n");
											
											//Get the Mode of each FileDetails
											echo("RelatedRecord FileDetails Mode: " . $fileDetail->getMode() . "\n");
											
											//Get the OriginalSizeByte of each FileDetails
											echo("RelatedRecord FileDetails OriginalSizeByte: " . $fileDetail->getOriginalSizeByte() . "\n");
											
											//Get the PreviewUrl of each FileDetails
											echo("RelatedRecord FileDetails PreviewUrl: " . $fileDetail->getPreviewUrl() . "\n");
											
											//Get the FileName of each FileDetails
											echo("RelatedRecord FileDetails FileName: " . $fileDetail->getFileName() . "\n");
											
											//Get the FileId of each FileDetails
											echo("RelatedRecord FileDetails FileId: " . $fileDetail->getFileId() . "\n");
											
											//Get the AttachmentId of each FileDetails
											echo("RelatedRecord FileDetails AttachmentId: " . $fileDetail->getAttachmentId() . "\n");
											
											//Get the FileSize of each FileDetails
											echo("RelatedRecord FileDetails FileSize: " . $fileDetail->getFileSize() . "\n");
											
											//Get the CreatorId of each FileDetails
											echo("RelatedRecord FileDetails CreatorId: " . $fileDetail->getCreatorId() . "\n");
											
											//Get the LinkDocs of each FileDetails
											echo("RelatedRecord FileDetails LinkDocs: " . $fileDetail->getLinkDocs() . "\n");
										}
									}
									else if($value[0] instanceof InventoryLineItems)
									{
										$productDetails = $value;
										
										foreach($productDetails as $productDetail)
										{
											$lineItemProduct = $productDetail->getProduct();
											
											if($lineItemProduct != null)
											{
												echo("RelatedRecord ProductDetails LineItemProduct ProductCode: " . $lineItemProduct->getProductCode() . "\n");
												
												echo("RelatedRecord ProductDetails LineItemProduct Currency: " . $lineItemProduct->getCurrency() . "\n");
												
												echo("RelatedRecord ProductDetails LineItemProduct Name: " . $lineItemProduct->getName() . "\n");
												
												echo("RelatedRecord ProductDetails LineItemProduct Id: " . $lineItemProduct->getId() . "\n");
											}
											
											echo("RelatedRecord ProductDetails Quantity: " . $productDetail->getQuantity(). "\n");
											
											echo("RelatedRecord ProductDetails Discount: " . $productDetail->getDiscount() . "\n");
											
											echo("RelatedRecord ProductDetails TotalAfterDiscount: " . $productDetail->getTotalAfterDiscount(). "\n");
											
											echo("RelatedRecord ProductDetails NetTotal: " . $productDetail->getNetTotal(). "\n");
											
											if($productDetail->getBook() != null)
											{
												echo("RelatedRecord ProductDetails Book: " . $productDetail->getBook(). "\n");
											}
											
											echo("RelatedRecord ProductDetails Tax: " . $productDetail->getTax(). "\n");
											
											echo("RelatedRecord ProductDetails ListPrice: " . $productDetail->getListPrice(). "\n");
											
											echo("RelatedRecord ProductDetails UnitPrice: " . $productDetail->getUnitPrice(). "\n");
											
											echo("RelatedRecord ProductDetails QuantityInStock: " . $productDetail->getQuantityInStock(). "\n");
											
											echo("RelatedRecord ProductDetails Total: " . $productDetail->getTotal(). "\n");
											
											echo("RelatedRecord ProductDetails ID: " . $productDetail->getId() . "\n");
											
											echo("RelatedRecord ProductDetails ProductDescription: " . $productDetail->getProductDescription() . "\n");
											
											$lineTaxes = $productDetail->getLineTax();
												
											foreach($lineTaxes as $lineTax)
											{
												echo("RelatedRecord ProductDetails LineTax Percentage: " . $lineTax->getPercentage(). "\n");
												
												echo("RelatedRecord ProductDetails LineTax Name: " . $lineTax->getName() . "\n");
												
												echo("RelatedRecord ProductDetails LineTax Id: " . $lineTax->getId() . "\n");
												
												echo("RelatedRecord ProductDetails LineTax Value: " . $lineTax->getValue(). "\n");
											}
										}
									}
									else if($value[0] instanceof Tag)
									{
										$tagList = $value;
										
										foreach($tagList as $tag)
										{
											//Get the Name of each Tag
											echo("RelatedRecord Tag Name: " . $tag->getName() . "\n");
											
											//Get the Id of each Tag
											echo("RelatedRecord Tag ID: " . $tag->getId() . "\n");
										}
									}
									else if($value[0] instanceof PricingDetails)
									{
										$pricingDetails = $value;
										
										foreach($pricingDetails as $pricingDetail)
										{
											echo("RelatedRecord PricingDetails ToRange: " . $pricingDetail->getToRange(). "\n");
											
											echo("RelatedRecord PricingDetails Discount: " . $pricingDetail->getDiscount(). "\n");
											
											echo("RelatedRecord PricingDetails ID: " . $pricingDetail->getId() . "\n");
											
											echo("RelatedRecord PricingDetails FromRange: " . $pricingDetail->getFromRange(). "\n");
										}
									}
									else if($value[0] instanceof Participants)
									{
										$participants = $value;
										
										foreach($participants as $participant)
										{
											echo("RelatedRecord Participants Name: " . $participant->getName() . "\n");
											
											echo("RelatedRecord Participants Invited: " . $participant->getInvited() . "\n");
											
											echo("RelatedRecord Participants ID: " . $participant->getId() . "\n");
											
											echo("RelatedRecord Participants Type: " . $participant->getType() . "\n");
											
											echo("RelatedRecord Participants Participant: " . $participant->getParticipant() . "\n");
											
											echo("RelatedRecord Participants Status: " . $participant->getStatus() . "\n");
										}
									}
									else if($value[0] instanceof Record)
									{
										$recordList = $value;
										
										foreach($recordList as $record1)
										{
											//Get the details map
											foreach($record1->getKeyValues() as $key => $value1)
											{
												//Get each value in the map
												echo($key . " : " );
	
												print_r($value1);
	
												echo("\n");
											}
										}
									}
									else if($value[0] instanceof LineTax)
									{
										$lineTaxes = $value;
										
										foreach($lineTaxes as $lineTax)
										{
											echo("RelatedRecord ProductDetails LineTax Percentage: " . $lineTax->getPercentage(). "\n");
											
											echo("RelatedRecord ProductDetails LineTax Name: " . $lineTax->getName() . "\n");
											
											echo("RelatedRecord ProductDetails LineTax Id: " . $lineTax->getId() . "\n");
											
											echo("RelatedRecord ProductDetails LineTax Value: " . $lineTax->getValue(). "\n");
										}
									}
									else if($value[0] instanceof Choice)
									{
										$choice = $value;
										
										foreach($choice as $choiceValue)
										{
											echo("RelatedRecord " . $keyName . " : " . $choiceValue->getValue() . "\n");
										}
									}
									else if($value[0] instanceof Comment)
									{
										$comments = $value;
										
										foreach($comments as $comment)
										{
											echo("Record Comment CommentedBy: " . $comment->getCommentedBy() . "\n");
											
											echo("Record Comment CommentedTime: ");
											
											print_r($comment->getCommentedTime());
											
											echo("\n");
											
											echo("Record Comment CommentContent: " . $comment->getCommentContent(). "\n");
											
											echo("Record Comment Id: " . $comment->getId() . "\n");
										}
									}
									else if($value[0] instanceof Attachment)
									{
										$attachments = $value;
	
										foreach ($attachments as $attachment)
										{
											//Get the owner User instance of each attachment
											$owner = $attachment->getOwner();
	
											//Check if owner is not null
											if($owner != null)
											{
												//Get the Name of the Owner
												echo("RelatedRecord Attachment Owner User-Name: " . $owner->getName() . "\n");
												
												//Get the ID of the Owner
												echo("RelatedRecord Attachment Owner User-ID: " . $owner->getId() . "\n");
												
												//Get the Email of the Owner
												echo("RelatedRecord Attachment Owner User-Email: " . $owner->getEmail() . "\n");
											}
	
											//Get the modified time of each attachment
											echo("RelatedRecord Attachment Modified Time: ");
	
											print_r($attachment->getModifiedTime());
											
											echo("\n");
											
											//Get the name of the File
											echo("RelatedRecord Attachment File Name: " . $attachment->getFileName() . "\n");
											
											//Get the created time of each attachment
											echo("RelatedRecord Attachment Created Time: " );
	
											print_r($attachment->getCreatedTime());
	
											echo("\n");
											
											//Get the Attachment file size
											echo("RelatedRecord Attachment File Size: " . $attachment->getSize() . "\n");
											
											//Get the parentId Record instance of each attachment
											$parentId = $attachment->getParentId();
	
											//Check if parentId is not null
											if($parentId != null)
											{	
												//Get the parent record Name of each attachment
												echo("RelatedRecord Attachment parent record Name: " . $parentId->getKeyValue("name") . "\n");
												
												//Get the parent record ID of each attachment
												echo("RelatedRecord Attachment parent record ID: " . $parentId->getId() . "\n");
											}
	
											//Get the attachment is Editable
											echo("RelatedRecord Attachment is Editable: " . $attachment->getEditable() . "\n");
											
											//Get the file ID of each attachment
											echo("RelatedRecord Attachment File ID: " . $attachment->getFileId() . "\n");
											
											//Get the type of each attachment
											echo("RelatedRecord Attachment File Type: " . $attachment->getType() . "\n");
											
											//Get the seModule of each attachment
											echo("RelatedRecord Attachment seModule: " . $attachment->getSeModule() . "\n");
											
											//Get the modifiedBy User instance of each attachment
											$modifiedBy = $attachment->getModifiedBy();
	
											//Check if modifiedBy is not null
											if($modifiedBy != null)
											{
												//Get the Name of the modifiedBy User
												echo("RelatedRecord Attachment Modified By User-Name: " . $modifiedBy->getName() . "\n");
												
												//Get the ID of the modifiedBy User
												echo("RelatedRecord Attachment Modified By User-ID: " . $modifiedBy->getId() . "\n");
												
												//Get the Email of the modifiedBy User
												echo("RelatedRecord Attachment Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
											}
											
											//Get the state of each attachment
											echo("RelatedRecord Attachment State: " . $attachment->getState() . "\n");
											
											//Get the ID of each attachment
											echo("RelatedRecord Attachment ID: " . $attachment->getId() . "\n");
											
											//Get the createdBy User instance of each attachment
											$createdBy = $attachment->getCreatedBy();
											
											//Check if createdBy is not null
											if($createdBy != null)
											{
												//Get the name of the createdBy User
												echo("RelatedRecord Attachment Created By User-Name: " . $createdBy->getName() . "\n");
												
												//Get the ID of the createdBy User
												echo("RelatedRecord Attachment Created By User-ID: " . $createdBy->getId() . "\n");
												
												//Get the Email of the createdBy User
												echo("RelatedRecord Attachment Created By User-Email: " . $createdBy->getEmail() . "\n");
											}
											
											//Get the linkUrl of each attachment
											echo("RelatedRecord Attachment LinkUrl: " . $attachment->getLinkUrl() . "\n");
										}
									}
									else
									{
										echo($keyName . " : ");
	
										print_r($value);
	
										echo("\n");
									}
								}
								else if($value instanceof Record)
								{
									$recordValue = $value;
									
									echo("RelatedRecord " . $keyName . " ID: " . $recordValue->getId() . "\n");
									
									echo("RelatedRecord " . $keyName . " Name: " . $recordValue->getKeyValue("name") . "\n");
								}
								else if($value instanceof Layout)
								{
									$layout = $value;
									
									if($layout != null)
									{
										echo("RelatedRecord " . $keyName. " ID: " . $layout->getId() . "\n");
										
										echo("RelatedRecord " . $keyName . " Name: " . $layout->getName() . "\n");
									}
								}
								else if($value instanceof User)
								{
									$user = $value;
									
									if($user != null)
									{
										echo("RelatedRecord " . $keyName . " User-ID: " . $user->getId() . "\n");
										
										echo("RelatedRecord " . $keyName . " User-Name: " . $user->getName() . "\n");
										
										echo("RelatedRecord " . $keyName . " User-Email: " . $user->getEmail() . "\n");
									}
								}
								else if($value instanceof Choice)
								{
									$choiceValue = $value;
									
									echo("RelatedRecord " . $keyName . " : " . $choiceValue->getValue() . "\n");
								}
								else if($value instanceof Consent)
								{
									$consent = $value;
		
									echo("RelatedRecord Consent ID: " . $consent->getId());
		
									//Get the Owner User instance of each attachment
									$owner = $consent->getOwner();
										
									//Check if owner is not null
									if($owner != null)
									{
										//Get the name of the owner User
										echo("RelatedRecord Consent Owner Name: " . $owner->getName());
										
										//Get the ID of the owner User
										echo("RelatedRecord Consent Owner ID: " . $owner->getId());
										
										//Get the Email of the owner User
										echo("RelatedRecord Consent Owner Email: " . $owner->getEmail());
									}
										
									$consentCreatedBy = $consent->getCreatedBy();
									
									//Check if createdBy is not null
									if($consentCreatedBy != null)
									{
										//Get the name of the CreatedBy User
										echo("RelatedRecord Consent CreatedBy Name: " . $consentCreatedBy->getName());
										
										//Get the ID of the CreatedBy User
										echo("RelatedRecord Consent CreatedBy ID: " . $consentCreatedBy->getId());
										
										//Get the Email of the CreatedBy User
										echo("RelatedRecord Consent CreatedBy Email: " . $consentCreatedBy->getEmail());
									}
									
									$consentModifiedBy = $consent->getModifiedBy();
									
									//Check if createdBy is not null
									if($consentModifiedBy != null)
									{
										//Get the name of the ModifiedBy User
										echo("RelatedRecord Consent ModifiedBy Name: " . $consentModifiedBy->getName());
										
										//Get the ID of the ModifiedBy User
										echo("RelatedRecord Consent ModifiedBy ID: " . $consentModifiedBy->getId());
										
										//Get the Email of the ModifiedBy User
										echo("RelatedRecord Consent ModifiedBy Email: " . $consentModifiedBy->getEmail());
									}
									
									echo("RelatedRecord Consent CreatedTime: " . $consent->getCreatedTime());
									
									echo("RelatedRecord Consent ModifiedTime: " . $consent->getModifiedTime());
		
									echo("RelatedRecord Consent ContactThroughEmail: " . $consent->getContactThroughEmail());
									
									echo("RelatedRecord Consent ContactThroughSocial: " . $consent->getContactThroughSocial());
									
									echo("RelatedRecord Consent ContactThroughSurvey: " . $consent->getContactThroughSurvey());
									
									echo("RelatedRecord Consent ContactThroughPhone: " . $consent->getContactThroughPhone());
		
									echo("RelatedRecord Consent MailSentTime: " . $consent->getMailSentTime().toString());
		
									echo("RelatedRecord Consent ConsentDate: " . $consent->getConsentDate().toString());
		
									echo("RelatedRecord Consent ConsentRemarks: " . $consent->getConsentRemarks());
		
									echo("RelatedRecord Consent ConsentThrough: " . $consent->getConsentThrough());
		
									echo("RelatedRecord Consent DataProcessingBasis: " . $consent->getDataProcessingBasis());
									
									//To get custom values
									echo("RelatedRecord Consent Lawful Reason: " . $consent->getKeyValue("Lawful_Reason"));
								}
								else
								{
									//Get each value in the map
									echo($keyName . " : ");
	
									print_r($value);
	
									echo("\n");
								}
							}
						}
					}
				}
	
				else if($responseHandler instanceof FileBodyWrapper)
				{
					//Get object from response
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
			else
			{
				print_r($response);
			}
		}
	}

	/**
	 * <h3> Update Related Record </h3>
	 * This method is used to update the relation between the records and print the response.
	 * @param moduleAPIName - The API Name of the module to update related record.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @param relatedListId - The ID of the related record.
	 * @throws Exception
	 */
	public static function updateRelatedRecord(string $moduleAPIName, string $recordId, string $relatedListAPIName, string $relatedListId)
	{
		//API Name of the module to update record
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		//$relatedRecordId = "3477061000004994115";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations( $relatedListAPIName,  $recordId,  $moduleAPIName);
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of Record instances
		$records = array();
		
		//Get instance of Record Class
		$record1 = new Record();
		
		/*
		 * Call addKeyValue method that takes two arguments
		 * 1 -> A string that is the Field's API Name
		 * 2 -> Value
		 */
		
		$record1->addKeyValue("list_price", 50.56);
		
		//Add Record instance to the list
		array_push($records, $record1);
		
		//Set the list to Records in BodyWrapper instance
		$request->setData($records);
	
		//Call updateRecord method that takes BodyWrapper instance, relatedRecordId as parameter.
		$response = $relatedRecordsOperations->updateRelatedRecord($relatedListId,$request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");

			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getData();
					
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
								echo($key . " : " . $value . "\n");
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
			else
			{
				print_r($response);
			}
			
		}
	}
	
	/**
	 * <h3> Delink Record </h3>
	 * This method is used to delete the association between modules and print the response.
	 * @param moduleAPIName - The API Name of the module to delink related record.
	 * @param recordId - The ID of the record to be obtained.
	 * @param relatedListAPIName - The API name of the related list. To get the API name of the related list.
	 * @param relatedListId - The ID of the related record.
	 * @throws Exception
	 */
	public static function delinkRecord(string $moduleAPIName, string $recordId, string $relatedListAPIName, string $relatedListId)
	{
		//API Name of the module to update record
		//$moduleAPIName = "Leads";
		//$recordId = "3477061000005177002";
		//$relatedListAPIName = "Products";
		//$relatedRecordId = "3477061000004994115";
		
		//Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
	    $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName,$recordId,$moduleAPIName);
		
		//Call updateRecord method that takes relatedListId as parameter.
		$response = $relatedRecordsOperations->delinkRecord($relatedListId);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");

			if($response->isExpected())
			{
				//Get object from response
				$actionHandler = $response->getObject();
				
				if($actionHandler instanceof ActionWrapper)
				{
					//Get the received ActionWrapper instance
					$actionWrapper = $actionHandler;
					
					//Get the list of obtained ActionResponse instances
					$actionResponses = $actionWrapper->getData();
					
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
								echo($key . " : " . $value . "\n");
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
			else
			{
				print_r($response);
			}
			
		}
	}
}