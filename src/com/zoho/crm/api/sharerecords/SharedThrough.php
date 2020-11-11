<?php 
namespace com\zoho\crm\api\sharerecords;

use com\zoho\crm\api\modules\Module;
use com\zoho\crm\api\util\Model;

class SharedThrough implements Model
{

	private  $module;
	private  $id;
	private  $entityName;
	private  $keyModified=array();

	/**
	 * The method to get the module
	 * @return Module An instance of Module
	 */
	public  function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param Module $module An instance of Module
	 */
	public  function setModule(Module $module)
	{
		$this->module=$module; 
		$this->keyModified['module'] = 1; 

	}

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
	 * The method to get the entityName
	 * @return string A string representing the entityName
	 */
	public  function getEntityName()
	{
		return $this->entityName; 

	}

	/**
	 * The method to set the value to entityName
	 * @param string $entityName A string
	 */
	public  function setEntityName(string $entityName)
	{
		$this->entityName=$entityName; 
		$this->keyModified['entity_name'] = 1; 

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
