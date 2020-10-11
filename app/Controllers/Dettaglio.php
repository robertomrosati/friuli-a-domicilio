<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Dettaglio extends Controller
{
   
   public function index()
   {
      throw new \CodeIgniter\Exceptions\PageNotFoundException();
   }
   
   public function negozio($shop_id)
   {
      /*carico innanzitutto il Model del database per verificare se il negozio chiamato esiste*/
      $ShopsModel = model('ShopsModel');
      
      /*inizializzo 'mail_sent_ok';*/
      $session = session();
      $_SESSION['mail_sent_ok'] ='';
      
      /*funzione da scrivere*/
      if (!$ShopsModel->esiste_negozio($shop_id))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException();
      }
      
      /*carico i dati da passare alle viste*/
      $data = $this->define_data($shop_id);
      
      /*carico le viste*/
      $this->carica_viste($data);
      
   }
   
   private function carica_viste($data)
   {
      helper('form');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      echo view('pages/dettaglio/dettaglio_mockup_01_foto_testata', $data);
      echo view('pages/dettaglio/dettaglio_mockup_02_sections_header', $data);
      echo view('pages/dettaglio/dettaglio_mockup_03_card_A_information', $data);
      //echo view('pages/dettaglio/dettaglio_mockup_04_card_B_menu', $data);
      //echo view('pages/dettaglio/dettaglio_mockup_05_card_C_reviews', $data);
      echo view('pages/dettaglio/dettaglio_mockup_05_card_C_contact_shop', $data);
      echo view('pages/dettaglio/dettaglio_mockup_06_chiusura_tab', $data);
      echo view('pages/dettaglio/dettaglio_mockup_07_contact_restaurant_form.php', $data);
      echo view('templates/footer', $data);
      echo view('templates/closure', $data);
      
   }
   
   private function define_data($shop_id)
   {
      /*css specifico*/
      $array_specific_css[1] = 'detail-page-delivery';
      $array_specific_css[2] = 'modal-roberto';
      
      //$array_specific_css[2] = 'home';
      //$array_specific_css[3] = 'submit';
      $data['array_specific_css'] = $array_specific_css;
      
      /*js specifico*/
      $array_specific_js[1] = 'sticky_sidebar.min';
      $array_specific_js[2] = 'specific_detail';
      $array_specific_js[3] = 'modal-roberto';
      $data['array_specific_js'] = $array_specific_js;
      
      /*risultato delle query per caricare le categorie*/
      $ShopsModel = model('ShopsModel');
      $FormsContattiModel = model('FormsContattiModel');
      $CoordinatesModel = model('CoordinatesModel');
      
      $data['dati_e_categories'] = $ShopsModel->get_e_categories_with_pictures();
      $data['dati_e_shops_specifico'] = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories($shop_id);
      $data['dati_e_shops_pictures'] = $ShopsModel->get_pictures_for_shop($shop_id);
      $data['shops_lat'] = $CoordinatesModel->get_latitute_e_shops($shop_id);
      $data['shops_long'] = $CoordinatesModel->get_longitude_e_shops($shop_id);
      $data['social_networks'] = $ShopsModel->get_social_networks_for_shop($shop_id);
      $data['delivery_routes'] = $ShopsModel->get_delivery_routes_for_shop($shop_id);
      $data['form_shop'] = $FormsContattiModel->dati_form_shop();
      
      //$FormsContattiModel = model('FormsContattiModel');
      //$data = $FormsContattiModel->dati_form();
      $data['controller_name'] = "dettaglio";
      $data["title"] = $data['dati_e_shops_specifico']->e_shops_name;
      $data['tipo_header'] = 'fisso';
      
      return $data;
   }
   
   public function invia_form($shop_id)
   {
      if ($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/dettaglio/negozio/' . $shop_id);
      }
      
      /*mi prendo i dati dal form*/
      
      $data_form['nome'] = $this->request->getVar("nome");  
      $data_form['mail_address'] = $this->request->getVar("mail_address");
      $data_form['telefono'] = $this->request->getVar("telefono");
      $data_form['messaggio'] = $this->request->getVar("messaggio");
      
      $FormsContattiModel = model('FormsContattiModel');
      /*chiamo la funzione per l'invio della mail che si trova sul Model*/
      $FormsContattiModel->invia_mail_dettaglio($data_form, $shop_id);
      
      $session = session();
      $_SESSION['mail_sent_ok'] = 'Richiesta inviata correttamente. Grazie.';
      $session->markAsFlashdata('mail_sent_ok');
      
      /*carico il vettore dei dati da passare alla vista*/
      $data = $this->define_data($shop_id);
      $this->carica_viste($data);
      //return redirect()->to(base_url().'/registra')->with('mail_sent_ok', 'Richiesta inviata correttamente. Verrai ricontattato da noi il prima possibile. Grazie.');
      return;
   }
   
   
   //private function get_restaurant_data
   
   

}   
