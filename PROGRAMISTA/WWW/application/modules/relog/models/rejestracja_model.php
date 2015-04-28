<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest modelem rejestracji
 * 
 * @author Lukasz Flak
 *
 */
class Rejestracja_model extends CI_Model {

	/*
	 * Konstruktor laduje helper daty i bazy danych
	 */
    function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->helper('date');
    }
	
    /*
     * Metoda dodaje uzytkownika do bazy danych
     */
	public function dodaj_uzytkownika($zmienne_z_post){
		$data = array(
		   'user_login' => $zmienne_z_post["user_login"],
		   'user_pass' => md5($zmienne_z_post["user_pass"]),
		   'user_email' => $zmienne_z_post["user_email"],
		   'user_type' => 1,
		   'user_premmy' => 0,
		   'user_active' => 1,
		   'user_last_login' => date("Y-m-d H:i:s",now()),
		   'user_capatcha' => $zmienne_z_post["user_capatcha"],
		   'user_create_date' => date("Y-m-d H:i:s",now())
		);
		$this->db->insert('user', $data);
	}
	
	/*
	 * Metda sprawdza poprawnosc loginu wpisanego(czy jest w bazie)
	 */
	public function sprawdz_login($login_wpisany){
		$login_istnieje = false;
		
		$this->db->select('user_login');
		$this->db->from('user');
		$wynik_z_bazy = $this->db->get();
		foreach ($wynik_z_bazy->result() as $wiersz_z_bazy){
			if(strtolower($wiersz_z_bazy->user_login) == strtolower($login_wpisany)){
				$login_istnieje = true;
				break;
			}
		}
		
		return $login_istnieje;
	}
	
	/*
	 * Metoda sprawdza poprawnosc emaila wpisanego(czy jest w bazie)
	 */
	public function sprawdz_email($email_wpisany){
		$email_istnieje = false;
		
		$this->db->select('user_email');
		$this->db->from('user');
		$wynik_z_bazy = $this->db->get();
		foreach ($wynik_z_bazy->result() as $wiersz_z_bazy){
			if(strtolower($wiersz_z_bazy->user_email) == strtolower($email_wpisany)){
				$email_istnieje = true;
				break;
			}
		}
		
		return $email_istnieje;
	}
	
	/*
	 * Metoda przeksztalcajaca hash z capatchy
	 */
	public function rpHash($value){ 
		$hash = 5381; 
		$value = strtoupper($value); 
		for($i = 0; $i < strlen($value); $i++) { 
			$hash = (($hash << 5) + $hash) + ord(substr($value, $i)); 
		} 
		return $hash; 
	} 
	
	
}