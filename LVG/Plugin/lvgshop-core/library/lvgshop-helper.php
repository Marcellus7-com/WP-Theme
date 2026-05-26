<?php
/* Compress CSS */
if ( ! function_exists( 'lvgshop_compress_css_lines' ) ) {
  function lvgshop_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'lvgshop_upload_mimes' ) ) {
  function lvgshop_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['svg']   = 'font/svg';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'lvgshop_upload_mimes' );
}
if ( ! function_exists( 'lvgshop_single_blog_social_share' ) ) :
function lvgshop_single_blog_social_share() {

    $dmsocialURL = urlencode(get_permalink());

    // Get current page title
    $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
    $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
    $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;


    echo '<div class="social-wrapper">';
    echo '<a href="'.$facebookURL.'" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>';
    echo '<a href="'.$twitterURL.'" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>';
    echo '<a href="'.$pinterestURL.'" target="_blank" class="pinterest"><i class="fab fa-pinterest"></i></a>';
    echo '<a href="'.$linkedInURL.'" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a>';
    echo '</div>';


};
endif;

add_action( 'wpcf7_init', 'lvgshop_cf7_doctor_list' );

function lvgshop_cf7_doctor_list() {
    wpcf7_add_form_tag( array( 'doctorlist', 'doctorlist*' ), 
'lvgshop_cf7_doctor_selector', true );
}

function lvgshop_cf7_doctor_selector( $tag ) {

    $tag = new WPCF7_FormTag( $tag );

    if ( empty( $tag->name ) ) {
        return '';
    }

    $doctorlist = '';

    $query = new WP_Query(array(
        'post_type' => 'doctor',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby'       => 'title',
        'order'         => 'ASC',
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $post_title = get_the_title();
        $doctorlist .= sprintf( '<option value="%1$s">%2$s</option>', 
esc_html( $post_title ), esc_html( $post_title ) );
    }

    wp_reset_query();

    $doctorlist = sprintf(
        '<select name="%1$s" id="%2$s" class="wpcf7-form-control wpcf7-select lable-form-all wide"><option>Choose Doctor</option> %3$s</select>', $tag->name,
    $tag->name . '-options',
        $doctorlist );

    return $doctorlist;
}

//use this tag in your form
//[doctorlist your-field-name]


add_action( 'wpcf7_init', 'lvgshop_cf7_department_list' );

function lvgshop_cf7_department_list() {
    wpcf7_add_form_tag( array( 'departmentlist', 'departmentlist*' ), 
'lvgshop_cf7_department_selector', true );
}

function lvgshop_cf7_department_selector( $tag ) {

    $tag = new WPCF7_FormTag( $tag );

    if ( empty( $tag->name ) ) {
        return '';
    }

    $departmentlist = '';
    $terms = get_terms('department');
    if ( !empty( $terms ) && !is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {

            $dep_title = $term->name;
        $departmentlist .= sprintf( '<option value="%1$s">%2$s</option>', 
esc_html( $dep_title ), esc_html( $dep_title ) );
   
        }
        
    }


    $departmentlist = sprintf(
        '<select name="%1$s" id="%2$s" class="wpcf7-form-control wpcf7-select lable-form-all wide"><option>Choose Department</option> %3$s</select>', $tag->name,
    $tag->name . '-options',
        $departmentlist );

    return $departmentlist;
}

//use this tag in your form
//[departmentlist your-field-name]


