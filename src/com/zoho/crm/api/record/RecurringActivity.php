<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class RecurringActivity implements Model
{

	private  $rrule;
	private  $keyModified=array();

	/**
	 * The method to get the rrule
	 * @return string A string representing the rrule
	 */
	public  function getRrule()
	{
		return $this->rrule; 

	}

	/**
	 * The method to set the value to rrule
	 * @param string $rrule A string
	 */
	public  function setRrule(string $rrule)
	{
		$this->rrule=$rrule; 
		$this->keyModified['RRULE'] = 1; 

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
