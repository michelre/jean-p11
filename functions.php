<?php

add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
register_nav_menu('header', 'header');
register_nav_menu('footer', 'footer');

function nathmota_enqueue_styles()
{

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('nathmota-styles', get_template_directory_uri() . '/style.css', (0), $version, 'all');
}

add_action('wp_enqueue_scripts', 'nathmota_enqueue_styles');

function nathmota_enqueue_scripts()
{
    wp_enqueue_script('nathmota_script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'nathmota_enqueue_scripts');

// Callback function to load more photos
function load_more_posts_callback()
{

    // Arguments for WP_Query to get more photos
    $args = array(
        'post_type' => 'photo',
    );

    $loadQuery = new WP_Query($args);

    // Start the loop to display the additional photo
    if ($loadQuery->have_posts()) {
        while ($loadQuery->have_posts()) {
            $loadQuery->the_post();
            // Output the post content
            get_template_part('template-parts/photo-card');
        }
    }

    // Always reset the post data when you're done with the custom query
    wp_reset_postdata();

    // Important: stop execution to prevent a trailing 0 from being added to the response
    die();
}

// Hook the AJAX action to the function
add_action('wp_ajax_load_more_posts', 'load_more_posts_callback');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback');
