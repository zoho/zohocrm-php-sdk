<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\util\Model;

class Translation implements Model
{

	private  $publicViews;
	private  $otherUsersViews;
	private  $sharedWithMe;
	private  $createdByMe;
	private  $keyModified=array();

	/**
	 * The method to get the publicViews
	 * @return string A string representing the publicViews
	 */
	public  function getPublicViews()
	{
		return $this->publicViews; 

	}

	/**
	 * The method to set the value to publicViews
	 * @param string $publicViews A string
	 */
	public  function setPublicViews(string $publicViews)
	{
		$this->publicViews=$publicViews; 
		$this->keyModified['public_views'] = 1; 

	}

	/**
	 * The method to get the otherUsersViews
	 * @return string A string representing the otherUsersViews
	 */
	public  function getOtherUsersViews()
	{
		return $this->otherUsersViews; 

	}

	/**
	 * The method to set the value to otherUsersViews
	 * @param string $otherUsersViews A string
	 */
	public  function setOtherUsersViews(string $otherUsersViews)
	{
		$this->otherUsersViews=$otherUsersViews; 
		$this->keyModified['other_users_views'] = 1; 

	}

	/**
	 * The method to get the sharedWithMe
	 * @return string A string representing the sharedWithMe
	 */
	public  function getSharedWithMe()
	{
		return $this->sharedWithMe; 

	}

	/**
	 * The method to set the value to sharedWithMe
	 * @param string $sharedWithMe A string
	 */
	public  function setSharedWithMe(string $sharedWithMe)
	{
		$this->sharedWithMe=$sharedWithMe; 
		$this->keyModified['shared_with_me'] = 1; 

	}

	/**
	 * The method to get the createdByMe
	 * @return string A string representing the createdByMe
	 */
	public  function getCreatedByMe()
	{
		return $this->createdByMe; 

	}

	/**
	 * The method to set the value to createdByMe
	 * @param string $createdByMe A string
	 */
	public  function setCreatedByMe(string $createdByMe)
	{
		$this->createdByMe=$createdByMe; 
		$this->keyModified['created_by_me'] = 1; 

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
