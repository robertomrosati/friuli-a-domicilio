<?php namespace App\Controllers;
use CodeIgniter\Controller;

/*controller per la ricerca delle attività*/
class Ricerca extends Controller
{
   public function index()
   {
      /*controllo se la pagina è assente, se è assente carico Error 404*/
      
      if (! is_file(APPPATH.'/Views/pages/contatti/contatti_1.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      /*carico le viste e definisco i dati*/
      $this->carica_viste($this->define_data('index'));
   
   }
   
   public function ricerca_home()
   {
      if($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/ricerca');
      }
      
      /*prendo i dati del form*/
      $data_form['cosa_stai_cercando'] = $this->request->getVar("cosa_stai_cercando");  
      $data_form['autocomplete'] = $this->request->getVar("autocomplete");
      $data_form['lista_categorie'] = $this->request->getVar("lista_categorie");
      $data_form['autocomplete_hidden'] = $this->request->getVar("autocomplete_hidden");
      
      /*carico le viste e definisco i dati*/
      $this->carica_viste($this->define_data('home', $data_form));
   }
   
   public function ricerca_ricerca()
   {
      if($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/ricerca');
      }
      
      /*recupero la lista di categorie*/
      $ShopsModel = model('ShopsModel');
      $lista_categorie = $ShopsModel->get_e_categories_with_counts();
      
      /*prendo i dati del form*/
      /* 1 - prendo cosa stai cercando*/
      $data_form['cosa_stai_cercando'] = $this->request->getVar("cosa_stai_cercando");  
      /* 2 -prendo autocomplete e automcomplete_hidden*/
      $data_form['autocomplete'] = $this->request->getVar("autocomplete");
      $data_form['autocomplete_hidden'] = $this->request->getVar("autocomplete_hidden");
      
      /* 3 -prendo le categorie*/
      /* START recupero categorie da checkbox */
      /*faccio un ciclo per prendere le categorie*/
      $required_categories_by_checkbox = array();
      $i = 0;
      /*per ogni categoria esistente in database*/
      log_message('debug', 'sono in ricerca_ricerca() prima del primo foreach');
      foreach ($lista_categorie as $categoria)
      {
         /*se quell'ID categoria è stato marcato come richiesto*/
         if($this->request->getVar('filtri_categoria_' . $categoria->e_categories_id))
         {
               log_message('debug', 'Server Side Log. Sono nel foreach in ricerca/ricerca_ricerca().\n   $i = ' . $i . '\n   $categoria->e_categories_id = ' . $categoria->e_categories_id . ' \n   $this->request->getVar("filtri_categoria_"' . $categoria->e_categories_id . ') = ' . $this->request->getVar("filtri_categoria_" . $categoria->e_categories_id) . '\n');
               /*aggiungo quel tale valore alle categorie richieste */
               $required_categories_by_checkbox[$i] = $categoria->e_categories_id;
               $i++;
         }
      }
      
      /*se nessuna categoria è stata marcata (cioè se il contatore è rimasto fermo a 0) le metto tutte a 1, cioè come se fossero state richieste tutte */
      if($i == 0)
      {
         foreach ($lista_categorie as $categoria)
         {
            log_message('debug', 'sono nel ciclo condizionato da $i == 0,  $i == ' . $i . '\n');
            /*aggiungo quel tale valore alle categorie richieste */
            $required_categories_by_checkbox[$i] = $categoria->e_categories_id;
            $i++;
         }
      }
      
      $data_form['required_categories_by_checkbox'] = $required_categories_by_checkbox;
      /* END recupero categorie da checkbox */
      
      /* 4 -recupero filtri di domicilio e asporto */
      $data_form['domicilio'] = $this->request->getVar("filtri_checkbox_domicilio");
      $data_form['asporto'] = $this->request->getVar("filtri_checkbox_asporto");
      /*se sono entrambi a zero, li metto entrambi a 1 come se fossero stati entrambi marcati */
      //if($data_form['domicilio'] == 0 && $data_form['asporto'] == 0)
      //{
      //   $data_form['domicilio'] == 1;
      //   $data_form['asporto'] == 1;
      //}
      
      /* 5 - recupero distanza */
      $data_form['filtri_distanza'] = $this->request->getVar("filtri_distanza");
      
      log_message('debug', '$data_form["filtri_distanza"] = ' . $data_form['filtri_distanza'] . '\n');
      
      /*carico le viste e definisco i dati*/
      $this->carica_viste($this->define_data('ricerca', $data_form)); 
   }
   
   public function ricerca_ajax($metodo)
   {
      if($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/ricerca');
      }
      
      /*recupero la lista di categorie*/
      $ShopsModel = model('ShopsModel');
      $lista_categorie = $ShopsModel->get_e_categories_with_counts();
      
      /*prendo i dati del form*/
      /* METODO da chiamare: header o risultati */
      //$metodo = $this->request->getVar("metodo");
      /* 1 - prendo cosa stai cercando*/
      $data_form['cosa_stai_cercando'] = $this->request->getVar("cosa_stai_cercando");
      
      /* 2 -prendo autocomplete e automcomplete_hidden*/
      $data_form['autocomplete'] = $this->request->getVar("autocomplete");
      $data_form['autocomplete_hidden'] = $this->request->getVar("autocomplete_hidden");
      
      log_message('debug', 'cosa_stai_cercando = ' . $data_form['cosa_stai_cercando']);
      log_message('debug', 'autocomplete = ' . $data_form['autocomplete']);
      log_message('debug', 'autocomplete_hidden = ' . $data_form['autocomplete_hidden']);
      
      /* 3 -prendo le categorie*/
      /* START recupero categorie da checkbox */
      /*faccio un ciclo per prendere le categorie*/
      $required_categories_by_checkbox = array();
      $i = 0;
      /*per ogni categoria esistente in database*/
      log_message('debug', 'sono in ricerca_ajax() prima del primo foreach');
      foreach ($lista_categorie as $categoria)
      {
         /*se quell'ID categoria è stato marcato come richiesto*/
         if($this->request->getVar('filtri_categoria_' . $categoria->e_categories_id))
         {
               log_message('debug', 'Server Side Log. Sono nel foreach in ricerca/ricerca_ricerca().\n   $i = ' . $i . '\n   $categoria->e_categories_id = ' . $categoria->e_categories_id . ' \n   $this->request->getVar("filtri_categoria_"' . $categoria->e_categories_id . ') = ' . $this->request->getVar("filtri_categoria_" . $categoria->e_categories_id) . '\n');
               /*aggiungo quel tale valore alle categorie richieste */
               $required_categories_by_checkbox[$i] = $categoria->e_categories_id;
               $i++;
         }
      }
      
      /*se nessuna categoria è stata marcata (cioè se il contatore è rimasto fermo a 0) le metto tutte a 1, cioè come se fossero state richieste tutte */
      if($i == 0)
      {
         foreach ($lista_categorie as $categoria)
         {
            log_message('debug', 'sono nel ciclo condizionato da $i == 0,  $i == ' . $i . '\n');
            /*aggiungo quel tale valore alle categorie richieste */
            $required_categories_by_checkbox[$i] = $categoria->e_categories_id;
            $i++;
         }
      }
      
      $data_form['required_categories_by_checkbox'] = $required_categories_by_checkbox;
      /* END recupero categorie da checkbox */
      
      /* 4 -recupero filtri di domicilio e asporto */
      $data_form['domicilio'] = $this->request->getVar("filtri_checkbox_domicilio");
      $data_form['asporto'] = $this->request->getVar("filtri_checkbox_asporto");
      /*se sono entrambi a zero, li metto entrambi a 1 come se fossero stati entrambi marcati */
      //if($data_form['domicilio'] == 0 && $data_form['asporto'] == 0)
      //{
      //   $data_form['domicilio'] == 1;
      //   $data_form['asporto'] == 1;
      //}
      
      /* 5 - recupero distanza */
      $data_form['filtri_distanza'] = $this->request->getVar("filtri_distanza");
      
      log_message('debug', '$data_form["filtri_distanza"] = ' . $data_form['filtri_distanza'] . '\n');
      
      /*come ultimo passo, invece di ricaricare le viste dovrò ricaricare solo la vista centrale dei risultati*/
      
      log_message('debug', 'sto per chiamare la query, facciamo prima il punto sul valore di alcune variabili');
      
      
      $RicercaModel = model('RicercaModel');
      $dati_e_shops =  $RicercaModel->ricerca_ricerca($data_form['required_categories_by_checkbox'], $data_form['autocomplete_hidden'], $data_form['cosa_stai_cercando'], $data_form['domicilio'], $data_form['asporto'], $data_form['filtri_distanza']);
      
      /*a seconda di quale variabile ho inserito nella richiesta ajax, chiamo genera_html_header_ricerca_ajax oppure genera_html_risultati_ricerca_ajax */
      
      if($metodo == "header")
      {
         log_message('debug', 'sono in ricerca_ajax() nel metodo ' . $metodo);
         /*chiamo la funzione che mi restituisce come echo quello che voglio aggiornare nella pagina*/
         $this->genera_html_header_ricerca_ajax($dati_e_shops, $data_form);
         log_message('debug', 'sono in ricerca_ajax() e mi è stato restituito genera_html_header_ricerca_ajax()');
      }
         
      if($metodo == "risultati")
      {
         log_message('debug', 'sono in ricerca_ajax() nel metodo ' . $metodo);
         /*chiamo la funzione che mi restituisce come echo quello che voglio aggiornare nella pagina*/
         $this->genera_html_risultati_ricerca_ajax($dati_e_shops);
         log_message('debug', 'sono in ricerca_ajax() e mi è stato restituito genera_html_risultati_ricerca_ajax()');
      }
   }
   
   /*funzione che restituisce come "echo" quelle che deve essere stampato*/
   private function genera_html_risultati_ricerca_ajax($dati_e_shops)
   {
      log_message('debug', 'sono in genera_html_risultati_ricerca_ajax()');
      foreach ($dati_e_shops as $negozio)
      {
         /*vado a vedere se fa per asporto o take away sì o no e di conseguenza coloro l'icona*/
         if($negozio->e_shops_home_delivery)
         {
            $a_domicilio = 'yes';
         }
         else
         {
            $a_domicilio = 'no';
         }

         if($negozio->e_shops_take_away)
         {
            $per_asporto = 'yes';
         }
         else
         {
            $per_asporto = 'no';
         }                                   
         
         echo '
         <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="strip">
                <figure>
                  <!--<span class="ribbon off">-30%</span>-->
                    <img src="' . base_url() . $negozio->e_files_path . '" data-src="'. base_url() . $negozio->e_files_path . '" class="img-fluid lazy" alt="">
                    <a href="' . base_url() . '/dettaglio/negozio/' . $negozio->e_shops_id . '" class="strip_info">
                        <small>' . $negozio->e_categories_name. '</small>
                        <div class="item_title">
                            <h3>' . $negozio->e_shops_name . '</h3>
                            <small>' . $negozio->e_shops_address . '</small>
                        </div>
                    </a>
                </figure>
                <ul>
                    <li><span class="deliv ' . $a_domicilio . '">domicilio</span><span class="take ' . $per_asporto . '">asporto</span></li>
                    <li>
                     <div class="score"><strong>' . $negozio->distanza . ' km</strong></div>
                    </li>
                </ul>
            </div>
         </div>
         <!-- /strip grid -->';
      }
   }
   
   private function genera_html_header_ricerca_ajax($dati_e_shops, $data_form)
   {
      /*nota: il div da aggiornare è "barra_in_alto_ricerca"*/
      log_message('debug', 'sono in genera_html_header_ricerca_ajax()');
      
      $stringa_luogo_ricerca ='';
      $stringa_conteggio_attivita = '';
      
      /*definisco la stringa del luogo*/
      if($data_form['autocomplete']=='')
         $stringa_luogo_ricerca = 'Udine, UD, Italia';
      else
         $stringa_luogo_ricerca = $data_form['autocomplete'];
      
      /*definisco la stringa del conteggio delle attività trovate*/
      if(count($dati_e_shops)==1)
         $stringa_conteggio_attivita = '1 attività trovata';
      else
         $stringa_conteggio_attivita = count($dati_e_shops) . ' attività trovate';
      
      echo '<div class="container">
		    	<div class="row">
		    		<div class="col-xl-12 col-lg-12 col-md-12">
		    			<div class="breadcrumbs">
                     <ul>
                         <li><a href="' . base_url() . '/home">Home</a></li>
                         <li><a href="' . base_url() . '/ricerca">Ricerca</a></li>
                         <li>' . $stringa_luogo_ricerca . '</li>
                     </ul>
                  </div>
		        		<!--<h1 style="color:red">Questa è una pagina di anteprima, il sito è in fase di implementazione</h1>-->
                  <h1>' . $stringa_conteggio_attivita . ' entro ' . $data_form['filtri_distanza'] . ' km di distanza da ' . $stringa_luogo_ricerca . '</h1>
                  Utilizza i filtri disponibili nella pagina e clicca sul tasto "Cerca" per modificare i criteri di ricerca.
		    		</div>
		    		<div class="col-xl-0 col-lg-0 col-md-0">
		    			<!--<div class="search_bar_list">
							<!--<input type="text" class="form-control" placeholder="Cerca di nuovo...">
							<input type="submit" value="Cerca">
						</div>-->
		    		</div>
		    	</div>
		    	<!-- /row -->		       
		    </div>';
   }
   
   private function carica_viste($data)
   {
      helper('HTML');
      helper('form');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      //echo view('pages/ricerca/ricerca_mockup_v02', $data);
      echo view('pages/ricerca/ricerca_01_barra_in_alto', $data);
      echo view('pages/ricerca/ricerca_02_mappa', $data);
      echo view('pages/ricerca/ricerca_03_filtri', $data);
      echo view('pages/ricerca/ricerca_04_risultati', $data);
      echo view('templates/footer', $data);
      echo view('templates/closure', $data); 
   }
   
   /*definisco la variabile $data_form che di default sarà vuota*/
   private function define_data($origine, $data_form = array ())
   {
      
      //$FormsContattiModel = model('FormsContattiModel');
      //$data = $FormsContattiModel->dati_form();
      $data['controller_name'] = "ricerca";
      $data["title"] = "Ricerca";
      $data['tipo_header'] = 'fisso';
      
      /*css specifico*/
      $array_specific_css[1] = 'listing';
      $array_specific_css[2] = 'leaflet';
      $data['array_specific_css'] = $array_specific_css;
      
      /*js specifico*/
      $array_specific_js[1] = 'sticky_sidebar.min';
      $array_specific_js[2] = 'specific_listing';
      $array_specific_js[3] = 'main_map_scripts';
      $array_specific_js[4] = 'roberto-autocomplete';
      $array_specific_js[5] = 'roberto-checkmark-categorie';
      $array_specific_js[6] = 'roberto-checkmark-domasp';
      $array_specific_js[7] = 'roberto-ajax-risultati-ricerca';
      $array_specific_js[8] = 'roberto-autocomplete-text-changed';
      /*$array_specific_js[3] = 'leaflet_map/leaflet.min';
      $array_specific_js[4] = 'leaflet_map/leaflet_markercluster.min';
      $array_specific_js[5] = 'leaflet_map/leaflet_markers';
      $array_specific_js[6] = 'leaflet_map/leaflet_func';*/
      $data['array_specific_js'] = $array_specific_js;
  
      /*risultato delle query per caricare le categorie*/
      $ShopsModel = model('ShopsModel');
      
      $data['dati_e_categories'] = $ShopsModel->get_e_categories_with_counts();
      
      /*dati per il form di ricerca*/
      $FormsRicercaModel = model('FormsRicercaModel');
      $dati_per_ricerca = $FormsRicercaModel->dati_form_ricerca_ricerca();
      $data['cosa_stai_cercando'] = $dati_per_ricerca['cosa_stai_cercando'];
      $data['autocomplete'] = $dati_per_ricerca['autocomplete'];
      $data['autocomplete_hidden'] = $dati_per_ricerca['autocomplete_hidden'];
      $data['baseurl_hidden'] = $dati_per_ricerca['baseurl_hidden'];
      $data['array_checkboxs_categorie'] = $dati_per_ricerca['array_checkboxs_categorie'];
      $data['filtri_checkbox_domicilio'] = $dati_per_ricerca['filtri_checkbox_domicilio'];
      $data['filtri_checkbox_asporto'] = $dati_per_ricerca['filtri_checkbox_asporto'];
      $data['filtri_distanza'] = $dati_per_ricerca['filtri_distanza'];
      
      if($origine == 'index')
      {
         /*faccio la query per caricare, secondo dei valori precaricati quando si arriva da index. Sarebbe bello a lungo andare prendere la posizione dal GPS anziché avere le coordinate hard-coded*/
         $data_form['cosa_stai_cercando'] = '';  
         $data_form['autocomplete'] = '';
         $data_form['lista_categorie'] = '%';
         $data_form['autocomplete_hidden'] = '46.0619+13.2378';
         $data_form['filtri_distanza'] = 30;
         $RicercaModel = model('RicercaModel');
         $data['dati_e_shops'] = $RicercaModel->ricerca_homepage($data_form['lista_categorie'], $data_form['autocomplete_hidden'], $data_form['cosa_stai_cercando']);
      }
      else if ($origine == 'home')
      {
         /*stesso workaround per la distanza*/
         $data_form['filtri_distanza'] = 30;
         /*faccio la query per caricare i risultati*/
         $RicercaModel = model('RicercaModel');
         $data['dati_e_shops'] = $RicercaModel->ricerca_homepage($data_form['lista_categorie'], $data_form['autocomplete_hidden'], $data_form['cosa_stai_cercando']);
      }
      else if ($origine == 'ricerca')
      {
         /*faccio la query per caricare i risultati*/
         $RicercaModel = model('RicercaModel');
         $data['dati_e_shops'] =  $RicercaModel->ricerca_ricerca($data_form['required_categories_by_checkbox'], $data_form['autocomplete_hidden'], $data_form['cosa_stai_cercando'], $data_form['domicilio'], $data_form['asporto'], $data_form['filtri_distanza']);
      }
      
      /*passo alla vista anche i dati ricevuti dal form precedente*/
      $data['dati_form'] = $data_form;
      return $data;
   }
   
   
   
   
   /***** NON COMPLICHIAMOCI LA VITA,*/
   // private function get_e_categories()
   // {
      // /*carico il model*/
      // $ShopsModel = model('ShopsModel');
      // /*eseguo una volta la query e ritorno il risultato risultato, che passerò alla vista in data*/
      // return $ShopsModel->get_e_categories();
   // }
   
   // private function get_e_shops_with_main_pictures()
   // {
      // /*carico il model*/
      // $ShopsModel = model('ShopsModel');
      // /*eseguo una volta la query e ritorno il risultato risultato, che passerò alla vista in data*/
      // return $ShopsModel->get_e_shops_with_main_pictures();
   // }
   
}