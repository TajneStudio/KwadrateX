<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * Klasa jest Controllerem panelu admina, odpowiedzialna jest
 * za obsluge wszystkich modulow ktore moze edytowac admin
 * 
 * @author Lukasz Flak
 *
 */
class Panel_admina extends CI_Controller {
	
	/*
	 * Kontruktor laduje model panelu admina
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('panel_admina_model');
	}
	
	/*
	 * Metoda oodpowiedzialana za usuwanie newsa po id
	 */
	public function usun_newsy($news_id){
		$this->panel_admina_model->usun_news($news_id);
		redirect('panel_admina/newsy', 'refresh');
	}
	
	/*
	 * Metoda odpowiedzialana za edytowanie newsa po id
	 */
	public function edytuj_newsy($news_id){
		$dane_newsa = $this->panel_admina_model->pobierz_news($news_id);
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->config->set_item('module_plugin_js',array('tinymce/tinymce.min.js'));
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'news_tytul', 
							 'label'   => 'Tytuł', 
							 'rules'   => 'required|max_length[50]'
						  ),
					   array(
							 'field'   => 'news_data', 
							 'label'   => 'Data dodania',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'news_zawartosc', 
							 'label'   => 'Treść', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'news_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_newsy';
			$data['segment_listy'] = 'lista_opcje';
			$data['dane_newsa'] = $dane_newsa;
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_edytuj_newsy.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_edytuj_newsy.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_edytuj_newsy',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->aktualizuj_news($this->input->post(),$news_id);
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/newsy/",
						'upload_url'      => base_url()."newsy/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			if (!empty($_FILES['news_plikGraficzny']['name'])){
				if ( ! $this->upload->do_upload("news_plikGraficzny")){
					//$error = array('error' => $this->upload->display_errors());
					//print_r($error);
					redirect('strona_startowa', 'refresh');
				}else{
					//$data = array('upload_data' => $this->upload->data());

					//print_r($data);
					//redirect('panel_admina/start', 'refresh');
				}
			}
			
