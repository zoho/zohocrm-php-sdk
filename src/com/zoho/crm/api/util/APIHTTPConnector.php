<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\util\Constants;

use com\zoho\api\logger\SDKLogger;

/**
 * This module is to make HTTP connections, trigger the requests and receive the response
 */
class APIHTTPConnector
{
    private $url = null;

    private $requestMethod;

    private $headers = array();

    private $parameters = array();

    private $requestBody;

    private $contentType;

    /**
	 * This is a getter method to get the ContentType.
	 * @return string representing the ContentType.
	 */
	public function getContentType()
	{
		$this->contentType;
	}

	/**
	 * This is a setter method to set the ContentType.
	 * @param string $contentType A String containing the ContentType.
	 */
	public function setContentType($contentType)
	{
		$this->contentType = $contentType;
	}
    
    /**
     * This is a setter method to set the API URL.
     * @param string $url A string containing the API Request URL.
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * This is a setter method to set the API request method.
     * @param string $httpMethod A string containing the API request method.
     */
    public function setRequestMethod($httpMethod)
    {
        $this->requestMethod = $httpMethod;
    }
    
    /**
     * This is a getter method to get API request headers.
     * @return array A array representing the API request headers.
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * This is a setter method to set API request headers.
     * @param array $headers A array containing the API request headers.
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }
    
    /**
     * This method to add API request header name and value.
     * @param string $headerName A string containing the API request header name.
     * @param string $headerValue A string containing the API request header value.
     */
    public function addHeader($headerName, $headerValue)
    {
        $this->headers[$headerName] = $headerValue;
    }
    
    /**
     * This is a getter method to get API request parameters.
     * @return array A array representing the API request parameters.
     */
    public function getParams()
    {
        return $this->parameters;
    }
    
    /**
     * This is a setter method to set API request parameters.
     * @param array $params A array containing the API request parameters.
     */
    public function setParams($params)
    {
        $this->parameters = $params;
    }
    
    /**
     * This method to add API request param name and value.
     * @param string $paramName A string containing the API request param name.
     * @param string $paramValue A string containing the API request param value.
     */
    public function addParam($paramName, $paramValue)
    {
        $this->parameters[$paramName] = $paramValue;
    }
    
    /**
     * This is a setter method to set the API request body.
     * @param object $requestBody A Object containing the API request body.
     */
    public function setRequestBody($requestBody)
    {
        $this->requestBody = $requestBody;
    }
    
    /**
     * This method makes a Zoho CRM Rest API requests
     * @param Converter $converterInstance A Converter class instance to call appendToRequest method.
     * @return array| null A array representing the API response.
     */
    public function fireRequest($converterInstance)
    {
        $curl_pointer = curl_init();
        
        $curl_options = array();

        if (is_array($this->getParams()) && count($this->getParams()) > 0)
        {
            $this->setQueryParams();
        }

        $curl_options[CURLOPT_URL] = $this->url;

        if($this->isSetContentType() == true)
        {
            $this->addHeader(Constants::CONTENT_TYPE, $this->contentType);
        }
        
        $curl_options[CURLOPT_RETURNTRANSFER] = true;
        
        $curl_options[CURLOPT_HEADER] = 1;
        
        $requestProxy = Initializer::getInitializer()->getRequestProxy();
        
        if ($requestProxy!=null)
        {
            $proxyHost = $requestProxy->getHost();
        
            $proxyPort = strval($requestProxy->getPort());
        
            $proxyUser = $requestProxy->getUser();
        
            $proxyPassword = $requestProxy->getPassword();
        
            $curl_options[CURLOPT_PROXY] = $proxyHost;
        
            $curl_options[CURLOPT_PROXYPORT] = $proxyPort;
            
            $userPass = "";

            if ($proxyUser!=null)
            {
                $userPass = $proxyUser;

                if($proxyPassword!=null)
                {
                    $userPass = $userPass.(":").($proxyPassword);
                }

                $curl_options[CURLOPT_PROXYUSERPWD] = $userPass;
            }

            SDKLogger::info($this->proxyLog($requestProxy));
        }
        
        $this->getRequestObject($curl_options);

        if ($this->requestBody != null)
        {
            $converterInstance->appendToRequest($curl_options, $this->requestBody);
        }

        $this->setQueryHeaders($curl_options);
        
        curl_setopt_array($curl_pointer, $curl_options);
        
        SDKLogger::info($this->toString());

        $response = array();

        $response[Constants::RESPONSE] = curl_exec($curl_pointer);

        if (curl_errno($curl_pointer)) 
        {
            $response[Constants::ERROR] = curl_error($curl_pointer);
        }
        
        $response[Constants::HTTP_CODE] = curl_getinfo($curl_pointer)[Constants::HTTP_CODE];

        $header_size = curl_getinfo($curl_pointer, CURLINFO_HEADER_SIZE);

        $headers = substr($response[Constants::RESPONSE], 0, $header_size);

        curl_close($curl_pointer);

        $headers = explode("\r\n", $headers);

        $headers = array_filter($headers);

        $headersArray = array();
        
        foreach($headers as $key => $value)
        {
            array_push($headersArray, preg_split('/:\s{1,}/', $value, 2));
        }
        
        $tmp = [];
        
        foreach($headersArray as $h)
        {
            $tmp[strtolower($h[0])] = isset($h[1]) ? $h[1] : $h[0];
        }
        
        $headersArray = $tmp; $tmp = null;
        
        $response[Constants::HEADERS] = $headersArray;

        return $response;
    }

