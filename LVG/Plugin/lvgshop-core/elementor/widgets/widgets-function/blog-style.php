<?php
function lvgshop_blog_style_1($settings, $the_query)
{
    global $post;
    ?>
    <!-- latest blog section start -->
    <section class="el-latest-blog-section pb-115">
        <div class="container container-xxxl">
            <!-- title bar -->
            <div class="row justify-content-center mb-40 wow fadeInUp">
                <div class="col-md-6 text-center">
                    <h2 class="text-capitalize font-semibold elemt-title"><?php echo $settings['title']; ?></h2>
                </div>
            </div>

            <!-- main content -->
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-xxl-6">
                    <div class="row">
                        <?php
                        if ($the_query->have_posts()) {
                            $i = 0;
                            $x = 0;
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                $i++;
                                $x++;

                                ?>
                                <div class="col-12 col-lg-6 col-xl-12 mb-30 wow animate__fadeInLeft"
                                     data-wow-delay=".<?php echo $i; ?>s">
                                    <article class="el-single-blog">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="thumbnail">
                                                <div class="inner-box">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="blog img">
                                                    </a>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <div class="main-contents">
                                            <div class="tags-wrapper">
                    <span class="tag">
                      <i class="fa-solid fa-tag me-2 d-inline-block"></i>
                      <?php if (get_the_category_list()) { ?>
                          <?php lvgshop_post_cat(); ?><?php } ?>
                    </span>
                                                <span class="tag">
                      <i class="fa-regular fa-comment-dots d-inline-block"></i>
                       <?php

                       echo get_comments_number($post->ID); ?> comments
                    </span>
                                                <span class="tag">
                      <i class="fa-regular fa-clock d-inline-block"></i>
                    <?php echo reading_time(); ?>
                    </span>
                                            </div>

                                            <h4>
                                                <a class="h4 title" href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>

                                            <p class="decription-pro">
                                                <?php echo wp_trim_words(get_the_content(), 17); ?>
                                            </p>
                                            <a class="blog-btn" href="<?php the_permalink(); ?>">read now <i
                                                        class="fa-solid fa-arrow-right"></i></a>

                                        </div>
                                    </article>
                                </div>

                                <?php

                                if ($x == 2) {
                                    break;
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
                <?php
                if ($the_query->have_posts()) {
                    $i = 3;
                    $x = 0;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        if ($x == 2) {
                            continue;
                        }
                        $x++;
                        ?>
                        <div class="col-12 col-lg-6 col-xl-5 col-xxl-6 mb-30 wow animate__fadeInRight "
                             data-wow-delay=".<?php echo $i; ?>s">
                            <article class="el-single-blog layout-2">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="thumbnail thumbnail thumbnail-right">
                                        <div class="inner-box">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="blog img">
                                            </a>
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="main-contents">
                                    <div class="tags-wrapper">
                <span class="tag">
                  <i class="fa-solid fa-tag me-2 d-inline-block"></i>
                 <?php if (get_the_category_list()) { ?>
                     <?php lvgshop_post_cat(); ?><?php } ?>
                </span>
                                        <span class="tag">
                  <i class="fa-regular fa-comment-dots d-inline-block"></i>

                  <?php

                  echo get_comments_number($post->ID); ?> comments
                </span>
                                        <span class="tag">
                  <i class="fa-regular fa-clock d-inline-block"></i>
                   <?php echo reading_time(); ?>
                </span>
                                    </div>

                                    <h4>
                                        <a class="h4 title" href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>

                                    <p  class="decription-pro">
                                        <?php echo wp_trim_words(get_the_content(), 28); ?>
                                    </p>
                                    <a class="blog-btn" href="<?php the_permalink(); ?>">read now <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                        <?php
                        if ($x == 3) {
                            break;
                        }
                    }
                }
                ?>

                <div class="col-12 text-center mt-20 wow fadeInUp" data-wow-delay=".4s">

                    <a class="btn-yellow el-btn" href="<?php echo $settings['button_link']['url']; ?>"><?php echo $settings['button_text']; ?> <i
                                class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- latest blog section end -->
    <?php
}

function lvgshop_blog_style_2($settings, $the_query)
{
    global $post;
    ?>
    <!--blog section start-->
    <section class="el2-blog-section ptb-120 bg-white">
        <div class="container-1440">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-7 wow fadeInUp">
                    <div class="el2-section-title text-center text-xl-start">
                        <span class="el2-section-subtitle "><?php echo $settings['decription_title']; ?></span>
                        <h2 class="fw-semibold mb-0 elemt-title"><?php echo $settings['title']; ?></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 align-self-end wow fadeInUp">
                    <div class="text-center text-lg-end mt-4 mt-lg-0">
                        <a href="<?php echo $settings['button_link']['url']; ?>" class="btn-yellow el-btn"><?php echo $settings['button_text']; ?>
                            <span class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row g-30 mt-20">
                <?php
                if ($the_query->have_posts()) {
                    $i = 1;

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        ?>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay=".<?php echo $i; ?>>s">
                            <div class="el2-blog-card text-end position-relative">

                                <?php if (has_post_thumbnail()) { ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="blog img"
                                             class="img-fluid rounded-1 blog-img">
                                    </a>
                                <?php } ?>

                                <div class="el2-blog-card-content text-start">
                                    <div class="el2-blog-meta">
                <span>
                   <i class="fa-solid fa-tag me-2 d-inline-block"></i>
                 <?php if (get_the_category_list()) { ?>
                     <?php lvgshop_post_cat(); ?><?php } ?>
                </span>
                                        <span>
                  <i class="fa-regular fa-comment-dots d-inline-block"></i>

                  <?php

                  echo get_comments_number($post->ID); ?> comments
                </span>
                                        <span>
                   <i class="fa-regular fa-clock d-inline-block"></i>
                   <?php echo reading_time(); ?>
                </span>
                                    </div>
                                    <a class="" href="<?php the_permalink(); ?>">
                                        <h4 class="semibold mb-3 title">
                                            <?php the_title(); ?>
                                        </h4>
                                    </a>
                                    <p class="decription-pro mb-4">
                                        <?php echo wp_trim_words(get_the_content(), 17); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="el2-explore-btn blog-btn">Read Now
                                        <span class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                ?>

            </div>
        </div>
    </section>
    <!--blog section end-->
    <?php
}

function lvgshop_blog_style_3($settings, $the_query)
{
    global $post;
    ?>
    <!-- blog section start -->
    <div class="el3-blog-section mt-70">
        <!-- title bar -->
        <div class="row align-items-center wow fadeInUp">
            <div class="col-12 text-center position-relative mb-10">
                <div class="divider"></div>
                <h3 class="postion-title-bar text-capitalize font-semibold elemt-title">
                    <?php echo $settings['title']; ?>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            if ($the_query->have_posts()) {
                $i = 3;

                while ($the_query->have_posts()) {
                    $the_query->the_post();

                    $i++;

                    ?>
                    <div class="col-md-6 col-xxl-4 mt-30 wow fadeInUp" data-wow-delay=".<?php echo $i; ?>s">
                        <article class="el-single-blog layout-2 layout-3">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="thumbnail">
                                    <div class="inner-box">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="blog img">
                                        </a>
                                        <span class="date-wrapper">
                                  <?php lvgshop_posted_on_without_year(); ?>
                      <span class="day"><?php echo get_the_date('d'); ?></span>
                      <span class="month"><?php echo get_the_date('M'); ?></span>
                    </span>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="main-contents">
                                <div class="tags-wrapper">
                    <span class="tag">
                      <i class="fa-regular fa-comment-dots d-inline-block"></i>
                      <?php
                      echo get_comments_number($post->ID); ?> comments
                    </span>
                                    <span class="tag">
                      <i class="fa-regular fa-clock d-inline-block"></i>
                       <?php echo reading_time(); ?>
                    </span>
                                </div>

                                <h4>
                                    <a class="h4 title" href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>

                                <p  class="decription-pro">
                                    <?php echo wp_trim_words(get_the_content(), 17); ?>
                                </p>
                                <a class="blog-btn" href="<?php the_permalink(); ?>">read now <i
                                            class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>
    <!-- blog section end -->
    <?php
}

function lvgshop_blog_style_4($settings, $the_query)
{
    ?>

    <!--blog section start-->
    <section class="ab-blog-section ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="section-title mb-70">
                        <?php if ($settings['title']) { ?>
                            <h2 class="mb-40 fw-regular text-uppercase hm2-font-family"><?php echo $settings['title']; ?></h2>
                        <?php } ?>
                        <?php if ($settings['Info']) { ?>
                            <p class="mb-0"><?php echo $settings['Info']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php
                if ($the_query->have_posts()) {
                    $i = 0;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        ?>
                        <div class="col-xl-4 col-lg-6">
                            <article class="ab-article">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="feature-image">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="feature imge"
                                             class="img-fluid">
                                    </div>
                                <?php } ?>

                                <div class="ab-article-box">
                                    <span class="text-main-color blog-meta"><?php echo get_the_date('d M, Y'); ?></span>
                                    <h5 class="mt-3 mb-4"><?php the_title(); ?></h5>
                                    <p><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                                    <a href="<?php the_permalink(); ?>"
                                       class="explore-btn"><?php echo $settings['button_text']; ?></a>
                                </div>
                            </article>

                        </div>
                        <?php
                    }
                }

                ?>
            </div>
    </section>
    <!--blog section end-->

    <?php

}

function lvgshop_blog_style_5($settings, $the_query)
{
    ?>
    <!--blog section start-->
    <section class="hm3-blog-section overflow-hidden pb-140">
        <div class="container-1400 custom_container_width">
            <div class="row">
                <div class="col-xl-6">
                    <div class="section-title">
                        <?php if ($settings['Info']) { ?>
                            <span class="fs-sm text-uppercase"><?php echo $settings['Info']; ?></span>
                        <?php } ?>
                        <?php if ($settings['title']) { ?>
                            <h2 class="hm2-font-family mb-0 mt-4"><?php echo $settings['title']; ?></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="hm3-blog-slider mt-70 slider-spacing">
                <?php
                if ($the_query->have_posts()) {
                    $i = 0;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        ?>
                        <div class="single-item">
                            <article class="blog-card">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="feature-image overflow-hidden">
                                        <a href="<?php the_permalink(); ?>"><img
                                                    src="<?php the_post_thumbnail_url(); ?>" alt="feature img"
                                                    class="img-fluid"/></a>
                                    </div>
                                <?php } ?>
                                <div class="blog-meta mt-30 mb-30 d-flex align-items-center gap-30">
                                    <span class="fw-medium"><i
                                                class="fa-regular fa-user me-2"></i><?php echo get_the_author_meta('display_name'); ?></span>
                                    <span class="fw-medium"><i
                                                class="fa-regular fa-calendar me-2"></i><?php echo get_the_date('d M, Y'); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="blog-title"><h5
                                            class="mb-40 fw-semibold"><?php the_title(); ?></h5></a>
                                <a href="<?php the_permalink(); ?>"
                                   class="explore-btn"><?php echo $settings['button_text']; ?></a>
                            </article>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>
    <!--blog section end-->
    <?php
}






