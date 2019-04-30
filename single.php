<?php get_header(); ?>

<?php 
$author = "";
$avatar = "";
$desc = "";
$backgroundUrl = "";
if(have_posts()){
    while(have_posts()){ the_post(); ?>
	</div>
    <div style="padding: 10px;">
        <div class="post-info post-info-top">
            Von <b><?php the_author(); ?></b> - Veröffentlicht am <b><?php the_time("d.m.Y, H:i");?></b>
        </div>
        <a class="head_link" href="<?php echo esc_url( get_permalink());?>"><h2><?php the_title();?></h2></a>
        <div class="post-info">
            <div class="blog-tags"><?php the_tags( '<ul class="post-categories"><li>', '</li><li>', '</li></ul>' ); ?></div>
        </div>
        
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="blog-entry">
        <div class="blog-content" style="text-align:justify;">
            <p><?php the_content();?></p>
            <!--Quellen-->
            <?php
                $desc = get_the_author_meta("description");
                $author = get_the_author();
                $avatar = get_avatar_url( get_the_author_meta( 'ID' ), 32 );
                $quellen = get_post_meta(get_the_ID(),'quellenAngaben');
                if($quellen[0] != ""){
                    echo "<div class='quellenAngaben'><p style='margin-right:5px'>Quellen: </p>". $quellen[0]. "</div>";
                }
                if($author != ""){
                    ?>
                    <div id="authorBox" style="">
                    	<img src="<?php echo $avatar; ?>">
					    <h3><?php echo $author; ?></h3>
					    
					    <?php echo $desc; ?>
					</div>
                    <?php
                }

            ?>
        </div>
    </div>
    <?php }
}



?>

<?php comments_template() ?>

<?php get_footer(); ?>