			redirect('panel_admina/edytuj_newsy'."/".$news_id, 'refresh');
			
		}
	}
	
	/*
	 * Metoda odpowiedzialna za dodawanie newsa
	 */
	public function dodaj_newsy(){
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->config->set_item('module_plugin_js',array('tinymce/tinymce.min.js'));
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'news_tytul', 
							 'label'   => 'Tytuł', 
							 'rules'   => 'required|max_length[50]'
						  ),
					   array(
							 'field'   => 'news_data', 
							 'label'   => 'Data dodania',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'news_zawartosc', 
							 'label'   => 'Treść', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'news_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		//jesli zdjecie puste to blad
		if (empty($_FILES['news_plikGraficzny']['name'])){
			$this->form_validation->set_rules('news_plikGraficzny', 'Zdjęcie', 'required');
		}
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_newsy';
			$data['segment_listy'] = 'lista_opcje';
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_dodaj_newsy.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_dodaj_newsy.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_dodaj_newsy',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->dodaj_newsy($this->input->post());
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/newsy/",
						'upload_url'      => base_url()."newsy/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			
			if ( ! $this->upload->do_upload("news_plikGraficzny")){
				//$error = array('error' => $this->upload->display_errors());
				//print_r($error);
				redirect('strona_startowa', 'refresh');
			}else{
				//$data = array('upload_data' => $this->upload->data());

				//print_r($data);
				redirect('panel_admina/newsy', 'refresh');
			}
			
		}
	}
	
	/*
	 * Metoda wyswietla wszystkie newsy opublikowane przez adminow
	 */
	public function newsy(){
		$data['segment_strony'] = 'panel_admina_newsy';
		$data['segment_listy'] = 'lista_opcje';
		
		$lista_newsy = $this->panel_admina_model->pobierz_newsy();
		
		$data['pobrana_lista_newsy'] = json_encode($lista_newsy);

		
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('panel_admina_newsy_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('panel_admina_newsy_view.js', $data, true));
		
		$this->config->set_item('module_plugin_css',array('jquery.dataTables.min.css'));
		$this->config->set_item('module_plugin_js',array('jquery.dataTables.min.js'));
			//HTML KOD
		$this->load->view('panel_admina_newsy_view',$data);
		// END ZALADUJ WIDOK
	}
	
	/*
	 * Metoda pozwala edytowac kategorie przedmiotow
	 */
	public function edytuj_kategorie($kategoria_id){
		$dane_kategorii = $this->panel_admina_model->pobierz_kategoria($kategoria_id);
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'kategorie_nazwa', 
							 'label'   => 'Nazwa rzeczy', 
							 'rules'   => 'required|max_length[50]'
						  ),
					   array(
							 'field'   => 'kategorie_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_kategorie';
			$data['segment_listy'] = 'lista_opcje';
			$data['dane_kategorii'] = $dane_kategorii;
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_edytuj_kategorie.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_edytuj_kategorie.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_edytuj_kategorie',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->aktualizuj_kategorie($this->input->post(),$kategoria_id);
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/kategorie/",
						'upload_url'      => base_url()."kategorie/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			if (!empty($_FILES['kategorie_plikGraficzny']['name'])){
				if ( ! $this->upload->do_upload("kategorie_plikGraficzny")){
					//$error = array('error' => $this->upload->display_errors());
					//print_r($error);
					redirect('strona_startowa', 'refresh');
				}else{
					//$data = array('upload_data' => $this->upload->data());

					//print_r($data);
					//redirect('panel_admina/start', 'refresh');
				}
			}
			
			redirect('panel_admina/edytuj_kategorie'."/".$kategoria_id, 'refresh');
			
		}
	}
	
	/*
	 * Metoda pozwala usuwac odpowiednia kategorie po id
	 */
	public function usun_kategorie($kategoria_id){
		$this->panel_admina_model->usun_kategorie($kategoria_id);
		redirect('panel_admina/kategorie', 'refresh');
	}
	
	/*
	 * Metoda wyswietla wszystkie kategorie opublikowane przez adminow
	 */
	public function kategorie(){
		$data['segment_strony'] = 'panel_admina_kategorie';
		$data['segment_listy'] = 'lista_opcje';
		
		$lista_kategorii = $this->panel_admina_model->pobierz_kategorie();
		
		$data['pobrana_lista_kategorii'] = json_encode($lista_kategorii);

		
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('panel_admina_kategorie_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('panel_admina_kategorie_view.js', $data, true));
		
		$this->config->set_item('module_plugin_css',array('jquery.dataTables.min.css'));
		$this->config->set_item('module_plugin_js',array('jquery.dataTables.min.js'));
			//HTML KOD
		$this->load->view('panel_admina_kategorie_view',$data);
		// END ZALADUJ WIDOK
	}
	
	/*
	 * Metoda dodaje kategorie
	 */
	public function dodaj_kategorie(){
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'kategorie_nazwa', 
							 'label'   => 'Nazwa', 
							 'rules'   => 'required|max_length[50]'
						  ),
					   array(
							 'field'   => 'kategorie_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		//jesli zdjecie puste to blad
		if (empty($_FILES['kategorie_plikGraficzny']['name'])){
			$this->form_validation->set_rules('kategorie_plikGraficzny', 'Zdjęcie', 'required');
		}
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_kategorie';
			$data['segment_listy'] = 'lista_opcje';
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_dodaj_kategorie.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_dodaj_kategorie.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_dodaj_kategorie',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->dodaj_kategorie($this->input->post());
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/kategorie/",
						'upload_url'      => base_url()."kategorie/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			
			if ( ! $this->upload->do_upload("kategorie_plikGraficzny")){
				//$error = array('error' => $this->upload->display_errors());
				//print_r($error);
				redirect('strona_startowa', 'refresh');
			}else{
				//$data = array('upload_data' => $this->upload->data());

				//print_r($data);
				redirect('panel_admina/kategorie', 'refresh');
			}
			
		}
	}
	
	/*
	 * Metoda wyswietla wszystkie dostepne przedmioty utworzone przez adminow
	 */
	public function rzeczy(){
		$data['segment_strony'] = 'panel_admina_rzeczy';
		$data['segment_listy'] = 'lista_opcje';
		
		$lista_rzeczy = $this->panel_admina_model->pobierz_rzeczy();
		
		$data['pobrana_lista_rzeczy'] = json_encode($lista_rzeczy);

		
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('panel_admina_rzeczy_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('panel_admina_rzeczy_view.js', $data, true));
		
		$this->config->set_item('module_plugin_css',array('jquery.dataTables.min.css'));
		$this->config->set_item('module_plugin_js',array('jquery.dataTables.min.js'));
			//HTML KOD
		$this->load->view('panel_admina_rzeczy_view',$data);
		// END ZALADUJ WIDOK
	}
	
	/*
	 * Metoda usuwa odpowiedni przedmiot po id
	 */
	public function usun_rzecz($rzecz_id){
		$this->panel_admina_model->usun_rzecz($rzecz_id);
		redirect('panel_admina/rzeczy', 'refresh');
	}
	
	/*
	 * Metoda edytuje odpowiedni przedmiot po id
	 */
	public function edytuj_rzecz($rzecz_id){
		$dane_rzeczy = $this->panel_admina_model->pobierz_rzecz($rzecz_id);
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->config->set_item('module_plugin_js',array('tinymce/tinymce.min.js'));
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'rzeczy_nazwa', 
							 'label'   => 'Nazwa rzeczy', 
							 'rules'   => 'required|max_length[20]'
						  ),
					   array(
							 'field'   => 'rzeczy_kategoria_id', 
							 'label'   => 'Kategoria', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'rzeczy_typy_id', 
							 'label'   => 'Typ', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'rzeczy_opis', 
							 'label'   => 'Opis', 
							 'rules'   => 'max_length[4096]'
						  ),
					   array(
							 'field'   => 'rzeczy_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_rzeczy';
			$data['segment_listy'] = 'lista_opcje';
			$data['dane_rzeczy'] = $dane_rzeczy;
		
			$data['rzeczy_kategorie_opcje'] = $this->panel_admina_model->pobierz_wszystkie_kategorie();
			$data['rzeczy_typy_opcje'] = $this->panel_admina_model->pobierz_typy();
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_edytuj_rzecz.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_edytuj_rzecz.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_edytuj_rzecz',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->aktualizuj_rzecz($this->input->post(),$rzecz_id);
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/przedmioty/",
						'upload_url'      => base_url()."przedmioty/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			if (!empty($_FILES['rzeczy_plikGraficzny']['name'])){
				if ( ! $this->upload->do_upload("rzeczy_plikGraficzny")){
					//$error = array('error' => $this->upload->display_errors());
					//print_r($error);
					redirect('strona_startowa', 'refresh');
				}else{
					//$data = array('upload_data' => $this->upload->data());

					//print_r($data);
					//redirect('panel_admina/start', 'refresh');
				}
			}
			
			redirect('panel_admina/edytuj_rzecz'."/".$rzecz_id, 'refresh');
			
		}
	}
	
	/*
	 * Metoda dodaje nowy przedmiot
	 */
	public function dodaj_rzecz(){
		
		//wczytywanie helperow
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->config->set_item('module_plugin_js',array('tinymce/tinymce.min.js'));
		
		//zmienne widoku
		$warunki_form = array(
					   array(
							 'field'   => 'rzeczy_nazwa', 
							 'label'   => 'Nazwa rzeczy', 
							 'rules'   => 'required|max_length[20]'
						  ),
					   array(
							 'field'   => 'rzeczy_kategoria_id', 
							 'label'   => 'Kategoria', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'rzeczy_typy_id', 
							 'label'   => 'Typ', 
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'rzeczy_opis', 
							 'label'   => 'Opis', 
							 'rules'   => 'max_length[4096]'
						  ),
					   array(
							 'field'   => 'rzeczy_plikGraficzny', 
							 'label'   => 'Plik graficzny', 
							 'rules'   => ''
						  )
		);
		//warunki form
		$this->form_validation->set_rules($warunki_form);
		//jesli zdjecie puste to blad
		if (empty($_FILES['rzeczy_plikGraficzny']['name'])){
			$this->form_validation->set_rules('rzeczy_plikGraficzny', 'Zdjęcie', 'required');
		}
		
		//konstrukcja html
		if ($this->form_validation->run() == FALSE){
			$data['segment_strony'] = 'panel_admina_rzeczy';
			$data['segment_listy'] = 'lista_opcje';
			
			$data['rzeczy_kategorie_opcje'] = $this->panel_admina_model->pobierz_wszystkie_kategorie();
			$data['rzeczy_typy_opcje'] = $this->panel_admina_model->pobierz_typy();
			
			// START ZALADUJ WIDOK
				//CSS I JS
			$this->config->set_item('module_css', $this->load->view('panel_admina_dodaj_rzecz.css', null, true));
			$this->config->set_item('module_js', $this->load->view('panel_admina_dodaj_rzecz.js', $data, true));
				//HTML KOD
			$this->load->view('panel_admina_dodaj_rzecz',$data);
			// END ZALADUJ WIDOK
		} else {
			
			$nazwa_pliku = $this->panel_admina_model->dodaj_rzeczy($this->input->post());
			
			$upload_config	=  array(
						'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/przedmioty/",
						'upload_url'      => base_url()."przedmioty/",
						'allowed_types'   => "gif|jpg|png|jpeg",
						'overwrite'       => TRUE,
						'max_size'        => "1000KB",
						'max_height'      => "768",
						'max_width'       => "1024",
						'file_name'		  => $nazwa_pliku
					);
			$this->load->library('upload', $upload_config);
			
			
			
			if ( ! $this->upload->do_upload("rzeczy_plikGraficzny")){
				//$error = array('error' => $this->upload->display_errors());
				//print_r($error);
				redirect('strona_startowa', 'refresh');
			}else{
				//$data = array('upload_data' => $this->upload->data());

				//print_r($data);
				redirect('panel_admina/rzeczy', 'refresh');
			}
			
		}
	}
	
	/*
	 * Metoda odpowiedzialana za wyswietlenie bledu autoryzacji
	 */
	public function authenication_error(){
		$data['segment_strony'] = 'panel_admina';
		$data['segment_listy'] = '';
		
		$data['tresc_bledu'] = "UWAGA! Nie masz odpowiednich praw do oglądania tej strony!";
		
		// START ZALADUJ WIDOK
			//CSS I JS
		$this->config->set_item('module_css', $this->load->view('panel_admina_authenication_error_view.css', null, true));
		$this->config->set_item('module_js', $this->load->view('panel_admina_authenication_error_view.js', null, true));
			//HTML KOD
		$this->load->view('panel_admina_authenication_error_view',$data);
		// END ZALADUJ WIDOK
	}
	
}