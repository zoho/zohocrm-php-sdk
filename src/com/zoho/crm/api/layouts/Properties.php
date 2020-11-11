<?php 
namespace com\zoho\crm\api\layouts;

use com\zoho\crm\api\fields\ToolTip;
use com\zoho\crm\api\util\Model;

class Properties implements Model
{

	private  $reorderRows;
	private  $tooltip;
	private  $maximumRows;
	private  $keyModified=array();

	/**
	 * The method to get the reorderRows
	 * @return bool A bool representing the reorderRows
	 */
	public  function getReorderRows()
	{
		return $this->reorderRows; 

	}

	/**
	 * The method to set the value to reorderRows
	 * @param bool $reorderRows A bool
	 */
	public  function setReorderRows(bool $reorderRows)
	{
		$this->reorderRows=$reorderRows; 
		$this->keyModified['reorder_rows'] = 1; 

	}

	/**
	 * The method to get the tooltip
	 * @return ToolTip An instance of ToolTip
	 */
	public  function getTooltip()
	{
		return $this->tooltip; 

	}

	/**
	 * The method to set the value to tooltip
	 * @param ToolTip $tooltip An instance of ToolTip
	 */
	public  function setTooltip(ToolTip $tooltip)
	{
		$this->tooltip=$tooltip; 
		$this->keyModified['tooltip'] = 1; 

	}

	/**
	 * The method to get the maximumRows
	 * @return int A int representing the maximumRows
	 */
	public  function getMaximumRows()
	{
		return $this->maximumRows; 

	}

	/**
	 * The method to set the value to maximumRows
	 * @param int $maximumRows A int
	 */
	public  function setMaximumRows(int $maximumRows)
	{
		$this->maximumRows=$maximumRows; 
		$this->keyModified['maximum_rows'] = 1; 

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
