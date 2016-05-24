<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * For demo purpose only
 */
class Brand extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		//$this->push_breadcrumb('Demo');
	}

	public function index()
	{
//		redirect('brand/item/1');
		$this->mViewData['brand_id'] = 'test';
		$this->render('brands/index');		
	}

	public function item($brand_id)
	{
		$this->mViewData['id'] = $brand_id;
		$this->render('brand/item');
	}

	public function waqas()
	{
		//$this->management();
		$this->mViewData['brand_id'] = 'test';
		$this->render('brands/index');
	}

    public function management()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('brands');
	    $crud->set_subject('Brand');

        $crud->columns('name','description');
        $crud->fields('name','description');
 
        $crud->display_as('name','Brand Name');
        $crud->display_as('description','Brand Description');

        $output = $crud->render();
 
        $this->_example_output($output);                
    }   

}
