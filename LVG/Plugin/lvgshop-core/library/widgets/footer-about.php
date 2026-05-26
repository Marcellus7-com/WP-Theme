<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a widget 1
    //
    CSF::createWidget('lvgshop_footer_about', array(
        'title' => 'Lvgshop Footer About Company ',
        'classname' => 'lvgshop__footer_about',
        'description' => 'A description for footer about Company widget',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => 'Title',
            ),
            array(
                'id' => 'footer_about_contact_logo',
                'type' => 'media',
                'title' => 'Logo',
            ),
            array(
                'id' => 'footer_about_details',
                'type' => 'textarea',
                'title' => 'Footer About Details',
            ),

            array(
                'type' => 'heading',
                'content' => 'Icone Box Start',
            ),
            array(
                'id' => 'footer_about_details_social_icon_box',
                'type' => 'repeater',
                'title' => 'Address / number / Cotent',
                'fields' => array(
                    array(
                        'id' => 'social_icon_box',
                        'type' => 'media',
                        'title' => 'Box Icon',
                    ),
                    array(
                        'id' => 'social_icon_text',
                        'type' => 'text',
                        'title' => 'Box Text',
                    ),
                    array(
                        'id' => 'social_icon_number',
                        'type' => 'text',
                        'title' => 'Box Number',
                    ),
                    array(
                        'id' => 'social_icon_number_link_r',
                        'type' => 'link',
                        'title' => 'Box Number Link',
                    ),

                ),
            ),

            array(
                'type' => 'heading',
                'content' => 'Icone Box End',
            ),
            array(
                'id' => 'footer_social_info_right_title',
                'type' => 'text',
                'title' => 'Footer Social Title',
            ),
            array(
                'id' => 'footer_about_details_cotent',
                'type' => 'repeater',
                'title' => 'Address / number / Cotent',
                'fields' => array(
                    array(
                        'id' => 'footer_about_details_cotent_title',
                        'type' => 'text',
                        'title' => 'Nav Title',
                    ),
                    array(
                        'id' => 'footer_about_details_cotent_title_link',
                        'type' => 'link',
                        'title' => 'Nav Link',
                    ),

                ),
            ),
            array(
                'id' => 'footer_social_info_right',
                'type' => 'repeater',
                'title' => 'Footer Social Reapter',
                'fields' => array(
                    array(
                        'id' => 'social_icon_r',
                        'type' => 'icon',
                        'title' => 'Social Icon',
                    ),
                    array(
                        'id' => 'social_link_r',
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
    if (!function_exists('lvgshop_footer_about')) {
        function lvgshop_footer_about($args, $instance)
        {


            echo $args['before_widget'];

            ?>
            <div class="el2-footer-widget el2-footer-contact">
                <?php
                if (!empty($instance['title'])) {

                    ?>
                    <h4 class="mb-4 fw-semibold"><?php echo $instance['title']; ?></h4>

                    <?php
                }

                ?>
                <?php
                if ($instance['footer_about_contact_logo']['url']) {

                    ?>
                    <img src="<?php echo $instance['footer_about_contact_logo']['url']; ?>"
                                                  alt="logo" class="img-fluid">
                    <?php
                }
                ?>

                <?php if ($instance['footer_about_details']) { ?>
                    <p class="mt-20 mb-20">
                        <?php _e($instance['footer_about_details'], 'lvgshop'); ?>
                    </p>
                <?php } ?>
            <?php
            if (!empty($instance['footer_about_details_social_icon_box'])) {
                foreach ($instance['footer_about_details_social_icon_box'] as $items) {
                    ?>
                    <div class="d-flex align-items-center gap-3 flex-wrap el2-foo-icon-hover mb-20">
                        <?php if ($items['social_icon_box']) {
                            ?>
                            <span class="el2-footer-icon">
                                <img src="<?php echo $items['social_icon_box']['url']; ?>" alt="" >
                         <i class=""></i>
                        </span>
                            <?php
                        } ?>
                        <div class="tel-info">
                            <span><?php echo $items['social_icon_text']; ?></span>
                            <a href="<?php echo $items['social_icon_number_link_r']['url']; ?>"><?php echo $items['social_icon_number']; ?></a>
                        </div>
                    </div>
                    <?php
                }}


                if (!empty($instance['footer_about_details_cotent'])) {
                    foreach ($instance['footer_about_details_cotent'] as $item) {
                        ?>
                        <p class="mt-4 mb-3">
                            <?php if ($item['footer_about_details_cotent_title_link']['url']){
                            ?>
                            <a href="<?php echo $item['footer_about_details_cotent_title_link']['url']; ?>">
                                <?php
                                } ?>
                                <?php echo $item['footer_about_details_cotent_title']; ?>
                                <?php if ($item['footer_about_details_cotent_title_link']['url']){
                                ?>
                            </a>
                        <?php
                        } ?>
                        </p>
                        <?php
                    }
                }
                ?>
                <?php if ($instance['footer_social_info_right_title']) { ?>
                    <h4 class="fw-semibold mb-3">
                        <?php _e($instance['footer_social_info_right_title'], 'lvgshop'); ?>
                    </h4>
                <?php } ?>
                <div class="el2-footer-social">
                    <?php
                    if (!empty($instance['footer_social_info_right'])) {
                        foreach ($instance['footer_social_info_right'] as $item) {

                            ?>
                            <a href="<?php echo $item['social_link_r']['url']; ?>"><i
                                        class="<?php echo $item['social_icon_r']; ?>"></i></a>
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