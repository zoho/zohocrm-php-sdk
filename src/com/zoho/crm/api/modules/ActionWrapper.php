<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $modules;
	private  $keyModified=array();

	/**
	 * The method to get the modules
	 * @return array A array representing the modules
	 */
	public  function getModules()
	{
		return $this->modules; 

	}

	/**
	 * The method to set the value to modules
	 * @param array $modules A array
	 */
	public  function setModules(array $modules)
	{
		$this->modules=$modules; 
		$this->keyModified['modules'] = 1; 

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
