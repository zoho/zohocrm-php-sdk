<?php 
namespace com\zoho\crm\api\currencies;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Format implements Model
{

	private  $decimalSeparator;
	private  $thousandSeparator;
	private  $decimalPlaces;
	private  $keyModified=array();

	/**
	 * The method to get the decimalSeparator
	 * @return Choice An instance of Choice
	 */
	public  function getDecimalSeparator()
	{
		return $this->decimalSeparator; 

	}

	/**
	 * The method to set the value to decimalSeparator
	 * @param Choice $decimalSeparator An instance of Choice
	 */
	public  function setDecimalSeparator(Choice $decimalSeparator)
	{
		$this->decimalSeparator=$decimalSeparator; 
		$this->keyModified['decimal_separator'] = 1; 

	}

	/**
	 * The method to get the thousandSeparator
	 * @return Choice An instance of Choice
	 */
	public  function getThousandSeparator()
	{
		return $this->thousandSeparator; 

	}

	/**
	 * The method to set the value to thousandSeparator
	 * @param Choice $thousandSeparator An instance of Choice
	 */
	public  function setThousandSeparator(Choice $thousandSeparator)
	{
		$this->thousandSeparator=$thousandSeparator; 
		$this->keyModified['thousand_separator'] = 1; 

	}

	/**
	 * The method to get the decimalPlaces
	 * @return Choice An instance of Choice
	 */
	public  function getDecimalPlaces()
	{
		return $this->decimalPlaces; 

	}

	/**
	 * The method to set the value to decimalPlaces
	 * @param Choice $decimalPlaces An instance of Choice
	 */
	public  function setDecimalPlaces(Choice $decimalPlaces)
	{
		$this->decimalPlaces=$decimalPlaces; 
		$this->keyModified['decimal_places'] = 1; 

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
