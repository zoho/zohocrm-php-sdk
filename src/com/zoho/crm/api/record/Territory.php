<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class Territory implements Model
{

	private  $id;
	private  $includeChild;
	private  $keyModified=array();

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public  function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public  function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the includeChild
	 * @return bool A bool representing the includeChild
	 */
	public  function getIncludeChild()
	{
		return $this->includeChild; 

	}

	/**
	 * The method to set the value to includeChild
	 * @param bool $includeChild A bool
	 */
	public  function setIncludeChild(bool $includeChild)
	{
		$this->includeChild=$includeChild; 
		$this->keyModified['include_child'] = 1; 

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
