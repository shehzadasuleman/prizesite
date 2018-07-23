<?php
/*
@package prizesitetheme
*/
?>
<?php
    //New Changes
    date_default_timezone_set('Asia/Karachi');
    $curr_time=time();
    $curr_date = date("Y/m/d",$curr_time);
    $threshold_time = strtotime($curr_date . " 13:00:00");
?>
<div class="winners-main-content">
    <div class="row winners-cover-ad-banner-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-cover-ad-banner">
		</div>
    </div>
</div>
<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">
                <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 img-content">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 recent-winners-content">
                    <!-- New Changes -->
                    <div class="col-xl-12 offset-xl-0 col-lg-12 offset-lg-0 col-md-10 offset-md-1 col-sm-8 offset-sm-2 col-8 offset-2 user-info-content" >
                        <form id="prizesiteWinnerCheckForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1 input-content-mobile">
                                <?php
                                    if ($curr_time <= $threshold_time) { ?>
                                        <label for="ex2">Enter your Number below to see if you won in yesterday's draw!</label>
                                <?php    } else {    ?>
                                        <label for="ex2">Enter your Number below to see if you won in today's draw!</label>
                                <?php } ?>
                                    <input class="form-control" type="text" id="check-phNumber" pattern="03[0-9]{2}(?!1234567)(?!1111111)(?!7654321)[0-9]{7}" required="required" placeholder="03XXXXXXXXXX">
                                </div>
                                <div class="col-xl-4 offset-xl-0 col-lg-4 offset-lg-0 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-1 user-info-button">
                                    <button type="submit" class="btn btn-primary btn-md">Check</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <!-- New Changes -->
                    <h1>Recent Winners</h1>
                    <table class="table table-striped table-bordered table-xs-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Phone Number</th>
                                <th>Prize Amount</th>
                                <th>Prize Claimed</th>
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
                                    <td><?php $post_date = get_the_date(); echo $post_date; ?></td>
                                    <td><?php the_title(); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_winners_prizeamount_value_key', true); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_winners_prizeclaimed_value_key', true); ?></td>
                                </tr>
                        <?php
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
                </div>
            </div>
        </div>
    </div>
</div>