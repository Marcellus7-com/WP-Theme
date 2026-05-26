<?php
// Create a sub-tab
CSF::createSection( $prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title'  => 'Product Archive',
    'fields' => array(
        array(
            'id'          => 'lvgshop-archive-type',
            'type'        => 'select',
            'title'       => 'Archive Layout Type',
            'placeholder' => 'Select an option',
            'options'     => array(
                'full-width'  => 'Full Width',
                'sidebar'  => 'With Sidebar',
            ),
            'default'     => 'full-width'
        ),

        array(
            'id'          => 'archive-sidebar-position',
            'type'        => 'select',
            'title'       => 'Sidebar Position',
            'placeholder' => 'Select an option',
            'options'     => array(
                'left'  => 'Left',
                'right'  => 'Right',
            ),
            'default'     => 'left',
            'dependency' => array( 'lvgshop-archive-type', '==', 'sidebar' ),
        ),
        array(
            'id'          => 'lvgshop-archive-style',
            'type'        => 'select',
            'title'       => 'Archive Product Style',
            'placeholder' => 'Select an option',
            'options'     => array(
                'style-one'  => 'Style One',
                'style-two'  => 'Style Two',
                'style-three'  => 'Style Three',
            ),
            'default'     => 'style-one'
        ),

        array(
            'id'          => 'lvgshop-archive-col',
            'type'        => 'select',
            'title'       => 'Archive Product Column (Desktop)',
            'placeholder' => 'Select an option',
            'options'     => array(
                'md-1'  => 'One Column',
                'md-2'  => 'Two Column',
                'md-3'  => 'Three Column',
                'md-4'  => 'Four Column',
                'md-5'  => 'Five Column',
                'md-6'  => 'Six Column',
            ),
            'default'     => 'md-3'
        ),


        array(
            'id'          => 'lvgshop-archive-col-mob',
            'type'        => 'select',
            'title'       => 'Archive Product Column (Mobile)',
            'placeholder' => 'Select an option',
            'options'     => array(
                'cols-1'  => 'One Column',
                'cols-2'  => 'Two Column',
                'cols-3'  => 'Three Column',
            ),
            'default'     => 'cols-1'
        ),

        array(
            'id'          => 'mob_custom_row_gap',
            'type'        => 'select',
            'title'       => 'Mobile Smaller Column Gap',
            'placeholder' => 'Select an option',
            'options'     => array(
                'on'  => 'On',
                'off'  => 'Off',

            ),
            'default'     => 'off'
        ),


        array(
            'id'       => 'lvgshop-ach-filter-type',
            'type'     => 'button_set',
            'title'    => 'Archive Filter Type',
            'options'  => array(
                'none'   => 'None',
//                'droppanel'   => 'Drop Panel',
//                'off-canvas' => 'Off Canvas',
            ),
            'default'  => 'none',
        ),

        array(
            'type' => 'heading',
            'content' => 'list Style battom Banner',

        ),
        array(
            'id' => 'arcuve_banner_gallery_imgs',
            'type' => 'media',
            'title' => 'Offcanvas Gallery Image',
        ),
        array(
            'id'    => 'arcive-title-text',
            'type'  => 'text',
            'title' => 'Title Text',
        ),
        array(
            'id'    => 'arcive-sub-text',
            'type'  => 'text',
            'title' => 'Sub Text',
        ),
        array(
            'id'    => 'arcive-banner-link',
            'type'  => 'link',
            'title' => 'Link',
        ),
    )



));