<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class Crypt implements Model
{

	private  $mode;
	private  $column;
	private  $encfldids;
	private  $notify;
	private  $table;
	private  $status;
	private  $keyModified=array();

	/**
	 * The method to get the mode
	 * @return string A string representing the mode
	 */
	public  function getMode()
	{
		return $this->mode; 

	}

	/**
	 * The method to set the value to mode
	 * @param string $mode A string
	 */
	public  function setMode(string $mode)
	{
		$this->mode=$mode; 
		$this->keyModified['mode'] = 1; 

	}

	/**
	 * The method to get the column
	 * @return string A string representing the column
	 */
	public  function getColumn()
	{
		return $this->column; 

	}

	/**
	 * The method to set the value to column
	 * @param string $column A string
	 */
	public  function setColumn(string $column)
	{
		$this->column=$column; 
		$this->keyModified['column'] = 1; 

	}

	/**
	 * The method to get the encfldids
	 * @return array A array representing the encfldids
	 */
	public  function getEncfldids()
	{
		return $this->encfldids; 

	}

	/**
	 * The method to set the value to encfldids
	 * @param array $encfldids A array
	 */
	public  function setEncfldids(array $encfldids)
	{
		$this->encfldids=$encfldids; 
		$this->keyModified['encFldIds'] = 1; 

	}

	/**
	 * The method to get the notify
	 * @return string A string representing the notify
	 */
	public  function getNotify()
	{
		return $this->notify; 

	}

	/**
	 * The method to set the value to notify
	 * @param string $notify A string
	 */
	public  function setNotify(string $notify)
	{
		$this->notify=$notify; 
		$this->keyModified['notify'] = 1; 

	}

	/**
	 * The method to get the table
	 * @return string A string representing the table
	 */
	public  function getTable()
	{
		return $this->table; 

	}

	/**
	 * The method to set the value to table
	 * @param string $table A string
	 */
	public  function setTable(string $table)
	{
		$this->table=$table; 
		$this->keyModified['table'] = 1; 

	}

	/**
	 * The method to get the status
	 * @return int A int representing the status
	 */
	public  function getStatus()
	{
		return $this->status; 

	}

	/**
	 * The method to set the value to status
	 * @param int $status A int
	 */
	public  function setStatus(int $status)
	{
		$this->status=$status; 
		$this->keyModified['status'] = 1; 

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
