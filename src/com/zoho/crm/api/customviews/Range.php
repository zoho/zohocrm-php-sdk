<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\util\Model;

class Range implements Model
{

	private  $from;
	private  $to;
	private  $keyModified=array();

	/**
	 * The method to get the from
	 * @return int A int representing the from
	 */
	public  function getFrom()
	{
		return $this->from; 

	}

	/**
	 * The method to set the value to from
	 * @param int $from A int
	 */
	public  function setFrom(int $from)
	{
		$this->from=$from; 
		$this->keyModified['from'] = 1; 

	}

	/**
	 * The method to get the to
	 * @return int A int representing the to
	 */
	public  function getTo()
	{
		return $this->to; 

	}

	/**
	 * The method to set the value to to
	 * @param int $to A int
	 */
	public  function setTo(int $to)
	{
		$this->to=$to; 
		$this->keyModified['to'] = 1; 

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
