<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a widget 1
    //
    CSF::createWidget('lvgshop_footer_useful_link', array(
        'title' => 'Lvgshop Footer Useful Desktop',
        'classname' => 'lvgshop__footer_useful_link',
        'description' => 'A description for footer useful link widget',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => 'Title',

            ),
            array(
                'id' => 'useful_link_list',
                'type' => 'repeater',
                'title' => 'Useful Link List',
                'fields' => array(
                    array(
                        'id' => 'nav_title',
                        'type' => 'text',
                        'title' => 'Nav Title',
                    ),
                    array(
                        'id' => 'nav_link',
                        'type' => 'link',
                        'title' => 'Nav Link',
                    ),

                ),
            ),

        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('lvgshop_footer_useful_link')) {
        function lvgshop_footer_useful_link($args, $instance)
        {


            echo $args['before_widget'];

            ?>
            <h4>

                <?php
                if (!empty($instance['title'])) {

                    echo apply_filters('widget_title', $instance['title']);
                }
                ?>
            </h4>
            <ul class="foo-menu">
            <?php
            if (is_array($instance['useful_link_list'])) {
                foreach ($instance['useful_link_list'] as $item) {
                    ?>
                    <li>
                        <a href="<?php echo esc_url($item['nav_link']['url']); ?>"><?php _e($item['nav_title'], 'uraon'); ?></a>
                    </li>
                    <?php
                }
            }
            ?>

            <?php
            echo $args['after_widget'];

        }
    }

}
