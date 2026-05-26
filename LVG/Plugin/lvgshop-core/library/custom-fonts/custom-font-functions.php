<?php

  /**
   * Custom New Font Family
   */


if( ! function_exists( 'lvgshop_custom_font_family' ) ) {

function lvgshop_custom_font_family( $fonts ) {
$fontsfile = cs_get_option( 'font_family' );
 if( ! empty( $fontsfile ) ) {
   foreach ( $fontsfile as $key => $value ) {
       $fontsname= $value['name'];
   $fonts[$fontsname] = array( 'normal' );
    
   }
}
    return $fonts;

  }
  add_filter( 'csf_field_typography_customwebfonts', 'lvgshop_custom_font_family' );
}

/**
 * Check Custom Font
 */
if ( ! function_exists( 'lvgshop_custom_upload_font' ) ) {
  function lvgshop_custom_upload_font( $font ) {

    $fonts  = cs_get_option( 'font_family' );
    $custom = array();

    if( ! empty( $fonts ) ) {
      foreach ( $fonts as $custom_font ) {
        $custom[] = $custom_font['name'];
      }
    }

    return ( ! empty( $font ) && ! empty( $custom ) && in_array( $font, $custom ) ) ? true : false;

  }
}
