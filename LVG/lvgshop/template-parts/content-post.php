<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LVG Shop by M7
 */
$post_id = get_the_ID();
?>


<div class="col-12 col-lg-6 col-xl-5 col-xxl-6 mb-30 wow fadeInUp">
    <article class="el-single-blog layout-2">
        <?php if (has_post_thumbnail()) { ?>
            <div class="thumbnail">
                <div class="inner-box">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail() ?>
                    </a>
                </div>
            </div>
        <?php } ?>

        <div class="main-contents">
            <div class="tags-wrapper">
                <?php if (has_tag()) { ?>
                    <span class="tag">
                        <?php
                        $tag_name = get_the_tags(get_the_ID())[0]->name;
                        $tag_id = get_the_tags(get_the_ID())[0]->term_id;
                        ?>
                        <i class="fa-solid fa-tag me-2 d-inline-block"></i>
                        <a href="<?php echo esc_url(get_term_link($tag_id)); ?>">
                            <?php echo esc_html($tag_name); ?>
                        </a>
                    </span>
                <?php } ?>
                <span class="tag">
                  <i class="fa-regular fa-comment-dots d-inline-block"></i>
                    <?php
                        if (0 < get_comments_number()) {
                            echo get_comments_number() . ' comments';
                        } else {
                            echo 0 . ' comment';
                        }
                    ?>
                </span>
                <span class="tag">
                  <i class="fa-regular fa-clock d-inline-block"></i>
                  <?php echo esc_html(lvgshop_reading_time()); ?>
                </span>
            </div>

            <h4>
                <a class="h4 title" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>

            <p>
                <?php echo wp_trim_words(get_the_excerpt(), 16, '...'); ?>
            </p>
            <a class="blog-btn" href="<?php the_permalink(); ?>"><?php _e('read now', 'lvgshop'); ?> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </article>
</div>