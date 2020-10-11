

		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		    			<div class="breadcrumbs">
				            <ul>
				                <li><a href="#">Home</a></li>
				                <li><a href="#">Cerca</a></li>
				                <li>Tricesimo</li>
				            </ul>
		       	 		</div>
		        		<!--<h1 style="color:red">Questa è una pagina di anteprima, il sito è in fase di implementazione</h1>-->
                  <h1>41 attività trovate a Tricesimo</h1>
		    		</div>
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<!--<input type="text" class="form-control" placeholder="Cerca di nuovo...">
							<input type="submit" value="Cerca">-->
                     <h1 style="color:red">Attenzione: questa è solamente una pagina di anteprima, e i dati sono fittizi e non navigabili. Il sito è in fase di implementazione. <a href="<?php echo base_url(); ?>/contatti#form_contatti">Contattaci</a> per avere maggiori informazioni.</h1>
						</div>
		    		</div>
		    	</div>
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->
		<div class="container margin_30_40">			
			<div class="row">
				<aside class="col-lg-3" id="sidebar_fixed">
					<div class="clearfix">
					<div class="sort_select">
							<select name="sort" id="sort">
                                <option value="proximity" selected="selected">Ordina per vicinanza</option>
                                <option value="popularity">Ordina per popolarità</option>
                                <option value="rating">I più recenti prima</option>
                                <!--<option value="rating">Ordina per i più recenti</option>-->
                                <!--<option value="date">Sort by newness</option>
                                <option value="price">Sort by Price: low to high</option>
                                <option value="price-desc">Sort by Price: high to low</option>-->
							</select>
						</div>
						<a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filtra</span></a>
					</div>
					<div class="filter_col">
						<div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
						<div class="filter_type">
							<h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorie</a></h4>
							<div class="collapse show" id="filter_1">
								<ul>
								    <li>
								        <label class="container_check">Ristoranti <small>12</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Farmacie <small>3</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Pizzerie <small>7</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
                            <li>
								        <label class="container_check">Ristoranti etnici <small>6</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Panifici e pasticcerie <small>5</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Commercio al dettaglio <small>3</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Ortofrutta <small>6</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Aziende vinicole <small>5</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
                            <li>
								        <label class="container_check">Servizi professionali <small>5</small>
								            <input type="checkbox">
								            <span class="checkmark"></span>
								        </label>
								    </li>
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
								<div class="add_bottom_15"><input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal"></div>
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
						</div>
						<div class="buttons">
							<a href="#0" class="btn_1 full-width">Filtra</a>
						</div>
					</div>
				</aside>

				<div class="col-lg-9">
					<div class="row">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-30%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/pizza_700x604.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Pizzeria</small>
							            <div class="item_title">
							                <h3>Pizze Da Bepi Vuaine</h3>
							                <small>Via delle Rose Rosse, 16, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.2 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-40%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/io_gran_monte.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Servizi professionali</small>
							            <div class="item_title">
							                <h3>Sviluppo Applicazioni Web CodeIgniter e Wordpress.</h3>
							                <small>Roberto Maria Rosati, Online, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take no">Per asporto</span> <span class="deliv no">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.3 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
                  <!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-30%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/burrito_640.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Ristorante Etnico</small>
							            <div class="item_title">
							                <h3>Los Tacos Locos</h3>
							                <small>Piazza Concezione, 1, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							         <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.6 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-25%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/pharmacy_3-560x480.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Farmacia</small>
							            <div class="item_title">
							                <h3>La Farmacia della Bettina</h3>
							                <small>Via del Campo, 48, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							         <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.8 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/burger_640.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Ristorante Etnico</small>
							            <div class="item_title">
							                <h3>La Rusticheria del West</h3>
							                <small>Via del Pistolero, 34, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							       <li><span class="take yes">Per asporto</span> <span class="deliv no">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.9 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/pizza-romana_640x425.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Pizzeria</small>
							            <div class="item_title">
							                <h3>Il Vecchio Trombone Arruggito</h3>
							                <small>Via della Musica Dimenticata, 2, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							         <li><span class="take no">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>1.2 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-40%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/fruit2-640.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Ortofrutta</small>
							            <div class="item_title">
							                <h3>La Casa del Cetriolo di Mario</h3>
							                <small>Via del Giglio Colorato, 11, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take no">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.3 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/pharmacy_4.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Farmacia</small>
							            <div class="item_title">
							                <h3>Il Rimedio di Giovanna</h3>
							                <small>Via d'Onorio, 57, Reana del Rojale</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv no">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>2.1 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<!-- /strip grid -->
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-30%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/pizza-oven_640.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Ristorante Etnico</small>
							            <div class="item_title">
							                <h3>L'Antica Extremadura</h3>
							                <small>Piazza Re Carlo, 6, Tarcento </small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>1.7 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
                  <!-- /strip grid -->
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<!--<span class="ribbon off">-40%</span>-->
							        <img src="img/lazy-placeholder.png" data-src="<?php echo base_url();?>/pictures/categories/wine_1-900.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Azienda Vinicola</small>
							            <div class="item_title">
							                <h3>Vini Del Collio Tresesin</h3>
							                <small>Via dell'Uva Bianca, 44, Tricesimo</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take no">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>0.3 km</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
                  <!-- /strip grid -->
						<!--
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="img/location_9.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Mexican</small>
							            <div class="item_title">
							                <h3>El Paso Tacos</h3>
							                <small>27 Old Gloucester St</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
                  -->
						<!-- /strip grid -->
						<!--
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="img/location_10.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Bakery</small>
							            <div class="item_title">
							                <h3>Monnalisa</h3>
							                <small>27 Old Gloucester St</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						-->
                  <!-- /strip grid -->
						<!--
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="img/location_11.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Mexican</small>
							            <div class="item_title">
							                <h3>Guachamole</h3>
							                <small>135 Newtownards Road</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take yes">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						-->
                  <!-- /strip grid -->
						<!--
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="img/lazy-placeholder.png" data-src="img/location_12.jpg" class="img-fluid lazy" alt="">
							        <a href="<?php echo base_url()?>/contatti" class="strip_info">
							            <small>Chinese</small>
							            <div class="item_title">
							                <h3>Pechino Express</h3>
							                <small>27 Old Gloucester St</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							        <li><span class="take no">Per asporto</span> <span class="deliv yes">A domicilio</span></li>
							        <li>
							        	<div class="score"><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
                  -->
						<!-- /strip grid -->
					
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
      
      <!-- SPECIFIC SCRIPTS -->
<script src="js/sticky_sidebar.min.js"></script>
<script src="js/specific_listing.js"></script>