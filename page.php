<?php get_header(); ?>

<?php 

if(have_posts()){
    while(have_posts()){ the_post(); ?>
    <div class="blog-entry">
        <h3><?php the_title();?></h3>
        <div class="post-info">
            <div class="pub-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time("j.m.Y");?> | </div>
            <div><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?> | </div>
            <div class="blog-tags"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( '<ul class="post-categories"><li>', '</li><li>', '</li></ul>' ); ?></div>
        </div>
        <div class="blog-content">
            <p><?php the_content();?></p>
        </div>
    </div>
    <?php }
}



?>


<?php get_footer(); ?>