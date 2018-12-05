<?php
/*
@package prizesitetheme
*/
?>
<section class="about-block">
				<div class="container">
					<div class="time-block">
						<div class="timer-wrapper">
							<div class="timer">
								<span class="title">Next draw</span>
								<div id="defaultCountdown"></div>
							</div>
							<a href="http://localhost/wordpress/v1" class="btn">Enter daily lucky draw for free</a>
						</div>
					</div>
					<div class="row">
						<?php
                            $category_id = get_cat_ID('WTC Header');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
								the_post(); ?>
								<div class="col">
									<h1><?php echo get_the_title(); ?></h1>
								</div>
								<div class="col">
									<div class="header">
										<p><?php echo get_the_content(); ?></p>
									</div>
						<?php } wp_reset_query(); ?>
									<div class="text-holder">
						<?php
                            $category_id = get_cat_ID('WTC Points');
							query_posts("cat=$category_id&posts_per_page=3");
						
							if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<strong class="title"><?php echo get_the_title(); ?></strong>
								<p><?php echo get_the_content(); ?></p>
						<?php
                            endwhile;
                            endif;
                            wp_reset_query();
                        ?>
									</div>
									<a href="http://localhost/wordpress/v1" class="btn">Enter daily lucky draw for free</a>
						</div>
					</div>
				</div>
			</section>