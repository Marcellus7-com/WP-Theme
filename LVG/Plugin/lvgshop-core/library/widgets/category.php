<?php if ( ! defined( 'ABSPATH' )  ) { die; }

CSF::createWidget( 'lvgshop_post_category_widget', array(
    'title'       => 'Lvgshop Post category',
    'classname'   => 'lvgshop-post-category',
    'description' => 'Lvgshop Post details on sidebar.',
    'fields'      => array(


        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => 'Title',
        ),




    )
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if( ! function_exists( 'lvgshop_post_category_widget' ) ) {
    function lvgshop_post_category_widget( $args, $instance ) {

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) { ?>
            <h2 class="widget-title"><?php echo $instance['title'];?></h2>
        <?php  }
        ?>

        <div class="sidebar-widget categories-widget">
            <ul class="sidebar-check-fields">

                <?php
                // Get the taxonomy's terms
                $terms = get_terms(
                    array(
                        'taxonomy'   => 'category',
                        'hide_empty' => true,
                    )
                );

                // Check if any term exists
                if ( ! empty( $terms ) && is_array( $terms ) ) {
                    // Run a loop and print them all
                    foreach ( $terms as $term ) {
                        ?>
                        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                <li><label><input class="sidebar-cat-link" type="checkbox">

                        <span>


                            <?php echo $term->name; ?>

                        </span>

                    </label></li>
                        </a>
                        <?php
                    }
                }
                ?>

            </ul>
        </div>


        <?php    echo $args['after_widget'];
    }
}


