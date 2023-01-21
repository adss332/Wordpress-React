<?php

function enqueue() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '', true );
    wp_enqueue_script(
        'my-theme-frontend',
        get_theme_file_uri() . '/build/index.js',
        ['wp-element'],
        null, true //For production use wp_get_theme()->get('Version')
    );
    wp_enqueue_script('jquery');
}

add_action( 'wp_enqueue_scripts', 'enqueue' );

