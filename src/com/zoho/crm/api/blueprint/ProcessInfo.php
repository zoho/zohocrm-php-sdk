<?php 
namespace com\zoho\crm\api\blueprint;

use com\zoho\crm\api\util\Model;

class ProcessInfo implements Model
{

	private  $fieldId;
	private  $isContinuous;
	private  $apiName;
	private  $continuous;
	private  $fieldLabel;
	private  $name;
	private  $columnName;
	private  $fieldValue;
	private  $id;
	private  $fieldName;
	private  $escalation;
	private  $keyModified=array();

	/**
	 * The method to get the fieldId
	 * @return string A string representing the fieldId
	 */
	public  function getFieldId()
	{
		return $this->fieldId; 

	}

	/**
	 * The method to set the value to fieldId
	 * @param string $fieldId A string
	 */
	public  function setFieldId(string $fieldId)
	{
		$this->fieldId=$fieldId; 
		$this->keyModified['field_id'] = 1; 

	}

	/**
	 * The method to get the isContinuous
	 * @return bool A bool representing the isContinuous
	 */
	public  function getIsContinuous()
	{
		return $this->isContinuous; 

	}

	/**
	 * The method to set the value to isContinuous
	 * @param bool $isContinuous A bool
	 */
	public  function setIsContinuous(bool $isContinuous)
	{
		$this->isContinuous=$isContinuous; 
		$this->keyModified['is_continuous'] = 1; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public  function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the continuous
	 * @return bool A bool representing the continuous
	 */
	public  function getContinuous()
	{
		return $this->continuous; 

	}

	/**
	 * The method to set the value to continuous
	 * @param bool $continuous A bool
	 */
	public  function setContinuous(bool $continuous)
	{
		$this->continuous=$continuous; 
		$this->keyModified['continuous'] = 1; 

	}

	/**
	 * The method to get the fieldLabel
	 * @return string A string representing the fieldLabel
	 */
	public  function getFieldLabel()
	{
		return $this->fieldLabel; 

	}

	/**
	 * The method to set the value to fieldLabel
	 * @param string $fieldLabel A string
	 */
	public  function setFieldLabel(string $fieldLabel)
	{
		$this->fieldLabel=$fieldLabel; 
		$this->keyModified['field_label'] = 1; 

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
	 * The method to get the columnName
	 * @return string A string representing the columnName
	 */
	public  function getColumnName()
	{
		return $this->columnName; 

	}

	/**
	 * The method to set the value to columnName
	 * @param string $columnName A string
	 */
	public  function setColumnName(string $columnName)
	{
		$this->columnName=$columnName; 
		$this->keyModified['column_name'] = 1; 

	}

	/**
	 * The method to get the fieldValue
	 * @return string A string representing the fieldValue
	 */
	public  function getFieldValue()
	{
		return $this->fieldValue; 

	}

	/**
	 * The method to set the value to fieldValue
	 * @param string $fieldValue A string
	 */
	public  function setFieldValue(string $fieldValue)
	{
		$this->fieldValue=$fieldValue; 
		$this->keyModified['field_value'] = 1; 

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
	 * The method to get the fieldName
	 * @return string A string representing the fieldName
	 */
	public  function getFieldName()
	{
		return $this->fieldName; 

	}

	/**
	 * The method to set the value to fieldName
	 * @param string $fieldName A string
	 */
	public  function setFieldName(string $fieldName)
	{
		$this->fieldName=$fieldName; 
		$this->keyModified['field_name'] = 1; 

	}

	/**
	 * The method to get the escalation
	 * @return string A string representing the escalation
	 */
	public  function getEscalation()
	{
		return $this->escalation; 

	}

	/**
	 * The method to set the value to escalation
	 * @param string $escalation A string
	 */
	public  function setEscalation(string $escalation)
	{
		$this->escalation=$escalation; 
		$this->keyModified['escalation'] = 1; 

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
