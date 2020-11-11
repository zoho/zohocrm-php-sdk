<?php 
namespace com\zoho\crm\api\taxes;

use com\zoho\crm\api\util\Model;

class Preference implements Model
{

	private  $autoPopulateTax;
	private  $modifyTaxRates;
	private  $keyModified=array();

	/**
	 * The method to get the autoPopulateTax
	 * @return bool A bool representing the autoPopulateTax
	 */
	public  function getAutoPopulateTax()
	{
		return $this->autoPopulateTax; 

	}

	/**
	 * The method to set the value to autoPopulateTax
	 * @param bool $autoPopulateTax A bool
	 */
	public  function setAutoPopulateTax(bool $autoPopulateTax)
	{
		$this->autoPopulateTax=$autoPopulateTax; 
		$this->keyModified['auto_populate_tax'] = 1; 

	}

	/**
	 * The method to get the modifyTaxRates
	 * @return bool A bool representing the modifyTaxRates
	 */
	public  function getModifyTaxRates()
	{
		return $this->modifyTaxRates; 

	}

	/**
	 * The method to set the value to modifyTaxRates
	 * @param bool $modifyTaxRates A bool
	 */
	public  function setModifyTaxRates(bool $modifyTaxRates)
	{
		$this->modifyTaxRates=$modifyTaxRates; 
		$this->keyModified['modify_tax_rates'] = 1; 

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
