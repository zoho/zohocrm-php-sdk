<?php
namespace com\zoho\crm\api\util;

/**
 * This class is the common API response object.
 */
class APIResponse
{
    private $headers;

    private $statusCode;

    private $object;
    
    private $isExpected;
    
    /**
     * Creates an APIResponse class instance with the specified parameters.
     * @param array $headers A array containing the API response headers.
     * @param string $status_code A string containing the API response HTTP status code.
     * @param object $object A object containing the API response POJO class instance.
     */
    public function __construct($headers, $statusCode, $object ,$expectedType)
    {
        $this->headers = $headers;

        $this->statusCode = $statusCode;
    
        $this->object = $object;
        
        $this->isExpected = $expectedType;
    }

    /**
     * This is a getter method to get API response headers.
     * @return array A array representing the API response headers.
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * This is a getter method to get the API response HTTP status code.
     * @return string A string representing the API response HTTP status code.
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     * This method to get an API response POJO class instance.
     * @return object A POJO class instance.
     */
    public function getObject()
    {
        return $this->object;
    }
    
    /**
     * This is a getter method to get an API response instance that is the expected type or not.
     * @return Boolean representing the instance is expected type or not.
     */
    public function isExpected()
    {
        return $this->isExpected;
    }
}