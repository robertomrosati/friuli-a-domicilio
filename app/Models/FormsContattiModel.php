<?php namespace App\Models;

use CodeIgniter\Model;

class FormsContattiModel extends Model
{
   /* non devo fare una connessione manuale al database perché grazie al fatto di ereditare la classe Model mi connetto già al database configurato nelle impostazioni in Database.php*/
   
   /* se ho ben capito, i modelli di CI4 possono tenere in considerazione una tabella di default e lavorare su quella fare le query in maniera "seamlessly", ma non siamo comunque limitati a lavorare solo su quella (in questo caso, per esempio, dobbiamo lavorare almeno su quattro tabelle: E_Cities, E_Provinces, E_Regions, E_Nations. */

   /*nota sul database... forse è meglio prevedere la colonna "visibile" in ogni tabella??*/
   
   function invia_mail($data_form, $controller_title)
   {
      /*carico l'helper per le date*/
      helper('date');
      
      /*mi prendo la data attuale*/
      $date_time_now = now('Europe/Rome');
      //$date_time_now->toDateTimeString();      
      /* controllo che questo metodo non venga invocato direttamente,
       * deve essere invocato tramite il metodo post
       */
      /* inizializzo la libreria per la gestione delle sessioni. In alternativa, l'inizializzazione hard sarebbe: 
      $session = \Config\Services::session($config);
      */
      $session = session();   
      $email = \Config\Services::email();

      $email->initialize($this->genera_configurazione_smpt());
      
      $email->setFrom('form@friuliadomicilio.it', 'Friuli a Domicilio: '.$controller_title);
      $email->setTo('form@friuliadomicilio.it');
      //$email->setCC('another@another-example.com');
      //$email->setBCC('them@their-example.com');

      $email->setSubject('Form Contatti: '.$data_form['nome_cognome']);
      
      $mail_content ='
       mail ricevuta da: '.$data_form['nome_cognome'].'<br>
       tramite la vista: '.$controller_title.'<br>
       in data e ora: '.$date_time_now.'<br>
       tipo richiedente: '.$data_form['tipo_richiedente'].'<br>
       indirizzo mail: '.$data_form['mail_address'].'<br>
       telefono: '.$data_form['telefono'].'<br>
       nome negozio: '.$data_form['nome_negozio'].'<br>
       comune negozio: '.$data_form['comune_negozio'].'<br><br>
       
       testo messaggio:<br><br>
       
       '.nl2br($data_form['messaggio']).'';
      
      $email->setMessage($mail_content);

      $email->send();
      return;
   }
   
   function invia_mail_dettaglio($data_form, $shop_id)
   {
      /*carico l'helper per le date*/
      helper('date');
      
      /*mi prendo la data attuale*/
      $date_time_now = now('Europe/Rome');
      //$date_time_now->toDateTimeString();      
      /* controllo che questo metodo non venga invocato direttamente,
       * deve essere invocato tramite il metodo post
       */
      /* inizializzo la libreria per la gestione delle sessioni. In alternativa, l'inizializzazione hard sarebbe: 
      $session = \Config\Services::session($config);
      */
      $session = session();   
      $email = \Config\Services::email();

      $email->initialize($this->genera_configurazione_smpt());
      
      /*metto come mittente la mail che è stata indicata nel form*/
      $email->setFrom('form@friuliadomicilio.it', 'Friuli a Domicilio');
      
      $ShopsModel = model('ShopsModel');
      $dati_negozio = $ShopsModel->get_specific_shop_from_e_shops_with_main_pictures_and_main_categories($shop_id);
      
      /*controllo se la mail del negozio esiste*/
      if($dati_negozio->e_shops_email != null)
      {
         $email->setTo($dati_negozio->e_shops_email);
      }
      else
      {
         $email->setTo('info@friuliadomicilio.it');
      }
      //$email->setCC('another@another-example.com');
      /*in CC nascosta metto sempre comunque friuliadomicilio*/
      $email->setBCC('info@friuliadomicilio.it');

      $email->setSubject('Email da: ' . $data_form['nome']);
      
      

      $mail_content ='
       Caro <b>' . $dati_negozio->e_shops_name . '</b>,<br><br>
       sei stato contattato tramite Friuliadomicilio.it da <b>' .$data_form['nome']. '</b>, che ti ha lasciato il seguente messaggio:<br><br>
       ---------------------------------------<br>
       
       '.nl2br($data_form['messaggio']).'
       <br>---------------------------------------<br><br>
       
       
       Puoi ricontattare '.$data_form['nome'].' ai seguenti recapiti che lui stesso ha comunicato:<br>
       e-mail: '.$data_form['mail_address'].'<br>
       telefono: '.$data_form['telefono'].'<br><br>
       Non rispondere direttamente a questa mail, ma non esitare a scrivere a info@friuliadomicilio.it per qualunque necessità, dubbio o richiesta di aiuto.<br><br>
       
       Mandi,<br>
       Lo staff di Friuliadomicilio.it';
      
      $email->setMessage($mail_content);

      $email->send();
      return;
   }

