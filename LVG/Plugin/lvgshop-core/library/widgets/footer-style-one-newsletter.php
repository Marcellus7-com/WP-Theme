<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a widget 1
    //
    CSF::createWidget('footer_style_one_newsletter', array(
        'title' => 'Lvgshop Style Newsletter',
        'classname' => 'lvgshop__style_one_newsletter',
        'description' => 'A description for footer Newsletter widget',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => 'Title',
            ),
            array(
                'id' => 'subtitle',
                'type' => 'text',
                'title' => 'Sub Title',
            ),
            array(
                'id' => 'main-ti-title',
                'type' => 'text',
                'title' => 'Title',
            ),
            array(
                'id' => 'form_shortcode',
                'type' => 'textarea',
                'title' => 'Form Shortcode',
            ),
            array(
                'id' => 'footer_social_info',
                'type' => 'repeater',
                'title' => 'Footer Social Info',
                'fields' => array(
                    array(
                        'id' => 'social_icon',
                        'type' => 'icon',
                        'title' => 'Social Icon',
                    ),
                    array(
                        'id' => 'social_link',
                        'type' => 'link',
                        'title' => 'Social Link',
                    ),
                ),
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //

    if (!function_exists('footer_style_one_newsletter')) {

        function footer_style_one_newsletter($args, $instance)
        {
            echo $args['before_widget'];
            ?>
            <div class="single-widget">

                <span class="news-title">
                    <?php if (!empty($instance['title'])) {
                        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
                    }
                    ?>

                </span>
                    <?php if (!empty($instance['subtitle'])) {
                        ?>
                        <p><?php  echo  esc_html($instance['subtitle']); ?></p>
                <?php
                    }
                    ?>
                <?php if (!empty($instance['main-ti-title'])) {
                    ?>
                    <h2 class="font-semibold text-white mb-20 news-header"><?php  echo  esc_html($instance['main-ti-title']); ?></h2>
                    <?php
                }
                ?>
                <?php echo do_shortcode($instance['form_shortcode']); ?>
                <div class="social-wrapper el2-footer-social">
                    <?php
                    if (is_array($instance['footer_social_info'])) {
                        foreach ($instance['footer_social_info'] as $item) {
                            ?>

                            <a href="<?php echo esc_url($item['social_link']['url']); ?>"><i
                                        class="<?php _e($item['social_icon'], 'uraon'); ?>"></i></a>

                            <?php
                        }
                    }
                    ?>

                </div>
            </div>

            <?php
            echo $args['after_widget'];
        }
    }

}
