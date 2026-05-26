<?php
$copyright = cs_get_option('copyright_text');
$footercopystyle = cs_get_option('footer_copyright_style');
$copyright_text_right = cs_get_option('copyright_text_right');
$copyright_right_content = cs_get_option('copyright_right_content');
$lvgshop_Footer_style = cs_get_option('lvgshop-Footer-style');
if (cs_get_option('Feature-Switcher')) {
    get_template_part('template-parts/footer/lvgshop-feture', 'style');
}
$backtotop = cs_get_option('back-top-top-enable');


?>


<!-- footer section start -->
<footer class="el-footer-section el-footer-section<?php echo esc_html($lvgshop_Footer_style); ?> wow fadeInUp ">
    <div class="container container-xxxl">
        <div class="row pt-120 pb-70">
            <?php if (is_active_sidebar('lvgshop-about-widget')) { ?>
                <div class="col-md-6 col-lg-3 ">
                    <?php dynamic_sidebar('lvgshop-about-widget'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget')) { ?>
                <div class="col-md-6 col-lg-2  ">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-two')) { ?>
                <div class="col-md-6 col-lg-2 ">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget-two'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>
                <div class="col-md-6 col-lg-2 mb-30 ">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget-three'); ?>
                    </div>
                </div>
            <?php } ?>

            <div class="col-lg-3 mb-30">
                <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-footer-style-one-newsletter'); ?>
                </div>
            </div>
        </div>

        <div class="theme-devider"></div>
        <div class="row align-items-center ptb-30 copyright-area">
            <div class="col-lg-6">
                <p class="text-capitalize">
                    <?php printf('%s', cs_get_option('copyright_text')); ?>
                </p>
            </div>
            <div class="col-lg-6 d-flex flex-wrap justify-content-lg-end align-items-center mt-20 mt-lg-0">
                <?php  if ($copyright_right_content){ ?>
                <p class="text-capitalize me-4"><?php esc_html_e('We Accept :','lvgshop'); ?></p>
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
<!-- footer section end -->