		       <div class="col-lg-4" id="sidebar_fixed">
               <div class="box_booking">
                   <div class="head">
                       <h3>Contatta <?php echo $dati_e_shops_specifico->e_shops_name ?></h3>
                       <!--<div class="offer">Up to -40% off</div>-->
                   </div>
                   <!-- /head -->
                   <div class="main">
                     <?php echo form_open('dettaglio/invia_form/' . $dati_e_shops_specifico->e_shops_id); /*apro il form*/?>
                           <!--<form method="post" action="assets/register.php" id="register"> -->
                              <h6>Dati Personali</h6>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <?php echo form_input($form_shop['nome']); ?>
                                       <!--<input type="text" class="form-control" placeholder="Name and Last Name" name="name_register" id="name_register"> -->
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <div class="row add_bottom_15">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <?php echo form_input($form_shop['mail_address']); ?><!--<input type="email" class="form-control" placeholder="Email Address" name="email_register" id="email_register">-->
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <div class="row add_bottom_15">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <?php echo form_input($form_shop['telefono']); ?>
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <h6>Il tuo messaggio per noi</h6>
                              <div class="row add_bottom_25">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php echo form_textarea($form_shop['messaggio']); ?>
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <h6>Non sono un robot</h6>
                              <div class="row add_bottom_25">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <?php echo form_input($form_shop['verifica_not_a_robot']); ?>
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <div class="row add_bottom_25">
                                 <div class="col-lg-12">
                                    <div class="checkbox">
                                       <label><small><?php echo form_checkbox($form_shop['privacy_checkbox']); ?>Cliccando su "Invia" autorizzo Friuli a Domicilio al salvataggio delle informazioni fornite e all'inoltro delle stesse a "<?php echo $dati_e_shops_specifico->e_shops_name; ?>", nel rispetto di quanto indicato nella <a target="_blank" href="<?php echo base_url()?>/privacy">Privacy Policy</a>.</small></label>
                                       <!--<label><input type="checkbox"> Remember me</label>-->
                                    </div>
                                 </div>
                              </div>
                              <!-- /row -->
                              <div class="form-group text-center"><?php echo form_submit($form_shop['submit']);  /*creo il pulsante per il login */ ?>
                              <!--<input type="submit" class="btn_1" value="Submit" id="submit-register">--></div>
                           </form>
                     </div>
                 </div>
              </div>
            
		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!-- /main -->