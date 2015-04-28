<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wylogowanie extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('logowanie_model');
	}
	
	public function index(){
		$this->logowanie_model->wyloguj();
		redirect('newsy/strona', 'refresh');
	}
	
}