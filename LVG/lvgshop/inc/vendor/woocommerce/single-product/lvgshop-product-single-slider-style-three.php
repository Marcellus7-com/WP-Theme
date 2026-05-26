<?php
global $product;
//echo "<pre>";
//print_r($product);
//echo"</pre>";
$attachment_ids = $product->get_gallery_image_ids();

$feature_image_id = $product->get_image_id();

$product_style = cs_get_option('product-layout-style');
$product_style_thumnail = get_post_meta(get_the_ID(), 'Productthumnail_videos', true);
?>


<!-- product img  for lg device-->
<!-- product img grid for xl device -->
<div class="d-none d-xl-block">
    <div class="col-12 col-md-6 col-xl-12 overflow-hidden">
        <div class="video-wrapper-thumbnail">
            <div class="row">
                <?php
                if (has_post_thumbnail()) {
                    ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($feature_image_id, 'full')); ?>" alt="product"
                         class="img-fluid">
                <?php }
                ?>
                <?php
                if ($product_style_thumnail) {
                    ?>
                    <a class="video-play-btn" data-fancybox href="<?php echo esc_url($product_style_thumnail); ?>">
                        <svg width="60" height="60" viewBox="0 0 88 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="44" cy="44" r="44" fill="#FFD612"/>
                            <g filter="url(#filter0_d_422_78291)">
                                <path d="M60 44L36 57.8564L36 30.1436L60 44Z" fill="white"/>
                            </g>
                            <defs>
                                <filter id="filter0_d_422_78291" x="11" y="13.1436" width="74" height="77.7129"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="8"/>
                                    <feGaussianBlur stdDeviation="12.5"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_422_7829"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_422_7829"
                                             result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </a>
                    <?php
                }
                ?>

            </div>

        </div>
    </div>
    <div class="row">
        <?php
        if (has_post_thumbnail()) {
            foreach ($attachment_ids as $attachment_id) {
                ?>
                <div class="col-6 mt-20 overflow-hidden">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'full')); ?>" alt="product"
                         class="img-fluid ">
                </div>

                <?php
            }

        }
        ?>
    </div>
</div>

<div class="col-12 mb-60  d-lg-none d-block">
    <div class="product-details-2-gallery-slider">
        <?php
        if (has_post_thumbnail()) {
            foreach ($attachment_ids as $attachment_id) {
                ?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'full')); ?>" alt="product"
                     class="img-fluid ">
                <?php
            }

        }
        ?>
    </div>
</div>






