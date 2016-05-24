<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mTitle = 'Products';
	}

	// Grocery CRUD - Products
	public function index()
	{
		$crud = $this->generate_crud('products');

	    $crud->set_subject('Product');

        $crud->columns('name','short_desc','long_desc','sku','original_price','discount_amount','discount_percent','weight','dimensions','size','guarantee');
        $crud->fields('name','short_desc','long_desc','sku','original_price','discount_amount','discount_percent','weight','dimensions','size','guarantee');
 
	    $crud->callback_column('original_price',array($this,'valueToLira'));

        $crud->display_as('name','Product Name');
        $crud->display_as('short_desc','Short Description');
        $crud->display_as('long_desc','Detailed Description');
        $crud->display_as('sku','SKU (e.g. product.name-(size)-(colour)_supplier.number)');
        $crud->display_as('original_price','Full Price');
        $crud->display_as('discount_amount','Discount Amount');
        $crud->display_as('discount_percent','Discount Percentage');        
        $crud->display_as('weight','Weight');
        $crud->display_as('dimensions','Dimensions');
        $crud->display_as('size','Size');
        $crud->display_as('guarantee','Guarantee Years (e.g. 5)');                        

		$crud->required_fields('name','original_price');

		$this->render_crud();
	}

	function valueToEuro($value, $row)
	{
	    return '&euro;'.$value;
	}	

	function valueToLira($value, $row)
	{
	    return '&#8356;'.$value;
	}		

	function valueToIndianRupee($value, $row)
	{
	    return '&#8377;'.$value;
	}

	function valueToDollar($value, $row)
	{
	    return '$'.$value;
	}	
}
