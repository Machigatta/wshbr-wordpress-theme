<?php get_header(); ?>

<?php 



if(have_posts()){
    while(have_posts()){ the_post(); ?>
    <div class="blog-entry">
        <a class="head_link" href="<?php echo esc_url( get_permalink());?>"><h3><?php the_title();
            // $sliderMeta = get_post_meta(get_the_ID(),'isSlider');
            // if(!empty($sliderMeta) && $sliderMeta[0] == "1"){
            //         echo "  <i class=\"fa fa-bookmark\" style=\"color:red;float:right;\"></i>";
            // }
            ?></h3></a>
        <div class="post-info">
            <div class="pub-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time("j.m.Y");?> | </div>
            <div><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?> | </div>
            <div class="blog-tags"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( '<ul class="post-categories"><li>', '</li><li>', '</li></ul>' ); ?></div>
        </div>
        
        <div class="blog-content blog-content-short">
            <?php
                
                
                if(has_post_thumbnail()){
                    ?>
                     <a href="<?php echo esc_url( get_permalink());?>">
                        <div class="blog-thumbnail ">
                            <?php
                            the_post_thumbnail("",array( "class" => "img-responsive"));
                            ?>
                        </div>
                    </a>
                    <?php
                }
                
                
            ?>        
        
        
        <p><?php the_excerpt();?><a class="btn btn-blog btn-readmore" href="<?php echo esc_url( get_permalink());?>">Weiterlesen...</a></p>
        </div>
        <hr>        
    </div>
        
    <?php } 
        echo pagination(2,true,true);
    }else{
    ?>
    <center>
        <br>
        <br>
        <img class="img-responsive" src="https://wshbr.de/wp-content/uploads/2017/01/main-icon.png" style="width:200px;">
        <br>
        <h1>Keine Beiträge gefunden</h1>
        <p>Es tut uns leid, unser Waschbär konnte keine Beiträge finden.</p>
    </center>

    <?php
}



?>

<?php get_footer(); ?>