<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->template('main/main_view');
	}

	public function register(){
		$this->load->template('register/register_view');
	}

}
