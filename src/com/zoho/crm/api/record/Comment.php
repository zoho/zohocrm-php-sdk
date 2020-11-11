<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class Comment implements Model
{

	private  $commentedBy;
	private  $commentedTime;
	private  $commentContent;
	private  $id;
	private  $keyModified=array();

	/**
	 * The method to get the commentedBy
	 * @return string A string representing the commentedBy
	 */
	public  function getCommentedBy()
	{
		return $this->commentedBy; 

	}

	/**
	 * The method to set the value to commentedBy
	 * @param string $commentedBy A string
	 */
	public  function setCommentedBy(string $commentedBy)
	{
		$this->commentedBy=$commentedBy; 
		$this->keyModified['commented_by'] = 1; 

	}

	/**
	 * The method to get the commentedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getCommentedTime()
	{
		return $this->commentedTime; 

	}

	/**
	 * The method to set the value to commentedTime
	 * @param \DateTime $commentedTime An instance of \DateTime
	 */
	public  function setCommentedTime(\DateTime $commentedTime)
	{
		$this->commentedTime=$commentedTime; 
		$this->keyModified['commented_time'] = 1; 

	}

	/**
	 * The method to get the commentContent
	 * @return string A string representing the commentContent
	 */
	public  function getCommentContent()
	{
		return $this->commentContent; 

	}

	/**
	 * The method to set the value to commentContent
	 * @param string $commentContent A string
	 */
	public  function setCommentContent(string $commentContent)
	{
		$this->commentContent=$commentContent; 
		$this->keyModified['comment_content'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public  function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public  function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

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
