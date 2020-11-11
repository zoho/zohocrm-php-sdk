<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class RequestWrapper implements Model
{

	private  $characterEncoding;
	private  $operation;
	private  $callback;
	private  $resource;
	private  $keyModified=array();

	/**
	 * The method to get the characterEncoding
	 * @return string A string representing the characterEncoding
	 */
	public  function getCharacterEncoding()
	{
		return $this->characterEncoding; 

	}

	/**
	 * The method to set the value to characterEncoding
	 * @param string $characterEncoding A string
	 */
	public  function setCharacterEncoding(string $characterEncoding)
	{
		$this->characterEncoding=$characterEncoding; 
		$this->keyModified['character_encoding'] = 1; 

	}

	/**
	 * The method to get the operation
	 * @return Choice An instance of Choice
	 */
	public  function getOperation()
	{
		return $this->operation; 

	}

	/**
	 * The method to set the value to operation
	 * @param Choice $operation An instance of Choice
	 */
	public  function setOperation(Choice $operation)
	{
		$this->operation=$operation; 
		$this->keyModified['operation'] = 1; 

	}

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
	 * The method to get the resource
	 * @return array A array representing the resource
	 */
	public  function getResource()
	{
		return $this->resource; 

	}

	/**
	 * The method to set the value to resource
	 * @param array $resource A array
	 */
	public  function setResource(array $resource)
	{
		$this->resource=$resource; 
		$this->keyModified['resource'] = 1; 

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
