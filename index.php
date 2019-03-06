<?php get_header(); ?>

<?php 



if(have_posts()){
    while(have_posts()){ the_post(); ?>
    <div class="blog-entry">
        <div class="post-info post-info-top">
            Von <b><?php the_author(); ?></b> - Veröffentlicht am <b><?php the_time("d.m.Y, H:i");?></b>
        </div>
        <a class="head_link" href="<?php echo esc_url( get_permalink());?>"><h3><?php the_title();?></h3></a>
        <div class="post-info">
            <div class="blog-tags"><?php the_tags( '<ul class="post-categories"><li>', '</li><li>', '</li></ul>' ); ?></div>
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