<?php
/**
 * The template for displaying archive pages
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
            <?php lvgshop_breadcrumbs(); ?>
        </div>
    </div>
    <!--breadcrumb section end-->
    <section class="bp-blog-section ptb-140">
        <div class="container">
            <div class="row g-5 g-xl-4">
                <?php if (is_active_sidebar('lvgshop-sidebar')) { ?>
                <div class="col-xl-8">
                    <div class="row blog-list-items ">
                        <?php }else{ ?>
                        <div class="col-md-12">
                            <div class="row blog-list-items ">
                                <?php } ?>

                                <?php
                                $i = 0;
                                if (have_posts()) :

                                    if (is_home() && !is_front_page()) :
                                        ?>

                                    <?php
                                    endif;

                                    /* Start the Loop */
                                    while (have_posts()) :
                                        the_post();
                                        $i++;

                                        /*
                                        * Include the Post-Type-specific template for the content.
                                        * If you want to override this in a child theme, then include a file
                                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                        */

                                        ?>
                                        <div class="blog-list-single-item mt-60">
                                            <?php
                                            get_template_part('template-parts/content', 'post');
                                            ?>
                                        </div>
                                        <?php
                                        if ($i == 2) {
                                            break;
                                        }

                                    endwhile;
                                    ?>
                                    <div class="blog-list-single-item blog-formate-quote mt-60">
                                        <span class="quote-icon">

                                             <img src="<?php echo esc_url($arcive_card_img); ?>" alt="cards"
                                                  class="img-fluid">
                                            <?php

                                            ?>
                                        </span>
                                        <div>
                                            <h4 class="mb-0 fw-medium mb-4"><?php echo esc_html($arciv_title); ?></h4>
                                            <span class="text-main-color"><?php echo esc_html($arciv_sub_title); ?></span>
                                        </div>
                                    </div>

                                    <?php
                                    while (have_posts()) {
                                        the_post();
                                        $i++;
                                        if ($i == 2) {
                                            continue;
                                        } ?>
                                        <div class="blog-list-single-item mt-60">
                                            <?php
                                            get_template_part('template-parts/content', 'post');
                                            ?>
                                        </div>
                                    <?php  }

                                    lvgshop_page_navs();

                                else :

                                    get_template_part('template-parts/content', 'none');

                                endif;
                                ?>
                            </div>
                        </div>
                        <?php if (is_active_sidebar('lvgshop-sidebar')) { ?>
                            <div class="col-md-3 lvgshop-sidebar">
                                <?php dynamic_sidebar('lvgshop-sidebar'); ?>
                            </div>
                        <?php } ?>


                    </div>
                </div><!-- #container -->
    </section>
<?php

get_footer();
