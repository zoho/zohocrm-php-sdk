<?php 
namespace com\zoho\crm\api\taxes;

use com\zoho\crm\api\util\Model;

class ResponseWrapper implements Model, ResponseHandler
{

	private  $taxes;
	private  $preference;
	private  $keyModified=array();

	/**
	 * The method to get the taxes
	 * @return array A array representing the taxes
	 */
	public  function getTaxes()
	{
		return $this->taxes; 

	}

	/**
	 * The method to set the value to taxes
	 * @param array $taxes A array
	 */
	public  function setTaxes(array $taxes)
	{
		$this->taxes=$taxes; 
		$this->keyModified['taxes'] = 1; 

	}

	/**
	 * The method to get the preference
	 * @return Preference An instance of Preference
	 */
	public  function getPreference()
	{
		return $this->preference; 

	}

	/**
	 * The method to set the value to preference
	 * @param Preference $preference An instance of Preference
	 */
	public  function setPreference(Preference $preference)
	{
		$this->preference=$preference; 
		$this->keyModified['preference'] = 1; 

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
