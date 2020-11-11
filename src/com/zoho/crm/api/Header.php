<?php
namespace com\zoho\crm\api;

/**
 * This class represents the HTTP header.
 */
class Header
{
    private $name = null;

    private $className = null;
 
    /**
     * Creates an Header class instance with the specified header name.
     * @param string $name A string containing the header name.
     * @param string $className A string containing the header class name.
     */
    function __construct($name, $className=null)
    {
        $this->name = $name;

        $this->className = $className;
    }
    
    /**
     * This is a getter method to get header name.
     * @return string A string representing the header name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
	 * This is a getter method to get header class name.
	 * @return string A string representing the header class name.
	 */
	public function getClassName()
	{
		return $this->className;
	}
}