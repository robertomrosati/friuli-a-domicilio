   <!--dato che dopo l’header e prima del footer tutto sta dentro i tag <main> e </main>, mettiamo questi tag alla fine di header.php e all’inizio di footer.php, per rendere quanto mai modulare il resto.
   -->
   
   
	</main>
	<!-- /main -->
   
   <!--aproi il footer-->
   <footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Link rapidi</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<!--<li><a href="about.html">About us</a></li>
							<li><a href="help.html">Add your restaurant</a></li>
							<li><a href="help.html">Help</a></li>
							<li><a href="account.html">My account</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contacts.html">Contacts</a></li> -->
                     <li><a href="<?php echo base_url()?>/home">Home</a><li>
                     <li><a href="<?php echo base_url()?>/ricerca">Cerca</a></li>
                     <li><a href="<?php echo base_url()?>/contatti">Contattaci</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Privacy</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
                     <!--
							<li><a href="listing-grid-1-full.html">Top Categories</a></li>
							<li><a href="listing-grid-2-full.html">Best Rated</a></li>
							<li><a href="listing-grid-1-full.html">Best Price</a></li>
							<li><a href="listing-grid-3.html">Latest Submissions</a></li>
                     -->
                     <li><a href="<?php echo base_url()?>/privacy" target="_blank">Privacy Policies</a><li>
                     <li><a href="<?php echo base_url()?>/privacy/cookies" target="_blank">Cookies Policies</a><li>
                     <li><a href="<?php echo base_url()?>/privacy/gdpr" target="_blank">GDPR</a><li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contatti</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="icon_house_alt"></i>33019 Tricesimo (UD), Italia</li>
							<!--<li><i class="icon_mobile"></i>+39 340 8650799<br>(anche Whatsapp)</li>-->
							<li><i class="icon_mail_alt"></i><a href="#0">info@friuliadomicilio.it</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<!--<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
							<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
								</div>
							</form>
						</div>
                  -->
						<div class="follow_us">
							<h3>SEGUICI</h3>
							<ul>
								<!--<li><a href="#0" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo base_url();?>/template/html/img/twitter_icon.svg" alt="" class="lazy"></a></li>-->
								<li><a href="https://www.facebook.com/friuliadomicilio/" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo base_url();?>/template/html/img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<!--<li><a href="#0" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo base_url();?>/template/html/img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo base_url();?>/template/html/img/youtube_icon.svg" alt="" class="lazy"></a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="Italian" selected>Italiano</option>
									<option value="Furlan">Furlan</option>
									<!--<option value="English">English</option>
									<option value="Deutsch">Deutsch</option>-->
								</select>
							</div>
						</li>
						<!--<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
                  
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo base_url();?>/template/html/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                  -->
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<!--
                  <li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
                  -->
						<li><span>&copy; <?= date('Y') ?> Roberto Maria Rosati</span></li>
                  <li><span>P.IVA 01234456790</span></li>
                  <li><span>Released under GNU General Public License v3.0.</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
   
 <!-- 
-->