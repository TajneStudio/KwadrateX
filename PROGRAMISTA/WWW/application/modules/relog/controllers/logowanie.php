<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest Controllerem odpowiedzialnym za system logowania na stronie
 * 
 * @author Lukasz Flak
 *
 */
class Logowanie extends CI_Controller {
	
	/*
	 * Konstruktor laduje model logowania
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('logowanie_model');
	}
	
	/*
	 * Metoda wyswietla strone logowania
	 */
	public function index()
	{
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'user_login', 
							 'label'   => 'Login', 
							 'rules'   => 'required|max_length[20]'
						  ),
					   array(
							 'field'   => 'user_pass', 
							 'label'   => 'Hasło', 
							 'rules'   => 'required|max_length[20]|callback_login_pass_check'
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
	
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'logowanie';
			$data['segment_listy'] = 'lista_relog';
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('logowanie_index_view.css', null, true));
			$this->config->set_item('module_js', $this->load->view('logowanie_index_view.js', null, true));
				//HTML KOD
			$this->load->view('logowanie_index_view',$data);
			// END ZALADUJ WIDOK
		} else {
			$this->logowanie_model->zaloguj($this->input->post("user_login"),$this->input->post("user_pass"));
			redirect('newsy/strona', 'refresh');
		}
	}
	
	/*
	 * Metoda sprawdza podany login i haslo uzytkownika
	 */
	public function login_pass_check(){
		$login = $this->input->post("user_login");
		$haslo = $this->input->post("user_pass");
		
		if($this->logowanie_model->sprawdz_dane_logowania($login,$haslo) == false){
			$this->form_validation->set_message('login_pass_check', 'Podano zły login lub hasło!');
			return false;
		} else {
			return true;
		}
	}
	
}