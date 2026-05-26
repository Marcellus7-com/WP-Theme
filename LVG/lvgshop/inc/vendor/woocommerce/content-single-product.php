<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

$product_style = cs_get_option('product-layout-style');


?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <?php
    /**
     * Hook: woocommerce_before_single_product.
     *
     * @hooked wc_print_notices - 10
     */

    if (post_password_required()) {
        echo get_the_password_form(); // WPCS: XSS ok.
        return;
    }

    ?>
    <!--breadcrumb section start-->
    <div class="el-breadcrumb-section pb-120">
        <div class="container container-xxxl px-lg-0">
            <div class="contents-wrapper">
                <div class="left-side">
                    <ul>
                        <?php lvgshop_breadcrumbs(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->


    <?php
    if ($product_style == 'style-1'){
        wc_get_template_part( 'single-product/lvgshop-product-single-style', 'one' );
    }elseif ($product_style == 'style-2'){
        wc_get_template_part( 'single-product/lvgshop-product-single-style', 'two' );
    }elseif ($product_style == 'style-3'){
        wc_get_template_part( 'single-product/lvgshop-product-single-style', 'three' );
    }else{
        wc_get_template_part( 'single-product/lvgshop-product-single-style', 'one' );
    }
    ?>


    <?php
    wc_get_template_part( 'single-product/lvgshop-product-single', 'tab' );
    ?>

<!--    --><?php //woocommerce_output_related_products(); ?>
<!--    --><?php //do_action('woocommerce_after_single_product'); ?>
</div>
<div class="clearfix"></div>
