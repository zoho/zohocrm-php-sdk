<?php 
namespace com\zoho\crm\api\bulkread;

use com\zoho\crm\api\util\Model;

class Query implements Model
{

	private  $module;
	private  $cvid;
	private  $fields;
	private  $page;
	private  $criteria;
	private  $keyModified=array();

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
	 * The method to get the cvid
	 * @return string A string representing the cvid
	 */
	public  function getCvid()
	{
		return $this->cvid; 

	}

	/**
	 * The method to set the value to cvid
	 * @param string $cvid A string
	 */
	public  function setCvid(string $cvid)
	{
		$this->cvid=$cvid; 
		$this->keyModified['cvid'] = 1; 

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
	 * The method to get the page
	 * @return int A int representing the page
	 */
	public  function getPage()
	{
		return $this->page; 

	}

	/**
	 * The method to set the value to page
	 * @param int $page A int
	 */
	public  function setPage(int $page)
	{
		$this->page=$page; 
		$this->keyModified['page'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public  function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public  function setCriteria(Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

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
