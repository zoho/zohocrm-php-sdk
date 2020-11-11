<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class BulkWriteResponse implements Model, ResponseWrapper
{

	private  $status;
	private  $characterEncoding;
	private  $resource;
	private  $id;
	private  $callback;
	private  $result;
	private  $createdBy;
	private  $operation;
	private  $createdTime;
	private  $keyModified=array();

	/**
	 * The method to get the status
	 * @return string A string representing the status
	 */
	public  function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param string $status A string
	 */
	public  function setStatus(string $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

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
	 * The method to get the result
	 * @return Result An instance of Result
	 */
	public  function getResult()
	{
		return $this->result; 

	}

	/**
	 * The method to set the value to result
	 * @param Result $result An instance of Result
	 */
	public  function setResult(Result $result)
	{
		$this->result=$result; 
		$this->keyModified['result'] = 1; 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public  function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public  function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the operation
	 * @return string A string representing the operation
	 */
	public  function getOperation()
	{
		return $this->operation; 

	}

	/**
	 * The method to set the value to operation
	 * @param string $operation A string
	 */
	public  function setOperation(string $operation)
	{
		$this->operation=$operation; 
		$this->keyModified['operation'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public  function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['created_time'] = 1; 

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
