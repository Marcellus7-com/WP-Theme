<?php
global $product;
//echo "<pre>";
//print_r($product);
//echo"</pre>";
$attachment_ids = $product->get_gallery_image_ids();

$feature_image_id = $product->get_image_id();

$product_style = cs_get_option('product-layout-style');
?>


<!-- product img  for lg device-->
<div class="el-product-gallery-wrapper ">
    <div class="main-gallery d-none d-lg-block">
        <div class="slider-for-main-gallery">
            <?php
            foreach ($attachment_ids as $attachment_id) {
                ?>
                <div class="gallery-box">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'full')); ?>" alt="product"
                         class="img-fluid mt-20  d-none d-lg-block">
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="inline-gallery">
        <div class="slider-for-nav-gallery">
            <?php
            foreach ($attachment_ids as $attachment_id) {
                ?>
                <div class="gallery-box">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'full')); ?>" alt="product"
                         class="img-fluid mt-20  d-none d-lg-block">
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>




<!-- product gallery for sm device -->
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


