<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\util\Model;

class ConflictWrapper implements Model
{

	private  $conflictId;
	private  $keyModified=array();

	/**
	 * The method to get the conflictId
	 * @return string A string representing the conflictId
	 */
	public  function getConflictId()
	{
		return $this->conflictId; 

	}

	/**
	 * The method to set the value to conflictId
	 * @param string $conflictId A string
	 */
	public  function setConflictId(string $conflictId)
	{
		$this->conflictId=$conflictId; 
		$this->keyModified['conflict_id'] = 1; 

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
