<?php
namespace com\zoho\crm\api;

/**
 * The Builder class to build SDKConfig
 */
class SDKConfigBuilder
{
    private $autoRefreshFields;

    private $pickListValidation;

    private $enableSSLVerification;

    public function __Construct()
    {
        $this->autoRefreshFields = false;

        $this->pickListValidation = true;

        $this->enableSSLVerification = true;
    }

    /**
     * This is a setter method to set autoRefreshFields.
     * @param autoRefreshFields
     */
    public function setAutoRefreshFields(bool $autoRefreshFields)
    {
        $this->autoRefreshFields = $autoRefreshFields;

        return $this;
    }

    /**
     * This is a setter method to set pickListValidation.
     * @param pickListValidation
     */
    public function setPickListValidation(bool $pickListValidation)
    {
        $this->pickListValidation = $pickListValidation;

        return $this;
    }

    /**
     * This is a setter method to set enableSSLVerification.
     * @param enableSSLVerification
     */
    public function setSSLVerification(bool $enableSSLVerification)
    {
        $this->enableSSLVerification = $enableSSLVerification;

        return $this;
    }

    /**
     * The method to build the SDKConfig instance
     * @returns An instance of SDKConfig
     */
    public function build()
    {
        return new \com\zoho\crm\api\sdkconfigbuilder\SDKConfig($this->autoRefreshFields, $this->pickListValidation, $this->enableSSLVerification);
    }
}

namespace com\zoho\crm\api\sdkconfigbuilder;

/**
 * The class to configure the SDK.
 */
class SDKConfig
{
    private $autoRefreshFields;

    private $pickListValidation;

    private $enableSSLVerification;

    /**
     * Creates an instance of SDKConfig with the given parameters
     * @param autoRefreshFields - A boolean representing autoRefreshFields
     * @param pickListValidation - A boolean representing pickListValidation
     * @param enableSSLVerification - A boolean representing enableSSLVerification
     */
    public function __Construct(bool $autoRefreshFields, bool $pickListValidation, bool $enableSSLVerification)
    {
        $this->autoRefreshFields = $autoRefreshFields;

        $this->pickListValidation = $pickListValidation;

        $this->enableSSLVerification = $enableSSLVerification;
    }

    /**
     * This is a getter method to get autoRefreshFields.
     * @return A boolean representing autoRefreshFields
     */
    public function getAutoRefreshFields()
    {
        return $this->autoRefreshFields;
    }

    /**
     * This is a getter method to get pickListValidation.
     * @return A boolean representing pickListValidation
     */
    public function getPickListValidation()
    {
        return $this->pickListValidation;
    }

    /**
     * This is a getter method to get enableSSLVerification.
     * @return A boolean representing enableSSLVerification
     */
    public function isSSLVerificationEnabled()
    {
        return $this->enableSSLVerification;
    }
}
?>