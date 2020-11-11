<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\layouts\Layout;
use com\zoho\crm\api\util\Model;

class Module implements Model
{

	private  $layout;
	private  $displayLabel;
	private  $apiName;
	private  $module;
	private  $id;
	private  $moduleName;
	private  $keyModified=array();

	/**
	 * The method to get the layout
	 * @return Layout An instance of Layout
	 */
	public  function getLayout()
	{
		return $this->layout; 

	}

	/**
	 * The method to set the value to layout
	 * @param Layout $layout An instance of Layout
	 */
	public  function setLayout(Layout $layout)
	{
		$this->layout=$layout; 
		$this->keyModified['layout'] = 1; 

	}

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public  function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public  function setDisplayLabel(string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public  function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the module
	 * @return string A string representing the module
	 */
	public  function getModule()
	{
		return $this->module; 

	}

	/**
	 * The method to set the value to module
	 * @param string $module A string
	 */
	public  function setModule(string $module)
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
	 * The method to get the moduleName
	 * @return string A string representing the moduleName
	 */
	public  function getModuleName()
	{
		return $this->moduleName; 

	}

	/**
	 * The method to set the value to moduleName
	 * @param string $moduleName A string
	 */
	public  function setModuleName(string $moduleName)
	{
		$this->moduleName=$moduleName; 
		$this->keyModified['module_name'] = 1; 

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
