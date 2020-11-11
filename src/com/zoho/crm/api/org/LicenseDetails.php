<?php 
namespace com\zoho\crm\api\org;

use com\zoho\crm\api\util\Model;

class LicenseDetails implements Model
{

	private  $paidExpiry;
	private  $usersLicensePurchased;
	private  $trialType;
	private  $trialExpiry;
	private  $paid;
	private  $paidType;
	private  $keyModified=array();

	/**
	 * The method to get the paidExpiry
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getPaidExpiry()
	{
		return $this->paidExpiry; 

	}

	/**
	 * The method to set the value to paidExpiry
	 * @param \DateTime $paidExpiry An instance of \DateTime
	 */
	public  function setPaidExpiry(\DateTime $paidExpiry)
	{
		$this->paidExpiry=$paidExpiry; 
		$this->keyModified['paid_expiry'] = 1; 

	}

	/**
	 * The method to get the usersLicensePurchased
	 * @return string A string representing the usersLicensePurchased
	 */
	public  function getUsersLicensePurchased()
	{
		return $this->usersLicensePurchased; 

	}

	/**
	 * The method to set the value to usersLicensePurchased
	 * @param string $usersLicensePurchased A string
	 */
	public  function setUsersLicensePurchased(string $usersLicensePurchased)
	{
		$this->usersLicensePurchased=$usersLicensePurchased; 
		$this->keyModified['users_license_purchased'] = 1; 

	}

	/**
	 * The method to get the trialType
	 * @return string A string representing the trialType
	 */
	public  function getTrialType()
	{
		return $this->trialType; 

	}

	/**
	 * The method to set the value to trialType
	 * @param string $trialType A string
	 */
	public  function setTrialType(string $trialType)
	{
		$this->trialType=$trialType; 
		$this->keyModified['trial_type'] = 1; 

	}

	/**
	 * The method to get the trialExpiry
	 * @return string A string representing the trialExpiry
	 */
	public  function getTrialExpiry()
	{
		return $this->trialExpiry; 

	}

	/**
	 * The method to set the value to trialExpiry
	 * @param string $trialExpiry A string
	 */
	public  function setTrialExpiry(string $trialExpiry)
	{
		$this->trialExpiry=$trialExpiry; 
		$this->keyModified['trial_expiry'] = 1; 

	}

	/**
	 * The method to get the paid
	 * @return bool A bool representing the paid
	 */
	public  function getPaid()
	{
		return $this->paid; 

	}

	/**
	 * The method to set the value to paid
	 * @param bool $paid A bool
	 */
	public  function setPaid(bool $paid)
	{
		$this->paid=$paid; 
		$this->keyModified['paid'] = 1; 

	}

	/**
	 * The method to get the paidType
	 * @return string A string representing the paidType
	 */
	public  function getPaidType()
	{
		return $this->paidType; 

	}

	/**
	 * The method to set the value to paidType
	 * @param string $paidType A string
	 */
	public  function setPaidType(string $paidType)
	{
		$this->paidType=$paidType; 
		$this->keyModified['paid_type'] = 1; 

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
