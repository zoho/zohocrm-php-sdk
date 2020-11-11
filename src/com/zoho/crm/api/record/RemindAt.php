<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class RemindAt implements Model
{

	private  $alarm;
	private  $keyModified=array();

	/**
	 * The method to get the alarm
	 * @return string A string representing the alarm
	 */
	public  function getAlarm()
	{
		return $this->alarm; 

	}

	/**
	 * The method to set the value to alarm
	 * @param string $alarm A string
	 */
	public  function setAlarm(string $alarm)
	{
		$this->alarm=$alarm; 
		$this->keyModified['ALARM'] = 1; 

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
