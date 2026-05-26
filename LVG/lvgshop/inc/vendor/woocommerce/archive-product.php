<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
$page_meta = get_post_meta(get_the_ID(), 'pivoo_page_options', true);


$hide_breadcrumb = (!empty($page_meta['page_breadcrumb'])) ? $page_meta['page_breadcrumb'] : '';
$page_width = (!empty($page_meta['page_width'])) ? $page_meta['page_width'] : 'container';
$page_b_style = (!empty($page_meta['page_breadcrumb_style'])) ? $page_meta['page_breadcrumb_style'] : '';
if ($page_b_style == 'custom-style') {
    $global_page_icon = (!empty($page_meta['custom_page_icon'])) ? $page_meta['custom_page_icon'] : '';
} else {
    $global_page_icon = cs_get_option('global_page_icon');
}
$desktopcol = cs_get_option('lvgshop-archive-col');
$mobcol = cs_get_option('lvgshop-archive-col-mob');
$mobicustomgap = cs_get_option('mob_custom_row_gap');
$filtertext = cs_get_option('lvgshop-filter-shortcode');

$archivelayout = cs_get_option('lvgshop-archive-type');
$sidebarposition = cs_get_option('archive-sidebar-position');
$arcivebannerlistbg = cs_get_option('arcuve_banner_gallery_imgs');
$arcivebannerlistbgs = (!empty($arcivebannerlistbg['url'])) ? $arcivebannerlistbg['url'] : '';


$arcivebannerlisttitle = cs_get_option('arcive-title-text');

$arcivebannerlistsubtext = cs_get_option('arcive-sub-text');
$arcivebannerlistbuttonlink = cs_get_option('arcive-banner-link');
$arcivebannerlistbuttonlinks = (!empty($arcivebannerlistbuttonlink['url'])) ? $arcivebannerlistbuttonlink['url'] : '';

$title_hide_wd = cs_get_option('x_bd_width_set');
if ($title_hide_wd == true) {
    $containerxpc = 'container lvgshop-extended-container';
} else {
    $containerxpc = 'w-100';
}
$customrow_space = "";
if ($mobicustomgap == "on") {
    $customrow_space = "row-mob-smaller";
}
get_header('shop');


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20 (Removed)
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>

<section class="<?php echo esc_html($containerxpc); ?>">
    <!--breadcrumb section start-->
    <div class="breadcrumb-section pt-40 pb-40" data-background="assets/images/shapes/breadcrumb-bg.jpg">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0"><?php woocommerce_breadcrumb(); ?></p>
        </div>
    </div>
    <!--breadcrumb section end-->
</section>

