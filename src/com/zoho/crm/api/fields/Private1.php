<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Private1 implements Model
{

	private  $restricted;
	private  $export;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the restricted
	 * @return bool A bool representing the restricted
	 */
	public  function getRestricted()
	{
		return $this->restricted; 

	}

	/**
	 * The method to set the value to restricted
	 * @param bool $restricted A bool
	 */
	public  function setRestricted(bool $restricted)
	{
		$this->restricted=$restricted; 
		$this->keyModified['restricted'] = 1; 

	}

	/**
	 * The method to get the export
	 * @return bool A bool representing the export
	 */
	public  function getExport()
	{
		return $this->export; 

	}

	/**
	 * The method to set the value to export
	 * @param bool $export A bool
	 */
	public  function setExport(bool $export)
	{
		$this->export=$export; 
		$this->keyModified['export'] = 1; 

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
