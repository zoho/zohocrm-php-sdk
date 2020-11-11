<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class PickListValue implements Model
{

	private  $displayValue;
	private  $sequenceNumber;
	private  $expectedDataType;
	private  $maps;
	private  $actualValue;
	private  $sysRefName;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public  function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public  function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

	/**
	 * The method to get the sequenceNumber
	 * @return int A int representing the sequenceNumber
	 */
	public  function getSequenceNumber()
	{
		return $this->sequenceNumber; 

	}

	/**
	 * The method to set the value to sequenceNumber
	 * @param int $sequenceNumber A int
	 */
	public  function setSequenceNumber(int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

	}

	/**
	 * The method to get the expectedDataType
	 * @return string A string representing the expectedDataType
	 */
	public  function getExpectedDataType()
	{
		return $this->expectedDataType; 

	}

	/**
	 * The method to set the value to expectedDataType
	 * @param string $expectedDataType A string
	 */
	public  function setExpectedDataType(string $expectedDataType)
	{
		$this->expectedDataType=$expectedDataType; 
		$this->keyModified['expected_data_type'] = 1; 

	}

	/**
	 * The method to get the maps
	 * @return array A array representing the maps
	 */
	public  function getMaps()
	{
		return $this->maps; 

	}

	/**
	 * The method to set the value to maps
	 * @param array $maps A array
	 */
	public  function setMaps(array $maps)
	{
		$this->maps=$maps; 
		$this->keyModified['maps'] = 1; 

	}

	/**
	 * The method to get the actualValue
	 * @return string A string representing the actualValue
	 */
	public  function getActualValue()
	{
		return $this->actualValue; 

	}

	/**
	 * The method to set the value to actualValue
	 * @param string $actualValue A string
	 */
	public  function setActualValue(string $actualValue)
	{
		$this->actualValue=$actualValue; 
		$this->keyModified['actual_value'] = 1; 

	}

	/**
	 * The method to get the sysRefName
	 * @return string A string representing the sysRefName
	 */
	public  function getSysRefName()
	{
		return $this->sysRefName; 

	}

	/**
	 * The method to set the value to sysRefName
	 * @param string $sysRefName A string
	 */
	public  function setSysRefName(string $sysRefName)
	{
		$this->sysRefName=$sysRefName; 
		$this->keyModified['sys_ref_name'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public  function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public  function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to check if the user has modified the given key
	 * @param string $key A string
	 * @return int A int representing the modification
	 */
	public  function isKeyModified(string $key)
	{
		if(((array_key_exists($key, $this->keyModified))))
		{
			return $this->keyModified[$key]; 

		}
		return null; 

	}

	/**
	 * The method to mark the given key as modified
	 * @param string $key A string
	 * @param int $modification A int
	 */
	public  function setKeyModified(string $key, int $modification)
	{
		$this->keyModified[$key] = $modification; 

	}
} 
