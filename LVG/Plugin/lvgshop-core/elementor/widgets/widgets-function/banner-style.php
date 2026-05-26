<?php
function lvgshop_banner_style_1($settings) {
    ?>
    <div class="el-discover-feature dark">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>

        <span class="inner-box">
            <span class="elect-banner-subtitle"><?php echo $settings['subtitle']; ?></span>
              <span class="title h3">
               
                  <?php if ($settings['title']) { ?>
                      <span><?php echo $settings['title']; ?></span>
                  <?php } ?>
              </span>
              <span class="des"><?php echo $settings['info']; ?></span>
                <?php if ($settings['button_title']) { ?>
                    <a href="<?php echo $settings['button_link']['url']; ?>" class="el-btn btn-dark-outline rounded-0"><?php echo $settings['button_title']; ?></a>
                <?php } ?>
            </span>
    </div>
    <?php
}

function lvgshop_banner_style_2($settings) {
    ?>
    <div class="el-discover-feature left-version light">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <span class="inner-box">
                <span class="title h3">
                    <?php echo $settings['subtitle']; ?>
                    <?php if ($settings['title']) { ?>
                        <span><?php echo $settings['title']; ?></span>
                    <?php } ?>
                </span>
                <?php if ($settings['price']) { ?>
                    <span class="price h4"><?php echo $settings['price']; ?></span>
                <?php } ?>
            <?php if ($settings['info']) { ?>
                <span class="des"><?php echo $settings['info']; ?></span>
            <?php } ?>
            <?php if ($settings['button_title']) { ?>
                <a href="<?php echo $settings['button_link']['url']; ?>" class="el-btn btn-light-outline rounded-0"><?php echo $settings['button_title']; ?></a>
            <?php } ?>
        </span>
    </div>
    <?php
}

function lvgshop_banner_style_3($settings) {
    ?>
    <div class="el2-banner-1">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <div class="banner-content">
            <?php if ($settings['subtitle']) { ?>
                <span class="fw-medium secondary-text-color subtitle"><?php echo $settings['subtitle']; ?></span>
            <?php } ?>
            <?php if ($settings['title']) { ?>
                <h2 class="fw-semibold mb-3"><?php echo $settings['title']; ?></h2>
            <?php } ?>
            <?php if ($settings['info']) { ?>
                <p class="mb-4">
                    <?php echo $settings['info']; ?>
                </p>
            <?php } ?>
            <?php if ($settings['button_title']) { ?>
                <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-blue el-btn"><?php echo $settings['button_title']; ?>
                    <span class="ms-2"><i class="fas fa-arrow-right"></i></span>
                </a>
            <?php } ?>
        </div>
    </div>
    <?php
}

function lvgshop_banner_style_4($settings) {
    ?>
    <div class="el2-banner-1">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <div class="banner-content">
            <?php if ($settings['subtitle']) { ?>
                <span class="fw-medium secondary-text-color el2-subtitle"><?php echo $settings['subtitle']; ?></span>
            <?php } ?>
            <?php if ($settings['title']) { ?>
                <h2 class="fw-semibold mb-3"><?php echo $settings['title']; ?></h2>
            <?php } ?>
            <?php if ($settings['info']) { ?>
                <p class="mb-4">
                    <?php echo $settings['info']; ?>
                </p>
            <?php } ?>
            <?php if ($settings['button_title']) { ?>
                <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-white el-btn"><?php echo $settings['button_title']; ?>
                    <span class="ms-2"><i class="fas fa-arrow-right"></i></span>
                </a>
            <?php } ?>
        </div>
    </div>
    <?php
}

function lvgshop_banner_style_5($settings) {
    ?>
    <div class="el2-banner-2">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>

        <?php if ($settings['subtitle']) { ?>
            <span><?php echo $settings['subtitle']; ?></span>
        <?php } ?>
        <?php if ($settings['title']) { ?>
            <h4 class="fw-semibold">
                <?php echo $settings['title']; ?>
            </h4>
        <?php } ?>
        <?php if ($settings['button_title']) { ?>
            <a href="<?php echo $settings['button_link']['url']; ?>" class="el-btn btn-light-red-outline"><?php echo $settings['button_title']; ?></a>
        <?php } ?>
    </div>
    <?php
}

