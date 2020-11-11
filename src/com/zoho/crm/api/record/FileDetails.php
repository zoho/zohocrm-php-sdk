<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class FileDetails implements Model
{

	private  $extn;
	private  $isPreviewAvailable;
	private  $downloadUrl;
	private  $deleteUrl;
	private  $entityId;
	private  $mode;
	private  $originalSizeByte;
	private  $previewUrl;
	private  $fileName;
	private  $fileId;
	private  $attachmentId;
	private  $fileSize;
	private  $creatorId;
	private  $linkDocs;
	private  $delete;
	private  $keyModified=array();

	/**
	 * The method to get the extn
	 * @return string A string representing the extn
	 */
	public  function getExtn()
	{
		return $this->extn; 

	}

	/**
	 * The method to set the value to extn
	 * @param string $extn A string
	 */
	public  function setExtn(string $extn)
	{
		$this->extn=$extn; 
		$this->keyModified['extn'] = 1; 

	}

	/**
	 * The method to get the isPreviewAvailable
	 * @return bool A bool representing the isPreviewAvailable
	 */
	public  function getIsPreviewAvailable()
	{
		return $this->isPreviewAvailable; 

	}

	/**
	 * The method to set the value to isPreviewAvailable
	 * @param bool $isPreviewAvailable A bool
	 */
	public  function setIsPreviewAvailable(bool $isPreviewAvailable)
	{
		$this->isPreviewAvailable=$isPreviewAvailable; 
		$this->keyModified['is_Preview_Available'] = 1; 

	}

	/**
	 * The method to get the downloadUrl
	 * @return string A string representing the downloadUrl
	 */
	public  function getDownloadUrl()
	{
		return $this->downloadUrl; 

	}

	/**
	 * The method to set the value to downloadUrl
	 * @param string $downloadUrl A string
	 */
	public  function setDownloadUrl(string $downloadUrl)
	{
		$this->downloadUrl=$downloadUrl; 
		$this->keyModified['download_Url'] = 1; 

	}

	/**
	 * The method to get the deleteUrl
	 * @return string A string representing the deleteUrl
	 */
	public  function getDeleteUrl()
	{
		return $this->deleteUrl; 

	}

	/**
	 * The method to set the value to deleteUrl
	 * @param string $deleteUrl A string
	 */
	public  function setDeleteUrl(string $deleteUrl)
	{
		$this->deleteUrl=$deleteUrl; 
		$this->keyModified['delete_Url'] = 1; 

	}

	/**
	 * The method to get the entityId
	 * @return string A string representing the entityId
	 */
	public  function getEntityId()
	{
		return $this->entityId; 

	}

	/**
	 * The method to set the value to entityId
	 * @param string $entityId A string
	 */
	public  function setEntityId(string $entityId)
	{
		$this->entityId=$entityId; 
		$this->keyModified['entity_Id'] = 1; 

	}

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
	 * The method to get the originalSizeByte
	 * @return string A string representing the originalSizeByte
	 */
	public  function getOriginalSizeByte()
	{
		return $this->originalSizeByte; 

	}

	/**
	 * The method to set the value to originalSizeByte
	 * @param string $originalSizeByte A string
	 */
	public  function setOriginalSizeByte(string $originalSizeByte)
	{
		$this->originalSizeByte=$originalSizeByte; 
		$this->keyModified['original_Size_Byte'] = 1; 

	}

	/**
	 * The method to get the previewUrl
	 * @return string A string representing the previewUrl
	 */
	public  function getPreviewUrl()
	{
		return $this->previewUrl; 

	}

	/**
	 * The method to set the value to previewUrl
	 * @param string $previewUrl A string
	 */
	public  function setPreviewUrl(string $previewUrl)
	{
		$this->previewUrl=$previewUrl; 
		$this->keyModified['preview_Url'] = 1; 

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
		$this->keyModified['file_Name'] = 1; 

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
		$this->keyModified['file_Id'] = 1; 

	}

	/**
	 * The method to get the attachmentId
	 * @return string A string representing the attachmentId
	 */
	public  function getAttachmentId()
	{
		return $this->attachmentId; 

	}

	/**
	 * The method to set the value to attachmentId
	 * @param string $attachmentId A string
	 */
	public  function setAttachmentId(string $attachmentId)
	{
		$this->attachmentId=$attachmentId; 
		$this->keyModified['attachment_Id'] = 1; 

	}

	/**
	 * The method to get the fileSize
	 * @return string A string representing the fileSize
	 */
	public  function getFileSize()
	{
		return $this->fileSize; 

	}

	/**
	 * The method to set the value to fileSize
	 * @param string $fileSize A string
	 */
	public  function setFileSize(string $fileSize)
	{
		$this->fileSize=$fileSize; 
		$this->keyModified['file_Size'] = 1; 

	}

	/**
	 * The method to get the creatorId
	 * @return string A string representing the creatorId
	 */
	public  function getCreatorId()
	{
		return $this->creatorId; 

	}

	/**
	 * The method to set the value to creatorId
	 * @param string $creatorId A string
	 */
	public  function setCreatorId(string $creatorId)
	{
		$this->creatorId=$creatorId; 
		$this->keyModified['creator_Id'] = 1; 

	}

	/**
	 * The method to get the linkDocs
	 * @return int A int representing the linkDocs
	 */
	public  function getLinkDocs()
	{
		return $this->linkDocs; 

	}

	/**
	 * The method to set the value to linkDocs
	 * @param int $linkDocs A int
	 */
	public  function setLinkDocs(int $linkDocs)
	{
		$this->linkDocs=$linkDocs; 
		$this->keyModified['link_Docs'] = 1; 

	}

	/**
	 * The method to get the delete
	 * @return string A string representing the delete
	 */
	public  function getDelete()
	{
		return $this->delete; 

	}

	/**
	 * The method to set the value to delete
	 * @param string $delete A string
	 */
	public  function setDelete(string $delete)
	{
		$this->delete=$delete; 
		$this->keyModified['_delete'] = 1; 

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
