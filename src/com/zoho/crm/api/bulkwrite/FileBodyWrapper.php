<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\util\StreamWrapper;
use com\zoho\crm\api\util\Model;

class FileBodyWrapper implements Model, ResponseHandler
{

	private  $file;
	private  $keyModified=array();

	/**
	 * The method to get the file
	 * @return StreamWrapper An instance of StreamWrapper
	 */
	public  function getFile()
	{
		return $this->file; 

	}

	/**
	 * The method to set the value to file
	 * @param StreamWrapper $file An instance of StreamWrapper
	 */
	public  function setFile(StreamWrapper $file)
	{
		$this->file=$file; 
		$this->keyModified['file'] = 1; 

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
