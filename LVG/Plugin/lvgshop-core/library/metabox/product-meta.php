<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'product_meta';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Product Meta',
        'post_type' => 'product',
        'data_type' => 'unserialize',
    ));

    CSF::createSection($prefix, array(
        'title' => 'Product Thumbnail Videos',
        'fields' => array(
            array(
                'id' => 'Productthumnail_videos',
                'type' => 'text',
                'title' => 'Product Thumbnail Videos URL',
            ),


        )
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Interior Image',
        'fields' => array(
            array(
                'id' => 'Fake_View_Show_icon',
                'type' => 'icon',
                'title' => 'Fack View Icon',
            ),
            array(
                'id' => 'Fake_View_Show_icon_text',
                'type' => 'text',
                'title' => 'Real Time 13 Visitor Right Now',
            ),
            array(
                'id' => 'opt-select-reapter-style',
                'type' => 'select',
                'title' => 'Select Reapter Style',
                'placeholder' => 'Select a option',
                'options' => array(
                    'Style-1' => 'Style 1',
                    'Style-2' => 'Style 2',
                ),
                'default' => "Style-1"
            ),

            array(
                'id' => 'product_meta_with_icon_tex',
                'type' => 'repeater',
                'title' => 'Icon With text ',
                'fields' => array(
                    array(
                        'id' => 'product_meta_with_icon_image',
                        'type' => 'media',
                        'title' => 'Card Icon',
                    ),
                    array(
                        'id' => 'product_meta_with_icon_text',
                        'type' => 'text',
                        'defalt' => 'Free Shipping',
                        'title' => 'Card Text',
                    ),
                    array(
                        'id' => 'product_meta_with_icon_text_right',
                        'defalt' => 'From All Orders Over $100',
                        'type' => 'text',
                        'title' => 'Style Two Right Card  Text',

                    ),

                ),
            )

        )
    ));

    // Create a metabox



}

