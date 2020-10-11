

		<div class="page_header" id="barra_in_alto_ricerca">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-12 col-lg-12 col-md-12">
		    			<div class="breadcrumbs">
                     <ul>
                         <li><a href="<?php echo base_url(); ?>/home">Home</a></li>
                         <li><a href="<?php echo base_url(); ?>/ricerca">Ricerca</a></li>
                         <li>
                              <?php
                                 if($dati_form['autocomplete']=='')
                                    echo 'Udine, UD, Italia';
                                 else
                                    echo $dati_form['autocomplete'];
                              ?>
                         </li>
                     </ul>
                  </div>
		        		<!--<h1 style="color:red">Questa è una pagina di anteprima, il sito è in fase di implementazione</h1>-->
                  <h1>
                  <?php
                     if(count($dati_e_shops)==1)
                        echo count($dati_e_shops) . ' attività trovata';
                     else
                        echo count($dati_e_shops) . ' attività trovate';
                  ?>
                  entro <?php echo $dati_form['filtri_distanza'];?> km di distanza da 
                  <?php
                     if($dati_form['autocomplete']=='')
                        echo 'Udine, UD, Italia';
                     else
                        echo $dati_form['autocomplete'];
                  ?>
                  </h1>
                  Utilizza i filtri disponibili nella pagina e clicca sul tasto "Cerca" per modificare i criteri di ricerca.
		    		</div>
		    		<div class="col-xl-0 col-lg-0 col-md-0">
		    			<!--<div class="search_bar_list">
                     <!-- qua ci metto lo stesso form che c'è sull'homepage, è un workouround perché bisognerebbe usare il filtro a lato -->
							<!--<input type="text" class="form-control" placeholder="Cerca di nuovo...">
							<input type="submit" value="Cerca">
						</div>-->
		    		</div>
		    	</div>
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->
      
      
      