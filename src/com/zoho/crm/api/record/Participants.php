<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class Participants extends Record implements Model
{


	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public  function getName()
	{
		return $this->getKeyValue('name'); 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public  function setName(string $name)
	{
		$this->addKeyValue('name', $name); 

	}

	/**
	 * The method to get the email
	 * @return string A string representing the email
	 */
	public  function getEmail()
	{
		return $this->getKeyValue('Email'); 

	}

	/**
	 * The method to set the value to email
	 * @param string $email A string
	 */
	public  function setEmail(string $email)
	{
		$this->addKeyValue('Email', $email); 

	}

	/**
	 * The method to get the invited
	 * @return bool A bool representing the invited
	 */
	public  function getInvited()
	{
		return $this->getKeyValue('invited'); 

	}

	/**
	 * The method to set the value to invited
	 * @param bool $invited A bool
	 */
	public  function setInvited(bool $invited)
	{
		$this->addKeyValue('invited', $invited); 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public  function getType()
	{
		return $this->getKeyValue('type'); 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public  function setType(string $type)
	{
		$this->addKeyValue('type', $type); 

	}

	/**
	 * The method to get the participant
	 * @return string A string representing the participant
	 */
	public  function getParticipant()
	{
		return $this->getKeyValue('participant'); 

	}

	/**
	 * The method to set the value to participant
	 * @param string $participant A string
	 */
	public  function setParticipant(string $participant)
	{
		$this->addKeyValue('participant', $participant); 

	}

	/**
	 * The method to get the status
	 * @return string A string representing the status
	 */
	public  function getStatus()
	{
		return $this->getKeyValue('status'); 

	}

	/**
	 * The method to set the value to status
	 * @param string $status A string
	 */
	public  function setStatus(string $status)
	{
		$this->addKeyValue('status', $status); 

	}
} 
