<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mTitle = 'Categories';
	}

	// Grocery CRUD - Categorys
	public function index()
	{
		$crud = $this->generate_crud('categories');

	    $crud->set_subject('Categories');

        $crud->columns('name','slug','ancestors');
        $crud->fields('name','slug','ancestors');
 
        $crud->display_as('name','Category Name');
        $crud->display_as('slug','Category URL');
        $crud->display_as('ancestors','Category Parent Tree');

		$crud->required_fields('name','slug');

		$this->render_crud();
	}
}
