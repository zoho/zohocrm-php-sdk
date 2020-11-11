<?php 
namespace com\zoho\crm\api\blueprint;

use com\zoho\crm\api\fields\Field;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class Transition implements Model
{

	private  $nextTransitions;
	private  $percentPartialSave;
	private  $data;
	private  $nextFieldValue;
	private  $name;
	private  $criteriaMatched;
	private  $id;
	private  $fields;
	private  $criteriaMessage;
	private  $type;
	private  $executionTime;
	private  $keyModified=array();

	/**
	 * The method to get the nextTransitions
	 * @return array A array representing the nextTransitions
	 */
	public  function getNextTransitions()
	{
		return $this->nextTransitions; 

	}

	/**
	 * The method to set the value to nextTransitions
	 * @param array $nextTransitions A array
	 */
	public  function setNextTransitions(array $nextTransitions)
	{
		$this->nextTransitions=$nextTransitions; 
		$this->keyModified['next_transitions'] = 1; 

	}

	/**
	 * The method to get the percentPartialSave
	 * @return float A float representing the percentPartialSave
	 */
	public  function getPercentPartialSave()
	{
		return $this->percentPartialSave; 

	}

	/**
	 * The method to set the value to percentPartialSave
	 * @param float $percentPartialSave A float
	 */
	public  function setPercentPartialSave(float $percentPartialSave)
	{
		$this->percentPartialSave=$percentPartialSave; 
		$this->keyModified['percent_partial_save'] = 1; 

	}

	/**
	 * The method to get the data
	 * @return Record An instance of Record
	 */
	public  function getData()
	{
		return $this->data; 

	}

	/**
	 * The method to set the value to data
	 * @param Record $data An instance of Record
	 */
	public  function setData(Record $data)
	{
		$this->data=$data; 
		$this->keyModified['data'] = 1; 

	}

	/**
	 * The method to get the nextFieldValue
	 * @return string A string representing the nextFieldValue
	 */
	public  function getNextFieldValue()
	{
		return $this->nextFieldValue; 

	}

	/**
	 * The method to set the value to nextFieldValue
	 * @param string $nextFieldValue A string
	 */
	public  function setNextFieldValue(string $nextFieldValue)
	{
		$this->nextFieldValue=$nextFieldValue; 
		$this->keyModified['next_field_value'] = 1; 

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
	 * The method to get the criteriaMatched
	 * @return bool A bool representing the criteriaMatched
	 */
	public  function getCriteriaMatched()
	{
		return $this->criteriaMatched; 

	}

	/**
	 * The method to set the value to criteriaMatched
	 * @param bool $criteriaMatched A bool
	 */
	public  function setCriteriaMatched(bool $criteriaMatched)
	{
		$this->criteriaMatched=$criteriaMatched; 
		$this->keyModified['criteria_matched'] = 1; 

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
	 * The method to get the criteriaMessage
	 * @return string A string representing the criteriaMessage
	 */
	public  function getCriteriaMessage()
	{
		return $this->criteriaMessage; 

	}

	/**
	 * The method to set the value to criteriaMessage
	 * @param string $criteriaMessage A string
	 */
	public  function setCriteriaMessage(string $criteriaMessage)
	{
		$this->criteriaMessage=$criteriaMessage; 
		$this->keyModified['criteria_message'] = 1; 

	}

	/**
	 * The method to get the type
	 * @return string A string representing the type
	 */
	public  function getType()
	{
		return $this->type; 

	}

	/**
	 * The method to set the value to type
	 * @param string $type A string
	 */
	public  function setType(string $type)
	{
		$this->type=$type; 
		$this->keyModified['type'] = 1; 

	}

	/**
	 * The method to get the executionTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getExecutionTime()
	{
		return $this->executionTime; 

	}

	/**
	 * The method to set the value to executionTime
	 * @param \DateTime $executionTime An instance of \DateTime
	 */
	public  function setExecutionTime(\DateTime $executionTime)
	{
		$this->executionTime=$executionTime; 
		$this->keyModified['execution_time'] = 1; 

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
