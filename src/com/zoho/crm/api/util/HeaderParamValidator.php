<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\util\Constants;

use com\zoho\crm\api\util\DataTypeConverter;

/**
 * This class is to validate API headers and parameters.
 */
class HeaderParamValidator
{
    public function validate($headerparam, $value)
    {
        $name = $headerparam->getName();

        $className = $headerparam->getClassName();

        $json_Details = $this->getJSONDetails();

        $className = $this->getClassName($className);

        $typeDetail = array();

        if(array_key_exists($className, $json_Details))
        {
            $typeDetail = $this->getKeyJSONDetails($name, $json_Details[$className]);
        }

        if(count($typeDetail) > 0)
        {
            if(!$this->checkDataType($typeDetail, $value))
            {
                $detailsJO = [];

                $detailsJO[Constants::HEADER_OR_PARAM_NAME] = $name;
                
                $detailsJO[Constants::CLASS_KEY] =  $className;
                
                $detailsJO[Constants::EXPECTED_TYPE] = $typeDetail[Constants::TYPE];
                
                throw new SDKException(Constants::TYPE_ERROR, null, $detailsJO, null);
            }
            else
            {
                $value = DataTypeConverter::postConvert($value, $typeDetail[Constants::TYPE]);
            }
        }

        return $value;
    }
    
    public function getJSONDetails()
    {
        $json_Details = Initializer::$jsonDetails;

        if(is_null($json_Details))
        {
            $json_Details = json_decode(file_get_contents(explode("src", realpath(__DIR__))[0] . Constants::JSON_DETAILS_FILE_PATH), true);

            Initializer::$jsonDetails = $json_Details;
        }

        return $json_Details;
    }

    public function getClassName($className)
    {
        $classNameSpace = explode('.', $className);

        $count = count($classNameSpace);

        $className = "";

        for($i = 0; $i < $count - 1; $i++)
        {
            $className = $className . strtolower($classNameSpace[$i]) . "\\";
        }

        return $className . $classNameSpace[$count - 1];
    }

    public function getKeyJSONDetails($name, $json_Details)
    {
        foreach($json_Details as $json_Detail)
        {
            if(array_key_exists(Constants::NAME, $json_Detail))
            {
                if(strtolower($name) == strtolower($json_Detail[Constants::NAME]))
                {
                    return $json_Detail;
                }
            }
        }
    }

    public function checkDataType($keyDetail, $value)
    {
		$type  = $keyDetail[Constants::TYPE];

		$varType = gettype($value);

		$test = function ($varType, $type) { if(strtolower($varType) == strtolower($type)){return true; } return false;};

		$check = $test($varType, $type);

		if(array_key_exists($type, Constants::DATA_TYPE))
		{
			$type = Constants::DATA_TYPE[$type];

			$check = $test($varType, $type);
        }
        
        if(strtolower($varType) == strtolower(Constants::OBJECT) || strtolower($type) == strtolower(Constants::OBJECT))
		{
			if(strtolower($type) == strtolower(Constants::OBJECT))
			{
				$check = true;
			}
			else
			{
				$className = get_class($value);

				$check = $test($className, $type);
			}
		}

        return $check;
    }
}