<section class="lvgshop-woo-archive-main">
    <div class="container">


        <?php if ($archivelayout == "sidebar"){ ?>
        <div class="row gx-6">
            <?php } else { ?>
            <div class="without-sidebar">
                <?php } ?>
                <?php if ($archivelayout == "sidebar" && $sidebarposition == "left") { ?>
                    <div class="d-none d-md-block col-12 col-md-3 lvgshop-product-archive-sidebar">
                        <?php dynamic_sidebar('lvgshop-woo-sidebar'); ?>
                    </div>
                <?php } ?>

                <?php if ($archivelayout == 'sidebar'){ ?>
                <div class="col-12 col-md-9">
                    <?php } else { ?>
                    <div class="w-100">
                        <?php } ?>


                        <div class="row align-items-center">
                            <div class="col-12 col-md-4 pivoo-total-product-count">
                                <?php woocommerce_result_count(); ?>
                            </div>

                            <div class="col-4 col-md-2 lvgshop-product-filter-b">
                                <?php if ($archivelayout == "sidebar") { ?>
                                    <div class="d-md-none lvgshop-mobile-filter-sidebar">
                                        <button class="lvgshop-m-filter-btn" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#lvgshopCatCanvas" aria-controls="lvgshopCatCanvas">
                                            <i class="ri-equalizer-line"></i>
                                        </button>

                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="lvgshopCatCanvas"
                                             aria-labelledby="lvgshopCatCanvasLabel">

                                            <div class="offcanvas-body">
                                                <?php dynamic_sidebar('lvgshop-woo-sidebar'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-8 col-md-5 pivoo-product-filter text-md-end">
                                <?php
                                function subform() {
                                    // Check if the user is logged in
                                    if (is_user_logged_in()) {
                                        // Get the current user's display name
                                        $user_display_name = wp_get_current_user()->user_firstname;
                                        echo "<pre>";
                                        print_r($user_display_name);
                                        echo "</pre>";
                                    } else {
                                        $user_display_name = 'Guest';
                                    }
                                    // Get the blog name
                                    $blog_name = get_bloginfo('name');
                                    // Display the welcome message and subscription form
                                    echo 'Hey ' . $user_display_name . ', welcome to ' . $blog_name . '! You can subscribe to our newsletter here: ';
                                    ?>
                                    Enter your email: <?php echo subform(); ?>
                                    <?php
                                }

                                ?>
                                <?php woocommerce_catalog_ordering(); ?>
                            </div>
                            <div class="col-8 col-md-1 text-md-end uron_shope_filter_sty">
                                <div class="lvgshop__product_view_style">
                                    <div class="nav layout-grid " id="nav-tab" role="tablist">
                                        <a class="me-2 active" id="post-grid-tab" data-bs-toggle="tab" data-bs-target="#post-grid" role="tab" aria-controls="post-grid" aria-selected="true">
                                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="10.7139" width="9" height="3" fill="#121111"/>
                                                <rect x="10.7139" y="7" width="9" height="3" fill="#121111"/>
                                                <rect x="10.7139" y="14" width="9" height="3" fill="#121111"/>
                                                <rect width="9" height="3" fill="#121111"/>
                                                <rect y="7" width="9" height="3" fill="#121111"/>
                                                <rect y="14" width="9" height="3" fill="#121111"/>
                                            </svg>
                                        </a>
                                        <a class="" id="post-list-tab" data-bs-toggle="tab" data-bs-target="#post-list" role="tab" aria-controls="post-list" aria-selected="false">
                                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="5.71387" width="14.2857" height="3" fill="#121111"/>
                                                <rect x="5.71387" y="7" width="14.2857" height="3" fill="#121111"/>
                                                <rect x="5.71387" y="14" width="14.2857" height="3" fill="#121111"/>
                                                <rect width="3.80952" height="3" fill="#121111"/>
                                                <rect y="7" width="3.80952" height="3" fill="#121111"/>
                                                <rect y="14" width="3.80952" height="3" fill="#121111"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="lvgshop__product-view-style-tab-content tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="post-grid" role="tabpanel" aria-labelledby="post-grid-tab">
                                    <?php if ($desktopcol){ ?>
                                    <div class="lvgshop-shop-product-grid row <?php echo esc_html($customrow_space); ?> row-<?php echo esc_html($mobcol); ?> row-cols-<?php echo esc_html($desktopcol); ?>">
                                        <?php } else { ?>
                                        <div class="lvgshop-shop-product-grid row row-cols-1 row-cols-md-3">
                                            <?php } ?>
                                            <?php if (wc_get_loop_prop('total')) {
                                                while (have_posts()) {
                                                    the_post();

                                                    /**
                                                     * Hook: woocommerce_shop_loop.
                                                     */
                                                    do_action('woocommerce_shop_loop');

                                                    wc_get_template_part('content', 'product');
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade " id="post-list" role="tabpanel" aria-labelledby="post-list-tab">
                                        <?php if ($desktopcol){ ?>
                                        <div class="lvgshop-shop-product-list row <?php echo esc_html($customrow_space); ?> row-cols-1 lvgshop__product-view-style-list g-30 mt-20">
                                            <?php } else { ?>
                                            <div class="lvgshop-shop-product-list row row-cols-1 lvgshop__product-view-style-list">
                                                <?php } ?>


                                                <?php
                                                $i = 0;
                                                if (wc_get_loop_prop('total')) {

                                                    while (have_posts()) {
                                                        the_post();

                                                        /**
                                                         * Hook: woocommerce_shop_loop.
                                                         */
                                                        do_action('woocommerce_shop_loop');

                                                        wc_get_template_part('content', 'product-list');

                                                    }

                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div><!---Tab End -->

                                <?php
                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                echo woocommerce_pagination();

                                ?>
                                <?php if ($archivelayout == "sidebar" && $sidebarposition == "right") { ?>
                                    <div class="col-12 d-none d-md-block col-md-3 lvgshop-product-archive-sidebar">
                                        <?php dynamic_sidebar('lvgshop-woo-sidebar'); ?>
                                    </div>
                                <?php } ?>
                            </div>


                        </div>

</section>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

?>
<?php

get_footer('shop');

?>
