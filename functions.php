<?php

add_theme_support('title-tag');
add_theme_support('menus');
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
