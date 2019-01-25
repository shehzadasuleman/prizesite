<?php get_header(); ?>
<?php
    $urlparts = parse_url(home_url());
    $domain = 'http:'.$urlparts['host'];
    $current_uri=$_SERVER['REQUEST_URI'];
    $logo_url = get_template_directory_uri() . '/img/logo.png';
    $background_url = get_template_directory_uri() . '/img/cover.jpg';
    $message_contact_url = get_template_directory_uri() . '/img/img01.png';
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
    $instagram_url = get_template_directory_uri() . '/img/instagram.svg';
    $close_url = get_template_directory_uri() . '/img/close.svg';
?>
<?php if ( "/v1" == $current_uri || "/v1/winners" == $current_uri || "/v1/whats-the-catch" == $current_uri || "/v1/contact-us" == $current_uri || "/v1/failure-confirmation-page" == $current_uri || "/v1/success-confirmation-page" == $current_uri || "/v1/not-registered" == $current_uri || "/v1/try-tomorrow" == $current_uri || "/v1/won" == $current_uri || "/v1/terms-and-conditions" == $current_uri || "/v1/privacy-policy" == $current_uri || "/v1/cookies-policy" == $current_uri):?>
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
                            <button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
                    </div>
                    <div class="social-block">
                        <strong class="title">Be our friend</strong>
                        <ul class="social-networks">
                            <li><a href="https://www.facebook.com/MuftPaise/" target="_blank"><img src="<?php print $facebook_url ?>" alt="image description"></a></li>
                            <li><a href="https://www.instagram.com/muftpaise/" target="_blank"><img src="<?php print $instagram_url ?>" alt="image description"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main">
    <?php if ( "/v1" == $current_uri ):?>
			<section class="info-block" id="infoblock">
				<div class="container">
					<div class="row">
						<div class="col">
							<h1>Join Pakistan's only <span class="slogan">Free</span> daily cash draw site</h1>
                            
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
									<button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
								</div>
							</div>
							<form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
								<div class="form-group">
									<div class="input-wrap">
										<label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                        <input type="text" id="no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
                                        <span class="label">Don't worry, we'll never pass this on.</span>
                                        <span class="error-message" id="error-msg">Please enter a phone number</span>
									</div>
								</div>
								<div class="form-group" id="check-box-div">
									<div class="input-wrap">
										<input id="agree" type="checkbox">
										<label id="check-label-box" for="agree" class="check-label">
                                            <?php
                                                wp_nav_menu( array(
                                                    'theme_location' => 'v1-secondary-menu',
                                                    'container' => false,
                                                    'items_wrap' => '%3$s'
                                                ) );
                                            ?>
										</label>
                                                                                <span class="error-message" id="error-chk-box-msg">Please agree to our Terms & Conditions</span>
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
			</section><br/>
			<section class="messages-block">
				<div class="container">
                                
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Muftpaise kiya hai? 🤔</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Muftpaise Pakistan ki aik wahid website hai jo rozana muft inaam deti hai. Hum website pai registered mobile numbers mai sai roz lucky log choose kartai hain, aur unhai muft paise daitai hain. Simple - ☺️</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       
                       
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Mai kaise register kar sakta hoon? 🙋‍♂️</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Apko sirf hamari website pai apna Pakistani mobile number register karna hai. Apna mobile number upar daliye aur abhi register harain, aur apko tasdeeqi screen nazar aa jaye gi. </span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
          
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Mera inaam kab niklay ga? 😉</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Hum registered mobile numbers mai sai rozana raat ko 12 bajai lucky numbers choose kartai hain. Jis din aap ka number choose hua, us din apko free cash/inaam miley ga 🤑.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Mujhai kaise pata chalay ga k mera inaam nikla hai? 🤔</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Har roz raat ko 12 bajai sai pehlai, Hamarai <a style="text-decoration: underline; color: white;" href="https://www.muftpaise.com/winners/">winners page</a> pai ja kai apna mobile number dalain, aur “CHECK” button click karain. Agar aap us din jeetai hain to aap ko “CONGRATULATIONS” ka message nazar a jayai ga 😃</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Jab mai jeeta, mai inaam kaise claim karoon ga ? 🤷‍♂️</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Jab aap Congratultions ka message dekhain gai, wahan pai aap hamara mobile number bhi dekhain gai. Apka jonsa mobile number inaam jeeta hain, hamai us mobile number sai text/whatsapp message karain aur message mai sirf likhiye “Winner”. Hum phir apko easypaise kai through Muft Paisai transfer kar dain gai. ☺️</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Mai inaam kitni dair main claim kar sakta hoon?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Hum rozana raat ko 12 bajay lucky numbers nikaltai hain. Phir logon kai paas pura din hai inaam claim karnai kai liye. Apko bus inaam usi din claim karna hai jis din nikla. Aglai din dobara lucky draw hogain aur agar apnai inaam nahi claim kiya to zaya ho jayai ga.</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Mera inaam dobara nikal sakta hai? 😉</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">G bilkul nikal sakta hai. Har number jo hamare pas register hai, wo rozana lucky draw main shamil hota hai isliye apka inaam rozana nikal sakta hai 😍</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                       		        <div class="message-box left">
						<div class="message gray">
							<span class="text">Apka office kaha hai?</span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Hamara office ka address hai 1-km, old defence road, near chungi amar sadhu, Lahore. 🏢</span>
						</div>
						<a href="#" class="image-holder"><img src="<?php print $message_contact_url ?>" alt="image description"></a>
					</div>
                                       <div class="message-box left">
						<div class="message gray">
							<span class="text">Ap log muft main inaam kaisai dai rahe hai – aap paisai kahan sai banatai hain?  </span>
						</div>
					</div>
					<div class="message-box right">
						<div class="message green">
							<span class="text">Hamari site pai companies advertise karti hain aur hum un paison sai apko inaam daitai hain. Is ka matlab hua kai "Jeeto Pakistan, laikin ghar bethai bethai". 🤗</span>
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
						<button type="sumbit" class="btn" data-toggle="modal" data-target="#popup-registration-modal">Enter daily lucky draw for free</button>
					</div>
				</div>
			</aside>
    <?php endif; ?>
    <?php if ( "/v1/whats-the-catch" == $current_uri ):?>
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/whats-the-catch', get_post_format() );

                    endwhile;
                endif;
            ?>
    <?php endif; ?>
    <?php if ( "/v1/contact-us" == $current_uri ):?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/contactus', get_post_format() );

                        endwhile;
                    endif;
                ?>
    <?php endif; ?>
    <?php if ( "/v1/winners" == $current_uri ):?>
                <?php
                    if (have_posts() ):
                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/v1/winners', get_post_format() );

                        endwhile;
                    endif;
                ?>
    <?php endif; ?>
    <?php if ( "/v1/failure-confirmation-page" == $current_uri ):?>
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
    <?php if ( "/v1/success-confirmation-page" == $current_uri ):?>
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
    <?php if ( "/v1/not-registered" == $current_uri ):?>
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
    <?php if ( "/v1/try-tomorrow" == $current_uri ):?>
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
    <?php if ( "/v1/won" == $current_uri ):?>
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
    <?php if ( "/v1/terms-and-conditions" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/termsconditions', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/v1/cookies-policy" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/cookies-policy', get_post_format() );

                    endwhile;
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if ( "/v1/privacy-policy" == $current_uri ):?>
        <div class="clients-content">
            <?php
                if (have_posts() ):
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/v1/privacy-policy', get_post_format() );

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
        <?php if ( "/" == $current_uri ):?>
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
        <?php if ( "/contact-us/" == $current_uri ):?>
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
        <?php if ( "/terms-and-conditions/" == $current_uri ):?>
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
        <?php if ( "/winners/" == $current_uri ):?>
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
        <?php if ( "/failure-confirmation-page/" == $current_uri ):?>
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
        <?php if ( "/success-confirmation-page/" == $current_uri ):?>
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
        <?php if ( "/test-winners/" == $current_uri ):?>
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
        <?php if ( "/won/" == $current_uri ):?>
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
        <?php if ( "/not-registered/" == $current_uri ):?>
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
        <?php if ( "/did-not-won/" == $current_uri ):?>
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
<div class="modal" id="popup-registration-modal" tabindex="-1" role="dialog" aria-labelledby="popupRegistrationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div>
                        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <h3>Register once, for a chance to win everyday!</h3>
                            <form id="prizesite-lucky-form-popup" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <label for="popup-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                                        <input type="text" id="popup-no" class="form-control" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" >
                                        <span class="label">Don't worry, we'll never pass this on.</span>
                                        <span class="error-message" id="popup-error-msg">Please enter a phone number</span>
                                    </div>
                                </div>
                                <div class="form-group" id="check-box-div">
                                    <div class="input-wrap">
                                        <input id="popup-agree" type="checkbox">
                                        <label id="popup-check-label-box" for="popup-agree" class="check-label">
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
                        </div>
                    </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>