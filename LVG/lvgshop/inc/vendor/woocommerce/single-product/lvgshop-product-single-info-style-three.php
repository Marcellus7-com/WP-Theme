<?php
global $product;
$counter_switcher = cs_get_option('counter_enable_disable');
?>

<div class="col-xl-5">
    <div class="vr-product-details-content">
        <h3 class="mb-4 fw-semibold"><?php the_title(); ?></h3>
        <div class="product-rating">
            <?php woocommerce_template_single_rating(); ?>
        </div>
        <h5 class="mb-0 mt-30">
            <?php
            $_product = wc_get_product(get_the_ID());
            $product_price = $_product->get_price_html()
            ?>
            <span class="primary-text-color">
            <?php echo wp_kses($product_price, true); ?>
        </span>
        </h5>
        <div class="mb-40 mt-30">
            <?php woocommerce_template_single_excerpt(); ?>
        </div>
        <?php if ($counter_switcher){
            do_action('woocommerce_single_product_style_three_sale_countdown');
        } ?>

        <?php woocommerce_template_single_add_to_cart(); ?>
        <?php lvgshop_product_wishlist_button(); ?>
        <ul class="product-meta mt-32 ms-0">
            <li><?php printf('SKU: %s', $product->get_sku()) ?></li>
            <li><?php printf('Categories: %s', wc_get_product_category_list(get_the_ID(), ', ')) ?></li>
            <li><?php printf('Tags: %s', wc_get_product_tag_list(get_the_ID(), ', ')) ?></li>
        </ul>
    </div>
</div>




