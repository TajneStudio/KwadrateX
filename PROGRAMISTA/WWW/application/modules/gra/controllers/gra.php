<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gra extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('gra_model');
	}
	
	public function zagraj(){
		$data['segment_strony'] = 'gra';
		$data['segment_listy'] = '';
		
		$this->gra_model->dodaj_pierwszego_stworka($this->session->userdata("user_id"));

		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('gra_index_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('gra_index_view.js', null, true));
			//HTML KOD
		$this->load->view('gra_index_view',$data);
		// END ZALADUJ WIDOK
	}
	
	public function authenication_error(){
		$data['segment_strony'] = 'gra';
		$data['segment_listy'] = '';
		
		$data['tresc_bledu'] = "UWAGA! Musisz być zalogowany aby zgrać!";
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('gra_authenication_error_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('gra_authenication_error_view.js', null, true));
			//HTML KOD
		$this->load->view('gra_authenication_error_view',$data);
		// END ZALADUJ WIDOK
	}
	
	public function ajax(){
		//funkcja odpowiada za pobranie danych stworka
		if($_POST["funkcja"] == 1){
			print json_encode($this->gra_model->pobierz_dane_stworka($this->session->userdata("user_id")));
		}
		
		//funkcja zapisuje stworka
		if($_POST["funkcja"] == 2){
			$this->gra_model->zapisz_dane_stworka($this->session->userdata("user_id"),$_POST["json_parametrow"]);
		}
		
		//funkcja odpowiada za pobranie ekwipunku stworka
		if($_POST["funkcja"] == 3){
			print json_encode($this->gra_model->pobierz_ekwipunek_stworka($this->session->userdata("user_id")));
		}
		
	}
	
}