<?php
    require get_template_directory().'/inc/function-admin.php';
    require get_template_directory().'/inc/enqueue.php';
    require get_template_directory() . '/inc/theme-support.php';
    require get_template_directory() . '/inc/custom-post-type.php';
    require get_template_directory() . '/inc/ajax.php';

    function the_slug() {
        $post_data = get_post($post->ID, ARRAY_A);
        $slug = $post_data['post_name'];
        return $slug; 
    }

    function register_session()
    {
        if( !session_id() )
        {
            session_start();
        }
    }

    add_action('init', 'register_session');