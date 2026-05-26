<?php

$section_media = cs_get_option('Newsletter-Section-Image');
$section_media_img_link = is_array($section_media) ? $section_media['url'] :'';
$newsletter_subtitle = cs_get_option('Newsletter-Subtitle');
$newsletter_title = cs_get_option('Newsletter-Title');
$newsletter_form_shortcode = cs_get_option('Newsletter-Form-Shortcode');
$newsletter_section_style = cs_get_option('Newsletter-section-style');
?>
<!--newsletter section start-->
<?php
if( $newsletter_section_style == 'style-one'){
    ?>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-10">
            <div class="hm2-footer-top text-center">
                <?php if ($newsletter_subtitle){ ?>
                    <h3 class="mb-60 hm2-font-family fw-normal"><?php printf( __('%s', 'lvgshop'), $newsletter_title ); ?></h3>
                <?php } ?>

                <form class="hm2-sb-form" action="#">
                    <?php
                    if ($newsletter_form_shortcode){
                        echo do_shortcode($newsletter_form_shortcode);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php
}if( $newsletter_section_style == 'style-two' ){
    ?>
    <!--newsletter section start-->
    <section class="vr6-newsletter ptb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="vr6-newsletter-box">
                            <?php if ($newsletter_subtitle){ ?>
                                <h3 class="fw-normal text-center mb-70"><?php printf( __('%s', 'lvgshop'), $newsletter_title ); ?></h3>
                            <?php } ?>
                        <form class="vr6-newsletter-form">
                            <?php
                            if ($newsletter_form_shortcode){
                                echo do_shortcode($newsletter_form_shortcode);
                            }
                            ?>
                        </form>
                        <?php
                        if($newsletter_subtitle){
                            ?>
                            <p class="fw-normal text-uppercase fs-sm text-main-color text-center mt-32 mb-0"><?php printf( __('%s', 'lvgshop'), $newsletter_subtitle ); ?></p>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--newsletter section end-->
    <?php
}if( $newsletter_section_style == 'style-three'){
    ?>
    <!--subscribe area start-->
    <section class="hm3-subscribe-area pb-140">
        <div class="container-1400">
            <div class="hm3-subscribe-box">
                <div class="row align-items-center g-5">
                    <div class="col-xl-6">
                        <div class="sb-title">
                            <?php if ($newsletter_subtitle){ ?>
                                <h3 class="mb-0 hm2-font-family fw-normal"><?php printf( __('%s', 'lvgshop'), $newsletter_title ); ?></h3>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-wrapper">
                            <form class="hm3-sb-form" action="#">
                                <?php
                                if ($newsletter_form_shortcode){
                                    echo do_shortcode($newsletter_form_shortcode);
                                }
                                ?>
                            </form>
                            <?php
                            if($newsletter_subtitle){
                                ?>
                                <p class="mt-3 mb-0 fs-sm text-start"><?php printf( __('%s', 'lvgshop'), $newsletter_subtitle ); ?></span></p>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--subscribe area end-->
    <?php
}
?>
<!--newsletter section end-->



