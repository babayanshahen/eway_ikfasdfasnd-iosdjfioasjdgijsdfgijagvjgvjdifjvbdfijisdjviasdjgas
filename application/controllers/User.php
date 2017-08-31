<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$this->load->model("Statment_type_model");
		$data = array('statement'=>$this->Statment_type_model->getRecords());
		// out($data);
		// foreach($data as $data){
		// 		echo $data->e_stm_name;
		// }
		$this->load->template('user/user_view',$data);
	}

	public function register_product(){
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$user_prod_add = $this->input->post('user_prod_add');
		$this->load->model('register_product_model');
		$this->register_product_model->insert( array(
			'e_user_id' =>  '77',  
			'e_user_address' =>  $user_prod_add,  
			'e_lat' => $lat,
			'e_lng' => $lng
			));
		out($lat);
		die();
		// $this->load->template('user/user_view');
	}
}
