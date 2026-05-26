<?php
global $product, $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$nonce = wp_create_nonce("product_nonce");
$anchor_class = 'el2-product-cart-btn';
$icon_classs = 'ele-icon lvgshop-shopping-bag';

?>

<div class="el2-product-card position-relative">
    <?php
        lvgshop_woo_sale_discount_badge();
    ?>
    <div class="feature-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                 class="img-fluid"></a>
    </div>
    <div class="el2-product-content">
        <span class="categories">
            <?php
            $terms = get_the_terms( $product->get_id(), 'product_cat' );
            if ( ! empty( $terms ) ) {
                echo '<a href="' . esc_url( get_term_link($terms[0]->term_id) ) . '">' . esc_html( $terms[0]->name ) . '</a>';
            }
            ?>
        </span>
        <a href="<?php the_permalink(); ?>" class="el2-product-title"><?php the_title(); ?></a>
        <div class="el2-product-rating">
            <?php lvgshop_get_star_rating(); ?>
        </div>

        <?php
        $p_stock = $product->get_manage_stock();
        $p_sale = $product->get_total_sales();
        if($p_stock){
            $progress_cal = $p_stock *  $p_sale / $p_stock;
            $progress_pr = 100 - $progress_cal;
        }

        if($p_stock){
        ?>
        <div class="el2-stock-status mt-3">
            <p class="mb-2"><?php _e('Avaiable :', 'lvgshop'); ?> <strong><?php  echo maybe_unserialize($product->get_total_sales()); ?> / <?php echo maybe_unserialize($product->get_stock_quantity()); ?></strong></p>
            <div class="stock">
                <span class="available" data-width="<?php echo maybe_unserialize($progress_pr); ?>%"></span>
            </div>
        </div>
        <?php } ?>
        <p class="mb-0 el2-product-price mt-3">
            <?php echo maybe_unserialize($product->get_price_html()); ?>
        </p>
    </div>
    <div class="el2-product-action-btns">
        <?php
            lvgshop_add_quick_view_card();
        ?>
        <?php lvgshop__compare_icon_in_product_card(); ?>

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
                   class="lvgshop-add-to-wishlist <?php echo esc_attr($status); ?> action-btn">
                    <i class="btn-icon <?php echo esc_attr($like_classes); ?> ele-icon lvgshop-heart-2"></i>
                </a>
                <?php
            }
        ?>
    </div>
    <div class="el2-product-bottom">
        <?php do_action('lvgshop_product_add_to_cart_with_text', $post, $product, $nonce, $anchor_class, $icon_classs); ?>
    </div>
</div>