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

        $crud->columns('tag_text');
        $crud->fields('tag_text');
 
        $crud->display_as('tag_text','Tag Text');

		$crud->required_fields('tag_text');

		$this->render_crud();
	}
}
