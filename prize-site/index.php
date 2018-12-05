<?php get_header(); ?>
<?php 
    $current_uri=$_SERVER['REQUEST_URI'];
    $logo_url = get_template_directory_uri() . '/img/logo.png';
    $background_url = get_template_directory_uri() . '/img/cover.jpg';
    $message_contact_url = get_template_directory_uri() . '/img/img01.png';
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
    $instagram_url = get_template_directory_uri() . '/img/instagram.svg';
    $close_url = get_template_directory_uri() . '/img/close.svg';
?>
<?php if ( "/wordpress/v1" == $current_uri || "/wordpress/v1/winners" == $current_uri || "/wordpress/v1/whats-the-catch" == $current_uri || "/wordpress/v1/contact-us" == $current_uri || "/wordpress/v1/failure-confirmation-page" == $current_uri || "/wordpress/v1/success-confirmation-page" == $current_uri || "/wordpress/v1/not-registered" == $current_uri || "/wordpress/v1/did-not-won" == $current_uri || "/wordpress/v1/won" == $current_uri ):?>
<div id="wrapper">
    <header id="header" style="background-image: url(<?php print $background_url ?>);">
        <div class="header-holder">
            <div class="logo">
                <a href="#"><img src="<?php print $logo_url ?>" alt="image dscription"></a>
            </div>
            <a href="#" class="nav-opener">
                <span class="menu">menu</span>
                <span class="close"><img src="<?php print $close_url ?>" alt="image description"></span>
            </a>
            <div class="nav-holder">
                <div class="nav-area">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'v1-primary-menu',
                            'container' => false,
                            'menu_class' => 'main-navigation'
                        ) );
                    ?>
                    <div class="btn-holder">
                        <a id="draw-btn-menu" href="#" class="btn menu-close">Enter daily lucky draw for free</a>
                    </div>
                    <div class="social-block">
                        <strong class="title">Be our friend</strong>
                        <ul class="social-networks">
                            <li><a href="#"><img src="<?php print $facebook_url ?>" alt="image description"></a></li>
                            <li><a href="#"><img src="<?php print $instagram_url ?>" alt="image description"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main">
    <?php if ( "/wordpress/v1" == $current_uri ):?>
			<section class="info-block" id="infoblock">
				<div class="container">
					<div class="row">
						<div class="col">
							<h1>Join Pakistan's<br> only <span class="slogan">Free</span><br> daily cash<br> draw site</h1>
                            
                            <?php
                            $category_id = get_cat_ID('V1 Home Descriprtion');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
                                the_post(); ?>
                                <div class="text-wrapper">
                                    <strong class="text"><?php the_title(); ?></strong>
                                    <?php $excerpt_content = get_the_excerpt(); ?>
                                    <a href="#" class="btn green"><?php echo $excerpt_content; ?></a>
                                </div>
                                <div class="text-holder">
                                    <p><?php the_content(); ?></p>
                                </div>
                            <?php } wp_reset_query(); ?>
						</div>
						<div class="col">
							<div class="time-block">
								<div class="timer-wrapper">
									<div class="timer">
										<span class="title">Next draw</span>
										<div id="defaultCountdown"></div>
									</div>
									<a id="draw-btn-bottom-block" href="#infoblock" class="btn">Enter daily lucky draw for free</a>
								</div>
							</div>
							<form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
								<div class="form-group">
									<div class="input-wrap">
										<label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                        <input type="text" id="no" class="form-control" placeholder="" required>
                                        <span class="label">Don't worry, we'll never pass this on.</span>
                                        <span class="error-message" id="error-msg">Please enter a phone number</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-wrap">
										<input id="agree" type="checkbox" required>
										<label for="agree" class="check-label">
                                            <?php
                                                wp_nav_menu( array(
                                                    'theme_location' => 'v1-secondary-menu',
                                                    'container' => false,
                                                    'items_wrap' => '%3$s'
                                                ) );
                                            ?>
										</label>
									</div>
								</div>
								<button type="sumbit" class="btn">Enter daily lucky draw for free</button>
                            </form>
                            <div class="alert alert-danger hidden" id="v1-danger-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Failure! </strong>
                                Unable to save your Information, Please try again later.
                            </div>
						</div>
                    </div>
				</div>
			</section>
			<section class="messages-block">
				<div class="container">
					<div class="message-box left">
						<div class="message gray">
							<span class="text">What's the catch? How can it be free to enter?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">We make money through ad revenue on the site, which is generated by the traffic caused by users checking if they've won. So, the more people come back to check everyday, the more money we can give away for free.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
					<div class="message-box left">
						<div class="message gray">
							<span class="text">How are the winning mobile numbers chosen?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Mobile numbers are randomly selected from the list of registered mobile numbers everyday. The selected numbers are then given free money. So, if your number is not in our system, it will not be picked.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
					<div class="message-box left">
						<div class="message gray">
							<span class="text">Fm just going to get loads of spam aren't I?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Definitely not. We will never share your details and will only use your mobile number to send you daily reminders to make sure you check if you have won. We may also send you the occasional updates.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
					<div class="message-box left">
						<div class="message gray">
							<span class="text">How do I check if I have won?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Just visit our winners page everyday to check if you have won. You'll get a daily reminder to check the site to see if your mobile number has won in the draws. It take less than a minute to check:)</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
					<div class="message-box left">
						<div class="message gray">
							<span class="text">How do I claim when I win?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">If you win, claim your prize by sending us a text message saying "WINNER" on our company mobile number shown on the page when you win your prize.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
				</div>
			</section>
			<aside class="aside">
				<div class="container">
					<div class="text-holder">
						<p>Thanks for reading all the way down. All that's left to do is sign up and see for yourself. Good Luck!</p>
					</div>
					<div class="btn-holder">
						<a id="draw-btn-bottom" href="#infoblock" class="btn" class="scroll">Enter daily lucky draw for free</a>
					</div>
				</div>
			</aside>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/whats-the-catch" == $current_uri ):?>
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/whats-the-catch', get_post_format() );

                    endwhile;
                endif;
            ?>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/contact-us" == $current_uri ):?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/contactus', get_post_format() );

                        endwhile;
                    endif;
                ?>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/winners" == $current_uri ):?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/winners', get_post_format() );

                        endwhile;
                    endif;
                ?>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/failure-confirmation-page" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/failure-confirmation', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/success-confirmation-page" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/success-confirmation', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/not-registered" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/not-registered', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/did-not-won" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/did-not-won', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/wordpress/v1/won" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/won', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    </main>
