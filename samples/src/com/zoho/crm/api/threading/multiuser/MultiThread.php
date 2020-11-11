<?php 
namespace samples\src\com\zoho\crm\api\threading\multiuser;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\api\authenticator\store\DBStore;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\UserSignature;

use com\zoho\crm\api\dc\USDataCenter;

use com\zoho\api\logger\Logger;

use com\zoho\api\logger\Levels;

use com\zoho\crm\api\record\RecordOperations;

use com\zoho\crm\api\record\GetRecordsHeader;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\SDKConfigBuilder;

class MultiThread
{	
	public function main()
	{
		$logger = Logger::getInstance(Levels::INFO, "/Users/user_name/Documents/php_sdk_log.log");
		
		$environment1 = USDataCenter::PRODUCTION();
		
		$user1 = new UserSignature("abc@zoho.com");
		
		$tokenstore = new DBStore();
		
		$token1 = new OAuthToken("clientId1", "clientSecret1", "REFRESH/GRANT token", TokenType::REFRESH/GRANT);
        
        $autoRefreshFields = true;

        $pickListValidation = true;

        $builderInstance = new SDKConfigBuilder();

		//Create an instance of SDKConfig
		$configInstance = $builderInstance->setPickListValidation($pickListValidation)->setAutoRefreshFields($autoRefreshFields)->build();

        $resourcePath = "/Users/user_name/Documents/phpsdk-application";

        Initializer::initialize($user1, $environment1, $token1, $tokenstore, $configInstance, $resourcePath, $logger);
        
        $this->getRecords("Leads");
		
		$environment2 = USDataCenter::PRODUCTION();
		
		$user2 = new UserSignature("xyz@zoho.com");
		
		$token2 = new OAuthToken("clientId2", "clientSecret2", "REFRESH/GRANT token", TokenType::REFRESH/GRANT, "redirectURL");
        
        $configInstance2 = $builderInstance->setPickListValidation(false)->setAutoRefreshFields(false)->build();

        Initializer::switchUser($user2, $environment2, $token2, $configInstance2);

        Initializer::removeUserConfiguration($user1, $environment1);
        
        //Throws Exception when the configuration is not present
        try
        {
            Initializer::removeUserConfiguration($user1, $environment1);
        }
        catch(\Exception $ex)
        {
            print_r($ex);
        }

        $this->getRecords("Leads");

        Initializer::switchUser($user1, $environment1, $token1, $configInstance);

        $this->getRecords("apiName2");
    }
    
    public function getRecords($moduleAPIName) 
    { 
        try
        { 
            $recordOperations = new RecordOperations();
            
            $paramInstance = new ParameterMap();
        	
            $headerInstance = new HeaderMap();
		
            $ifmodifiedsince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
            
            $headerInstance->add(GetRecordsHeader::IfModifiedSince(), $ifmodifiedsince);
            
            //Call getRecords method that takes moduleAPIName, paramInstance, moduleAPIName as parameter
            $response = $recordOperations->getRecords($moduleAPIName, $paramInstance, $headerInstance);

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