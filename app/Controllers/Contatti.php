<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Contatti extends Controller
{
   public function index()
   {
      /* carico gli helper dei quali ho bisogno*/
      helper('HTML');
      helper('form');
      $FormsContattiModel = model('FormsContattiModel');
      
      /*inizializzo 'mail_sent_ok';*/
      $session = session();
      $_SESSION['mail_sent_ok'] ='';
      
      /*carico i dati da passare alle viste*/
      $data = $this->define_data();
      
      /*controllo se la pagina è assente, se è assente carico Error 404*/
      
      if (! is_file(APPPATH.'/Views/pages/contatti/contatti_1.php'))
      {
         // Whoops, we don't have a page for that!
         throw new \CodeIgniter\Exceptions\PageNotFoundException($data['controller_name']);
      }
      
      /*carico le viste*/
      $this->carica_viste($data);
   }
   
   /*nota: se si potesse usare l'ereditarietà e mettere questa funzione "fuori" non sarebbe necessario copiarla continuamente in tutti in controller, basterebbe farla stare nella classe padre e ereditarla. Da capire*/
   
   
   private function carica_viste($data)
   {
      /* carico gli helper dei quali ho bisogno*/
      helper('HTML');
      helper('form');
      echo view('templates/include', $data);
      echo view('templates/header', $data);
      echo view('pages/contatti/contatti_1', $data);
      echo view('pages/form/form_contatti', $data);
      echo view('pages/contatti/contatti_2', $data);
      echo view('templates/footer', $data);
      echo view('templates/closure', $data);
      return;
   }
   
   
   public function invia_form()
   {
      if ($this->request->getMethod() != 'post')
      {      
			/*$this->session->set_flashdata('messaggio', 'Errore: questo metodo non può essere invocato direttamente'); 
			redirect($this->input->server('HTTP_REFERER')); */
         return redirect()->to(base_url().'/contatti');
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
      $FormsContattiModel->invia_mail($data_form, "Contatti");
      
      $session = session();
      $_SESSION['mail_sent_ok'] = 'Richiesta inviata correttamente. Verrai ricontattato da noi il prima possibile. Grazie.';
      $session->markAsFlashdata('mail_sent_ok');
      
      /*carico il vettore dei dati da passare alla vista*/
      $data = $this->define_data();
      $this->carica_viste($data);
      //return redirect()->to(base_url().'/registra')->with('mail_sent_ok', 'Richiesta inviata correttamente. Verrai ricontattato da noi il prima possibile. Grazie.');
      return;
   }
   
   
   /*copiata dall'analoga funzione di Registra */
   private function define_data()
   {
      $FormsContattiModel = model('FormsContattiModel');
      $data = $FormsContattiModel->dati_form();
      $data['controller_name'] = "contatti";
      $data["title"] = "Contatti";
      $data['tipo_header'] = 'scomparsa';
      
      /*css specifico*/
      $array_specific_css[1] = 'contacts';
      $data['array_specific_css'] = $array_specific_css;

      /*js specifico*/
      $array_specific_js = array();
      $data['array_specific_js'] = $array_specific_js;
      
      return $data;
   }


}