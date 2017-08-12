<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index( $a=NULL){
		$this->load->template('main/main_view');
	}

	public function register( $a=NULL){
		$this->load->template('register/register_view');
	}

}
