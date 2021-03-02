<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\layouts\Layout;
use com\zoho\crm\api\record\InventoryLineItems;
use com\zoho\crm\api\record\Participants;
use com\zoho\crm\api\record\PricingDetails;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\record\RemindAt;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;

class Field
{

	private  $apiName;

	/**
	 * Creates an instance of Field with the given parameters
	 * @param string $apiName A string
	 */
	public function __Construct(string $apiName)
	{
		$this->apiName=$apiName; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}
} 
