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

        $crud->columns('category_name','category_slug','category_ancestors');
        $crud->fields('category_name','category_slug','category_ancestors');
 
        $crud->display_as('category_name','Category Name');
        $crud->display_as('category_slug','Category URL');
        $crud->display_as('category_ancestors','Category Parent Tree');

		$crud->required_fields('category_name','category_slug');

		$this->render_crud();
	}
}
