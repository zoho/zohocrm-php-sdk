<?php
namespace com\zoho\crm\api\dc;

/**
 * The abstract class represents the properties of Zoho CRM DataCenter.
 */
abstract class DataCenter
{
    /**
     *  This method to get accounts URL. URL to be used when calling an OAuth accounts.
     * @return string A string representing the accounts URL.
     */
    public abstract function getIAMUrl();

    /**
     * This method to get File Upload URL.
     * @return string A string representing the File Upload URL.
     */
    public abstract function getFileUploadUrl();
    
    public static function setEnvironment($url, $accountUrl, $fileUploadUrl)
    {
        return new Environment($url, $accountUrl, $fileUploadUrl); 
    }
}

/**
 * The abstract class represents the properties of Zoho CRM Environment.
 */
class Environment
{
    public $url = null;
    
    public $accountUrl = null;

    public $fileUploadUrl = null;
    
    public function __construct($url, $accountUrl, $fileUploadUrl)
    {
        $this->url = $url;

        $this->accountUrl = $accountUrl;

        $this->fileUploadUrl = $fileUploadUrl;
    }
    /**
     * This method to get Zoho CRM API URL.
     * @return string A string representing the Zoho CRM API URL.
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * This method to get Zoho CRM Accounts URL.
     * @return string A string representing the accounts URL.
     */
    public function getAccountsUrl()
    {
        return $this->accountUrl;
    }

    /**
     * This method to get File Upload URL.
     * @return string A string representing the File Upload URL.
     */
    public function getFileUploadUrl()
    {
        return $this->fileUploadUrl;
    }
}