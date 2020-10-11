<?php 
   $data['tipo_header'] = 'scomparsa';
   
   /*specific css*/
   $array_specific_css[0] = "error";
   $data['array_specific_css'] = $array_specific_css;


   /*specific js¨*/
   $array_specific_js = array();
   $data['array_specific_js'] = $array_specific_js;
   
   $data['title'] = ucfirst("404 Page Not Found");

   echo view("templates/include", $data);
   echo view("templates/header");
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>

	<style>
	div.logo {
		height: 200px;
		width: 155px;
		display: inline-block;
		opacity: 0.08;
		position: absolute;
		top: 2rem;
		left: 50%;
		margin-left: -73px;
	}
	body {
		height: 100%;
		background: #fafafa;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		color: #777;
		font-weight: 300;
	}
	h1 {
		font-weight: lighter;
		letter-spacing: 0.8;
		font-size: 3rem;
		margin-top: 0;
		margin-bottom: 0;
		color: #222;
	}
	.wrap {
		max-width: 1024px;
		margin: 5rem auto;
		padding: 2rem;
		background: #fff;
		text-align: center;
		border: 1px solid #efefef;
		border-radius: 0.5rem;
		position: relative;
	}
	pre {
		white-space: normal;
		margin-top: 1.5rem;
	}
	code {
		background: #fafafa;
		border: 1px solid #efefef;
		padding: 0.5rem 1rem;
		border-radius: 5px;
		display: block;
	}
	p {
		margin-top: 1.5rem;
	}
	.footer {
		margin-top: 2rem;
		border-top: 1px solid #efefef;
		padding: 1em 2em 0 2em;
		font-size: 85%;
		color: #999;
	}
	a:active,
	a:link,
	a:visited {
		color: #dd4814;
	}
</style>
</head>

<body>
-->
		<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<figure><img src="<?php echo base_url()?>/template/html/img/404.svg" alt="" class="img-fluid"></figure>
						<p>Ci dispiace, ma la pagina che stavi cercando non esiste.</p>
						<form>
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="Che cosa ti serve?">
								<input type="submit" value="Search">
							</div>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error -->		

<!--
</body>
</html>
-->

<?php 
   echo view("templates/footer");
   echo view("templates/closure");
?>
