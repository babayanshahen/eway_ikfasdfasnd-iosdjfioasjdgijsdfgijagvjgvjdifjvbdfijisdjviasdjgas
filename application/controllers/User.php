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
	if(isset($this->auth->getUser()->id)){
		$this->load->model('register_product_model');
			switch ($this->input->post("statement")) {
				case '1':
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
					break;
				
				default:
					# code...
					break;
			}

	}else{
			redirect('log','location');
	}
		// out($lat);
		// $this->load->template('user/user_view');
	}

	public function getTypes($type){
		$this->load->model('shops_model');
		if($type =="shops"){
			$data =  $this->shops_model->getRecords();
			echo json_encode($data);
		}
	}
	
}
