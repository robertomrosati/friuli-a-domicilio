<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Privacy extends Controller
{
   public function index()
   {
      /* carico gli helper dei quali ho bisogno*/
      helper('HTML');
         
      /*carico i dati da passare alle viste*/
      $data = $this->define_data("privacy");
      
      /*controllo se la pagina è assente, se è assente carico Error 404*/
      
      if (! is_file(APPPATH.'/Views/pages/privacy/privacy.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      /*carico le viste*/
      $this->carica_viste("privacy", $data);
   }
   
   /*nota: se si potesse usare l'ereditarietà e mettere questa funzione "fuori" non sarebbe necessario copiarla continuamente in tutti in controller, basterebbe farla stare nella classe padre e ereditarla. Da capire*/
   
   function cookies()
   {
      $data = $this->define_data("cookies");
      
      if (! is_file(APPPATH.'/Views/pages/privacy/cookies.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      $this->carica_viste("cookies", $data);
      
   }
   
   function gdpr()
   {
      $data = $this->define_data("gdpr");
      
      if (! is_file(APPPATH.'/Views/pages/privacy/gdpr.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      $this->carica_viste("gdpr", $data);
      
   }
   
   private function carica_viste($view, $data)
   {
      /* carico gli helper dei quali ho bisogno*/
      helper('HTML');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      echo view('pages/privacy/privacy_header', $data);
      if($view == "privacy")
      {
         echo view('pages/privacy/privacy', $data);
      }
      else if ($view == "cookies")
      {
         echo view('pages/privacy/cookies', $data);
      }
      else if ($view == "gdpr")
      {
         echo view('pages/privacy/gdpr', $data);
      } 
      echo view('templates/footer', $data);
      echo view('templates/closure', $data);
      return;
   }
   
   
   /*copiata dall'analoga funzione di Registra */
   private function define_data($view)
   {
      if($view == "privacy")
      {
         $data['controller_name'] = "privacy";
         $data["title"] = "Privacy Policy";
      }
      else if ($view == "cookies")
      {
         $data['controller_name'] = "privacy/cookies";
         $data["title"] = "Cookies Policy";
      }
      else if ($view == "gdpr")
      {
         $data['controller_name'] = "privacy/gdpr";
         $data["title"] = "GDPR Information";
      }         
      
      $data['tipo_header'] = 'scomparsa';
      
      /*css specifico*/
      $array_specific_css = array();
      $data['array_specific_css'] = $array_specific_css;

      /*js specifico*/
      $array_specific_js = array();
      $data['array_specific_js'] = $array_specific_js;
      return $data;
   }
   
}
