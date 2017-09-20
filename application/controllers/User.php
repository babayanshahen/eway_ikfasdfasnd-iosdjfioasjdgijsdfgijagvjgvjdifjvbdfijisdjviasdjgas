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
						'e_statment_type' =>  1,
						'e_address' =>  $this->input->post('e_address'),
						'e_pnumber' =>   $this->input->post('e_pnumber')
						));
					redirect('user', 'location');
					break;

					case '2':
					$this->load->model('shop_model');
					$this->shop_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_shop_name' => $this->input->post('e_shop_name'),
						'e_shop_type' => $this->input->post('shop_type'),
						// 'e_product_price' => $this->input->post('e_product_price'),
						'e_time_1' => $this->input->post('e_time_1'),
						'e_time_2' => $this->input->post('e_time_2'),
						'e_lat' => $this->input->post('lat'),
						'e_lng' => $this->input->post('lng'),
						'e_address' =>  $this->input->post('e_address'),
						'e_24hour' =>   $this->input->post('round_the_clock')
						));
					redirect('user', 'location');
					break;
					// carwash
					case '3':
					$this->load->model('Car_wash_model');
					$this->Car_wash_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_name' => $this->input->post('e_name'),
						// 'e_product_price' => $this->input->post('e_product_price'),
						'e_time_1' => $this->input->post('e_time_1'),
						'e_time_2' => $this->input->post('e_time_2'),
						'e_lat' => $this->input->post('lat'),
						'e_lng' => $this->input->post('lng'),
						'e_address' =>  $this->input->post('e_address'),
						'e_24hour' =>   is_null($this->input->post('round_the_clock')) ? 'OFF' :$this->input->post('round_the_clock')
						));
					redirect('user', 'location');
					break;
					
					// renthome
					case '5':
					$this->load->model('rent_home_model');
					$this->rent_home_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_rent_type' =>  $this->input->post('rent_type'),  
						'e_rent_pnumber' =>  $this->input->post('e_pnumber'),  
						'e_rent_price' =>  $this->input->post('e_rend_price'), 
						'e_rent_addres' =>  $this->input->post('e_address'),  
						'e_lat' =>  $this->input->post('lat'),  
						'e_lng' =>  $this->input->post('lng')
						));
					redirect('user', 'location');
					break;

					// terrminal
					case '6':
					$this->load->model('Terminal_model');
					$this->Terminal_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_type' =>  $this->input->post('e_type'),
						'e_time_1' =>  $this->input->post('e_time_1'),  
						'e_time_2' =>  $this->input->post('e_time_2'),
						'e_24hour' =>  is_null($this->input->post('round_the_clock')) ? 'OFF' : $this->input->post('round_the_clock'), 
						// 'e_rent_pnumber' =>  $this->input->post('e_pnumber'),  
						// 'e_rent_price' =>  $this->input->post('e_rend_price'), 
						'e_address' =>  $this->input->post('e_address'),  
						'e_lat' =>  $this->input->post('lat'),  
						'e_lng' =>  $this->input->post('lng')
						));
					redirect('user', 'location');
					break;

					case '7':
					// out( $this->input->post('lng'));
					$this->load->model('hotels_model');
					$this->hotels_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_address' =>  $this->input->post('e_address'),
						'e_hotel_name' =>  $this->input->post('e_hotel_name'),  
						'e_pnumber' =>  $this->input->post('e_pnumber'),  
						'e_lat' =>  $this->input->post('lat'),  
						'e_lng' =>  $this->input->post('lng')
						));
					redirect('user', 'location');
					break;

					// beuty salon
					case '8':
					$this->load->model('Beauty_salon_model');
					$this->Beauty_salon_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_address' =>  $this->input->post('e_address'),
						'e_salon_name' =>  $this->input->post('e_salon_name'),  
						'e_pnumber' =>  $this->input->post('e_pnumber'),  
						'e_lat' =>  $this->input->post('lat'),  
						'e_lng' =>  $this->input->post('lng')
						));
					redirect('user', 'location');
					break;

					// restaurant
					case '10':
					$this->load->model('Restaurant_model');
					$this->Restaurant_model->insert( array(
						'e_user_id' =>  $this->auth->getUser()->id,  
						'e_address' =>  $this->input->post('e_address'),
						'e_name' =>  $this->input->post('e_name'),  
						'e_pnumber' =>  $this->input->post('e_pnumber'),  
						'e_lat' =>  $this->input->post('lat'),  
						'e_lng' =>  $this->input->post('lng')
						));
					redirect('user', 'location');
					break;
				
				
				// default: 
				// 	# code...
				// 	break;
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
