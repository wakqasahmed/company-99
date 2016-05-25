<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mTitle = 'Colors';
	}

	// Grocery CRUD - Colors
	public function index()
	{
		$crud = $this->generate_crud('colors');

	    $crud->set_subject('Color');

        $crud->columns('color_name','color_description');
        $crud->fields('color_name','color_description');
 
        $crud->display_as('color_name','Color Name');
        $crud->display_as('color_description','Color Description');

		$crud->required_fields('color_name');

		$this->render_crud();
	}
}
