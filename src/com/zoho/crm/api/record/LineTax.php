<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class LineTax implements Model
{

	private  $percentage;
	private  $name;
	private  $id;
	private  $value;
	private  $keyModified=array();

	/**
	 * The method to get the percentage
	 * @return float A float representing the percentage
	 */
	public  function getPercentage()
	{
		return $this->percentage; 

	}

	/**
	 * The method to set the value to percentage
	 * @param float $percentage A float
	 */
	public  function setPercentage(float $percentage)
	{
		$this->percentage=$percentage; 
		$this->keyModified['percentage'] = 1; 

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
	 * The method to get the value
	 * @return float A float representing the value
	 */
	public  function getValue()
	{
		return $this->value; 

	}

	/**
	 * The method to set the value to value
	 * @param float $value A float
	 */
	public  function setValue(float $value)
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
