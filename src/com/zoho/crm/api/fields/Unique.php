<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Unique implements Model
{

	private  $casesensitive;
	private  $keyModified=array();

	/**
	 * The method to get the casesensitive
	 * @return string A string representing the casesensitive
	 */
	public  function getCasesensitive()
	{
		return $this->casesensitive; 

	}

	/**
	 * The method to set the value to casesensitive
	 * @param string $casesensitive A string
	 */
	public  function setCasesensitive(string $casesensitive)
	{
		$this->casesensitive=$casesensitive; 
		$this->keyModified['casesensitive'] = 1; 

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
