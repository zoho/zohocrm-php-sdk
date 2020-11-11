<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\util\Model;

class FieldMapping implements Model
{

	private  $apiName;
	private  $index;
	private  $format;
	private  $findBy;
	private  $defaultValue;
	private  $module;
	private  $keyModified=array();

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public  function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the index
	 * @return int A int representing the index
	 */
	public  function getIndex()
	{
		return $this->index; 

	}

	/**
	 * The method to set the value to index
	 * @param int $index A int
	 */
	public  function setIndex(int $index)
	{
		$this->index=$index; 
		$this->keyModified['index'] = 1; 

	}

	/**
	 * The method to get the format
	 * @return string A string representing the format
	 */
	public  function getFormat()
	{
		return $this->format; 

	}

	/**
	 * The method to set the value to format
	 * @param string $format A string
	 */
	public  function setFormat(string $format)
	{
		$this->format=$format; 
		$this->keyModified['format'] = 1; 

	}

	/**
	 * The method to get the findBy
	 * @return string A string representing the findBy
	 */
	public  function getFindBy()
	{
		return $this->findBy; 

	}

	/**
	 * The method to set the value to findBy
	 * @param string $findBy A string
	 */
	public  function setFindBy(string $findBy)
	{
		$this->findBy=$findBy; 
		$this->keyModified['find_by'] = 1; 

	}

	/**
	 * The method to get the defaultValue
	 * @return array A array representing the defaultValue
	 */
	public  function getDefaultValue()
	{
		return $this->defaultValue; 

	}

	/**
	 * The method to set the value to defaultValue
	 * @param array $defaultValue A array
	 */
	public  function setDefaultValue(array $defaultValue)
	{
		$this->defaultValue=$defaultValue; 
		$this->keyModified['default_value'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public  function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public  function setModule(string $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

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
