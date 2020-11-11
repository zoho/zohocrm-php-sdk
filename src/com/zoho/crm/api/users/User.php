<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\profiles\Profile;
use com\zoho\crm\api\roles\Role;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class User extends Record implements Model
{


	/**
	 * The method to get the country
	 * @return string A string representing the country
	 */
	public  function getCountry()
	{
		return $this->getKeyValue('country'); 

	}

	/**
	 * The method to set the value to country
	 * @param string $country A string
	 */
	public  function setCountry(string $country)
	{
		$this->addKeyValue('country', $country); 

	}

	/**
	 * The method to get the customizeInfo
	 * @return CustomizeInfo An instance of CustomizeInfo
	 */
	public  function getCustomizeInfo()
	{
		return $this->getKeyValue('customize_info'); 

	}

	/**
	 * The method to set the value to customizeInfo
	 * @param CustomizeInfo $customizeInfo An instance of CustomizeInfo
	 */
	public  function setCustomizeInfo(CustomizeInfo $customizeInfo)
	{
		$this->addKeyValue('customize_info', $customizeInfo); 

	}

	/**
	 * The method to get the role
	 * @return Role An instance of Role
	 */
	public  function getRole()
	{
		return $this->getKeyValue('role'); 

	}

	/**
	 * The method to set the value to role
	 * @param Role $role An instance of Role
	 */
	public  function setRole(Role $role)
	{
		$this->addKeyValue('role', $role); 

	}

	/**
	 * The method to get the signature
	 * @return string A string representing the signature
	 */
	public  function getSignature()
	{
		return $this->getKeyValue('signature'); 

	}

	/**
	 * The method to set the value to signature
	 * @param string $signature A string
	 */
	public  function setSignature(string $signature)
	{
		$this->addKeyValue('signature', $signature); 

	}

	/**
	 * The method to get the city
	 * @return string A string representing the city
	 */
	public  function getCity()
	{
		return $this->getKeyValue('city'); 

	}

	/**
	 * The method to set the value to city
	 * @param string $city A string
	 */
	public  function setCity(string $city)
	{
		$this->addKeyValue('city', $city); 

	}

	/**
	 * The method to get the nameFormat
	 * @return string A string representing the nameFormat
	 */
	public  function getNameFormat()
	{
		return $this->getKeyValue('name_format'); 

	}

	/**
	 * The method to set the value to nameFormat
	 * @param string $nameFormat A string
	 */
	public  function setNameFormat(string $nameFormat)
	{
		$this->addKeyValue('name_format', $nameFormat); 

	}

	/**
	 * The method to get the personalAccount
	 * @return bool A bool representing the personalAccount
	 */
	public  function getPersonalAccount()
	{
		return $this->getKeyValue('personal_account'); 

	}

	/**
	 * The method to set the value to personalAccount
	 * @param bool $personalAccount A bool
	 */
	public  function setPersonalAccount(bool $personalAccount)
	{
		$this->addKeyValue('personal_account', $personalAccount); 

	}

	/**
	 * The method to get the defaultTabGroup
	 * @return string A string representing the defaultTabGroup
	 */
	public  function getDefaultTabGroup()
	{
		return $this->getKeyValue('default_tab_group'); 

	}

	/**
	 * The method to set the value to defaultTabGroup
	 * @param string $defaultTabGroup A string
	 */
	public  function setDefaultTabGroup(string $defaultTabGroup)
	{
		$this->addKeyValue('default_tab_group', $defaultTabGroup); 

	}

	/**
	 * The method to get the language
	 * @return string A string representing the language
	 */
	public  function getLanguage()
	{
		return $this->getKeyValue('language'); 

	}

	/**
	 * The method to set the value to language
	 * @param string $language A string
	 */
	public  function setLanguage(string $language)
	{
		$this->addKeyValue('language', $language); 

	}

	/**
	 * The method to get the locale
	 * @return string A string representing the locale
	 */
	public  function getLocale()
	{
		return $this->getKeyValue('locale'); 

	}

	/**
	 * The method to set the value to locale
	 * @param string $locale A string
	 */
	public  function setLocale(string $locale)
	{
		$this->addKeyValue('locale', $locale); 

	}

	/**
	 * The method to get the microsoft
	 * @return bool A bool representing the microsoft
	 */
	public  function getMicrosoft()
	{
		return $this->getKeyValue('microsoft'); 

	}

	/**
	 * The method to set the value to microsoft
	 * @param bool $microsoft A bool
	 */
	public  function setMicrosoft(bool $microsoft)
	{
		$this->addKeyValue('microsoft', $microsoft); 

	}

	/**
	 * The method to get the isonline
	 * @return bool A bool representing the isonline
	 */
	public  function getIsonline()
	{
		return $this->getKeyValue('Isonline'); 

	}

	/**
	 * The method to set the value to isonline
	 * @param bool $isonline A bool
	 */
	public  function setIsonline(bool $isonline)
	{
		$this->addKeyValue('Isonline', $isonline); 

	}

	/**
	 * The method to get the street
	 * @return string A string representing the street
	 */
	public  function getStreet()
	{
		return $this->getKeyValue('street'); 

	}

	/**
	 * The method to set the value to street
	 * @param string $street A string
	 */
	public  function setStreet(string $street)
	{
		$this->addKeyValue('street', $street); 

	}

	/**
	 * The method to get the currency
	 * @return string A string representing the currency
	 */
	public  function getCurrency()
	{
		return $this->getKeyValue('Currency'); 

	}

	/**
	 * The method to set the value to currency
	 * @param string $currency A string
	 */
	public  function setCurrency(string $currency)
	{
		$this->addKeyValue('Currency', $currency); 

	}

	/**
	 * The method to get the alias
	 * @return string A string representing the alias
	 */
	public  function getAlias()
	{
		return $this->getKeyValue('alias'); 

	}

	/**
	 * The method to set the value to alias
	 * @param string $alias A string
	 */
	public  function setAlias(string $alias)
	{
		$this->addKeyValue('alias', $alias); 

	}

	/**
	 * The method to get the theme
	 * @return Theme An instance of Theme
	 */
	public  function getTheme()
	{
		return $this->getKeyValue('theme'); 

	}

	/**
	 * The method to set the value to theme
	 * @param Theme $theme An instance of Theme
	 */
	public  function setTheme(Theme $theme)
	{
		$this->addKeyValue('theme', $theme); 

	}

	/**
	 * The method to get the state
	 * @return string A string representing the state
	 */
	public  function getState()
	{
		return $this->getKeyValue('state'); 

	}

	/**
	 * The method to set the value to state
	 * @param string $state A string
	 */
	public  function setState(string $state)
	{
		$this->addKeyValue('state', $state); 

	}

	/**
	 * The method to get the fax
	 * @return string A string representing the fax
	 */
	public  function getFax()
	{
		return $this->getKeyValue('fax'); 

	}

	/**
	 * The method to set the value to fax
	 * @param string $fax A string
	 */
	public  function setFax(string $fax)
	{
		$this->addKeyValue('fax', $fax); 

	}

	/**
	 * The method to get the countryLocale
	 * @return string A string representing the countryLocale
	 */
	public  function getCountryLocale()
	{
		return $this->getKeyValue('country_locale'); 

	}

	/**
	 * The method to set the value to countryLocale
	 * @param string $countryLocale A string
	 */
	public  function setCountryLocale(string $countryLocale)
	{
		$this->addKeyValue('country_locale', $countryLocale); 

	}

	/**
	 * The method to get the firstName
	 * @return string A string representing the firstName
	 */
	public  function getFirstName()
	{
		return $this->getKeyValue('first_name'); 

	}

	/**
	 * The method to set the value to firstName
	 * @param string $firstName A string
	 */
	public  function setFirstName(string $firstName)
	{
		$this->addKeyValue('first_name', $firstName); 

	}

	/**
	 * The method to get the email
	 * @return string A string representing the email
	 */
	public  function getEmail()
	{
		return $this->getKeyValue('email'); 

	}

	/**
	 * The method to set the value to email
	 * @param string $email A string
	 */
	public  function setEmail(string $email)
	{
		$this->addKeyValue('email', $email); 

	}

	/**
	 * The method to get the reportingTo
	 * @return User An instance of User
	 */
	public  function getReportingTo()
	{
		return $this->getKeyValue('Reporting_To'); 

	}

	/**
	 * The method to set the value to reportingTo
	 * @param User $reportingTo An instance of User
	 */
	public  function setReportingTo(User $reportingTo)
	{
		$this->addKeyValue('Reporting_To', $reportingTo); 

	}

	/**
	 * The method to get the decimalSeparator
	 * @return string A string representing the decimalSeparator
	 */
	public  function getDecimalSeparator()
	{
		return $this->getKeyValue('decimal_separator'); 

	}

	/**
	 * The method to set the value to decimalSeparator
	 * @param string $decimalSeparator A string
	 */
	public  function setDecimalSeparator(string $decimalSeparator)
	{
		$this->addKeyValue('decimal_separator', $decimalSeparator); 

	}

	/**
	 * The method to get the zip
	 * @return string A string representing the zip
	 */
	public  function getZip()
	{
		return $this->getKeyValue('zip'); 

	}

	/**
	 * The method to set the value to zip
	 * @param string $zip A string
	 */
	public  function setZip(string $zip)
	{
		$this->addKeyValue('zip', $zip); 

	}

	/**
	 * The method to get the website
	 * @return string A string representing the website
	 */
	public  function getWebsite()
	{
		return $this->getKeyValue('website'); 

	}

	/**
	 * The method to set the value to website
	 * @param string $website A string
	 */
	public  function setWebsite(string $website)
	{
		$this->addKeyValue('website', $website); 

	}

	/**
	 * The method to get the timeFormat
	 * @return string A string representing the timeFormat
	 */
	public  function getTimeFormat()
	{
		return $this->getKeyValue('time_format'); 

	}

	/**
	 * The method to set the value to timeFormat
	 * @param string $timeFormat A string
	 */
	public  function setTimeFormat(string $timeFormat)
	{
		$this->addKeyValue('time_format', $timeFormat); 

	}

	/**
	 * The method to get the offset
	 * @return string A string representing the offset
	 */
	public  function getOffset()
	{
		return $this->getKeyValue('offset'); 

	}

	/**
	 * The method to set the value to offset
	 * @param string $offset A string
	 */
	public  function setOffset(string $offset)
	{
		$this->addKeyValue('offset', $offset); 

	}

	/**
	 * The method to get the profile
	 * @return Profile An instance of Profile
	 */
	public  function getProfile()
	{
		return $this->getKeyValue('profile'); 

	}

	/**
	 * The method to set the value to profile
	 * @param Profile $profile An instance of Profile
	 */
	public  function setProfile(Profile $profile)
	{
		$this->addKeyValue('profile', $profile); 

	}

	/**
	 * The method to get the mobile
	 * @return string A string representing the mobile
	 */
	public  function getMobile()
	{
		return $this->getKeyValue('mobile'); 

	}

	/**
	 * The method to set the value to mobile
	 * @param string $mobile A string
	 */
	public  function setMobile(string $mobile)
	{
		$this->addKeyValue('mobile', $mobile); 

	}

	/**
	 * The method to get the lastName
	 * @return string A string representing the lastName
	 */
	public  function getLastName()
	{
		return $this->getKeyValue('last_name'); 

	}

	/**
	 * The method to set the value to lastName
	 * @param string $lastName A string
	 */
	public  function setLastName(string $lastName)
	{
		$this->addKeyValue('last_name', $lastName); 

	}

	/**
	 * The method to get the timeZone
	 * @return string A string representing the timeZone
	 */
	public  function getTimeZone()
	{
		return $this->getKeyValue('time_zone'); 

	}

	/**
	 * The method to set the value to timeZone
	 * @param string $timeZone A string
	 */
	public  function setTimeZone(string $timeZone)
	{
		$this->addKeyValue('time_zone', $timeZone); 

	}

	/**
	 * The method to get the zuid
	 * @return string A string representing the zuid
	 */
	public  function getZuid()
	{
		return $this->getKeyValue('zuid'); 

	}

	/**
	 * The method to set the value to zuid
	 * @param string $zuid A string
	 */
	public  function setZuid(string $zuid)
	{
		$this->addKeyValue('zuid', $zuid); 

	}

	/**
	 * The method to get the confirm
	 * @return bool A bool representing the confirm
	 */
	public  function getConfirm()
	{
		return $this->getKeyValue('confirm'); 

	}

	/**
	 * The method to set the value to confirm
	 * @param bool $confirm A bool
	 */
	public  function setConfirm(bool $confirm)
	{
		$this->addKeyValue('confirm', $confirm); 

	}

	/**
	 * The method to get the fullName
	 * @return string A string representing the fullName
	 */
	public  function getFullName()
	{
		return $this->getKeyValue('full_name'); 

	}

	/**
	 * The method to set the value to fullName
	 * @param string $fullName A string
	 */
	public  function setFullName(string $fullName)
	{
		$this->addKeyValue('full_name', $fullName); 

	}

	/**
	 * The method to get the territories
	 * @return array A array representing the territories
	 */
	public  function getTerritories()
	{
		return $this->getKeyValue('territories'); 

	}

	/**
	 * The method to set the value to territories
	 * @param array $territories A array
	 */
	public  function setTerritories(array $territories)
	{
		$this->addKeyValue('territories', $territories); 

	}

	/**
	 * The method to get the phone
	 * @return string A string representing the phone
	 */
	public  function getPhone()
	{
		return $this->getKeyValue('phone'); 

	}

	/**
	 * The method to set the value to phone
	 * @param string $phone A string
	 */
	public  function setPhone(string $phone)
	{
		$this->addKeyValue('phone', $phone); 

	}

	/**
	 * The method to get the dob
	 * @return string A string representing the dob
	 */
	public  function getDob()
	{
		return $this->getKeyValue('dob'); 

	}

	/**
	 * The method to set the value to dob
	 * @param string $dob A string
	 */
	public  function setDob(string $dob)
	{
		$this->addKeyValue('dob', $dob); 

	}

	/**
	 * The method to get the dateFormat
	 * @return string A string representing the dateFormat
	 */
	public  function getDateFormat()
	{
		return $this->getKeyValue('date_format'); 

	}

	/**
	 * The method to set the value to dateFormat
	 * @param string $dateFormat A string
	 */
	public  function setDateFormat(string $dateFormat)
	{
		$this->addKeyValue('date_format', $dateFormat); 

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
} 
