<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html  <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta charset="UTF-8">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" />
<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
 <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--header -->
<div id="header-wrap">
    <div id="header">

	<a name="top"></a>
       
        <h1 id="logo-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title=""><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /></a></h1>
	<div  id="nav">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>

   <p id="rss">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>/feed">Grab the RSS feed</a>
   </p>

   <?php get_search_form(); ?>

<!--/header-->
</div>
</div>

    
