<?php
/*
@package prizesitetheme
*/
?>
<?php
    date_default_timezone_set('Asia/Karachi');
    $right_ads_banner_1 = get_template_directory_uri() . '/img/Ads/Slider/right-desktop-ad1.jpg';
    $right_ads_banner_2 = get_template_directory_uri() . '/img/Ads/Slider/right-desktop-ad2.jpg';
    $right_ads_banner_3 = get_template_directory_uri() . '/img/Ads/Slider/right-desktop-ad3.jpg';
    $test_image = get_template_directory_uri() . '/img/Ads/travel-ad.jpg';
    $ads_slide_timer = get_option( 'prizesite_winners_ad_timer' );
    $previous_contests_count = 0;
    $live_contests_count = 0;
    $today = date("Y-m-d");
    wp_reset_query();
    $query = new WP_Query(array(
        'post_type' => 'prizesite-contests',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));
    while( $query->have_posts() ) {
        $query->the_post();
        $end_date = get_post_meta(get_the_ID(),'_contests_enddate_value_key',true);
        if ($end_date < $today) {
            $previous_contests_count = $previous_contests_count + 1;
        }
    }
    wp_reset_query();

    $screen_size =  (int)$_COOKIE['windowWidth'];
    $mob_size = 400;
    $tab_size = 768;
    if ( $screen_size > $tab_size ) {
        $contests_per_page = 3;
    } else if ( $screen_size <= $tab_size && $screen_size >= $mob_size ) {
        $contests_per_page = 2;
    }else if ( $screen_size < $mob_size ) {
        $contests_per_page = 1;
    }
    $total_pages = ceil($previous_contests_count / $contests_per_page);
?>
<script type="text/javascript">var previous_contests_count = "<?= $previous_contests_count ?>";
var contests_per_page = "<?= $contests_per_page ?>";
var screen_size = "<?= $screen_size ?>"
</script>
<div class="row">
    <div class="carousel-ad-info col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <p>Advertisement</p>
    </div>
    <div id="contests-top-desktop-carousel" class="carousel slide carousel-fade col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <div class="adplugg-tag" data-adplugg-zone="uat_contests_desktop_top_bar_zone"></div>
    </div>
    <div id="contests-top-mobile-carousel" class="carousel slide carousel-fade col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1">
        <div class="adplugg-tag" data-adplugg-zone="uat_contests_mobile_top_bar_zone"></div>
    </div>
