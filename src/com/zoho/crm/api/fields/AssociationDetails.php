<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class AssociationDetails implements Model
{

	private  $lookupField;
	private  $relatedField;
	private  $keyModified=array();

	/**
	 * The method to get the lookupField
	 * @return LookupField An instance of LookupField
	 */
	public  function getLookupField()
	{
		return $this->lookupField; 

	}

	/**
	 * The method to set the value to lookupField
	 * @param LookupField $lookupField An instance of LookupField
	 */
	public  function setLookupField(LookupField $lookupField)
	{
		$this->lookupField=$lookupField; 
		$this->keyModified['lookup_field'] = 1; 

	}

	/**
	 * The method to get the relatedField
	 * @return LookupField An instance of LookupField
	 */
	public  function getRelatedField()
	{
		return $this->relatedField; 

	}

	/**
	 * The method to set the value to relatedField
	 * @param LookupField $relatedField An instance of LookupField
	 */
	public  function setRelatedField(LookupField $relatedField)
	{
		$this->relatedField=$relatedField; 
		$this->keyModified['related_field'] = 1; 

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
