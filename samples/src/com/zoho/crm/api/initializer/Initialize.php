<?php
namespace samples\src\com\zoho\crm\api\initializer;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\api\authenticator\store\DBStore;

use com\zoho\api\authenticator\store\FileStore;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\UserSignature;

use com\zoho\crm\api\dc\USDataCenter;

use com\zoho\api\logger\Logger;

use com\zoho\api\logger\Levels;

use com\zoho\crm\api\SDKConfigBuilder;

use com\zoho\crm\api\RequestProxy;

class Initialize
{
    public static function initialize()
    {
        /*
		 * Create an instance of Logger Class that takes two parameters
		 * 1 -> Level of the log messages to be logged. Can be configured by typing Levels "." and choose any level from the list displayed.
		 * 2 -> Absolute file path, where messages need to be logged.
		 */
        $logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");

        //Create an UserSignature instance that takes user Email as parameter
        $user = new UserSignature("abc@zoho.com");

        /*
		 * Configure the environment
		 * which is of the pattern Domain.Environment
		 * Available Domains: USDataCenter, EUDataCenter, INDataCenter, CNDataCenter, AUDataCenter
		 * Available Environments: PRODUCTION, DEVELOPER, SANDBOX
		 */
        $environment = USDataCenter::PRODUCTION();
       
        //Create a Token instance
        $token = new OAuthToken("clientId", "clientSecret", "REFRESH/GRANT token", TokenType::REFRESH/GRANT, "redirectURL");
       
        //Create an instance of TokenStore

		$tokenstore = new DBStore("hostName", "dataBaseName", "userName", "password", "portNumber");
		
        // $tokenstore = new FileStore("absolute_file_path");

		$resourcePath = "/Users/user_name/Documents/phpsdk-application";

		$autoRefreshFields = true;

        $pickListValidation = false;

		$builderInstance = new SDKConfigBuilder();

		//Create an instance of SDKConfig
		$configInstance = $builderInstance->setPickListValidation($pickListValidation)->setAutoRefreshFields($autoRefreshFields)->build();

		//Create an instance of RequestProxy
		$requestProxy = new RequestProxy("proxyHost", "proxyPort", "proxyUser", "password");

       /*
		* Call static initialize method of Initializer class that takes the arguments
		* 1 -> UserSignature instance
		* 2 -> Environment instance
		* 3 -> Token instance
		* 4 -> TokenStore instance
		* 5 -> SDKConfig instance 
		* 6 -> The path containing the absolute directory path to store user specific JSON files containing module fields information.
		* 7 -> Logger instance (Optional)
		* 8 -> RequestProxy instance (Optional)
		*/
		Initializer::initialize($user, $environment, $token, $tokenstore, $configInstance, $resourcePath, $logger, $requestProxy);
    }
}
?>