<?php 
namespace com\zoho\crm\api\variables;

use com\zoho\crm\api\variablegroups\VariableGroup;
use com\zoho\crm\api\util\Model;

class Variable implements Model
{

	private  $apiName;
	private  $name;
	private  $description;
	private  $id;
	private  $type;
	private  $variableGroup;
	private  $value;
	private  $keyModified=array();

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
	 * The method to get the description
	 * @return string A string representing the description
	 */
	public  function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param string $description A string
	 */
	public  function setDescription(string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

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
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public  function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public  function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the variableGroup
	 * @return VariableGroup An instance of VariableGroup
	 */
	public  function getVariableGroup()
	{
		return $this->variableGroup; 

	}

	/**
	 * The method to set the value to variableGroup
	 * @param VariableGroup $variableGroup An instance of VariableGroup
	 */
	public  function setVariableGroup(VariableGroup $variableGroup)
	{
		$this->variableGroup=$variableGroup; 
		$this->keyModified['variable_group'] = 1; 

	}

	/**
	 * The method to get the value
	 */
	public  function getValue()
	{
		return $this->value; 

	}

	/**
	 * The method to set the value to value
	 * @param 
	 */
	public  function setValue( $value)
	{
		$this->value=$value; 
		$this->keyModified['value'] = 1; 

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
