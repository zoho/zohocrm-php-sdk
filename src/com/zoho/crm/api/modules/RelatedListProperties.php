<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\util\Model;

class RelatedListProperties implements Model
{

	private  $sortBy;
	private  $fields;
	private  $sortOrder;
	private  $keyModified=array();

	/**
	 * The method to get the sortBy
	 * @return string A string representing the sortBy
	 */
	public  function getSortBy()
	{
		return $this->sortBy; 

	}

	/**
	 * The method to set the value to sortBy
	 * @param string $sortBy A string
	 */
	public  function setSortBy(string $sortBy)
	{
		$this->sortBy=$sortBy; 
		$this->keyModified['sort_by'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return array A array representing the fields
	 */
	public  function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param array $fields A array
	 */
	public  function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the sortOrder
	 * @return string A string representing the sortOrder
	 */
	public  function getSortOrder()
	{
		return $this->sortOrder; 

	}

	/**
	 * The method to set the value to sortOrder
	 * @param string $sortOrder A string
	 */
	public  function setSortOrder(string $sortOrder)
	{
		$this->sortOrder=$sortOrder; 
		$this->keyModified['sort_order'] = 1; 

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
