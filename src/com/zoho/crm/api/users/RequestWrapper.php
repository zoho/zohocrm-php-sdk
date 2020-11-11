<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\util\Model;

class RequestWrapper implements Model
{

	private  $users;
	private  $keyModified=array();

	/**
	 * The method to get the users
	 * @return array A array representing the users
	 */
	public  function getUsers()
	{
		return $this->users; 

	}

	/**
	 * The method to set the value to users
	 * @param array $users A array
	 */
	public  function setUsers(array $users)
	{
		$this->users=$users; 
		$this->keyModified['users'] = 1; 

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
