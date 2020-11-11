<?php 
namespace com\zoho\crm\api\variablegroups;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $variableGroups;
	private  $keyModified=array();

	/**
	 * The method to get the variableGroups
	 * @return array A array representing the variableGroups
	 */
	public  function getVariableGroups()
	{
		return $this->variableGroups; 

	}

	/**
	 * The method to set the value to variableGroups
	 * @param array $variableGroups A array
	 */
	public  function setVariableGroups(array $variableGroups)
	{
		$this->variableGroups=$variableGroups; 
		$this->keyModified['variable_groups'] = 1; 

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
