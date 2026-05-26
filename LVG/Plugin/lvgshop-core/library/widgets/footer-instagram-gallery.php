<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a widget 1
    //
    CSF::createWidget('footer_instagram_gallery', array(
        'title' => 'Lvgshop Instagram Gallery',
        'classname' => 'el2-gallery-item-widget',
        'description' => 'A description for Instagram Gallery widget',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => 'Title',
            ),

            array(
                'id' => 'instagram_gallery_shortcode',
                'type' => 'textarea',
                'title' => 'Instagram Gallery Shortcode',
            ),


        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('footer_instagram_gallery')) {
        function footer_instagram_gallery($args, $instance)
        {
            echo $args['before_widget'];
            ?>
            <h4>
                <?php
                if (!empty($instance['title'])) {
                    echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
                }
                ?>

            </h4>
                <?php echo do_shortcode($instance['instagram_gallery_shortcode']); ?>

            <?php


            echo $args['after_widget'];

        }
    }

}
