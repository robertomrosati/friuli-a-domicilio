<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
	<title><?php echo $title; ?> - Friuli a Domicilio</title>
   
   <link href="<?php echo base_url();?>/template/html/css/custom.css" rel="preload" as="style">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Friuli a Domicilio">
   <meta name="author" content="Roberto Maria Rosati">
   <!--<title>Foogra - Discover & Book the best restaurants at the best price</title>-->

   <!-- Favicons-->
   <link rel="shortcut icon" href="<?php echo base_url();?>/pictures/favicons/favicons_bianco_sfondo_trasp.ico" type="image/x-icon">
   <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url();?>/pictures/favicons/favicons_blu_bianco-57x57.png">
   <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url();?>/pictures/favicons/favicons_blu_bianco-72x72.png">
   <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url();?>/pictures/favicons/favicons_blu_bianco-114x114.png">
   <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url();?>/pictures/favicons/favicons_blu_bianco-144x144.png">
   
   <!-- Open Graph / Facebook -->
   <meta property="og:type" content="website">
   <meta property="og:url" content="https://friuliadomicilio.it">
   <meta property="og:title" content="Friuli a Domicilio">
   <meta property="og:description" content="Negozi e ristoranti in Friuli che servono a domicilio o per asporto.">
   <meta property="og:image" content="<?php echo base_url();?>/pictures/facebook/copertina.jpg">
   <!--<meta property="fb:admins" content="friuli.adomicilio.73"/>-->

   <!-- Twitter -->
   <meta property="twitter:card" content="summary_large_image">
   <meta property="twitter:url" content="https://friuliadomicilio.it">
   <meta property="twitter:title" content="Friuli a Domicilio">
   <meta property="twitter:description" content="Negozi e ristoranti in Friuli che servono a domicilio o per asporto.">
   <meta property="twitter:image" content="<?php echo base_url();?>/pictures/facebook/copertina.jpg">

   <!-- GOOGLE WEB FONT -->
   <link  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

   <!-- BASE CSS -->
   <link href="<?php echo base_url();?>/template/html/css/bootstrap_customized.min.css" rel="stylesheet">
   <!--<link href="<?php echo base_url();?>/template/html/css/style.css" rel="stylesheet preload"> -->
   
   <!-- YOUR CUSTOM CSS -->
   <link href="<?php echo base_url();?>/template/html/css/custom.css" rel="stylesheet">
   

   <!-- SPECIFIC CSS -->
   <!-- QUESTO DIPENDE SEMPRE DALLA PAGINA CHE STO CARICANDO, PER CUI DEVO CREARLO A SECONDA DEL DATO RICEVUTO IN INPUT IN $DATA
   SAREBBE MEGLIO FARLO CON UN CICLO CHE LEGGA TUTTI I CUSTOM CSS FINCHE' CE NE SONO
   -->
   
   <?php 
   foreach ($array_specific_css as $specific_css)
   {
      echo '<link href="'.base_url().'/template/html/css/'.$specific_css.'.css" rel="stylesheet">';
   }
   
   ?>

   <!-- FROM CUSTOM CODEIGNITER-->
   <meta name="description" content="Negozi e ristoranti in Friuli che servono a domicilio o per asporto">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>/picture/favicons/favicons_azzurro_pieno_su_sfondo_trasp.ico"/>

</head>

  