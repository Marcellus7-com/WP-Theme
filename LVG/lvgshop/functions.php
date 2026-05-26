<?php
/**
 * LVG Shop by M7 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lvgshop
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

#-----------------------------------------------------------------#
# Defined Constants
#-----------------------------------------------------------------#/
define('LVGSHOP_THEME_NAME', 'lvgshop');
if (!defined('LVGSHOP_PATH')) define('LVGSHOP_PATH', get_template_directory());
if (!defined('LVGSHOP_URL')) define('LVGSHOP_URL', get_template_directory_uri());
define('LVGSHOP_THEME_DIR', wp_normalize_path(LVGSHOP_PATH . '/'));
define('LVGSHOP_THEME_URI', preg_replace('/^http(s)?:/', '', LVGSHOP_URL) . '/');
define('LVGSHOP_CHILD_PATH', get_stylesheet_directory());
defined('LVGSHOP_USER_LOGGED') or define('LVGSHOP_USER_LOGGED', is_user_logged_in());

#-----------------------------------------------------------------#
# Site Content Width
#-----------------------------------------------------------------#/
if (!isset($content_width)) $content_width = 640;

if (!class_exists('Lvgshop_Theme_Setup')) {

    class Lvgshop_Theme_Setup
    {

        public function __construct() {

            /* includes_files Theme Files */

            add_action('after_setup_theme', array($this, 'includes_files'), 4);

            /* Main Theme Options */

            add_action('after_setup_theme', array($this, 'theme_support'));

            /* Register Widget */
            add_action('widgets_init', array($this, 'lvgshop_widgets_init'));

        }

        public function includes_files() {
            /**
             * Implement the Custom Header feature.
             */
            require LVGSHOP_PATH . '/inc/custom-header.php';

            /**
             * Custom template tags for this theme.
             */
            require LVGSHOP_PATH . '/inc/template-tags.php';

            /**
             * Functions which enhance the theme by hooking into WordPress.
             */
            require LVGSHOP_PATH . '/inc/template-functions.php';
            require LVGSHOP_PATH . '/inc/template-post.php';

            /**
             * Customizer additions.
             */
            require LVGSHOP_PATH . '/inc/customizer.php';

            /**
             * Enqueue.
             */

            require LVGSHOP_PATH . '/inc/lvgshop-enqueue.php';

            /**
             * Navwalker additions.
             */
            require LVGSHOP_PATH . '/inc/bootstrap-navwalker.php';
            require LVGSHOP_PATH . '/inc/lvgshop-nav-walker.php';

            require LVGSHOP_PATH . '/inc/lvgshop-accordion-walker.php';


            /**
             * Comment.
             */
            require LVGSHOP_PATH . '/inc/lvgshop_comment.php';

            /**
             * Admin Page.
             */
            require LVGSHOP_PATH . '/inc/admin/admin.php';
            require LVGSHOP_PATH . '/inc/admin/admin-init.php';

            /**
             * Breadcrumb.
             */
            require LVGSHOP_PATH . '/inc/breadcrumb.php';

            /**
             * Load Jetpack compatibility file.
             */
            if (defined('JETPACK__VERSION')) {
                require LVGSHOP_PATH . '/inc/jetpack.php';
            }

            /**
             * Load WooCommerce compatibility file.
             */
            if (class_exists('WooCommerce')) {
                require LVGSHOP_PATH . '/inc/woocommerce.php';
                require LVGSHOP_PATH . '/inc/template-product.php';
                require LVGSHOP_PATH . '/inc/vendor/woo-single-product-structure.php';
            }

            if (!is_customize_preview() && is_admin()) {
                require_once (LVGSHOP_PATH. '/inc/admin/merlin/vendor/autoload.php' );
                require_once (LVGSHOP_PATH. '/inc/admin/merlin/class-merlin.php' );
                require_once (LVGSHOP_PATH. '/inc/admin/merlin/merlin-config.php' );
                require_once (LVGSHOP_PATH. '/inc/admin/merlin/merlin-filters.php' );
            }

            /*
             * Codestar Custom icon Include
             */
            include_once(LVGSHOP_PATH . '/inc/custom-icon-for-codestar.php');

        }


        public function theme_support() {
            // Set our theme version.
            if (!defined('LVGSHOP_VERSION')) {
                // Replace the version number of the theme on each release.
                define('LVGSHOP_VERSION', '1.4.2');
            }
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on LVG Shop by M7, use a find and replace
             * to change 'lvgshop' to the name of your theme in all the template files.
             */
            load_theme_textdomain('lvgshop', LVGSHOP_PATH . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            add_filter('wpcf7_autop_or_not', '__return_false');

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');


            add_image_size('lvgshop-blog-sthome-one', 740, 540, true);
            add_image_size('lvgshop-blog-sthome-two', 430, 300, true);
            add_image_size('lvgshop-blog-sthome-three', 370, 417, true);
            add_image_size('lvgshop-blog-sthome-four', 370, 300, true);
            add_image_size('lvgshop-blog-sthome-five', 570, 400, true);
            add_image_size('lvgshop-navigation-image', 80, 80, true);
            add_image_size('lvgshop-blog-side-square', 88, 88, true);
            add_image_size('lvgshop-single-portfolio-thumbnail', 570, 710, true);
            add_image_size('lvgshop-portfolio-style-two', 120, 120, true);
            add_image_size('lvgshop-portfolio-style-four', 306, 340, true);
            add_image_size('lvgshop-product-quick-view', 488, 683, true);
            add_image_size('lvgshop-hero-product-thumbnail', 120, 112, true);
            add_image_size('lvgshop-blog-style-one-thumbnail', 416, 382, true);
            add_image_size('lvgshop-blog-style-two-thumbnail', 416, 483, true);
            add_image_size('lvgshop-product-single-thumbnail', 91, 83, true);
            add_image_size('lvgshop-product-single-thumbnail-style-three', 442, 370, true);
            add_image_size('lvgshop-product-single-gallery-img-style-three', 258, 282, true);
            add_image_size('lvgshop-quick-view-slider', 688, 846, true);
            add_image_size('lvgshop-author-image', 200, 180, true);

            // Image Size Cropping When Upload an image smaller than the size
            if (!function_exists('lvgshop_thumbnail_upload_scale')) {
                function lvgshop_thumbnail_upload_scale($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {

                    if (!$crop) return null; // let the wordpress default function handle this

                    $aspect_ratio = $orig_w / $orig_h;
                    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

                    $crop_w = round($new_w / $size_ratio);
                    $crop_h = round($new_h / $size_ratio);

                    $s_x = floor(($orig_w - $crop_w) / 2);
                    $s_y = floor(($orig_h - $crop_h) / 2);

                    return array(0, 0, (int)$s_x, (int)$s_y, (int)$new_w, (int)$new_h, (int)$crop_w, (int)$crop_h);
                }
            }
            add_filter('image_resize_dimensions', 'lvgshop_thumbnail_upload_scale', 10, 6);


            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'main' => esc_html__('Main Menu', 'lvgshop'),
                    'mobile-menu' => esc_html__('Mobile Menu', 'lvgshop'),
                    'vertical-menu' => esc_html__('Vertical Menu', 'lvgshop'),
                    'mobile-category-menu' => esc_html__('Mobile Category Menu', 'lvgshop'),
                    'account-menu' => esc_html__('Account Menu', 'lvgshop'),
                )
            );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'lvgshop_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');


            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height' => 250,
                    'width' => 250,
                    'flex-width' => true,
                    'flex-height' => true,
                )
            );


            #-----------------------------------------------------------------#
