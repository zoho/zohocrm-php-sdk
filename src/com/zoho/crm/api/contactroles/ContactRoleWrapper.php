<?php 
namespace com\zoho\crm\api\contactroles;

use com\zoho\crm\api\util\Model;

class ContactRoleWrapper implements Model
{

	private  $contactRole;
	private  $keyModified=array();

	/**
	 * The method to get the contactRole
	 * @return string A string representing the contactRole
	 */
	public  function getContactRole()
	{
		return $this->contactRole; 

	}

	/**
	 * The method to set the value to contactRole
	 * @param string $contactRole A string
	 */
	public  function setContactRole(string $contactRole)
	{
		$this->contactRole=$contactRole; 
		$this->keyModified['Contact_Role'] = 1; 

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
