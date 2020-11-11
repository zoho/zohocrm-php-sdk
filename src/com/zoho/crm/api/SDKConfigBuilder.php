<?php
namespace com\zoho\crm\api;

/**
 * The Builder class to build SDKConfig
 */
class SDKConfigBuilder
{
    private $autoRefreshFields;

    private $pickListValidation;

    public function __Construct()
    {
        $this->autoRefreshFields = false;

        $this->pickListValidation = true;
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
     * The method to build the SDKConfig instance
     * @returns An instance of SDKConfig
     */
    public function build()
    {
        return new \com\zoho\crm\api\sdkconfigbuilder\SDKConfig($this->autoRefreshFields, $this->pickListValidation);
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

    /**
     * Creates an instance of SDKConfig with the given parameters
     * @param autoRefreshFields - A boolean representing autoRefreshFields
     * @param pickListValidation - A boolean representing pickListValidation
     */
    public function __Construct(bool $autoRefreshFields, bool $pickListValidation)
    {
        $this->autoRefreshFields = $autoRefreshFields;

        $this->pickListValidation = $pickListValidation;
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
}
?>