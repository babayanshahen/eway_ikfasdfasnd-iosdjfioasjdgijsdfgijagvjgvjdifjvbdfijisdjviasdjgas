<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index(){
		$this->load->template('register/register_view');
	}

	public function registering(){
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$username = $this->input->post('user_name');
			$userlastname = $this->input->post('user_lastname');
			$usermobile = $this->input->post('user_mobile_number');
			$useremail = $this->input->post('user_email');
			$userpass = $this->input->post('user_password');
			$userconfpass = $this->input->post('password_confirmation');
			if(isset($userpass) && isset($userconfpass) && !empty($userconfpass) && !empty($userpass)){
					// die('else');
				if($userpass === $userconfpass ){
					$data  = array(
						'user_name' => $username,
						'user_lastname' => $userlastname,
						'user_mobile_number' => $usermobile,
						'user_email' => $useremail,	
						'user_password' => password_hash($userpass, PASSWORD_BCRYPT),
						// if (password_verify('rasmuslerdorf', $hash)) {
						'user_register_time' => time()
						);
					$this->load->model('register_users_model');
					$this->register_users_model->insert($data);
					redirect('user', 'location');
				}else{
					$data = array(
						'username' => $username,
						'userlastname' => $userlastname,
						'usermobile' => $usermobile,
						'useremail' => $useremail,
						'errorline'	=> true,
						'haserror' => true 
						);
				}

			}else{
				$data = array(
					'error_n' => empty($username) ? true : false ,
					'error_ln' => empty($userlastname) ? true : false ,
					'error_mobile' => empty($usermobile) ? true : false ,
					'error_email' => empty($useremail) ? true : false ,
					'haserror' => true,
					'errorline'	=> true,
					'username' => $username,
					'userlastname' => $userlastname,
					'usermobile' => $usermobile,
					'useremail' => $useremail,
					);
			}
			// redirect('register', 'location');
			$this->load->template('register/register_view',$data);
		}
	}
}
