<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\util\Model;

class RecordActionWrapper implements Model, RecordActionHandler
{

	private  $data;
	private  $wfScheduler;
	private  $successCount;
	private  $lockedCount;
	private  $keyModified=array();

	/**
	 * The method to get the data
	 * @return array A array representing the data
	 */
	public  function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param array $data A array
	 */
	public  function setData(array $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

	}

	/**
	 * The method to get the wfScheduler
	 * @return bool A bool representing the wfScheduler
	 */
	public  function getWfScheduler()
	{
		return $this->wfScheduler; 

	}

	/**
	 * The method to set the value to wfScheduler
	 * @param bool $wfScheduler A bool
	 */
	public  function setWfScheduler(bool $wfScheduler)
	{
		$this->wfScheduler=$wfScheduler; 
		$this->keyModified['wf_scheduler'] = 1; 

	}

	/**
	 * The method to get the successCount
	 * @return string A string representing the successCount
	 */
	public  function getSuccessCount()
	{
		return $this->successCount; 

	}

	/**
	 * The method to set the value to successCount
	 * @param string $successCount A string
	 */
	public  function setSuccessCount(string $successCount)
	{
		$this->successCount=$successCount; 
		$this->keyModified['success_count'] = 1; 

	}

	/**
	 * The method to get the lockedCount
	 * @return int A int representing the lockedCount
	 */
	public  function getLockedCount()
	{
		return $this->lockedCount; 

	}

	/**
	 * The method to set the value to lockedCount
	 * @param int $lockedCount A int
	 */
	public  function setLockedCount(int $lockedCount)
	{
		$this->lockedCount=$lockedCount; 
		$this->keyModified['locked_count'] = 1; 

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
