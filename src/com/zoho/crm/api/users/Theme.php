<?php 
namespace com\zoho\crm\api\users;

use com\zoho\crm\api\util\Model;

class Theme implements Model
{

	private  $normalTab;
	private  $selectedTab;
	private  $newBackground;
	private  $background;
	private  $screen;
	private  $type;
	private  $keyModified=array();

	/**
	 * The method to get the normalTab
	 * @return TabTheme An instance of TabTheme
	 */
	public  function getNormalTab()
	{
		return $this->normalTab; 

	}

	/**
	 * The method to set the value to normalTab
	 * @param TabTheme $normalTab An instance of TabTheme
	 */
	public  function setNormalTab(TabTheme $normalTab)
	{
		$this->normalTab=$normalTab; 
		$this->keyModified['normal_tab'] = 1; 

	}

	/**
	 * The method to get the selectedTab
	 * @return TabTheme An instance of TabTheme
	 */
	public  function getSelectedTab()
	{
		return $this->selectedTab; 

	}

	/**
	 * The method to set the value to selectedTab
	 * @param TabTheme $selectedTab An instance of TabTheme
	 */
	public  function setSelectedTab(TabTheme $selectedTab)
	{
		$this->selectedTab=$selectedTab; 
		$this->keyModified['selected_tab'] = 1; 

	}

	/**
	 * The method to get the newBackground
	 * @return string A string representing the newBackground
	 */
	public  function getNewBackground()
	{
		return $this->newBackground; 

	}

	/**
	 * The method to set the value to newBackground
	 * @param string $newBackground A string
	 */
	public  function setNewBackground(string $newBackground)
	{
		$this->newBackground=$newBackground; 
		$this->keyModified['new_background'] = 1; 

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
	 * The method to get the screen
	 * @return string A string representing the screen
	 */
	public  function getScreen()
	{
		return $this->screen; 

	}

	/**
	 * The method to set the value to screen
	 * @param string $screen A string
	 */
	public  function setScreen(string $screen)
	{
		$this->screen=$screen; 
		$this->keyModified['screen'] = 1; 

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
