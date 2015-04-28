<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strona_startowa extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function index(){
		$data['segment_strony'] = '';
		$data['segment_listy'] = '';

		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('strona_startowa_index_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('strona_startowa_index_view.js', null, true));
			//HTML KOD
		$this->load->view('strona_startowa_index_view',$data);
		// END ZALADUJ WIDOK
	}
	
	public function authenication_error(){
		$data['segment_strony'] = 'strona_startowa';
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