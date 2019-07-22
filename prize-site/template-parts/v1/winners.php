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
								<div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 input-content-mobile">
									<div class="input-wrap">
										<label for="check-no" class="label-text">Your mobile number (ОЗххххххххх)</label>
										<input type="text" id="check-no" class="form-control" placeholder="" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}">
                                        <span class="error-message" id="check-error-msg">Please enter a phone number</span>
                                    </div>
								</div>
						    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 check-prize-btn-box">
                                    <button type="submit" class="check-prize-btn btn btn-primary">Check If I Won Today</button><br/><br/>
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
                                    'post_per_page' => 20
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
        <button type="sumbit" class="btn" data-toggle="modal" data-target="#registration-modal">Enter daily lucky draw for free</button>
		</div>
	</div>
</aside>

<div class="modal" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div class="col">
            <div id="popup-progress-bar" class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span id="popup-progress-content">Progress ( 25% )</span></div>
            </div>
			<h3>Register once, for a chance to win everyday!</h3>
			<form id="prizesite-lucky-form" class="lucky-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group">
					<div class="input-wrap">
						<label for="no" class="label-text">Your mobile number (ОЗххххххххх)</label>
                        <input type="text" id="no" class="form-control" >
                        <span class="error-message" id="error-msg">Please enter a phone number</span>
                        <span class="error-message" id="number-invalid-msg">Phone number not in required format.<br>Phone number must have eleven digit.<br>Phone number should be in (03XXXXXXXXX) format.</span>
					</div>
                    <div class="input-wrap">
                        <label for="email" class="label-text">Your email address (myemail@domain.com)</label>
                        <input type="text" id="email" class="form-control" >
                        <span class="error-message" id="email-error-msg">Please enter a valid email address</span>
                        <span class="error-message" id="email-invalid-msg">Email not in required format.<br>Format should be  myemail@domain.com.</span>
                    </div>
                    <span class="guarantee-message">We guarantee to never share your mobile number or email address</span>
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
		</div>
      </div>
    </div>
  </div>
</div>