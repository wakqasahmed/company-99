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

        $crud->columns('name','description');
        $crud->fields('name','description');
 
        $crud->display_as('name','Brand Name');
        $crud->display_as('description','Brand Description');

		$crud->required_fields('name');

		$this->render_crud();
	}
}
