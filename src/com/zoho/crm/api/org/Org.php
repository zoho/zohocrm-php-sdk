<?php 
namespace com\zoho\crm\api\org;

use com\zoho\crm\api\util\Model;

class Org implements Model
{

	private  $country;
	private  $photoId;
	private  $city;
	private  $description;
	private  $mcStatus;
	private  $gappsEnabled;
	private  $domainName;
	private  $translationEnabled;
	private  $street;
	private  $alias;
	private  $currency;
	private  $id;
	private  $state;
	private  $fax;
	private  $employeeCount;
	private  $zip;
	private  $website;
	private  $currencySymbol;
	private  $mobile;
	private  $currencyLocale;
	private  $primaryZuid;
	private  $ziaPortalId;
	private  $timeZone;
	private  $zgid;
	private  $countryCode;
	private  $licenseDetails;
	private  $phone;
	private  $companyName;
	private  $privacySettings;
	private  $primaryEmail;
	private  $isoCode;
	private  $keyModified=array();

	/**
	 * The method to get the country
	 * @return string A string representing the country
	 */
	public  function getCountry()
	{
		return $this->country; 

	}

	/**
	 * The method to set the value to country
	 * @param string $country A string
	 */
	public  function setCountry(string $country)
	{
		$this->country=$country; 
		$this->keyModified['country'] = 1; 

	}

	/**
	 * The method to get the photoId
	 * @return string A string representing the photoId
	 */
	public  function getPhotoId()
	{
		return $this->photoId; 

	}

	/**
	 * The method to set the value to photoId
	 * @param string $photoId A string
	 */
	public  function setPhotoId(string $photoId)
	{
		$this->photoId=$photoId; 
		$this->keyModified['photo_id'] = 1; 

	}

	/**
	 * The method to get the city
	 * @return string A string representing the city
	 */
	public  function getCity()
	{
		return $this->city; 

	}

