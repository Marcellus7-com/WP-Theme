<?php
global $product, $post;

$product_style = cs_get_option('product-layout-style');
$free_shipping_text = cs_get_option('free-shipping-text');
$return_text = cs_get_option('return-text');
$social_shere_one_off = cs_get_option('social_shere_one_off');
$payment_top_text = cs_get_option('payment_top_text');
$payment_icon_single = cs_get_option('payment_icon_single');
$payment_icon_single_img = $payment_icon_single ? $payment_icon_single['url']:''; 
$Vat_Included_text = cs_get_option('Vat-Included-text');
$ask_text = cs_get_option('Ask-text');
$ask_text_link = cs_get_option('Ask-text-link');
$ask_text_linksk = !empty($ask_text_link ) ? $ask_text_link['url'] : '';
$free_shipping = cs_get_option('free-shipping-text-icon');
$return_text = cs_get_option('return-text-icon');
$product_layout_style = cs_get_option('product-layout-style');
$product_meta_with_icon_image = get_post_meta(get_the_ID(), 'product_meta_with_icon_tex', true);
$opt_select_reapter_style = get_post_meta(get_the_ID(), 'opt-select-reapter-style', true);
$Fake_View_Show_icon = get_post_meta(get_the_ID(), 'Fake_View_Show_icon', true);
$Fake_View_Show_icon_text = get_post_meta(get_the_ID(), 'Fake_View_Show_icon_text', true);

