<?php
    /*
        This is the template for the footer

        @package prizesite
    */
    $current_uri=$_SERVER['REQUEST_URI'];
    $facebook_url = get_template_directory_uri() . '/img/facebook.svg';
    $instagram_url = get_template_directory_uri() . '/img/instagram.svg';
?>
<!--Footer-->
<?php if ( "/wordpress/v1" == $current_uri || "/wordpress/v1/winners/" == $current_uri || "/wordpress/v1/whats-the-catch" == $current_uri ):?>
<footer id="footer">
			<div class="container">
				<div class="footer-wrapper">
					<ul class="footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">My Account</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
					<div class="social-block">
						<strong class="title">Be our friend</strong>
						<ul class="social-networks">
							<li><a href="#"><img src="<?php print $facebook_url ?>" alt="image description"></a></li>
							<li><a href="#"><img src="<?php print $instagram_url ?>" alt="image description"></a></li>
						</ul>
					</div>
				</div>
				<ul class="footer-nav">
					<li><a href="#">Terms &amp; Conditions</a></li>
					<li><a href="#">Privacy policy</a></li>
					<li><a href="#">Cookies policy</a></li>
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