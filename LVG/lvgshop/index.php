<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LVG Shop by M7
 */

get_header();
$arcive_img = cs_get_option('arcuve_banner_gallerys_imgs');
$arcive_card_img = is_array($arcive_img) && !empty($arcive_img['url']) ? $arcive_img['url'] : '';
$arciv_title = cs_get_option('arcive-titless-text');
$arciv_sub_title = cs_get_option('arcive-subs-text');

?>

    <!--breadcrumb section start-->
    <div class="breadcrumb-section pt-40 pb-40">
        <div class="container">
            <?php if (class_exists('Lvgshop_Core')){?>
            <?php lvgshop_breadcrumbs();


            ?>
            <?php } else { ?>
            <h4 class="blog-alt-bd-title">Blog</h4>
            <?php } ?>
        </div>
    </div>
    <!--breadcrumb section end-->
    

    <div class="ptb-120 wow fadeInUp">
        <div class="container container-xxxl">
            <div class="row">
                <div class="col-12 col-md-8">
                    
                <div class="row" data-masonry='{"percentPosition": true }'>
                <?php
                if (have_posts()) :

                    if (is_home() && !is_front_page()) :
                        ?>
                       
                    <?php
                    endif;

                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'post');

                    endwhile;

                    lvgshop_page_navs();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
                </div>
                </div>
                <?php if (is_active_sidebar('lvgshop-sidebar')) { ?>
                    <!-- sidebar -->
                    <div class="col-lg-4 col-xl-3">
                        <?php dynamic_sidebar('lvgshop-sidebar'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php

get_footer();
