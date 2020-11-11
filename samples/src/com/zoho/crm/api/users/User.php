<?php
namespace samples\src\com\zoho\crm\api\users;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\profiles\Profile;

use com\zoho\crm\api\roles\Role;

use com\zoho\crm\api\users\APIException;

use com\zoho\crm\api\users\ActionWrapper;

use com\zoho\crm\api\users\RequestWrapper;

use com\zoho\crm\api\users\BodyWrapper;

use com\zoho\crm\api\users\ResponseWrapper;

use com\zoho\crm\api\users\SuccessResponse;

use com\zoho\crm\api\users\UsersOperations;

use com\zoho\crm\api\users\GetUsersHeader;

use com\zoho\crm\api\users\GetUserHeader;

use com\zoho\crm\api\users\GetUsersParam;

class User
{
	/**
	 * <h3> Get Users </h3>
	 * This method is used to retrieve the users data specified in the API request.
	 * You can specify the type of users that needs to be retrieved using the Users API.
	 * @throws Exception
	 */
	public static function getUsers()
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
		//Get instance of ParameterMap Class
		$paramInstance = new ParameterMap();
		
		$paramInstance->add(GetUsersParam::type(), "ActiveUsers");
		
		$paramInstance->add(GetUsersParam::page(), 1);
		
		$paramInstance->add(GetUsersParam::perPage(), 1);
		
        $headerInstance = new HeaderMap();