</div>
<div class="middle-content">
    <div class="row winners-middle-content-parent">
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 winners-actual-content">
            <div class="row winners-partitioned-actual-content">

                <div id="contests-left-ad" class="col-xl-3 col-lg-3 col-md-4 col-sm-4 img-content">
                    <div id="carousel-left-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-left-ads" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-left-ads" data-slide-to="1"></li>
                            <li data-target="#carousel-left-ads" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $right_ads_banner_1 ?>" alt="First right slide"></a>
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $right_ads_banner_2 ?>" alt="Second right slide"></a>
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $right_ads_banner_3 ?>" alt="Third right slide"></a>
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a id="left-prev-btn" class="carousel-control-prev" href="#carousel-left-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="left-next-btn" class="carousel-control-next" href="#carousel-left-ads" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                </div>	
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 contest-block">
                    <div class="live-content">
                        <h2>LIVE Contests</h2>
                        <div id="live-contest-block" class="row remove-margin">
                        <?php
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'post_type' => 'prizesite-contests',
                                'post_status' => 'publish',
                                'posts_per_page' => -1
                            ));
                            $live_contest_shown = 0;
                            while( $query->have_posts() ) {
                                $query->the_post();
                                $end_date = get_post_meta(get_the_ID(),'_contests_enddate_value_key',true);
                                $prize_amount = get_post_meta(get_the_ID(),'_contests_prizemoney_value_key',true);
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                                $contest_title = get_the_title( get_the_ID() );
                                $live_contest_url = "http://localhost/wordpress/v1/live-contest?id=" . get_the_ID() . "&title=" . $contest_title;
                                if ($end_date >= $today) { ?>
                                        <div class="card col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 remove-padding">
                                            <div class="card-body">
                                                <p class="card-text"><strong><?php echo $prize_amount; ?></strong></p>
                                            </div>
                                            <div class="contest-cover">
                                                <a href="<?php echo $live_contest_url; ?>"><img src="<?php echo $thumbnail_url; ?>" alt="Card image"></a>
                                                <p class="contest-live-status">LIVE</p>
                                            </div>
                                            <div class="card-body">
                                                <a href="<?php echo $live_contest_url; ?>"><p class="card-text"><strong><?php echo $contest_title; ?></strong></p></a>
                                            </div>
                                        </div>
                            <?php
                                    $live_contest_shown = 1;
                                }
                            }
                            ?>
                            <?php if ( $live_contest_shown == 0 ) { ?>
                                <div class="card-body" style="text-align:center">
                                        <p class="card-text"><strong>No Live Contest Exists</strong></p>
                                </div>
                            <?php
                            }
                            wp_reset_query();
                        ?>
                        </div>
                    </div>
                    <div id="contests-mob-carousel-left-ads" class="carousel slide carousel-fade" data-ride="carousel" data-interval="<?php echo $ads_slide_timer; ?>">
                        <!--Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#mob-carousel-left-ads" data-slide-to="0" class="active"></li>
                            <li data-target="#mob-carousel-left-ads" data-slide-to="1"></li>
                            <li data-target="#mob-carousel-left-ads" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <a target="_blank" href="https://rider.foodpanda.pk/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-one" class="d-block w-100" src="<?php print $right_ads_banner_1 ?>" alt="First right slide"></a>
                            </div>
                            <!--/First slide-->
                            <!--Second slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.youtube.com/watch?v=XsbnIpFBD54"><img id="carousel-slide-two" class="d-block w-100" src="<?php print $right_ads_banner_2 ?>" alt="Second right slide"></a>
                            </div>
                            <!--/Second slide-->
                            <!--Third slide-->
                            <div class="carousel-item">
                                <a target="_blank" href="https://www.servis.com/?utm_source=muftpaise&utm_medium=bannerad&utm_campaign=advertising&utm_content=awareness"><img id="carousel-slide-three" class="d-block w-100" src="<?php print $right_ads_banner_3 ?>" alt="Third right slide"></a>
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a id="mob-left-prev-btn" class="carousel-control-prev" href="#mob-carousel-left-ads" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a id="mob-left-next-btn" class="carousel-control-next" href="#mob-carousel-left-ads" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                    <div id="previous-content">
                        <h2>Previous Contests</h2>
                        <div id="previous-contest-block">
                        <?php 
                            $contest_added_count = 1;
                            $contest_page_count = 1;
                            wp_reset_query();
                            $query = new WP_Query(array(
                                'post_type' => 'prizesite-contests',
                                'post_status' => 'publish',
                                'posts_per_page' => -1
                            ));
                            $previous_contest_shown = 0;
                            while( $query->have_posts() ) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                $end_date = get_post_meta(get_the_ID(),'_contests_enddate_value_key',true);
                                $live_date = get_post_meta(get_the_ID(),'_contests_livedate_value_key',true);
                                $winner_choosen = get_post_meta(get_the_ID(),'_contests_winnerchosen_value_key',true);
                                $winner_text = get_post_meta(get_the_ID(),'_contests_winnerchosentext_value_key',true);
                                $claim_alert = "";
                                if ( $winner_choosen == 1 ) {
                                    $claim_alert = get_post_meta(get_the_ID(),'_contests_claimalert_value_key',true);
                                } else {
                                    $claim_alert = "Winner(s) will be choosen by 12:00 PM on " . date('jS M',strtotime(' + 2 day', strtotime($end_date))); 
                                }
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                                $contest_title = get_the_title( get_the_ID() );
                                $view_contest_url = "http://localhost/wordpress/v1/view-contests?id=". $post_id . "&title=".$contest_title;
                                if ($end_date < $today) {
                                    if ( $contest_added_count <= $contests_per_page ) {
                                        if( $contest_added_count == 1 ) { ?>
                                            <div id="<?php echo 'previous-cards-page-'.$contest_page_count ?>" class="row remove-margin">
                                    <?php } ?>
                                        <div class="card col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 remove-padding">
                                            <div class="card-body">
                                                <p class="card-text"><strong><?php echo $winner_text; ?></strong></p>
                                            </div>
                                            <div class="contest-cover">
                                                <a href="<?php echo $view_contest_url; ?>" class="contest-link"><img src="<?php echo $thumbnail_url; ?>" alt="Card image"></a>
                                                <a href="<?php echo $view_contest_url; ?>" class="contest-previous-status"><?php echo $claim_alert; ?></a>
                                            </div>
                                            <div class="card-body">
                                                <a href="<?php echo $view_contest_url; ?>" class="contest-link"><p class="card-text"><strong><?php echo $contest_title; ?></strong></p></a>
                                                <p class="contest-date-info">( From <?php echo date('jS M',strtotime(' + 0 day', strtotime($live_date))); ?> to <?php echo date('jS M',strtotime(' + 0 day', strtotime($end_date))); ?> )</p>
                                            </div>
                                        </div>
                                    <?php if ( $contest_added_count == $contests_per_page ) { ?>
                                        </div>
                                        <?php 
                                            $contest_added_count = 1;
                                            $contest_page_count = $contest_page_count + 1;
                                        } else {
                                            $contest_added_count = $contest_added_count + 1;
                                        }
                                    }
                                    $previous_contest_shown = 1;
                                }
                            }
                            ?>
                            <?php if ( $previous_contest_shown == 0 ) { ?>
                                <div class="card-body" style="text-align:center">
                                        <p class="card-text"><strong>No Previous Contest Exists</strong></p>
                                </div>
                            <?php
                                }
                                wp_reset_query();
                            ?>
                        </div>
                        <?php if ( $previous_contest_shown == 1 ) { ?>
                            <nav aria-label="...">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#previous-content-block" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <?php
                                        $page_index = 1;
                                        while ( $page_index <= $total_pages ) {
                                    ?>
                                            <li id="page-number-<?php echo $page_index; ?>" class="page-item <?php if ( $page_index == 1 ) { echo "active"; } ?>">
                                                <a class="page-link" href="#previous-content-block"><?php echo $page_index; ?></a>
                                            </li>
                                    <?php
                                            $page_index = $page_index + 1;
                                        }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="#previous-content-block">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php
                        }
                        ?>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</div>