   function dati_form()
   {    
      
      /*form deve contenere:
       * 
       * 
       * Nome e Cognome
       * Mail
       * Telefono
       * Indicazione se si tratta di un titolare attività o di un utente 
       * Nome del negozio
       * Comune dove si trova il negozio
       * Messaggio personalizzato
       * Validazione I am not a robot
       * Check informativa privacy
       */
       
       /*capire se esiste maxlength */
      
      $nome_cognome = array
      (
         "name"=> "nome_cognome", 
         "id"=> "nome_cognome",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "256",
         "placeholder" => "Nome", 
         "required" => "required"
      );
      
      $mail_address = array
      (
         "name"=> "mail_address", 
         "id"=> "mail_address", 
         "class" => "form-control input-lg", 
         "type" => "email", 
         "maxlength" => "256",
         "placeholder" => "Email", 
         "required" => "required"
      );
      
      $telefono = array
      (
         "name"=> "telefono", 
         "id"=> "telefono", 
         "class" => "form-control input-lg", 
         "type" => "tel", 
         "pattern" => ".[0-9]{9,13}",
         "placeholder" => "Telefono", 
      );
      
      /*inizia tipo richiedente*/
      /*creo un array di opzioni per il menu a tendina che mi va a definire il perché costui sta compilando il form*/
      $tipo_richiedente_options = array
      (
        '' => '...',
        "Titolare Attività" => "Sono il titolare di un'attività",
        "Sono un potenziale utente" => "Sono un potenziale utente",
        "Altro" => "Per un altro motivo",
      );
      
      $tipo_richiedente = array
      (
         "name"=> "tipo_richiedente", 
         "id"=> "tipo_richiedente",
         "options" => $tipo_richiedente_options,
         "class" => "form-control input-lg", 
         "required" => "required"
         //"type" => "text", 
         //"maxlength" => "256",
         //"placeholder" => "Nome negozio, ristorante o attività", 
      );
      /*fine tipo richiedente*/
      
      $nome_negozio = array
      (
         "name"=> "nome_negozio", 
         "id"=> "nome_negozio",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "256",
         "placeholder" => "Nome negozio, ristorante o attività", 
      );
      
      
      
      $comune_negozio = array
      (
         "name"=> "comune_negozio", 
         "id"=> "comune_negozio",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "256",
         "placeholder" => "Comune", 
      );
      
      $messaggio = array
      (
         "name"=> "messaggio", 
         "id"=> "messaggio",
         "class" => "form-control input-lg", 
         "rows" => "6",
         //"type" => "text", 
         "maxlength" => "5000",
         "placeholder" => "Messaggio", 
         "required" => "required" 
      );
      
      /*verifica not a robot*/
      
      $operazione_not_a_robot = $this->genera_operazione_not_a_robot();
      
      $verifica_not_a_robot = array
      (
         "name"=> "verifica_not_a_robot", 
         "id"=> "verifica_not_a_robot",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "256",
         "placeholder" => $operazione_not_a_robot['x1'].' + '.$operazione_not_a_robot['x2'].' = ?',
         "pattern" => $operazione_not_a_robot['result'],
         "required" => "required"
      );
                
      $privacy_checkbox = array
      (
         "name"=> "privacy_checkbox", 
         "id"=> "privacy_checkbox",
         "class" => "checkbox", 
         "type" => "checkbox", 
         "value" => "accepted",
         "required" => "required"
      );
      
      $submit = array
      (
        "name"    => "invia",
        "class"   => "btn_1",
        "id"      => "invia",
        "value"   => "Invia",
        "type"    => "submit"
        //"content" => 'Reset'
      );
      
      
      
      /*metto tutto in un array e poi lo ritorno */
      
      /*capire se serve una regola per i htmlspecialchars (vedere Signup.php di amico segreto*/
      
      $form_data = array(
         "nome_cognome" => $nome_cognome,
         "mail_address" => $mail_address,
         "telefono" => $telefono,
         "tipo_richiedente" => $tipo_richiedente,
         "nome_negozio" => $nome_negozio,
         "comune_negozio" => $comune_negozio,
         "messaggio" => $messaggio,
         "verifica_not_a_robot" => $verifica_not_a_robot,
         "privacy_checkbox" => $privacy_checkbox,
         "submit" => $submit
      );
      
      return $form_data;     
   }
   
   
   /*funzione per generare gli addendi e il risultato dell'operazione I'm not a robot*/
   function genera_operazione_not_a_robot()
   {
      /*genera un numero random compreso tra 0 e 6*/
      $operazione['x1'] = rand(0,6);
      /*genera un altro numero random compreso tra 0 e 6*/
      $operazione['x2'] = rand(0,6);
      /*calcola il valore somma dei due mumeri*/
      $operazione['result'] =  $operazione['x1'] + $operazione['x2'];
      
      return $operazione; 
   }
   
   
   
