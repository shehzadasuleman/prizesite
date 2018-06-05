<?php get_header(); ?>
<?php 
    $current_url="//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div>
    <?php if ( "//localhost/wordpress/" == $current_url ):?>
        <div class="col-lg-12 col-xs-12 col-centered main-content" style="background-image: url(<?php header_image(); ?>);">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 actual-content">
                    <h1 class="site-description"><?php bloginfo( 'description' ) ?></h1>
                    <h2 class="site-title"><?php bloginfo( 'name' ) ?></h2>
                </div>
                <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2 user-info-content" >
                    <form id="prizesiteCandidatesForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-2 col-lg-6 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1 input-content-mobile">
                                <label for="ex2">Your Mobile Number</label>
                                <input class="form-control" type="text" id="phNumber" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" required="required" placeholder="03XXXXXXXXXX">
                            </div>
                            <div class="col-xl-4 offset-xl-0 col-lg-4 offset-lg-0 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-1 user-info-button">
                                <button type="submit" class="btn btn-primary btn-md">Start Winning</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="custom-control custom-checkbox user-info-chkbox terms-conditions col-xl-8 offset-xl-2 col-lg-9 offset-lg-2 col-md-9 offset-md-2 col-sm-9 offset-sm-2 col-11 offset-1">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" required="required">
                                <label class="custom-control-label" for="customCheck1"></label>
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'secondary',
                                            'container' => false,
                                            'items_wrap' => '%3$s'
                                        ) );
                                    ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="alert alert-danger hidden" id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Failure! </strong>
            Unable to save your Information, Please try again later.
        </div>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/home', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/contact-us/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/contactus', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/terms-and-conditions/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/termsconditions', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/winners/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/winners', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/failure-confirmation-page/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/failure-confirmation', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/success-confirmation-page/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/success-confirmation', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "//localhost/wordpress/test-winners/" == $current_url ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/test-winners', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>