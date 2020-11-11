<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class DeletedRecord implements Model
{

	private  $deletedBy;
	private  $id;
	private  $displayName;
	private  $type;
	private  $createdBy;
	private  $deletedTime;
	private  $keyModified=array();

	/**
	 * The method to get the deletedBy
	 * @return User An instance of User
	 */
	public  function getDeletedBy()
	{
		return $this->deletedBy; 

	}

	/**
	 * The method to set the value to deletedBy
	 * @param User $deletedBy An instance of User
	 */
	public  function setDeletedBy(User $deletedBy)
	{
		$this->deletedBy=$deletedBy; 
		$this->keyModified['deleted_by'] = 1; 

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
	 * The method to get the displayName
	 * @return string A string representing the displayName
	 */
	public  function getDisplayName()
	{
		return $this->displayName; 

	}

	/**
	 * The method to set the value to displayName
	 * @param string $displayName A string
	 */
	public  function setDisplayName(string $displayName)
	{
		$this->displayName=$displayName; 
		$this->keyModified['display_name'] = 1; 

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
	 * The method to get the deletedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getDeletedTime()
	{
		return $this->deletedTime; 

	}

	/**
	 * The method to set the value to deletedTime
	 * @param \DateTime $deletedTime An instance of \DateTime
	 */
	public  function setDeletedTime(\DateTime $deletedTime)
	{
		$this->deletedTime=$deletedTime; 
		$this->keyModified['deleted_time'] = 1; 

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
