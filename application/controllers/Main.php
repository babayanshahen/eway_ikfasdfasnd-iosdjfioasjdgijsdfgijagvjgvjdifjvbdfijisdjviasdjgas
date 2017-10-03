<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->template('main/main_view');
		
	}
	public function about(){
		$this->load->view('main/welcome_view');
	}

	public function register(){
		redirect('log', 'location');
	}

	public function searchproduct(){
		$sword = $this->input->post('search_product');
		$this->load->model('register_product_model');
		$this->load->model('register_users_model');
		$sresults = $this->register_product_model->getprodWithUser($sword);
	}
	public function searcshop(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('shop_model');
		$sresults = $this->shop_model->getShopswithshopsname();
		echo json_encode($sresults);
	}

	public function searchotel(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('hotels_model');
		$sresults = $this->hotels_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchsalon(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('beauty_salon_model');
		$sresults = $this->beauty_salon_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchrest(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Restaurant_model');
		$sresults = $this->Restaurant_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchhome(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Rent_home_model');
		$sresults = $this->Rent_home_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchterminal(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Terminal_model');
		$sresults = $this->Terminal_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchcarwash(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Car_wash_model');
		$sresults = $this->Car_wash_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchpharmacy(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Pharmacy_model');
		$sresults = $this->Pharmacy_model->getRecords();
		echo json_encode($sresults);
	}

	public function searchcharge(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Charge_model');
		$sresults = $this->Charge_model->getRecords();
		echo json_encode($sresults);
	}

}