# Gutenberg
#-----------------------------------------------------------------#/
            // Theme supports wide images, galleries and videos.
            add_theme_support('align-wide');
            add_theme_support('wp-block-styles');
            add_theme_support('editor-styles');
            add_theme_support('responsive-embeds');
            add_theme_support('custom-units');

            remove_theme_support('widgets-block-editor');


            add_editor_style('style-editor.css');
            add_editor_style('https://fonts.googleapis.com/css2?family=Open+Sans&family=Quicksand:wght@500;600;700&display=swap');


            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                array(
                    array(
                        'name' => esc_attr__('Small', 'lvgshop'),
                        'shortName' => esc_attr__('S', 'lvgshop'),
                        'size' => 16,
                        'slug' => 'small',
                    ),
                    array(
                        'name' => esc_attr__('Normal', 'lvgshop'),
                        'shortName' => esc_attr__('M', 'lvgshop'),
                        'size' => 18,
                        'slug' => 'normal',
                    ),
                    array(
                        'name' => esc_attr__('Large', 'lvgshop'),
                        'shortName' => esc_attr__('L', 'lvgshop'),
                        'size' => 24,
                        'slug' => 'large',
                    ),
                    array(
                        'name' => esc_attr__('Huge', 'lvgshop'),
                        'shortName' => esc_attr__('XL', 'lvgshop'),
                        'size' => 42,
                        'slug' => 'huge',
                    ),
                )
            );

            // Make specific theme colors available in the editor.
            add_theme_support('editor-color-palette', array(
                array(
                    'name' => __('Light gray', 'lvgshop'),
                    'slug' => 'light-gray',
                    'color' => '#f5f5f5',
                ),
                array(
                    'name' => __('Medium gray', 'lvgshop'),
                    'slug' => 'medium-gray',
                    'color' => '#999',
                ),
                array(
                    'name' => __('Dark gray', 'lvgshop'),
                    'slug' => 'dark-gray',
                    'color' => '#222a36',
                ),

                array(
                    'name' => __('Purple', 'lvgshop'),
                    'slug' => 'purple',
                    'color' => '#5a00f0',
                ),

                array(
                    'name' => __('Dark Blue', 'lvgshop'),
                    'slug' => 'dark-blue',
                    'color' => '#28375a',
                ),

                array(
                    'name' => __('Red', 'lvgshop'),
                    'slug' => 'red',
                    'color' => '#c44d58',
                ),

                array(
                    'name' => __('Yellow', 'lvgshop'),
                    'slug' => 'yellow',
                    'color' => '#ecca2e',
                ),

                array(
                    'name' => __('Green', 'lvgshop'),
                    'slug' => 'green',
                    'color' => '#64a500',
                ),

                array(
                    'name' => __('White', 'lvgshop'),
                    'slug' => 'white',
                    'color' => '#ffffff',
                ),
            ));

            add_theme_support('editor-font-sizes', array(
                array(
                    'name' => __('Small', 'lvgshop'),
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => __('Normal', 'lvgshop'),
                    'size' => 16,
                    'slug' => 'normal'
                ),
                array(
                    'name' => __('Large', 'lvgshop'),
                    'size' => 36,
                    'slug' => 'large'
                ),
                array(
                    'name' => __('Huge', 'lvgshop'),
                    'size' => 40,
                    'slug' => 'huge'
                )
            ));


        }


        public function lvgshop_widgets_init() {
            register_sidebar(
                array(
                    'name' => esc_html__('Sidebar', 'lvgshop'),
                    'id' => 'lvgshop-sidebar',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget' => '</section>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name' => esc_html__('Woo Archive', 'lvgshop'),
                    'id' => 'lvgshop-woo-sidebar',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget' => '</section>',
                    'before_title' => '<h2 class="widget-title wideget-title-shop">',
                    'after_title' => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name' => esc_html__('Case Study Sidebar', 'lvgshop'),
                    'id' => 'lvgshop-cs-sidebar',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<section id="%1$s" class="widget %2$s global-animated-hidden global-animated-up">',
                    'after_widget' => '</section>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Header Language Bar', 'lvgshop'),
                    'id' => 'header_language_bar',
                    'description' => esc_html__('Add Language Code here.', 'lvgshop'),
                    'before_widget' => '',
                    'after_widget' => '',
                    'before_title' => '',
                    'after_title' => '',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Header Currency', 'lvgshop'),
                    'id' => 'header_currency',
                    'description' => esc_html__('Add Currency here.', 'lvgshop'),
                    'before_widget' => '',
                    'after_widget' => '',
                    'before_title' => '',
                    'after_title' => '',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer About / Newsletter One', 'lvgshop'),
                    'id' => 'lvgshop-about-widget',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<div id="%1$s" class="%2$s elc3-footer-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '',
                    'after_title' => '',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer Userful Links', 'lvgshop'),
                    'id' => 'lvgshop-useful-links-widget',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<div id="%1$s" class="%2$s elc3-footer-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="text-white widget-title mb-40 fw-normal">',
                    'after_title' => '</h4>',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer Userful Links Two', 'lvgshop'),
                    'id' => 'lvgshop-useful-links-widget-two',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<div id="%1$s" class="%2$s elc3-footer-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="text-white widget-title mb-40 fw-normal">',
                    'after_title' => '</h4>',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer Userful Links Three', 'lvgshop'),
                    'id' => 'lvgshop-useful-links-widget-three',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<div id="%1$s" class="%2$s elc3-footer-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4>',
                    'after_title' => '</h4>',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer About / Newsletter Two', 'lvgshop'),
                    'id' => 'lvgshop-footer-style-one-newsletter',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '<div id="%1$s" class="%2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="mb-40">',
                    'after_title' => '</h4>',
                )
            );
//            register_sidebar(
//                array(
//                    'name' => esc_html__('Footer Style Two Newsletter', 'lvgshop'),
//                    'id' => 'lvgshop-footer-style-two-newsletter',
//                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
//                    'before_widget' => '<div id="%1$s" class="%2$s">',
//                    'after_widget' => '</div>',
//                    'before_title' => '<h3 class="mb-0 fw-regular text-white">',
//                    'after_title' => '</h3>',
//                )
//            );
            register_sidebar(
                array(
                    'name' => esc_html__('Footer Instagram Gallery', 'lvgshop'),
                    'id' => 'lvgshop-footer-instagram-gallery',
                    'description' => esc_html__('Add widgets here.', 'lvgshop'),
                    'before_widget' => '',
                    'after_widget' => '',
                    'before_title' => '',
                    'after_title' => '',
                )
            );
        }
    }

    new Lvgshop_Theme_Setup;

}



//Comment Field Order
add_filter( 'comment_form_fields', 'lvgshop_comment_fields_custom_order' );
function lvgshop_comment_fields_custom_order($fields){
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    unset( $fields['cookies'] );
    unset( $fields['url'] );
    $fields['comment'] = $comment_field;
    return $fields;
}






