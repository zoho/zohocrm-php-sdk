<?php
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class CountWrapper implements Model, CountHandler
{

	private  $count;

	/**
	 * The method to get the data
	 * @return int Count of Records
	 */
	public  function getCount()
	{
		return $this->count;
	}

	/**
	 * The method to set the count
	 * @param int $count Count
	 */
	public  function setCount(int $count)
	{
		$this->count=$count;
	}
} 