        $ifmodifiedsince = date_create("2020-07-15T17:58:47+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
		
		$headerInstance->add(GetUsersHeader::IfModifiedSince(), $ifmodifiedsince);
		
		//Call getUsers method that takes paramInstance as parameter
		$response = $usersOperations->getUsers($paramInstance, $headerInstance);
		
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
                
                //Get the list of obtained User instances
                $users = $responseWrapper->getUsers();
                
                foreach($users as $user)
                {	
                    //Get the Country of each User
                    echo("User Country: " . $user->getCountry() . "\n");
                    
                    // Get the CustomizeInfo instance of each User
                    $customizeInfo = $user->getCustomizeInfo();
                    
                    //Check if customizeInfo is not null
                    if($customizeInfo != null)
                    {
                        if($customizeInfo->getNotesDesc() != null)
                        {
                            //Get the NotesDesc of each User
                            echo("User CustomizeInfo NotesDesc: " . $customizeInfo->getNotesDesc() . "\n");
                        }
                        
                        if($customizeInfo->getShowRightPanel() != null)
                        {
                            //Get the ShowRightPanel of each User
                            echo("User CustomizeInfo ShowRightPanel: " . $customizeInfo->getShowRightPanel() . "\n");
                        }
                        
                        if($customizeInfo->getBcView() != null)
                        {
                            //Get the BcView of each User
                            echo("User CustomizeInfo BcView: " . $customizeInfo->getBcView() . "\n");
                        }
                        
                        if($customizeInfo->getShowHome() != null)
                        {
                            //Get the ShowHome of each User
                            echo("User CustomizeInfo ShowHome: " . $customizeInfo->getShowHome() . "\n");
                        }
                        
                        if($customizeInfo->getShowDetailView() != null)
                        {
                            //Get the ShowDetailView of each User
                            echo("User CustomizeInfo ShowDetailView: " . $customizeInfo->getShowDetailView() . "\n");
                        }
                        
                        if($customizeInfo->getUnpinRecentItem() != null)
                        {
                            //Get the UnpinRecentItem of each User
                            echo("User CustomizeInfo UnpinRecentItem: " . $customizeInfo->getUnpinRecentItem() . "\n");
                        }
                    }
                    
                    // Get the Role instance of each User
                    $role = $user->getRole();
                    
                    //Check if role is not null
                    if($role != null)
                    {
                        //Get the Name of each Role
                        echo("User Role Name: " . $role->getName() . "\n");
                        
                        //Get the ID of each Role
                        echo("User Role ID: " . $role->getId() . "\n");
                    }
                    
                    //Get the Signature of each User
                    echo("User Signature: " . $user->getSignature() . "\n");
                    
                    //Get the City of each User
                    echo("User City: " . $user->getCity() . "\n");
                    
                    //Get the NameFormat of each User
                    echo("User NameFormat: " . $user->getNameFormat() . "\n");
                    
                    //Get the Language of each User
                    echo("User Language: " . $user->getLanguage() . "\n");
                    
                    //Get the Locale of each User
                    echo("User Locale: " . $user->getLocale() . "\n");
                    
                    //Get the Microsoft of each User
                    echo("User Microsoft: " . $user->getMicrosoft() . "\n");
                    
                    if($user->getPersonalAccount() != null)
                    {
                        //Get the PersonalAccount of each User
                        echo("User PersonalAccount: " . $user->getPersonalAccount() . "\n");
                    }
                    
                    //Get the DefaultTabGroup of each User
                    echo("User DefaultTabGroup: " . $user->getDefaultTabGroup() . "\n");
                    
                    //Get the Isonline of each User
                    echo("User Isonline: " . $user->getIsonline() . "\n");
                    
                    //Get the modifiedBy User instance of each User
                    $modifiedBy = $user->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("User Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("User Modified By User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    //Get the Street of each User
                    echo("User Street: " . $user->getStreet() . "\n");
                    
                    //Get the Currency of each User
                    echo("User Currency: " . $user->getCurrency() . "\n");
                    
                    //Get the Alias of each User
                    echo("User Alias: " . $user->getAlias() . "\n");
                    
                    // Get the Theme instance of each User
                    $theme = $user->getTheme();
                    
                    //Check if theme is not null
                    if($theme != null)
                    {
                        // Get the TabTheme instance of Theme
                        $normalTab = $theme->getNormalTab();
                        
                        //Check if normalTab is not null
                        if($normalTab != null)
                        {
                            //Get the FontColor of NormalTab
                            echo("User Theme NormalTab FontColor: " . $normalTab->getFontColor() . "\n");
                            
                            //Get the Name of NormalTab
                            echo("User Theme NormalTab Name: " . $normalTab->getBackground() . "\n");
                        }
                        
                        // Get the TabTheme instance of Theme
                        $selectedTab = $theme->getSelectedTab();
                        
                        //Check if selectedTab is not null
                        if($selectedTab != null)
                        {
                            //Get the FontColor of SelectedTab
                            echo("User Theme SelectedTab FontColor: " . $selectedTab->getFontColor() . "\n");
                            
                            //Get the Name of SelectedTab
                            echo("User Theme SelectedTab Name: " . $selectedTab->getBackground() . "\n");
                        }
                        
                        //Get the NewBackground of each Theme
                        echo("User Theme NewBackground: " . $theme->getNewBackground() . "\n");
                        
                        //Get the Background of each Theme
                        echo("User Theme Background: " . $theme->getBackground() . "\n");
                        
                        //Get the Screen of each Theme
                        echo("User Theme Screen: " . $theme->getScreen() . "\n");
                        
                        //Get the Type of each Theme
                        echo("User Theme Type: " . $theme->getType() . "\n");
                    }
                    
                    //Get the ID of each User
                    echo("User ID: " . $user->getId() . "\n");
                    
                    //Get the State of each User
                    echo("User State: " . $user->getState() . "\n");
                    
                    //Get the Fax of each User
                    echo("User Fax: " . $user->getFax() . "\n");
                    
                    //Get the CountryLocale of each User
                    echo("User CountryLocale: " . $user->getCountryLocale() . "\n");
                    
                    //Get the FirstName of each User
                    echo("User FirstName: " . $user->getFirstName() . "\n");
                    
                    //Get the Email of each User
                    echo("User Email: " . $user->getEmail() . "\n");
                    
                    //Get the reportingTo User instance of each User
                    $reportingTo = $user->getReportingTo();
                    
                    //Check if reportingTo is not null
                    if($reportingTo != null)
                    {
                        //Get the Name of the reportingTo User
                        echo("User ReportingTo Name: " . $reportingTo->getName() . "\n");
                        
                        //Get the ID of the reportingTo User
                        echo("User ReportingTo ID: " . $reportingTo->getId() . "\n");
                    }
                    
                    //Get the DecimalSeparator of each User
                    echo("User DecimalSeparator: " . $user->getDecimalSeparator() . "\n");
                    
                    //Get the Zip of each User
                    echo("User Zip: " . $user->getZip() . "\n");
                    
                    //Get the CreatedTime of each User
                    echo("User CreatedTime: ");
                    
                    print_r($user->getCreatedTime());

                    echo("\n");
                    
                    //Get the Website of each User
                    echo("User Website: " . $user->getWebsite() . "\n");
                    
                    //Get the ModifiedTime of each User
                    echo("User ModifiedTime: ");

                    print_r($user->getModifiedTime());

                    echo("\n");
                    
                    //Get the TimeFormat of each User
                    echo("User TimeFormat: " . $user->getTimeFormat() . "\n");
                    
                    //Get the Offset of each User
                    echo("User Offset: " . $user->getOffset() . "\n");
                    
                    //Get the Profile instance of each User
                    $profile = $user->getProfile();
                    
                    //Check if profile is not null
                    if($profile != null)
                    {
                        //Get the Name of each Profile
                        echo("User Profile Name: " . $profile->getName() . "\n");
                        
                        //Get the ID of each Profile
                        echo("User Profile ID: " . $profile->getId() . "\n");
                    }
                    
                    //Get the Mobile of each User
                    echo("User Mobile: " . $user->getMobile() . "\n");
                    
                    //Get the LastName of each User
                    echo("User LastName: " . $user->getLastName() . "\n");
                    
                    //Get the TimeZone of each User
                    echo("User TimeZone: " . $user->getTimeZone() . "\n");
                    
                    //Get the createdBy User instance of each User
                    $createdBy = $user->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("User Created By User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("User Created By User-ID: " . $createdBy->getId() . "\n");
                    }

                    //Get the Zuid of each User
                    echo("User Zuid: " . $user->getZuid() . "\n");
                    
                    //Get the Confirm of each User
                    echo("User Confirm: " . $user->getConfirm() . "\n");
                    
                    //Get the FullName of each User
                    echo("User FullName: " . $user->getFullName() . "\n");
                    
                    //Get the list of obtained Territory instances
                    $territories = $user->getTerritories();
                    
                    //Check if territories is not null
                    if($territories != null)
                    {
                        foreach($territories as $territory)
                        {
                            //Get the Manager of the Territory
                            echo("User Territory Manager: " . $territory->getManager() . "\n");
                            
                            //Get the Name of the Territory
                            echo("User Territory Name: " . $territory->getName() . "\n");
                            
                            //Get the ID of the Territory
                            echo("User Territory ID: " . $territory->getId() . "\n");
                        }
                    }
                    
                    //Get the Phone of each User
                    echo("User Phone: " . $user->getPhone() . "\n");
                    
                    //Get the DOB of each User
                    echo("User DOB: " . $user->getDob() . "\n");
                    
                    //Get the DateFormat of each User
                    echo("User DateFormat: " . $user->getDateFormat() . "\n");
                    
                    //Get the Status of each User
                    echo("User Status: " . $user->getStatus() . "\n");
                }
                
                //Get the Object obtained Info instance
                $info = $responseWrapper->getInfo();
                
                //Check if info is not null
                if($info != null)
                {
                    if($info->getPerPage() != null)
                    {
                        //Get the PerPage of the Info
                        echo("User Info PerPage: " . $info->getPerPage() . "\n");
                    }
                    
                    if($info->getCount() != null)
                    {
                        //Get the Count of the Info
                        echo("User Info Count: " . $info->getCount() . "\n");
                    }
                    
                    if($info->getPage() != null)
                    {
                        //Get the Page of the Info
                        echo("User Info Page: " . $info->getPage() . "\n");
                    }
                    
                    if($info->getMoreRecords() != null)
                    {
                        //Get the MoreRecords of the Info
                        echo("User Info MoreRecords: " . $info->getMoreRecords() . "\n");
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
	 * <h3> Create Users </h3>
	 * This method is used to add a user to your organization and print the response.
	 * @throws Exception
	 */
	public static function createUser()
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new RequestWrapper();
		
		//List of User instances
        $userList = array();
        
        $userClass = "com\zoho\crm\api\users\User";
		
		//Get instance of User Class
		$user1 = new $userClass();
		
		$role = new Role();
		
		$role->setId("3477061000000026008");
		
		$user1->setRole($role);
		
		$user1->setFirstName("TestUser");
		
		$user1->setEmail("testuser@zoho.com");
		
		$profile = new Profile();
		
		$profile->setId("3477061000000026014");
		
		$user1->setProfile($profile);
		
		$user1->setLastName("12");
		
		array_push($userList, $user1);
		
		$request->setUsers($userList);
		
		//Call createUser method that takes BodyWrapper class instance as parameter
		$response = $usersOperations->createUser($request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
				
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $responseWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $responseWrapper->getUsers();
                
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
	 * <h3> Update Users </h3>
	 * This method is used to update the details of a user of your organization and print the response.
	 * @throws Exception
	 */
	public static function updateUsers()
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of User instances
        $userList = array();
        
        $userClass = "com\zoho\crm\api\users\User";
		
		//Get instance of User Class
		$user1 = new $userClass();
		
		$user1->setId("3477061000005791024");
		
		$role = new Role();
		
		$role->setId("3477061000000026008");
		
		$user1->setRole($role);
		
		$user1->setCountryLocale("en_US");
		
		array_push($userList, $user1);
		
		$user1 = new $userClass();
		
		$user1->setId("3477061000005791024");
		
		$role = new Role();
		
		$role->setId("3477061000000026008");
		
		$user1->setRole($role);
		
		$user1->setCountryLocale("en_US");
		
		$user1->addKeyValue("FieldAPIName", "Value");
		
		array_push($userList, $user1);
		
		$request->setUsers($userList);
		
		//Call updateUsers method that takes BodyWrapper instance as parameter
		$response = $usersOperations->updateUsers($request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
				
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $responseWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $responseWrapper->getUsers();
                
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
	 * <h3> Get User </h3>
	 * This method is used to get the details of any specific $user->
	 * Specify the unique id of the user in your API request to get the data for that particular $user->
	 * @param userId - The ID of the User to be obtainted
	 * @throws Exception
	 */
	public static function getUser(string $userId)
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
        $headerInstance = new HeaderMap();

        $ifmodifiedsince = date_create("2020-07-15T17:58:47+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
		
		$headerInstance->add(GetUserHeader::IfModifiedSince(), $ifmodifiedsince);
		
		//Call getUser method that takes userId as parameter 
		$response = $usersOperations->getUser($userId,$headerInstance);
		
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
                
                //Get the obtained User instance
                $users = $responseWrapper->getUsers();
                
                foreach($users as $user)
                {	
                    //Get the Country of each User
                    echo("User Country: " . $user->getCountry() . "\n");
                    
                    // Get the CustomizeInfo instance of each User
                    $customizeInfo = $user->getCustomizeInfo();
                    
                    //Check if customizeInfo is not null
                    if($customizeInfo != null)
                    {
                        if($customizeInfo->getNotesDesc() != null)
                        {
                            //Get the NotesDesc of each User
                            echo("User CustomizeInfo NotesDesc: " . $customizeInfo->getNotesDesc() . "\n");
                        }
                        
                        if($customizeInfo->getShowRightPanel() != null)
                        {
                            //Get the ShowRightPanel of each User
                            echo("User CustomizeInfo ShowRightPanel: " . $customizeInfo->getShowRightPanel() . "\n");
                        }
                        
                        if($customizeInfo->getBcView() != null)
                        {
                            //Get the BcView of each User
                            echo("User CustomizeInfo BcView: " . $customizeInfo->getBcView() . "\n");
                        }
                        
                        if($customizeInfo->getShowHome() != null)
                        {
                            //Get the ShowHome of each User
                            echo("User CustomizeInfo ShowHome: " . $customizeInfo->getShowHome() . "\n");
                        }
                        
                        if($customizeInfo->getShowDetailView() != null)
                        {
                            //Get the ShowDetailView of each User
                            echo("User CustomizeInfo ShowDetailView: " . $customizeInfo->getShowDetailView() . "\n");
                        }
                        
                        if($customizeInfo->getUnpinRecentItem() != null)
                        {
                            //Get the UnpinRecentItem of each User
                            echo("User CustomizeInfo UnpinRecentItem: " . $customizeInfo->getUnpinRecentItem() . "\n");
                        }
                    }
                    
                    // Get the Role instance of each User
                    $role = $user->getRole();
                    
                    //Check if role is not null
                    if($role != null)
                    {
                        //Get the Name of each Role
                        echo("User Role Name: " . $role->getName() . "\n");
                        
                        //Get the ID of each Role
                        echo("User Role ID: " . $role->getId() . "\n");
                    }
                    
                    //Get the Signature of each User
                    echo("User Signature: " . $user->getSignature() . "\n");
                    
                    //Get the City of each User
                    echo("User City: " . $user->getCity() . "\n");
                    
                    //Get the NameFormat of each User
                    echo("User NameFormat: " . $user->getNameFormat() . "\n");
                    
                    //Get the Language of each User
                    echo("User Language: " . $user->getLanguage() . "\n");
                    
                    //Get the Locale of each User
                    echo("User Locale: " . $user->getLocale() . "\n");
                    
                    //Get the Microsoft of each User
                    echo("User Microsoft: " . $user->getMicrosoft() . "\n");
                    
                    if($user->getPersonalAccount() != null)
                    {
                        //Get the PersonalAccount of each User
                        echo("User PersonalAccount: " . $user->getPersonalAccount() . "\n");
                    }
                    
                    //Get the DefaultTabGroup of each User
                    echo("User DefaultTabGroup: " . $user->getDefaultTabGroup() . "\n");
                    
                    //Get the Isonline of each User
                    echo("User Isonline: " . $user->getIsonline() . "\n");
                    
                    //Get the modifiedBy User instance of each User
                    $modifiedBy = $user->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("User Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("User Modified By User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    //Get the Street of each User
                    echo("User Street: " . $user->getStreet() . "\n");
                    
                    //Get the Currency of each User
                    echo("User Currency: " . $user->getCurrency() . "\n");
                    
                    //Get the Alias of each User
                    echo("User Alias: " . $user->getAlias() . "\n");
                    
                    // Get the Theme instance of each User
                    // Get the Theme instance of each User
                    $theme = $user->getTheme();
                    
                    //Check if theme is not null
                    if($theme != null)
                    {
                        // Get the TabTheme instance of Theme
                        $normalTab = $theme->getNormalTab();
                        
                        //Check if normalTab is not null
                        if($normalTab != null)
                        {
                            //Get the FontColor of NormalTab
                            echo("User Theme NormalTab FontColor: " . $normalTab->getFontColor() . "\n");
                            
                            //Get the Name of NormalTab
                            echo("User Theme NormalTab Name: " . $normalTab->getBackground() . "\n");
                        }
                        
                        // Get the TabTheme instance of Theme
                        $selectedTab = $theme->getSelectedTab();
                    
                        //Check if selectedTab is not null
                        if($selectedTab != null)
                        {
                            //Get the FontColor of SelectedTab
                            echo("User Theme SelectedTab FontColor: " . $selectedTab->getFontColor() . "\n");
                            
                            //Get the Name of SelectedTab
                            echo("User Theme SelectedTab Name: " . $selectedTab->getBackground() . "\n");
                        }
                        
                        //Get the NewBackground of each Theme
                        echo("User Theme NewBackground: " . $theme->getNewBackground() . "\n");
                        
                        //Get the Background of each Theme
                        echo("User Theme Background: " . $theme->getBackground() . "\n");
                        
                        //Get the Screen of each Theme
                        echo("User Theme Screen: " . $theme->getScreen() . "\n");
                        
                        //Get the Type of each Theme
                        echo("User Theme Type: " . $theme->getType() . "\n");
                    }
                    
                    //Get the ID of each User
                    echo("User ID: " . $user->getId() . "\n");
                    
                    //Get the State of each User
                    echo("User State: " . $user->getState() . "\n");
                    
                    //Get the Fax of each User
                    echo("User Fax: " . $user->getFax() . "\n");
                    
                    //Get the CountryLocale of each User
                    echo("User CountryLocale: " . $user->getCountryLocale() . "\n");
                    
                    //Get the FirstName of each User
                    echo("User FirstName: " . $user->getFirstName() . "\n");
                    
                    //Get the Email of each User
                    echo("User Email: " . $user->getEmail() . "\n");
                    
                    //Get the reportingTo User instance of each User
                    $reportingTo = $user->getReportingTo();
                    
                    //Check if reportingTo is not null
                    if($reportingTo != null)
                    {
                        //Get the Name of the reportingTo User
                        echo("User ReportingTo Name: " . $reportingTo->getName() . "\n");
                        
                        //Get the ID of the reportingTo User
                        echo("User ReportingTo ID: " . $reportingTo->getId() . "\n");
                    }
                    
                    //Get the DecimalSeparator of each User
                    echo("User DecimalSeparator: " . $user->getDecimalSeparator() . "\n");
                    
                    //Get the Zip of each User
                    echo("User Zip: " . $user->getZip() . "\n");
                    
                    //Get the CreatedTime of each User
                    echo("User CreatedTime: ");
                    
                    print_r($user->getCreatedTime());

                    echo("\n");
                    
                    //Get the Website of each User
                    echo("User Website: " . $user->getWebsite() . "\n");
                    
                    //Get the ModifiedTime of each User
                    echo("User ModifiedTime: ");

                    print_r($user->getModifiedTime());

                    echo("\n");
                    
                    //Get the TimeFormat of each User
                    echo("User TimeFormat: " . $user->getTimeFormat() . "\n");
                    
                    //Get the Offset of each User
                    echo("User Offset: " . $user->getOffset() . "\n");
                    
                    //Get the Profile instance of each User
                    $profile = $user->getProfile();
                    
                    //Check if profile is not null
                    if($profile != null)
                    {
                        //Get the Name of each Profile
                        echo("User Profile Name: " . $profile->getName() . "\n");
                        
                        //Get the ID of each Profile
                        echo("User Profile ID: " . $profile->getId() . "\n");
                    }
                    
                    //Get the Mobile of each User
                    echo("User Mobile: " . $user->getMobile() . "\n");
                    
                    //Get the LastName of each User
                    echo("User LastName: " . $user->getLastName() . "\n");
                    
                    //Get the TimeZone of each User
                    echo("User TimeZone: " . $user->getTimeZone() . "\n");
                    
                    //Get the createdBy User instance of each User
                    $createdBy = $user->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("User Created By User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("User Created By User-ID: " . $createdBy->getId() . "\n");
                    }

                    //Get the Zuid of each User
                    echo("User Zuid: " . $user->getZuid() . "\n");
                    
                    //Get the Confirm of each User
                    echo("User Confirm: " . $user->getConfirm() . "\n");
                    
                    //Get the FullName of each User
                    echo("User FullName: " . $user->getFullName() . "\n");
                    
                    //Get the list of obtained Territory instances
                    $territories = $user->getTerritories();
                    
                    //Check if territories is not null
                    if($territories != null)
                    {
                        foreach($territories as $territory)
                        {
                            //Get the Manager of the Territory
                            echo("User Territory Manager: " . $territory->getManager() . "\n");
                            
                            //Get the Name of the Territory
                            echo("User Territory Name: " . $territory->getName() . "\n");
                            
                            //Get the ID of the Territory
                            echo("User Territory ID: " . $territory->getId() . "\n");
                        }
                    }
                    
                    //Get the Phone of each User
                    echo("User Phone: " . $user->getPhone() . "\n");
                    
                    //Get the DOB of each User
                    echo("User DOB: " . $user->getDob() . "\n");
                    
                    //Get the DateFormat of each User
                    echo("User DateFormat: " . $user->getDateFormat() . "\n");
                    
                    //Get the Status of each User
                    echo("User Status: " . $user->getStatus() . "\n");
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
	 * <h3> Update User </h3>
	 * This method is used to update the details of a user of your organization and print the response.
	 * @param userId - The ID of the User to be obtainted
	 * @throws Exception
	 */
	public static function updateUser(string $userId)
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$request = new BodyWrapper();
		
		//List of User instances
		$userList = array();
		
		$userClass = "com\zoho\crm\api\users\User";
		
		//Get instance of User Class
		$user1 = new $userClass();
		
		$role = new Role();
		
		$role->setId("3477061000000026008");
		
		$user1->setRole($role);
		
		$user1->setCountryLocale("en_US");
		
		array_push($userList, $user1);
		
		$request->setUsers($userList);
		
		//Call updateUser method that takes BodyWrapper instance and userId as parameter
		$response = $usersOperations->updateUser($userId,$request);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
				
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $responseWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $responseWrapper->getUsers();
                
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
	 * <h3> Delete User </h3>
	 * This method is used to delete a user from your organization and print the response.
	 * @param userId - The ID of the User to be obtainted
	 * @throws Exception
	 */
	public static function deleteUser(string $userId)
	{
		//Get instance of UsersOperations Class
		$usersOperations = new UsersOperations();
		
		//Call deleteUser method that takes userId as parameter
		$response = $usersOperations->deleteUser($userId);
		
		if($response != null)
		{
			//Get the status code from response
			echo("Status Code: " . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
				
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $responseWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $responseWrapper->getUsers();
                
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