<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!class_exists('Lvgshop_Theme_Script')) {

    class Lvgshop_Theme_Script
    {


        public function __construct()
        {


            add_action('wp_enqueue_scripts', array($this, 'lvgshop_scripts'));

            add_action('admin_enqueue_scripts', array($this, 'lvgshop_register_admin_styles'));


        }



#-----------------------------------------------------------------#
# Enqueue Styles & scripts
#-----------------------------------------------------------------#/

        public function lvgshop_scripts()
        {

           
            
            wp_enqueue_style('bootstrap', LVGSHOP_URL . '/assets/css/bootstrap.min.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('Font-Awesome', LVGSHOP_URL . '/assets/css/all.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('lvgshop-default', LVGSHOP_URL . '/assets/css/theme-default.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('slick', LVGSHOP_URL . '/assets/css/slick.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('jquery-ui', LVGSHOP_URL . '/assets/css/jquery-ui.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('iconly', LVGSHOP_URL . '/assets/css/iconly.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('icomoon', LVGSHOP_URL . '/assets/css/icomoon.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('swiper', LVGSHOP_URL . '/assets/css/swiper-bundle.min.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('fancybox', LVGSHOP_URL . '/assets/css/fancybox.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('animate', LVGSHOP_URL . '/assets/css/animate.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('magnific-popup', LVGSHOP_URL . '/assets/css/magnific-popup.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('lvgshop-style', LVGSHOP_URL . '/assets/css/lvgshop-style.css', false, LVGSHOP_VERSION, 'all');
            wp_enqueue_style('lvgshop-google-fonts', lvgshop_fonts_url(), array(), null);

            wp_enqueue_script('popper', LVGSHOP_URL . '/assets/js/popper.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('bootstrap', LVGSHOP_URL . '/assets/js/bootstrap.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('slick', LVGSHOP_URL . '/assets/js/slick.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('swiper', LVGSHOP_URL . '/assets/js/swiper.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('marquee-min', LVGSHOP_URL . '/assets/js/marquee.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('jquery-ui', LVGSHOP_URL . '/assets/js/jquery-ui.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('nice-select', LVGSHOP_URL . '/assets/js/nice-select.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('masonry', LVGSHOP_URL . '/assets/js/masonry.pkgd.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('fancybox', LVGSHOP_URL . '/assets/js/fancybox.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('countdownmain', LVGSHOP_URL . '/assets/js/countdown.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('countdown', LVGSHOP_URL . '/assets/js/countdown.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('wow', LVGSHOP_URL . '/assets/js/wow.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('progress-bar', LVGSHOP_URL . '/assets/js/progress-bar.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('parallax', LVGSHOP_URL . '/assets/js/parallax.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('tilt-js', LVGSHOP_URL . '/assets/js/tilt-js.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('magnific-popup', LVGSHOP_URL . '/assets/js/magnific-popup.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('waypoints', LVGSHOP_URL . '/assets/js/waypoints.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('counterup-min', LVGSHOP_URL . '/assets/js/counterup.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('preloader', LVGSHOP_URL . '/assets/js/preloader.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('isotop-min', LVGSHOP_URL . '/assets/js/isotop.min.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('jquery-zoom', LVGSHOP_URL . '/assets/js/jquery.zoom.js', array('jquery'), LVGSHOP_VERSION, true);
            wp_enqueue_script('lvgshop-script', LVGSHOP_URL . '/assets/js/lvgshop-script.js', array('jquery'), LVGSHOP_VERSION, true);


            $ajax_url = admin_url('admin-ajax.php', 'relative');
            $main_values = array();
            $woo_msg = esc_attr__('You have added the item to your shopping cart!', 'lvgshop');
            $main_values['dataAddCartMsg'] = $woo_msg;
            $script_params = array(
                'ajax_url'					=> $ajax_url
            );



            if (class_exists('Lvgshop_Core')) {
                if (class_exists('WooCommerce')) {
                    
                      if ( !wp_script_is( 'wc-cart-fragments', 'enqueued') && wp_script_is( 'wc-cart-fragments', 'registered' ) ) {

                        // Enqueue the wc-cart-fragments script
                        
                        wp_enqueue_script( 'wc-cart-fragments' );
                        
                         }
 
                    wp_enqueue_script('lvgshop-woo', LVGSHOP_URL . '/assets/js/lvgshop-wc.js', array('jquery'), LVGSHOP_VERSION, true);
                  

                    wp_enqueue_script('lvgshop-mini-cart', LVGSHOP_URL . '/assets/js/lvgshop-mini-cart.js', array('jquery'), LVGSHOP_VERSION, true);
                    wp_localize_script( 'lvgshop-mini-cart', 'lvgshop_params', $script_params );
                    
                      wp_localize_script('lvgshop-woo', 'lvgshop_main_object', $main_values);


                }
            }


            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }




#-----------------------------------------------------------------#
# Register/Enqueue JS/CSS In Admin Panel
#-----------------------------------------------------------------#

        public function lvgshop_register_admin_styles()
        {
            wp_enqueue_style('lvgshop-admin-css', LVGSHOP_URL . '/assets/css/admin.css');
            wp_enqueue_style('lvgshop-iconly-css', LVGSHOP_URL . '/assets/css/iconly.css');
        }


    }

    new Lvgshop_Theme_Script;
}