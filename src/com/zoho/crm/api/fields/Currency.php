<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Currency implements Model
{

	private  $roundingOption;
	private  $precision;
	private  $keyModified=array();

	/**
	 * The method to get the roundingOption
	 * @return string A string representing the roundingOption
	 */
	public  function getRoundingOption()
	{
		return $this->roundingOption; 

	}

	/**
	 * The method to set the value to roundingOption
	 * @param string $roundingOption A string
	 */
	public  function setRoundingOption(string $roundingOption)
	{
		$this->roundingOption=$roundingOption; 
		$this->keyModified['rounding_option'] = 1; 

	}

	/**
	 * The method to get the precision
	 * @return int A int representing the precision
	 */
	public  function getPrecision()
	{
		return $this->precision; 

	}

	/**
	 * The method to set the value to precision
	 * @param int $precision A int
	 */
	public  function setPrecision(int $precision)
	{
		$this->precision=$precision; 
		$this->keyModified['precision'] = 1; 

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
