<?php 
namespace com\zoho\crm\api\notification;

use com\zoho\crm\api\util\Model;

class Notification implements Model
{

	private  $channelExpiry;
	private  $resourceUri;
	private  $resourceId;
	private  $notifyUrl;
	private  $resourceName;
	private  $channelId;
	private  $events;
	private  $token;
	private  $notifyOnRelatedAction;
	private  $fields;
	private  $deleteevents;
	private  $keyModified=array();

	/**
	 * The method to get the channelExpiry
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getChannelExpiry()
	{
		return $this->channelExpiry; 

	}

	/**
	 * The method to set the value to channelExpiry
	 * @param \DateTime $channelExpiry An instance of \DateTime
	 */
	public  function setChannelExpiry(\DateTime $channelExpiry)
	{
		$this->channelExpiry=$channelExpiry; 
		$this->keyModified['channel_expiry'] = 1; 

	}

	/**
	 * The method to get the resourceUri
	 * @return string A string representing the resourceUri
	 */
	public  function getResourceUri()
	{
		return $this->resourceUri; 

	}

	/**
	 * The method to set the value to resourceUri
	 * @param string $resourceUri A string
	 */
	public  function setResourceUri(string $resourceUri)
	{
		$this->resourceUri=$resourceUri; 
		$this->keyModified['resource_uri'] = 1; 

	}

	/**
	 * The method to get the resourceId
	 * @return string A string representing the resourceId
	 */
	public  function getResourceId()
	{
		return $this->resourceId; 

	}

	/**
	 * The method to set the value to resourceId
	 * @param string $resourceId A string
	 */
	public  function setResourceId(string $resourceId)
	{
		$this->resourceId=$resourceId; 
		$this->keyModified['resource_id'] = 1; 

	}

	/**
	 * The method to get the notifyUrl
	 * @return string A string representing the notifyUrl
	 */
	public  function getNotifyUrl()
	{
		return $this->notifyUrl; 

	}

	/**
	 * The method to set the value to notifyUrl
	 * @param string $notifyUrl A string
	 */
	public  function setNotifyUrl(string $notifyUrl)
	{
		$this->notifyUrl=$notifyUrl; 
		$this->keyModified['notify_url'] = 1; 

	}

	/**
	 * The method to get the resourceName
	 * @return string A string representing the resourceName
	 */
	public  function getResourceName()
	{
		return $this->resourceName; 

	}

	/**
	 * The method to set the value to resourceName
	 * @param string $resourceName A string
	 */
	public  function setResourceName(string $resourceName)
	{
		$this->resourceName=$resourceName; 
		$this->keyModified['resource_name'] = 1; 

	}

	/**
	 * The method to get the channelId
	 * @return string A string representing the channelId
	 */
	public  function getChannelId()
	{
		return $this->channelId; 

	}

	/**
	 * The method to set the value to channelId
	 * @param string $channelId A string
	 */
	public  function setChannelId(string $channelId)
	{
		$this->channelId=$channelId; 
		$this->keyModified['channel_id'] = 1; 

	}

	/**
	 * The method to get the events
	 * @return array A array representing the events
	 */
	public  function getEvents()
	{
		return $this->events; 

	}

	/**
	 * The method to set the value to events
	 * @param array $events A array
	 */
	public  function setEvents(array $events)
	{
		$this->events=$events; 
		$this->keyModified['events'] = 1; 

	}

	/**
	 * The method to get the token
	 * @return string A string representing the token
	 */
	public  function getToken()
	{
		return $this->token; 

	}

	/**
	 * The method to set the value to token
	 * @param string $token A string
	 */
	public  function setToken(string $token)
	{
		$this->token=$token; 
		$this->keyModified['token'] = 1; 

	}

	/**
	 * The method to get the notifyOnRelatedAction
	 * @return bool A bool representing the notifyOnRelatedAction
	 */
	public  function getNotifyOnRelatedAction()
	{
		return $this->notifyOnRelatedAction; 

	}

	/**
	 * The method to set the value to notifyOnRelatedAction
	 * @param bool $notifyOnRelatedAction A bool
	 */
	public  function setNotifyOnRelatedAction(bool $notifyOnRelatedAction)
	{
		$this->notifyOnRelatedAction=$notifyOnRelatedAction; 
		$this->keyModified['notify_on_related_action'] = 1; 

	}

	/**
	 * The method to get the fields
	 * @return array A array representing the fields
	 */
	public  function getFields()
	{
		return $this->fields; 

	}

	/**
	 * The method to set the value to fields
	 * @param array $fields A array
	 */
	public  function setFields(array $fields)
	{
		$this->fields=$fields; 
		$this->keyModified['fields'] = 1; 

	}

	/**
	 * The method to get the deleteevents
	 * @return bool A bool representing the deleteevents
	 */
	public  function getDeleteevents()
	{
		return $this->deleteevents; 

	}

	/**
	 * The method to set the value to deleteevents
	 * @param bool $deleteevents A bool
	 */
	public  function setDeleteevents(bool $deleteevents)
	{
		$this->deleteevents=$deleteevents; 
		$this->keyModified['_delete_events'] = 1; 

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
