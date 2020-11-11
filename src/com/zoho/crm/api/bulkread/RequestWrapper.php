<?php 
namespace com\zoho\crm\api\bulkread;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class RequestWrapper implements Model
{

	private  $callback;
	private  $query;
	private  $fileType;
	private  $keyModified=array();

	/**
	 * The method to get the callback
	 * @return CallBack An instance of CallBack
	 */
	public  function getCallback()
	{
		return $this->callback; 

	}

	/**
	 * The method to set the value to callback
	 * @param CallBack $callback An instance of CallBack
	 */
	public  function setCallback(CallBack $callback)
	{
		$this->callback=$callback; 
		$this->keyModified['callback'] = 1; 

	}

	/**
	 * The method to get the query
	 * @return Query An instance of Query
	 */
	public  function getQuery()
	{
		return $this->query; 

	}

	/**
	 * The method to set the value to query
	 * @param Query $query An instance of Query
	 */
	public  function setQuery(Query $query)
	{
		$this->query=$query; 
		$this->keyModified['query'] = 1; 

	}

	/**
	 * The method to get the fileType
	 * @return Choice An instance of Choice
	 */
	public  function getFileType()
	{
		return $this->fileType; 

	}

	/**
	 * The method to set the value to fileType
	 * @param Choice $fileType An instance of Choice
	 */
	public  function setFileType(Choice $fileType)
	{
		$this->fileType=$fileType; 
		$this->keyModified['file_type'] = 1; 

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
