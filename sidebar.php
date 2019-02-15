<?php dynamic_sidebar(); ?>
<div>
    <?php 
        $tmdb->type = null;
        $tmdb->id = null;
        $tmdb->language = "de-DE";
        if ( is_single() ) { 
            $metaData = get_post_meta(get_the_ID(),'imdb_id');
            if($metaData){
                $tmdburl = $metaData[0];
                $tmdburl = str_replace("https://www.themoviedb.org/","",$tmdburl);
                if($tmdburl != ""){
                    $splits = explode("/",$tmdburl);
                    $tmdb->type = $splits[0];
                    $extraSplits = explode("-",$splits[1]);
                    $tmdb->id = $extraSplits[0];
                }
            }
            
        } 
    ?>
    <span class="sidebar-head">» Suche</span>
    <div class="sidebar-block">
        <?php get_search_form( true ); ?>
    </div>
</div>
<?php

if($tmdb->id == null){
    if(is_front_page() ){
        drawReviews(2);
    }else {
        drawReviews(3);
    }
}else{
    echo '<div class="loader">
            <h4>Lade Details...</h4>
            <div></div>
        </div>';

echo '
    <script>
    jQuery(document).ready(function(){
        $.ajax({
            method: "POST",
            url: "/wp-content/themes/wshbr_osaki/sidebarloader.php",
            data: { id: '.$tmdb->id.', type: "'. $tmdb->type.'" }
        })
        .done(function( msg ) {
            $(".loader").replaceWith(msg);
        });
    });
    </script>';


}

?>

<!-- <div>
    <div class="sidebar-block">
        <center>
            <a class="socialBTN btn-icon btn-facebook" href="https://www.facebook.com/wshbrde"><i class="fab fa-facebook"></i></a>
            <a class="socialBTN btn-icon btn-twitter" href="https://www.twitter.com/wshbrde"><i class="fab fa-twitter"></i></a>
            <a class="socialBTN btn-icon btn-instagram" href="https://www.instagram.com/wshbrde/"><i class="fab fa-instagram"></i></a>
        </center>
    </div>
</div> -->

<?php 

function drawReviews($postCount){
    ?>
    <div>
    <span class="sidebar-head">» Reviews</span>
    <div class="sidebar-block">
        <center>
           <?php
                $the_query = new WP_Query( array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $postCount,
                    'category_name' => "review",
                    'orderby' => 'id')
                );

                if ( $the_query->have_posts() ) {
                    echo '<div style="width:100%;height:2px;background:#06b48f;"></div>';
                    while ( $the_query->have_posts() ) {
                        
                        echo '<div class="reviewBlock">';
                        $the_query->the_post();
                        //  if($sliderCaption == ""){
                        //      echo $sliderCaption = get_the_title();
                        //  }
                         echo '<a href="'. esc_url( get_permalink()).'" target="_blank">';
                         echo '<div class="sidebar-picture" data-content="'.get_the_title().'">';
                         if(has_post_thumbnail()){
                             the_post_thumbnail("",array( 'class' => 'img-responsive' ));
                             }
                        echo '</div></a><p class="reviewPragraph">'.get_the_excerpt().'</p></div>';
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    echo '<div style="width:100%;height:2px;background:#06b48f;"></div>';
                } else {
                    // no posts found
                }
                ?>      
        </center>
    </div>
</div>

    <?php
}
?>