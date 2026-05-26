<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LVG Shop by M7
 */

$title_hide_wd = cs_get_option('x_sbl_width_set');

$tag_list = get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--breadcrumb section start-->
    <div class="breadcrumb-section pt-40 pb-40" data-background="assets/images/shapes/breadcrumb-bg.jpg">
        <div class="container">
            <?php lvgshop_breadcrumbs(); ?>
        </div>
    </div>
    <!--breadcrumb section end-->

    <!-- blog section start -->
    <section class="el-blog-details-section ptb-120 wow fadeInUp">
        <div class="container container-xxxl">
            <div class="row">
                <?php
                $class = is_active_sidebar('lvgshop-sidebar') ? 'col-lg-8 col-xl-9 el-blog-single-with-sidebar' : 'col-xl-12';
                ?>
                <!-- main content -->
                <div class="<?php echo esc_attr($class); ?>">
                    <?php if (has_post_thumbnail()) { ?>
                    <article class="el-single-blog layout-2 lg-layout mb-30">
                        <?php } else { ?>
                        <article class="el-single-blog el-single-blog-wt-thumb  layout-2 lg-layout mb-30">
                            <?php } ?>
                            <div class="thumbnail">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="inner-box">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="blog img">
                                        </a>
                                    </div>
                                <?php } ?>

                                <div class="lg-inner-contents" style="<?php if (!has_post_thumbnail()) {
                                    echo 'position: relative';
                                } ?>">
                                    <h3 class="lg-title"><?php the_title(); ?></h3>
                                    <div class="lg-meta-wrapper">
                                  <span class="lg-common-txt">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <g clip-path="url(#clip0_60_6131)">
                                        <path
                                                d="M12.75 2.25H15.75C15.9489 2.25 16.1397 2.32902 16.2803 2.46967C16.421 2.61032 16.5 2.80109 16.5 3V15C16.5 15.1989 16.421 15.3897 16.2803 15.5303C16.1397 15.671 15.9489 15.75 15.75 15.75H2.25C2.05109 15.75 1.86032 15.671 1.71967 15.5303C1.57902 15.3897 1.5 15.1989 1.5 15V3C1.5 2.80109 1.57902 2.61032 1.71967 2.46967C1.86032 2.32902 2.05109 2.25 2.25 2.25H5.25V0.75H6.75V2.25H11.25V0.75H12.75V2.25ZM15 8.25H3V14.25H15V8.25ZM11.25 3.75H6.75V5.25H5.25V3.75H3V6.75H15V3.75H12.75V5.25H11.25V3.75ZM4.5 9.75H6V11.25H4.5V9.75ZM8.25 9.75H9.75V11.25H8.25V9.75ZM12 9.75H13.5V11.25H12V9.75Z"
                                                fill="white"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_60_6131">
                                          <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    <?php echo get_the_date('M d, Y'); ?>
                                  </span>
                                        <span class="lg-common-txt">
                                          <?php
                                          $author_id = get_the_author_meta('ID');
                                          ?>

                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <g clip-path="url(#clip0_60_6134)">
                                                <path
                                                        d="M3 16.5C3 14.9087 3.63214 13.3826 4.75736 12.2574C5.88258 11.1321 7.4087 10.5 9 10.5C10.5913 10.5 12.1174 11.1321 13.2426 12.2574C14.3679 13.3826 15 14.9087 15 16.5H3ZM9.75 12.0623V15H13.2443C12.9761 14.2436 12.5109 13.5724 11.8966 13.056C11.2823 12.5395 10.5413 12.1964 9.75 12.0623ZM8.25 15V12.0623C7.45875 12.1964 6.71768 12.5395 6.10339 13.056C5.48909 13.5724 5.02385 14.2436 4.75575 15H8.25ZM9 9.75C6.51375 9.75 4.5 7.73625 4.5 5.25C4.5 2.76375 6.51375 0.75 9 0.75C11.4862 0.75 13.5 2.76375 13.5 5.25C13.5 7.73625 11.4862 9.75 9 9.75ZM9 8.25C10.6575 8.25 12 6.9075 12 5.25C12 3.5925 10.6575 2.25 9 2.25C7.3425 2.25 6 3.5925 6 5.25C6 6.9075 7.3425 8.25 9 8.25Z"
                                                        fill="white"/>
                                              </g>
                                              <defs>
                                                <clipPath id="clip0_60_6134">
                                                  <rect width="18" height="18" fill="white"/>
                                                </clipPath>
                                              </defs>
                                            </svg>
                                            <?php echo __('by', 'lvgshop'); ?>
                                              <a href="<?php echo esc_url((get_author_posts_url($author_id))); ?>">
                                                  <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                              </a>
                                        </span>
                                        <span class="lg-common-txt">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <g clip-path="url(#clip0_60_6137)">
                                                <path
                                                        d="M1.44226 7.02765C1.05976 6.8739 1.06426 6.64515 1.46776 6.5109L15.7823 1.7394C16.179 1.6074 16.4063 1.8294 16.2953 2.2179L12.2048 16.5324C12.0923 16.9292 11.8485 16.9472 11.667 16.5849L8.25001 9.75015L1.44226 7.02765ZM5.10976 6.87765L9.33676 8.5689L11.6168 13.1304L14.2763 3.8229L5.10901 6.87765H5.10976Z"
                                                        fill="white"/>
                                              </g>
                                              <defs>
                                                <clipPath id="clip0_60_6137">
                                                  <rect width="18" height="18" fill="white"/>
                                                </clipPath>
                                              </defs>
                                            </svg>
                                            <?php if (get_the_category_list()) { ?>
                                                <?php lvgshop_post_cat(); ?>
                                            <?php } ?>
                                        </span>
                                        <span class="lg-common-txt">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <g clip-path="url(#clip0_60_6140)">
                                            <path
                                                    d="M4.09125 11.25L0.75 13.875V2.25C0.75 2.05109 0.829018 1.86032 0.96967 1.71967C1.11032 1.57902 1.30109 1.5 1.5 1.5H12.75C12.9489 1.5 13.1397 1.57902 13.2803 1.71967C13.421 1.86032 13.5 2.05109 13.5 2.25V11.25H4.09125ZM3.57225 9.75H12V3H2.25V10.7887L3.57225 9.75ZM6 12.75H13.6777L15 13.7887V6H15.75C15.9489 6 16.1397 6.07902 16.2803 6.21967C16.421 6.36032 16.5 6.55109 16.5 6.75V16.875L13.1588 14.25H6.75C6.55109 14.25 6.36032 14.171 6.21967 14.0303C6.07902 13.8897 6 13.6989 6 13.5V12.75Z"
                                                    fill="white"/>
                                          </g>
                                          <defs>
                                            <clipPath id="clip0_60_6140">
                                              <rect width="18" height="18" fill="white"/>
                                            </clipPath>
                                          </defs>
                                        </svg>
                                        <?php
                                        if (0 < get_comments_number()) {
                                            echo get_comments_number() . ' comments';
                                        } else {
                                            echo 0 . ' comment';
                                        }
                                        ?>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article>

                            <?php the_content(); ?>

                            <div class="el-tags-and-social-wrapper wow fadeInUp">
                                <div class="tags-wrapper">
                                    <?php echo maybe_unserialize($tag_list); ?>
                                </div>

                                <?php
                                if (class_exists('Lvgshop_Core')) {
                                    lvgshop_single_blog_social_share();
                                } ?>

                            </div>


                            <div class="divider mb-30"></div>

                            <!-- next prev post -->
                            <div class="navigation">

                            </div>

                            <div class="next-prev-blogs mb-60 wow fadeInUp">
                                <?php
                                $left_arrow_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 12H5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M12 19L5 12L12 5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>';
                                previous_post_link('%link', $left_arrow_icon . ' Prev Post');
                                ?>
                                <?php
                                $next_arrow_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="#1F7F38" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="#1F7F38" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>';
                                next_post_link('%link', 'next post ' . $next_arrow_icon);
                                ?>
                            </div>


                            <!-- comment box  -->
                            <div class="comment-box mb-40 wow fadeInUp">
                                <?php

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                            </div>
                        </article>
                </div>
                <?php if (is_active_sidebar('lvgshop-sidebar')) { ?>
                    <!-- sidebar -->
                    <div class="col-lg-4 col-xl-3">
                        <div class="lvgshop__single-blog-sidebar">
                            <?php dynamic_sidebar('lvgshop-sidebar'); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- blog section end -->
</article>