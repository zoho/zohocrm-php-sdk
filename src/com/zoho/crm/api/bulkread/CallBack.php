<?php 
namespace com\zoho\crm\api\bulkread;

use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class CallBack implements Model
{

	private  $url;
	private  $method;
	private  $keyModified=array();

	/**
	 * The method to get the url
	 * @return string A string representing the url
	 */
	public  function getUrl()
	{
		return $this->url; 

	}

	/**
	 * The method to set the value to url
	 * @param string $url A string
	 */
	public  function setUrl(string $url)
	{
		$this->url=$url; 
		$this->keyModified['url'] = 1; 

	}

	/**
	 * The method to get the method
	 * @return Choice An instance of Choice
	 */
	public  function getMethod()
	{
		return $this->method; 

	}

	/**
	 * The method to set the value to method
	 * @param Choice $method An instance of Choice
	 */
	public  function setMethod(Choice $method)
	{
		$this->method=$method; 
		$this->keyModified['method'] = 1; 

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
