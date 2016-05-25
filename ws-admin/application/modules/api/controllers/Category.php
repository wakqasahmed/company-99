<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */
class Category extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/category",
	 * 	tags={"category"},
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Category"))
	 * 	)
	 * )
	 */
	public function index_get()
	{
		/*
		$data = array(
			array('id' => 1, 'name' => 'Category 1'),
			array('id' => 2, 'name' => 'Category 2'),
			array('id' => 3, 'name' => 'Category 3'),
		);
		$this->response($data);
		*/

		$query = $this->db->get('categories');
		$data = $query->result_array();

//	    $this->response($data);		


        // Check if the categories data store contains categories (in case the database result returns NULL)
        if ($data)
        {
            // Set the response and exit
            $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No categories were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

	/**
	 * @SWG\Get(
	 * 	path="/category/{id}",
	 * 	tags={"category"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Category ID",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(ref="#/definitions/Category")
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
		$query = $this->db->get_where('categories', array('category_id' => $id));
		$data = $query->row_array();

        if ($data)
        {
            // Set the response and exit
            $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No category with the supplied id was found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

	/**
	 * @SWG\Post(
	 * 	path="/category",
	 * 	tags={"category"},
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Created info",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/Category")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Successful operation"
	 * 	)
	 * )
	 */
	public function index_post()
	{
		$params = elements(array('filter', 'valid', 'fields', 'here'), $this->post());
		$this->created();
	}

	/**
	 * @SWG\Put(
	 * 	path="/category/{id}",
	 * 	tags={"category"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Category ID",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Successful operation"
	 * 	)
	 * )
	 */
	public function id_put($id)
	{
		$params = elements(array('filter', 'valid', 'fields', 'here'), $this->put());
		$this->error_not_implemented();
	}

	/**
	 * @SWG\Delete(
	 * 	path="/category/{id}",
	 * 	tags={"category"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Category ID",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Successful operation"
	 * 	)
	 * )
	 */
	public function id_delete($id)
	{
		$this->accepted();
	}
}