	/**
	 * The method to set the value to city
	 * @param string $city A string
	 */
	public  function setCity(string $city)
	{
		$this->city=$city; 
		$this->keyModified['city'] = 1; 

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
	 * The method to get the mcStatus
	 * @return bool A bool representing the mcStatus
	 */
	public  function getMcStatus()
	{
		return $this->mcStatus; 

	}

	/**
	 * The method to set the value to mcStatus
	 * @param bool $mcStatus A bool
	 */
	public  function setMcStatus(bool $mcStatus)
	{
		$this->mcStatus=$mcStatus; 
		$this->keyModified['mc_status'] = 1; 

	}

	/**
	 * The method to get the gappsEnabled
	 * @return bool A bool representing the gappsEnabled
	 */
	public  function getGappsEnabled()
	{
		return $this->gappsEnabled; 

	}

	/**
	 * The method to set the value to gappsEnabled
	 * @param bool $gappsEnabled A bool
	 */
	public  function setGappsEnabled(bool $gappsEnabled)
	{
		$this->gappsEnabled=$gappsEnabled; 
		$this->keyModified['gapps_enabled'] = 1; 

	}

	/**
	 * The method to get the domainName
	 * @return string A string representing the domainName
	 */
	public  function getDomainName()
	{
		return $this->domainName; 

	}

	/**
	 * The method to set the value to domainName
	 * @param string $domainName A string
	 */
	public  function setDomainName(string $domainName)
	{
		$this->domainName=$domainName; 
		$this->keyModified['domain_name'] = 1; 

	}

	/**
	 * The method to get the translationEnabled
	 * @return bool A bool representing the translationEnabled
	 */
	public  function getTranslationEnabled()
	{
		return $this->translationEnabled; 

	}

	/**
	 * The method to set the value to translationEnabled
	 * @param bool $translationEnabled A bool
	 */
	public  function setTranslationEnabled(bool $translationEnabled)
	{
		$this->translationEnabled=$translationEnabled; 
		$this->keyModified['translation_enabled'] = 1; 

	}

	/**
	 * The method to get the street
	 * @return string A string representing the street
	 */
	public  function getStreet()
	{
		return $this->street; 

	}

	/**
	 * The method to set the value to street
	 * @param string $street A string
	 */
	public  function setStreet(string $street)
	{
		$this->street=$street; 
		$this->keyModified['street'] = 1; 

	}

	/**
	 * The method to get the alias
	 * @return string A string representing the alias
	 */
	public  function getAlias()
	{
		return $this->alias; 

	}

	/**
	 * The method to set the value to alias
	 * @param string $alias A string
	 */
	public  function setAlias(string $alias)
	{
		$this->alias=$alias; 
		$this->keyModified['alias'] = 1; 

	}

	/**
	 * The method to get the currency
	 * @return string A string representing the currency
	 */
	public  function getCurrency()
	{
		return $this->currency; 

	}

	/**
	 * The method to set the value to currency
	 * @param string $currency A string
	 */
	public  function setCurrency(string $currency)
	{
		$this->currency=$currency; 
		$this->keyModified['currency'] = 1; 

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
		$this->keyModified['state'] = 1; 

	}

	/**
	 * The method to get the fax
	 * @return string A string representing the fax
	 */
	public  function getFax()
	{
		return $this->fax; 

	}

	/**
	 * The method to set the value to fax
	 * @param string $fax A string
	 */
	public  function setFax(string $fax)
	{
		$this->fax=$fax; 
		$this->keyModified['fax'] = 1; 

	}

	/**
	 * The method to get the employeeCount
	 * @return string A string representing the employeeCount
	 */
	public  function getEmployeeCount()
	{
		return $this->employeeCount; 

	}

	/**
	 * The method to set the value to employeeCount
	 * @param string $employeeCount A string
	 */
	public  function setEmployeeCount(string $employeeCount)
	{
		$this->employeeCount=$employeeCount; 
		$this->keyModified['employee_count'] = 1; 

	}

	/**
	 * The method to get the zip
	 * @return string A string representing the zip
	 */
	public  function getZip()
	{
		return $this->zip; 

	}

	/**
	 * The method to set the value to zip
	 * @param string $zip A string
	 */
	public  function setZip(string $zip)
	{
		$this->zip=$zip; 
		$this->keyModified['zip'] = 1; 

	}

	/**
	 * The method to get the website
	 * @return string A string representing the website
	 */
	public  function getWebsite()
	{
		return $this->website; 

	}

	/**
	 * The method to set the value to website
	 * @param string $website A string
	 */
	public  function setWebsite(string $website)
	{
		$this->website=$website; 
		$this->keyModified['website'] = 1; 

	}

	/**
	 * The method to get the currencySymbol
	 * @return string A string representing the currencySymbol
	 */
	public  function getCurrencySymbol()
	{
		return $this->currencySymbol; 

	}

	/**
	 * The method to set the value to currencySymbol
	 * @param string $currencySymbol A string
	 */
	public  function setCurrencySymbol(string $currencySymbol)
	{
		$this->currencySymbol=$currencySymbol; 
		$this->keyModified['currency_symbol'] = 1; 

	}

	/**
	 * The method to get the mobile
	 * @return string A string representing the mobile
	 */
	public  function getMobile()
	{
		return $this->mobile; 

	}

	/**
	 * The method to set the value to mobile
	 * @param string $mobile A string
	 */
	public  function setMobile(string $mobile)
	{
		$this->mobile=$mobile; 
		$this->keyModified['mobile'] = 1; 

	}

	/**
	 * The method to get the currencyLocale
	 * @return string A string representing the currencyLocale
	 */
	public  function getCurrencyLocale()
	{
		return $this->currencyLocale; 

	}

	/**
	 * The method to set the value to currencyLocale
	 * @param string $currencyLocale A string
	 */
	public  function setCurrencyLocale(string $currencyLocale)
	{
		$this->currencyLocale=$currencyLocale; 
		$this->keyModified['currency_locale'] = 1; 

	}

	/**
	 * The method to get the primaryZuid
	 * @return string A string representing the primaryZuid
	 */
	public  function getPrimaryZuid()
	{
		return $this->primaryZuid; 

	}

	/**
	 * The method to set the value to primaryZuid
	 * @param string $primaryZuid A string
	 */
	public  function setPrimaryZuid(string $primaryZuid)
	{
		$this->primaryZuid=$primaryZuid; 
		$this->keyModified['primary_zuid'] = 1; 

	}

	/**
	 * The method to get the ziaPortalId
	 * @return string A string representing the ziaPortalId
	 */
	public  function getZiaPortalId()
	{
		return $this->ziaPortalId; 

	}

	/**
	 * The method to set the value to ziaPortalId
	 * @param string $ziaPortalId A string
	 */
	public  function setZiaPortalId(string $ziaPortalId)
	{
		$this->ziaPortalId=$ziaPortalId; 
		$this->keyModified['zia_portal_id'] = 1; 

	}

	/**
	 * The method to get the timeZone
	 * @return string A string representing the timeZone
	 */
	public  function getTimeZone()
	{
		return $this->timeZone; 

	}

	/**
	 * The method to set the value to timeZone
	 * @param string $timeZone A string
	 */
	public  function setTimeZone(string $timeZone)
	{
		$this->timeZone=$timeZone; 
		$this->keyModified['time_zone'] = 1; 

	}

	/**
	 * The method to get the zgid
	 * @return string A string representing the zgid
	 */
	public  function getZgid()
	{
		return $this->zgid; 

	}

	/**
	 * The method to set the value to zgid
	 * @param string $zgid A string
	 */
	public  function setZgid(string $zgid)
	{
		$this->zgid=$zgid; 
		$this->keyModified['zgid'] = 1; 

	}

	/**
	 * The method to get the countryCode
	 * @return string A string representing the countryCode
	 */
	public  function getCountryCode()
	{
		return $this->countryCode; 

	}

	/**
	 * The method to set the value to countryCode
	 * @param string $countryCode A string
	 */
	public  function setCountryCode(string $countryCode)
	{
		$this->countryCode=$countryCode; 
		$this->keyModified['country_code'] = 1; 

	}

	/**
	 * The method to get the licenseDetails
	 * @return LicenseDetails An instance of LicenseDetails
	 */
	public  function getLicenseDetails()
	{
		return $this->licenseDetails; 

	}

	/**
	 * The method to set the value to licenseDetails
	 * @param LicenseDetails $licenseDetails An instance of LicenseDetails
	 */
	public  function setLicenseDetails(LicenseDetails $licenseDetails)
	{
		$this->licenseDetails=$licenseDetails; 
		$this->keyModified['license_details'] = 1; 

	}

	/**
	 * The method to get the phone
	 * @return string A string representing the phone
	 */
	public  function getPhone()
	{
		return $this->phone; 

	}

	/**
	 * The method to set the value to phone
	 * @param string $phone A string
	 */
	public  function setPhone(string $phone)
	{
		$this->phone=$phone; 
		$this->keyModified['phone'] = 1; 

	}

	/**
	 * The method to get the companyName
	 * @return string A string representing the companyName
	 */
	public  function getCompanyName()
	{
		return $this->companyName; 

	}

	/**
	 * The method to set the value to companyName
	 * @param string $companyName A string
	 */
	public  function setCompanyName(string $companyName)
	{
		$this->companyName=$companyName; 
		$this->keyModified['company_name'] = 1; 

	}

	/**
	 * The method to get the privacySettings
	 * @return bool A bool representing the privacySettings
	 */
	public  function getPrivacySettings()
	{
		return $this->privacySettings; 

	}

	/**
	 * The method to set the value to privacySettings
	 * @param bool $privacySettings A bool
	 */
	public  function setPrivacySettings(bool $privacySettings)
	{
		$this->privacySettings=$privacySettings; 
		$this->keyModified['privacy_settings'] = 1; 

	}

	/**
	 * The method to get the primaryEmail
	 * @return string A string representing the primaryEmail
	 */
	public  function getPrimaryEmail()
	{
		return $this->primaryEmail; 

	}

	/**
	 * The method to set the value to primaryEmail
	 * @param string $primaryEmail A string
	 */
	public  function setPrimaryEmail(string $primaryEmail)
	{
		$this->primaryEmail=$primaryEmail; 
		$this->keyModified['primary_email'] = 1; 

	}

	/**
	 * The method to get the isoCode
	 * @return string A string representing the isoCode
	 */
	public  function getIsoCode()
	{
		return $this->isoCode; 

	}

	/**
	 * The method to set the value to isoCode
	 * @param string $isoCode A string
	 */
	public  function setIsoCode(string $isoCode)
	{
		$this->isoCode=$isoCode; 
		$this->keyModified['iso_code'] = 1; 

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
