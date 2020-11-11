<?php 
namespace com\zoho\crm\api\roles;

use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class Role implements Model
{

	private  $displayLabel;
	private  $forecastManager;
	private  $shareWithPeers;
	private  $name;
	private  $description;
	private  $id;
	private  $reportingTo;
	private  $adminUser;
	private  $keyModified=array();

	/**
	 * The method to get the displayLabel
	 * @return string A string representing the displayLabel
	 */
	public  function getDisplayLabel()
	{
		return $this->displayLabel; 

	}

	/**
	 * The method to set the value to displayLabel
	 * @param string $displayLabel A string
	 */
	public  function setDisplayLabel(string $displayLabel)
	{
		$this->displayLabel=$displayLabel; 
		$this->keyModified['display_label'] = 1; 

	}

	/**
	 * The method to get the forecastManager
	 * @return User An instance of User
	 */
	public  function getForecastManager()
	{
		return $this->forecastManager; 

	}

	/**
	 * The method to set the value to forecastManager
	 * @param User $forecastManager An instance of User
	 */
	public  function setForecastManager(User $forecastManager)
	{
		$this->forecastManager=$forecastManager; 
		$this->keyModified['forecast_manager'] = 1; 

	}

	/**
	 * The method to get the shareWithPeers
	 * @return bool A bool representing the shareWithPeers
	 */
	public  function getShareWithPeers()
	{
		return $this->shareWithPeers; 

	}

	/**
	 * The method to set the value to shareWithPeers
	 * @param bool $shareWithPeers A bool
	 */
	public  function setShareWithPeers(bool $shareWithPeers)
	{
		$this->shareWithPeers=$shareWithPeers; 
		$this->keyModified['share_with_peers'] = 1; 

	}

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public  function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public  function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

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
	 * The method to get the reportingTo
	 * @return User An instance of User
	 */
	public  function getReportingTo()
	{
		return $this->reportingTo; 

	}

	/**
	 * The method to set the value to reportingTo
	 * @param User $reportingTo An instance of User
	 */
	public  function setReportingTo(User $reportingTo)
	{
		$this->reportingTo=$reportingTo; 
		$this->keyModified['reporting_to'] = 1; 

	}

	/**
	 * The method to get the adminUser
	 * @return bool A bool representing the adminUser
	 */
	public  function getAdminUser()
	{
		return $this->adminUser; 

	}

	/**
	 * The method to set the value to adminUser
	 * @param bool $adminUser A bool
	 */
	public  function setAdminUser(bool $adminUser)
	{
		$this->adminUser=$adminUser; 
		$this->keyModified['admin_user'] = 1; 

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