function lvgshop_banner_style_6($settings) {
    ?>
    <div class="el2-banner-4">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <div class="banner-content">
            <?php if ($settings['subtitle']) { ?>
                <span class="fw-medium el2-subtitle mb-1"><?php echo $settings['subtitle']; ?></span>
            <?php } ?>
            <?php if ($settings['title']) { ?>
                <h2 class="fw-semibold mb-4"><?php echo $settings['title']; ?></h2>
            <?php } ?>
            <p class="d-flex align-items-center gap-1">
                <?php if ($settings['sell_price']) { ?>
                    <?php echo $settings['sell_price']; ?>
                <?php } ?>
                <?php if ($settings['regular_price']) { ?>
                    <del><?php echo $settings['regular_price']; ?></del>
                <?php } ?>
            </p>
            <?php if ($settings['button_title']) { ?>
                <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-dark el-btn">
                    <?php echo $settings['button_title']; ?>
                    <span class="ms-2"><i class="fas fa-arrow-right"></i></span>
                </a>
            <?php } ?>
        </div>
    </div>
    <?php
}

function lvgshop_banner_style_7($settings) {
    ?>
    <div class="el2-banner-3">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <?php if ($settings['subtitle']) { ?>
            <span><?php echo $settings['subtitle']; ?></span>
        <?php } ?>
        <?php if ($settings['title']) { ?>
            <a href="<?php echo $settings['button_link']['url']; ?>">
                <h4 class="fw-semibold mb-0">
                    <?php echo $settings['title']; ?>
                </h4>
            </a>
        <?php } ?>
    </div>
    <?php
}

function lvgshop_banner_style_8($settings) {
    ?>
    <div class="el2-banner-6 text-center h-100">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <?php if ($settings['title']) { ?>
            <h2><?php echo $settings['title']; ?></h2>
        <?php } ?>
        <?php if ($settings['button_title']) { ?>
            <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-blue el-btn"><?php echo $settings['button_title']; ?>
                <span class="ms-2"><i class="fas fa-arrow-right"></i></span>
            </a>
        <?php } ?>
    </div>
    <?php
}

function lvgshop_banner_style_9($settings) {
    ?>
    <div class="el2-banner-8 text-center">
        <!-- banner img -->
        <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <?php if ($settings['subtitle']) { ?>
            <span class="yellow-text-color"><?php echo $settings['subtitle']; ?></span>
        <?php } ?>
        <?php if ($settings['title']) { ?>
            <h2 class="fw-semibold mt-1 mb-5">
                <?php echo $settings['title']; ?>
            </h2>
        <?php } ?>
        <?php if ($settings['button_title']) { ?>
            <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-yellow el-btn"><?php echo $settings['button_title']; ?>
                <span class="ms-2"> <i class="fas fa-arrow-right"></i> </span>
            </a>
        <?php } ?>
    </div>
    <?php
}

function lvgshop_banner_style_10($settings) {
    ?>
    <!-- banner widget -->
    <div class="sidebar-banner-widget-3 wow fadeInUp">
        <a href="<?php echo $settings['button_link']['url']; ?>" class="banner-1">
            <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
            <div class="inner-box">
                <?php if ($settings['subtitle']) { ?>
                    <span class="badge-title text-uppercase"><?php echo $settings['subtitle']; ?></span>
                <?php } ?>
                <?php if ($settings['style-10-title']) { ?>
                    <h3 class="et__title">
                        <?php echo $settings['style-10-title']; ?>
                    </h3>
                <?php } ?>
                <span class="tag-line mb-20 d-block"><?php echo $settings['price_before_tagline']; ?> <span class="text-light-red"><?php echo $settings['price']; ?></span></span>
            </div>
        </a>
    </div>
    <?php
}

