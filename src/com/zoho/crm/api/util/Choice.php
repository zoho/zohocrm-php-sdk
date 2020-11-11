<?php
namespace com\zoho\crm\api\util;

class Choice
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}