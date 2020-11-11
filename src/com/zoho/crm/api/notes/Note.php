<?php 
namespace com\zoho\crm\api\notes;

use com\zoho\crm\api\attachments\Attachment;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class Note implements Model
{

	private  $owner;
	private  $modifiedTime;
	private  $attachments;
	private  $createdTime;
	private  $parentId;
	private  $editable;
	private  $seModule;
	private  $isSharedToClient;
	private  $modifiedBy;
	private  $size;
	private  $state;
	private  $voiceNote;
	private  $id;
	private  $createdBy;
	private  $noteTitle;
	private  $noteContent;
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
	 * The method to get the attachments
	 * @return array A array representing the attachments
	 */
	public  function getAttachments()
	{
		return $this->attachments; 

	}

	/**
	 * The method to set the value to attachments
	 * @param array $attachments A array
	 */
	public  function setAttachments(array $attachments)
	{
		$this->attachments=$attachments; 
		$this->keyModified['$attachments'] = 1; 

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
	 * The method to get the isSharedToClient
	 * @return bool A bool representing the isSharedToClient
	 */
	public  function getIsSharedToClient()
	{
		return $this->isSharedToClient; 

	}

	/**
	 * The method to set the value to isSharedToClient
	 * @param bool $isSharedToClient A bool
	 */
	public  function setIsSharedToClient(bool $isSharedToClient)
	{
		$this->isSharedToClient=$isSharedToClient; 
		$this->keyModified['$is_shared_to_client'] = 1; 

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
		$this->keyModified['$size'] = 1; 

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
	 * The method to get the voiceNote
	 * @return bool A bool representing the voiceNote
	 */
	public  function getVoiceNote()
	{
		return $this->voiceNote; 

	}

	/**
	 * The method to set the value to voiceNote
	 * @param bool $voiceNote A bool
	 */
	public  function setVoiceNote(bool $voiceNote)
	{
		$this->voiceNote=$voiceNote; 
		$this->keyModified['$voice_note'] = 1; 

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
	 * The method to get the noteTitle
	 * @return string A string representing the noteTitle
	 */
	public  function getNoteTitle()
	{
		return $this->noteTitle; 

	}

	/**
	 * The method to set the value to noteTitle
	 * @param string $noteTitle A string
	 */
	public  function setNoteTitle(string $noteTitle)
	{
		$this->noteTitle=$noteTitle; 
		$this->keyModified['Note_Title'] = 1; 

	}

	/**
	 * The method to get the noteContent
	 * @return string A string representing the noteContent
	 */
	public  function getNoteContent()
	{
		return $this->noteContent; 

	}

	/**
	 * The method to set the value to noteContent
	 * @param string $noteContent A string
	 */
	public  function setNoteContent(string $noteContent)
	{
		$this->noteContent=$noteContent; 
		$this->keyModified['Note_Content'] = 1; 

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
