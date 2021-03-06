<!DOCTYPE html>
<html>
    <head>
        <meta name="" charset="utf8" content="">
        <title><?php if(is_front_page()){ echo "wshbr.de - Serien- und Filmeindex"; } else { wp_title(); } ?></title>
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" type="image/png" />
        <?php wp_head(); ?>
        <!-- Matomo -->
        <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//analytics.blaumedia.com/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '2']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
        </script>
        <!-- End Matomo Code -->
    </head>
   
        
<div id="fixed">         
       <div id="nav-wrap" class="wrap-top nav-wrap">
           <div class="width">
                <img class="menu-logo-sm" src="https://wshbr.de/wp-content/uploads/2017/01/mainlogo.png" scale="0" style="height: 100%;margin: 0 auto;">
                <ul class="clearfix">
                    <li><a href="/"><i class="fa fa-home"></i></a></li>
                    <li><a href="/category/news">News</a><span>Alle</span></li>
                    <li><a href="/category/serien-news">Serien</a><span>News</span></li>
                    <li><a href="/category/filme-news">Filme</a><span>News</span></li>
					<li><a href="/category/gaming-news">Gaming</a><span>News</span></li>
                    <li><a href="/category/review">Reviews</a><span>Alle</span></li>
                    <li><a href="/category/serien-reviews">Serien</a><span>Reviews</span></li>
                    <li><a href="/category/filme-reviews">Filme</a><span>Reviews</span></li>
					<li><a href="/category/gaming-reviews">Gaming</a><span>Reviews</span></li>
                </ul>
                <i class="fa fa-reorder fa-2x menu-mob toggle-mobile-menu" id="menu-mob"></i>
                
            </div>
        </div>
    </div>
    <body <?php body_class(); ?>>
        <div class="mainbg"></div>
        <div id="wrapper" style="text-align: center;">
            <div class="head_socials">
                <figure><i class="fab fa-facebook"></i><a href="https://www.facebook.com/wshbrde"></a></figure>
                <figure><i class="fab fa-twitter"></i><a href="https://www.twitter.com/wshbrde"></a></figure>
                <figure><i class="fab fa-instagram"></i><a href="https://www.instagram.com/wshbrde/"></a></figure>
            </div>
            <a href="/">
                <!-- <div class="logo">
                </div> -->
                <img src="https://wshbr.de/wp-content/themes/wshbr-wordpress-theme/img/_logo.png" alt="" style="margin-top: 15px;margin-bottom: 5px;">
            </a>
            
        </div>
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
            }else{
                echo '<div style="width:100%;height:5px;background:#06b48f;"></div>';
            }
        ?>
            <div class="container">
        <div class="row">
        <?php if ( !( is_page('1854') ) && !( is_page('1861') ) && !( is_page('1867') ) && !( is_page('1865') ) ) { 
            echo '<div class="col-lg-9 col-md-9 col-xs-12" style="border-right: 1px solid #eee;">';
        } else {
            echo '<div class="col-lg-12 col-md-12 col-xs-12">';
        }
            