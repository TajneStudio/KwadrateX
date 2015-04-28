<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class panel_admina_model extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }
	
	function usun_news($news_id){
		$pobrana_nazwa_pliku = null;
	
		$this->db->select('news_plikGraficzny');
		$this->db->from('news');
		$this->db->where('news_id',$news_id);
		$zapytanie = $this->db->get();
		foreach ($zapytanie->result() as $wiersz){
			$pobrana_nazwa_pliku = $wiersz->news_plikGraficzny;
		}
		unlink("newsy/".$pobrana_nazwa_pliku);
		
		$this->db->delete('news', array('news_id' => $news_id));
	}
	
	function aktualizuj_news($dane_z_post,$news_id){
		$file_name = null;
		
		$this->db->where('news_id',$news_id);
		$id_newsa = $this->db->get('news')->row()->news_id;
	
		$data = array(
		   'news_tytul' => $dane_z_post["news_tytul"],
		   'news_data' => $dane_z_post["news_data"],
		   'news_zawartosc' => $dane_z_post["news_zawartosc"],
		   'news_edytowanyPrzez' => $this->session->userdata('user_id')
		);
		$this->db->where('news_id',$news_id);
		$this->db->update('news', $data);
		
		if (!empty($_FILES['news_plikGraficzny']['name'])){
			$rozszerzenie = pathinfo($_FILES['news_plikGraficzny']['name'], PATHINFO_EXTENSION);
			$file_name = $id_newsa.".".$rozszerzenie;
			
			$data = array(
				'news_plikGraficzny' => $file_name
			);

			$this->db->where('news_id',$news_id);
			$this->db->update('news', $data);
		
		}
		
		return $file_name;
	}
	
	function dodaj_newsy($dane_z_post){
		$file_name = null;
	
		$data = array(
		   'news_tytul' => $dane_z_post["news_tytul"],
		   'news_data' => $dane_z_post["news_data"],
		   'news_zawartosc' => $dane_z_post["news_zawartosc"],
		   'news_stworzonyPrzez' => $this->session->userdata('user_id')
		);
		$this->db->insert('news', $data);
		$last_insert_id = $this->db->insert_id();
		
		$rozszerzenie = pathinfo($_FILES['news_plikGraficzny']['name'], PATHINFO_EXTENSION);
		$file_name = $last_insert_id.".".$rozszerzenie;
		
		$data = array(
			'news_plikGraficzny' => $file_name
		);

		$this->db->where('news_id', $last_insert_id);
		$this->db->update('news', $data); 
		
		return $file_name;
	}
	
    function pobierz_newsy(){
		$pobrany_wynik = null;
		$i = 0;
		$this->db->select('news_id,news_tytul,news_data,news_stworzonyPrzez,news_edytowanyPrzez');
		$zapytanie = $this->db->get('news');
		
		foreach ($zapytanie->result() as $wiersz){
			$tekst_edytowany = null;
			if($wiersz->news_edytowanyPrzez == null){
				$tekst_edytowany = "News nie był edytowany";
			} else { 
				$tekst_edytowany = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_edytowanyPrzez);
			}
			$pobrany_wynik[$i]["news_id"] = $wiersz->news_id;
			$pobrany_wynik[$i]["news_tytul"] = $wiersz->news_tytul;
			$pobrany_wynik[$i]["news_stworzonyPrzez"] = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_stworzonyPrzez);
			$pobrany_wynik[$i]["news_edytowanyPrzez"] = $tekst_edytowany;
			$pobrany_wynik[$i]["news_data"] = $wiersz->news_data;
			$i++;
		}
		return $pobrany_wynik;
    }
	
	function pobierz_news($news_id){
		$pobrany_wynik = null;
		$this->db->where('news_id',$news_id);
		$pobrany_wynik = $this->db->get('news')->row_array();
		return $pobrany_wynik;
	}
	
    function pobierz_nazwe_uzytkownika_po_id($id_uzytkownika){
		$pobrany_wynik = null;
		$this->db->select('user_login,user_id');
		$this->db->where('user_id',$id_uzytkownika);
		$zapytanie = $this->db->get('user');
		
		foreach ($zapytanie->result() as $wiersz){
			$pobrany_wynik = $wiersz->user_login;
		}
		return $pobrany_wynik;
    }
	
	function usun_kategorie($kategorie_id){
		$pobrana_nazwa_pliku = null;
	
		$this->db->select('kategorie_plikGraficzny');
		$this->db->from('kwadratex_kategorie');
		$this->db->where('kategorie_id',$kategorie_id);
		$zapytanie = $this->db->get();
		foreach ($zapytanie->result() as $wiersz){
			$pobrana_nazwa_pliku = $wiersz->kategorie_plikGraficzny;
		}
		unlink("kategorie/".$pobrana_nazwa_pliku);
		
		$this->db->delete('kwadratex_kategorie', array('kategorie_id' => $kategorie_id));
	}
	
	function dodaj_kategorie($dane_z_post){
		$file_name = null;
	
		$data = array(
		   'kategorie_nazwa' => $dane_z_post["kategorie_nazwa"]
		);
		$this->db->insert('kwadratex_kategorie', $data);
		$last_insert_id = $this->db->insert_id();
		
		$rozszerzenie = pathinfo($_FILES['kategorie_plikGraficzny']['name'], PATHINFO_EXTENSION);
		$file_name = $last_insert_id.".".$rozszerzenie;
		
		$data = array(
			'kategorie_plikGraficzny' => $file_name
		);

		$this->db->where('kategorie_id', $last_insert_id);
		$this->db->update('kwadratex_kategorie', $data); 
		
		return $file_name;
	}
	
	function aktualizuj_kategorie($dane_z_post,$kategoria_id){
		$file_name = null;
		
		$this->db->where('kategorie_id',$kategoria_id);
		$id_kategorii = $this->db->get('kwadratex_kategorie')->row()->kategorie_id;
	
		$data = array(
		   'kategorie_nazwa' => $dane_z_post["kategorie_nazwa"]
		);
		$this->db->where('kategorie_id',$kategoria_id);
		$this->db->update('kwadratex_kategorie', $data);
		
		if (!empty($_FILES['kategorie_plikGraficzny']['name'])){
			$rozszerzenie = pathinfo($_FILES['kategorie_plikGraficzny']['name'], PATHINFO_EXTENSION);
			$file_name = $id_kategorii.".".$rozszerzenie;
			
			$data = array(
				'kategorie_plikGraficzny' => $file_name
			);

			$this->db->where('kategorie_id',$kategoria_id);
			$this->db->update('kwadratex_kategorie', $data);
		
		}
		
		return $file_name;
	}
	
	function pobierz_kategoria($kategoria_id){
		$pobrany_wynik = null;
		$this->db->where('kategorie_id',$kategoria_id);
		$pobrany_wynik = $this->db->get('kwadratex_kategorie')->row_array();
		return $pobrany_wynik;
	}
	
    function pobierz_kategorie(){
		$pobrany_wynik = null;
		$i = 0;
		$this->db->select('kategorie_id,kategorie_nazwa');
		$zapytanie = $this->db->get('kwadratex_kategorie');
		foreach ($zapytanie->result() as $wiersz){
			$pobrany_wynik[$i]["kategorie_id"] = $wiersz->kategorie_id;
			$pobrany_wynik[$i]["kategorie_nazwa"] = $wiersz->kategorie_nazwa;
			$pobrany_wynik[$i]["kategorie_ilosc_przedmioty"] = $this->pobierz_ilosc_przedmiotow_przypisanych_do_kategorii($wiersz->kategorie_id);
			$i++;
		}
		return $pobrany_wynik;
    }
	
	function pobierz_ilosc_przedmiotow_przypisanych_do_kategorii($kategoria_id){
		$pobrany_wynik = null;
		$this->db->from('kwadratex_rzeczy');
		$this->db->where('rzeczy_kategoria_id',$kategoria_id);
		$pobrany_wynik = $this->db->count_all_results();
		
		return $pobrany_wynik;
	}
    
    function pobierz_rzeczy(){
		$pobrany_wynik = null;
		$i = 0;
		$this->db->select('rzeczy_id,rzeczy_nazwa,rzeczy_kategoria_id,rzeczy_typy_id,typy_nazwa,kategorie_nazwa');
		$this->db->join('kwadratex_typy', 'kwadratex_typy.typy_id = kwadratex_rzeczy.rzeczy_typy_id');
		$this->db->join('kwadratex_kategorie', 'kwadratex_kategorie.kategorie_id = kwadratex_rzeczy.rzeczy_kategoria_id');
		$zapytanie = $this->db->get('kwadratex_rzeczy');
		foreach ($zapytanie->result() as $wiersz){
			$pobrany_wynik[$i]["rzeczy_id"] = $wiersz->rzeczy_id;
			$pobrany_wynik[$i]["rzeczy_nazwa"] = $wiersz->rzeczy_nazwa;
			$pobrany_wynik[$i]["kategorie_nazwa"] = $wiersz->kategorie_nazwa;
			$pobrany_wynik[$i]["typy_nazwa"] = $wiersz->typy_nazwa;
			$i++;
		}
		return $pobrany_wynik;
    }
	
	function usun_rzecz($rzecz_id){
		$pobrana_nazwa_pliku = null;
	
		$this->db->select('rzeczy_plikGraficzny');
		$this->db->from('kwadratex_rzeczy');
		$this->db->where('rzeczy_id',$rzecz_id);
		$zapytanie = $this->db->get();
		foreach ($zapytanie->result() as $wiersz){
			$pobrana_nazwa_pliku = $wiersz->rzeczy_plikGraficzny;
		}
		unlink("przedmioty/".$pobrana_nazwa_pliku);
		
		$this->db->delete('kwadratex_rzeczy', array('rzeczy_id' => $rzecz_id));
	}
	
	function pobierz_rzecz($rzecz_id){
		$pobrany_wynik = null;
		$this->db->where('rzeczy_id',$rzecz_id);
		$pobrany_wynik = $this->db->get('kwadratex_rzeczy')->row_array();
		return $pobrany_wynik;
	}
	
	function aktualizuj_rzecz($dane_z_post,$rzecz_id){
		$file_name = null;
		
		$this->db->where('rzeczy_id',$rzecz_id);
		$id_koszykarza = $this->db->get('kwadratex_rzeczy')->row()->rzeczy_id;
	
		$data = array(
		   'rzeczy_nazwa' => $dane_z_post["rzeczy_nazwa"],
		   'rzeczy_kategoria_id' => $dane_z_post["rzeczy_kategoria_id"],
		   'rzeczy_typy_id' => $dane_z_post["rzeczy_typy_id"],
		   'rzeczy_opis' => $dane_z_post["rzeczy_opis"]
		);
		$this->db->where('rzeczy_id',$rzecz_id);
		$this->db->update('kwadratex_rzeczy', $data);
		
		if (!empty($_FILES['rzeczy_plikGraficzny']['name'])){
			$rozszerzenie = pathinfo($_FILES['rzeczy_plikGraficzny']['name'], PATHINFO_EXTENSION);
			$file_name = $id_koszykarza.".".$rozszerzenie;
			
			$data = array(
				'rzeczy_plikGraficzny' => $file_name
			);

			$this->db->where('rzeczy_id',$rzecz_id);
			$this->db->update('kwadratex_rzeczy', $data);
		
		}
		
		return $file_name;
	}
	
	function dodaj_rzeczy($dane_z_post){
		$file_name = null;
	
		$data = array(
		   'rzeczy_nazwa' => $dane_z_post["rzeczy_nazwa"],
		   'rzeczy_kategoria_id' => $dane_z_post["rzeczy_kategoria_id"],
		   'rzeczy_typy_id' => $dane_z_post["rzeczy_typy_id"],
		   'rzeczy_opis' => $dane_z_post["rzeczy_opis"]
		);
		$this->db->insert('kwadratex_rzeczy', $data);
		$last_insert_id = $this->db->insert_id();
		
		$rozszerzenie = pathinfo($_FILES['rzeczy_plikGraficzny']['name'], PATHINFO_EXTENSION);
		$file_name = $last_insert_id.".".$rozszerzenie;
		
		$data = array(
			'rzeczy_plikGraficzny' => $file_name
		);

		$this->db->where('rzeczy_id', $last_insert_id);
		$this->db->update('kwadratex_rzeczy', $data); 
		
		return $file_name;
	}
	
	function pobierz_typy(){
		$pobrane_typy_tablica = null;
		
		$zapytanie = $this->db->get('kwadratex_typy');
		
		foreach ($zapytanie->result() as $wiersz){
			$pobrane_typy_tablica[$wiersz->typy_id] = $wiersz->typy_nazwa;
		}
		
		return $pobrane_typy_tablica;
	}
	
	function pobierz_wszystkie_kategorie(){
		$pobrane_kategorie_tablica = array();
		
		$zapytanie = $this->db->get('kwadratex_kategorie');
		
		foreach ($zapytanie->result() as $wiersz){
			$pobrane_kategorie_tablica[$wiersz->kategorie_id] = $wiersz->kategorie_nazwa;
		}
		
		return $pobrane_kategorie_tablica;
	}

}