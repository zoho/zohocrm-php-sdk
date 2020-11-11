<?php
namespace samples\src\com\zoho\crm\api\profile;

use com\zoho\crm\api\profiles\APIException;

use com\zoho\crm\api\profiles\ProfilesOperations;

use com\zoho\crm\api\profiles\ResponseWrapper;

class Profile
{
	/**
	 * <h3> Get Profiles </h3>
	 * This method is used to retrieve the data of profiles through an API request and print the response.
	 * @throws Exception
	 */
	public static function getProfiles()
	{
		//example
		//moduleAPIName = "Leads";
		
		//Get instance of ProfilesOperations Class
		$profilesOperations = new ProfilesOperations();
		
		//Call getProfiles method
		$response = $profilesOperations->getProfiles();
		
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
				
				//Get the list of obtained Profile instances
				$profiles = $responseWrapper->getProfiles();
			
				foreach($profiles as $profile)
				{
					//Get the DisplayLabel of the each Profile
					echo("Profile DisplayLabel: " . $profile->getDisplayLabel() . "\n");
					
					if($profile->getCreatedTime() != null)
					{
						//Get the CreatedTime of each Profile
						echo("Profile CreatedTime: ");
						print_r($profile->getCreatedTime());
						echo("\n");
					}
					
					if($profile->getModifiedTime() != null)
					{
						//Get the ModifiedTime of each Profile
						echo("Profile ModifiedTime: ");
						print_r($profile->getModifiedTime());
						echo("\n");
					}
					
					//Get the Name of the each Profile
					echo("Profile Name: " . $profile->getName() . "\n");
					
					//Get the modifiedBy User instance of each Profile
					$modifiedBy = $profile->getModifiedBy();
					
					//Check if modifiedBy is not null
					if($modifiedBy != null)
					{
						//Get the ID of the modifiedBy User
						echo("Profile Modified By User-ID: " . $modifiedBy->getId() . "\n");
						
						//Get the name of the modifiedBy User
						echo("Profile Modified By User-Name: " . $modifiedBy->getName() . "\n");
						
						//Get the Email of the modifiedBy User
						echo("Profile Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
					}
					
					//Get the Description of the each Profile
					echo("Profile Description: " . $profile->getDescription() . "\n");
					
					//Get the ID of the each Profile
					echo("Profile ID: " . $profile->getId() . "\n");
					
					//Get the Category of the each Profile
					echo("Profile Category: " . $profile->getCategory() . "\n");
					
					//Get the createdBy User instance of each Profile
					$createdBy = $profile->getCreatedBy();
					
					//Check if createdBy is not null
					if($createdBy != null)
					{
						//Get the ID of the createdBy User
						echo("Profile Created By User-ID: " . $createdBy->getId() . "\n");
						
						//Get the name of the createdBy User
						echo("Profile Created By User-Name: " . $createdBy->getName() . "\n");
						
						//Get the Email of the createdBy User
						echo("Profile Created By User-Email: " . $createdBy->getEmail() . "\n");
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
	
	/**
	 * <h3> Get Profile </h3>
	 * This method is used to get the details of any specific profile.
	 * Specify the unique id of the profile in your API request to get the data for that particular profile.
	 * @param profileId - The ID of the Profile to be obtained
	 * @throws Exception
	 */
	public static function getProfile(string $profileId)
	{
		//example
		//moduleAPIName = "Leads";
		
		//Get instance of ProfilesOperations Class
		$profilesOperations = new ProfilesOperations();
		
		//Call getProfile method that takes profileId as parameter
		$response = $profilesOperations->getProfile($profileId);
		
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
				
				//Get the list of obtained Profile instances
				$profiles = $responseWrapper->getProfiles();
			
				foreach($profiles as $profile)
				{
					//Get the DisplayLabel of the each Profile
					echo("Profile DisplayLabel: " . $profile->getDisplayLabel() . "\n");
					
					if($profile->getCreatedTime() != null)
					{
						//Get the CreatedTime of each Profile
						echo("Profile CreatedTime: ");
						print_r($profile->getCreatedTime());
						echo("\n");
					}
					
					if($profile->getModifiedTime() != null)
					{
						//Get the CreatedTime of each Profile
						echo("Profile CreatedTime: ");
						print_r($profile->getModifiedTime());
						echo("\n");
					}
					
					//Get the permissionsDetails of each Profile
					$permissionsDetails = $profile->getPermissionsDetails();
					
					//Check if permissionsDetails is not null
					if($permissionsDetails != null)
					{
						foreach($permissionsDetails as $permissionsDetail)
						{
							//Get the DisplayLabel of the each PermissionDetail
							echo("Profile PermissionDetail DisplayLabel: " . $permissionsDetail->getDisplayLabel() . "\n");
							
							//Get the Module of the each PermissionDetail
							echo("Profile PermissionDetail Module: " . $permissionsDetail->getModule() . "\n");
							
							//Get the Name of the each PermissionDetail
							echo("Profile PermissionDetail Name: " . $permissionsDetail->getName() . "\n");
							
							//Get the ID of the each PermissionDetail
							echo("Profile PermissionDetail ID: " . $permissionsDetail->getId() . "\n");
							
							//Get the Enabled of the each PermissionDetail
							echo("Profile PermissionDetail Enabled: " . $permissionsDetail->getEnabled() . "\n");
						}
					}
					
					//Get the Name of the each Profile
					echo("Profile Name: " . $profile->getName() . "\n");
					
					//Get the modifiedBy User instance of each Profile
					$modifiedBy = $profile->getModifiedBy();
					
					//Check if modifiedBy is not null
					if($modifiedBy != null)
					{
						//Get the ID of the modifiedBy User
						echo("Profile Modified By User-ID: " . $modifiedBy->getId() . "\n");
						
						//Get the name of the modifiedBy User
						echo("Profile Modified By User-Name: " . $modifiedBy->getName() . "\n");
						
						//Get the Email of the modifiedBy User
						echo("Profile Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
					}
					
					//Get the Description of the each Profile
					echo("Profile Description: " . $profile->getDescription() . "\n");
					
					//Get the ID of the each Profile
					echo("Profile ID: " . $profile->getId() . "\n");
					
					//Get the Category of the each Profile
					echo("Profile Category: " . $profile->getCategory() . "\n");
					
					//Get the createdBy User instance of each Profile
					$createdBy = $profile->getCreatedBy();
					
					//Check if createdBy is not null
					if($createdBy != null)
					{
						//Get the ID of the createdBy User
						echo("Profile Created By User-ID: " . $createdBy->getId() . "\n");
						
						//Get the name of the createdBy User
						echo("Profile Created By User-Name: " . $createdBy->getName() . "\n");
						
						//Get the Email of the createdBy User
						echo("Profile Created By User-Email: " . $createdBy->getEmail() . "\n");
					}
					
					//Get the sections of each Profile
					$sections = $profile->getSections();
					
					//Check if sections is not null
					if($sections != null)
					{
						foreach($sections as $section)
						{
							//Get the Name of the each Section
							echo("Profile Section Name: " . $section->getName() . "\n");
							
							//Get the categories of each Section
							$categories = $section->getCategories();
							
							foreach($categories as $category)
							{
								//Get the DisplayLabel of the each Category
								echo("Profile Section Category DisplayLabel: " . $category->getDisplayLabel() . "\n");
								
								//Get the permissionsDetails List of each Category
								$categoryPermissionsDetails = $category->getPermissionsDetails();
								
								//Check if categoryPermissionsDetails is not null
								if($categoryPermissionsDetails != null)
								{
									foreach($categoryPermissionsDetails as $permissionsDetailID)
									{
										//Get the permissionsDetailID of the Category
										echo("Profile Section Category permissionsDetailID: " . $permissionsDetailID . "\n");
									}
								}
								
								//Get the Name of the each Category
								echo("Profile Section Category Name: " . $category->getName() . "\n");
							}
						}
					}
					
					if($profile->getDelete() != null)
					{
						//Get the Delete of the each Profile
						echo("Profile Delete: " . $profile->getDelete() . "\n");
					}

					if($profile->getDefault() != null)
					{
						//Get the Default of the each Profile
						echo("Profile Default: " . $profile->getDefault() . "\n");
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