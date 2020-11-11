<?php 
namespace com\zoho\crm\api\org;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $org;
	private  $keyModified=array();

	/**
	 * The method to get the org
	 * @return array A array representing the org
	 */
	public  function getOrg()
	{
		return $this->org; 

	}

	/**
	 * The method to set the value to org
	 * @param array $org A array
	 */
	public  function setOrg(array $org)
	{
		$this->org=$org; 
		$this->keyModified['org'] = 1; 

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
