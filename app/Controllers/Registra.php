<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

/*creo la classe Tricesimo*/
class Registra extends Controller
{
	public function index()
	{
      return redirect()->to(base_url()."/contatti");
		/* carico gli helper dei quali ho bisogno*/
      helper('HTML');
      helper('form');
      $FormsContattiModel = model('FormsContattiModel');
      /* inizializzo la libreria per la gestione delle sessioni. In alternativa, l'inizializzazione hard sarebbe: 
      $session = \Config\Services::session($config);
      */
      
      /*inizializzo 'mail_sent_ok';*/
      $session = session();
      $_SESSION['mail_sent_ok'] ='';
      
      /*carico il vettore dei dati da passare alla vista*/
      $data = $this->define_data();
      
      /*controllo se la pagina è assente, se è assente carico Error 404
      if ( ! is_file(APPPATH.'/Views/pages/registra.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      */
      
      /*$data['title'] = ucfirst($page); Capitalize the first letter */
      
      /*l'ho messo in una funzione esterna per non appensantire troppo index(). anche % x me lo da la funzione $dati_form*/
      /*  $data = array 
      (
         "title" => ucfirst($page), // Capitalize the first letter,
         $this->dati_form() 
      ); */
      

      
      /*carico le viste*/
      $this->carica_viste($data);
         
	}

   public function invia_form()
   {
      if ($this->request->getMethod() != 'post') 
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/registra');
      }
      
      /*mi prendo i dati dal form*/
      
      $data_form['nome_cognome'] = $this->request->getVar("nome_cognome");  
      $data_form['mail_address'] = $this->request->getVar("mail_address");
      $data_form['telefono'] = $this->request->getVar("telefono");
      $data_form['tipo_richiedente'] = $this->request->getVar("tipo_richiedente");
      $data_form['nome_negozio'] = $this->request->getVar("nome_negozio");
      $data_form['comune_negozio'] = $this->request->getVar("comune_negozio");
      $data_form['messaggio'] = $this->request->getVar("messaggio");
      
      $FormsContattiModel = model('FormsContattiModel');
      /*chiamo la funzione per l'invio della mail che si trova sul Model*/
      $FormsContattiModel->invia_mail($data_form, "Registra la tua attività");
      
      $session = session();
      $_SESSION['mail_sent_ok'] = 'Richiesta inviata correttamente. Verrai ricontattato da noi il prima possibile. Grazie.';
      $session->markAsFlashdata('mail_sent_ok');
      
      /*carico il vettore dei dati da passare alla vista*/
      $data = $this->define_data();
      $this->carica_viste($data);
      //return redirect()->to(base_url().'/registra')->with('mail_sent_ok', 'Richiesta inviata correttamente. Verrai ricontattato da noi il prima possibile. Grazie.');
      return;
   }
  
   
   private function carica_viste($data)
   {
      /* carico gli helper dei quali ho bisogno*/
      helper('HTML');
      helper('form');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      echo view('pages/registra/registra_1', $data);
      echo view('pages/registra/registra_2', $data);
      echo view('pages/registra/registra_3', $data);
      echo view('pages/form/form_contatti', $data);
      echo view('templates/footer', $data);
      echo view('templates/closure', $data);
      return;
   }
   
   private function define_data()
   {
      $FormsContattiModel = model('FormsContattiModel');
      $data = $FormsContattiModel->dati_form();
      $data['controller_name'] = "registra";
      $data["title"] = "Registra la tua attività";
      $data['tipo_header'] = 'scomparsa';
       
      /*css specifico*/
      $array_specific_css[1] = 'submit';
      $data['array_specific_css'] = $array_specific_css;
      
      /*js specifico*/
      $array_specific_js = array();
      $data['array_specific_js'] = $array_specific_js;

      return $data;
   }
   
   


}