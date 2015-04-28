<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest modelem logowania
 * 
 * @author Lukasz Flak
 *
 */
class Logowanie_model extends CI_Model {

	/*
	 * Konstruktor laduje helper daty, bazydanych i sesji
	 */
    function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('date');
    }
	
    /*
     * Metoda sprawdza dane logoweania
     */
	public function sprawdz_dane_logowania($login,$haslo){
		$this->db->select('user_login,user_pass');
		$this->db->from('user');
		$this->db->where('user_login',$login);
		$this->db->where('user_pass',md5($haslo));
		
		$ilosc_rekordow = $this->db->count_all_results();
		
		if($ilosc_rekordow == 1){
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * Metoda loguje odpowiedniego uzytkownika
	 */
	public function zaloguj($login,$haslo){
		$tablica_danych = null;
	
		$this->db->select('user_id,user_type,user_login');
		$this->db->from('user');
		$this->db->where('user_login',$login);
		$this->db->where('user_pass',md5($haslo));
		
		$wynik_z_bazy = $this->db->get();
		
		foreach ($wynik_z_bazy->result() as $wiersz_z_bazy){
			$tablica_danych["user_id"] = $wiersz_z_bazy->user_id;
			$tablica_danych["user_type"] = $wiersz_z_bazy->user_type;
			$tablica_danych["user_login"] = $wiersz_z_bazy->user_login;
		}
		
		$data = array('user_last_login' => date("Y-m-d H:i:s",now()));
		$this->db->where('user_id',$tablica_danych["user_id"]);
		$this->db->update('user', $data);

		$this->session->set_userdata($tablica_danych);
	}
	
	/*
	 * Metoda wylogowuje odpowiedniego uzytkonika
	 */
	public function wyloguj(){
		$tablica_danych = array('user_id' => '', 'user_type' => '', 'user_login' => '');
		$this->session->unset_userdata($tablica_danych);
	}
	
}