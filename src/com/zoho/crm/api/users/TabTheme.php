<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\util\Model;

class TabTheme implements Model
{

	private  $fontColor;
	private  $background;
	private  $keyModified=array();

	/**
	 * The method to get the fontColor
	 * @return string A string representing the fontColor
	 */
	public  function getFontColor()
	{
		return $this->fontColor; 

	}

	/**
	 * The method to set the value to fontColor
	 * @param string $fontColor A string
	 */
	public  function setFontColor(string $fontColor)
	{
		$this->fontColor=$fontColor; 
		$this->keyModified['font_color'] = 1; 

	}

	/**
	 * The method to get the background
	 * @return string A string representing the background
	 */
	public  function getBackground()
	{
		return $this->background; 

	}

	/**
	 * The method to set the value to background
	 * @param string $background A string
	 */
	public  function setBackground(string $background)
	{
		$this->background=$background; 
		$this->keyModified['background'] = 1; 

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
