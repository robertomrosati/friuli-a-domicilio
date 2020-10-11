	<div class="container margin_60_40">
			<div class="main_title">
				<span><em></em></span>
				<h2>Da non perdere</h2>
				<p>Negozi, ristoranti e attività popolari nei tuoi dintorni.</p>
				<a href="<?php echo base_url()?>/ricerca">Vedi tutti</a>
			</div>
 <!-- nota: dopo un'analisi con compare_it, emerge che si può fare copia e incolla di tutto quanto è dentro "strip" dalla pagina della ricerca-->
			<div class="owl-carousel owl-theme carousel_4">
         <?php
            foreach ($da_non_perdere as $negozio) 
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
               <div class="item">
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
                          <li><span class="deliv ' . $a_domicilio . '">A domicilio</span><span class="take ' . $per_asporto . '">Per asporto</span></li>
                          <li>
                           <div class="score"><strong><!--in futuro qui potremo mettere la distanza dalla posizione del browser--></strong></div>
                          </li>
                      </ul>
                  </div>
               </div>
               <!-- /strip grid -->';
            }
         ?>
         </div>
			<!-- /carousel -->