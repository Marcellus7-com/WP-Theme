<?php

/**
 * Custom Font Family
 */
if ( ! function_exists( 'lvgshop_custom_font_load' ) ) {
  function lvgshop_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo wp_kses( $font['css'], 'post' );
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. $font['svg'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'lvgshop_custom_css' ) ) {
  function lvgshop_custom_css() {
    wp_enqueue_style('lvgshop-default-style', get_template_directory_uri() . '/style.css');
    $output  = lvgshop_custom_font_load();
    //$output .= lvgshop_dynamic_styles();
    $custom_css = lvgshop_compress_css_lines( $output );

    wp_add_inline_style( 'lvgshop-default-style', $custom_css );
   
  }
  add_action( 'wp_enqueue_scripts', 'lvgshop_custom_css' );
}

function display_current_user_name() {
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $blog_name = get_bloginfo( 'name' );
        echo "<pre>";
        print_r($blog_name);
        echo"</pre>";
        return 'Welcome, ' . esc_html($current_user->display_name) . '!';
    } else {
        return 'Welcome, Guest!';
    }
}
add_shortcode('current_user_name', 'display_current_user_name');