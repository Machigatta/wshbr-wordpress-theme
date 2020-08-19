<!DOCTYPE html>
<html>
    <head>
        <meta name="" charset="utf8" content="">
        <title><?php if(is_front_page()){ wp_title("&raquo;"); } else { wp_title(); } ?></title>
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" type="image/png" />
        <?php wp_head(); ?>
    </head>
   
        
<div id="fixed">         
       <div id="nav-wrap" class="wrap-top nav-wrap">
           <div class="width">
                <img class="menu-logo-sm" src="https://wshbr.de/wp-content/uploads/2017/01/mainlogo.png" scale="0" style="height: 100%;margin: 0 auto;">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                <i class="fas fa-bars fa-2x menu-mob toggle-mobile-menu" id="menu-mob"></i>
                
            </div>
        </div>
    </div>
    <body <?php body_class(); ?>>
        <div class="mainbg"></div>
        <div id="banner-wrapper"></div>
        <!-- <div id="wrapper" style="text-align: center;">
            <div class="head_socials">
                <figure><i class="fab fa-twitter"></i><a href="https://www.twitter.com/wshbr13"></a></figure>
                <figure><i class="fab fa-instagram"></i><a href="https://www.instagram.com/jspr13/"></a></figure>
            </div>
            
            
        </div> -->
    <div>        
    <?php 
        //wp_nav_menu(array('theme_location'=>'primary', 'container_id' => 'cssmenu', 'walker' => new CSS_Menu_Walker())); 
    ?>
        
    </div>
    <!-- <div id="submenu">
        <a href="/filme-index">Entdecke Filme</a>
        <a href="/serien-index">Entdecke Serien</a>
    </div> -->
    <div id="highlight_master_wrapper">
        <?php
            if(is_front_page() ){
                if (function_exists('wfs_show')) { wfs_show(); }
            }
        ?>
            <div class="container">
        <div class="row">
        <?php if ( !is_single() ) { 
            echo '<div class="col-lg-9 col-md-9 col-xs-12" style="border-right: 1px solid #eee;">';
        } else {
            echo '<div class="col-lg-12 col-md-12 col-xs-12">';
        }
            