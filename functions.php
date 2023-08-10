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
    wp_localize_script('nathmota_script', 'data', [
        'assetsBaseURL' => get_template_directory_uri(),
        'ajaxURL' => admin_url( 'admin-ajax.php' )
    ]);
}

add_action('wp_enqueue_scripts', 'nathmota_enqueue_scripts');

// Callback function to load more photos
function load_more_posts_callback()
{
    $page = intval($_GET['page']);

    $page = intval($_GET['page']);
    // Arguments for WP_Query to get more photos
    $args = array(
        'post_type' => 'photo',
        'offset' => ($page - 1) * 12
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

function filter_posts_callback(){
    // Arguments for WP_Query to get more photos
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'order' => $_GET['sort'],
    );

    // Taxquery = tableau de tableau [[], []]
    $taxQuery = [];
    // $_GET est une variable globale. Les clés ne sont pas nulles mais portent la chaine "null"
    if($_GET['format'] !== 'null') {
        $taxQuery[] = [
            'taxonomy' => 'format',
            'terms' => $_GET['format']
        ];
    }

    if($_GET['category'] !== 'null') {
        $taxQuery[] = [
            'taxonomy' => 'category',
            'terms' => $_GET['category']
        ];
    }

    $loadQuery = new WP_Query($args);

    $loadQuery->set('tax_query', $taxQuery);

    $posts = $loadQuery->get_posts();

    // Start the loop to display the additional photo
    for($i = 0; $i < count($posts); $i++){
        $post = $posts[$i];
        get_template_part('template-parts/photo-card', '', (array)$post);
    }

    // Always reset the post data when you're done with the custom query
    wp_reset_postdata();

    // Important: stop execution to prevent a trailing 0 from being added to the response
    die();
}

// Hook the AJAX action to the function
add_action('wp_ajax_load_more_posts', 'load_more_posts_callback');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback');

add_action('wp_ajax_filter_posts', 'filter_posts_callback');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_callback');