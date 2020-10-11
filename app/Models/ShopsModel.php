<?php namespace App\Models;

use CodeIgniter\Model;

class ShopsModel extends Model
{
   
   function get_e_categories_with_counts()
   {
      /* dammi la lista di tutte le categorie*/
      $db = db_connect();
      $query = $db->query('
                        select e_categories.*, count(*) as count
                        from e_categories
                        left outer join r_e_shops_e_categories on e_categories_id = r_e_shops_e_categories_e_categories_id
                        where e_categories_visible = 1
                        and r_e_shops_e_categories_visible = 1
                        group by (e_categories_id);');
      return $query->getResultObject();
   }
   
   function get_e_categories_with_pictures()
   {
      /* dammi la lista di tutte le categorie*/
      $db = db_connect();
      $query = $db->query('
                        select * from e_categories
                        left outer join e_files on e_categories_e_files_id = e_files_id
                        where e_categories_visible = 1;');
      return $query->getResult();
   }
   
   function get_e_categories_with_pictures_with_counts_order_by_count_desc()
   {
      /* dammi la lista di tutte le categorie*/
      $db = db_connect();
      $query = $db->query('
            select e_categories_id, e_categories_code, e_categories_name, e_files_path, count(e_categories_code) as counting from e_categories
            left outer join r_e_shops_e_categories on e_categories_id = r_e_shops_e_categories_e_categories_id
            left join e_files on e_categories_e_files_id = e_files_id
            group by e_categories_code
            order by count(e_categories_code) desc;');
      return $query->getResult();
   }
   
   function get_e_shops()
   {
      /*dammi la lista di tutti i negozi*/
      $db = db_connect();
      $query = $db->query('
                        select * from e_shops
                        where e_shops_visible = 1;');
      return $query->getResult();
   }
   
   function get_e_shops_with_main_pictures()
   {
      /*ottengo tutti i negozi con le corrispettive foto principali. Un negozio senza foto viene escluso?*/
      $db = db_connect();
      $query = $db->query('
         select * 
         from e_shops
         left outer join r_e_shops_e_files on e_shops_id = r_e_shops_e_files_e_shops_id
         left outer join e_files on r_e_shops_e_files_e_files_id = e_files_id
         where r_e_shops_e_files_main_picture =1
         and r_e_shops_e_files_visible =1
         and e_shops_visible = 1;');
      return $query->getResult();
   }
   
   function get_e_shops_with_main_pictures_and_main_categories()
   {
      /*ottengo tutti i negozi con le corrispettive foto principali e categoria principale*/
      $db = db_connect();
      $query = $db->query('
   select * 
   from e_shops
   left outer join r_e_shops_e_files on e_shops_id = r_e_shops_e_files_e_shops_id
   left outer join e_files on r_e_shops_e_files_e_files_id = e_files_id
   left outer join r_e_shops_e_categories on e_shops_id = r_e_shops_e_categories_e_shops_id
   left outer join e_categories on r_e_shops_e_categories_e_categories_id = e_categories_id
   where r_e_shops_e_files_main_picture =1
   and r_e_shops_e_files_visible =1
   and r_e_shops_e_categories_main_category =1
   and r_e_shops_e_categories_visible =1
   and e_shops_visible = 1;');
      return $query->getResult();
   }

   
   function get_specific_shop_from_e_shops_with_main_pictures_and_main_categories($id_negozio)
   {
      /*ottengo uno specifico negozio secondo il nome passatomi nella funzione*/
      $db = db_connect();
      $query = $db->query('
   select * 
   from e_shops
   left join r_e_shops_e_files on e_shops_id = r_e_shops_e_files_e_shops_id
   join e_files on r_e_shops_e_files_e_files_id = e_files_id
   join r_e_shops_e_categories on e_shops_id = r_e_shops_e_categories_e_shops_id
   join e_categories on r_e_shops_e_categories_e_categories_id = e_categories_id
   where e_shops_id = '.$id_negozio.'
   and r_e_shops_e_files_main_picture = 1
   and r_e_shops_e_files_visible = 1
   and r_e_shops_e_categories_main_category = 1
   and r_e_shops_e_categories_visible = 1
   and e_shops_visible = 1;');
      /*l'abbiamo risolto usando "getRow" yeahhh*/
      return $query->getRow();
   }
   
   
   
   function get_pictures_for_shop($e_shop_id)
   {
      /*ottengo tutte le foto di un negozio*/
      $db = db_connect();
      
      $query = $db->query('select *
      from e_files join r_e_shops_e_files on r_e_shops_e_files_e_files_id=e_files_id
      where r_e_shops_e_files_e_shops_id = ' . $e_shop_id . '
      and r_e_shops_e_files_visible =1
      and e_files_visible =1;');
      return $query->getResult();
   }
   
   function get_main_picture_for_shop($e_shop_id)
   {
      /*ottengo solo la foto principale di un negozio*/
      $db = db_connect();
      
      /*è come get_pictures_for_shop, ma c'è l'aggiunta di
              "and r_e_shops_e_files_main_picture = 1"
      */
      
      $query = $db->query(
      'select e_files_path
      from e_files join r_e_shops_e_files on r_e_shops_e_files_e_files_id=e_files_id
      where r_e_shops_e_files_e_shops_id = ' . $e_shop_id . '
      and r_e_shops_e_files_main_picture = 1
      and r_e_shops_e_files_visible =1
      and e_files_visible =1;');
      return $query->getResult();
   }
   
   function esiste_negozio($e_shop_id)
   {
      $db = db_connect(); 
      $query = $db->query(
      'select count(*) as conteggio
      from e_shops
      where e_shops_id = ' . $e_shop_id . '
      and e_shops_visible = 1;');
      $risultati = $query->getResultObject();
      if($risultati['0']->conteggio >0)
      {
         return 1;
      }
      return 0;
   }
   
   function get_social_networks_for_shop($e_shop_id)
   {
      $db = db_connect(); 
      $query = $db->query('
      select * from e_social_network_profiles
      join t_social_network_types on e_social_network_profiles_t_social_network_types_id = t_social_network_types_id
      join e_files on t_social_network_types_e_files_id = e_files_id
      where e_social_network_profiles_e_shops_id = ' . $e_shop_id . '
      and e_social_network_profiles_visible = 1;');
      return $query->getResultObject();
   }
   
   function get_delivery_routes_for_shop($e_shop_id)
   {
      $db = db_connect(); 
      $query = $db->query('
      select * from e_delivery_routes
      join e_cities on e_delivery_routes_e_cities_id = e_cities_id
      where e_delivery_routes_e_shops_id = ' . $e_shop_id . '
      and e_delivery_routes_visible = 1;');
      return $query->getResultObject();
   }
   
   
   
   
   /****************************************************************************/
   /***ricerche da fare ********************************************************/
   /***dammi tutti i negozi                                                  ***/
   /***dammi tutti i negozi ordinati per distanza da me                      ***/
   /***dammi tutti i negozi con i filtri di ricerca                          ***/
   /***dammi tutti i negozi con i filtri di ricerca e ordinamento specifico  ***/
   /****************************************************************************/
   
}