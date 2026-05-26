<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LVG Shop by M7
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!--breadcrumb section start-->
    <div class="breadcrumb-section pt-40 pb-40">
        <div class="container">
            <?php lvgshop_breadcrumbs();?>
        </div>
    </div>
    <!--breadcrumb section end-->

    <?php lvgshop_post_thumbnail(); ?>
    <div class="container-lvgshop-full">
        <div class="post-content lvgshop-default-page-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lvgshop' ),
                    'after'  => '</div>',
                )
            );
            ?>


            <?php if ( get_edit_post_link() ) : ?>
                <div class="post-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'lvgshop' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </div><!-- .post-footer -->
            <?php endif; ?>



            <div class="clearfix"></div>
            <div class="lvgshop-page-comment-section">
                <div class="container">
                    <?php	// If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                    ?>
                </div>

            </div>
        </div><!-- .post-content -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

