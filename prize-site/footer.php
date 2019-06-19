<?php
    /*
        This is the template for the footer

        @package prizesite
	*/
	$urlparts = parse_url(home_url());
	$domain = 'http:'.$urlparts['host'].'/wordpress/v1';
    $current_uri=$_SERVER['REQUEST_URI'];
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
	$instagram_url = get_template_directory_uri() . '/img/instagram.svg';
	$onhold_page_enabler = get_option( 'prizesite_onhold_page_enabler' );
?>
<?php if ( $onhold_page_enabler != 1 ) { ?>
<footer id="footer">
	<div class="container">
		<div class="footer-wrapper">
			<ul class="footer-links">
				<li><a href="<?php print $domain; ?>">Home</a></li>
				<li><a href="http://localhost/wordpress/v1/whats-the-catch">What's the catch</a></li>
				<li><a href="http://localhost/wordpress/v1/winners">Winners</a></li>
				<li><a href="http://localhost/wordpress/v1/contact-us">Contact us</a></li>
				<li><a href="http://localhost/wordpress/v1/past-winners">Past Winners</a></li>
				<li><a href="http://localhost/wordpress/v1/faqs">FAQs</a></li>
			</ul>
			<div class="social-block">
				<strong class="title">Be our friend</strong>
				<ul class="social-networks">
					<li><a href="https://www.facebook.com/MuftPaise/" target="_blank"><img src="<?php print $facebook_url ?>" alt="image description"></a></li>
					<li><a href="https://www.instagram.com/muftpaise/" target="_blank"><img src="<?php print $instagram_url ?>" alt="image description"></a></li>
				</ul>
			</div>
		</div>
		<ul class="footer-nav">
			<li><a href="http://localhost/wordpress/v1/terms-and-conditions">Terms &amp; Conditions</a></li>
			<li><a href="http://localhost/wordpress/v1/privacy-policy">Privacy policy</a></li>
			<li><a href="http://localhost/wordpress/v1/cookies-policy">Cookies policy</a></li>
		</ul>
		<div class="copyright">
			<p>&copy; Copyright 2018 <a href="#">MuftPaise.com</a>, inc. All rights reserved.</p>
		</div>
	</div>
</footer>
<?php } ?>
<!--/.Footer-->
<?php wp_footer(); ?>
    </body>
</html>