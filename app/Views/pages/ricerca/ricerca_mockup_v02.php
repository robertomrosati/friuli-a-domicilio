

		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
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
                  entro 30 km di distanza da 
                  <?php
                     if($dati_form['autocomplete']=='')
                        echo 'Udine, UD, Italia';
                     else
                        echo $dati_form['autocomplete'];
                  ?>
                  </h1>
		    		</div>
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Cerca di nuovo...">
							<input type="submit" value="Cerca">
                     <!--<h1 style="color:red">Attenzione: questa è solamente una pagina di anteprima, e i dati sono fittizi e non navigabili. Il sito è in fase di implementazione. <a href="<?php echo base_url(); ?>/contatti#form_contatti">Contattaci</a> per avere maggiori informazioni.</h1>-->
						</div>
		    		</div>
		    	</div>
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->
      <div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- /Map -->
      
      
		<div class="container margin_30_40">			
			<div class="row">
				<aside class="col-lg-3" id="sidebar_fixed">
					<div class="clearfix">
               <!-- mappa -->
               <a class="btn_map d-flex align-items-center justify-content-center" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" ><span class="btn_map_txt" data-text-swap="Nascondi Mappa" data-text-original="Vedi Mappa">Vedi Mappa</span></a>
               <!-- /Mappa -->
               <!-- NOTA: per adesso nascondo l'ordinamento perché non posso ancora implementarlo nella query-->
					<!--<div class="sort_select">
							<select name="sort" id="sort">
                                <option value="proximity" selected="selected">Ordina per vicinanza</option>
                                <option value="popularity">Ordina per popolarità</option>
                                <option value="rating">I più recenti prima</option>
                                <!--<option value="rating">Ordina per i più recenti</option>-->
                                <!--<option value="date">Sort by newness</option>
                                <option value="price">Sort by Price: low to high</option>
                                <option value="price-desc">Sort by Price: high to low</option>
							<!--</select>
						</div>-->
						<a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filtra</span></a>
					</div>
					<div class="filter_col">
						<div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
						<div class="filter_type">
							<h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorie</a></h4>
							<div class="collapse show" id="filter_1">
								<ul>
                           <?php
                              foreach ($dati_e_categories as $categoria)
                              {
                                 echo '<li>
                                         <label class="container_check">'.  $categoria->e_categories_name .' <small>' . $categoria->count . '</small>
                                             <input type="checkbox">
                                             <span class="checkmark"></span>
                                         </label>
                                       </li>
                                       ';
                              }
                           ?> 
								</ul>
							</div> 
							<!-- /filter_type -->
						</div>
						<!-- /filter_type /*commentiamo il discorso della valutazione che era nel template, non molto adatta secondo me, facciamo invece il discorso del filtro per asporto o domicilio*/
						<div class="filter_type">
							<h4><a href="#filter_2" data-toggle="collapse" class="closed">Valutazione</a></h4>
							<div class="collapse" id="filter_2">
								<ul>
								    <li>
								        <label class="container_check">Eccellente 9+ <small>11</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Molto buono 8+ <small>26</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Buono 7+ <small>3</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Sufficiente 6+ <small>1</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								</ul>
							</div>
						</div>
                  -->
                  <!-- /filter_type -->
                  <div class="filter_type">
							<h4><a href="#filter_2" data-toggle="collapse" class="closed">Domicilio o asporto</a></h4>
							<div class="collapse" id="filter_2">
								<ul>
								    <li>
								        <label class="container_check">Domicilio <small>26</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Asporto <small>35</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								</ul>
							</div>
						</div>
						<!-- /filter_type -->
						<div class="filter_type">
							<h4><a href="#filter_3" data-toggle="collapse" class="closed">Distanza</a></h4>
							<div class="collapse" id="filter_3">
                                <div class="distance"> Chilometri dalla posizione scelta <span></span> km</div>
								<div class="add_bottom_15"><input type="range" min="1" max="100" step="1" value="30" data-orientation="horizontal"></div>
							</div>
						</div>
						<!-- /filter_type -->
						<!-- /*per adesso togliamo anche il prezzo, mettiamo piuttosto il giorno di apertura */
                  <div class="filter_type">
							<h4><a href="#filter_4" data-toggle="collapse" class="closed">Prezzo</a></h4>
							<div class="collapse" id="filter_4">
								<ul>
										<li>
											<label class="container_check">$0 — $50<small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$50 — $100<small>08</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$100 — $150<small>05</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$150 — $200<small>18</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
							</div>
						</div> -->
						<!-- /filter_type -->
                 <!-- NON ESSENDOCI ANCORA IL CALENDARIO, TOGLIAMO PER ORA ANCHE IL GIORNO DI SPEDIZIONE -->
                 <!--
                 <div class="filter_type">
							<h4><a href="#filter_4" data-toggle="collapse" class="closed">Giorni di apertura</a></h4>
							<div class="collapse" id="filter_4">
								<ul>
										<li>
											<label class="container_check">lunedì<small>26</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">martedì<small>35</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">mercoledì<small>34</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">giovedì<small>37</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
                              <li>
											<label class="container_check">venerdì<small>41</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
                              <li>
											<label class="container_check">sabato<small>16</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
                              <li>
											<label class="container_check">domenica<small>3</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
							</div>
						</div>-->
						<div class="buttons">
							<a href="#0" class="btn_1 full-width">Filtra</a>
						</div>
					</div>
				</aside>
            
				<div class="col-lg-9">
					<div class="row">
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
