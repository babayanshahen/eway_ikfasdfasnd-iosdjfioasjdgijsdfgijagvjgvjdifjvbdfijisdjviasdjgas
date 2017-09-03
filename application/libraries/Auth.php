<?php
class Auth{

	function __construct(){
		$this->ci = &get_instance();
		$this->ci->load->library('session');
	}
    /**
    * Sets login information
    * 
    * @param array $user_info
    */
	function setLoginInfo($user_info){
		$this->ci->session->set_userdata('user',$user_info);
		$this->ci->session->set_userdata('logged_in',true);

	}
    /**
    * Logs a user out
    * 
    * @param mixed 
    */
	function logout($user_info=false){
		$this->ci->session->unset_userdata('user');
		$this->ci->session->unset_userdata('logged_in');
	}

    /**
    * Gets current user array
    * 
    */
	function getUser(){
		return $this->ci->session->userdata('user');
	}
    
    /**
    * Checks if user is logged in
    * 
    */
	function isLoggedIn(){
		return $this->ci->session->userdata('logged_in');
	}
}	