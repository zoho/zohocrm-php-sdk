<?php 
namespace com\zoho\crm\api\record;

use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Model;

class InventoryLineItems extends Record implements Model
{


	/**
	 * The method to get the product
	 * @return LineItemProduct An instance of LineItemProduct
	 */
	public  function getProduct()
	{
		return $this->getKeyValue('product'); 

	}

	/**
	 * The method to set the value to product
	 * @param LineItemProduct $product An instance of LineItemProduct
	 */
	public  function setProduct(LineItemProduct $product)
	{
		$this->addKeyValue('product', $product); 

	}

	/**
	 * The method to get the quantity
	 * @return float A float representing the quantity
	 */
	public  function getQuantity()
	{
		return $this->getKeyValue('quantity'); 

	}

	/**
	 * The method to set the value to quantity
	 * @param float $quantity A float
	 */
	public  function setQuantity(float $quantity)
	{
		$this->addKeyValue('quantity', $quantity); 

	}

	/**
	 * The method to get the discount
	 * @return string A string representing the discount
	 */
	public  function getDiscount()
	{
		return $this->getKeyValue('Discount'); 

	}

	/**
	 * The method to set the value to discount
	 * @param string $discount A string
	 */
	public  function setDiscount(string $discount)
	{
		$this->addKeyValue('Discount', $discount); 

	}

	/**
	 * The method to get the totalAfterDiscount
	 * @return float A float representing the totalAfterDiscount
	 */
	public  function getTotalAfterDiscount()
	{
		return $this->getKeyValue('total_after_discount'); 

	}

	/**
	 * The method to set the value to totalAfterDiscount
	 * @param float $totalAfterDiscount A float
	 */
	public  function setTotalAfterDiscount(float $totalAfterDiscount)
	{
		$this->addKeyValue('total_after_discount', $totalAfterDiscount); 

	}

	/**
	 * The method to get the netTotal
	 * @return float A float representing the netTotal
	 */
	public  function getNetTotal()
	{
		return $this->getKeyValue('net_total'); 

	}

	/**
	 * The method to set the value to netTotal
	 * @param float $netTotal A float
	 */
	public  function setNetTotal(float $netTotal)
	{
		$this->addKeyValue('net_total', $netTotal); 

	}

	/**
	 * The method to get the book
	 * @return float A float representing the book
	 */
	public  function getBook()
	{
		return $this->getKeyValue('book'); 

	}

	/**
	 * The method to set the value to book
	 * @param float $book A float
	 */
	public  function setBook(float $book)
	{
		$this->addKeyValue('book', $book); 

	}

	/**
	 * The method to get the tax
	 * @return float A float representing the tax
	 */
	public  function getTax()
	{
		return $this->getKeyValue('Tax'); 

	}

	/**
	 * The method to set the value to tax
	 * @param float $tax A float
	 */
	public  function setTax(float $tax)
	{
		$this->addKeyValue('Tax', $tax); 

	}

	/**
	 * The method to get the listPrice
	 * @return float A float representing the listPrice
	 */
	public  function getListPrice()
	{
		return $this->getKeyValue('list_price'); 

	}

	/**
	 * The method to set the value to listPrice
	 * @param float $listPrice A float
	 */
	public  function setListPrice(float $listPrice)
	{
		$this->addKeyValue('list_price', $listPrice); 

	}

	/**
	 * The method to get the unitPrice
	 * @return float A float representing the unitPrice
	 */
	public  function getUnitPrice()
	{
		return $this->getKeyValue('unit_price'); 

	}

	/**
	 * The method to set the value to unitPrice
	 * @param float $unitPrice A float
	 */
	public  function setUnitPrice(float $unitPrice)
	{
		$this->addKeyValue('unit_price', $unitPrice); 

	}

	/**
	 * The method to get the quantityInStock
	 * @return float A float representing the quantityInStock
	 */
	public  function getQuantityInStock()
	{
		return $this->getKeyValue('quantity_in_stock'); 

	}

	/**
	 * The method to set the value to quantityInStock
	 * @param float $quantityInStock A float
	 */
	public  function setQuantityInStock(float $quantityInStock)
	{
		$this->addKeyValue('quantity_in_stock', $quantityInStock); 

	}

	/**
	 * The method to get the total
	 * @return float A float representing the total
	 */
	public  function getTotal()
	{
		return $this->getKeyValue('total'); 

	}

	/**
	 * The method to set the value to total
	 * @param float $total A float
	 */
	public  function setTotal(float $total)
	{
		$this->addKeyValue('total', $total); 

	}

	/**
	 * The method to get the productDescription
	 * @return string A string representing the productDescription
	 */
	public  function getProductDescription()
	{
		return $this->getKeyValue('product_description'); 

	}

	/**
	 * The method to set the value to productDescription
	 * @param string $productDescription A string
	 */
	public  function setProductDescription(string $productDescription)
	{
		$this->addKeyValue('product_description', $productDescription); 

	}

	/**
	 * The method to get the lineTax
	 * @return array A array representing the lineTax
	 */
	public  function getLineTax()
	{
		return $this->getKeyValue('line_tax'); 

	}

	/**
	 * The method to set the value to lineTax
	 * @param array $lineTax A array
	 */
	public  function setLineTax(array $lineTax)
	{
		$this->addKeyValue('line_tax', $lineTax); 

	}
} 
