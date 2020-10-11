	<div class="hero_in detail_page background-image" data-background="url(<?php echo base_url() . $dati_e_shops_specifico->e_files_path; ?>)">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">

				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<!--<div class="head"><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></div>-->
								<h1>
                           <?php 
                              if($_SESSION['mail_sent_ok']!='')
                              {
                                 echo $_SESSION['mail_sent_ok'] . '<br>';
                              }
                              else
                              {
                                 echo $dati_e_shops_specifico->e_shops_name;
                              }
                           ?>
                        </h1>
                        <!-- a fianco al titolo offro il link a Google Maps tramite le coordinate del negozio -->
								<?php echo $dati_e_shops_specifico->e_shops_address ?> - <a href="https://www.google.com/maps/dir//<?php echo $shops_lat . '+' . $shops_long; ?>" target="blank">Indicazioni stradali</a>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
                              <?php 
                                 $prima_foto = 1;
                                 foreach ($dati_e_shops_pictures as $picture)
                                 {
                                    if ($prima_foto)
                                    {
                                       echo '<a href="'. base_url() . $picture->e_files_path . '" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>Vedi Foto</a>';
                                       $prima_foto = 0;
                                    }
                                    else
                                    {
                                       echo '<a href="'. base_url() . $picture->e_files_path . '" title="Photo title" data-effect="mfp-zoom-in"></a>';
                                    }
                                 }
                              ?>
                           
										<!--<a href="img/detail_1.jpg" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										<a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>-->
									</span>
									<!-- Per adesso commentiamo questa Wishlist -->
                           <!--
                           <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a>
                           -->
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
		<!--/hero_in-->