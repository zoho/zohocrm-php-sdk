<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class BodyWrapper implements Model
{

	private  $data;
	private  $trigger;
	private  $process;
	private  $duplicateCheckFields;
	private  $wfTrigger;
	private  $larId;
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
	 * The method to get the trigger
	 * @return array A array representing the trigger
	 */
	public  function getTrigger()
	{
		return $this->trigger; 

	}

	/**
	 * The method to set the value to trigger
	 * @param array $trigger A array
	 */
	public  function setTrigger(array $trigger)
	{
		$this->trigger=$trigger; 
		$this->keyModified['trigger'] = 1; 

	}

	/**
	 * The method to get the process
	 * @return array A array representing the process
	 */
	public  function getProcess()
	{
		return $this->process; 

	}

	/**
	 * The method to set the value to process
	 * @param array $process A array
	 */
	public  function setProcess(array $process)
	{
		$this->process=$process; 
		$this->keyModified['process'] = 1; 

	}

	/**
	 * The method to get the duplicateCheckFields
	 * @return array A array representing the duplicateCheckFields
	 */
	public  function getDuplicateCheckFields()
	{
		return $this->duplicateCheckFields; 

	}

	/**
	 * The method to set the value to duplicateCheckFields
	 * @param array $duplicateCheckFields A array
	 */
	public  function setDuplicateCheckFields(array $duplicateCheckFields)
	{
		$this->duplicateCheckFields=$duplicateCheckFields; 
		$this->keyModified['duplicate_check_fields'] = 1; 

	}

	/**
	 * The method to get the wfTrigger
	 * @return string A string representing the wfTrigger
	 */
	public  function getWfTrigger()
	{
		return $this->wfTrigger; 

	}

	/**
	 * The method to set the value to wfTrigger
	 * @param string $wfTrigger A string
	 */
	public  function setWfTrigger(string $wfTrigger)
	{
		$this->wfTrigger=$wfTrigger; 
		$this->keyModified['wf_trigger'] = 1; 

	}

	/**
	 * The method to get the larId
	 * @return string A string representing the larId
	 */
	public  function getLarId()
	{
		return $this->larId; 

	}

	/**
	 * The method to set the value to larId
	 * @param string $larId A string
	 */
	public  function setLarId(string $larId)
	{
		$this->larId=$larId; 
		$this->keyModified['lar_id'] = 1; 

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
