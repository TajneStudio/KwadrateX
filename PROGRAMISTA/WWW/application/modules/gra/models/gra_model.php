<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest modelem GRY
 * 
 * @author Lukasz Flak
 *
 */
class gra_model extends CI_Model {

	/*
	 * Konstruktor klasy, laduje obiekt do zarzadzania baza danych
	 */
    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    
    public function zapisz_dane_stworka($user_id,$dane_json){
    	$json = json_decode($dane_json,true);
    	
    	$data = array(
    			'stworek_pozycja_x' => $json["stworek_pozycja_x"],
    			'stworek_pozycja_y' => $json["stworek_pozycja_y"],
    			'stworek_imie' => $json["stworek_imie"],
    			'stworek_cialo_kolor' => $json["stworek_cialo_kolor"],
    			'stworek_obramowanie_kolor' => $json["stworek_obramowanie_kolor"],
    			'stworek_oko_kolor' => $json["stworek_oko_kolor"],
    			'stworek_teczowka_kolor' => $json["stworek_teczowka_kolor"],
    			'stworek_nos_kolor' => $json["stworek_nos_kolor"],
    			'stworek_usta_kolor' => $json["stworek_usta_kolor"],
    			'stworek_last_save' => date('Y-m-d H:i:s', time()),
    			'stworek_czapka_ekwipunek_id' => $this->ustaw_slot_ekwipunku("stworek_czapka_ekwipunek_id",$json["stworek_czapka_ekwipunek"]["ekwipunek_id"],$user_id),
    			'stworek_wlosy_ekwipunek_id' => $this->ustaw_slot_ekwipunku("stworek_wlosy_ekwipunek_id",$json["stworek_wlosy_ekwipunek"]["ekwipunek_id"],$user_id),
    			'stworek_oczy_ekwipunek_id' => $this->ustaw_slot_ekwipunku("stworek_oczy_ekwipunek_id",$json["stworek_oczy_ekwipunek"]["ekwipunek_id"],$user_id),
    			'stworek_gora_ekwipunek_id' => $this->ustaw_slot_ekwipunku("stworek_gora_ekwipunek_id",$json["stworek_gora_ekwipunek"]["ekwipunek_id"],$user_id),
    			'stworek_dol_ekwipunek_id' => $this->ustaw_slot_ekwipunku("stworek_dol_ekwipunek_id",$json["stworek_dol_ekwipunek"]["ekwipunek_id"],$user_id)
    	);
    	
    	$this->db->where('stworek_user_id', $user_id);
    	$this->db->update('kwadratex_stworki', $data);
    }
    
    public function ustaw_slot_ekwipunku($kolumna_ekwipunek_id,$ekwipunek_id_pobrany,$user_id){
    	
    	$poprzedni_ekwipunek_id = $this->pobierz_ekwipunek_id_z_slota($kolumna_ekwipunek_id,$user_id);
    	if($poprzedni_ekwipunek_id != null){
    		$data = array(
    				'kwadratex_ekwipunek_zalozony' => null
    		);
    		$this->db->where('ekwipunek_id', $poprzedni_ekwipunek_id);
    		$this->db->update('kwadratex_ekwipunek', $data);
    	}
    	
    	if($ekwipunek_id_pobrany != null){
    		$data = array(
    			'kwadratex_ekwipunek_zalozony' => 1
    		);
    		$this->db->where('ekwipunek_id', $ekwipunek_id_pobrany);
    		$this->db->update('kwadratex_ekwipunek', $data);
    	} else {
    		$data = array(
    				'kwadratex_ekwipunek_zalozony' => null
    		);
    		$this->db->where('ekwipunek_id', $poprzedni_ekwipunek_id);
    		$this->db->update('kwadratex_ekwipunek', $data);
    	}
    	
    	return $ekwipunek_id_pobrany;
    }
    
    public function pobierz_ekwipunek_id_z_slota($nazwa_kolumny,$user_id){
    	$pobrany_wynik = null;
    	$this->db->select('*');
    	$this->db->where('stworek_user_id',$user_id);
    	$zapytanie = $this->db->get('kwadratex_stworki');
    	
    	foreach ($zapytanie->result_array() as $wiersz){
    		$pobrany_wynik = $wiersz[$nazwa_kolumny];
    	}
    	return $pobrany_wynik;
    }
    
    public function pobierz_dane_stworka($user_id){
		$pobrany_wynik = null;
		$this->db->select('*');
		$this->db->where('stworek_user_id',$user_id);
		$zapytanie = $this->db->get('kwadratex_stworki');
		
		foreach ($zapytanie->result() as $wiersz){
			$pobrany_wynik["stworek_pozycja_x"] = $wiersz->stworek_pozycja_x;
			$pobrany_wynik["stworek_pozycja_y"] = $wiersz->stworek_pozycja_y;
			$pobrany_wynik["stworek_imie"] = $wiersz->stworek_imie;
			$pobrany_wynik["stworek_cialo_kolor"] = $wiersz->stworek_cialo_kolor;
			$pobrany_wynik["stworek_obramowanie_kolor"] = $wiersz->stworek_obramowanie_kolor;
			$pobrany_wynik["stworek_oko_kolor"] = $wiersz->stworek_oko_kolor;
			$pobrany_wynik["stworek_teczowka_kolor"] = $wiersz->stworek_teczowka_kolor;
			$pobrany_wynik["stworek_nos_kolor"] = $wiersz->stworek_nos_kolor;
			$pobrany_wynik["stworek_usta_kolor"] = $wiersz->stworek_usta_kolor;
			$pobrany_wynik["stworek_predkosc"] = $wiersz->stworek_predkosc;
			$pobrany_wynik["stworek_predkosc_oczy"] = $wiersz->stworek_predkosc_oczy;
			
			$pobrany_wynik["stworek_ekwipunek"] = $this->pobierz_ekwipunek_stworka($user_id);
			
			$pobrany_wynik["stworek_czapka_ekwipunek"] = $this->pobierz_pojedyncze_ubranie_stworka($user_id,$wiersz->stworek_czapka_ekwipunek_id);
			$pobrany_wynik["stworek_wlosy_ekwipunek"] = $this->pobierz_pojedyncze_ubranie_stworka($user_id,$wiersz->stworek_wlosy_ekwipunek_id);
			$pobrany_wynik["stworek_oczy_ekwipunek"] = $this->pobierz_pojedyncze_ubranie_stworka($user_id,$wiersz->stworek_oczy_ekwipunek_id);
			$pobrany_wynik["stworek_gora_ekwipunek"] = $this->pobierz_pojedyncze_ubranie_stworka($user_id,$wiersz->stworek_gora_ekwipunek_id);
			$pobrany_wynik["stworek_dol_ekwipunek"] = $this->pobierz_pojedyncze_ubranie_stworka($user_id,$wiersz->stworek_dol_ekwipunek_id);
		}
		return $pobrany_wynik;
    }
    
