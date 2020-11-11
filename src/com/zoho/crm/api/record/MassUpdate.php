<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class MassUpdate implements Model, MassUpdateResponse
{

	private  $status;
	private  $failedCount;
	private  $updatedCount;
	private  $notUpdatedCount;
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
		$this->keyModified['Status'] = 1; 

	}

	/**
	 * The method to get the failedCount
	 * @return int A int representing the failedCount
	 */
	public  function getFailedCount()
	{
		return $this->failedCount; 

	}

	/**
	 * The method to set the value to failedCount
	 * @param int $failedCount A int
	 */
	public  function setFailedCount(int $failedCount)
	{
		$this->failedCount=$failedCount; 
		$this->keyModified['Failed_Count'] = 1; 

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
		$this->keyModified['Updated_Count'] = 1; 

	}

	/**
	 * The method to get the notUpdatedCount
	 * @return int A int representing the notUpdatedCount
	 */
	public  function getNotUpdatedCount()
	{
		return $this->notUpdatedCount; 

	}

	/**
	 * The method to set the value to notUpdatedCount
	 * @param int $notUpdatedCount A int
	 */
	public  function setNotUpdatedCount(int $notUpdatedCount)
	{
		$this->notUpdatedCount=$notUpdatedCount; 
		$this->keyModified['Not_Updated_Count'] = 1; 

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
		$this->keyModified['Total_Count'] = 1; 

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
