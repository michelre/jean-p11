<?php 

function nathmota_enqueue_styles() {

    wp_enqueue_style('nathmota-styles', get_template_directory_uri(  ).'/style.css', (0), '1.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'nathmota_enqueue_styles' )

?>