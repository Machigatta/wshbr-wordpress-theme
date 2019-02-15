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

            ?>
            <!--Review-Seciton-->
            <?php 
                if(get_post_meta(get_the_ID(),'isReview')){

                    ?>
                    <br>
                    <div style="border: 1px solid gray;position:relative;padding: 5px;">
                        <img src="<?php echo $avatar; ?>" class="img-responsive img-thumbnail pull-left" style="width: 100px;margin-right: 5px;/* margin-left: 5px; *//* margin-top: 5px; */">
                    <div class="rating pull-right" style="width:100px;height: 100px;border: 1px solid gray;background: #e2e2e2;/* margin-top: 5px; *//* margin-right: 5px; */font-size: 60px;text-align: center;/* line-height: 1.6; */margin-left: 5px;font-family: 'Lobster', cursive;"><?php echo get_post_meta(get_the_ID(),'reviewValue')[0]; ?><br><small style="
                        font-size: 20px;
                        margin-top: -20px;
                        margin-left: -21px;
                        position: absolute;
                        color: #797979;
                    ">von 10</small>
                    </div><p style="
                        /* margin-top: 5px; */
                        font-weight: 600;
                        font-size: 25px;
                        font-family: 'Lobster', cursive;
                    "><?php the_author(); ?></p><p class="align-justify" style="
                        text-align: justify;
                    ">
                    <?php echo get_post_meta(get_the_ID(),'reviewShort')[0]; ?>
                    </p>
                    </div>
                    <br>

                  

                    <?php
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