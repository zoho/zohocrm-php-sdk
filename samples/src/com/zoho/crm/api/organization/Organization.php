<?php
namespace samples\src\com\zoho\crm\api\organization;

use com\zoho\crm\api\org\APIException;

use com\zoho\crm\api\org\OrgOperations;

use com\zoho\crm\api\org\ResponseWrapper;

use com\zoho\crm\api\org\SuccessResponse;

use com\zoho\crm\api\org\FileBodyWrapper;

use com\zoho\crm\api\util\StreamWrapper;

class Organization
{
	/**
	 * <h3> Get Organization </h3>
	 * This method is used to get the organization data and print the response.
	 * @throws Exception
	 */
	public static function getOrganization()
	{
		//Get instance of OrgOperations Class
		$orgOperations = new OrgOperations();
		
		//Call getNotes method
		$response = $orgOperations->getOrganization();
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $responseHandler = $response->getObject();
				
            if($responseHandler instanceof ResponseWrapper)
            {
                //Get the received ResponseWrapper instance
                $responseWrapper = $responseHandler;
                
                //Get the list of obtained Note instances
                $orgs = $responseWrapper->getOrg();
            
                foreach($orgs as $org)
                {
                    //Get the Country of each Organization
                    echo("Organization Country: " . $org->getCountry() . "\n");
                    
                    //Get the PhotoId of each Organization
                    echo("Organization PhotoId: " . $org->getPhotoId() . "\n");
                    
                    //Get the City of each Organization
                    echo("Organization City: " . $org->getCity() . "\n");
                    
                    //Get the Description of each Organization
                    echo("Organization Description: " . $org->getDescription() . "\n");
                    
                    //Get the McStatus of each Organization
                    echo("Organization McStatus: " . $org->getMcStatus() . "\n");
                    
                    //Get the GappsEnabled of each Organization
                    echo("Organization GappsEnabled: " . $org->getGappsEnabled() . "\n");
                    
                    //Get the DomainName of each Organization
                    echo("Organization DomainName: " . $org->getDomainName() . "\n");
                    
                    //Get the TranslationEnabled of each Organization
                    echo("Organization TranslationEnabled: " . $org->getTranslationEnabled() . "\n");
                    
                    //Get the Street of each Organization
                    echo("Organization Street: " . $org->getStreet() . "\n");
                    
                    //Get the Alias of each Organization
                    echo("Organization Alias: " . $org->getAlias() . "\n");
                    
                    //Get the Currency of each Organization
                    echo("Organization Currency: " . $org->getCurrency() . "\n");
                    
                    //Get the Id of each Organization
                    echo("Organization Id: " . $org->getId() . "\n");
                    
                    //Get the State of each Organization
                    echo("Organization State: " . $org->getState() . "\n");
                    
                    //Get the Fax of each Organization
                    echo("Organization Fax: " . $org->getFax() . "\n");
                    
                    //Get the EmployeeCount of each Organization
                    echo("Organization EmployeeCount: " . $org->getEmployeeCount() . "\n");
                    
                    //Get the Zip of each Organization
                    echo("Organization Zip: " . $org->getZip() . "\n");
                    
                    //Get the Website of each Organization
                    echo("Organization Website: " . $org->getWebsite() . "\n");
                    
                    //Get the CurrencySymbol of each Organization
                    echo("Organization CurrencySymbol: " . $org->getCurrencySymbol() . "\n");
                    
                    //Get the Mobile of each Organization
                    echo("Organization Mobile: " . $org->getMobile() . "\n");
                    
                    //Get the CurrencyLocale of each Organization
                    echo("Organization CurrencyLocale: " . $org->getCurrencyLocale() . "\n");
                    
                    //Get the PrimaryZuid of each Organization
                    echo("Organization PrimaryZuid: " . $org->getPrimaryZuid() . "\n");
                    
                    //Get the ZiaPortalId of each Organization
                    echo("Organization ZiaPortalId: " . $org->getZiaPortalId() . "\n");
                    
                    //Get the TimeZone of each Organization
                    echo("Organization TimeZone: " . $org->getTimeZone() . "\n");
                    
                    //Get the Zgid of each Organization
                    echo("Organization Zgid: " . $org->getZgid() . "\n");
                    
                    //Get the CountryCode of each Organization
                    echo("Organization CountryCode: " . $org->getCountryCode() . "\n");
                    
                    //Get the Object obtained LicenseDetails instance
                    $licenseDetails = $org->getLicenseDetails();
                    
                    //Check if licenseDetails is not null
                    if($licenseDetails != null)
                    {
                        //Get the PaidExpiry of each LicenseDetails
                        echo("Organization LicenseDetails PaidExpiry: ");

                        print_r($licenseDetails->getPaidExpiry());

                        echo("\n");
                        
                        //Get the UsersLicensePurchased of each LicenseDetails
                        echo("Organization LicenseDetails UsersLicensePurchased: " . $licenseDetails->getUsersLicensePurchased() . "\n");
                        
                        //Get the TrialType of each LicenseDetails
                        echo("Organization LicenseDetails TrialType: " . $licenseDetails->getTrialType() . "\n");
                        
                        //Get the TrialExpiry of each LicenseDetails
                        echo("Organization LicenseDetails TrialExpiry: " . $licenseDetails->getTrialExpiry() . "\n");
                        
                        //Get the Paid of each LicenseDetails
                        echo("Organization LicenseDetails Paid: " . $licenseDetails->getPaid() . "\n");
                        
                        //Get the PaidType of each LicenseDetails
                        echo("Organization LicenseDetails PaidType: " . $licenseDetails->getPaidType() . "\n");
                    }
                    
                    //Get the Phone of each Organization
                    echo("Organization Phone: " . $org->getPhone() . "\n");
                    
                    //Get the CompanyName of each Organization
                    echo("Organization CompanyName: " . $org->getCompanyName() . "\n");
                    
                    //Get the PrivacySettings of each Organization
                    echo("Organization PrivacySettings: " . $org->getPrivacySettings() . "\n");
                    
                    //Get the PrimaryEmail of each Organization
                    echo("Organization PrimaryEmail: " . $org->getPrimaryEmail() . "\n");
                    
                    //Get the IsoCode of each Organization
                    echo("Organization IsoCode: " . $org->getIsoCode() . "\n");
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
	 * <h3> Upload Organization Photo</h3>
	 * This method is used to upload the brand logo or image of the organization and print the response.
	 * @param absoluteFilePath - The absolute file path of the file to be attached
	 * @throws Exception
	 */
	public static function uploadOrganizationPhoto(string $absoluteFilePath)
	{
		//Get instance of OrgOperations Class
		$orgOperations = new OrgOperations();
		
		//Get instance of FileBodyWrapper class that will contain the request file
		$fileBodyWrapper = new FileBodyWrapper();
		
		//Get instance of StreamWrapper class that takes absolute path of the file to be attached as parameter
		$streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
		
		//Set file to the FileBodyWrapper instance
		$fileBodyWrapper->setFile($streamWrapper);
		
		//Call uploadOrganizationPhoto method that takes FileBodyWrapper instance
		$response = $orgOperations->uploadOrganizationPhoto($fileBodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
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