<?php 
namespace com\zoho\crm\api\blueprint;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $blueprint;
	private  $keyModified=array();

	/**
	 * The method to get the blueprint
	 * @return array A array representing the blueprint
	 */
	public  function getBlueprint()
	{
		return $this->blueprint; 

	}

	/**
	 * The method to set the value to blueprint
	 * @param array $blueprint A array
	 */
	public  function setBlueprint(array $blueprint)
	{
		$this->blueprint=$blueprint; 
		$this->keyModified['blueprint'] = 1; 

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
