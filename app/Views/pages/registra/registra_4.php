<!-- CONTENT -->

		<div class="hero_single inner_pages background-image" data-background="url(<?php echo base_url();?>/pictures/Bandiere_dal_Friul.svg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<?php          
                     /*stampo quello che ho messo in "mail_sent_ok" in flashdata dal controller che richiama questa vista, se metto $session->getFlashdata(), allora mi ritorna qualunque flashdata*/
                     if($_SESSION['mail_sent_ok']!='')
                     {
                        echo "<h1>".$_SESSION['mail_sent_ok']."</h1>";
                     }
                     else
                     {
                        echo 
                        "<h1>Fase 2?</h1>
                        <!--<p>Noi ci siamo. E tu?</p>-->
                        <p>Non sentirti solo, c'è Friuli a Domicilio con te.</p>";
                     }                        
                     ?>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_60_40">			
			<div class="main_title center">
				<span><em></em></span>
				<h2>Perché Friuli a Domicilio?</h2>
				<p>O sin furlans. Siamo sul territorio e lavoriamo con il territorio.</p>
			</div>

			<div class="row justify-content-center align-items-center add_bottom_15">
					<div class="col-lg-5">
						<div class="box_about">
							<h3>Fai sapere che ci sei</h3>
							<p class="lead">e che spedisci a domicilio, o permetti il ritiro in negozio.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="<?php echo base_url();?>/template/html/img/arrow_about.png" alt="" class="arrow_1">
						</div>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="<?php echo base_url();?>/template/html/img/about_3.svg" alt="" class="img-fluid" width="250" height="250">
					</div>
				</div>
				<!-- /row -->
				<div class="row justify-content-center align-items-center add_bottom_15">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="<?php echo base_url();?>/template/html/img/about_2.svg" alt="" class="img-fluid" width="250" height="250">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h3>Comunica facilmente</h3>
							<p class="lead">Ricevi comunicazioni automatiche dai tuoi clienti.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="<?php echo base_url();?>/template/html/img/arrow_about.png" alt="" class="arrow_2">
						</div>
					</div>
				</div>
				<!-- /row -->
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5">
						<div class="box_about">
							<h3>Raggiungi nuovi clienti</h3>
							<p class="lead">È dalle crisi che nascono le opportunità.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
						</div>

					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="<?php echo base_url();?>/template/html/img/about_1.svg" alt="" class="img-fluid" width="250" height="250">
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_40">			
			<div class="main_title center">
				<span><em></em></span>
				<h2>Le nostre offerte</h2>
				<p>Quanto costa Friuli a Domicilio?</p>
			</div>
				 <div class="row plans">
                <div class="plan col-md-4">
                	<div class="plan-title">
	                    <h3>Prova Gratuita</h3>
	                    <p>Provaci gratuitamente, senza impegno.</p>
                	</div>
                    <p class="plan-price">Gratis</p>
                    <ul class="plan-features">
                        <!--<li><strong>Check and go</strong> included</li>-->
                        <li><strong>1 mese</strong> di validità</li>
                        <li><strong>Nessun</strong> impegno</li>
                    </ul>
                    <a href="#submit" class="btn_1 gray btn_scroll">Submit</a>
                </div> <!-- End col-md-4 -->
                
                <div class="plan plan-tall col-md-4">
                	<div class="plan-title">
	                    <h3>Abbonamento mensile</h3>
	                    <p>Solamente dopo la prova gratuita.</p>
                	</div>
                    <p class="plan-price">12€</p>
                    <ul class="plan-features">
                        <li>Assistenza <strong>Premium</strong></li>
                        <!--<li><strong>Check and go</strong> included</li>-->
                        <!--<li><strong>APP</strong> included</li>-->
                        <li>Rinnova<strong> mensilmente</strong></li>
                        <li><strong>Annulla</strong> quando vuoi</li>
                    </ul>
                    <a href="#submit" class="btn_1 btn_scroll">Submit</a>
                </div><!-- End col-md-4 -->
                
                <div class="plan col-md-4">
                   <div class="plan-title">
	                    <h3>Abbonamento annuale</h3>
	                    <p>Risparmia sottoscrivendo per un anno</p>
                	</div>
                    <p class="plan-price">99€</p>
                    <ul class="plan-features">
                        <li>Assistenza <strong>Premium</strong></li>
                        <!--<li><strong>Check and go</strong> included</li> -->
                        <li><strong>12 mesi</strong> di validità</li>
                        <li><strong>Offerte speciali</strong> dedicate</li>
                    </ul>
                    <a href="#submit" class="btn_1 gray btn_scroll">Submit</a>
                </div><!-- End col-md-4 -->
            </div><!-- End row plans-->
		</div>
		<!-- /container -->
   
