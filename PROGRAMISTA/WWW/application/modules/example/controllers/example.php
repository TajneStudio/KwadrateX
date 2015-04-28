<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function index(){
		$data['segment_strony'] = 'example';
		$data['segment_listy'] = '';
		
		$data['link_nastepny'] = site_url("example/authenication").'/zmienna_wyslana';
		
		/*
		$newdata = array(
						   'username'  => 'johndoe',
						   'email'     => 'johndoe@some-site.com',
						   'logged_in' => TRUE,
						   'role_id' => 0
					   );

		$this->session->set_userdata($newdata);
		
		
		print_r($this->session->all_userdata());
		*/

		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('example_authenication_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('example_authenication_view.js', null, true));
			//HTML KOD
		$this->load->view('example_index_view',$data);
		// END ZALADUJ WIDOK
	}
	
	public function authenication($v){
		$data['segment_strony'] = 'example';
		$data['segment_listy'] = '';
		
		$data['zmienna_przeslana'] = $v;
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('example_authenication_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('example_authenication_view.js', null, true));
			//HTML KOD
		$this->load->view('example_authenication_view',$data);
		// END ZALADUJ WIDOK
	}
	
	public function authenication_error(){
		$data['segment_strony'] = 'example';
		$data['segment_listy'] = '';
		
		$data['tresc_bledu'] = "UWAGA! Nie masz odpowiednich praw do oglądania tej strony!";
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('example_authenication_error_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('example_authenication_error_view.js', null, true));
			//HTML KOD
		$this->load->view('example_authenication_error_view',$data);
		// END ZALADUJ WIDOK
	}
	
}