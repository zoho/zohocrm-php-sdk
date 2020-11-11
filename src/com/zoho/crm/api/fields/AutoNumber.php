<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class AutoNumber implements Model
{

	private  $prefix;
	private  $suffix;
	private  $startNumber;
	private  $keyModified=array();

	/**
	 * The method to get the prefix
	 * @return string A string representing the prefix
	 */
	public  function getPrefix()
	{
		return $this->prefix; 

	}

	/**
	 * The method to set the value to prefix
	 * @param string $prefix A string
	 */
	public  function setPrefix(string $prefix)
	{
		$this->prefix=$prefix; 
		$this->keyModified['prefix'] = 1; 

	}

	/**
	 * The method to get the suffix
	 * @return string A string representing the suffix
	 */
	public  function getSuffix()
	{
		return $this->suffix; 

	}

	/**
	 * The method to set the value to suffix
	 * @param string $suffix A string
	 */
	public  function setSuffix(string $suffix)
	{
		$this->suffix=$suffix; 
		$this->keyModified['suffix'] = 1; 

	}

	/**
	 * The method to get the startNumber
	 * @return int A int representing the startNumber
	 */
	public  function getStartNumber()
	{
		return $this->startNumber; 

	}

	/**
	 * The method to set the value to startNumber
	 * @param int $startNumber A int
	 */
	public  function setStartNumber(int $startNumber)
	{
		$this->startNumber=$startNumber; 
		$this->keyModified['start_number'] = 1; 

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
