<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest Controllerem odpowiedzialnym za rejestracje uzytkownikow
 * 
 * @author Lukasz Flak
 *
 */
class Rejestracja extends CI_Controller {
	
	/*
	 * konstruktor laduje model logowania i rejestracji
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('rejestracja_model');
		$this->load->model('logowanie_model');
	}

	/*
	 * Metoda wyswietla strone rejestracji uzytkownika
	 */
	public function index()
	{
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//zmienne widoku
		$data["tytul_strony"] = "Zarejestruj się";
		$warunki_form = array(
					   array(
							 'field'   => 'user_login', 
							 'label'   => 'Login', 
							 'rules'   => 'required|max_length[20]|callback_login_check'
						  ),
					   array(
							 'field'   => 'user_pass', 
							 'label'   => 'Hasło', 
							 'rules'   => 'required|max_length[20]'
						  ),
					   array(
							 'field'   => 'user_email', 
							 'label'   => 'Email', 
							 'rules'   => 'required|valid_email|callback_email_check'
						  ),
					   array(
							 'field'   => 'user_capatcha', 
							 'label'   => 'Capatcha', 
							 'rules'   => 'required|callback_capatcha_check'
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
	
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'rejestracja';
			$data['segment_listy'] = 'lista_relog';
		
			// START ZALADUJ WIDOK
				//PLUGINY CSS I JS
			$tablica_css = array(
				0 => 'jquery.realperson.css'
			);
			$this->config->set_item('module_plugin_css',$tablica_css);
			
			$tablica_js = array(
				0 => 'jquery.plugin.js',
				1 => 'jquery.realperson.js'
			);
			$this->config->set_item('module_plugin_js',$tablica_js);
				//CSS I JS Z MODULU
			$this->config->set_item('module_css', $this->load->view('rejestracja_index_view.css', null, true));
			$this->config->set_item('module_js', $this->load->view('rejestracja_index_view.js', null, true));
				//HTML KOD
			$this->load->view('rejestracja_index_view',$data);
			// END ZALADUJ WIDOK
		} else {
			$this->rejestracja_model->dodaj_uzytkownika($this->input->post());
			$this->logowanie_model->zaloguj($this->input->post("user_login"),$this->input->post("user_pass"));
			redirect('newsy/strona', 'refresh');
		}
	}
	
	/*
	 * Metoda sprawdza czy odpowiedni login jest dostepny
	 */
	public function login_check(){
		$login = $this->input->post("user_login");
		if($this->rejestracja_model->sprawdz_login($login) == true){
			$this->form_validation->set_message('login_check', 'Podany login już istnieje!');
			return false;
		} else {
			return true;
		}
	}
	
	/*
	 * Metoda sprawdza czy dany email nie zostal juz podany w bazie danych
	 */
	public function email_check(){
		$email = $this->input->post("user_email");
		if($this->rejestracja_model->sprawdz_email($email) == true){
			$this->form_validation->set_message('email_check', 'Podany email już istnieje!');
			return false;
		} else {
			return true;
		}
	}
	
	/*
	 * Metoda sprawdza poprawnosc wpisanej capatchy
	 */
	public function capatcha_check(){
		$capatcha_podana = $this->input->post("user_capatcha");
		$capatchaHash = $this->input->post("user_capatchaHash");
		if($this->rejestracja_model->rpHash($capatcha_podana) == $capatchaHash){
			return true;
		} else {
			$this->form_validation->set_message('capatcha_check', 'Przepisany kod z obrazka jest zły!');
			return false;
		}
	}
	
}