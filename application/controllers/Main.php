<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->template('main/main_view');
		// $this->load->view('main/welcome_view');
	}
}
