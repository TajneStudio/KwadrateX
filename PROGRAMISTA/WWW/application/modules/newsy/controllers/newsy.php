<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest controllerem NEWSY odpowiedzialna za wyśiwetlenie wszystkich newsów jak i
 * pozwala zobaczyć szczegóły odpowiedniego newsa
 * 
 * @author Lukasz Flak
 *
 */
class Newsy extends CI_Controller {
	
	/*
	 * Konstruktor klasy, laduje model: newsy_model
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('newsy_model');
	}
	
	/*
	 * Głowna strona newsów. Wysiwetla wszystkie wpisy
	 */
	public function index(){
		$data['segment_strony'] = 'strona_startowa';
		$data['segment_listy'] = '';
		
		$data['pobrane_newsy'] = $this->newsy_model->pobierz_newsy();

		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('newsy_index_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('newsy_index_view.js', null, true));
			//HTML KOD
		$this->load->view('newsy_index_view',$data);
		// END ZALADUJ WIDOK
	}
	
	/*
	 * Strony newsow
	 */
	public function strona($numer_strony = 0){
		$data['segment_strony'] = 'strona_startowa';
		$data['segment_listy'] = '';
		
		$this->load->library('pagination');
		$config['base_url'] = site_url("newsy/strona");
		$config['total_rows'] = $this->newsy_model->pobierz_ilosc_newsow_wszystkich();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$data['paginacja'] = $this->pagination->create_links();
		
		$data['pobrane_newsy'] = $this->newsy_model->pobierz_newsy_paginacja($numer_strony,$numer_strony+$config['per_page']);
		
		// START ZALADUJ WIDOK
		//CSS I JS
		$this->config->set_item('module_css', $this->load->view('newsy_strona_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('newsy_strona_view.js', null, true));
		//HTML KOD
		$this->load->view('newsy_strona_view',$data);
		// END ZALADUJ WIDOK
	}
	
	/*
	 * Szczegołowa strona newsow
	 */
	public function pokaz_news($news_id){
		$data['segment_strony'] = 'strona_startowa';
		$data['segment_listy'] = '';
	
		$data['pobrane_news'] = $this->newsy_model->pobierz_news($news_id);
	
		// START ZALADUJ WIDOK
		//CSS I JS
		$this->config->set_item('module_css', $this->load->view('newsy_pokaz_news_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('newsy_pokaz_news_view.js', null, true));
		//HTML KOD
		$this->load->view('newsy_pokaz_news_view',$data);
		// END ZALADUJ WIDOK
	}
	
}