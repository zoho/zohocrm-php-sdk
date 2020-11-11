<?php
namespace com\zoho\crm\api\dc;

use com\zoho\crm\api\dc\DataCenter;

/**
 * This class represents the properties of Zoho CRM in CN Domain.
 */
class CNDataCenter extends DataCenter
{
    private static $PRODUCTION = null;
    
    private static $SANDBOX = null;
    
    private static $DEVELOPER = null;
    
    private static $CN = null;
    
    /**
     * This Environment class instance represents the Zoho CRM Production Environment in CN Domain.
     * @return Environment A Environment class instance.
     */
    public static function PRODUCTION()
    {
        self::$CN = new CNDataCenter();
        
        if (CNDataCenter::$PRODUCTION == null)
        {
            CNDataCenter::$PRODUCTION = DataCenter::setEnvironment("https://www.zohoapis.com.cn", self::$CN->getIAMUrl(), self::$CN->getFileUploadUrl());
        }
        
        return CNDataCenter::$PRODUCTION;
    }

    /**
     * This Environment class instance represents the Zoho CRM Sandbox Environment in CN Domain.
     * @return Environment A Environment class instance.
     */
    public static function SANDBOX()
    {
        self::$CN = new CNDataCenter();
        
        if (CNDataCenter::$SANDBOX == null)
        {
            CNDataCenter::$SANDBOX = DataCenter::setEnvironment("https://sandbox.zohoapis.com.cn", self::$CN->getIAMUrl(), self::$CN->getFileUploadUrl());
        }
        
        return CNDataCenter::$SANDBOX;
    }

    /**
     * This Environment class instance represents the Zoho CRM Developer Environment in CN Domain.
     * @return Environment A Environment class instance.
     */
    public static function DEVELOPER()
    {
        self::$CN = new CNDataCenter();
        
        if (CNDataCenter::$DEVELOPER == null)
        {
            CNDataCenter::$DEVELOPER = DataCenter::setEnvironment("https://developer.zohoapis.com.cn", self::$CN->getIAMUrl(), self::$CN->getFileUploadUrl());
        }
        
        return CNDataCenter::$DEVELOPER;
    }

    public function getIAMUrl()
    {
        return "https://accounts.zoho.com.cn/oauth/v2/token";
    }

    public function getFileUploadUrl()
    {
        return "https://content.zohoapis.com.cn";
    }
}