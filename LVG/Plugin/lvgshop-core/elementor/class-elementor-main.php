<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
define('LVGSHOP_ELEMENTOR_URL', plugins_url('/', __FILE__));
define('LVGSHOP_ELEMENTOR_PATH', plugin_dir_path(__FILE__));
define('LVGSHOP_ELEMENTOR_ROOT_URL', plugins_url(__FILE__));
define('LVGSHOP_ELEMENTOR_PL_ROOT_URL', plugin_dir_url(__FILE__));
define('LVGSHOP_ELEMENTOR_MODULES_PATH', LVGSHOP_ELEMENTOR_PATH . 'modules/');
define('LVGSHOP_PL_ASSETS', trailingslashit(LVGSHOP_ELEMENTOR_PL_ROOT_URL . 'assets'));
define('LVGSHOP_STICKY_ASSETS_URL', LVGSHOP_ELEMENTOR_URL . 'assets/');
define('LVGSHOP_HEADER_MODULES_URL', LVGSHOP_ELEMENTOR_URL . 'modules/');
define('LVGSHOP_ELEMENTOR_STICKY_TPL', LVGSHOP_ELEMENTOR_PATH . 'library/sticky-header/');

define('LVGSHOP_ROOT_FILE__', __FILE__);
define('LVGSHOP_TEMPLATES_FOR_ELEMENTOR_VERSION', '2.9');

require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop-elements-cat.php';

require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop_home_banner_widgets_functions.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop_blog_widgets_functions.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop_reviews_widgets_functions.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop-elementor-assets.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/sassplate-custom-bg.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'library/template-library/index.php';

require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop-custom-icon.php';

require_once LVGSHOP_ELEMENTOR_PATH . 'inc/dividers.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop-elementor-functions.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'inc/lvgshop-elementor-section.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/hero-style.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/banner-style.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/catagory.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/testimonial.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/icon-box-style.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/blog-style.php';
require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/widgets-function/faq-style.php';
$ps = new LvgshopElemSection();

function lvgshop_register_new_controls($controls_manager) {

    require_once LVGSHOP_ELEMENTOR_PATH . 'inc/gradient-control.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'inc/image-select-control.php';

    $controls_manager->register(new \Elementor\CustomControl\ImgSelector_Control());
    $controls_manager->register(new \Elementor\CustomControl\CustomGradient_Control());


}
add_action('elementor/controls/register', 'lvgshop_register_new_controls');

function lvgshop_elementor_widget_categorie($elements_manager) {

    $categories = [];
    $categories['lvgshop-ele-widgets-cat'] =
        [
            'title' => 'Lvgshop Elements',
            'icon'  => 'eicon-plug'
        ];

    $old_categories = $elements_manager->get_categories();

    $categories = array_merge($categories, $old_categories);

    $set_categories = function ( $categories ) {
        $this->categories = $categories;
    };

    $set_categories->call( $elements_manager, $categories );


}
add_action('elementor/elements/categories_registered', 'lvgshop_elementor_widget_categorie');



function lvgshop_elementor_elements() {
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-hero-section.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-catagory.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-banner.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-feedback.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-deal-banner.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-icon-box.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-blog.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-brand-logo.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-newsletter.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-flash-sell-grid.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-product-grid.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-product-list.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-product-filter.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-product-tab.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-product-list-with-video.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-faq.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-about-us.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/lvgshop-contact.php';
    require_once LVGSHOP_ELEMENTOR_PATH . 'widgets/menu_icon_list.php';
    
    
    
}
add_action('elementor/widgets/register', 'lvgshop_elementor_elements');


add_action('elementor/editor/after_enqueue_styles', 'lvgshop_widget_icon_style');
function lvgshop_widget_icon_style(){
    $cs_icon = plugins_url( 'widgets/t_icon.svg', __FILE__ );
    wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .lvgshop-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
}