    private function getRequestObject(&$curl_options)
    {
        switch ($this->requestMethod)
        {
            case Constants::REQUEST_METHOD_GET:

                $curl_options[CURLOPT_CUSTOMREQUEST] = Constants::REQUEST_METHOD_GET;

                break;
            case Constants::REQUEST_METHOD_DELETE:

                $curl_options[CURLOPT_CUSTOMREQUEST] = Constants::REQUEST_METHOD_DELETE;

                break;
            case Constants::REQUEST_METHOD_POST:

                $curl_options[CURLOPT_CUSTOMREQUEST] = Constants::REQUEST_METHOD_POST;

                $curl_options[CURLOPT_POST] = true;

                break;
            case Constants::REQUEST_METHOD_PUT:

                $curl_options[CURLOPT_CUSTOMREQUEST] = Constants::REQUEST_METHOD_PUT;
                break;
            case Constants::REQUEST_METHOD_PATCH:
                
                $curl_options[CURLOPT_CUSTOMREQUEST] = Constants::REQUEST_METHOD_PATCH;
        }
    }

    private function setQueryHeaders(&$request)
    {
        $headersArray = array();
        
        if (array_key_exists(CURLOPT_HTTPHEADER, $request))
        {
            $headersArray = $request[CURLOPT_HTTPHEADER];
        }

        $headersMap = $this->headers;

        if ($headersMap != null)
        {
            foreach ($headersMap as $key => $value)
            {
                $headersArray[] = $key . ":" . $value;
            }
        }
        
        $request[CURLOPT_HTTPHEADER] = $headersArray;
    }
    
    private function setQueryParams()
    {
        $params_as_string = "";
        
        foreach ($this->parameters as $key => $value)
        {
            $params_as_string = $params_as_string . $key . "=" . urlencode($value) . "&";
        }
        
        $params_as_string = rtrim($params_as_string, "&");
        
        $params_as_string = str_replace(PHP_EOL, '', $params_as_string);
        
        $this->url = $this->url . "?" . $params_as_string;
    }

    private function isSetContentType()
	{
		foreach(Constants::SET_TO_CONTENT_TYPE as $contentType)
		{
			if(strpos($this->url, $contentType) == true)
			{
				return true;
			}
		}
		
		return false;
    }
    
    public function toString()
	{
		$reqHeaders = $this->headers;
		
		$reqHeaders[Constants::AUTHORIZATION] = Constants::CANT_DISCLOSE;
		
		return $this->requestMethod . " - " . Constants::URL . " = ". $this->url . " , " . Constants::HEADERS . " = ". json_encode($reqHeaders, JSON_UNESCAPED_UNICODE) . " , " . Constants::PARAMS . " = " . json_encode($this->parameters, JSON_UNESCAPED_UNICODE) . "." ;
    }
    
    public function proxyLog($requestProxy)
    {
	    $proxyDetails = Constants::PROXY_SETTINGS.Constants::PROXY_HOST.$requestProxy->getHost()." , ".Constants::PROXY_PORT.strval($requestProxy->getPort());
	    
        if ($requestProxy->getUser() != null)
        {
	        $proxyDetails = $proxyDetails . " , " . Constants::PROXY_USER . $requestProxy->getUser();
        }
        
	    return $proxyDetails;
	}
}
