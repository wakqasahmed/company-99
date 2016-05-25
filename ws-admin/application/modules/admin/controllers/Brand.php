<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mTitle = 'Brands';
	}

	// Grocery CRUD - Brands
	public function index()
	{
		$crud = $this->generate_crud('brands');

	    $crud->set_subject('Brand');

        $crud->columns('brand_name','brand_description');
        $crud->fields('brand_name','brand_description');
 
        $crud->display_as('brand_name','Brand Name');
        $crud->display_as('brand_description','Brand Description');

		$crud->required_fields('brand_name');

		$this->render_crud();
	}
}
