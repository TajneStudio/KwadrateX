<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest modelem NEWSY
 * 
 * @author Lukasz Flak
 *
 */
class newsy_model extends CI_Model {

	/*
	 * Konstruktor klasy, laduje obiekt do zarzadzania baza danych
	 */
    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    
    /*
     * Metoda odpowiedzialna za pobranie pojedynczego newsa
     */
    function pobierz_news($news_id){
    	$pobrany_wynik = null;
    	$i = 0;
    	$this->db->select('news_id,news_tytul,news_zawartosc,news_data,news_stworzonyPrzez,news_edytowanyPrzez,news_plikGraficzny');
    	$this->db->where("news_id",$news_id);
    	$zapytanie = $this->db->get('news');
    
    	foreach ($zapytanie->result() as $wiersz){
    		$tekst_edytowany = null;
    		if($wiersz->news_edytowanyPrzez == null){
    			$tekst_edytowany = null;
    		} else {
    			$tekst_edytowany = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_edytowanyPrzez);
    		}
    		$pobrany_wynik[$i]["news_id"] = $wiersz->news_id;
    		$pobrany_wynik[$i]["news_tytul"] = $wiersz->news_tytul;
    		$pobrany_wynik[$i]["news_stworzonyPrzez"] = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_stworzonyPrzez);
    		$pobrany_wynik[$i]["news_edytowanyPrzez"] = $tekst_edytowany;
    		$pobrany_wynik[$i]["news_data"] = $wiersz->news_data;
    		$pobrany_wynik[$i]["news_plikGraficzny"] = $wiersz->news_plikGraficzny;
    		$pobrany_wynik[$i]["news_zawartosc"] = $wiersz->news_zawartosc;
    		$i++;
    	}
    	return $pobrany_wynik;
    }
    /*
     * Metoda pobiera ilosc wszystkich newsow
     */
    function pobierz_ilosc_newsow_wszystkich(){
    	$pobrany_wynik = null;
    	$this->db->from('news');
    	$pobrany_wynik = $this->db->count_all_results();
    	
    	return $pobrany_wynik;
    }
	
    /*
     * Metoda odpowiedzialna za pobranie wszystkich newsow
     */
    function pobierz_newsy(){
		$pobrany_wynik = null;
		$i = 0;
		$this->db->select('news_id,news_tytul,news_zawartosc,news_data,news_stworzonyPrzez,news_edytowanyPrzez,news_plikGraficzny');
		$this->db->order_by("news_data", "desc");
		$zapytanie = $this->db->get('news');
		
		foreach ($zapytanie->result() as $wiersz){
			$tekst_edytowany = null;
			if($wiersz->news_edytowanyPrzez == null){
				$tekst_edytowany = null;
			} else { 
				$tekst_edytowany = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_edytowanyPrzez);
			}
			$pobrany_wynik[$i]["news_id"] = $wiersz->news_id;
			$pobrany_wynik[$i]["news_tytul"] = $wiersz->news_tytul;
			$pobrany_wynik[$i]["news_stworzonyPrzez"] = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_stworzonyPrzez);
			$pobrany_wynik[$i]["news_edytowanyPrzez"] = $tekst_edytowany;
			$pobrany_wynik[$i]["news_data"] = $wiersz->news_data;
			$pobrany_wynik[$i]["news_plikGraficzny"] = $wiersz->news_plikGraficzny;
			$pobrany_wynik[$i]["news_zawartosc"] = substr(strip_tags($wiersz->news_zawartosc),0,150)."...";
			$i++;
		}
		return $pobrany_wynik;
    }
    
    /*
     * Metoda odpowiedzialna za pobranie wszystkich newsow
     */
    function pobierz_newsy_paginacja($start_numer,$ilosc_na_strone){
    	$pobrany_wynik = null;
    	$i = 0;
    	$this->db->select('news_id,news_tytul,news_zawartosc,news_data,news_stworzonyPrzez,news_edytowanyPrzez,news_plikGraficzny');
    	$this->db->order_by("news_data", "desc");
    	$this->db->limit($start_numer+$ilosc_na_strone, $start_numer);
    	$zapytanie = $this->db->get('news');
    
    	foreach ($zapytanie->result() as $wiersz){
    		$tekst_edytowany = null;
    		if($wiersz->news_edytowanyPrzez == null){
    			$tekst_edytowany = null;
    		} else {
    			$tekst_edytowany = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_edytowanyPrzez);
    		}
    		$pobrany_wynik[$i]["news_id"] = $wiersz->news_id;
    		$pobrany_wynik[$i]["news_tytul"] = $wiersz->news_tytul;
    		$pobrany_wynik[$i]["news_stworzonyPrzez"] = $this->pobierz_nazwe_uzytkownika_po_id($wiersz->news_stworzonyPrzez);
    		$pobrany_wynik[$i]["news_edytowanyPrzez"] = $tekst_edytowany;
    		$pobrany_wynik[$i]["news_data"] = $wiersz->news_data;
    		$pobrany_wynik[$i]["news_plikGraficzny"] = $wiersz->news_plikGraficzny;
    		$pobrany_wynik[$i]["news_zawartosc"] = substr(strip_tags($wiersz->news_zawartosc),0,150)."...";
    		$i++;
    	}
    	return $pobrany_wynik;
    }
    
    /*
     * Metoda pobiera nazwe uzytkownika po ID
     */
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

}