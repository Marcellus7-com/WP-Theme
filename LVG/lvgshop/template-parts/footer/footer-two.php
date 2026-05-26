<?php
$copyright = cs_get_option('copyright_text');
$footercopystyle = cs_get_option('footer_copyright_style');
$copyright_text_right = cs_get_option('copyright_text_right');
$copyright_right_content = cs_get_option('copyright_right_content');
?>
<!--flash sales start-->
<section class="el2-flash-sales bg-white pt-120 wow fadeInUp">
    <div class="container-1440">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center el2-section-title">
                    <span class="el2-section-subtitle mb-1"><?php printf('%s', cs_get_option('footsubtitles')); ?></span>
                    <h2 class="fw-semibold"><?php printf('%s', cs_get_option('footertitle')); ?></h2>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="el2-gallery-slider">
                <?php
                if (is_active_sidebar('lvgshop-footer-instagram-gallery')) {
                    dynamic_sidebar('lvgshop-footer-instagram-gallery');
                }
                ?>
            </div>


        </div>
    </div>
</section>
<!--flash sales end-->

<!--footer section start-->
<?php if (cs_get_option('footer_copyright_enable')) {
    ?>
<footer class="el2-footer-section pt-110 bg-white">
    <div class="container-1440">
        <div class="row">
            <?php if (is_active_sidebar('lvgshop-about-widget')) { ?>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <?php dynamic_sidebar('lvgshop-about-widget'); ?>
                </div>
            <?php } ?>

            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="el2-footer-widget el2-footer-nav ps-xl-4">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget'); ?>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="el2-footer-widget el2-footer-nav">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget-two'); ?>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="el2-footer-widget el2-footer-nav">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget-three'); ?>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="el2-footer-widget el2-footer-contact">
                    <?php dynamic_sidebar('lvgshop-footer-style-one-newsletter'); ?>
                </div>
            </div>
        </div>
        <div class="el2-footer-copyright py-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    <p class="mb-0">
                        <?php printf('%s', cs_get_option('copyright_text')); ?>
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-end">
                        <?php  if ($copyright_right_content){ ?>
                        <span class="me-2"><?php esc_html_e('We Accept :','lvgshop'); ?></span>
                        <?php
                        $payment_card_img_meta = cs_get_option('copyright_card_image');
                        $payment_card_img = is_array($payment_card_img_meta) && !empty($payment_card_img_meta['url']) ? $payment_card_img_meta['url'] : '';

                        foreach ($copyright_right_content as $item) {

                            ?>
                            <img src="<?php  echo esc_url($item['copyright_card_image']['url']);   ?>" alt="cards" class="payment-img">
                            <?php
                        } }
                        ?>
            </div>
        </div>
    </div>
</footer>
<?php
}?>

<!--footer section end-->
<!--footer section start-->

<!--footer section end-->