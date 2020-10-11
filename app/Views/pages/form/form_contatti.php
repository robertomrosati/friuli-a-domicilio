   <a name="form_contatti"></a>
		<div class="bg_gray pattern" id="submit">
			<div class="container margin_60_40">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="text-center add_bottom_15">
							<h4>Contattaci</h4>
							<p>Manda la tua richiesta, e verrai ricontattato via mail.</p>
						</div>
						<div id="message-register"></div>
							<?php echo form_open($controller_name.'/invia_form'); /*apro il form*/?>
                     <!--<form method="post" action="assets/register.php" id="register"> -->
								<h6>Dati Personali</h6>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
                                 <?php echo form_input($nome_cognome); ?>
											<!--<input type="text" class="form-control" placeholder="Name and Last Name" name="name_register" id="name_register"> -->
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row add_bottom_15">
									<div class="col-lg-12">
										<div class="form-group">
											<?php echo form_input($mail_address); ?><!--<input type="email" class="form-control" placeholder="Email Address" name="email_register" id="email_register">-->
										</div>
									</div>
								</div>
                        <!-- /row -->
								<div class="row add_bottom_15">
									<div class="col-lg-12">
										<div class="form-group">
											<?php echo form_input($telefono); ?>
										</div>
									</div>
								</div>
                        <!-- /row -->
								<h6>Ci scrivi perché....</h6>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?php echo form_dropdown($tipo_richiedente); ?>
                                 <!--<input type="text" class="form-control" placeholder="Restaurant Name" name="restaurantname_register" id="restaurantname_register">-->
										</div>
									</div>
								</div>
								<!-- /row -->
								<h6>Dati Attività</h6>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?php echo form_input($nome_negozio); ?>
                                 <!--<input type="text" class="form-control" placeholder="Restaurant Name" name="restaurantname_register" id="restaurantname_register">-->
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row add_bottom_15">
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="country_register" id="country_register">
												<option value="">Provincia</option>
												<option value="Udine">Udine</option>
												<option value="Pordenone">Pordenone</option>
												<option value="Gorizia">Gorizia</option>
                                    <option value="Trieste">Trieste</option>
											</select>
										</div>
									</div>
                           <div class="col-md-6">
										<div class="form-group">
											<?php echo form_input($comune_negozio); ?>
                                 <!--<input type="text" class="form-control" placeholder="City" name="city_register" id="city_register">-->
										</div>
									</div>
								</div>
                        <!-- /row -->
								<h6>Il tuo messaggio per noi</h6>
								<div class="row add_bottom_25">
									<div class="col-lg-12">
										<div class="form-group">
											 <?php echo form_textarea($messaggio); ?>
										</div>
									</div>
								</div>
								<!-- /row -->
								<h6>Non sono un robot</h6>
								<div class="row add_bottom_25">
									<div class="col-lg-12">
										<div class="form-group">
											<?php echo form_input($verifica_not_a_robot); ?>
										</div>
									</div>
								</div>
								<!-- /row -->
                        <div class="row add_bottom_25">
									<div class="col-lg-12">
										<div class="checkbox">
											<label><small><?php echo form_checkbox($privacy_checkbox); ?>Cliccando su "Invia" autorizzo Friuli a Domicilio al salvataggio delle informazioni fornite, a ricontattarmi all'indirizzo mail oppure al numero di telefono fornito e ne accetto la <a target="_blank" href="<?php echo base_url()?>/privacy">Privacy Policy</a>.</small></label>
                                 <!--<label><input type="checkbox"> Remember me</label>-->
										</div>
									</div>
								</div>
                        <!-- /row -->
								<div class="form-group text-center"><?php echo form_submit($submit);  /*creo il pulsante per il login */ ?>
                        <!--<input type="submit" class="btn_1" value="Submit" id="submit-register">--></div>
							</form>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
   
   <!-- mettiamo ora qui una parte di script custom che permetta di aggiornare le liste dei comuni in base alla provincia selezionata, DA SISTEMARE PRESA COSÌ COM'È DA AMICO SEGRETO -->
   <script>
   $(document).ready(function()
   {
         $('#select_country_nascita').change(function()
         {
            console.log("ho fatto il catch di $('#select_country_nascita').change(function()"); 
            var countryID = $("#select_country_nascita").val();
            if(countryID)
            {
               console.log("CountryID = " + countryID); 
               $.ajax
               ({
                  type:'POST',
                  url:'nuovoGruppo/aggiorna_liste_select',
                  data:'country_id='+countryID,
                  success:function(html)
                  {
                     console.log("sono nel success"); 
                     $('#select_region_nascita').show();
                     $('#select_region_nascita').html(html); 
                     
                  }
               }); 
            }
            else
            {
               $('#select_region_nascita').hide();
               $('#select_city_nascita').hide();
            }
         });
          
          
         $('#select_region_nascita').change(function()
         {
            console.log("ho fatto il catch di $('#select_region_nascita').change(function()"); 
            var regionID = $(this).val();
            if(regionID)
            {
               $.ajax
               ({
                  type:'POST',
                  url:'nuovoGruppo/aggiorna_liste_select',
                  data:'region_id='+regionID,
                  success:function(html)
                  {
                     $('#select_city_nascita').show();
                     $('#select_city_nascita').html(html);
                  }
               }); 
            }
            else
            {
               $('#select_city_nascita').hide();
            }
         });
         
         $('#select_country_residenza').change(function()
         {
            console.log("ho fatto il catch di $('#select_country_residenza').change(function()"); 
            var countryID = $("#select_country_residenza").val();
            if(countryID)
            {
               console.log("CountryID = " + countryID); 
               $.ajax
               ({
                  type:'POST',
                  url:'nuovoGruppo/aggiorna_liste_select',
                  data:'country_id='+countryID,
                  success:function(html)
                  {
                     console.log("sono nel success"); 
                     $('#select_region_residenza').show();
                     $('#select_region_residenza').html(html); 
                     
                  }
               }); 
            }
            else
            {
               $('#select_region_residenza').hide();
               $('#select_city_residenza').hide();
            }
         });
          
          
         $('#select_region_residenza').change(function()
         {
            console.log("ho fatto il catch di $('#select_region_residenza').change(function()"); 
            var regionID = $(this).val();
            if(regionID)
            {
               $.ajax
               ({
                  type:'POST',
                  url:'nuovoGruppo/aggiorna_liste_select',
                  data:'region_id='+regionID,
                  success:function(html)
                  {
                     $('#select_city_residenza').show();
                     $('#select_city_residenza').html(html);
                  }
               }); 
            }
            else
            {
               $('#select_city_residenza').hide();
            }
         });
         
         /*adesso devo controllare il giorno di nascita*/
         $('#select_mese_nascita').change(function()
         {
            
            var mese = $('#select_mese_nascita').val();
            /*nota: un'alternativa all'if è usare una switch*/
            /*mesi con 31 gg*/
            console.log("ho fatto il catch di $('#select_mese_nascita').change(function(), mese = " + mese);
            var contenuto_select = "";
            contenuto_select += '<option value=""></option>\n';
             
            if(mese == 1 || mese == 3 || mese == 5 || mese == 7 || mese == 8 || mese == 10 || mese == 12)
            {
               for(i = 0; i<31; i++)
               {
                 contenuto_select +='<option value=' +parseInt(i+1) + '>'+parseInt(i+1)+'</option>\n'
               }
               
            }
            
            /*mesi con 30 gg*/
            if(mese == 4 || mese == 6 || mese == 9 || mese == 11)
            {
               for(i = 0; i<30; i++)
               {
                 contenuto_select +='<option value=' +parseInt(i+1) + '>'+parseInt(i+1)+'</option>\n'
               }
            }
              
            /*mesi con 1 gg*/
            if(mese == 2)
            {
               for(i = 0; i<28; i++)
               {
                 contenuto_select +='<option value=' +parseInt(i+1) + '>'+parseInt(i+1)+'</option>\n'
               }
            }
            $('#select_giorno_nascita').html(contenuto_select);
         });
   });
   </script>