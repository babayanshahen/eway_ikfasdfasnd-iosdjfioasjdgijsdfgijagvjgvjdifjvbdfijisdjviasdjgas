<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->template('main/main_view');
		// $this->load->view('main/welcome_view');
	}

	public function searchproduct(){
		$sword = $this->input->post('search_product');
		$this->load->model('register_product_model');
		$this->load->model('register_users_model');
		// $a= $this->auth->getUser()->id;
		// out($a);
		$sresults = $this->register_product_model->getprodWithUser($sword);

		// $newarr  = array('id' => 'asd', );
		// array_push($sresults,$newarr);


		// $this->register_users_model->getRecords(array(
		// 	'id' => $sresults->e_user_id
		// 	));
		// echo $sword;	
		// echo $foo;	
		// out($sresults);
		// foreach ($sresults as $sresult) {
			echo json_encode($sresults);
		// }
		// out($this->db->last_query());
		// out($sresult);
	}
	public function searcshop(){
		$this->load->model('shop_model');
		$sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchotel(){
		$this->load->model('hotels_model');
		$sresults = $this->hotels_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchsalon(){
		$this->load->model('beauty_salon_model');
		$sresults = $this->beauty_salon_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchrest(){
		$this->load->model('Restaurant_model');
		$sresults = $this->Restaurant_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchhome(){
		$this->load->model('Rent_home_model');
		$sresults = $this->Rent_home_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchterminal(){
		$this->load->model('Terminal_model');
		$sresults = $this->Terminal_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchcarwash(){
		$this->load->model('Car_wash_model');
		$sresults = $this->Car_wash_model->getRecords();
		// $sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}
}
