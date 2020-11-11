<?php
namespace com\zoho\crm\api;

/**
 * This class represents the HTTP parameter.
 */
class Param
{
   private $name = null;

   private $className = null;
   
   /**
    * Creates an Param class instance with the specified parameter name.
    * @param string $name A string containing the parameter name.
    * @param string $className A string containing the parameter class name.
    */
   function __construct($name, $className=null)
   {
       $this->name = $name;

       $this->className = $className;
   }
   
   /**
    * This is a getter method to get parameter name.
    * @return string A string representing the parameter name.
    */
   public function getName()
   {
       return $this->name;
   }

   /**
	 * This is a getter method to get parameter class name.
	 * @return string A string representing the parameter class name.
	 */
	public function getClassName()
	{
		return $this->className;
	}
}