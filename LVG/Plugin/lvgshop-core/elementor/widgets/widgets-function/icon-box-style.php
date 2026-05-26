<?php
function lvgshop_icon_box_style_1($settings) {
    ?>
    <!-- features support section start -->
    <section class="el-fea-support-section bg-blue wow fadeInUp">
        <div class="container container-xxxl">
            <div class="row">
                <?php
                $first = 1;
                foreach ($settings['list'] as $item) {
                    ?>
                    <div class="col-12 col-md-6 col-xl-3 wow animate__flipInX" data-wow-delay=".1s">
                        <div class="el-single-fea-support el-single-fea-support<?php echo $first++; ?>">
                            <svg class="el-line" width="1" height="59" viewBox="0 0 1 59" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.2" width="1" height="59" fill="white"/>
                            </svg>
                            <span class="svg-margin"> <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?></span>
                            <!--                           <img src=" --><?php //echo $item['image']['url']; ?><!--" alt="icon" class="fea-img img-icon">-->
                            <div>
                                <?php if ($item['title']) { ?>
                                    <h4 class="title"><?php echo $item['title']; ?></h4>
                                <?php } ?>
                                <?php if ($item['info']) { ?>
                                    <p class="des"><?php echo $item['info']; ?></p>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </section>
    <!-- features support section end -->
    <?php
}

function lvgshop_icon_box_style_2($settings) {
    ?>
    <ul class="shipping-sidebar-widget theme-border-1 mt-30 wow fadeInUp"
        style="visibility: visible; animation-name: fadeInUp;">
        <?php
        foreach ($settings['list'] as $item) {
            ?>
            <li>
                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                <div class="right-side">
                    <?php if ($item['title']) { ?>
                        <span class="title"><?php echo $item['title']; ?></span>
                    <?php } ?>
                    <?php if ($item['info']) { ?>
                        <span class="subtitle"><?php echo $item['info']; ?></span>
                    <?php } ?>

                </div>
            </li>
            <?php
        }
        ?>


    </ul>
    <?php
}

function lvgshop_icon_box_style_3($settings) {
    ?>
    <!-- about feature section start -->
    <div class="el-main-about-fea-section ptb-100">
        <div class="container container-xxxl custom_container_width">
            <div class="row">
                <?php
                $i = 0;
                foreach ($settings['list'] as $item) {
                    ?>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay=".<?php echo $i; ?>s">
                        <div class="single-about-feature">
                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                            <?php if ($item['title']) { ?>
                                <h4 class="title"><?php echo $item['title']; ?></h4>
                            <?php } ?>
                            <?php if ($item['info']) { ?>
                                <p class="subtitle">
                                    <?php echo $item['info']; ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- about feature section end-->
    <?php
}