    public function pobierz_pojedyncze_ubranie_stworka($user_id,$ekwipunek_id){
    	$stworek_id = $this->pobeirz_stworek_id_po_user_id($user_id);
    	 
    	$pobrany_wynik = null;
    	$this->db->select('*');
    	$this->db->where('ekwipunek_stworek_id',$stworek_id);
    	$this->db->where('ekwipunek_id',$ekwipunek_id);
    	$this->db->join('kwadratex_rzeczy', 'kwadratex_rzeczy.rzeczy_id = kwadratex_ekwipunek.ekwipunek_rzeczy_id', 'inner');
    	$zapytanie = $this->db->get('kwadratex_ekwipunek');

    	foreach ($zapytanie->result() as $wiersz){
    		$pobrany_wynik["ekwipunek_id"] = $wiersz->ekwipunek_id;
    		$pobrany_wynik["rzeczy_plikGraficzny"] = base_url()."przedmioty/".$wiersz->rzeczy_plikGraficzny;
    		$pobrany_wynik["rzeczy_typy_id"] = $wiersz->rzeczy_typy_id;
    	}
    	return $pobrany_wynik;
    }
    
    public function pobierz_ekwipunek_stworka($user_id){
    	$stworek_id = $this->pobeirz_stworek_id_po_user_id($user_id);
    	
    	$pobrany_wynik = null;
    	$i = 0;
    	$this->db->select('*');
    	$this->db->where('ekwipunek_stworek_id',$stworek_id);
    	$this->db->where('kwadratex_ekwipunek_zalozony',null);
    	$this->db->join('kwadratex_rzeczy', 'kwadratex_rzeczy.rzeczy_id = kwadratex_ekwipunek.ekwipunek_rzeczy_id', 'inner');
    	$zapytanie = $this->db->get('kwadratex_ekwipunek');
    	
    	foreach ($zapytanie->result() as $wiersz){
    		$pobrany_wynik[$i]["ekwipunek_id"] = $wiersz->ekwipunek_id;
    		$pobrany_wynik[$i]["rzeczy_plikGraficzny"] = base_url()."przedmioty/".$wiersz->rzeczy_plikGraficzny;
    		$pobrany_wynik[$i]["rzeczy_typy_id"] = $wiersz->rzeczy_typy_id;
    		$i++;
    	}
    	return $pobrany_wynik;
    }
    
    public function pobeirz_stworek_id_po_user_id($user_id){
    	$pobrany_wynik = null;
    	$this->db->select('*');
    	$this->db->where('stworek_user_id',$user_id);
    	$zapytanie = $this->db->get('kwadratex_stworki');
    	
    	foreach ($zapytanie->result() as $wiersz){
			$pobrany_wynik = $wiersz->stworek_id;
    	}
    	return $pobrany_wynik;
    }
    
	public function dodaj_pierwszego_stworka($user_id){
		if($this->czy_gracz_posiada_stworka($user_id) == false){
			$this->dodaj_stworka($user_id);
		}
	}
    
    public function losuj_kolor(){
    	return '#'.str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
    
    public function dodaj_stworka($user_id){
    	$data = array(
    			'stworek_user_id' => $user_id,
    			'stworek_pozycja_x' => 400,
    			'stworek_pozycja_y' => 400,
    			'stworek_create_date' => date('Y-m-d H:i:s', time()),
    			'stworek_cialo_kolor' => $this->losuj_kolor(),
    			'stworek_obramowanie_kolor' => $this->losuj_kolor(),
    			'stworek_oko_kolor' => $this->losuj_kolor(),
    			'stworek_teczowka_kolor' => $this->losuj_kolor(),
    			'stworek_nos_kolor' => $this->losuj_kolor(),
    			'stworek_usta_kolor' => $this->losuj_kolor(),
    			'stworek_predkosc' => 2.5,
    			'stworek_predkosc_oczy' => 0.3
    	);
    	$this->db->insert('kwadratex_stworki', $data);
    }
    
    public function czy_gracz_posiada_stworka($user_id){
    	
    	$pobrany_wynik = null;
    	$this->db->from('kwadratex_stworki');
    	$this->db->where('stworek_user_id',$user_id);
    	$pobrany_wynik = $this->db->count_all_results();
    	
    	if($pobrany_wynik >= 1){
    		return true;
    	} else {
    		return false;
    	}
    	
    }

}