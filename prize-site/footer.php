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
?>
<!--Footer-->
<?php if ( "/wordpress/v1" == $current_uri || "/wordpress/v1/winners" == $current_uri || "/wordpress/v1/whats-the-catch" == $current_uri || "/wordpress/v1/contact-us" == $current_uri || "/wordpress/v1/failure-confirmation-page" == $current_uri || "/wordpress/v1/success-confirmation-page" == $current_uri || "/wordpress/v1/not-registered" == $current_uri || "/wordpress/v1/try-tomorrow" == $current_uri || "/wordpress/v1/won" == $current_uri || "/wordpress/v1/terms-and-conditions" == $current_uri || "/wordpress/v1/privacy-policy" == $current_uri || "/wordpress/v1/cookies-policy" == $current_uri || "/wordpress/v1/past-winners" == $current_uri):?>
<footer id="footer">
			<div class="container">
				<div class="footer-wrapper">
					<ul class="footer-links">
						<li><a href="<?php print $domain; ?>">Home</a></li>
						<li><a href="<?php print $domain."/whats-the-catch"; ?>">What's the catch</a></li>
						<li><a href="<?php print $domain."/winners"; ?>">Winners</a></li>
						<li><a href="<?php print $domain."/contact-us"; ?>">Contact us</a></li>
						<li><a href="<?php print $domain."/past-winners"; ?>">Past Winners</a></li>
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
					<li><a href="<?php print $domain."/terms-and-conditions"; ?>">Terms &amp; Conditions</a></li>
					<li><a href="<?php print $domain."/privacy-policy"; ?>">Privacy policy</a></li>
					<li><a href="<?php print $domain."/cookies-policy"; ?>">Cookies policy</a></li>
				</ul>
				<div class="copyright">
					<p>&copy; Copyright 2018 <a href="#">MuftPaise.com</a>, inc. All rights reserved.</p>
				</div>
			</div>
		</footer>
<?php else: ?>
<footer class="page-footer font-small pt-0 custom-footer footer-text-color">
    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center">
       <strong>© Copyright 2018 MuftPaise.com, inc. All rights reserved.</strong>
    </div>
    <!--/.Copyright -->
</footer>
<?php endif; ?>
<!--/.Footer-->
<?php wp_footer(); ?>
    </body>
</html>