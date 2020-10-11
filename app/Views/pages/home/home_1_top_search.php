<?php 
/* IMPOSTO DATI DI SESSIONE PER SALVARE LE COORDINATE E PASSARLE AL CONTROLLER DI RICERCA */
   /*di default le coordinate sono quelle di Udine, poi dovranno essere modificate con quelle ricevute dall'API Google*/
   $_SESSION['coordinate_luogo']='46.0619 13.2378';
?>
		
      
      
      <!--<div class="hero_single version_2">">-->
			<div class="hero_single version_2 background-image" data-background="url(<?php echo base_url(); ?>/pictures/home/castello2.jpg)">
         <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-10 col-lg-12 col-md-8">
							<!--<h1>Discover &amp; Book</h1>-->
                     <div class = "row">
                        <div class="col-xl-2 col-lg-2 col-md-2"></div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                           <img width="80%" title="Logo" class ="center" alt="Visit friuliadomicilio.it official website!" src="<?php echo base_url(); ?>/pictures/loghi/logo_fad_bianco.svg">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2"></div>
                     </div>
                     <p><strong>Negozi</strong> e <strong>ristoranti</strong> in Friuli che servono <strong>a domicilio</strong> o <strong>per asporto</strong></p>
							<div class ="row">
                        <!--<form method="post" action="<?php echo base_url(); ?>/ricerca">-->
                        <div class="col-lg-2"></div> 
                        <div class="col-lg-8">
                           <?php echo form_open('ricerca/ricerca_home', 'id="form_home_1_top_search"'); /*apro il form*/?>
                              <div class="row no-gutters custom-search-input">
                                 <div class="col-lg-8">
                                    <div class="form-group">
                                       <!--<input class="form-control" type="text" id="autocomplete" placeholder="Indirizzo...">-->
                                       <?php echo form_input($autocomplete); ?>
                                       <?php echo form_input($autocomplete_hidden); ?>
                                       <!-- questi due campi anche sono hidden dalla versione 0.0.17, li lascio per via dei requisiti di ricerca-->
                                       <?php echo form_input($cosa_stai_cercando); ?>
                                       <?php echo form_dropdown($lista_categorie); ?>
                                       <i class="icon_pin_alt"></i>
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <input type="submit" value="Cerca">
                                 </div>
                              </div>
                              <!-- /row -->
                           </form>
                        </div>
                        <div class="col-lg-2"></div> 
                     </div>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>

    <!-- /hero_single -->
    <!-- Autocomplete QUESTA PARTE è INTEGRATA IN closure.php  
    <script>
    function initMap() {
	  var input = document.getElementById('autocomplete');
	  var autocomplete = new google.maps.places.Autocomplete(input);
	 
	  autocomplete.addListener('place_changed', function() {
	    var place = autocomplete.getPlace();
	    if (!place.geometry) {
	      window.alert("Autocomplete's returned place contains no geometry");
	      return;
	    }

	    var address = '';
	    if (place.address_components) {
	      address = [
	        (place.address_components[0] && place.address_components[0].short_name || ''),
	        (place.address_components[1] && place.address_components[1].short_name || ''),
	        (place.address_components[2] && place.address_components[2].short_name || '')
	      ].join(' ');
	    } 
	  });
	}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap"></script>
    
    -->
    
    
