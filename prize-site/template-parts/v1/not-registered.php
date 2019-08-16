<?php
/*
@package prizesitetheme
*/
if (isset($_POST['CheckPrizePerformed'])) {
    $status = $_POST['CheckPrizePerformed'];
} else {
    $status = "False";
}
?>
<?php if ( $status == "True" ):?>
    <div class="main-content">
        <div class="row cover-ad-banner-parent">
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 cover-ad-banner">
                <h1><?php the_title() ?></h1>
                <h2><?php the_content() ?></h2>
            </div>
        </div>
    </div>
<?php elseif ( $status == "False" ):?>
    <?php
        $category_id = get_cat_ID('Check-Not-Performed');
        query_posts("cat=$category_id&posts_per_page=1");
        if (have_posts()) { the_post(); ?>
            <div class="main-content">
                <div class="row cover-ad-banner-parent">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 cover-ad-banner">
                        <h1 style="color:red;margin-bottom:0%"><?php the_title(); ?></h1>
                        <h2><?php the_content(); ?></h2>
                    </div>
                </div>
            </div>
    <?php } wp_reset_query(); ?>
<?php endif; ?>