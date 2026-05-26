<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($related_products) {
    ?>
    <!--featured products start-->
    <!--trending products section start-->
    <section class="el2-trending-products bg-white overflow-hidden pt-115 wow fadeInUp">
        <div class="container-1440">
            <div class="row justify-content-center mb-10">
                <div class="col-lg-6 wow fadeInUp">
                    <div class="el2-section-title text-center">
                        <span class="el2-section-subtitle">Trending Items</span>
                        <h2 class="fw-semibold">Today's Flash Sales</h2>
                    </div>
                </div>
            </div>
            <div class="trendy-product-details-slider">
                <?php
                $e = 2;
                foreach ($related_products as $related_product) {
                    $post_object = get_post($related_product->get_id());
                    setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                     ?>
                <div class="col-xxl-3 col-lg-4 col-md-6 wow fadeInUp mt-30" data-wow-delay=".<?php echo esc_html($e++) ?>s">
                   <?php  wc_get_template_part('product-style/product-style', 'two'); ?>
                </div>
                    <?php


                }
                ?>
            </div>
        </div>
    </section>

    <?php
};

wp_reset_postdata();
