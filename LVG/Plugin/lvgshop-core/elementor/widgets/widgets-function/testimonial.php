<?php

function lvgshop_review_one($settings)
{
    $review = $settings['list'];
    ?>
    <!-- testimonial section start -->
    <section class="el-testimonial-section pt-110 pb-80">
        <div class="container container-xxxl">
            <!-- title bar -->
            <div class="row align-items-center mb-50">
                <div class="col-md-6 wow fadeInUp">
                    <h2 class="text-capitalize font-semibold">
                        <?php echo esc_html( $settings['feedback_top_title'] ); ?>
                    </h2>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end mt-30 mt-md-0 wow fadeInUp">
                    <a class="btn-yellow el-btn" href="<?php echo esc_html( $settings['feedback_button_link']['url'] ); ?>"><?php echo esc_html( $settings['feedback_button'] ); ?> <i
                                class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- main content -->
            <div class="row">
                <div class="col-lg-4 mb-30 wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img class="testi-left-img" src="<?php echo esc_html( $settings['feedback_images']['url']); ?>" alt="testimonial img">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        $i = 1;
                        foreach ($review as $reviews) {
                            ?>
                            <div class="col-lg-6 mb-30 wow fadeInUp" data-wow-delay=".<?php echo $i++ ?>s">
                                <div class="el-single-testimonial">
                                    <div class="review-start-wrapper">
                                        <?php display_rating_star( $reviews['rating'] ); ?>

                                    </div>
                                    <p>
                                        “<?php echo esc_html( $reviews['feedback_decription'] ); ?>”
                                    </p>
                                    <div class="btm-content">
                                        <img class="user-img" src="<?php echo esc_html( $reviews['feedback_image']['url'] ); ?>" alt="user">
                                        <div>
                                            <span class="name"><?php echo esc_html( $reviews['feedback_title'] ); ?></span>
                                            <span class="desig"><?php echo esc_html( $reviews['feedback_date'] ); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->
    <?php
}
function lvgshop_review_two($settings){
    $review = $settings['list'];
    ?>
    <!-- customer feedback widget -->
    <div class="customer-feddback-widget theme-border-1 mt-30 wow fadeInUp">
        <h4>  <?php echo esc_html( $settings['feedback_top_title'] ); ?></h4>
        <div class="divider"></div>
        <div class="sidebar-customer-feedback-slider">
            <?php
    foreach ($review as $reviews) {
        ?>
        <div class="single-cf-feedback">
            <div class="review-start-wrapper">
                <?php display_rating_star( $reviews['rating'] ); ?>
            </div>
            <p>
                <?php echo esc_html( $reviews['feedback_decription'] ); ?>
            </p>
            <div class="author-box">
                <img src="<?php echo esc_html( $reviews['feedback_image']['url'] ); ?>" alt="author img">
                <div class="contents">
                    <span class="name"><?php echo esc_html( $reviews['feedback_title'] ); ?></span>
                    <span class="desig"><?php echo esc_html( $reviews['feedback_date'] ); ?></span>
                </div>
            </div>
        </div>
            <?php
    }
        ?>


        </div>
    </div>
<?php
}