<?php
global $product, $post;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$nonce = wp_create_nonce("product_nonce");

$attachments_id = $product->get_gallery_image_ids() ? $product->get_gallery_image_ids()[0] : '';
$attachment_url = wp_get_attachment_url($attachments_id);

?>

<div class="el-single-product">
    <div class="action-btns-wrapper">
        <?php
            lvgshop_add_quick_view_card();
        ?>
        <button class="action-btn">
            <?php lvgshop__compare_icon_in_product_card(); ?>
        </button>
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

    <div class="product-img-wrapper">
        <?php
        $postdate = get_the_time('Y-m-d'); // Post date
        $postdatestamp = strtotime($postdate);
        $riboontext = get_theme_mod('recent_ribbon_text', 'New'); // Newness in days
        $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
        if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
            echo '<span class="badge-title">hot</span>';
        }
        ?>
        <div class="img-box">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="main-img">
                <?php if ($attachment_url) { ?>
                    <img src="<?php echo esc_url($attachment_url); ?>" alt="product img" class="hover-img">
                <?php } else {
                    ?>
                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="hover-img">
                    <?php
                } ?>

            </a>
        </div>
    </div>
    <div class="content-wrapper">
        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
        <div class="btm-content-wrapper">
            <div class="pricing-wrapper">
                <?php echo maybe_unserialize($product->get_price_html()); ?>
            </div>
            <?php lvgshop_get_star_rating(); ?>
        </div>
    </div>
    <?php do_action('lvgshop_product_add_to_cart_with_text', $post, $product, $nonce); ?>
</div>