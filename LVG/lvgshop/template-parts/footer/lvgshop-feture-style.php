<?php

$Feature_swither = cs_get_option('Feature-Switcher');
$Feature_section_style = cs_get_option('Feature-section-style');
$Feature_Section_reapter = cs_get_option('Feature_Section_reapter');
$Feature_icon_imgss = cs_get_option('Feature_icon_imgss');
$section_media_img_link = is_array($Feature_icon_imgss) ? $Feature_icon_imgss['url'] : '';
$Feature_Section_reapter_box_Title = cs_get_option('Feature_Section_reapter_box_Title');
$Feature_Section_reapter_box_Subtitle = cs_get_option('Feature_Section_reapter_box_Subtitle');

?>
<!--newsletter section start-->
<!--hm2 feature section start-->
<?php if ($Feature_section_style == 'style-one') {

    ?>

    <section class="hm2-feature-section overflow-hidden">
        <div class="container-1400">
            <div class="row align-items-center g-5">
                <?php
                if (is_array($Feature_Section_reapter)) {
                    foreach ($Feature_Section_reapter as $info) {

                        ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 lastchield">
                            <div class="hm2-feature-box wow fadeInUp">
                        <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle">
                            <img src="<?php echo esc_attr($info['Feature_icon_imgss']['url']); ?>" alt="not found"
                                 class="img-fluid">
                        </span>
                                <h6 class="fw-normal hm2-font-family mt-40 mb-4"><?php echo esc_attr($info['Feature_Section_reapter_box_Title']); ?></h6>
                                <p class="mb-0"><?php echo esc_attr($info['Feature_Section_reapter_box_Subtitle']); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </section>


    <?php
} if ($Feature_section_style == 'style-two') {
?>
    <!--feature section start-->
    <section class="feature-section bg-white overflow-hidden vr5-feature-box">
        <div class="container-1700">
            <div class="row align-items-center g-5">
                <?php
                if (is_array($Feature_Section_reapter)) {
                    $arr_count = count($Feature_Section_reapter);
                    $i = 0;
                foreach ($Feature_Section_reapter as $info) {
                    $i++;
                    if ($i == $arr_count){
                       $border_right = '';
                    }else{
                        $border_right = 'border-right';
                    }
                ?>
                <div class="col-xl-3 col-lg-4 col-sm-6 fadeInUp">
                    <div class="icon-box d-md-flex align-items-center text-center text-md-start <?php echo esc_attr($border_right); ?> wow fadeInUp" data-wow-duration="0.5s">
                        <span class="icon-wrapper mb-3 mb-md-0 d-inline-block">
                           <img src="<?php echo esc_attr($info['Feature_icon_imgss']['url']); ?>" alt="not found"
                                class="img-fluid">
                        </span>
                        <div>
                            <h6 class="fw-semibold mb-0 fs-18"><?php echo esc_attr($info['Feature_Section_reapter_box_Title']); ?></h6>
                            <span class="fs-sm"><?php echo esc_attr($info['Feature_Section_reapter_box_Subtitle']); ?></span>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!--feature section end-->

<?php

}?>

<!--hm2 feature section end-->
<!--newsletter section end-->



