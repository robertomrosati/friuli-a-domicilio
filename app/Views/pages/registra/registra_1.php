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
                        <p>Friuli a Domicilio è al tuo fianco. #tuttoandràbene</p>";
                     }                        
                     ?>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->