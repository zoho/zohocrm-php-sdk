<?php 
namespace com\zoho\crm\api\currencies;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $currencies;
	private  $keyModified=array();

	/**
	 * The method to get the currencies
	 * @return array A array representing the currencies
	 */
	public  function getCurrencies()
	{
		return $this->currencies; 

	}

	/**
	 * The method to set the value to currencies
	 * @param array $currencies A array
	 */
	public  function setCurrencies(array $currencies)
	{
		$this->currencies=$currencies; 
		$this->keyModified['currencies'] = 1; 

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