?>
<div class="product-des-box sticky-el-details-right information-<?php echo esc_html($product_layout_style); ?>">
    <div class="ratings-wrapper">
        <?php woocommerce_template_single_rating(); ?>
    </div>
    <h3 class="title"><?php the_title(); ?></h3>
    <div class="price-vat-wrapper">
        <?php
        $_product = wc_get_product(get_the_ID());
        $product_price = $_product->get_price_html()
        ?>
        <span class="main-price"><?php echo wp_kses($product_price, true); ?> </span>
        <span class="vat-txt"><?php echo esc_html($Vat_Included_text); ?></span>
    </div>
    <?php
    if ($Fake_View_Show_icon_text) {
        ?>
        <div class="d-flex align-items-center mt-10">
            <i class="style_single_icon <?php echo esc_html($Fake_View_Show_icon); ?>"></i>
            <span class="font-medium text-capitalize text-dark"><?php echo esc_html($Fake_View_Show_icon_text); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="divider mb-20 mt-20"></div>

    <p class="des">
        <?php woocommerce_template_single_excerpt(); ?>
    </p>
    <?php
    if ($opt_select_reapter_style == 'Style-1') {
        
        if ($product_meta_with_icon_image){
        ?>
        <ul class="fea-list">
            <?php
            
            foreach ($product_meta_with_icon_image as $item) {

                ?>
                <li>
                    <?php if ($item['product_meta_with_icon_image']['url']){?>
                    <img class="fea-icon" src="<?php echo esc_url($item['product_meta_with_icon_image']['url']); ?>" alt="">
                        <?php } ?>
                    <span class="fea-txt"><?php echo esc_html($item['product_meta_with_icon_text']) ?></span>
                </li>
                <?php
            } 
            ?>
        </ul>
        <?php
    } }
    if ($opt_select_reapter_style == 'Style-2') {
        ?>
        <table class="table table-bordered mb-0">
            <?php
            foreach ($product_meta_with_icon_image as $item) {
                ?>
                <tr>
                    <td>
                        <img class="fea-icon" src="<?php echo esc_url($item['product_meta_with_icon_image']['url']); ?>" alt="">

                        <span class="common-txt"><?php echo esc_html($item['product_meta_with_icon_text']) ?></span>
                    </td>
                    <td>
                        <span class="common-txt"><?php echo esc_html($item['product_meta_with_icon_text_right']) ?></span>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
    <div class="<?php if ($product_layout_style == 'style-2') { ?>border pl-20 pb-20 mt-30 <?php } ?>">
        <div class="button-wrappers">
            <div class="inc-dec-wrapper flex-grow-1 flex-grow-md-0 custom-style-one-single">
                <?php woocommerce_template_single_add_to_cart();
                ?>
                
                <?php
                ?>
            </div>
        </div>
        <div class="btm-action-btns-wrapper">
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
                   class="btm-action-btn <?php echo esc_attr($status); ?> action-btn">
                    <i class="btn-icon <?php echo esc_attr($like_classes); ?> ele-icon lvgshop-heart-2"></i> Add to
                    Wishlist
                </a>
                <?php
            }
            ?>
            <?php  if (class_exists('WPCleverWoosc')) { ?>
            <span class="btm-action-btn">
                <?php echo do_shortcode('[woosc id="'.$post->ID.'"]'); ?>
            </span>
            <?php } ?>
            <a href="<?php echo esc_html($ask_text_linksk); ?>" class="btm-action-btn">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M2.00004 2H14C14.1769 2 14.3464 2.07024 14.4714 2.19526C14.5965 2.32029 14.6667 2.48986 14.6667 2.66667V13.3333C14.6667 13.5101 14.5965 13.6797 14.4714 13.8047C14.3464 13.9298 14.1769 14 14 14H2.00004C1.82323 14 1.65366 13.9298 1.52864 13.8047C1.40361 13.6797 1.33337 13.5101 1.33337 13.3333V2.66667C1.33337 2.48986 1.40361 2.32029 1.52864 2.19526C1.65366 2.07024 1.82323 2 2.00004 2V2ZM13.3334 4.82533L8.04804 9.55867L2.66671 4.81067V12.6667H13.3334V4.82533ZM3.00737 3.33333L8.04071 7.77467L13.0014 3.33333H3.00737Z"
                            fill="#717171"/>
                </svg>

                <?php echo esc_html($ask_text); ?>
            </a>
        </div>
    </div>


    <div class="divider mb-20 mt-20"></div>

    <ul class="product-features-two">
        <li class="fea-box">
            <span class="fea-title text-uppercase">SKU : </span>
            <span class="title-txt"><?php printf('%s', $product->get_sku()) ?></span>
        </li>
        <li class="fea-box">
            <span class="fea-title text-capitalize">Categories: </span>
            <span class="title-txt"><?php printf('%s', wc_get_product_category_list(get_the_ID(), ', ')) ?></span>
        </li>
        <li class="fea-box">
            <span class="fea-title text-capitalize">Tags: </span>
            <span class="title-txt"><?php printf(' %s', wc_get_product_tag_list(get_the_ID(), ', ')) ?></span>
        </li>
    </ul>
    <?php
    if ($free_shipping_text) {
        ?>
        <p class="fea-para icon-change_color<?php echo esc_html($product_layout_style); ?>">
            <i class="<?php echo esc_html($free_shipping); ?>"></i>
            <span>
                <?php echo esc_html($free_shipping_text); ?>
            </span>

        </p>
        <?php
    }
    ?>

    <?php
    if ($product_layout_style == "style-1") {
        if ($return_text) {
            ?>
            <p class="fea-para icon-change_color-<?php echo esc_html($product_layout_style); ?>">
                <i class="<?php echo esc_html($return_text); ?>"></i>

                <?php echo esc_html($return_text); ?>
            </p>

            <?php
        }
    }

    ?>

    <?php
    if ($social_shere_one_off) {
        ?>
        <div class="social-wrapper">
            <span class="social-title">Share:</span>
            <a class="social-share twitter" href="#">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M5.21202 14.0068C10.8727 14.0068 13.9683 9.31706 13.9683 5.25051C13.9683 5.11731 13.9655 4.98467 13.9596 4.85276C14.5604 4.41832 15.0826 3.87618 15.4947 3.2591C14.9433 3.5043 14.3498 3.66914 13.7274 3.74372C14.3627 3.36258 14.8506 2.7599 15.0806 2.04146C14.486 2.39398 13.8275 2.6501 13.1265 2.78843C12.5649 2.19024 11.7652 1.81616 10.8799 1.81616C9.18052 1.81616 7.80225 3.19434 7.80225 4.89321C7.80225 5.13483 7.82931 5.36967 7.88206 5.59496C5.3243 5.46626 3.05615 4.24173 1.53844 2.37958C1.27426 2.83429 1.1218 3.36267 1.1218 3.92645C1.1218 4.99402 1.66513 5.93675 2.49126 6.48806C1.98637 6.47256 1.51212 6.33395 1.09749 6.10324C1.09703 6.11618 1.09703 6.12875 1.09703 6.14251C1.09703 7.63296 2.15782 8.87739 3.56617 9.15938C3.30749 9.22974 3.03532 9.26762 2.75462 9.26762C2.55667 9.26762 2.36366 9.24817 2.17616 9.21212C2.56795 10.4349 3.70414 11.3247 5.05113 11.3497C3.99777 12.1752 2.67087 12.667 1.22876 12.667C0.980715 12.667 0.735516 12.6528 0.494629 12.6244C1.85666 13.4974 3.47398 14.0068 5.21212 14.0068"
                            fill="#717171"/>
                </svg>
            </a>
            <a class="social-share facebook" href="#">
                <svg width="8" height="16" viewBox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M1.92102 15.7984C1.92102 15.9097 2.01133 16 2.12258 16H4.99539C5.10664 16 5.19664 15.9097 5.19664 15.7984V7.93687H7.27945C7.38383 7.93687 7.47102 7.85656 7.48008 7.7525L7.68039 5.38375C7.69008 5.26625 7.59758 5.16531 7.47945 5.16531H5.19664V3.485C5.19664 3.09094 5.51602 2.77156 5.90977 2.77156H7.51477C7.62633 2.77156 7.71633 2.68125 7.71633 2.57V0.201562C7.71633 0.0903125 7.62633 0 7.51477 0H4.80289C3.21133 0 1.92102 1.29 1.92102 2.88156V5.16531H0.484766C0.373516 5.16531 0.283203 5.25563 0.283203 5.36688V7.73531C0.283203 7.84687 0.373516 7.93687 0.484766 7.93687H1.92102V15.7984Z"
                          fill="#717171"/>
                </svg>
            </a>
            <a class="social-share linkedin" href="#">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M6.79019 0.249268C5.05554 0.249268 3.89236 1.87928 3.89236 1.87928V0.476319H0.676758V10.1503H3.89218V4.74799C3.89218 4.45878 3.91315 4.17002 3.99811 3.9632C4.23056 3.38569 4.75955 2.78739 5.64789 2.78739C6.81143 2.78739 7.27679 3.67454 7.27679 4.97505V10.1503H10.492V4.60343C10.492 1.63199 8.90561 0.249268 6.79019 0.249268V0.249268Z"
                            fill="#717171"/>
                </svg>
            </a>
        </div>
        <?php
    }
    ?>
    <div class="divider mt-20 mb-20"></div>
    <?php
    if ($payment_icon_single_img) {
        ?>
        <div class="payment-grnty mt-40">
            <span class="label-title"> <?php echo esc_html($payment_top_text); ?></span>
            <img src="<?php echo esc_html($payment_icon_single_img); ?>" class="img-fluid" alt="payment img">
        </div>
        <?php
    }
    ?>


</div>




