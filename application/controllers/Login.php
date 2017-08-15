<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->template('login/login_view');
	}
	public function doLogin(){
		$login = $this->input->post()
		// $this->load->template('login/login_view');
	}
}
