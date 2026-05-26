<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a widget 1
    //
    CSF::createWidget('lvgshop_footer_useful_link_mobile', array(
        'title' => 'Lvgshop Footer Useful Mobile',
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
    if (!function_exists('lvgshop_footer_useful_link_mobile')) {
        function lvgshop_footer_useful_link_mobile($args, $instance)
        {


            $n = 20;
            $resultss = bin2hex(random_bytes($n));
            ?>
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne-foo-<?php  echo $resultss; ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne-foo-<?php  echo $resultss; ?>" aria-expanded="false"
                        aria-controls="flush-collapseOne-foo-<?php  echo $resultss; ?>">
                    <?php
                    if (!empty($instance['title'])) {

                        echo apply_filters('widget_title', $instance['title']);
                    }
                    ?>
                </button>
            </h2>
            <div id="flush-collapseOne-foo-<?php  echo $resultss; ?>" class="accordion-collapse collapse"
                 aria-labelledby="flush-headingOne-foo-<?php  echo $resultss; ?>" data-bs-parent="#accordionFlushExample_foo">
                <div class="accordion-body">
                    <div class="single-widget">
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
                        </ul>
                    </div>
                </div>
            </div>
            </div>

            <?php


        }
    }

}
