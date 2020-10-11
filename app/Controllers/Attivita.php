<?php namespace App\Controllers;
use CodeIgniter\Controller;

/*controller per la vista sulla singola attività*/
class Attivita extends Controller
{
   public function index()
   {
      /*controllo se la pagina è assente, se è assente carico Error 404*/
      
      if (! is_file(APPPATH.'/Views/pages/contatti/contatti_1.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      /*carico le viste*/
      $this->carica_viste($this->define_data());
   }
   
   
   private function carica_viste($data)
   {
      
      
   }
   
   private function define_data()
   {
      //$FormsContattiModel = model('FormsContattiModel');
      //$data = $FormsContattiModel->dati_form();
      $data['controller_name'] = 'attivita';
      $data['title'] = 'Attività';     
      $data['tipo_header'] = 'fisso';
      
      /*css specifico*/
      $array_specific_css[1] = 'contacts';
      $data['array_specific_css'] = $array_specific_css;
      
      /*js specifico*/
      
      return $data;
   }
   
}