<?php 
namespace com\zoho\crm\api\attachments;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class Attachment implements Model
{

	private  $owner;
	private  $modifiedTime;
	private  $fileName;
	private  $createdTime;
	private  $size;
	private  $parentId;
	private  $editable;
	private  $fileId;
	private  $type;
	private  $seModule;
	private  $modifiedBy;
	private  $state;
	private  $id;
	private  $createdBy;
	private  $linkUrl;
	private  $description;
	private  $category;
	private  $keyModified=array();

	/**
	 * The method to get the owner
	 * @return User An instance of User
	 */
	public  function getOwner()
	{
		return $this->owner; 

	}

	/**
	 * The method to set the value to owner
	 * @param User $owner An instance of User
	 */
	public  function setOwner(User $owner)
	{
		$this->owner=$owner; 
		$this->keyModified['Owner'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public  function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['Modified_Time'] = 1; 

	}

	/**
	 * The method to get the fileName
	 * @return string A string representing the fileName
	 */
	public  function getFileName()
	{
		return $this->fileName; 

	}

	/**
	 * The method to set the value to fileName
	 * @param string $fileName A string
	 */
	public  function setFileName(string $fileName)
	{
		$this->fileName=$fileName; 
		$this->keyModified['File_Name'] = 1; 

	}

	/**
	 * The method to get the createdTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getCreatedTime()
	{
		return $this->createdTime; 

	}

	/**
	 * The method to set the value to createdTime
	 * @param \DateTime $createdTime An instance of \DateTime
	 */
	public  function setCreatedTime(\DateTime $createdTime)
	{
		$this->createdTime=$createdTime; 
		$this->keyModified['Created_Time'] = 1; 

	}

	/**
	 * The method to get the size
	 * @return string A string representing the size
	 */
	public  function getSize()
	{
		return $this->size; 

	}

	/**
	 * The method to set the value to size
	 * @param string $size A string
	 */
	public  function setSize(string $size)
	{
		$this->size=$size; 
		$this->keyModified['Size'] = 1; 

	}

	/**
	 * The method to get the parentId
	 * @return Record An instance of Record
	 */
	public  function getParentId()
	{
		return $this->parentId; 

	}

	/**
	 * The method to set the value to parentId
	 * @param Record $parentId An instance of Record
	 */
	public  function setParentId(Record $parentId)
	{
		$this->parentId=$parentId; 
		$this->keyModified['Parent_Id'] = 1; 

	}

	/**
	 * The method to get the editable
	 * @return bool A bool representing the editable
	 */
	public  function getEditable()
	{
		return $this->editable; 

	}

	/**
	 * The method to set the value to editable
	 * @param bool $editable A bool
	 */
	public  function setEditable(bool $editable)
	{
		$this->editable=$editable; 
		$this->keyModified['$editable'] = 1; 

	}

	/**
	 * The method to get the fileId
	 * @return string A string representing the fileId
	 */
	public  function getFileId()
	{
		return $this->fileId; 

	}

	/**
	 * The method to set the value to fileId
	 * @param string $fileId A string
	 */
	public  function setFileId(string $fileId)
	{
		$this->fileId=$fileId; 
		$this->keyModified['$file_id'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public  function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public  function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['$type'] = 1; 

	}

	/**
	 * The method to get the seModule
	 * @return string A string representing the seModule
	 */
	public  function getSeModule()
	{
		return $this->seModule; 

	}

	/**
	 * The method to set the value to seModule
	 * @param string $seModule A string
	 */
	public  function setSeModule(string $seModule)
	{
		$this->seModule=$seModule; 
		$this->keyModified['$se_module'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public  function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public  function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['Modified_By'] = 1; 

	}

	/**
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public  function getState()
	{
		return $this->state; 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public  function setState(string $state)
	{
		$this->state=$state; 
		$this->keyModified['$state'] = 1; 

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
	 * The method to get the createdBy
	 * @return User An instance of User
	 */
	public  function getCreatedBy()
	{
		return $this->createdBy; 

	}

	/**
	 * The method to set the value to createdBy
	 * @param User $createdBy An instance of User
	 */
	public  function setCreatedBy(User $createdBy)
	{
		$this->createdBy=$createdBy; 
		$this->keyModified['Created_By'] = 1; 

	}

	/**
	 * The method to get the linkUrl
	 * @return string A string representing the linkUrl
	 */
	public  function getLinkUrl()
	{
		return $this->linkUrl; 

	}

	/**
	 * The method to set the value to linkUrl
	 * @param string $linkUrl A string
	 */
	public  function setLinkUrl(string $linkUrl)
	{
		$this->linkUrl=$linkUrl; 
		$this->keyModified['$link_url'] = 1; 

	}

	/**
	 * The method to get the description
	 * @return string A string representing the description
	 */
	public  function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param string $description A string
	 */
	public  function setDescription(string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return string A string representing the category
	 */
	public  function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param string $category A string
	 */
	public  function setCategory(string $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

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
