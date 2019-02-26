<?php get_header(); ?>

<?php 
$author = "";
$avatar = "";
$desc = "";
$backgroundUrl = "";
if(have_posts()){
    while(have_posts()){ the_post(); ?>
	</div>
	<div style="padding: 10px;border-bottom: 1px solid #ccc;"><h2 style="text-shadow: 1px 1px #c3c3c3;font-family: 'Anton';"><?php the_title();?></h2><div class="post-info">
           <div class="pub-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time("j.m.Y");?> | </div>
            <div><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?> | </div>
            <div class="blog-tags"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( '<ul class="post-categories"><li>', '</li><li>', '</li></ul>' ); ?></div>
        </div></div>
    <div class="col-lg-9 col-md-9 col-xs-12" style="border-right: 1px solid #eee;">
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

              <script>
                        var postData = {
                            title: "<?php echo addslashes(get_the_title());?>",
                            url: "<?php echo esc_url( get_permalink());?>",
                            short: "<?php echo addslashes(get_the_excerpt());?>",
                            thumbnailurl: "<?php echo get_the_post_thumbnail_url();?>"

                        }
                    </script>
        </div>
    </div>
    <?php }
}



?>

<?php comments_template() ?>

<?php get_footer(); ?>