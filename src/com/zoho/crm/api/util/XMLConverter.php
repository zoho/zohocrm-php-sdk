<?php
namespace com\zoho\crm\api\util;

/**
 * This class processes the API response object to the POJO object and POJO object to an XML object.
 */
class XMLConverter extends Converter
{
    public function __construct($commonAPIHandler)
    {
        parent::__construct($commonAPIHandler);
    }

    public function formRequest($requestObject, $pack, $instanceNumber, $memberDetail=null)
    {
        return NULL;
    }

    public function appendToRequest(&$requestBase, $requestObject)
    {
        return NULL;
    }
    
    public function getWrappedResponse($responseObject, $pack)
    {
        return NULL;
    }

    public function getResponse($response, $pack)
    {
        return NULL;
    }
}