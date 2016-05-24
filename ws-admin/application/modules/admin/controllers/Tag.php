<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mTitle = 'Tags';
	}

	// Grocery CRUD - Tags
	public function index()
	{
		$crud = $this->generate_crud('tags');

	    $crud->set_subject('Tag');

        $crud->columns('text');
        $crud->fields('text');
 
        $crud->display_as('name','Tag Text');

		$crud->required_fields('text');

		$this->render_crud();
	}
}
