<?php 
namespace com\zoho\crm\api\roles;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $roles;
	private  $keyModified=array();

	/**
	 * The method to get the roles
	 * @return array A array representing the roles
	 */
	public  function getRoles()
	{
		return $this->roles; 

	}

	/**
	 * The method to set the value to roles
	 * @param array $roles A array
	 */
	public  function setRoles(array $roles)
	{
		$this->roles=$roles; 
		$this->keyModified['roles'] = 1; 

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
