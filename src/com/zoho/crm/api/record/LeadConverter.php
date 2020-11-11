<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\util\Model;

class LeadConverter implements Model
{

	private  $overwrite;
	private  $notifyLeadOwner;
	private  $notifyNewEntityOwner;
	private  $accounts;
	private  $contacts;
	private  $assignTo;
	private  $deals;
	private  $keyModified=array();

	/**
	 * The method to get the overwrite
	 * @return bool A bool representing the overwrite
	 */
	public  function getOverwrite()
	{
		return $this->overwrite; 

	}

	/**
	 * The method to set the value to overwrite
	 * @param bool $overwrite A bool
	 */
	public  function setOverwrite(bool $overwrite)
	{
		$this->overwrite=$overwrite; 
		$this->keyModified['overwrite'] = 1; 

	}

	/**
	 * The method to get the notifyLeadOwner
	 * @return bool A bool representing the notifyLeadOwner
	 */
	public  function getNotifyLeadOwner()
	{
		return $this->notifyLeadOwner; 

	}

	/**
	 * The method to set the value to notifyLeadOwner
	 * @param bool $notifyLeadOwner A bool
	 */
	public  function setNotifyLeadOwner(bool $notifyLeadOwner)
	{
		$this->notifyLeadOwner=$notifyLeadOwner; 
		$this->keyModified['notify_lead_owner'] = 1; 

	}

	/**
	 * The method to get the notifyNewEntityOwner
	 * @return bool A bool representing the notifyNewEntityOwner
	 */
	public  function getNotifyNewEntityOwner()
	{
		return $this->notifyNewEntityOwner; 

	}

	/**
	 * The method to set the value to notifyNewEntityOwner
	 * @param bool $notifyNewEntityOwner A bool
	 */
	public  function setNotifyNewEntityOwner(bool $notifyNewEntityOwner)
	{
		$this->notifyNewEntityOwner=$notifyNewEntityOwner; 
		$this->keyModified['notify_new_entity_owner'] = 1; 

	}

	/**
	 * The method to get the accounts
	 * @return string A string representing the accounts
	 */
	public  function getAccounts()
	{
		return $this->accounts; 

	}

	/**
	 * The method to set the value to accounts
	 * @param string $accounts A string
	 */
	public  function setAccounts(string $accounts)
	{
		$this->accounts=$accounts; 
		$this->keyModified['Accounts'] = 1; 

	}

	/**
	 * The method to get the contacts
	 * @return string A string representing the contacts
	 */
	public  function getContacts()
	{
		return $this->contacts; 

	}

	/**
	 * The method to set the value to contacts
	 * @param string $contacts A string
	 */
	public  function setContacts(string $contacts)
	{
		$this->contacts=$contacts; 
		$this->keyModified['Contacts'] = 1; 

	}

	/**
	 * The method to get the assignTo
	 * @return string A string representing the assignTo
	 */
	public  function getAssignTo()
	{
		return $this->assignTo; 

	}

	/**
	 * The method to set the value to assignTo
	 * @param string $assignTo A string
	 */
	public  function setAssignTo(string $assignTo)
	{
		$this->assignTo=$assignTo; 
		$this->keyModified['assign_to'] = 1; 

	}

	/**
	 * The method to get the deals
	 * @return Record An instance of Record
	 */
	public  function getDeals()
	{
		return $this->deals; 

	}

	/**
	 * The method to set the value to deals
	 * @param Record $deals An instance of Record
	 */
	public  function setDeals(Record $deals)
	{
		$this->deals=$deals; 
		$this->keyModified['Deals'] = 1; 

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
