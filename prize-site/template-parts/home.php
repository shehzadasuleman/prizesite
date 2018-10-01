<?php
/*
@package prizesitetheme
*/
?>
<?php 
    $post_category= get_the_category( get_the_ID() );
    $post_category_name = $post_category[0]->cat_name;
?>
    
<?php if ( "Bottom Content" == $post_category_name ): ?>
    <!--div class="row bottom-content">
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-12 offset-md-0">
                    <h3><?php the_content() ?></h3>
                </div>
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                    <!--img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id( get_the_ID() ) ); ?>" alt="img-content-cover" class="img-thumbnail" /-->
                </div>
            </div>
        </div>
    </div-->
<?php endif; ?>


<?php if ( "Home Description" == $post_category_name ): ?>
    <div class="row top-content">
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
                <div class="row">
            <div class="col-lg-8 each-content">
                <!-- Text before blabla-->
                <h2><?php the_content() ?></h2>
                <!-- Text after blabla-->
            </div>
            <div class="col-lg-4 each-content">
                <!-- Facebook Page Plugin-->
                <h2><p style="text-decoration:underline; color:black;">Our Winners Facebook Comments</p>
<div class="fb-page" data-href="https://www.facebook.com/MuftPaise/" data-tabs="timeline" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MuftPaise/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MuftPaise/">MuftPaise</a></blockquote></div>
                <!-- Facebook Page Plugin ends-->
            </div>            
         </div>   
            
        </div>
    </div>
<?php endif; ?>

<?php if ( "Story1" == $post_category_name ): ?>
<div class="row middle-content">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1">
        <div class="row">
            <div class="col-lg-6 each-content">
                <div class="row heading">
                    <?php if ( "Story1" == $post_category_name ): ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 offset-sm-1 col-4 heading-img">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id( get_the_ID() ) ); ?>" alt="img-post-1" class="img-thumbnail" />
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 heading-data">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                $cats = get_categories();
                foreach($cats as $c) {
                    if ( "Story2" == $c->name) {
                        query_posts("cat=$c->term_id&posts_per_page=1");
                        if (have_posts()) {
                            the_post(); ?>
                            <div class="col-lg-6 each-content">
                                <div class="row heading">
                                    <div class="col-lg-4 col-md-4 col-sm-4 offset-sm-1 col-4 heading-img">
                                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id( get_the_ID() ) ); ?>" alt="img-post-2" class="img-thumbnail" />
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 heading-data">
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                <?php   }
                    }
                }
                wp_reset_query();
            ?>
        </div>
    </div>
</div>
<?php endif; ?>