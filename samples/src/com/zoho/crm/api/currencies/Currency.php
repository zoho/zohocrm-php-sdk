<?php
namespace samples\src\com\zoho\crm\api\currencies;

use com\zoho\crm\api\currencies\ResponseWrapper;

use com\zoho\crm\api\currencies\Format;

use com\zoho\crm\api\util\Choice;

use com\zoho\crm\api\currencies\ActionWrapper;

use com\zoho\crm\api\currencies\APIException;

use com\zoho\crm\api\currencies\SuccessResponse;

use com\zoho\crm\api\currencies\BodyWrapper;

use com\zoho\crm\api\currencies\BaseCurrencyWrapper;

use com\zoho\crm\api\currencies\BaseCurrencyActionWrapper;

use com\zoho\crm\api\currencies\CurrenciesOperations;

class Currency
{
	/**
	 * <h3> Get Currencies </h3>
	 * This method is used to get all the available currencies in your organization.
	 * @throws Exception
	 */
	public static function getCurrencies()
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Call getCurrencies method 
		$response = $currenciesOperations->getCurrencies();
		
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
                
                //Get the obtained Currency instance
                $currenciesList = $responseWrapper->getCurrencies();
                
                foreach($currenciesList as $currency)
                {	
                    //Get the Symbol of each currency
                    echo("Currency Symbol: " . $currency->getSymbol() . "\n");
                    
                    //Get the CreatedTime of each currency
                    echo("Currency CreatedTime: ");

                    print_r($currency->getCreatedTime());

                    echo("\n");
                    
                    //Get the currency is IsActive
                    echo("Currency IsActive: " . $currency->getIsActive() . "\n");
                    
                    //Get the ExchangeRate of each currency
                    echo("Currency ExchangeRate: " . $currency->getExchangeRate() . "\n");
                    
                    //Get the format Format instance of each currency
                    $format = $currency->getFormat();
                    
                    //Check if format is not null
                    if($format != null)
                    {
                        //Get the DecimalSeparator of the Format
                        echo("Currency Format DecimalSeparator: " . $format->getDecimalSeparator()->getValue() . "\n");
                        
                        //Get the ThousandSeparator of the Format
                        echo("Currency Format ThousandSeparator: " . $format->getThousandSeparator()->getValue() . "\n");
                        
                        //Get the DecimalPlaces of the Format
                        echo("Currency Format DecimalPlaces: " . $format->getDecimalPlaces()->getValue() . "\n");
                    }
                    
                    //Get the createdBy User instance of each currency
                    $createdBy = $currency->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("Currency CreatedBy User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("Currency CreatedBy User-ID: " . $createdBy->getId() . "\n");
                    }
                    
                    //Get the PrefixSymbol of each currency
                    echo("Currency PrefixSymbol: " . $currency->getPrefixSymbol() . "\n");
                    
                    //Get the IsBase of each currency
                    echo("Currency IsBase: " . $currency->getIsBase() . "\n");
                    
                    //Get the ModifiedTime of each currency
                    echo("Currency ModifiedTime: ");

                    print_r($currency->getModifiedTime());

                    echo("\n");
                    
                    //Get the Name of each currency
                    echo("Currency Name: " . $currency->getName() . "\n");
                    
                    //Get the modifiedBy User instance of each currency
                    $modifiedBy = $currency->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("Currency ModifiedBy User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("Currency ModifiedBy User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    //Get the Id of each currency
                    echo("Currency Id: " . $currency->getId() . "\n");
                    
                    //Get the IsoCode of each currency
                    echo("Currency IsoCode: " .  $currency->getIsoCode() . "\n");
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
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}

	/**
	 * <h3> Add Currencies </h3>
	 * This method is used to add new currencies to your organization.
	 * @throws Exception
	 */
	public static function addCurrencies()
	{		
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Currency instances
		$currencies = array();
        
        $currencyClass = "com\zoho\crm\api\currencies\Currency";

		//Get instance of Currency Class
		$currency = new $currencyClass();
		
		//To set the position of the ISO code in the currency.
		//true: Display ISO code before the currency value.
		//false: Display ISO code after the currency value.
		$currency->setPrefixSymbol(true);
		
		//To set the name of the currency.
		$currency->setName("USD");
		
		//To set the ISO code of the currency.
		$currency->setIsoCode("USD");
		
		//To set the symbol of the currency.
		$currency->setSymbol("$");
		
		//To set the rate at which the currency has to be exchanged for home currency.
		$currency->setExchangeRate("20.000000000");
		
		//To set the status of the currency.
		//true: The currency is active.
		//false: The currency is inactive.
		$currency->setIsActive(true);
		
		$format = new Format();
		
		//It can be a Period or Comma, depending on the currency.
		$format->setDecimalSeparator(new Choice("Period"));
	      
		//It can be a Period, Comma, or Space, depending on the currency.
		$format->setThousandSeparator(new Choice("Comma"));
      
		//To set the number of decimal places allowed for the currency. It can be 0, 2, or 3.
		$format->setDecimalPlaces(new Choice("2"));
		
		//To set the format of the base currency
		$currency->setFormat($format);
		
		array_push($currencies, $currency);
		
		//Set the list to Currency in BodyWrapper instance
		$bodyWrapper->setCurrencies($currencies);
		
		//Call addCurrencies method that takes BodyWrapper instance as parameter 
		$response = $currenciesOperations->addCurrencies($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");

            //Get object from response
            $actionHandler = $response->getObject();

            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;

                //Get the list of obtained action responses
                $actionResponses = $actionWrapper->getCurrencies();
                
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
	 * <h3> Update Currencies </h3>
	 * This method is used to update currency details.
	 * @throws Exception
	 */
	public static function updateCurrencies()
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Currency instances
        $currencies = array();
        
        $currencyClass = "com\zoho\crm\api\currencies\Currency";
		
		//Get instance of Currency Class
		$currency = new $currencyClass();
		
		//To set the position of the ISO code in the currency.
		//true: Display ISO code before the currency value.
		//false: Display ISO code after the currency value.
		$currency->setPrefixSymbol(true);
		
		//To set currency Id
		$currency->setId("3477061000006040001");
		
		//To set the rate at which the currency has to be exchanged for home currency.
		$currency->setExchangeRate("5.0000000");
		
		//To set the status of the currency.
		//true: The currency is active.
		//false: The currency is inactive.
		$currency->setIsActive(true);
		
		$format = new Format();
		
		//It can be a Period or Comma, depending on the currency.
		$format->setDecimalSeparator(new Choice("Period"));
	      
		//It can be a Period, Comma, or Space, depending on the currency.
		$format->setThousandSeparator(new Choice("Comma"));
      
		//To set the number of decimal places allowed for the currency. It can be 0, 2, or 3.
		$format->setDecimalPlaces(new Choice("2"));
		
		//To set the format of the currency
		$currency->setFormat($format);
		
		array_push($currencies, $currency);
		
		//Set the list to Currency in BodyWrapper instance
		$bodyWrapper->setCurrencies($currencies);
		
		//Call updateCurrencies method that takes BodyWrapper instance as parameter 
		$response = $currenciesOperations->updateCurrencies($bodyWrapper);
		
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
                $actionResponses = $actionWrapper->getCurrencies();
                
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
                            echo($key . ": " . $value . "\n");
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
                        
                        if($exception->getDetails() != null)
                        {
                            echo("Details: " );
                        
                            //Get the details map
                            foreach($exception->getDetails() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . ": " . $value . "\n");
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
                    echo("Details: " );
                
                    //Get the details map
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
	
	/**
	 * <h3> Enable Multiple Currencies </h3>
	 * This method is used to enable multiple currencies for your organization.
	 * @throws Exception
	 */
	public static function enableMultipleCurrencies()
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Get instance of BaseCurrencyWrapper Class that will contain the request body
		$bodyWrapper = new BaseCurrencyWrapper();
        
        $currencyClass = "com\zoho\crm\api\currencies\Currency";
		
		//Get instance of Currency Class
        $currency = new $currencyClass();
        
		//To set the position of the ISO code in the base currency.
		//true: Display ISO code before the currency value.
		//false: Display ISO code after the currency value.
		$currency->setPrefixSymbol(true);
		
		//To set the name of the base currency.
		$currency->setName("Angolan Kwanza - AOA");
		
		//To set the ISO code of the base currency.
		$currency->setIsoCode("AOA");
		
		//To set the symbol of the base currency.
		$currency->setSymbol("Kz");
		
		//To set the rate at which the currency has to be exchanged for home base currency.
		$currency->setExchangeRate("1.0000000");
		
		//To set the status of the base currency.
		//true: The currency is active.
		//false: The currency is inactive.
		$currency->setIsActive(true);
		
		$format = new Format();
		
		//It can be a Period or Comma, depending on the base currency.
		$format->setDecimalSeparator(new Choice("Period"));
		
		//It can be a Period, Comma, or Space, depending on the base currency.  
		$format->setThousandSeparator(new Choice("Comma"));
      
		//To set the number of decimal places allowed for the base currency. It can be 0, 2, or 3.
		$format->setDecimalPlaces(new Choice("2"));
		
		//To set the format of the base currency
		$currency->setFormat($format);
		
		//Set the Currency in BodyWrapper instance
		$bodyWrapper->setBaseCurrency($currency);
		
		//Call enableMultipleCurrencies method that takes BodyWrapper instance as parameter 
		$response = $currenciesOperations->enableMultipleCurrencies($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");
			
			//Get object from response
            $baseCurrencyActionHandler = $response->getObject();
				
            if($baseCurrencyActionHandler instanceof BaseCurrencyActionWrapper)
            {
                //Get the received BaseCurrencyActionWrapper instance
                $baseCurrencyActionWrapper = $baseCurrencyActionHandler;
                
                //Get the received obtained ActionResponse instances
                $actionResponse = $baseCurrencyActionWrapper->getBaseCurrency();
                
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
                        echo($key . ": " . $value);
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
                    
                    if($exception->getDetails() != null)
                    {
                        echo("Details: " );
                    
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . ": " . $value);
                        }
                    }
                    
                    //Get the Message
                    echo("Message: " . $exception->getMessage()->getValue() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($baseCurrencyActionHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $baseCurrencyActionHandler;
                
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
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
	
	/**
	 * <h3> Update Currency </h3>
	 * This method is used to update base currency details.
	 * @throws Exception
	 */
	public static function updateBaseCurrency()
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Get instance of BaseCurrencyWrapper Class that will contain the request body
		$bodyWrapper = new BaseCurrencyWrapper();
		
		$currencyClass = "com\zoho\crm\api\currencies\Currency";
		
		//Get instance of Currency Class
        $currency = new $currencyClass();
		
		//To set the position of the ISO code in the base currency.
		//true: Display ISO code before the currency value.
		//false: Display ISO code after the currency value.
		$currency->setPrefixSymbol(true);
		
		//To set the symbol of the base currency.
		$currency->setSymbol("Af");
		
		//To set the rate at which the currency has to be exchanged for home base currency.
		$currency->setExchangeRate("1.0000000");
		
		//To set currency Id
		$currency->setId("3477061000006008002");
		
	    $format = new Format();
		
		//It can be a Period or Comma, depending on the base currency.
		$format->setDecimalSeparator(new Choice("Period"));
	      
		//It can be a Period, Comma, or Space, depending on the base currency.
		$format->setThousandSeparator(new Choice("Comma"));
      
		//To set the number of decimal places allowed for the base currency. It can be 0, 2, or 3.
		$format->setDecimalPlaces(new Choice("2"));
		
		//To set the format of the base currency
		$currency->setFormat($format);
		
		//Set the Currency in BodyWrapper instance
		$bodyWrapper->setBaseCurrency($currency);
		
		//Call enableMultipleCurrencies method that takes BodyWrapper instance as parameter 
		$response = $currenciesOperations->updateBaseCurrency($bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");
			
			//Get object from response
            $baseCurrencyActionHandler = $response->getObject();
				
            if($baseCurrencyActionHandler instanceof BaseCurrencyActionWrapper)
            {
                //Get the received BaseCurrencyActionWrapper instance
                $baseCurrencyActionWrapper = $baseCurrencyActionHandler;
                
                //Get the ActionResponse instance
                $actionResponse = $baseCurrencyActionWrapper->getBaseCurrency();
                
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
                        echo($key . ": " . $value . "\n");
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
                    
                    if($exception->getDetails() != null)
                    {
                        echo("Details: " );
                    
                        //Get the details map
                        foreach($exception->getDetails() as $key => $value)
                        {
                            //Get each value in the map
                            echo($key . ": " . $value . "\n");
                        }
                    }
                    
                    //Get the Message
                    echo("Message: " . $exception->getMessage()->getValue() . "\n");
                }
            }
            //Check if the request returned an exception
            else if($baseCurrencyActionHandler instanceof APIException)
            {
                //Get the received APIException instance
                $exception = $baseCurrencyActionHandler;
                
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
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
	
	/**
	 * <h3> Get Currency </h3>
	 * This method is used to get the details of a specific currency.
	 * @param currencyId - Specify the unique ID of the currency.
	 * @throws Exception
	 */
	public static function getCurrency(string $currencyId)
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Call getCurrency method 
		$response = $currenciesOperations->getCurrency($currencyId);
		
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
                $responseWrapper = $responseHandler;
                
                //Get the obtained Currency instance
                $currenciesList = $responseWrapper->getCurrencies();
                
                foreach($currenciesList as $currency)
                {	
                    //Get the Symbol of each currency
                    echo("Currency Symbol: " . $currency->getSymbol() . "\n");
                    
                    //Get the CreatedTime of each currency
                    echo("Currency CreatedTime: ");

                    print_r($currency->getCreatedTime());

                    echo("\n");
                    
                    //Get the currency is IsActive
                    echo("Currency IsActive: " . $currency->getIsActive() . "\n");
                    
                    //Get the ExchangeRate of each currency
                    echo("Currency ExchangeRate: " . $currency->getExchangeRate() . "\n");
                    
                    //Get the format Format instance of each currency
                    $format = $currency->getFormat();
                    
                    //Check if format is not null
                    if($format != null)
                    {
                        //Get the DecimalSeparator of the Format
                        echo("Currency Format DecimalSeparator: " . $format->getDecimalSeparator()->getValue() . "\n");
                        
                        //Get the ThousandSeparator of the Format
                        echo("Currency Format ThousandSeparator: " . $format->getThousandSeparator()->getValue() . "\n");
                        
                        //Get the DecimalPlaces of the Format
                        echo("Currency Format DecimalPlaces: " . $format->getDecimalPlaces()->getValue() . "\n");
                    }
                    
                    //Get the createdBy User instance of each currency
                    $createdBy = $currency->getCreatedBy();
                    
                    //Check if createdBy is not null
                    if($createdBy != null)
                    {
                        //Get the Name of the createdBy User
                        echo("Currency CreatedBy User-Name: " . $createdBy->getName() . "\n");
                        
                        //Get the ID of the createdBy User
                        echo("Currency CreatedBy User-ID: " . $createdBy->getId() . "\n");
                    }
                    
                    //Get the PrefixSymbol of each currency
                    echo("Currency PrefixSymbol: " . $currency->getPrefixSymbol() . "\n");
                    
                    //Get the IsBase of each currency
                    echo("Currency IsBase: " . $currency->getIsBase() . "\n");
                    
                    //Get the ModifiedTime of each currency
                    echo("Currency ModifiedTime: ");

                    print_r($currency->getModifiedTime());

                    echo("\n");
                    
                    //Get the Name of each currency
                    echo("Currency Name: " . $currency->getName() . "\n");
                    
                    //Get the modifiedBy User instance of each currency
                    $modifiedBy = $currency->getModifiedBy();
                    
                    //Check if modifiedBy is not null
                    if($modifiedBy != null)
                    {
                        //Get the Name of the modifiedBy User
                        echo("Currency ModifiedBy User-Name: " . $modifiedBy->getName() . "\n");
                        
                        //Get the ID of the modifiedBy User
                        echo("Currency ModifiedBy User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    //Get the Id of each currency
                    echo("Currency Id: " . $currency->getId() . "\n");
                    
                    //Get the IsoCode of each currency
                    echo("Currency IsoCode: " . $currency->getIsoCode() . "\n");
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
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
	
	/**
	 * <h3> Update Currency </h3>
	 * This method is used to update currency details.
	 * @param currencyId - Specify the unique ID of the currency.
	 * @throws Exception
	 */
	public static function updateCurrency(string $currencyId)
	{
		//Get instance of CurrenciesOperations Class
		$currenciesOperations = new CurrenciesOperations();
		
		//Get instance of BodyWrapper Class that will contain the request body
		$bodyWrapper = new BodyWrapper();
		
		//List of Currency instances
		$currencies = array();
		
		$currencyClass = "com\zoho\crm\api\currencies\Currency";
		
		//Get instance of Currency Class
        $currency = new $currencyClass();
		
		//To set the position of the ISO code in the currency.
		//true: Display ISO code before the currency value.
		//false: Display ISO code after the currency value.
		$currency->setPrefixSymbol(true);
		
		//To set the rate at which the currency has to be exchanged for home currency.
		$currency->setExchangeRate("5.0000000");
		
		//To set the status of the currency.
		//true: The currency is active.
		//false: The currency is inactive.
		$currency->setIsActive(true);
		
		$format = new Format();
		
		//It can be a Period or Comma, depending on the currency.
		$format->setDecimalSeparator(new Choice("Period"));
	      
		//It can be a Period, Comma, or Space, depending on the currency.
		$format->setThousandSeparator(new Choice("Comma"));
      
		//To set the number of decimal places allowed for the currency. It can be 0, 2, or 3.
		$format->setDecimalPlaces(new Choice("2"));
		
		//To set the format of the currency
		$currency->setFormat($format);
		
		array_push($currencies, $currency);
		
		//Set the list to Currency in BodyWrapper instance
		$bodyWrapper->setCurrencies($currencies);
		
		//Call addCurrencies method that takes BodyWrapper instance as parameter 
		$response = $currenciesOperations->updateCurrency($currencyId,$bodyWrapper);
		
		if($response != null)
		{
			//Get the status code from response
            echo("Status code" . $response->getStatusCode() . "\n");
			
			//Get object from response
            $actionHandler = $response->getObject();
            
            if($actionHandler instanceof ActionWrapper)
            {
                //Get the received ActionWrapper instance
                $actionWrapper = $actionHandler;
                
                //Get the list of obtained ActionResponse instances
                $actionResponses = $actionWrapper->getCurrencies();
                
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
                            echo($key . ": " . $value . "\n");
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
                        
                        if($exception->getDetails() != null)
                        {
                            echo("Details: " );
                        
                            //Get the details map
                            foreach($exception->getDetails() as $key => $value)
                            {
                                //Get each value in the map
                                echo($key . ": " . $value . "\n");
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
                    echo("Details: " );
                
                    //Get the details map
                    foreach($exception->getDetails() as $key => $value)
                    {
                        //Get each value in the map
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                //Get the Message
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
		}
	}
}