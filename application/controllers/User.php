<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$this->load->template('user/user_view');
	}

	public function register_product(){
		out($_POST);
		die();
		$this->load->model('register_product_model');
		// $this->load->template('user/user_view');
	}
}
