<?php 
namespace com\zoho\crm\api\variables;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $variables;
	private  $keyModified=array();

	/**
	 * The method to get the variables
	 * @return array A array representing the variables
	 */
	public  function getVariables()
	{
		return $this->variables; 

	}

	/**
	 * The method to set the value to variables
	 * @param array $variables A array
	 */
	public  function setVariables(array $variables)
	{
		$this->variables=$variables; 
		$this->keyModified['variables'] = 1; 

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
