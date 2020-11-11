<?php 
namespace com\zoho\crm\api\bulkwrite;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class File implements Model
{

	private  $status;
	private  $name;
	private  $addedCount;
	private  $skippedCount;
	private  $updatedCount;
	private  $totalCount;
	private  $keyModified=array();

	/**
	 * The method to get the status
	 * @return Choice An instance of Choice
	 */
	public  function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param Choice $status An instance of Choice
	 */
	public  function setStatus(Choice $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public  function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public  function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the addedCount
	 * @return int A int representing the addedCount
	 */
	public  function getAddedCount()
	{
		return $this->addedCount; 

	}

	/**
	 * The method to set the value to addedCount
	 * @param int $addedCount A int
	 */
	public  function setAddedCount(int $addedCount)
	{
		$this->addedCount=$addedCount; 
		$this->keyModified['added_count'] = 1; 

	}

	/**
	 * The method to get the skippedCount
	 * @return int A int representing the skippedCount
	 */
	public  function getSkippedCount()
	{
		return $this->skippedCount; 

	}

	/**
	 * The method to set the value to skippedCount
	 * @param int $skippedCount A int
	 */
	public  function setSkippedCount(int $skippedCount)
	{
		$this->skippedCount=$skippedCount; 
		$this->keyModified['skipped_count'] = 1; 

	}

	/**
	 * The method to get the updatedCount
	 * @return int A int representing the updatedCount
	 */
	public  function getUpdatedCount()
	{
		return $this->updatedCount; 

	}

	/**
	 * The method to set the value to updatedCount
	 * @param int $updatedCount A int
	 */
	public  function setUpdatedCount(int $updatedCount)
	{
		$this->updatedCount=$updatedCount; 
		$this->keyModified['updated_count'] = 1; 

	}

	/**
	 * The method to get the totalCount
	 * @return int A int representing the totalCount
	 */
	public  function getTotalCount()
	{
		return $this->totalCount; 

	}

	/**
	 * The method to set the value to totalCount
	 * @param int $totalCount A int
	 */
	public  function setTotalCount(int $totalCount)
	{
		$this->totalCount=$totalCount; 
		$this->keyModified['total_count'] = 1; 

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
