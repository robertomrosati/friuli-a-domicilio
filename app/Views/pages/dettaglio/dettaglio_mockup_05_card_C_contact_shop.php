  <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
      <div class="card-header" role="tab" id="heading-C">
          <h5>
              <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                  Contatti
              </a>
          </h5>
      </div>
      <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
          <div class="card-body reviews">
              <!--<div class="row add_bottom_45 d-flex align-items-center">
                  
              </div>-->
              
              <div id="reviews">
                  <div class="review_card">
                     <div class="row">
                        <div class="bg_gray">
                            <div class="container margin_60_40">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4">
                                        <div class="box_contacts">
                                            <!--<i class="icon_mail_alt"></i>-->
                                            <h2><i class="icon_mail_alt"></i> Email</h2>
                                            <div><p><a href="mailto:<?php echo $dati_e_shops_specifico->e_shops_email; ?>" target="blank"><?php echo $dati_e_shops_specifico->e_shops_email;?></a><br><br></p></div>
                                            <!--<small>MON to FRI 9am-6pm SAT 9am-2pm</small>-->
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box_contacts">
                                            <h2><i class="social_share"></i> Social</i></h2>
                                            <!-- per ogni social network posseduto dal ristorante, salvo solo quelli che sono Facebook -->
                                            <div>
                                            <?php 
                                            foreach($social_networks as $social_network)
                                            {
                                               echo '<i class="' . $social_network->e_files_path . '"></i> <a href="' . $social_network->e_social_network_profiles_value . '" target="blank">'. $social_network->t_social_network_types_name. '</a><br>';
                                            }
                                            
                                            ?>
                                            <br>
                                            </div>
                                             <!--
                                             <div><a href="https://www.facebook.com/friuliadomicilio/" target="_blank">@friuliadomicilio</a></div>-->
                                            <!--<small>MON to FRI 9am-6pm SAT 9am-2pm</small>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="box_contacts">
                                           
                                            <h2><i class="icon_pin_alt"></i> Telefono</h2>
                                            <div>
                                               <p>Clicca qui per visualizzare il numero di telefono:<br>
                                               <!-- rivedere come fare questo a popup con js -->
                                               <!-- Trigger/Open The Modal -->
                                               <button id="myBtn">Visualizza</button>
                                               <br><br>
                                               </p>
                                            </div>
                                            <!--<small>MON to FRI 9am-6pm SAT 9am-2pm</small>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /container -->
                        </div>
                     </div>
                  </div>
              </div>
              
              <!--<div class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></div>-->
          </div>
      </div>
  </div>
  
<!-- POPUP TELEFONO -->
   <!-- ATTENZIONE: il CSS è su modal-roberto.css nella cartella public\foogra_v.1.2\html\css\modal-roberto.css, ed è stato incluso dal controller Dettaglio -->
   
   <!-- ATTENZIONE: il codice JAVASCRIPT è su modal-roberto.js nella cartella public\foogra_v.1.2\html\js\modal-roberto.js, ed è stato incluso dal controller Dettaglio -->
   
   <!-- The Modal -->
   <div id="myModal" class="modal-roberto">
   <!-- Modal content -->
        <div class="modal-roberto-content">
          <span class="close-roberto">&times;</span>
          <p>
          <?php echo $dati_e_shops_specifico->e_shops_telephone_number;?><br>
          <?php echo $dati_e_shops_specifico->e_shops_telephone_number_2;?>
          </p>
      </div>
   </div>
<!-- /POPUP TELEFONO -->



		                