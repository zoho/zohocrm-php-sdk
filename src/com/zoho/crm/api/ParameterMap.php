<?php
namespace com\zoho\crm\api;

use com\zoho\crm\api\util\Constants;
use com\zoho\crm\api\util\HeaderParamValidator;
use com\zoho\crm\api\exception\SDKException;
use com\zoho\crm\api\util\DataTypeConverter;

/**
 * This class representing the HTTP parameter name and value.
 */
class ParameterMap
{
    private $parameterMap = array();
    
    /**
     * This is a getter method to get parameter map.
     * @return array An array representing the API request parameters.
     */
    public function getParameterMap()
    {
        return $this->parameterMap;
    }

    /**
     * This is a setter method to set parameter map.
     * @param array An array representing the API request parameters.
     */
    public function setParameterMap(array $parameterMap)
    {
        $this->parameterMap = $parameterMap;
    }
    
    /**
     * This method to add parameter name and value.
     * @param Param $param A Param class instance.
     * @param object $value A object containing the parameter value.
     */
    public function add(Param $param, $value) 
    {
        if($param === null)
        {
            throw new SDKException(Constants::HEADER_NULL_ERROR, Constants::HEADER_INSTANCE_NULL_ERROR);
        }

        $paramName = $param->getName();
        
        if($paramName === null)
        {
            throw new SDKException(Constants::HEADER_NAME_NULL_ERROR, Constants::HEADER_NAME_NULL_ERROR_MESSAGE);
        }
        
        if($value === null)
        {
            throw new SDKException(Constants::HEADER_NULL_ERROR,$paramName.Constants::NULL_VALUE_ERROR_MESSAGE);
        }

        $paramClassName = $param->getClassName();
        
        $parsedParamValue = null;

        if($paramClassName != null)
        {
            $headerParamValidator = new HeaderParamValidator();

            $parsedParamValue = $headerParamValidator->validate($param, $value);
        }
        else
        {
            try
            {
                $parsedParamValue = DataTypeConverter::postConvert($value, get_class($value));
            }
            catch(\Exception $ex)
            {
                $parsedParamValue = $value;
            }
        }

        if (array_key_exists($paramName, $this->parameterMap) && isset($this->parameterMap[$paramName]))
        {
            $paramValue = $this->parameterMap[$paramName];

            $paramValue = $paramValue . "," . $parsedParamValue;

            $this->parameterMap[$paramName] = $paramValue;
        }
        else
        {
            $this->parameterMap[$paramName] = $parsedParamValue;
        }
    }
}