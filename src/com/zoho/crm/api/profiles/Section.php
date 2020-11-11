<?php 
namespace com\zoho\crm\api\profiles;

use com\zoho\crm\api\util\Model;

class Section implements Model
{

	private  $name;
	private  $categories;
	private  $keyModified=array();

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public  function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public  function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the categories
	 * @return array A array representing the categories
	 */
	public  function getCategories()
	{
		return $this->categories; 

	}

	/**
	 * The method to set the value to categories
	 * @param array $categories A array
	 */
	public  function setCategories(array $categories)
	{
		$this->categories=$categories; 
		$this->keyModified['categories'] = 1; 

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
