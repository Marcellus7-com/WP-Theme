<?php
/**
 * Theme functions and definitions.
 */
function lvgshop_child_enqueue_styles() {
    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'lvgshop-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'lvgshop-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }
    wp_enqueue_style( 'lvgshop-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'lvgshop-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action(  'wp_enqueue_scripts', 'lvgshop_child_enqueue_styles' );