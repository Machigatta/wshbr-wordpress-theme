﻿            </div>
            <?php if ( !is_single() ) { ?>
            <div id="sidebar" class="col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
            <?php } ?>
            
        </div>

        
        <?php wp_footer(); ?>
        <?php if ( !( is_page('1854') ) && !( is_page('1861') ) && !( is_page('1867') ) && !( is_page('1865') ) && false ) { ?>
        <div id="customFooterPictureBox" class="row">
            <div  class="col-lg-4 col-md-4 col-xs-4">
                <span class="sidebar-head">» Neues in Filme</span>
                <div class="sidebar-block">
                    <?php bottomSideBox("filme"); ?>
                </div>
            </div>
            <div  class="col-lg-4 col-md-4 col-xs-4">
                <span class="sidebar-head">» Neues in Serien</span>
                <div class="sidebar-block">
                    <?php bottomSideBox("serien"); ?>
                </div>
            </div>
            <div  class="col-lg-4 col-md-4 col-xs-4">
                <span class="sidebar-head">» Neues in Netflix</span>
                <div class="sidebar-block">
                    <?php bottomSideBox("netflix"); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
        <footer>
            <div class="row">
                <div id="logo_placeholder" class="col-lg-2 col-md-2">
                    <img class="img-responsive" src="https://wshbr.de/wp-content/uploads/2017/01/main-icon.png" alt="" style="padding-top: 10%;">
                </div>
                <div class="col-lg-5 col-md-5 col-xs-12">
                    <h3 class="footer-header">Kontakt:</h3>
                    <p>Fragen und Feedback gerne an unsere E-Mail!</p>
                    <p>
                        <a href="mailto:webmaster@wshbr.de" title="Contact me!"><i class="fa fa-envelope"></i> Kontakt</a> 
                        <a href="http://www.elitepvpers.com/"><i class="fa fa-home"></i> elitepvpers.com</a>
                    </p>
                    <p>
                        <a href="https://wshbr.de/impressum"><i class="fa fa-link"></i> Impressum</a>
                        <a href="https://wshbr.de/datenschutzerklaerung"><i class="fa fa-link"></i> Datenschutz</a></p>
                    <small>©Copyright 2020 - Armin Seidling</small>
                </div>
                <div class="col-lg-5 col-md-5 col-xs-12">
                    <h3 class="footer-header">Social Media (Blog):</h3>
                    <a href="https://twitter.com/wshbrde" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x"></i></span>Twitter</a>
                    <a href="https://www.facebook.com/wshbrde"  target="_blank" title="Blog"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fab fa-facebook fa-stack-1x"></i></span>Blog</a>
                    <h3 class="footer-header">Social Media (Privat):</h3>
                    <a href="ttps://twitter.com/wshbr13" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x"></i></span>Twitter</a>
                    <a href="https://www.instagram.com/jspr13/"  target="_blank" title="Instagram"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fab fa-instagram fa-stack-1x"></i></span>Instagram</a>
                </div>
                
            </div>
        </footer>
    </body>
</html>