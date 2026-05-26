<?php

global $post, $woocommerce, $product;
$attachment_ids = $product->get_gallery_image_ids();
$productthumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lvgshop-quick-view-slider');
$product_unit_meta = get_post_meta(get_the_ID(), 'product_unit_txt', true);
$product_style = cs_get_option('product-layout-style');
$free_shipping_text = cs_get_option('free-shipping-text');
$return_text = cs_get_option('return-text');
$social_shere_one_off = cs_get_option('social_shere_one_off');
$payment_top_text = cs_get_option('payment_top_text');
$payment_icon_single = cs_get_option('payment_icon_single');
$payment_icon_single_img = $payment_icon_single[url];
$Vat_Included_text = cs_get_option('Vat-Included-text');
$Ask_text = cs_get_option('Ask-text');
$Ask_text_link = cs_get_option('Ask-text-link');
$Ask_text_linksk = $Ask_text_link['url'];
$free_shipping = cs_get_option('free-shipping-text-icon');
$return_text = cs_get_option('return-text-icon');
$product_layout_style = cs_get_option('product-layout-style');
$product_meta_with_icon_image = get_post_meta(get_the_ID(), 'product_meta_with_icon_tex', true);
$opt_select_reapter_style = get_post_meta(get_the_ID(), 'opt-select-reapter-style', true);
$Fake_View_Show_icon = get_post_meta(get_the_ID(), 'Fake_View_Show_icon', true);
$Fake_View_Show_icon_text = get_post_meta(get_the_ID(), 'Fake_View_Show_icon_text', true);

?>
<!-- close modal markup -->
<div class="modal-close">
	<a href="#" class="quick-view-close">
      <i class="isax icon-close-circle1"></i>
	</a>
</div>
<!-- close modal markup -->

<!-- product wrapper -->
<div <?php post_class('product product-wrapper'); ?>>
<div class="row">
  <div class="col-12 col-md-6 lvgshop-quick-v-thumb">
      <?php if($attachment_ids){?>
      <div class="swiper nik-qv-thumb-preview-slider">
          <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="<?php echo $productthumbnail[0]; ?>" alt="product"></div>
              <?php
              foreach ($attachment_ids as $attachment_id) {
                  $image = wp_get_attachment_image_src($attachment_id, apply_filters('woocommerce_gallery_thumbnail_size', 'lvgshop-quick-view-slider'));

                  ?>
                  <div class="swiper-slide"><img src="<?php echo $image[0]; ?>" alt="product"></div>
              <?php } ?>


          </div>
          <div class="nik-qc-swiper-button-next"><i class="isax icon-arrow-left1"></i></div>
          <div class="nik-qc-swiper-button-prev"><i class="isax icon-arrow-right1"></i></div>
      </div>
      <?php } else { ?>
          <img src="<?php echo $productthumbnail[0]; ?>" alt="product">
      <?php } ?>

  </div>
  
   <div class="col-12 col-md-6 lvgshop-quickv-product-details-main">
         <div class="lvgshop-quickv-product-details product-des-box sticky-el-details-right information-<?php echo esc_html($product_layout_style); ?>">
           <div class="ratings-wrapper">
        <?php woocommerce_template_single_rating(); ?>
    </div>
                <h2 class="woocommerce-loop-product__title"> <a href="<?php the_permalink();?>"> <?php the_title();?></a></h2>
            
                    
                    
                     <div class="price-vat-wrapper">
        <?php
        $_product = wc_get_product(get_the_ID());
        $product_price = $_product->get_price_html()
        ?>
        <span class="main-price"><?php echo wp_kses($product_price, true); ?> </span>
        <span class="vat-txt"><?php echo esc_html($Vat_Included_text); ?></span>
    </div>
    
    
    <div class="divider mb-20 mt-20"></div>


  <p class="des">
        <?php woocommerce_template_single_excerpt(); ?>
    </p>
    
    <ul class="fea-list">
            <?php
            foreach ($product_meta_with_icon_image as $item) {

                ?>
                <li>
                    <img class="fea-icon" src="<?php echo $item['product_meta_with_icon_image']['url']; ?>" alt="">

                    <span class="fea-txt"><?php echo $item['product_meta_with_icon_text'] ?></span>
                </li>
                <?php
            }
            ?>
        </ul>
        
        
        
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
            <a href="#" class="btm-action-btn">
                <?php echo do_shortcode('[woosc id="{product id}"]'); ?>
            </a>
            <a href="<?php echo esc_html($Ask_text_linksk); ?>" class="btm-action-btn">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M2.00004 2H14C14.1769 2 14.3464 2.07024 14.4714 2.19526C14.5965 2.32029 14.6667 2.48986 14.6667 2.66667V13.3333C14.6667 13.5101 14.5965 13.6797 14.4714 13.8047C14.3464 13.9298 14.1769 14 14 14H2.00004C1.82323 14 1.65366 13.9298 1.52864 13.8047C1.40361 13.6797 1.33337 13.5101 1.33337 13.3333V2.66667C1.33337 2.48986 1.40361 2.32029 1.52864 2.19526C1.65366 2.07024 1.82323 2 2.00004 2V2ZM13.3334 4.82533L8.04804 9.55867L2.66671 4.81067V12.6667H13.3334V4.82533ZM3.00737 3.33333L8.04071 7.77467L13.0014 3.33333H3.00737Z"
                            fill="#717171"/>
                </svg>

                <?php echo esc_html($Ask_text); ?>
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
                <?php echo $free_shipping_text; ?>
            </span>

        </p>
        <?php
    }
    ?>

        
    
              <?php do_action( 'woocommerce_single_product_quickview_summary' ); ?>


        </div>
        
       
  </div>
  </div>
	
	
</div>
<!-- product wrapper -->

<div class="clear quick-view-nav-wrapper">
	<?php if ( !empty( $prev_id ) ): ?>
		<a href="#" class="button <?php echo $prev_class; ?>">Prev</a>
	<?php endif; ?>
	<?php if ( !empty( $next_id ) ): ?>
		<a href="#" class="button <?php echo $next_class; ?>">Next</a>
	<?php endif; ?>
</div>