<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php wp_title(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php bloginfo('template_url'); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php bloginfo('template_url'); ?>/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
  </head>

  <body>
    <nav class="navbar navbar-main">
      <div class="container">

	   <span style="  color: #fff;  float: left;
    padding: 13px;
    color: #fff;"><a style="color: #fff;margin-right:20px;" href="http://growoffshore.com/rafflesrelo/personal-relocation/">Personal Relocation</a>    <a style="color: #fff;margin-right:20px;" href="http://growoffshore.com/rafflesrelo/corporate-relocation/">Corporate Relocation</a>    <a style="color: #fff;margin-right:20px;" href="http://growoffshore.com/rafflesrelo/storage/">Storage</a></span>
       <span style="    float: right;
    padding: 13px;
    color: #fff;">
    <img src="<?php bloginfo('template_url'); ?>/assets/phone.png"> <a href="tel:1800 686 6860" style="color:#fff;">1800 686 6860</a> &nbsp;&nbsp;&nbsp;
    <img src="<?php bloginfo('template_url'); ?>/assets/phone.png"> <a href="tel:+65 6894 3720" style="color:#fff;">+65 6894 3720</a> &nbsp;&nbsp;&nbsp;
    <img src="<?php bloginfo('template_url'); ?>/assets/mail.png"> <a href="mailto:cs@rafflesrelo.com" style="color:#fff;">cs@rafflesrelo.com</a></span>

      </div>
    </nav>
	  <nav class="navbar navbar-main-menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/mainsite/logo-main.png" /></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav home-menu">
												<?php wp_nav_menu(array('menu'=>'Main Menu', 'container'=>'', 'items_wrap'=>'%3$s'));?>
										</ul>
        </div><!--/.nav-collapse -->


      </div>
    </nav>
