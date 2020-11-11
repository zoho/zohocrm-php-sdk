<?php 
namespace com\zoho\crm\api\fields;

use com\zoho\crm\api\util\Model;

class ViewType implements Model
{

	private  $view;
	private  $edit;
	private  $create;
	private  $quickCreate;
	private  $keyModified=array();

	/**
	 * The method to get the view
	 * @return bool A bool representing the view
	 */
	public  function getView()
	{
		return $this->view; 

	}

	/**
	 * The method to set the value to view
	 * @param bool $view A bool
	 */
	public  function setView(bool $view)
	{
		$this->view=$view; 
		$this->keyModified['view'] = 1; 

	}

	/**
	 * The method to get the edit
	 * @return bool A bool representing the edit
	 */
	public  function getEdit()
	{
		return $this->edit; 

	}

	/**
	 * The method to set the value to edit
	 * @param bool $edit A bool
	 */
	public  function setEdit(bool $edit)
	{
		$this->edit=$edit; 
		$this->keyModified['edit'] = 1; 

	}

	/**
	 * The method to get the create
	 * @return bool A bool representing the create
	 */
	public  function getCreate()
	{
		return $this->create; 

	}

	/**
	 * The method to set the value to create
	 * @param bool $create A bool
	 */
	public  function setCreate(bool $create)
	{
		$this->create=$create; 
		$this->keyModified['create'] = 1; 

	}

	/**
	 * The method to get the quickCreate
	 * @return bool A bool representing the quickCreate
	 */
	public  function getQuickCreate()
	{
		return $this->quickCreate; 

	}

	/**
	 * The method to set the value to quickCreate
	 * @param bool $quickCreate A bool
	 */
	public  function setQuickCreate(bool $quickCreate)
	{
		$this->quickCreate=$quickCreate; 
		$this->keyModified['quick_create'] = 1; 

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
