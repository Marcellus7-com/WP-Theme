<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

global $product, $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$nonce = wp_create_nonce("product_nonce");

$anchor_class = 'btn-blue el-btn w-100 mt-20';
$icon_classs = 'ele-icon lvgshop-shopping-bag';
// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$product_style = cs_get_option('lvgshop-archive-style');

?>
<div class="col-12 wow fadeInUp" data-wow-delay=".2s">
    <div class="el2-product-card el2-product-card-list-view position-relative">
        <?php
        $postdate = get_the_time('Y-m-d'); // Post date
        $postdatestamp = strtotime($postdate);
        $riboontext = get_theme_mod('recent_ribbon_text', 'New'); // Newness in days
        $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
        if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
            echo '<span class="el2-offer-badge green-badge">hot</span>';
        }
        ?>

        <!-- thumbnail -->
        <div class="feature-thumbnail">
            <div class="img-box">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid">
                </a>
            </div>
        </div>

        <!-- product info -->
        <div class="el2-product-content">
            <span class="categories">
                <?php
                $terms = get_the_terms( $product->get_id(), 'product_cat' );
                if ( ! empty( $terms ) ) {
                    echo '<a class="text-blue" href="' . esc_url( get_term_link($terms[0]->term_id) ) . '">' . esc_html( $terms[0]->name ) . '</a>';
                }
                ?>
            </span>
            <a href="<?php the_permalink(); ?>" class="el2-product-title"><?php the_title(); ?></a>
            <div class="el2-product-rating">
                <?php lvgshop_get_star_rating(); ?>
            </div>

            <p class="des mt-10 mb-0 ">
                <?php the_excerpt(); ?>
            </p>
        </div>

        <svg class="line-svg d-none d-xl-block" width="1" height="175" viewBox="0 0 1 175" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <line x1="0.5" y1="-2.18557e-08" x2="0.500008" y2="175" stroke="#E8EAF2" />
        </svg>

        <!-- add to cart -->
        <div class="el2-product-bottom">
            <?php
            $p_stock = $product->get_manage_stock();
            $p_sale = $product->get_total_sales();
            if($p_stock){
                $progress_cal = $p_stock *  $p_sale / $p_stock;
                $progress_pr = 100 - $progress_cal;
            }
            $product_stock_left = $product->get_stock_quantity() - $product->get_total_sales();


            if($p_stock){
            ?>
                <div class="el2-stock-status mt-3">
                    <p class="mb-2"><?php _e('Avaiable :', 'lvgshop'); ?> <strong><?php  echo maybe_unserialize($product_stock_left); ?> / <?php echo maybe_unserialize($product->get_stock_quantity()); ?></strong></p>
                    <div class="stock">
                        <span class="available" data-width="<?php echo maybe_unserialize($progress_pr); ?>%"></span>
                    </div>
                </div>
            <?php } ?>
            <p class="mb-0 el2-product-price mt-3">
                <?php echo maybe_unserialize($product->get_price_html()); ?>
            </p>

            <?php do_action('lvgshop_product_add_to_cart_with_text', $post, $product, $nonce, $anchor_class, $icon_classs); ?>

            <?php
                if (class_exists('YITH_WCWL')) {
                    ?>

                    <?php
                    $wishNonce = wp_create_nonce("add_to_wishlist");
                    $like_link = admin_url('admin-ajax.php?nonce=' . $wishNonce);
                    $status = '';
                    $like_classes = 'text-body-default';

                    global $yith_wcwl;
                    if (empty($yith_wcwl->details['user_id'])) {
                        $yith_wcwl->details['user_id'] = '';
                    }
                    if ($yith_wcwl->is_product_in_wishlist($post->ID)) {
                        $status = 'remove-item';
                        $like_classes = 'nik-wishlist-full';
                    }

                    ?>
                    <a href="#" data-wishlist-link="<?php echo esc_url($like_link); ?>"
                       data-id="<?php echo esc_attr($post->ID); ?>"
                       class="add-to-wishlist-btn mt-10 d-block <?php echo esc_attr($status); ?>">
                        <i class="btn-icon <?php echo esc_attr($like_classes); ?> ele-icon lvgshop-heart-2"></i>
                        add to wishlist
                    </a>
                    <?php
                }
            ?>
        </div>
    </div>
</div>

