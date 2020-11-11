# ZOHO CRM PHP SDK

## Overview

Zoho CRM PHP SDK offers a way to create client PHP applications that can be integrated with Zoho CRM.

## Registering a Zoho Client

Since Zoho CRM APIs are authenticated with OAuth2 standards, you should register your client app with Zoho. To register your app:

- Visit this page [https://api-console.zoho.com/](https://api-console.zoho.com)

- Click on `ADD CLIENT`.

- Choose a `Client Type`.

- Enter **Client Name**, **Client Domain** or **Homepage URL** and **Authorized Redirect URIs** then click `CREATE`.

- Your Client app would have been created and displayed by now.

- Select the created OAuth client.

- Generate grant token by providing the necessary scopes, time duration (the duration for which the generated token is valid) and Scope Description.

## Environmental Setup

PHP SDK is installable through **Composer**. **Composer** is a tool for dependency management in PHP. SDK expects the following from the client app.

- Client app must have PHP(version 7 and above) with curl extension enabled.

- PHP SDK must be installed into client app though **Composer**.

## Including the SDK in your project

You can include the SDK to your project using:

- Install **Composer** (if not installed).

  - Run this command to install the composer.

    ```sh
    curl -sS https://getcomposer.org/installer | php
    ```

  - To install composer on mac/linux machine:

    ```sh
    https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
    ```

  - To install composer on windows machine:

    ```sh
    https://getcomposer.org/doc/00-intro.md#installation-windows
    ```

- Install **PHP SDK**.

  - Navigate to the workspace of your client app.
  
  - Run the command below:

    ```sh
    composer require zohocrm/php-sdk:3.0.0
    ```

  - The PHP SDK will be installed and a package named vendor will be created in the workspace of your client app.

- Using the SDK.

  - Add the below line in PHP files of your client app, where you would like to make use of PHP SDK.

    ```php
    require 'vendor/autoload.php';
    ```
  
  Through this line, you can access all the functionalities of the PHP SDK. The namespaces of the class to be used must be included within the "use" statement.

## Token Persistence

Token persistence refers to storing and utilizing the authentication tokens that are provided by Zoho. There are three ways provided by the SDK in which persistence can be utilized. They are DataBase Persistence, File Persistence and Custom Persistence.

### Table of Contents

- DataBase Persistence

- File Persistence

- Custom Persistence

### Implementing OAuth Persistence

Once the application is authorized, OAuth access and refresh tokens can be used for subsequent user data requests to Zoho CRM. Hence, they need to be persisted by the client app.

The persistence is achieved by writing an implementation of the inbuilt **TokenStore interface**, which has the following callback methods.

- **getToken($user, $token)** - invoked before firing a request to fetch the saved tokens. This method should return an implementation of **Token interface** object for the library to process it.

- **saveToken($user, $token)** - invoked after fetching access and refresh tokens from Zoho.

- **deleteToken($token)** - invoked before saving the latest tokens.

- **getTokens()** - The method to retrieve all the stored tokens.

- **deleteTokens()** - The method to delete all the stored tokens.

Note:

- $user instanceof UserSignature.

- $token instanceof Token interface.

### DataBase Persistence

In case the user prefers to use the default DataBase persistence, **MySQL** can be used.

- The database name should be **zohooauth**.

- There must be a table name oauthtoken with columns.

  - user_mail varchar(255)

  - client_id varchar(255)

  - refresh_token varchar(255)

  - access_token varchar(255)

  - grant_token varchar(255)

  - expiry_time varchar(20)

#### MySQL Query

```sql
create table oauthtoken(id int(11) not null auto_increment, user_mail varchar(255) not null, client_id varchar(255), refresh_token varchar(255), access_token varchar(255), grant_token varchar(255), expiry_time varchar(20), primary key (id));

alter table oauthtoken auto_increment = 1;
```

#### Create DBStore object

```php
/*
* 1 -> DataBase host name. Default value "localhost"
* 2 -> DataBase name. Default  value "zohooauth"
* 3 -> DataBase user name. Default value "root"
* 4 -> DataBase password. Default value ""
* 5 -> DataBase port number. Default value "3306"
*/
$tokenstore = new DBStore();

$tokenstore = new DBStore("hostName", "dataBaseName", "userName", "password", "portNumber");
```

### File Persistence

In case of default File Persistence, the user can persist tokens in the local drive, by providing the the absolute file path to the FileStore object.

- The File contains.

  - user_mail

  - client_id

  - refresh_token

  - access_token

  - grant_token

  - expiry_time

#### Create FileStore object

```php
//Parameter containing the absolute file path to store tokens
$tokenstore = new FileStore("/Users/username/Documents/php_sdk_token.txt");
```

### Custom Persistence

To use Custom Persistence, the user must implement **TokenStore interface** (**com\zoho\api\authenticator\store\TokenStore**) and override the methods.

```php
namespace store;

use com\zoho\api\authenticator\Token;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\UserSignature;

use com\zoho\api\authenticator\store\TokenStore;

class CustomStore implements TokenStore
{
    /**
        * @param user A UserSignature class instance.
        * @param token A Token (com\zoho\api\authenticator\OAuthToken) class instance.
        * @return A Token class instance representing the user token details.
        * @throws SDKException if any problem occurs.
    */
    public function getToken($user, $token)
    {
        // Add code to get the token
        return null;
    }

    /**
        * @param user A UserSignature class instance.
        * @param token A Token (com\zoho\api\authenticator\OAuthToken) class instance.
        * @throws SDKException if any problem occurs.
    */
    public function saveToken($user, $token)
    {
        // Add code to save the token
    }

    /**
        * @param token A Token (com\zoho\api\authenticator\OAuthToken) class instance.
        * @throws SDKException if any problem occurs.
    */
    public function deleteToken($token)
    {
        // Add code to delete the token
    }

  /**
   * @return array  An array of Token (com\zoho\api\authenticator\OAuthToken) class instances
   */ 
    public function getTokens()
    {
        //Add code to retrieve all the stored tokens
    }

    public function deleteTokens()
    {
        //Add code to delete all the stored tokens.
    }
}
```

## Configuration

Before you get started with creating your PHP application, you need to register your client and authenticate the app with Zoho.

- Create an instance of **Logger** Class to log exception and API information.

    ```php
    /*
    * Create an instance of Logger Class that takes two parameters
    * 1 -> Level of the log messages to be logged. Can be configured by typing Levels "::" and choose any level from the list displayed.
    * 2 -> Absolute file path, where messages need to be logged.
    */
    $logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");
    ```

- Create an instance of **UserSignature** that identifies the current user.

    ```php
    //Create an UserSignature instance that takes user Email as parameter
    $user = new UserSignature("abc@zoho.com");
    ```

- Configure API environment which decides the domain and the URL to make API calls.

    ```php
    /*
    * Configure the environment
    * which is of the pattern Domain.Environment
    * Available Domains: USDataCenter, EUDataCenter, INDataCenter, CNDataCenter, AUDataCenter
    * Available Environments: PRODUCTION(), DEVELOPER(), SANDBOX()
    */
    $environment = USDataCenter::PRODUCTION();
    ```

- Create an instance of OAuthToken with the information  that you get after registering your Zoho client.

    ```php
    /*
    * Create a Token instance
    * 1 -> OAuth client id.
    * 2 -> OAuth client secret.
    * 3 -> REFRESH/GRANT token.
    * 4 -> Token type(REFRESH/GRANT).
    * 5 -> OAuth redirect URL. (optional)
    */
    $token = new OAuthToken("clientId", "clientSecret", "REFRESH/GRANT token", TokenType::REFRESH/GRANT, "redirectURL");
    ```

- Create an instance of TokenStore to persist tokens, used for authenticating all the requests.

    ```php
    /*
    * Create an instance of DBStore.
    * 1 -> DataBase host name. Default value "localhost"
    * 2 -> DataBase name. Default  value "zohooauth"
    * 3 -> DataBase user name. Default value "root"
    * 4 -> DataBase password. Default value ""
    * 5 -> DataBase port number. Default value "3306"
    */
    //$tokenstore = new DBStore();

    $tokenstore = new DBStore("hostName", "dataBaseName", "userName", "password", "portNumber");

    // $tokenstore = new FileStore("absolute_file_path");  
    ```

- Create an instance of SDKConfig containing SDK configurations.

    ```php
    /*
    * autoRefreshFields
    * true - all the modules' fields will be auto-refreshed in the background, every hour.
    * false - the fields will not be auto-refreshed in the background. The user can manually delete the file(s) or refresh the fields using methods from ModuleFieldsHandler(com\zoho\crm\api\util\ModuleFieldsHandler)
    *
    * pickListValidation
    * A boolean field that validates user input for a pick list field and allows or disallows the addition of a new value to the list.
    * true - the SDK validates the input. If the value does not exist in the pick list, the SDK throws an error.
    * false - the SDK does not validate the input and makes the API request with the user’s input to the pick list
    */
    $autoRefreshFields = false;

    $pickListValidation = false;

     $sdkConfig = new SDKConfigBuilder()->setAutoRefreshFields($autoRefreshFields)->setPickListValidation($pickListValidation)->build();
    ```

- Create an instance of RequestProxy containing the proxy properties of the user.

    ```php
     $requestProxy = new RequestProxy("proxyHost", "proxyPort", "proxyUser", "password");
    ```

- The path containing the absolute directory path to store user specific files containing module fields information.

    ```php
    $resourcePath = "/Users/user_name/Documents/phpsdk-application";
    ```

## Initializing the Application

Initialize the SDK using the following code.

```php
<?php
namespace com\zoho\crm\sample\initializer;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\api\authenticator\store\DBStore;

use com\zoho\api\authenticator\store\FileStore;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\UserSignature;

use com\zoho\crm\api\SDKConfigBuilder;

use com\zoho\crm\api\dc\USDataCenter;

use com\zoho\crm\api\logger\Logger;

use com\zoho\crm\api\logger\Levels;

class Initialize
{
    public static function initialize()
    {
        /*
            * Create an instance of Logger Class that takes two parameters
            * 1 -> Level of the log messages to be logged. Can be configured by typing Levels "::" and choose any level from the list displayed.
            * 2 -> Absolute file path, where messages need to be logged.
        */
        $logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");

        //Create an UserSignature instance that takes user Email as parameter
        $user = new UserSignature("abc@zoho.com");

        /*
            * Configure the environment
            * which is of the pattern Domain.Environment
            * Available Domains: USDataCenter, EUDataCenter, INDataCenter, CNDataCenter, AUDataCenter
            * Available Environments: PRODUCTION(), DEVELOPER(), SANDBOX()
        */
        $environment = USDataCenter::PRODUCTION();

        /*
            * Create a Token instance
            * 1 -> OAuth client id.
            * 2 -> OAuth client secret.
            * 3 -> REFRESH/GRANT token.
            * 4 -> Token type(REFRESH/GRANT).
            * 5 -> OAuth redirect URL.
        */
        $token = new OAuthToken("clientId", "clientSecret", "REFRESH/GRANT token", TokenType::REFRESH/GRANT, "redirectURL");

        /*
        * Create an instance of DBStore.
        * 1 -> DataBase host name. Default value "localhost"
        * 2 -> DataBase name. Default  value "zohooauth"
        * 3 -> DataBase user name. Default value "root"
        * 4 -> DataBase password. Default value ""
        * 5 -> DataBase port number. Default value "3306"
        */
        //$tokenstore = new DBStore();

        $tokenstore = new DBStore("hostName", "dataBaseName", "userName", "password", "portNumber");

        // $tokenstore = new FileStore("absolute_file_path");

        $autoRefreshFields = false;

        $pickListValidation = false;

        // Create an instance of SDKConfig
        $sdkConfig = new SDKConfigBuilder()->setAutoRefreshFields($autoRefreshFields)->setPickListValidation($pickListValidation)->build();

        $resourcePath = "/Users/user_name/Documents/phpsdk-application";

        //Create an instance of RequestProxy
        $requestProxy = new RequestProxy("proxyHost", "proxyPort", "proxyUser", "password");

        /*
          * Call static initialize method of Initializer class that takes the following arguments
          * 1 -> UserSignature instance
          * 2 -> Environment instance
          * 3 -> Token instance
          * 4 -> TokenStore instance
          * 5 -> SDKConfig instance
          * 6 -> resourcePath - A String
          * 7 -> Log instance (optional)
          * 8 -> RequestProxy instance (optional)
        */
        Initializer::initialize($user, $environment, $token, $tokenstore, $sdkConfig, $resourcePath, $logger, $requestProxy);
    }
}
?>
```

- You can now access the functionalities of the SDK. Refer to the sample codes to make various API calls through the SDK.

## Class Hierarchy

![classdiagram](class_hierarchy.png)

## Responses and Exceptions

All SDK method calls return an instance of the **APIResponse** class.

Use the **getObject()** method in the returned **APIResponse** object to obtain the response handler interface depending on the type of request (**GET, POST,PUT,DELETE**).

**APIResponse&lt;ResponseHandler&gt;** and **APIResponse&lt;ActionHandler&gt;** are the common wrapper objects for Zoho CRM APIs’ responses.

Whenever the API returns an error response, the response will be an instance of **APIException** class.

All other exceptions such as SDK anomalies and other unexpected behaviours are thrown under the **SDKException** class.

- For operations involving records in Tags
  - **APIResponse&lt;RecordActionHandler&gt;**

- For getting Record Count for a specific Tag operation
  
  - **APIResponse&lt;CountHandler&gt;**

- For operations involving BaseCurrency

  - **APIResponse&lt;BaseCurrencyActionHandler&gt;**

- For Lead convert operation

  - **APIResponse&lt;ConvertActionHandler&gt;**

- For retrieving Deleted records operation

  - **APIResponse&lt;DeletedRecordsHandler&gt;**

- For  Record image download operation

  - **APIResponse&lt;DownloadHandler&gt;**

- For MassUpdate record operations

  - **APIResponse&lt;MassUpdateActionHandler&gt;**

  - **APIResponse&lt;MassUpdateResponseHandler&gt;**

### GET Requests

- The **getObject()** of the returned APIResponse instance returns the response handler interface.

- The **ResponseHandler interface** interface encompasses the following
  - **ResponseWrapper class** (for **application/json** responses)
  - **FileBodyWrapper class** (for File download responses)
  - **APIException class**

- The **CountHandler interface** encompasses the following
  - **CountWrapper class** (for **application/json** responses)
  - **APIException class**

- The **DeletedRecordsHandler interface** encompasses the following
  - **DeletedRecordsWrapper class** (for **application/json** responses)
  - **APIException class**

- The **DownloadHandler interface** encompasses the following
  - **FileBodyWrapper class** (for File download responses)
  - **APIException class**

- The **MassUpdateResponseHandler interface** encompasses the following
  - **MassUpdateResponseWrapper class** (for **application/json** responses)
  - **APIException class**

### POST, PUT, DELETE Requests

- The **getObject()** of the returned APIResponse instance returns the action handler interface.

- The **ActionHandler interface** encompasses the following
  - **ActionWrapper class** (for **application/json** responses)
  - **APIException class**

- The **ActionWrapper class** contains **Property/Properties** that may contain one/list of **ActionResponse interfaces**.

- The **ActionResponse interface** encompasses following
  - **SuccessResponse class** (for **application/json** responses)
  - **APIException class**

- The **ActionHandler interface** encompasses following
  - **ActionWrapper class** (for **application/json** responses)
  - **APIException class**

- The **RecordActionHandler interface** encompasses following
  - **RecordActionWrapper class** (for **application/json** responses)
  - **APIException class**

- The **BaseCurrencyActionHandler interface** encompasses following
  - **BaseCurrencyActionWrapper class** (for **application/json** responses)
  - **APIException class**

- The **MassUpdateActionHandler interface** encompasses following
  - **MassUpdateActionWrapper class** (for **application/json** responses)
  - **APIException class**

- The **ConvertActionHandler interface** encompasses following
  - **ConvertActionWrapper class** (for **application/json** responses)
  - **APIException class**

## Multi-User support in the PHP SDK

The **PHP SDK** (from version 3.x.x) supports both single user and a multi-user app.

### Multi-user App

Multi-users functionality is achieved using Initializer's static **switchUser()**.

```php
Initializer::switchUser($user, $environment, $token, $sdkConfig, $proxy);
```

To Remove a user's configuration in SDK. Use the below code

```php
Initializer::removeUserConfiguration($user, $environment);
```

```php
<?php
namespace multiuser;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\api\authenticator\store\FileStore;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\UserSignature;

use com\zoho\crm\api\SDKConfigBuilder;

use com\zoho\crm\api\dc\USDataCenter;

use com\zoho\crm\api\logger\Logger;

use com\zoho\crm\api\logger\Levels;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\record\RecordOperations;

use com\zoho\crm\api\record\GetRecordsHeader;

use com\zoho\crm\api\record\GetRecordsParam;

use com\zoho\crm\api\dc\EUDataCenter;

require_once 'vendor/autoload.php';

class MultiThread
{
    public function main()
    {
        $logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");

        $environment1 = USDataCenter::PRODUCTION();

        $user1 = new UserSignature("abc1@zoho.com");

        $tokenstore = new FileStore("/Users/user_name/Documents/php_sdk_token.txt");

        $token1 = new OAuthToken("clientId1", "clientSecrect1", "REFRESH/GRANT token", TokenType.REFRESH/GRANT, "redirectURL1");

        $autoRefreshFields = false;

        $pickListValidation = false;

        // Create an instance of SDKConfig
        $sdkConfig = new SDKConfigBuilder()->setAutoRefreshFields($autoRefreshFields)->setPickListValidation($pickListValidation)->build();

        $resourcePath ="/Users/user_name/Documents/phpsdk-application";

        Initializer::initialize($user1, $environment1, $token1, $tokenstore, $sdkConfig, $resourcePath, $logger);

        $this->getRecords("Leads");

        $environment2 = EUDataCenter::PRODUCTION();

        $user2 = new UserSignature("abc2@zoho.eu");

        $token2 = new OAuthToken("clientId2", "clientSecrect2", "REFRESH/GRANT token", TokenType.REFRESH/GRANT);

        Initializer::switchUser($user2, $environment2, $token2, $sdkConfig);

        // Initializer::removeUserConfiguration($user1, $environment1);

        $this->getRecords("Students");

        Initializer::switchUser($user1, $environment1, $token1, $sdkConfig);

        $this->getRecords("Contacts");
    }

    public function getRecords($moduleAPIName)
    {
        try
        {
            $recordOperations = new RecordOperations();

            $paramInstance = new ParameterMap();

            $paramInstance->add(GetRecordsParam::approved(), "false");

            $headerInstance = new HeaderMap();

            $ifmodifiedsince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));

            $headerInstance->add(GetRecordsHeader::IfModifiedSince(), $ifmodifiedsince);

            //Call getRecord method that takes paramInstance, moduleAPIName as parameter
            $response = $recordOperations->getRecords($moduleAPIName,$paramInstance, $headerInstance);

            echo($response->getStatusCode() . "\n");

            print_r($response->getObject());

            echo("\n");
        }
        catch (\Exception $e)
        {
            print_r($e);
        }
    }
}

$obj = new MultiThread();

$obj->main();
?>
```

- The program execution starts from main().

- The details of **"user1"** are is given in the variables user1, token1, environment1.

- Similarly, the details of another user **"user2"** is given in the variables user2, token2, environment2.

- Then, the **switchUser()** function is used to switch between the **"user1"** and **"user2"** as required.

- Based on the latest switched user, the **$this->getRecords($moduleAPIName)** will fetch record.

## SDK Sample code

```php
<?php
namespace index;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\api\authenticator\store\DBStore;

use com\zoho\api\authenticator\store\FileStore;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\UserSignature;

use com\zoho\crm\api\SDKConfigBuilder;

use com\zoho\crm\api\dc\USDataCenter;

use com\zoho\crm\api\logger\Logger;

use com\zoho\crm\api\logger\Levels;

use com\zoho\crm\api\record\RecordOperations;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\record\GetRecordsHeader;

use com\zoho\crm\api\record\GetRecordsParam;

use com\zoho\crm\api\record\ResponseWrapper;

require_once 'vendor/autoload.php';

class Record
{
    public static function getRecord()
    {
        /*
            * Create an instance of Logger Class that takes two parameters
            * 1 -> Level of the log messages to be logged. Can be configured by typing Levels "::" and choose any level from the list displayed.
            * 2 -> Absolute file path, where messages need to be logged.
        */
        $logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");

        //Create an UserSignature instance that takes user Email as parameter
        $user = new UserSignature("abc@zoho.com");

        /*
            * Configure the environment
            * which is of the pattern Domain.Environment
            * Available Domains: USDataCenter, EUDataCenter, INDataCenter, CNDataCenter, AUDataCenter
            * Available Environments: PRODUCTION(), DEVELOPER(), SANDBOX()
        */
        $environment = USDataCenter::PRODUCTION();

        //Create a Token instance
        $token = new OAuthToken("clientId", "clientSecrect", "REFRESH/GRANT token", TokenType.REFRESH/GRANT, "redirectURL");

        //Create an instance of TokenStore
        // $tokenstore = new DBStore();

        $tokenstore = new FileStore("/Users/user_name/Documents/php_sdk_token.txt");

        $autoRefreshFields = false;

        $pickListValidation = false;

        // Create an instance of SDKConfig
        $sdkConfig = new SDKConfigBuilder()->setAutoRefreshFields($autoRefreshFields)->setPickListValidation($pickListValidation)->build();
  
        $resourcePath ="/Users/user_name/Documents/phpsdk-application";

       /*
        * Call static initialize method of Initializer class that takes the following arguments
        * 1 -> UserSignature instance
        * 2 -> Environment instance
        * 3 -> Token instance
        * 4 -> TokenStore instance
        * 5 -> SDKConfig instance
        * 6 -> resourcePath -A String
        * 7 -> Log instance (optional)
        * 8 -> RequestProxy instance (optional)
        */
        Initializer::initialize($user, $environment, $token, $tokenstore, $sdkConfig, $resourcePath, $logger);

        try
        {
            $recordOperations = new RecordOperations();

            $paramInstance = new ParameterMap();

            $paramInstance->add(GetRecordsParam::approved(), "both");

            $headerInstance = new HeaderMap();

            $ifmodifiedsince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));

            $headerInstance->add(GetRecordsHeader::IfModifiedSince(), $ifmodifiedsince);

            $moduleAPIName = "Leads";

            //Call getRecord method that takes paramInstance, moduleAPIName as parameter
            $response = $recordOperations->getRecords($moduleAPIName,$paramInstance, $headerInstance);

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

                    //Get the list of obtained Record instances
                    $records = $responseWrapper->getData();

                    if($records != null)
                    {
                        $recordClass = 'com\zoho\crm\api\record\Record';

                        foreach($records as $record)
                        {
                            //Get the ID of each Record
                            echo("Record ID: " . $record->getId() . "\n");

                            //Get the createdBy User instance of each Record
                            $createdBy = $record->getCreatedBy();

                            //Check if createdBy is not null
                            if($createdBy != null)
                            {
                                //Get the ID of the createdBy User
                                echo("Record Created By User-ID: " . $createdBy->getId() . "\n");

                                //Get the name of the createdBy User
                                echo("Record Created By User-Name: " . $createdBy->getName() . "\n");

                                //Get the Email of the createdBy User
                                echo("Record Created By User-Email: " . $createdBy->getEmail() . "\n");
                            }

                            //Get the CreatedTime of each Record
                            echo("Record CreatedTime: ");

                            print_r($record->getCreatedTime());

                            echo("\n");

                            //Get the modifiedBy User instance of each Record
                            $modifiedBy = $record->getModifiedBy();

                            //Check if modifiedBy is not null
                            if($modifiedBy != null)
                            {
                                //Get the ID of the modifiedBy User
                                echo("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");

                                //Get the name of the modifiedBy User
                                echo("Record Modified By User-Name: " . $modifiedBy->getName() . "\n");

                                //Get the Email of the modifiedBy User
                                echo("Record Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                            }

                            //Get the ModifiedTime of each Record
                            echo("Record ModifiedTime: ");

                            print_r($record->getModifiedTime());

                            print_r("\n");

                            //Get the list of Tag instance each Record
                            $tags = $record->getTag();

                            //Check if tags is not null
                            if($tags != null)
                            {
                                foreach($tags as $tag)
                                {
                                    //Get the Name of each Tag
                                    echo("Record Tag Name: " . $tag->getName() . "\n");

                                    //Get the Id of each Tag
                                    echo("Record Tag ID: " . $tag->getId() . "\n");
                                }
                            }

                            //To get particular field value
                            echo("Record Field Value: " . $record->getKeyValue("Last_Name") . "\n");// FieldApiName

                            echo("Record KeyValues : \n" );
                            //Get the KeyValue map
                            foreach($record->getKeyValues() as $keyName => $value)
                            {
                                echo("Field APIName" . $keyName . " \tValue : ");

                                print_r($value);

                                echo("\n");
                            }
                        }
                    }
                }
            }
        }
        catch (\Exception $e)
        {
            print_r($e);
        }
    }
}

Record::getRecord();

?>
```
