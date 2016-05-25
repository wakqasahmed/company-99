<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */
class Product extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/product",
	 * 	tags={"product"},
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Product"))
	 * 	)
	 * )
	 */
	public function index_get()
	{
		/*
		$data = array(
			array('id' => 1, 'name' => 'Product 1'),
			array('id' => 2, 'name' => 'Product 2'),
			array('id' => 3, 'name' => 'Product 3'),
		);
		$this->response($data);
		*/

		$query = $this->db->get('products');
		$data = $query->result_array();

//	    $this->response($data);		


        // Check if the products data store contains products (in case the database result returns NULL)
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
                'message' => 'No products were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

	/**
	 * @SWG\Get(
	 * 	path="/product/{id}",
	 * 	tags={"product"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Product ID",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(ref="#/definitions/Product")
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
		//$query = $this->db->get_where('products', array('product_id' => $id));
		//$data = $query->row_array();

		$this->db->select('
			p.*,
			c.category_name,
			t.tag_text,
			pi.image_path,
			pi.thumb_path
			');

/*
		$this->db->select('
			p.*,
			c.category_name,
			GROUP_CONCAT(t.tag_text) as t.tag_text,
			pi.image_path,
			pi.thumb_path
			');
*/

		$this->db->from('Products p');

		$this->db->join('Products_Categories pc', 'p.product_id = pc.product_id','LEFT');
		$this->db->join('Categories c', 'pc.category_id = c.category_id','LEFT');
		
		$this->db->join('Products_Tags pt', 'p.product_id = pt.product_id','LEFT');
		$this->db->join('Tags t', 'pt.tag_id = t.tag_id','LEFT');

		$this->db->join('Product_Images pi', 'p.product_id = pi.product_id','LEFT');

		$this->db->where('p.product_id =', $id);

		$this->db->group_by("p.product_id"); 

		$data = $this->db->get()->result_array();		

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
                'message' => 'No product with the supplied id was found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

	/**
	 * @SWG\Post(
	 * 	path="/product",
	 * 	tags={"product"},
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Created info",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/Product")
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
	 * 	path="/product/{id}",
	 * 	tags={"product"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Product ID",
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
	 * 	path="/product/{id}",
	 * 	tags={"product"},
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Product ID",
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