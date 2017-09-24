<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index(){
		$data = array(
				'logactive'=>true,
				'regactive'=>false,
			); 
		$this->load->template('log/login_view',$data);
	}

	public function reg(){
		$data = array(
				'logactive'=>false,
				'regactive'=>true,
			); 
		$this->load->template('log/login_view',$data);
	}

	public function doLogin(){
		// redirect('login', 'location');

		$this->load->model('Register_users_model');
		$log = $this->input->post('user_login');
		$pass = $this->input->post('user_password');
		$e_user = $this->Register_users_model->getUser(array('user_login' => $log));
		// out($e_user);
		if($e_user){
			if(password_verify($pass, $e_user->user_password)){
				$this->auth->setLoginInfo($e_user);
				redirect('user', 'location');
				// out($e_user->user_password);
			}else{
				$data = array(
					'loginerror' => true ,
					'errorline'	=> ' Սխալ Մուտքանուն կամ Գաղտնաբառ',
					'logactive'=>true,
					'regactive'=>false
				);
			}
		}else{
			$data = array(
					
					'loginerror' => true ,
					'errorline'	=> ' Սխալ Մուտքանուն կամ Գաղտնաբառ',
					'logactive'=>true,
					'regactive'=>false
			);
		}
				// redirect('log', 'location');
		$this->load->template('log/login_view',$data);
	}

	public function logout(){
		// out($this->auth->getUser());
		$this->load->model('Register_users_model');
		$this->Register_users_model->update($this->auth->getUser()->id,array('user_first_login' => 'no'));
		$this->auth->logout();
		redirect('', 'location');
	}

	public function registering(){
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$user_nick = $this->input->post('user_nick');
			$user_login = $this->input->post('user_login');
			// $userlastname = $this->input->post('user_lastname');
			// $usermobile = $this->input->post('user_mobile_number');
			// $useremail = $this->input->post('user_email');
			$userpass = $this->input->post('user_password');
			$userconfpass = $this->input->post('password_confirmation');
			$data = array(
						'logactive'=>false,
						'regactive'=>true
						);
			if(isset($userpass) && isset($userconfpass) && !empty($userconfpass) && !empty($userpass)){
				if($userpass === $userconfpass ){
					$this->load->model('Register_users_model');
					$count_user = $this->Register_users_model->isUserUniq(
						array(
							'user_login' => $user_login
						)
					);
					if($count_user){
					$data  = array(
						'user_nick' => $user_nick,
						'user_login' => $user_login,
						'user_password' => password_hash($userpass, PASSWORD_BCRYPT),
						'user_first_login' => 'true',
						'user_register_time' => time()
						);
					$this->load->model('register_users_model');
					$this->register_users_model->insert($data);
					$this->auth->setLoginInfo($data);
					redirect('user', 'location');
					}else{
						$data = array(
						'user_nick' => $user_nick,
						'user_login' => $user_login,
						'errorline'	=> 'Ընտրեք այլ Մուտքանուն',
						'errorlogin' => true,
						'logactive'=>false,
						'regactive'=>true
						);
					}
				}else{
					$data = array(
						'user_nick' => $user_nick,
						'user_login' => $user_login,
						'errorline'	=> 'Գաղտնաբառերը չեն համընկնում',
						// 'haserror' => true ,
						'errorp' => true,
						'errorpc' => true,
						'logactive'=>false,
						'regactive'=>true
						);
				}

			}else{
					// out($_POST);
				$data = array(
					
					// 'error_n' => empty($user_nick) ? true : false ,
					// 'haserror' => true,
					// 'errorline'	=> true,
					'user_nick' => $user_nick,
					'user_login' => $user_login,
					'errornick' => isset($user_nick) && !empty($user_nick) ? false : true,
					'errorlogin' => isset($user_login) && !empty($user_login) ? false : true,
					'errorp' => true,
					'errorpc' => true,
					'errorline'	=> ' Լրացրեք տողերը',
					'logactive'=>false,
					'regactive'=>true
					);
			}
			$this->load->template('log/login_view',$data);
		}
	}
}
