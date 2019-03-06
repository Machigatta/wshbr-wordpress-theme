<div>
    <span class="sidebar-head">» Suche</span>
    <div class="sidebar-block">
        <?php get_search_form( true ); ?>
    </div>
</div>
<?php
dynamic_sidebar("wshbr_sidebar");
if (function_exists('tmdb_sidebar')) { tmdb_sidebar(); }

if(class_exists("wsreview")){
    $wsr = new wsreview();
    if(is_front_page() ){
        $wsr->renderPluginAsWidget(3);
    }else {
        $wsr->renderPluginAsWidget(2);
    }
}


?>