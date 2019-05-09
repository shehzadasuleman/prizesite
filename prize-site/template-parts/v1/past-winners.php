<?php
/*
@package prizesitetheme
*/

$foodpanda_url = get_template_directory_uri() . '/img/foodpanda.jpg';
$error_message = esc_attr(get_option('prizesite_custom_filter_error_meesgae'));
date_default_timezone_set('Asia/Karachi');
$curr_date = date("F j, Y");

?>
<script type="text/javascript">var error_message = "<?= $error_message ?>";</script>
<div class="main-content">
    <div class="past-winners row">
        <div id="past-winners-sidebar-content" class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 remove-padding">
            <div class="row">
                <div class="col-12">
                    <p><a target="_blank"  href="https://www.youtube.com/watch?v=xJyCU8WgQp8"><img src="<?php echo $foodpanda_url ?>"></a></p>
                </div>
                <div id="past-winners-sidebar-content-fb-lg" class="col-12">
                    <!-- Facebook Page Plugin-->
                    <h3><p style="text-decoration:underline; color:black;">Our Winners Facebook Comments</p></h3>
                    <div class="fb-page" data-href="https://www.facebook.com/MuftPaise/" data-tabs="timeline" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MuftPaise/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MuftPaise/">MuftPaise</a></blockquote></div>
                    <!-- Facebook Page Plugin ends-->
                </div>
            </div>
        </div>
        <div id="past-winners-content" class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
            <div class="page-content">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
            </div>
            <table id="winners-data" class="table table-striped table-bordered responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Winnner</th>
                        <th>Actual Number</th>
                        <th>Price</th>
                        <th>Claimed</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    wp_reset_query();
                    $query = new WP_Query(array(
                        'post_type' => 'prizesite-winners',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ));
                    if($query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php $post_date = get_the_date(); ?>
                            <?php if ($post_date != $curr_date) { ?>
                                <tr>
                                        <td><?php echo $post_date; ?></td>
                                        <td><?php the_title(); ?></td>
                                        <td><?php echo get_post_meta( get_the_ID(), '_winners_actualnumber_value_key', true); ?></td>
                                        <td><?php echo get_post_meta( get_the_ID(), '_winners_prizeamount_value_key', true); ?></td>
                                        <td><?php echo get_post_meta( get_the_ID(), '_winners_prizeclaimed_value_key', true); ?></td>
                                </tr>
                            <?php } ?>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Winnner</th>
                        <th>Actual Number</th>
                        <th>Price</th>
                        <th>Claimed</th>
                    </tr>
                </tfoot>
            </table>
            <div id="past-winners-sidebar-content-fb-sm">
                <!-- Facebook Page Plugin-->
                <h3><p style="text-decoration:underline; color:black;">Our Winners Facebook Comments</p></h3>
                <div class="fb-page" data-href="https://www.facebook.com/MuftPaise/" data-tabs="timeline" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MuftPaise/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MuftPaise/">MuftPaise</a></blockquote></div>
                <!-- Facebook Page Plugin ends-->
            </div>
        </div>
    </div>
</div>