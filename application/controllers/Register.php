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
				if($userpass === $userconfpass ){
			// 		echo  $userpass;
			// 		echo  $userconfpass;
			// var_dump($userpass);
				$data  = array(
					'user_name' => $username,
					'user_lastname' => $userlastname,
					'user_mobile_number' => $usermobile,
					'user_email' => $useremail,	
					'user_password' => crypt($userpass),
					'user_register_time' => time()
					);
				$this->load->model('register_users_model');
				$this->register_users_model->insert($data);
				redirect('user', 'location');

				}else{
					// die('else');
					$data = array(
						'username' => $username,
						'userlastname' => $userlastname,
						'usermobile' => $usermobile,
						'useremail' => $useremail,
						'errorline'	=> true,
						'haserror' => true 

						);
					// out($data);
					$this->load->template('register/register_view',$data);
					// echo 7777777777777777777; 					
				}

			}else{
				$data = array(
					'username' => $username,
					'userlastname' => $userlastname,
					'usermobile' => $usermobile,
					'useremail' => $useremail,	
					'haserror' => true 
					);
				var_dump($username);

				// $this->load->template('register/register_view',$data);
			}
			// out($this->input->server('REQUEST_METHOD'));
		}
		// if(isset($pst) && !empty($pst)){
		// }
		// $aaa = $this->input->post();
		// out($aaa['first_name']);
		$this->load->template('register/register_view');
	}
}
