<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class PricingDetails extends Record implements Model
{


	/**
	 * The method to get the toRange
	 * @return float A float representing the toRange
	 */
	public  function getToRange()
	{
		return $this->getKeyValue('to_range'); 

	}

	/**
	 * The method to set the value to toRange
	 * @param float $toRange A float
	 */
	public  function setToRange(float $toRange)
	{
		$this->addKeyValue('to_range', $toRange); 

	}

	/**
	 * The method to get the discount
	 * @return float A float representing the discount
	 */
	public  function getDiscount()
	{
		return $this->getKeyValue('discount'); 

	}

	/**
	 * The method to set the value to discount
	 * @param float $discount A float
	 */
	public  function setDiscount(float $discount)
	{
		$this->addKeyValue('discount', $discount); 

	}

	/**
	 * The method to get the fromRange
	 * @return float A float representing the fromRange
	 */
	public  function getFromRange()
	{
		return $this->getKeyValue('from_range'); 

	}

	/**
	 * The method to set the value to fromRange
	 * @param float $fromRange A float
	 */
	public  function setFromRange(float $fromRange)
	{
		$this->addKeyValue('from_range', $fromRange); 

	}
} 
