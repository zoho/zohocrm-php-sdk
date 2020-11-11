<?php 
namespace com\zoho\crm\api\currencies;

use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Model;

class Currency implements Model
{

	private  $symbol;
	private  $createdTime;
	private  $isActive;
	private  $exchangeRate;
	private  $format;
	private  $createdBy;
	private  $prefixSymbol;
	private  $isBase;
	private  $modifiedTime;
	private  $name;
	private  $modifiedBy;
	private  $id;
	private  $isoCode;
	private  $keyModified=array();

	/**
	 * The method to get the symbol
	 * @return string A string representing the symbol
	 */
	public  function getSymbol()
	{
		return $this->symbol; 

	}

	/**
	 * The method to set the value to symbol
	 * @param string $symbol A string
	 */
	public  function setSymbol(string $symbol)
	{
		$this->symbol=$symbol; 
		$this->keyModified['symbol'] = 1; 

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
		$this->keyModified['created_time'] = 1; 

	}

	/**
	 * The method to get the isActive
	 * @return bool A bool representing the isActive
	 */
	public  function getIsActive()
	{
		return $this->isActive; 

	}

	/**
	 * The method to set the value to isActive
	 * @param bool $isActive A bool
	 */
	public  function setIsActive(bool $isActive)
	{
		$this->isActive=$isActive; 
		$this->keyModified['is_active'] = 1; 

	}

	/**
	 * The method to get the exchangeRate
	 * @return string A string representing the exchangeRate
	 */
	public  function getExchangeRate()
	{
		return $this->exchangeRate; 

	}

	/**
	 * The method to set the value to exchangeRate
	 * @param string $exchangeRate A string
	 */
	public  function setExchangeRate(string $exchangeRate)
	{
		$this->exchangeRate=$exchangeRate; 
		$this->keyModified['exchange_rate'] = 1; 

	}

	/**
	 * The method to get the format
	 * @return Format An instance of Format
	 */
	public  function getFormat()
	{
		return $this->format; 

	}

	/**
	 * The method to set the value to format
	 * @param Format $format An instance of Format
	 */
	public  function setFormat(Format $format)
	{
		$this->format=$format; 
		$this->keyModified['format'] = 1; 

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
		$this->keyModified['created_by'] = 1; 

	}

	/**
	 * The method to get the prefixSymbol
	 * @return bool A bool representing the prefixSymbol
	 */
	public  function getPrefixSymbol()
	{
		return $this->prefixSymbol; 

	}

	/**
	 * The method to set the value to prefixSymbol
	 * @param bool $prefixSymbol A bool
	 */
	public  function setPrefixSymbol(bool $prefixSymbol)
	{
		$this->prefixSymbol=$prefixSymbol; 
		$this->keyModified['prefix_symbol'] = 1; 

	}

	/**
	 * The method to get the isBase
	 * @return bool A bool representing the isBase
	 */
	public  function getIsBase()
	{
		return $this->isBase; 

	}

	/**
	 * The method to set the value to isBase
	 * @param bool $isBase A bool
	 */
	public  function setIsBase(bool $isBase)
	{
		$this->isBase=$isBase; 
		$this->keyModified['is_base'] = 1; 

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
		$this->keyModified['modified_time'] = 1; 

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
		$this->keyModified['modified_by'] = 1; 

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
