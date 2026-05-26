<?php
$copyright = cs_get_option('copyright_text');
$footercopystyle = cs_get_option('footer_copyright_style');
$copyright_text_right = cs_get_option('copyright_text_right');
$copyright_right_content = cs_get_option('copyright_right_content');
if (cs_get_option('Feature-Switcher')) {
    get_template_part('template-parts/footer/lvgshop-feture', 'style');
}

if (cs_get_option('Newsletter-Switcher')) {
    get_template_part('template-parts/footer/lvgshop-footer', 'newsletter');
}
?>
<!--footer section start-->
<footer class="footer-section pt-120 overflow-hidden primary-bg-color footer-dark footer-mobile-accordion dark_veartion_footer">
    <div class="container-1700">
        <div class="row g-4">
            <?php if (is_active_sidebar('lvgshop-footer-style-one-newsletter')) { ?>
                <div class="col-xl-4 col-md-6 col-sm-8">
                    <?php dynamic_sidebar('lvgshop-footer-style-one-newsletter'); ?>
                </div>
            <?php } ?>


            <?php if (is_active_sidebar('lvgshop-useful-links-widget')) { ?>
                <div class=" col-xl-2 col-lg-3 col-md-5 offset-md-1 offset-lg-0 col-sm-4">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-two')) { ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget-two'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-useful-links-widget-three')) { ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <?php dynamic_sidebar('lvgshop-useful-links-widget-three'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('lvgshop-about-widget')) { ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6  ">
                    <?php dynamic_sidebar('lvgshop-about-widget'); ?>
                </div>
            <?php } ?>

        </div>
    </div>

        <?php if (cs_get_option('footer_copyright_enable')) { ?>
            <div class="footer-copyright">
                <div class="container-1700">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-6">
                            <?php
                            if ($footercopystyle == 'style-1') {
                                ?>
                                <p class="mb-0 fs-sm"><?php printf('%s', cs_get_option('copyright_text')); ?></p>
                                <?php
                            } elseif ($footercopystyle == 'style-2') {
                                $payment_card_img_meta = cs_get_option('copyright_card_image');
                                $payment_card_img = is_array($payment_card_img_meta) && !empty($payment_card_img_meta['url']) ? $payment_card_img_meta['url'] : '';
                                if (!empty($payment_card_img)) {
                                    ?>
                                    <img src="<?php echo esc_url($payment_card_img); ?>" alt="cards" class="img-fluid">
                                <?php }
                            } ?>
                        </div>
                        <div class="col-xl-6">
                            <?php
                            if ($footercopystyle == 'style-1') {
                                ?>
                                <p class="mb-0 fs-sm text-end"><?php printf('%s', cs_get_option('copyright_text_right')); ?></p>
                                <?php
                            } elseif ($footercopystyle == 'style-2') {
                                ?>
                                <div class="copyright-links d-flex align-items-center justify-content-md-end gap-4">
                                    <?php
                                    foreach ($copyright_right_content as $item) {
                                        ?>
                                        <a href="<?php echo esc_url($item['copyright_r_link']['url']); ?>"><?php _e($item['copyright_r_title'], 'lvgshop'); ?></a>

                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            } ?>

                        </div>
                    </div>
                </div>

            </div>

        <?php } ?>
    </div>

</footer>
<!--footer section end-->