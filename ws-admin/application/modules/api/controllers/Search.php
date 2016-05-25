<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */
class Search extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/search",
	 * 	tags={"search"},
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Search"))
	 * 	)
	 * )
	 */
	public function id_get($term)
	{
			

//		$query = $this->db->get_where('products', array('name' => $id));
//		$data = $query->result_array();		

		$keyword=explode(" ",$term);

		$this->db->select('p.*');
		$this->db->from('Products p');
		//$this->db->join('Products_Categories pc', 'p.product_id = pc.product_id','LEFT');
		//$this->db->join('Categories c', 'pc.category_id = c.category_id','LEFT');
		//$this->db->join('Colors co', 'p.color_id = co.color_id','LEFT');
		//$this->db->join('Products_Tags pt', 'p.product_id = pt.product_id','LEFT');		
		//$this->db->where('p.enabled', 1);

		foreach($keyword as $k){
			$this->db->where('p.product_id =', $k);//or_where			
			//$this->db->or_where('p.id =', $k);//or_where
			$this->db->like('p.product_sku', $k);
			//$this->db->like('pt.tag_text', $k);			
			//$this->db->like('p.short_desc', $k);//or_like			
			//$this->db->like('p.long_desc', $k);//or_like
			//$this->db->like('co.color_name', $k);
			//$this->db->like('c.category_name', $k);
		}

		$this->db->group_by("p.product_id"); 

		$data = $this->db->get()->result_array();

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
                'message' => 'No search results were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}
}