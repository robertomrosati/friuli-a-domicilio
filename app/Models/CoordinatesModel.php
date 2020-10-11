<?php namespace App\Models;

use CodeIgniter\Model;

class CoordinatesModel extends Model
{
   function get_latitute_e_shops($e_shop_id)
   {
      //$ShopsModel = model('ShopsModel');
      /*restituisco il valore zero se non esiste il negozio*/
      if(!model('ShopsModel')->esiste_negozio($e_shop_id))
      {
         return 0;
      }
      
      $db = db_connect();
      $query = $db->query('
   select st_x(e_shops_coordinates) as latitude
   from e_shops
   where e_shops_id = ' . $e_shop_id . '
   and e_shops_visible = 1 ;');
      //$risultato -> $query->getRow();
      return $query->getRow()->latitude;
   }
   
   function get_longitude_e_shops($e_shop_id)
   {
      
      /*restituisco il valore zero se non esiste il negozio*/
      if(!model('ShopsModel')->esiste_negozio($e_shop_id))
      {
         return 0;
      }
      
      
      $db = db_connect();
      $query = $db->query('
   select st_y(e_shops_coordinates) as longitude
   from e_shops
   where e_shops_id = ' . $e_shop_id . '
   and e_shops_visible = 1;');
      return $query->getRow()->longitude;
   }

}