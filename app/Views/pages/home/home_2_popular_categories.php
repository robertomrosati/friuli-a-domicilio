		<div class="bg_gray">
			<div class="container margin_60_40">
				<div class="main_title center">
					<span><em></em></span>
					<h2>Categorie Popolari</h2>
					<p>Le categorie più richieste su Friuli a Domicilio</p>
				</div>
				<!-- /main_title -->
            <!-- nota: l'algoritmo fatto bene dovrebbe estrarre le categorie più rappresentate e mostrare quelle -->
				<div class="row small-gutters categories_grid">
					<div class="col-sm-12 col-md-6">
						<a href="<?php echo base_url()?>/ricerca">
							<img style='object-fit:cover; background-fit:cover; min-height:100%; min-width:100%' src="<?php echo base_url();?>/template/html/img/img_cat_home_placeholder.png" data-src="<?php echo base_url() . $dati_e_categories[0]->e_files_path; ?>" alt="" class="img-fluid lazy">
							<div class="wrapper">
								<h2><?php echo $dati_e_categories[0]->e_categories_name;?></h2>
								<p><?php echo $dati_e_categories[0]->counting;?> locali</p>
							</div>
						</a>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="row small-gutters">
							<div class="col-sm-6">
								<a href="<?php echo base_url()?>/ricerca">
									<img style='object-fit:cover; background-fit:cover; min-height:100%; min-width:100%' src="<?php echo base_url();?>/template/html/img/img_cat_home_placeholder.png" data-src="<?php echo base_url() . $dati_e_categories[1]->e_files_path; ?>"" alt="" class="img-fluid lazy">
									<div class="wrapper">
										<h2><?php echo $dati_e_categories[1]->e_categories_name;?></h2>
                              <p><?php echo $dati_e_categories[1]->counting;?> locali</p>
									</div>
								</a>
							</div>
							<div class="col-sm-6">
								<a href="<?php echo base_url()?>/ricerca">
									<img style='object-fit:cover; background-fit:cover; min-height:100%; min-width:100%' src="<?php echo base_url();?>/template/html/img/img_cat_home_placeholder.png" data-src="<?php echo base_url() . $dati_e_categories[2]->e_files_path; ?>" alt="" class="img-fluid lazy">
									<div class="wrapper">
										<h2><?php echo $dati_e_categories[2]->e_categories_name;?></h2>
                              <p><?php echo $dati_e_categories[2]->counting;?> locali</p>
									</div>
								</a>
							</div>
							<div class="col-sm-12 margin">
								<a href="<?php echo base_url()?>/ricerca">
									<img style='object-fit:cover; background-fit:cover; min-height:100%; min-width:100%' src="<?php echo base_url();?>/template/html/img/img_cat_home_placeholder.png" data-src="<?php echo base_url() . $dati_e_categories[3]->e_files_path; ?>" alt="" class="img-fluid lazy">
									<div class="wrapper">
										<h2><?php echo $dati_e_categories[3]->e_categories_name;?></h2>
                              <p><?php echo $dati_e_categories[3]->counting;?> locali</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--/categories_grid-->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		