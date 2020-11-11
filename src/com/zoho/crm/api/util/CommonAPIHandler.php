<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\HeaderMap;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\ParameterMap;

use com\zoho\crm\api\Header;

use com\zoho\crm\api\Param;

use Exception;

use com\zoho\api\logger\SDKLogger;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\util\APIHTTPConnector;

use com\zoho\crm\api\util\Constants;

use com\zoho\crm\api\util\JSONConverter;

use com\zoho\crm\api\util\Downloader;

use com\zoho\crm\api\util\FormDataConverter;

use com\zoho\crm\api\util\XMLConverter;

use com\zoho\crm\api\util\APIResponse;

/**
 * This class is to process the API request and its response.
 * Construct the objects that are to be sent as parameters or in the request body with the API.
 * The Request parameter, header and body objects are constructed here.
 * Process the response JSON and converts it to relevant objects in the library.
 */
class CommonAPIHandler
{
    private $apiPath;

    private $param;

    private $header;

    private $request;

    private $httpMethod;

    private $moduleAPIName;

    private $contentType;

    private $categoryMethod;

	private $mandatoryChecker;

    public function __construct()
    {
        $this->header = new HeaderMap();

        $this->param = new ParameterMap();
    }
    
    /**
     * This is a setter method to set an API request content type.
     * @param string $contentType A string containing the API request content type.
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * This is a setter method to set the API request URL.
     * @param string $apiPath A string containing the API request URL.
     */
    public function setAPIPath($apiPath)
    {
        $this->apiPath = $apiPath;
    }
    

    public function getAPIPath()
    {
        return $this->apiPath ;
    }

    /**
     * This method is to add an API request parameter.
     * @param string $param A Param containing the API request parameter .
     * @param object $paramValue A object containing the API request parameter value.
     */
    public function addParam($paramInstane, $paramValue)
    {
        if ($paramValue === null)
        {
            return;
        }

        if ($this->param === null)
        {
            $this->param = new ParameterMap();
        }

        $this->param->add($paramInstane, $paramValue);
    }
    
    /**
     * This method to add an API request header.
     * @param string $header A Header containing the API request header .
     * @param string $headerValue A object containing the API request header value.
     */
    public function addHeader($headerInstane, $headerValue)
    {
        if ($headerValue === null)
        {
            return;
        }
        
        if ($this->header === null)
        {
            $this->header = new HeaderMap();
        }

        $this->header->add($headerInstane, $headerValue);
    }
    
    /**
     * This is a setter method to set the API request parameter map.
     * @param ParameterMap $param A ParameterMap class instance containing the API request parameter.
     */
    public function setParam($param)
    {
        if ($param === null)
        {
            return;
        }

        if($this->param->getParameterMap()!==null && count($this->param->getParameterMap())>0)
        {
            $this->param->setParameterMap(array_merge($this->param->getParameterMap(), $param->getParameterMap()));
        }
        else
        {
            $this->param = $param;
        }
    }

    /**
     * This is a getter method to get the Zoho CRM module API name.
     * @return string A String representing the Zoho CRM module API name.
     */
    public function getModuleAPIName()
    {
        return $this->moduleAPIName;
    }
    
    /**
     * This is a setter method to set the Zoho CRM module API name.
     * @param string $moduleAPIName A string containing the Zoho CRM module API name.
     */
    public function setModuleAPIName($moduleAPIName)
    {
        $this->moduleAPIName = $moduleAPIName;
    }
    
    /**
     * This is a setter method to set the API request header map.
     * @param HeaderMap $header A HeaderMap class instance containing the API request header.
     */
    public function setHeader($header)
    {
        if ($header === null)
        {
            return;
        }

        if($this->header->getHeaderMap()!== null && count($this->header->getHeaderMap())>0)
        {
            $this->header->setHeaderMap(array_merge($this->header->getHeaderMap(), $header->getHeaderMap()));
        }
        else
        {
            $this->header = $header;
        }   
    }

