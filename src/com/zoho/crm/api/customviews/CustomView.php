<?php 
namespace com\zoho\crm\api\customviews;

use com\zoho\crm\api\util\Model;

class CustomView implements Model
{

	private  $id;
	private  $name;
	private  $systemName;
	private  $displayValue;
	private  $sharedType;
	private  $category;
	private  $sortBy;
	private  $sortOrder;
	private  $favorite;
	private  $offline;
	private  $default;
	private  $systemDefined;
	private  $criteria;
	private  $sharedDetails;
	private  $fields;
	private  $keyModified=array();

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
	 * The method to get the systemName
	 * @return string A string representing the systemName
	 */
	public  function getSystemName()
	{
		return $this->systemName; 

	}

	/**
	 * The method to set the value to systemName
	 * @param string $systemName A string
	 */
	public  function setSystemName(string $systemName)
	{
		$this->systemName=$systemName; 
		$this->keyModified['system_name'] = 1; 

	}

	/**
	 * The method to get the displayValue
	 * @return string A string representing the displayValue
	 */
	public  function getDisplayValue()
	{
		return $this->displayValue; 

	}

	/**
	 * The method to set the value to displayValue
	 * @param string $displayValue A string
	 */
	public  function setDisplayValue(string $displayValue)
	{
		$this->displayValue=$displayValue; 
		$this->keyModified['display_value'] = 1; 

	}

	/**
	 * The method to get the sharedType
	 * @return string A string representing the sharedType
	 */
	public  function getSharedType()
	{
		return $this->sharedType; 

	}

	/**
	 * The method to set the value to sharedType
	 * @param string $sharedType A string
	 */
	public  function setSharedType(string $sharedType)
	{
		$this->sharedType=$sharedType; 
		$this->keyModified['shared_type'] = 1; 

	}

	/**
	 * The method to get the category
	 * @return string A string representing the category
	 */
	public  function getCategory()
	{
		return $this->category; 

	}

	/**
	 * The method to set the value to category
	 * @param string $category A string
	 */
	public  function setCategory(string $category)
	{
		$this->category=$category; 
		$this->keyModified['category'] = 1; 

	}

	/**
	 * The method to get the sortBy
	 * @return string A string representing the sortBy
	 */
	public  function getSortBy()
	{
		return $this->sortBy; 

	}

	/**
	 * The method to set the value to sortBy
	 * @param string $sortBy A string
	 */
	public  function setSortBy(string $sortBy)
	{
		$this->sortBy=$sortBy; 
		$this->keyModified['sort_by'] = 1; 

	}

	/**
	 * The method to get the sortOrder
	 * @return string A string representing the sortOrder
	 */
	public  function getSortOrder()
	{
		return $this->sortOrder; 

	}

	/**
	 * The method to set the value to sortOrder
	 * @param string $sortOrder A string
	 */
	public  function setSortOrder(string $sortOrder)
	{
		$this->sortOrder=$sortOrder; 
		$this->keyModified['sort_order'] = 1; 

	}

	/**
	 * The method to get the favorite
	 * @return int A int representing the favorite
	 */
	public  function getFavorite()
	{
		return $this->favorite; 

	}

	/**
	 * The method to set the value to favorite
	 * @param int $favorite A int
	 */
	public  function setFavorite(int $favorite)
	{
		$this->favorite=$favorite; 
		$this->keyModified['favorite'] = 1; 

	}

	/**
	 * The method to get the offline
	 * @return bool A bool representing the offline
	 */
	public  function getOffline()
	{
		return $this->offline; 

	}

	/**
	 * The method to set the value to offline
	 * @param bool $offline A bool
	 */
	public  function setOffline(bool $offline)
	{
		$this->offline=$offline; 
		$this->keyModified['offline'] = 1; 

	}

	/**
	 * The method to get the default
	 * @return bool A bool representing the default
	 */
	public  function getDefault()
	{
		return $this->default; 

	}

	/**
	 * The method to set the value to default
	 * @param bool $default A bool
	 */
	public  function setDefault(bool $default)
	{
		$this->default=$default; 
		$this->keyModified['default'] = 1; 

	}

	/**
	 * The method to get the systemDefined
	 * @return bool A bool representing the systemDefined
	 */
	public  function getSystemDefined()
	{
		return $this->systemDefined; 

	}

	/**
	 * The method to set the value to systemDefined
	 * @param bool $systemDefined A bool
	 */
	public  function setSystemDefined(bool $systemDefined)
	{
		$this->systemDefined=$systemDefined; 
		$this->keyModified['system_defined'] = 1; 

	}

	/**
	 * The method to get the criteria
	 * @return Criteria An instance of Criteria
	 */
	public  function getCriteria()
	{
		return $this->criteria; 

	}

	/**
	 * The method to set the value to criteria
	 * @param Criteria $criteria An instance of Criteria
	 */
	public  function setCriteria(Criteria $criteria)
	{
		$this->criteria=$criteria; 
		$this->keyModified['criteria'] = 1; 

	}

	/**
	 * The method to get the sharedDetails
	 * @return array A array representing the sharedDetails
	 */
	public  function getSharedDetails()
	{
		return $this->sharedDetails; 

	}

	/**
	 * The method to set the value to sharedDetails
	 * @param array $sharedDetails A array
	 */
	public  function setSharedDetails(array $sharedDetails)
	{
		$this->sharedDetails=$sharedDetails; 
		$this->keyModified['shared_details'] = 1; 

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
