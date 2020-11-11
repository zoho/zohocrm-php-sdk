<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class LineItemProduct extends Record implements Model
{


	/**
	 * The method to get the productCode
	 * @return string A string representing the productCode
	 */
	public  function getProductCode()
	{
		return $this->getKeyValue('Product_Code'); 

	}

	/**
	 * The method to set the value to productCode
	 * @param string $productCode A string
	 */
	public  function setProductCode(string $productCode)
	{
		$this->addKeyValue('Product_Code', $productCode); 

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
