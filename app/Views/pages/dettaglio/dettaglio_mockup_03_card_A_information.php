		                
		                	<div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
		                        <div class="card-header" role="tab" id="heading-A">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
		                                    Informazioni
		                                </a>
		                            </h5>
		                        </div>
		                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
		                        <div class="card-body info_content">
		                            	<p><?php echo(nl2br($dati_e_shops_specifico->e_shops_description_long)) ?></p>
		                            	<div class="add_bottom_25"></div>
		                               <!-- <h2>Galleria Foto</h2>
		                                <div class="pictures magnific-gallery clearfix">
                                          <?php 
                                             /*mi faccio dare quanti elementi ci sono nell'array*/
                                             $conteggio = count($dati_e_shops_pictures);
                                             $conteggio_iniziale = $conteggio;
                                             foreach ($dati_e_shops_pictures as $picture)
                                             {
                                                /*decremento $conteggio di 1*/
                                                $conteggio--;
                                                
                                                /*verifico se $conteggio è zero, cioè se sono nell'ultimo elemento dell'array*/
                                                if($conteggio==0 && $conteggio_iniziale!=1)
                                                {
                                                   echo '<figure><a href="'. base_url() . $picture->e_files_path . '" title="' .$picture->e_files_description . '" data-effect="mfp-zoom-in"><span class="d-flex align-items-center justify-content-center">+'.$conteggio_iniziale.'</span><img style="min-height:100%; background-fit:cover; object-fit:cover;" src="img/thumb_detail_placeholder.jpg" data-src="'. base_url() . $picture->e_files_path . '" class="lazy" alt=""></a></figure>';
                                                }
                                                else
                                                {
                                                   echo '<figure><a href="'. base_url() . $picture->e_files_path . '" title="' .$picture->e_files_description . '"  data-effect="mfp-zoom-in"><img  style="min-height:100%; background-fit:cover; object-fit:cover;" src="img/thumb_detail_placeholder.jpg" data-src="'. base_url() . $picture->e_files_path . '"class="lazy" alt=""></a></figure>';
                                                }
                                             }
                                          ?>
		                                </div>
                                      -->
		                                <!-- /pictures -->
		                               
		                                <div class="other_info">
		                                <h2>Informazioni su <?php echo $dati_e_shops_specifico->e_shops_name ?></h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		<h3>Indirizzo</h3>
		                                		<p><?php echo $dati_e_shops_specifico->e_shops_address ?><br><a href="https://www.google.com/maps/dir//<?php echo $shops_lat . '+' . $shops_long; ?>" target="blank"><br><strong>Indicazioni stradali</strong></a></p>
		                                		<strong>Seguici</strong><br>
		                                		<p class="follow_us_detail">
                                             <?php 
                                                foreach($social_networks as $social_network)
                                                {
                                                   echo '<a href="' . $social_network->e_social_network_profiles_value . '" target="blank"><i class="' . $social_network->e_files_path . '"></i></a>';
                                                }
                                             
                                             ?>
                                             <!--<a href="#0"><i class="social_facebook_square"></i></a>
                                             <a href="#0"><i class="social_instagram_square"></i></a>
                                             <a href="#0"><i class="social_twitter_square"></i></a>-->
                                          </p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Orari di apertura</h3>
                                          <p><span class="loc_closed">Sezione in costruzione</span></p>
                                          <h3>Orari di consegna a domicilio</h3>
                                          <p><span class="loc_closed">Sezione in costruzione</span></p>
		                                		<!--
                                          <p><strong>Lunch</strong><br> Mon. to Sat. 11.00am - 3.00pm<p>
		                                		<p><strong>Dinner</strong><br> Mon. to Sat. 6.00pm- 1.00am</p>
                                          -->
		                                		<!--<p><span class="loc_closed">Sunday Closed</span></p>-->
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Dove consegnamo?</h3>
      
      <?php
      /*NOTA: Dovrebbe essere indentato con <h3>Dove consegnamo?</h3>, ma per questioni di leggibilità gli diamo un'indentazione diversa...*/
      /*se non c'è nessuna delivery route*/
      if(count($delivery_routes)==0)
      {
         echo '<p>Mi dispiace, non effettuiamo consegne a domicilio. Vienici a trovare presso la <a href="https://www.google.com/maps/dir//' . $shops_lat . '+' . $shops_long . '" target="blank"><br><strong>nostra sede</strong></a>.</p>';
      }
      else
      {
         echo
         '
            <div class="row">
               <div class= "col-md-8">
                  <p><strong>Comune</strong></p>
               </div>
               <div class= "col-md-4">
                  <p><strong>Costo</strong></p>
               </div>
            </div>
         ';
         foreach($delivery_routes as $delivery_route)
         {
            echo
            '
               <div class="row">
                  <div class= "col-md-8">
                     <p>' . $delivery_route->e_cities_description . '</p>
                  </div>
                  <div class= "col-md-4">
                     <p>' . $delivery_route->e_delivery_routes_price . ' €</p>
                  </div>
               </div>
            ';
         }
      }
      ?>
		                                		<!--<p><strong>Credit Cards</strong><br> Mastercard, Visa, Amex</p>
		                                		<p><strong>Other</strong><br> Wifi, Parking, Wheelchair Accessible</p>-->
		                                	</div>
		                                </div>
		                                <!-- /row -->
		                            	</div>
		                            </div>
		                        </div>   
		                    </div>
		                    <!-- /tab -->