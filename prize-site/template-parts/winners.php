<?php
/*
@package prizesitetheme
*/
?>
<div class="winners-main-content">
    <div class="row winners-cover-ad-banner-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-cover-ad-banner">
			<p>Ads Goes Here</p>
		</div>
    </div>
</div>
<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">
                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
					<p>Ads Goes Here</p>
				</div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <h1>Recent Winners</h1>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $counter = 1;
                            $query = new WP_Query(array(
                                'post_type' => 'prizesite-winners',
                                'post_status' => 'publish',
                                'orderby'   => 'date',
                                'order'     => 'DESC',
                                'post_per_page' => 10
                            ));
                            if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                <tr>
                                    <th scope="row" ><?php echo $counter; ?></th>
                                    <td><?php $post_date = get_the_date(); echo $post_date; ?></td>
                                    <td><?php the_title(); ?></td>
                                </tr>
                        <?php   $counter = $counter + 1;
                        endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                        </tbody>
                    </table>
                    <div class="row">
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                    <p>Ads Goes Here</p>
                </div>
            </div>
        </div>
    </div>
</div>