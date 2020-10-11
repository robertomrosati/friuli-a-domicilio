           
				<div class="col-lg-9 col-md-8 col-sm-8">
					<div id="results_list" class="row">
                  <?php
                     foreach ($dati_e_shops as $negozio)
                     {
                        /*vado a vedere se fa per asporto o take away sì o no e di conseguenza coloro l'icona*/
                        if($negozio->e_shops_home_delivery)
                        {
                           $a_domicilio = 'yes';
                        }
                        else
                        {
                           $a_domicilio = 'no';
                        }

                        if($negozio->e_shops_take_away)
                        {
                           $per_asporto = 'yes';
                        }
                        else
                        {
                           $per_asporto = 'no';
                        }                                   
                        
                        echo '
   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
      <div class="strip">
          <figure>
            <!--<span class="ribbon off">-30%</span>-->
              <img src="img/lazy-placeholder.png" data-src="'. base_url() . $negozio->e_files_path . '" class="img-fluid lazy" alt="">
              <a href="' . base_url() . '/dettaglio/negozio/' . $negozio->e_shops_id . '" class="strip_info">
                  <small>' . $negozio->e_categories_name. '</small>
                  <div class="item_title">
                      <h3>' . $negozio->e_shops_name . '</h3>
                      <small>' . $negozio->e_shops_address . '</small>
                  </div>
              </a>
          </figure>
          <ul>
              <li><span class="deliv ' . $a_domicilio . '">domicilio</span><span class="take ' . $per_asporto . '">asporto</span></li>
              <li>
               <div class="score"><strong>' . $negozio->distanza . ' km</strong></div>
              </li>
          </ul>
      </div>
   </div>
   <!-- /strip grid -->';
                     }
                  ?>
               </div>
					<!-- /row -->
					<div class="pagination_fg">
					  <a href="#">&laquo;</a>
					  <a href="#" class="active">1</a>
					  <a href="#">2</a>
					  <a href="#">3</a>
					  <a href="#">4</a>
					  <a href="#">5</a>
					  <a href="#">&raquo;</a>
					</div>
				</div>
				<!-- /col -->
			</div>		
		</div>
		<!-- /container -->
