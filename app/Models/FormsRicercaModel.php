<?php namespace App\Models;

use CodeIgniter\Model;

class FormsRicercaModel extends Model
{
   function dati_form_ricerca_homepage()
   {
      /*carico i form di cui ho bisogno*/
      $ShopsModel = model('ShopsModel');
      $dati_e_categories = $ShopsModel->get_e_categories_with_pictures_with_counts_order_by_count_desc();
      
      /*form deve contenere:
       * 
       * 
       * Ricerca per nome e/o descrizione (ricerca su union di nome, nome_long, descrizione, descrizione_long)
       * Ricerca per indirizzo (ricerca su coordinate e/o indirizzo)
       * Filtro categoria
       */
      
      $cosa_stai_cercando = array
      (
         "name"=> "cosa_stai_cercando", 
         "id"=> "cosa_stai_cercando",
         "class" => "form-control", 
         "type" => "hidden", 
         "maxlength" => "64",
         "placeholder" => "Cosa stai cercando...", 
      );
      
      $autocomplete = array
      (
         "name"=> "autocomplete", 
         "id"=> "autocomplete",
         "class" => "form-control", 
         "type" => "text", 
         "maxlength" => "128",
         "onchange" => "autocomplete_text_changed()",
         "placeholder" => "Indirizzo di consegna?", 
      );
      
      $autocomplete_hidden = array
      (
         "name"=> "autocomplete_hidden", 
         "id"=> "autocomplete_hidden",
         "class" => "form-control", 
         "type" => "hidden", 
         "maxlength" => "128",
         "value" => "46.0619+13.2378",
      );
      
      /*inizia tipo richiedente*/
      /*creo un array di opzioni per il menu a tendina delle categorie*/
      
      $lista_categorie_options = array();
      
      $lista_categorie_options['%'] = "Tutte le categorie";
      
      foreach ($dati_e_categories as $categoria)
      {
         $lista_categorie_options[$categoria->e_categories_code] =  $categoria->e_categories_name;
      }

      $lista_categorie = array
      (
         "name"=> "lista_categorie", 
         "id"=> "lista_categorie",
         "options" => $lista_categorie_options,
         "class" => "wide",
         "type" => "hidden", 
         //"type" => "text", 
         //"maxlength" => "256",
         //"placeholder" => "Nome negozio, ristorante o attività", 
      );
      /*fine tipo richiedente*/
         
      $form_ricerca_home_data = array(
         "cosa_stai_cercando" => $cosa_stai_cercando,
         "autocomplete" => $autocomplete,
         "autocomplete_hidden" => $autocomplete_hidden,
         "lista_categorie" => $lista_categorie
      );
      return $form_ricerca_home_data;  
      
   }
   
   /* PAGINA RICERCA */
   
   
   function dati_form_ricerca_ricerca()
   {
      /*carico i form di cui ho bisogno*/
      $ShopsModel = model('ShopsModel');
      $dati_e_categories = $ShopsModel->get_e_categories_with_pictures_with_counts_order_by_count_desc();
      
      /*form deve contenere:
       * 
       * 
       * Ricerca per nome e/o descrizione (ricerca su union di nome, nome_long, descrizione, descrizione_long)
       * Ricerca per indirizzo (ricerca su coordinate e/o indirizzo)
       * Filtro categoria
       */
      
      $cosa_stai_cercando = array
      (
         "name"=> "cosa_stai_cercando", 
         "id"=> "cosa_stai_cercando",
         "class" => "form-control", 
         "type" => "text", 
         "maxlength" => "64",
         "placeholder" => "Nome del locale...", 
      );
      
      $autocomplete = array
      (
         "name"=> "autocomplete", 
         "id"=> "autocomplete",
         "class" => "form-control", 
         "type" => "text", 
         "maxlength" => "128",
         "onchange" => "autocomplete_text_changed()",
         "placeholder" => "Indirizzo...", 
      );
      
      $autocomplete_hidden = array
      (
         "name"=> "autocomplete_hidden", 
         "id"=> "autocomplete_hidden",
         "class" => "form-control", 
         "type" => "hidden", 
         "maxlength" => "128",
         "value" => "46.0619+13.2378",
      );
      
      /*devo crearlo per poter passare il valore di base_url allo script di javascript*/
      $baseurl_hidden = array
      (
         "name"=> "baseurl_hidden", 
         "id"=> "baseurl_hidden",
         "class" => "form-control", 
         "type" => "hidden", 
         "maxlength" => "2048",
         "value" => base_url(),
      );
      
      /*devo creare un array di checkbox tante quante sono le categorie*/
      $array_checkboxs_categorie = array();
      //$lista_categorie_options['%'] = "Tutte le categorie";
      
      /*per ogni categoria nell'array*/
      foreach ($dati_e_categories as $categoria)
      {
         /*creo un checkbox*/
         $array_checkboxs_categorie[$categoria->e_categories_id] = array
         (
            "name"=> "filtri_categoria_" . $categoria->e_categories_id, 
            "id"=> "filtri_categoria_" . $categoria->e_categories_id,
            "type" => "checkbox", 
            "value" => "0"
         );
      }
      
      /*checkbox domicilio*/
      $filtri_checkbox_domicilio = array
      (
         "name"=> "filtri_checkbox_domicilio",
         "id"=> "filtri_checkbox_domicilio",
         "type" => "checkbox", 
         "value" => "0"
      );
      
      
      /*checkbox asporto*/
      $filtri_checkbox_asporto = array
      (
         "name"=> "filtri_checkbox_asporto",
         "id"=> "filtri_checkbox_asporto",
         "type" => "checkbox", 
         "value" => "0"
      );

      /*distanza range*/
      $filtri_distanza = array
      (
         "name"=> "filtri_distanza", 
         "id"=> "filtri_distanza",
         "type" => "range", 
         "min" => "1",
         "max" => "100",
         "step" => "1",
         "value" => "30",
         "data-orientation" => "horizontal",
      );
         
      $form_ricerca_ricerca_data = array(
         "cosa_stai_cercando" => $cosa_stai_cercando,
         "autocomplete" => $autocomplete,
         "autocomplete_hidden" => $autocomplete_hidden,
         "baseurl_hidden" => $baseurl_hidden,
         "array_checkboxs_categorie" => $array_checkboxs_categorie,
         "filtri_checkbox_domicilio" => $filtri_checkbox_domicilio,
         "filtri_checkbox_asporto" => $filtri_checkbox_asporto,
         "filtri_distanza" => $filtri_distanza
      );
      return $form_ricerca_ricerca_data;  
      
   }
   
   
   
}


