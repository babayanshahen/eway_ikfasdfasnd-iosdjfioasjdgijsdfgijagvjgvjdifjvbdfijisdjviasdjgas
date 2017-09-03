<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		// $this->load->library('auth_library');
		// out($this->auth->getUser());
		// out(isLoggedIn());
		if($this->auth->isLoggedIn()){
			$this->load->model("Statment_type_model");
			$data = array('statement'=>$this->Statment_type_model->getRecords());
			// out($data);
			// foreach($data as $data){
			// 		echo $data->e_stm_name;
			// }
			$this->load->template('user/user_view',$data);
			
		}else{
			redirect('', 'location');

		}
	}

	public function register_product(){
		// out($this->auth->getUser()->id);
		// $lat = $this->input->post('lat');
		// $lng = $this->input->post('lng');
		// $e_address = $this->input->post('e_address');
		// out( $_POST);
		$this->load->model('register_product_model');
		$this->register_product_model->insert( array(
			'e_user_id' =>  $this->auth->getUser()->id,  
			'e_product_name' => $this->input->post('e_product_name'),
			'e_product_type' => $this->input->post('e_product_type'),
			'e_product_price' => $this->input->post('e_product_price'),
			'e_lat' => $this->input->post('lat'),
			'e_lng' => $this->input->post('lng'),
			'e_address' =>  $this->input->post('e_address'),
			'e_pnumber' =>   $this->input->post('e_pnumber')
			));
		redirect('user', 'location');
		// out($lat);
		// $this->load->template('user/user_view');
	}
	public function searchPRoduct(){
		$sword = $this->input->post('search_product');
		$this->load->model('register_product_model');
		$sresults = $this->register_product_model->getRecords(array(
			'e_product_type' =>  $sword
			));

		// echo $sword;	
		// echo $foo;	
		// out($this->input->post('search_product'));
		// foreach ($sresults as $sresult) {
			echo json_encode($sresults);
		// }
		// out($this->db->last_query());
		// out($sresult);
	}
}
