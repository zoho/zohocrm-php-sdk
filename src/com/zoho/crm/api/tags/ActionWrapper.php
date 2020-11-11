<?php 
namespace com\zoho\crm\api\tags;

use com\zoho\crm\api\util\Model;

class ActionWrapper implements Model, ActionHandler
{

	private  $tags;
	private  $keyModified=array();

	/**
	 * The method to get the tags
	 * @return array A array representing the tags
	 */
	public  function getTags()
	{
		return $this->tags; 

	}

	/**
	 * The method to set the value to tags
	 * @param array $tags A array
	 */
	public  function setTags(array $tags)
	{
		$this->tags=$tags; 
		$this->keyModified['tags'] = 1; 

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