    /**
     * This is a setter method to set the API request body object.
     * @param object $request A object containing the API request body object.
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
    
    /**
     * This is a setter method to set the HTTP API request method.
     * @param string $httpMethod A string containing the HTTP API request method.
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * This method is used in constructing API request and response details. To make the Zoho CRM API calls.
     * @param string $className A string containing the method return type.
     * @param string $encodeType A String containing the expected API response content type. 
     * @return \com\zoho\crm\api\util\APIResponse A APIResponse representing the Zoho CRM API response instance or null. 
     */
    public function apiCall($className, $encodeType)
    {
        if(Initializer::getInitializer() === null)
        {
            throw new SDKException(Constants::SDK_UNINITIALIZATION_ERROR,Constants::SDK_UNINITIALIZATION_MESSAGE);
        }
        
        $connector = new APIHTTPConnector();

        try
        {
            $this->setAPIUrl($connector);
        }
        catch(SDKException $e)
        {
            SDKLogger::severeError(Constants::SET_API_URL_EXCEPTION, $ex);
                    
            throw $e;
        }
        catch (\Exception $e)
        {
            $exception = new SDKException(null, null, null, $e);
            
            SDKLogger::severeError(Constants::SET_API_URL_EXCEPTION, $exception);
                        
            throw $exception;
        }
        
        $connector->setRequestMethod($this->httpMethod);

        $connector->setContentType($this->contentType);
        
        if ($this->header != null && count($this->header->getHeaderMap()) > 0)
        {
            $connector->setHeaders($this->header->getHeaderMap());
        }
       
        if ($this->param != null && count($this->param->getParameterMap()) > 0)
        {
            $connector->setParams($this->param->getParameterMap());
        }
        
        try
        {
            Initializer::getInitializer()->getToken()->authenticate($connector);
        }
        catch (SDKException $e)
		{
		    SDKLogger::severeError(Constants::AUTHENTICATION_EXCEPTION, $e);
                    
		    throw $e;
        }
        catch (\Exception $e)
        {
            $exception = new SDKException(null, null, null, $e);
            
            SDKLogger::severeError(Constants::AUTHENTICATION_EXCEPTION, $exception);
            
            throw $exception;
        }
        
        $convertInstance = null;
       
        if ($this->contentType != null && (strtolower($this->httpMethod) == strtolower(Constants::REQUEST_METHOD_POST) || strtolower($this->httpMethod) == strtolower(Constants::REQUEST_METHOD_PUT) || strtolower($this->httpMethod) == strtolower(Constants::REQUEST_METHOD_PATCH))) 
        {
            $requestObject = null;

            try
            {
                $convertInstance = $this->getConverterClassInstance(strtolower($this->contentType));

                $requestObject = $convertInstance->formRequest($this->request, get_class($this->request), null,null);
            }
            catch (SDKException $e)
			{
			    SDKLogger::severeError(Constants::FORM_REQUEST_EXCEPTION, $e);
				
				throw $e;
            }
            catch (\Exception $e)
            {
                $exception = new SDKException(null,null,null,$e);
                
                SDKLogger::severeError(Constants::FORM_REQUEST_EXCEPTION, $exception);
                
                throw $exception;
            }
            
            $connector->setRequestBody($requestObject);
        }

        try
        {
            $connector->addHeader(Constants::ZOHO_SDK, php_uname('s') . "/" . php_uname('r') . " php/" . phpversion() . ":" . Constants::SDK_VERSION);
        
            $response = $connector->fireRequest($convertInstance);
    
            $statusCode = $response[Constants::HTTP_CODE];
    
            $headerMap = $response[Constants::HEADERS];
            
            $isModel = false;
    
            $returnObject  = null;

            if(array_key_exists(Constants::CONTENT_TYPE, $headerMap) && !array_key_exists(Constants::ERROR, $response))
            {
                $responseContentType = $headerMap[Constants::CONTENT_TYPE];

                if (strpos($responseContentType, ';') != false)
                {
                    $splitArray = explode(';', $responseContentType);
        
                    $responseContentType = $splitArray[0];
                }

                $converterInstance = $this->getConverterClassInstance(strtolower($responseContentType));
            
                $returnObject = $converterInstance->getWrappedResponse($response[Constants::RESPONSE], $className);

                if ($returnObject !== null)
                {
                    if ($className == get_class($returnObject) || $this->isExpectedType($returnObject, $className))
                    {
                        $isModel = true;
                    }
                }
            }
            else
            {
                if(array_key_exists(Constants::ERROR, $response))
                {
                    SDKLogger::severeError(Constants::API_ERROR_RESPONSE . $response[Constants::ERROR], null);
                }
                else
                {
                    SDKLogger::severeError(Constants::API_ERROR_RESPONSE . json_encode($response, JSON_UNESCAPED_UNICODE), null);
                }
            }
            
            return new APIResponse($headerMap, $statusCode, $returnObject, $isModel);
        }
        catch (SDKException $e)
		{
		    SDKLogger::severeError(Constants::API_CALL_EXCEPTION , $e);
		    throw $e;
        }
        catch (\Exception $e)
        {
            $exception = new SDKException(null, null, null, $e);

            SDKLogger::severeError(Constants::API_CALL_EXCEPTION, $exception);

            throw $exception;
        }
        
        return null;
    }

