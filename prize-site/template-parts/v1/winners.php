<?php
/*
@package prizesitetheme
*/
?>
<?php
    //New Changes
    date_default_timezone_set('Asia/Karachi');
    $curr_time=time();
    $curr_date = date("F j, Y");
?>
<div class="winners-main-content">
    <div class="row winners-cover-ad-banner-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-cover-ad-banner">
			<!--p><a target="_blank" href="http://www.dpbolvw.net/click-8787409-11337760" target="_top">
<img src="http://www.lduhtrp.net/image-8787409-11337760" alt="" border="0"/></a></p-->
		</div>
    </div>
</div>


<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">
                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
					<!-- Left Side Ad -->
					<a target="_blank"  href="https://www.foodpanda.pk/contents/deals"><img alt="Food Panda Ad" src="/wp-content/themes/prize-site/img/foodpanda.jpg"></a><br/><br/>
					
					
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <!-- New Changes -->

                        <form id="prizesite-lucky-form-check" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                            <div class="row">
                                <div class="input-content-mobile">                                
								    <h2>Enter your Number below to see if you won in today's draw!</h2><br/>
                                </div><br/>
								<div class="form-group col-xl-7 offset-xl-1 col-lg-8 col-md-8 col-sm-8 col-8 input-content-mobile">
									<div class="input-wrap">
										<label for="check-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
										<input type="text" id="check-no" class="form-control" placeholder="" required>
									</div>
								</div>
						    	<div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <button type="submit" class="check-prize-btn btn btn-primary">Check</button><br/><br/>
                                </div>
							</div>
								
                        </form>
										
                   	<div>
                        <div class="col-xl-12 description">
                        <?php
                            $category_id = get_cat_ID('Winner Description');
                            query_posts("cat=$category_id&posts_per_page=1");
                            if (have_posts()) {
                                the_post(); ?>
                                <h5>
                                    <?php the_content(); ?>
                                </h5>
                        <?php } wp_reset_query(); ?>

					
					
					
                    <hr/>

                        <!--a target="_blank"  href="https://www.daraz.pk/warehouse-clearance-sale/"><img src="/wp-content/themes/prize-site/img/darazsale.jpg"></a-->
                    </div><br/><br/>
				
                    <!-- New Changes -->
                    <h1>Recent Winners</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Phone Number</th>
                                    <!--th>Prize Amount</th>
                                    <th>Prize Claimed</th-->
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $query = new WP_Query(array(
                                    'post_type' => 'prizesite-winners',
                                    'post_status' => 'publish',
                                    'orderby'   => 'date',
                                    'order'     => 'DESC',
                                    'post_per_page' => 10
                                ));
                                if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <tr>
                                    <?php $post_date = get_the_date(); ?>
                                        <?php if ($post_date != $curr_date) { ?>
                                            <td><?php echo $post_date; ?></td>
                                            <td><?php the_title(); 
                                            ?></td>
                                            <!--td><?php echo get_post_meta( get_the_ID(), '_winners_prizeamount_value_key', true); ?></td-->
                                            <!--td><?php echo get_post_meta( get_the_ID(), '_winners_prizeclaimed_value_key', true); ?></td-->
                                        <?php } ?>
                                    </tr>
                            <?php
                            endwhile;
                            endif;
                            wp_reset_query();
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
				
				                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                        <p><a target="_blank"  href="https://www.youtube.com/watch?v=xJyCU8WgQp8"><img src="/wp-content/themes/prize-site/img/bykea.jpg"></a></p>
                </div>
				
				
            </div>
        </div>
    </div>
</div>

<aside class="aside">
	<div class="container">
		<div class="text-holder">
			<p>Thanks for reading all the way down. All that's left to do is sign up and see for yourself. Good Luck!</p>
		</div>
		<div class="btn-holder">
			<a href="http://localhost/wordpress/v1" class="btn" class="scroll">Enter daily lucky draw for free</a>
		</div>
	</div>
</aside>