   function dati_form_shop()
   {    
      
      /*form deve contenere:
       * 
       * 
       * Nome
       * Mail
       * Telefono
       * Messaggio personalizzato
       * Validazione I am not a robot
       * Check informativa privacy
       */
       
       /*capire se esiste maxlength */
      
      $nome = array
      (
         "name"=> "nome", 
         "id"=> "nome",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "32",
         "placeholder" => "Nome", 
         "required" => "required"
      );
      
      $mail_address = array
      (
         "name"=> "mail_address", 
         "id"=> "mail_address", 
         "class" => "form-control input-lg", 
         "type" => "email", 
         "maxlength" => "256",
         "placeholder" => "Email", 
         "required" => "required"
      );
      
      $telefono = array
      (
         "name"=> "telefono", 
         "id"=> "telefono", 
         "class" => "form-control input-lg", 
         "type" => "tel", 
         "pattern" => ".[0-9]{9,13}",
         "placeholder" => "Telefono", 
      );

      $messaggio = array
      (
         "name"=> "messaggio", 
         "id"=> "messaggio",
         "class" => "form-control input-lg", 
         "rows" => "6",
         //"type" => "text", 
         "maxlength" => "5000",
         "placeholder" => "Messaggio", 
         "required" => "required" 
      );
      
      /*verifica not a robot*/
      
      $operazione_not_a_robot = $this->genera_operazione_not_a_robot();
      
      $verifica_not_a_robot = array
      (
         "name"=> "verifica_not_a_robot", 
         "id"=> "verifica_not_a_robot",
         "class" => "form-control input-lg", 
         "type" => "text", 
         "maxlength" => "256",
         "placeholder" => $operazione_not_a_robot['x1'].' + '.$operazione_not_a_robot['x2'].' = ?',
         "pattern" => $operazione_not_a_robot['result'],
         "required" => "required"
      );
                
      $privacy_checkbox = array
      (
         "name"=> "privacy_checkbox", 
         "id"=> "privacy_checkbox",
         "class" => "checkbox", 
         "type" => "checkbox", 
         "value" => "accepted",
         "required" => "required"
      );
      
      $submit = array
      (
        "name"    => "invia",
        "class"   => "btn_1",
        "id"      => "invia",
        "value"   => "Invia",
        "type"    => "submit"
        //"content" => 'Reset'
      );
      
      
      
      /*metto tutto in un array e poi lo ritorno */
      
      /*capire se serve una regola per i htmlspecialchars (vedere Signup.php di amico segreto*/
      
      $form_data = array(
         "nome" => $nome,
         "mail_address" => $mail_address,
         "telefono" => $telefono,
         "messaggio" => $messaggio,
         "verifica_not_a_robot" => $verifica_not_a_robot,
         "privacy_checkbox" => $privacy_checkbox,
         "submit" => $submit
      );
      return $form_data;     
   }

   private function genera_configurazione_smpt()
   {
      /* 
      Nome server SMTP SMTP.office365.com
      Porta SMTP 587
      Metodo di crittografia SMTP STARTTLS
      */

      $config['protocol'] = 'smtp';
      $config['SMTPHost'] = 'SMTP.friuliadomicilio.it';
      $config['SMTPUser'] = 'form@friuliadomicilio.it';
      $config['SMTPPass'] = 'password';
      $config['SMTPPort'] = '587';
      $config['SMTPCrypto'] = 'tls';
      $config['charset']  = 'utf-8';
      $config['mailType'] = 'html';
      $config['wordWrap'] = true;
   
      return $config;
   }

}