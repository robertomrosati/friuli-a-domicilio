
               
               <!-- requisiti per i filtri: -->
               <!-- 1 - categorie e conteggio di shops per categoria -->
               <!-- 2 - conteggio di shops per domicilio e asporto -->
               <!-- 3 - comune di spedizione -->
               <!-- 4 - distanza -->
					<div class="filter_col">
               <form> <!--apro il form-->
						<div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
						
                  <!-- 1 FILTRO: CONTENUTO -->
                  <div class="filter_type">
							<h4><a href="#filter_1" data-toggle="collapse" class="closed">Nome</a></h4>
							<div class="collapse" id="filter_1">
								<ul>
                              <?php echo form_input($cosa_stai_cercando); ?>
								</ul>
							</div> 
							<!-- /filter_type -->
						</div>
						<!-- /filter_type -->
                  
                  <!-- 2 FILTRO: INDIRIZZO -->
                  <div class="filter_type">
							<h4><a href="#filter_2" data-toggle="collapse" class="opened">Indirizzo</a></h4>
							<div class="collapse show" id="filter_2">
								<ul>
                              <?php echo form_input($autocomplete); ?>
                              <?php echo form_input($autocomplete_hidden); ?>
								</ul>
							</div> 
							<!-- /filter_type -->
						</div>
						<!-- /filter_type -->
                  
                  <div class="filter_type">
							<h4><a href="#filter_3" data-toggle="collapse" class="closed">Categorie</a></h4>
							<div class="collapse" id="filter_3">
								<ul>
                           <?php
                              foreach ($dati_e_categories as $categoria)
                              {
                                 echo '<li>
                                         <label class="container_check">'.  $categoria->e_categories_name .' <small>' . $categoria->count . '</small>' . form_checkbox($array_checkboxs_categorie[$categoria->e_categories_id]) .   '<span class="checkmark" id="checkmark_' . $categoria->e_categories_id . '" name="checkmark_' . $categoria->e_categories_id . '"></span>
                                         </label>
                                       </li>
                                       ';
                              }
                           ?> 
								</ul>
							</div> 
							<!-- /filter_type -->
						</div>
						<!-- /filter_type -->
						
                  <div class="filter_type">
							<h4><a href="#filter_4" data-toggle="collapse" class="closed">Domicilio o asporto</a></h4>
							<div class="collapse" id="filter_4">
								<ul>
								    <li>
								        <label class="container_check">Domicilio <small><!--26--></small>
								            <?php echo form_checkbox($filtri_checkbox_domicilio) ?>
								            <span class="checkmark" name="checkmark_domicilio" id="checkmark_domicilio"></span>
								        </label>
								    </li>
								    <li>
								        <label class="container_check">Asporto <small><!--35--></small>
                                    <?php echo form_checkbox($filtri_checkbox_asporto) ?>
								            <input type="checkbox" id="filtri_checkbox_asporto">
								            <span class="checkmark" name="checkmark_asporto" id="checkmark_asporto"></span>
								        </label>
								    </li>
								</ul>
							</div>
						</div>
						<!-- /filter_type -->
						<div class="filter_type">
							<h4><a href="#filter_5" data-toggle="collapse" class="opened">Distanza</a></h4>
							<div class="collapse show" id="filter_5">
                                <div class="distance"> Chilometri dalla posizione scelta <span></span> km</div>
								<div class="add_bottom_15">
                           <!--<input type="range" id="filtri_distanza" min="1" max="100" step="1" value="30" data-orientation="horizontal">-->
                           <?php echo form_input($filtri_distanza); ?>
                        </div>
							</div>
						</div>
						<!-- /filter_type -->
                 <!-- NON ESSENDOCI ANCORA IL CALENDARIO, TOGLIAMO PER ORA ANCHE IL GIORNO DI SPEDIZIONE, A LUNGO ANDARE CI DOVRà ESSERE -->
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
                     <!-- metto l'hidden che contiene il base_url per poterlo passare alla parte javascript -->
                     <?php echo form_input($baseurl_hidden); ?>
                     <!-- tasto che invia il form -->
                     <div id="submit_filtri" class="btn_1 full-width" value="Cerca">Cerca</div>
							<!--<a href="<?php echo base_url();?>/ricerca/ricerca_ricerca" class="btn_1 full-width">Filtra</a>-->
						</div>
					</div>
				</aside>
            