<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class Record implements Model
{

	protected  $keyValues=array();
	private  $keyModified=array();

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public  function getId()
	{
		return $this->getKeyValue('id'); 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public  function setId(string $id)
	{
		$this->addKeyValue('id', $id); 

	}

	/**
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public  function getCreatedBy()
	{
		return $this->getKeyValue('Created_By'); 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public  function setCreatedBy(User $createdBy)
	{
		$this->addKeyValue('Created_By', $createdBy); 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getCreatedTime()
	{
		return $this->getKeyValue('Created_Time'); 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public  function setCreatedTime(\DateTime $createdTime)
	{
		$this->addKeyValue('Created_Time', $createdTime); 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public  function getModifiedBy()
	{
		return $this->getKeyValue('Modified_By'); 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public  function setModifiedBy(User $modifiedBy)
	{
		$this->addKeyValue('Modified_By', $modifiedBy); 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getModifiedTime()
	{
		return $this->getKeyValue('Modified_Time'); 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public  function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->addKeyValue('Modified_Time', $modifiedTime); 

	}

	/**
	 * The method to get the tag
	 * @return array A array representing the tag
	 */
	public  function getTag()
	{
		return $this->getKeyValue('Tag'); 

	}

	/**
	 * The method to set the value to tag
	 * @param array $tag A array
	 */
	public  function setTag(array $tag)
	{
		$this->addKeyValue('Tag', $tag); 

	}

	/**
	 * The method to add field value
	 * @param Field $field An instance of Field
	 * @param 
	 */
	public  function addFieldValue(Field $field,  $value)
	{
		$this->addKeyValue($field->getAPIName(), $value); 

	}

	/**
	 * The method to add key value
	 * @param string $apiName A string
	 * @param 
	 */
	public  function addKeyValue(string $apiName,  $value)
	{
		$this->keyValues[$apiName] = $value; 
		$this->keyModified[$apiName] = 1; 

	}

	/**
	 * The method to get key value
	 * @param string $apiName A string
	 */
	public  function getKeyValue(string $apiName)
	{
		if(((array_key_exists($apiName, $this->keyValues))))
		{
			return $this->keyValues[$apiName]; 

		}
		return null; 

	}

	/**
	 * The method to get key values
	 * @return array A array representing the keyValues
	 */
	public  function getKeyValues()
	{
		return $this->keyValues; 

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
