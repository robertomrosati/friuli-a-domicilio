<?php namespace App\Controllers;
use CodeIgniter\Controller;

/*creo la classe Home*/
class Home extends Controller
{
	public function index()
	{
		/*
      non serve caricare url_helper perché questo helper viene sempre incluso di default. 
      *   helper('url');
      */
      /* serve invece caricare html_helper per poter utilizzare link_tag*/
      helper('HTML');
      
      // /*controllo se la pagina è assente, se è assente carico Error 404*/
      // if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
      // {
         // // Whoops, we don't have a page for that!
         // throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      // }
 
      /*carico le viste e definisco i dati*/
      $this->carica_viste($this->define_data());
	}
   
   private function carica_viste($data)
   {
      helper('HTML');
      helper('form');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      echo view('pages/home/home_1_top_search', $data);
      echo view('pages/home/home_3_popular_restaurants', $data);
      echo view('pages/home/home_2_popular_categories', $data);
      /*inserire vista mockup*/
      //echo view('pages/home/home_4_best_deals', $data);
      echo view('pages/home/home_cose_fad', $data);
      //echo view('pages/home/home_5_banner', $data);
      echo view('pages/home/home_pictures_carousel', $data);
      echo view('pages/home/home_6_owner', $data);
      echo view('templates/footer', $data);
      echo view('templates/closure', $data);   
   }
   
   
   private function define_data()
   {
      $data['title'] = ucfirst('home'); // Capitalize the first letter
      $data['tipo_header'] = 'scomparsa';
      
      /*specific css*/
      $array_specific_css[0] = 'home';
      $array_specific_css[1] = 'submit';
      $data['array_specific_css'] = $array_specific_css;
      
      /*specific js¨*/
      $array_specific_js[0] = 'roberto-autocomplete';  
      $array_specific_js[1] = 'roberto-autocomplete-text-changed';        
      $data['array_specific_js'] = $array_specific_js;   
      
      /*query usate nella pagina*/
      $ShopsModel = model('ShopsModel');
      $data['dati_e_categories'] = $this->dammi_categorie_ordinate();
      $data['da_non_perdere'] = $this->ristoranti_da_non_perdere();
      
      /*dati per il form di ricerca*/
      $FormsRicercaModel = model('FormsRicercaModel');
      $dati_per_ricerca = $FormsRicercaModel->dati_form_ricerca_homepage();
      $data['cosa_stai_cercando'] = $dati_per_ricerca['cosa_stai_cercando'];
      $data['autocomplete'] = $dati_per_ricerca['autocomplete'];
      $data['autocomplete_hidden'] = $dati_per_ricerca['autocomplete_hidden'];
      $data['lista_categorie'] = $dati_per_ricerca['lista_categorie'];
      return $data;
   }
   
   private function dammi_categorie_ordinate()
   {
      $ShopsModel = model('ShopsModel');
      $categories = $ShopsModel->get_e_categories_with_pictures_with_counts_order_by_count_desc();  
      $vettore = array();
      $i = 0;
      foreach ($categories as $category)
      {
         $vettore[$i] = $category;
         $i++;
      }
      return $vettore;
   }
      
   private function ristoranti_da_non_perdere()
   {
      /*nota evoluzione futura: prevedere di riceve in ingresso un vettore di ID di ristorante e caricare tanti ristoranti quanti ne sono richiesto*/
      $ShopsModel = model('ShopsModel');
      $vettore = array();
      $vettore[0] = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories('1');
      $vettore[1] = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories('2');
      $vettore[2] = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories('3');
      $vettore[3] = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories('4');
      return $vettore;
      //return $ShopsModel->get_e_shops_with_main_pictures_and_main_categories();
   }
   
   /*funzione che aggiorna la variabile di sessione, venendo chiamata da una richiesta ajax dallo script javascript relativo*/
   
   /*nota: per adesso RINUNCIAMO ad usare questo ed accontentiamoci di usare un tipo di dato hidden */
   function aggiorna_coordinate_luogo()
   {
      /*controllo di essere stato invocato tramite post, altrimento faccio redirect a home*/
      if ($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         echo "<script> console.log('sono in aggiorna_coordinate_luogo() ma non sono stato chiamato con metodo post'); </script>";
         return redirect()->to(base_url().'/home');
      }
      $session = session();
      $_SESSION['coordinate_luogo'] = $_POST["latitudine"] . ' ' . $_POST["longitudine"];
      $session->markAsFlashdata('coordinate_luogo');
      /* prendo i dati di latitudine e longitudine */
      //if(isset($_POST['latitudine']) && isset($_POST['longitudine']))
      //{
      //   /* aggiorno la variabile di sessione */
      //   $_SESSION['coordinate_luogo'] = $_POST["latitudine"] . ' ' . $_POST["longitudine"];
      //}
      
      //echo "<script> console.log('sono in aggiorna_coordinate_luogo() e sono stato chiamato con metodo post'); </script>";
      //echo "<script> console.log('coordinate ricevute = " . $_POST['latitudine'] . ", " . $_POST['longitudine'] . "); </script>";
      
      return;
   }


}