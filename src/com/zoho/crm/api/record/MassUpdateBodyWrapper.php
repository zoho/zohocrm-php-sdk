<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class MassUpdateBodyWrapper implements Model
{

	private  $data;
	private  $cvid;
	private  $ids;
	private  $territory;
	private  $overWrite;
	private  $criteria;
	private  $keyModified=array();

	/**
	 * The method to get the data
	 * @return array A array representing the data
	 */
	public  function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param array $data A array
	 */
	public  function setData(array $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

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
	 * The method to get the ids
	 * @return array A array representing the ids
	 */
	public  function getIds()
	{
		return $this->ids; 

	}

	/**
	 * The method to set the value to ids
	 * @param array $ids A array
	 */
	public  function setIds(array $ids)
	{
		$this->ids=$ids; 
		$this->keyModified['ids'] = 1; 

	}

	/**
	 * The method to get the territory
	 * @return Territory An instance of Territory
	 */
	public  function getTerritory()
	{
		return $this->territory; 

	}

	/**
	 * The method to set the value to territory
	 * @param Territory $territory An instance of Territory
	 */
	public  function setTerritory(Territory $territory)
	{
		$this->territory=$territory; 
		$this->keyModified['territory'] = 1; 

	}

	/**
	 * The method to get the overWrite
	 * @return bool A bool representing the overWrite
	 */
	public  function getOverWrite()
	{
		return $this->overWrite; 

	}

	/**
	 * The method to set the value to overWrite
	 * @param bool $overWrite A bool
	 */
	public  function setOverWrite(bool $overWrite)
	{
		$this->overWrite=$overWrite; 
		$this->keyModified['over_write'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return array A array representing the criteria
	 */
	public  function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param array $criteria A array
	 */
	public  function setCriteria(array $criteria)
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
