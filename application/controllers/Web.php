<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	 function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = $this->MyModel->get_all_record('product');

		$this->db->select('*');
		$this->db->from('card');
		$this->db->WHERE('user_id', 1);
		// $this->db->from('card');
		$query = $this->db->get();

		// Get the number of rows
		$row_count = $query->num_rows();
		// $return = array('data' => $data, 'count' => $row_count);
		$data['count'] = $row_count;
		$this->load->view('index',$data);
	}

      //Add product to cart
    public function add_to_cart() {
    	// print_r($_POST);die;
        $product_data = array(
            'product_id'  => $this->input->post('product_id'),
            'user_id' => 1
        );
         if($product_data){
         	$data = $this->MyModel->insert('card',$product_data);
         	redirect('web/index');
         } else{

         }

        
    }
    public function cardView(){
    	$sql = "SELECT A.*,B.name,B.price, COUNT(A.id) as qyt, SUM(B.price) as total_price FROM `card` as A LEFT JOIN product as B ON(A.product_id=B.id) WHERE A.user_id = 1 GROUP BY A.product_id";

    	$query = $this->db->query($sql);
    	$data['cart'] = $query->result_array();
    	// print_r($data);
    	// die;
    	$this->load->view('card_view',$data);
    }

    // Remove item from cart
    public function delete($product_id) {
        $cart = $this->session->userdata('card');
        unset($cart[$product_id]);
        $this->session->set_userdata('cart', $cart);
        redirect('web/cardView');
    }
}
