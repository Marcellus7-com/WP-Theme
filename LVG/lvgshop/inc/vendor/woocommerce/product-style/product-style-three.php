<?php
global $product, $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$nonce = wp_create_nonce("product_nonce");
$attachment_ids = $product->get_gallery_image_ids();
$feature_image_id = $product->get_image_id();
$anchor_class = 'el-btn btn-blue mt-10';
?>
<div class="el-single-product-2">
    <div class="product-img-wrapper">
        <div class="img-box">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($image[0]); ?>" alt="product img" class="main-img"></a>
        </div>
        <div class="btn-wrapper">
            <?php
                lvgshop_add_quick_view_card();
            ?>
            <?php do_action('lvgshop_product_add_to_cart_with_text', $post, $product, $nonce, $anchor_class,'',true ); ?>
        </div>
    </div>
    <div class="content-wrapper">
        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
        <div class="btm-content-wrapper">
            <div>
                <?php echo maybe_unserialize($product->get_price_html()); ?>
            </div>
        </div>
        <div class="btn-action-wrapper">
            <?php
                if (class_exists('YITH_WCWL')) {
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
            <svg width="2" height="22" viewBox="0 0 2 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" d="M1 1L1 21" stroke="white" stroke-linecap="round" />
            </svg>
            <div class="action-btn">
                <?php lvgshop__compare_icon_in_product_card(); ?>
            </div>
        </div>
    </div>
</div>
