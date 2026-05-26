<?php
if( class_exists( 'CSF' ) ) {

    CSF::createWidget( 'lvgshop_product__widget', array(
        'title'       => 'Lvgshop product',
        'classname'   => 'lvgshop-products',
        'description' => 'Lvgshop product Widget to show blog product on sidebar.',
        'fields'      => array(


            array(
                'id'      => 'title',
                'type'    => 'text',
                'title'   => 'Title',
            ),

            array(
                'id'      => 'post_count',
                'type'    => 'number',
                'title'   => 'product Count',
            ),

            array(
                'id'          => 'order',
                'type'        => 'select',
                'title'       => 'Select',
                'placeholder' => 'Select an option',
                'options'     => array(
                    'asc' => 'Ascending',
                    'desc' => 'Descending'
                ),
                'default'     => 'desc'
            ),

        )
    ) );

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if( ! function_exists( 'lvgshop_product__widget' ) ) {
        function lvgshop_product__widget( $args, $instance ) {

            echo $args['before_widget'];

            $post_count = $instance['post_count'] ;
            $order = $instance['order'] ;
            echo '<div class="lvgshop-sidebar-product">';
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }


            $postargs = array(
                'post_type' => 'product',
                'posts_per_page' => $post_count,
                'order' => (string) trim($order),
            );

            $the_query = new \WP_Query($postargs);
            echo '<div class="latest-product-widget "><ul class="sidebar-products">';
            while ($the_query -> have_posts()) : $the_query -> the_post();
                global $product;
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

                $image_id = get_post_thumbnail_id();
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                $nonce = wp_create_nonce("product_nonce");
                ?>
                <li class="d-flex align-items-center gap-4">
                    <div class="flex-shrink-0 thumbnail light-bg p-2">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="thumbnail" class="img-fluid"></a>
                    </div>
                    <div>
                        <a class="sidebar-product-had" href="<?php the_permalink(); ?>"><h6 class="mb-2"><?php the_title(); ?></h6></a>
                        <span class="price primary-text-color sidebar-product-price"> <?php echo maybe_unserialize($product->get_price_html()); ?></span>
                    </div>
                </li>
<?php

            endwhile; wp_reset_postdata();
            echo "</ul></div>";




            echo '</div>';

            echo $args['after_widget'];

        }
    }

}
 


