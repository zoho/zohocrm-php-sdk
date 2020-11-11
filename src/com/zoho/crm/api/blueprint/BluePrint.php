<?php 
namespace com\zoho\crm\api\blueprint;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class BluePrint implements Model
{

	private  $transitionId;
	private  $data;
	private  $processInfo;
	private  $transitions;
	private  $keyModified=array();

	/**
	 * The method to get the transitionId
	 * @return string A string representing the transitionId
	 */
	public  function getTransitionId()
	{
		return $this->transitionId; 

	}

	/**
	 * The method to set the value to transitionId
	 * @param string $transitionId A string
	 */
	public  function setTransitionId(string $transitionId)
	{
		$this->transitionId=$transitionId; 
		$this->keyModified['transition_id'] = 1; 

	}

	/**
	 * The method to get the data
	 * @return Record An instance of Record
	 */
	public  function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param Record $data An instance of Record
	 */
	public  function setData(Record $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

	}

	/**
	 * The method to get the processInfo
	 * @return ProcessInfo An instance of ProcessInfo
	 */
	public  function getProcessInfo()
	{
		return $this->processInfo; 

	}

	/**
	 * The method to set the value to processInfo
	 * @param ProcessInfo $processInfo An instance of ProcessInfo
	 */
	public  function setProcessInfo(ProcessInfo $processInfo)
	{
		$this->processInfo=$processInfo; 
		$this->keyModified['process_info'] = 1; 

	}

	/**
	 * The method to get the transitions
	 * @return array A array representing the transitions
	 */
	public  function getTransitions()
	{
		return $this->transitions; 

	}

	/**
	 * The method to set the value to transitions
	 * @param array $transitions A array
	 */
	public  function setTransitions(array $transitions)
	{
		$this->transitions=$transitions; 
		$this->keyModified['transitions'] = 1; 

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
