<?php
define('CONCATENATE_SCRIPTS', false); 
    function bottomSideBox($category){

                $the_query = new WP_Query( array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => "2",
                    'tag' => $category,
                    'orderby' => 'id')
                );

                if ( $the_query->have_posts() ) {
                    echo '<div style="width:100%;height:2px;background:#D4AF37;"></div>';
                    while ( $the_query->have_posts() ) {
                        
                        
                        $the_query->the_post();
                        //  if($sliderCaption == ""){
                        //      echo $sliderCaption = get_the_title();
                        //  }
                         echo '<a href="'. esc_url( get_permalink()).'" target="_blank">';
                         echo '<div class="sidebar-picture" data-content="'.get_the_title().'">';
                         if(has_post_thumbnail()){
                             the_post_thumbnail("",array( 'class' => 'img-responsive' ));
                             }
                        echo '</div>';
                        echo '</a>';


                        
                        
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    echo '<div style="width:100%;height:2px;background:#D4AF37;"></div>';
                } else {
                    // no posts found
                }
    }
?>