function lvgshop_banner_style_11($settings) {
    ?>
    <!-- banner widget -->
    <div class="el-banner-section-3">
        <a href="<?php echo $settings['button_link']['url']; ?>" class="banner-1">
            <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
            <div class="inner-box">
                <?php if ($settings['subtitle']) { ?>
                    <span class="tag-line mb-10"><?php echo $settings['subtitle']; ?></span>
                <?php } ?>
                <?php if ($settings['title']) { ?>
                    <h4 class="title mb-20"><?php echo $settings['title']; ?></h4>
                <?php } ?>
                <?php if ($settings['button_title']) { ?>
                    <span class="btn-white el-btn"><?php echo $settings['button_title']; ?> <i class="fa-solid fa-arrow-right"></i></span>
                <?php } ?>
            </div>
        </a>
    </div>
    <?php
}

function lvgshop_banner_style_12($settings) {
    ?>
    <!-- banner widget -->
    <div class="el-banner-section-3">
        <a href="<?php echo $settings['button_link']['url']; ?>" class="banner-1">
            <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
            <div class="inner-box">
                <?php if ($settings['subtitle']) { ?>
                    <span class="badge-title bg-light-red mb-10"><?php echo $settings['subtitle']; ?></span>
                <?php } ?>
                <?php if ($settings['title']) { ?>
                    <h4 class="title mb-20"><?php echo $settings['title']; ?></h4>
                <?php } ?>
                <span class="price-wrapper">

                    <?php if ($settings['sell_price']) { ?>
                        <span class="current-price"><?php echo $settings['sell_price']; ?></span>
                    <?php } ?>
                    <?php if ($settings['regular_price']) { ?>
                        <span class="old-price"><del><?php echo $settings['regular_price']; ?></del></span>
                    <?php } ?>
                    </span>
            </div>
        </a>
    </div>
    <?php
}

function lvgshop_banner_style_13($settings) {
    ?>
    <!--banner section start-->
    <section class="el2-banner7-box bg-white pb-120 wow fadeInUp">
        <div class="container-1440 position-relative z-1 overflow-hidden custom_container_width">
            <div class="el2-banner-7 d-flex align-items-center">
                <?php if ($settings['section_bg_img']['url']) { ?>
                    <img src="<?php echo $settings['section_bg_img']['url']; ?>" alt="earphone"
                         class="position-absolute el2-earphone-shape d-none d-xl-block">
                <?php } ?>
                <?php if ($settings['right_banner_img']['url']) { ?>
                    <img src="<?php echo $settings['right_banner_img']['url']; ?>" alt="watch"
                         class="position-absolute el2-watch-shape d-none d-xl-block">
                <?php } ?>
                <h3 class="fw-semibold mb-0 lvgshop__banner_title"><?php echo $settings['title']; ?></h3>
                <?php if ($settings['button_title']) { ?>
                    <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-dark light-hover el-btn"><?php echo $settings['button_title']; ?>
                        <span class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--banner section end-->
    <?php
}

function lvgshop_banner_style_14($settings) {
    ?>
    <!-- banner section start -->
    <div class="el-banner-section-4 wow fadeInUp">
        <?php if ($settings['section_bg_img']['url']) { ?>
            <span class="banner-img" data-background="<?php echo $settings['section_bg_img']['url']; ?>"></span>
        <?php } ?>
        <?php if ($settings['subtitle']) { ?>
            <span class="tag-line mb-10 d-block"><?php echo $settings['subtitle']; ?></span>
        <?php } ?>
        <?php if ($settings['title']) { ?>
            <h3 class="title mb-10 et__title">
                <?php echo $settings['title']; ?>
            </h3>
        <?php } ?>

        <?php if ($settings['info']) { ?>
            <p class="mb-20 info_style_14"> <?php echo $settings['info']; ?></p>
        <?php } ?>
        <?php if ($settings['button_title']) { ?>
            <a class="btn-yellow el-btn sm-btn rounded-pill" href="<?php echo $settings['button_link']['url']; ?>">
                <?php echo $settings['button_title']; ?>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        <?php } ?>
    </div>
    <!-- banner section end -->
    <?php
}




