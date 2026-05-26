<?php

// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'footer', // Set a unique slug-like ID
    'title' => 'Footer',
    'icon' => 'fa fa-arrow-down',
));
// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Style',
    'fields' => array(
        array(
            'id' => 'footsubtitles',
            'type' => 'text',
            'title' => 'Footer Sub Title',
            'dependency' => array('lvgshop-Footer-style', '==', 'style-two'),
        ),
        array(
            'id' => 'footertitle',
            'type' => 'text',
            'title' => 'Footer Title',
            'dependency' => array('lvgshop-Footer-style', '==', 'style-two'),
        ),
        array(
            'id' => 'lvgshop-Footer-style',
            'type' => 'image_select',
            'title' => 'Footer Style',
            'options' => array(
                'style-one' => get_template_directory_uri() . '/assets/images/style_1.png',
                'style-two' => get_template_directory_uri() . '/assets/images/style_2.png',
                'style-three' => get_template_directory_uri() . '/assets/images/style_3.png',
            ),
            'default' => 'style-one'
        ),

        array(
            'id' => 'copyright_footer_bg',
            'type' => 'lvgshop_gradient',
            'title' => 'Copyright Background Color',
            'default' => '#F7F5E5',
            'output' => '.emerce-copyright',
            'output_mode' => 'background',
        ),

        array(
            'id' => 'copyright_footer_text',
            'type' => 'lvgshop_color',
            'title' => 'Copyright Text Color',
            'default' => '#74716E',
            'output' => '.emerce-copyright',
            'output_mode' => 'color',
        ),

        array(
            'id' => 'copyright_footer_link',
            'type' => 'lvgshop_link',
            'title' => 'Copyright Link Color',
            'output' => '.emerce-copyright a',
            'active' => true,
            'default' => array(
                'color' => '#74716E',
                'hover' => '#423e3a',
                'active' => '#423e3a',
            )
        ),

    )

));

// Create a sub-tab

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Blocks',
    'fields' => array(

        array(
            'id' => 'select_footer_blocks',
            'type' => 'select',
            'title' => 'Select Global Footer',
            'placeholder' => 'Select a Footer',
            'options' => 'posts',
            'query_args' => array(
                'post_type' => 'lvgshop_footer',
            ),
        ),

        array(
            'id' => 'back-top-top-enable',
            'type' => 'button_set',
            'title' => 'Back To Top Button',
            'options' => array(
                'enabled' => 'Enabled',
                'disabled' => 'Disabled',
            ),
            'default' => 'enabled'
        ),
        array(
            'id' => 'backto_top_icon_bg_color',
            'type' => 'lvgshop_gradient',
            'title' => 'Back To Top Button Background Color',
            'output' => '.scroll-top-btn',
            'output_mode' => 'background',
            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

        array(
            'id' => 'backto_top_bt_icon',
            'type' => 'lvgshop_gradient',
            'title' => 'Back To Top Icon Color',
            'output' => '.scroll-top-btn',
            'output_mode' => 'color',

            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

    )
));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Copyright',
    'fields' => array(
        array(
            'id' => 'footer_copyright_enable',
            'type' => 'switcher',
            'title' => 'Footer Copyright Enable/Disable',
            'default' => true,
        ),
        array(
            'id'      => 'footer_copyright_style',
            'type'    => 'select',
            'title'   => 'Select',
            'options' => array(
                'style-1' => 'Style One',
                'style-2' => 'Style Two',
            )
        ),
        array(
            'id' => 'copyright_text',
            'type' => 'wp_editor',
            'title' => 'Copyright Text',
            'tinymce' => true,
            'quicktags' => true,
            'media_buttons' => true,
            'height' => '100px',
            'default' => '© copyright 2023 Lvgshop I by Indigo Agency by M7',

        ),

        array(
            'id' => 'copyright_right_content',
            'type' => 'repeater',
            'title' => 'copyright Right List',
            'fields' => array(
                array(
                    'id' => 'copyright_card_image',
                    'type' => 'media',
                    'title' => 'Card Icon',
                ),


            ),

        ),

    )

));