</div>
<?php else: ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-faded background-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="http://muftpaise.com/"><img src="<?php print $logo_url ?>" class="logo" alt="Logo"/></a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content">   
            <?php
				wp_nav_menu( array(
				    'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'nav navbar-nav'
				) );
			?>
        </div>
    </nav>
    <div>
        <?php if ( "/wordpress/" == $current_uri ):?>
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
                                    <button type="submit" class="btn btn-primary btn-md">Enter Lucky Draw</button>
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
        <?php if ( "/wordpress/contact-us/" == $current_uri ):?>
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
        <?php if ( "/wordpress/terms-and-conditions/" == $current_uri ):?>
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
        <?php if ( "/wordpress/winners/" == $current_uri ):?>
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
        <?php if ( "/wordpress/failure-confirmation-page/" == $current_uri ):?>
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
        <?php if ( "/wordpress/success-confirmation-page/" == $current_uri ):?>
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
        <?php if ( "/wordpress/test-winners/" == $current_uri ):?>
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
        <?php if ( "/wordpress/won/" == $current_uri ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/won', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php endif; ?>
        <?php if ( "/wordpress/not-registered/" == $current_uri ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/not-registered', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php endif; ?>
        <?php if ( "/wordpress/did-not-won/" == $current_uri ):?>
            <div class="clients-content">
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/did-not-won', get_post_format() );

                        endwhile;
                    endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>