<?php 
namespace com\zoho\crm\api\sharerecords;

use com\zoho\crm\api\util\Model;

class DeleteActionWrapper implements Model, DeleteActionHandler
{

	private  $share;
	private  $keyModified=array();

	/**
	 * The method to get the share
	 * @return DeleteActionResponse An instance of DeleteActionResponse
	 */
	public  function getShare()
	{
		return $this->share; 

	}

	/**
	 * The method to set the value to share
	 * @param DeleteActionResponse $share An instance of DeleteActionResponse
	 */
	public  function setShare(DeleteActionResponse $share)
	{
		$this->share=$share; 
		$this->keyModified['share'] = 1; 

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
