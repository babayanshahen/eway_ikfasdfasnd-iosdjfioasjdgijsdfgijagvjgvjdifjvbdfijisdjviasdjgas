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
}
