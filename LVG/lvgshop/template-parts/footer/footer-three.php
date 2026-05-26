<?php
$copyright = cs_get_option('copyright_text');
$footercopystyle = cs_get_option('footer_copyright_style');
$copyright_text_right = cs_get_option('copyright_text_right');
$copyright_right_content = cs_get_option('copyright_right_content');
if (cs_get_option('Feature-Switcher')) {
    get_template_part('template-parts/footer/lvgshop-feture', 'style');
}
$backtotop = cs_get_option('back-top-top-enable');


?>
<!-- footer section start -->
<footer class="el-footer-section el-footer-section-3 wow fadeInUp mt-70">
    <div class="container container-xxxl">
        <div class="row pb-50 pt-100">
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>
                <div class="col-md-6 col-lg-3 col-xl-2 mb-30 d-none d-md-block">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>
                <div class="col-md-6 col-lg-3 col-xl-2 mb-30 d-none d-md-block">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget-two'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>
                <div class="col-md-6 col-lg-3 col-xl-2 mb-30 d-none d-md-block">
                    <div class="single-widget">
                        <?php dynamic_sidebar('lvgshop-useful-links-widget-three'); ?>
                    </div>
                </div>
            <?php } ?>

            <div class="col-12 d-md-none pb-30">
                <div class="footer-accordion">
                    <div class="accordion accordion-flush" id="accordionFlushExample_foo">
                        <?php if (is_active_sidebar('lvgshop-useful-links-widget')) { ?>

                            <?php dynamic_sidebar('lvgshop-useful-links-widget'); ?>

                        <?php } ?>
                        <?php if (is_active_sidebar('lvgshop-useful-links-widget-two')) { ?>

                            <?php dynamic_sidebar('lvgshop-useful-links-widget-two'); ?>

                        <?php } ?>
                        <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>

                            <?php dynamic_sidebar('lvgshop-useful-links-widget-three'); ?>

                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="d-none d-xl-block col-xl-1 d-flex justify-content-center">
                <svg width="1" height="263" viewBox="0 0 1 263" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line opacity="0.2" x1="0.5" y1="-2.18557e-08" x2="0.500012" y2="263" stroke="white" />
                </svg>
            </div>
            <?php if (is_active_sidebar('lvgshop-footer-style-one-newsletter')) { ?>
                <div class="col-md-6 col-lg-3 col-xl-5 mb-30">
                    <?php dynamic_sidebar('lvgshop-footer-style-one-newsletter'); ?>
                </div>
            <?php } ?>

        </div>

        <div class="theme-devider"></div>
        <?php if (cs_get_option('footer_copyright_enable')) {


        }?>
        <?php if (cs_get_option('footer_copyright_enable')) { ?>
        <div class="row align-items-center ptb-30 copyright-area">
            <div class="col-lg-6">
                <p class="text-capitalize text-white">
                    <?php printf('%s', cs_get_option('copyright_text')); ?>
                </p>
            </div>
            <div class="col-lg-6 d-flex flex-wrap justify-content-lg-end align-items-center mt-20 mt-lg-0">
                <?php  if ($copyright_right_content){ ?>
                <p class="text-capitalize me-4 text-white"><?php esc_html_e('We Accept :','lvgshop'); ?></p>
                <?php
                $payment_card_img_meta = cs_get_option('copyright_card_image');
                $payment_card_img = is_array($payment_card_img_meta) && !empty($payment_card_img_meta['url']) ? $payment_card_img_meta['url'] : '';

                foreach ($copyright_right_content as $item) {

                    ?>
                    <img src="<?php  echo esc_url($item['copyright_card_image']['url']);   ?>" alt="cards" class="payment-img">
                    <?php
                }}
                ?>

            </div>
        </div>
    </div>
    <?php } ?>
</footer>
<!-- footer section end -->
