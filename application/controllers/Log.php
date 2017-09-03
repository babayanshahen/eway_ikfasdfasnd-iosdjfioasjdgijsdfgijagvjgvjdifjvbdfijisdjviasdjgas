<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index(){
		$this->load->template('log/login_view');
	}
	public function doLogin(){
		// redirect('login', 'location');

		$this->load->model('Register_users_model');
		$log = $this->input->post('user_login');
		$pass = $this->input->post('user_password');
		$e_user = $this->Register_users_model->getUser(array('user_name' => $log));
		// out($e_user);
		if($e_user){
			if(password_verify($pass, $e_user->user_password)){
				$this->auth->setLoginInfo($e_user);
				redirect('user', 'location');
				// out($e_user->user_password);
			}
		}
		$this->load->template('log/login_view');
	}

	public function logout(){
		$this->auth->logout();
		redirect('', 'location');
	}
}