    private function isExpectedType(Model $model, string $className)
    {
        $implementsArray = class_implements($model);

        foreach($implementsArray as $class)
        {
            if($class === $className)
            {
                return true;
            }
        }

        return false;
    }
    
    /**
     * This method is used to get a Converter class instance.
     * @param string $encodeType A string containing the API response content type.
     * @return NULL|\com\zoho\crm\api\util\Converter A Converter class instance.
     */
    public function getConverterClassInstance($encodeType)
    {
        switch ($encodeType) 
        {
            case "application/json":
            case "text/plain":
                return new JSONConverter($this);
            case "application/xml":
            case "text/xml":
                return new XMLConverter($this);
            case "multipart/form-data":
                return new FormDataConverter($this);
            case "application/x-download":
            case "image/png":
            case "image/jpeg":
            case "application/zip":
            case "image/gif":
            case "text/csv":
            case "image/tiff":
            case "application/octet-stream":
            case "text/html":
                return new Downloader($this);
        }

        return null;
    }

    private function setAPIUrl(APIHTTPConnector $connector)
    {
        $APIPath = "";

        if(strpos($this->apiPath, Constants::HTTP) !== false)
        {
            if(strpos($this->apiPath, Constants::CONTENT_API_URL) != false)
            {
                $APIPath = $APIPath . (Initializer::getInitializer()->getEnvironment()->getFileUploadUrl());
                
                try 
                {
                    $uri = parse_url($this->apiPath);
                    
                    $APIPath = $APIPath . ($uri['path']);
                } 
                catch (\Exception $ex) 
                {
                    $excp = new SDKException(null, null, null, $ex);

                    SDKLogger::severeError(Constants::INVALID_URL_ERROR, $excp);
                    
                    throw $excp;
                }
            }
            else 
            {
                if(substr($this->apiPath, 0, 1) == "/")
                {
                    $this->apiPath = substr($this->apiPath, 1);
                }

                $APIPath = $APIPath . ($this->apiPath);
            }
        }
        else
        {
            $APIPath = $APIPath . (Initializer::getInitializer()->getEnvironment()->getUrl());
            
            $APIPath = $APIPath . ($this->apiPath);
        }
        
        $connector->setUrl($APIPath);
    }

    public function isMandatoryChecker()
	{
		return $this->mandatoryChecker;
	}

	public function setMandatoryChecker($mandatoryChecker)
	{
		$this->mandatoryChecker = $mandatoryChecker;
	}

	public function getHttpMethod()
	{
		return $this->httpMethod;
	}

	public function getCategoryMethod()
	{
		return $this->categoryMethod;
	}

	public function setCategoryMethod($category)
	{
		$this->categoryMethod = $category;
	}
}
?>