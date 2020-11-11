<?php 
namespace com\zoho\crm\api\bulkread;

use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class JobDetail implements Model
{

	private  $id;
	private  $operation;
	private  $state;
	private  $query;
	private  $createdBy;
	private  $createdTime;
	private  $result;
	private  $fileType;
	private  $keyModified=array();

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
	 * The method to get the state
	 * @return Choice An instance of Choice
	 */
	public  function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param Choice $state An instance of Choice
	 */
	public  function setState(Choice $state)
	{
		$this->state=$state; 
		$this->keyModified['state'] = 1; 

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
	 * The method to get the fileType
	 * @return string A string representing the fileType
	 */
	public  function getFileType()
	{
		return $this->fileType; 

	}

	/**
	 * The method to set the value to fileType
	 * @param string $fileType A string
	 */
	public  function setFileType(string $fileType)
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
