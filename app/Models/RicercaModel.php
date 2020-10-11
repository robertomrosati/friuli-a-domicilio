<?php namespace App\Models;

use CodeIgniter\Model;

class RicercaModel extends Model
{

   function ricerca_generale($comune_spedizione_id, $home_delivery, $take_away, $array_categorie, $free_string_research)
   {
      /* devo costruire le varie parti di query in base a quello che ho ricevuto in input*/
      
      //foreach($array_categorie 
      
      /* dammi la lista di tutte le categorie*/
      $db = db_connect();
      
      /*versione semplificata solo con categorie e stringa libera per iniziare*/
      $query = $db->query('select distinct e_shops_1.*, e_shops_2.e_categories_description, e_shops_2.e_files_path
      from e_shops as e_shops_1
      left outer join r_e_shops_e_files as r_e_shops_e_files_1 on e_shops_1.e_shops_id = r_e_shops_e_files_1.r_e_shops_e_files_e_shops_id
      left outer join e_files as e_files_1 on r_e_shops_e_files_1.r_e_shops_e_files_e_files_id = e_files_1.e_files_id
      left outer join r_e_shops_e_categories as r_e_shops_e_categories_1 on e_shops_1.e_shops_id = r_e_shops_e_categories_1.r_e_shops_e_categories_e_shops_id
      left outer join e_categories as e_categories_1 on r_e_shops_e_categories_1.r_e_shops_e_categories_e_categories_id = e_categories_1.e_categories_id
      left outer join e_delivery_routes as e_delivery_routes_1 on e_shops_1.e_shops_id = e_delivery_routes_1.e_delivery_routes_e_shops_id
      join (select e_shops_2.e_shops_id, e_categories_2.e_categories_description, e_files_2.e_files_path
      from e_shops as e_shops_2
      left outer join r_e_shops_e_files as r_e_shops_e_files_2 on e_shops_2.e_shops_id = r_e_shops_e_files_2.r_e_shops_e_files_e_shops_id
      left outer join e_files as e_files_2 on r_e_shops_e_files_2.r_e_shops_e_files_e_files_id = e_files_2.e_files_id
      left outer join r_e_shops_e_categories as r_e_shops_e_categories_2 on e_shops_2.e_shops_id = r_e_shops_e_categories_2.r_e_shops_e_categories_e_shops_id
      left outer join e_categories as e_categories_2 on r_e_shops_e_categories_2.r_e_shops_e_categories_e_categories_id = e_categories_2.e_categories_id
      where
     (e_categories_1.e_categories_code = "rist" or
        e_categories_1.e_categories_code = "pcsp" or 
          e_categories_1.e_categories_code = "azvn") and
     (e_shops_name like "%" or
         e_shops_1.e_shops_name_long like "%codeigniter%" or
         e_shops_1.e_shops_description like "%codeigniter%" or
         e_shops_1.e_shops_description_long like "%codeigniter%") and
         e_shops_1.e_shops_visible = 1;'); 
      
      /* $query = $db->query('
      select distinct e_shops_1.*, e_shops_2.e_categories_description, e_shops_2.e_files_path
      from e_shops as e_shops_1
      left outer join r_e_shops_e_files as r_e_shops_e_files_1 on e_shops_1.e_shops_id = r_e_shops_e_files_1.r_e_shops_e_files_e_shops_id
      left outer join e_files as e_files_1 on r_e_shops_e_files_1.r_e_shops_e_files_e_files_id = e_files_1.e_files_id
      left outer join r_e_shops_e_categories as r_e_shops_e_categories_1 on e_shops_1.e_shops_id = r_e_shops_e_categories_1.r_e_shops_e_categories_e_shops_id
      left outer join e_categories as e_categories_1 on r_e_shops_e_categories_1.r_e_shops_e_categories_e_categories_id = e_categories_1.e_categories_id
      left outer join e_delivery_routes as e_delivery_routes_1 on e_shops_1.e_shops_id = e_delivery_routes_1.e_delivery_routes_e_shops_id
      join (select e_shops_2.e_shops_id, e_categories_2.e_categories_description, e_files_2.e_files_path
      from e_shops as e_shops_2
      left outer join r_e_shops_e_files as r_e_shops_e_files_2 on e_shops_2.e_shops_id = r_e_shops_e_files_2.r_e_shops_e_files_e_shops_id
      left outer join e_files as e_files_2 on r_e_shops_e_files_2.r_e_shops_e_files_e_files_id = e_files_2.e_files_id
      left outer join r_e_shops_e_categories as r_e_shops_e_categories_2 on e_shops_2.e_shops_id = r_e_shops_e_categories_2.r_e_shops_e_categories_e_shops_id
      left outer join e_categories as e_categories_2 on r_e_shops_e_categories_2.r_e_shops_e_categories_e_categories_id = e_categories_2.e_categories_id
      where ((r_e_shops_e_files_2.r_e_shops_e_files_main_picture =1 and r_e_shops_e_files_2.r_e_shops_e_files_visible =1) or r_e_shops_e_files_2.r_e_shops_e_files_e_files_id is null)
      and r_e_shops_e_categories_2.r_e_shops_e_categories_main_category =1
      and r_e_shops_e_categories_2.r_e_shops_e_categories_visible =1
      and e_shops_2.e_shops_visible = 1) as e_shops_2 on e_shops_1.e_shops_id = e_shops_2.e_shops_id
      where 
      ((e_delivery_routes_1.e_delivery_routes_e_cities_id = 124 and
        e_shops_1.e_shops_home_delivery = 1) 
        or
        e_shops_1.e_shops_take_away = 1) and
     (e_categories_1.e_categories_code = "rist" or
        e_categories_1.e_categories_code = "pcsp" or 
          e_categories_1.e_categories_code = "azvn") and
     (e_shops_name like "%" or
         e_shops_1.e_shops_name_long like "%codeigniter%" or
         e_shops_1.e_shops_description like "%codeigniter%" or
         e_shops_1.e_shops_description_long like "%codeigniter%") and
         e_shops_1.e_shops_visible = 1;'); */
         
     return $query->getResultObject();
     
   }
   
   function ricerca_homepage($categoria, $coordinate, $free_string_research)
   {

      /* connettiti al DB*/
      $db = db_connect();
      
      /*versione semplificata solo con categorie e stringa libera per iniziare*/
      $query = $db->query($this->stringa_select($coordinate) . '
      where
     (e_categories_1.e_categories_code like "' . $categoria . '") and
     (e_shops_name like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_name_long like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_description like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_description_long like "%' . $free_string_research . '%") and
         st_distance_sphere(e_shops_1.e_shops_coordinates, (st_geomfromtext("point(' . $coordinate . ')", 4326)))/1000 < 30 and
         e_shops_1.e_shops_visible = 1
         order by st_distance_sphere(e_shops_1.e_shops_coordinates, (st_geomfromtext("point(' . $coordinate . ')", 4326)))/1000;'); 
          
     return $query->getResultObject();
   }
   
   function ricerca_ricerca($categorie_richieste_da_checkbox, $coordinate, $free_string_research, $domicilio, $asporto, $distanza)
   {

      /* connettiti al DB*/
      $db = db_connect();
      
      /*versione semplificata solo con categorie e stringa libera per iniziare*/
      $query = $db->query($this->stringa_select($coordinate) . '
      where
     (e_categories_1.e_categories_id in ('. $this->lista_categorie_richieste($categorie_richieste_da_checkbox) . ')) and
     (e_shops_name like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_name_long like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_description like "%' . $free_string_research . '%" or
         e_shops_1.e_shops_description_long like "%' . $free_string_research . '%") and
         st_distance_sphere(e_shops_1.e_shops_coordinates, (st_geomfromtext("point(' . $coordinate . ')", 4326)))/1000 < ' . $distanza . ' and '
         . $this->stringa_domicilio_asporto($domicilio, $asporto) .
         'e_shops_1.e_shops_visible = 1
         order by st_distance_sphere(e_shops_1.e_shops_coordinates, (st_geomfromtext("point(' . $coordinate . ')", 4326)))/1000;'); 
          
     return $query->getResultObject();
   }
   
   
   private function stringa_select($coordinate)
   {
      return 'select distinct e_shops_1.*, e_shops_2.e_categories_name as e_categories_name, e_shops_2.e_files_path as e_files_path, round(st_distance_sphere(e_shops_1.e_shops_coordinates, (st_geomfromtext("point(' . $coordinate . ')", 4326)))/1000, 1) as distanza
      from e_shops as e_shops_1
      left outer join r_e_shops_e_files as r_e_shops_e_files_1 on e_shops_1.e_shops_id = r_e_shops_e_files_1.r_e_shops_e_files_e_shops_id
      left outer join e_files as e_files_1 on r_e_shops_e_files_1.r_e_shops_e_files_e_files_id = e_files_1.e_files_id
      left outer join r_e_shops_e_categories as r_e_shops_e_categories_1 on e_shops_1.e_shops_id = r_e_shops_e_categories_1.r_e_shops_e_categories_e_shops_id
      left outer join e_categories as e_categories_1 on r_e_shops_e_categories_1.r_e_shops_e_categories_e_categories_id = e_categories_1.e_categories_id
      left outer join e_delivery_routes as e_delivery_routes_1 on e_shops_1.e_shops_id = e_delivery_routes_1.e_delivery_routes_e_shops_id
      join (
         select e_shops_2.e_shops_id, e_categories_2.e_categories_name, e_files_2.e_files_path
         from e_shops as e_shops_2
         left outer join r_e_shops_e_files as r_e_shops_e_files_2 on e_shops_2.e_shops_id = r_e_shops_e_files_2.r_e_shops_e_files_e_shops_id
         left outer join e_files as e_files_2 on r_e_shops_e_files_2.r_e_shops_e_files_e_files_id = e_files_2.e_files_id
         left outer join r_e_shops_e_categories as r_e_shops_e_categories_2 on e_shops_2.e_shops_id = r_e_shops_e_categories_2.r_e_shops_e_categories_e_shops_id
         left outer join e_categories as e_categories_2 on r_e_shops_e_categories_2.r_e_shops_e_categories_e_categories_id = e_categories_2.e_categories_id
         where ((r_e_shops_e_files_2.r_e_shops_e_files_main_picture =1 and r_e_shops_e_files_2.r_e_shops_e_files_visible =1) or r_e_shops_e_files_2.r_e_shops_e_files_e_files_id is null)
         and r_e_shops_e_categories_2.r_e_shops_e_categories_main_category =1
         and r_e_shops_e_categories_2.r_e_shops_e_categories_visible =1
         and e_shops_2.e_shops_visible = 1) as e_shops_2 on e_shops_1.e_shops_id = e_shops_2.e_shops_id';
   }
   
   private function lista_categorie_richieste($categorie_richieste_da_checkbox)
   {
      $stringa_da_restituire = '';
      $conteggio_residui = count($categorie_richieste_da_checkbox);
      foreach ($categorie_richieste_da_checkbox as $categoria)
      {
         $conteggio_residui--;   
         if($conteggio_residui>0)
            $stringa_da_restituire = $stringa_da_restituire . $categoria . ', ';
         else if ($conteggio_residui==0)
            $stringa_da_restituire = $stringa_da_restituire . $categoria;   
      }
      
      return $stringa_da_restituire;
   }
   
   private function stringa_domicilio_asporto ($domicilio, $asporto)
   {
      if($domicilio == 0 && $asporto == 0)
      {
         return '';
      }
      
      if($domicilio == 1 && $asporto == 0)
      {
         return 'e_shops_home_delivery = ' . $domicilio . ' and ';
      }
      
      if($domicilio == 0 && $asporto == 1)
      {
         return 'e_shops_take_away = ' . $asporto . ' and ';
      }
      
      if($domicilio == 1 && $asporto == 1)
      {
         return '(e_shops_home_delivery = ' . $domicilio . ' or e_shops_take_away = ' . $asporto . ') and ';
      }
   }

}