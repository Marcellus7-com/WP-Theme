<?php
// Create a top-tab
CSF::createSection( $prefix, array(
    'id'    => 'dark', // Set a unique slug-like ID
    'title' => 'Dark Mode',
    'icon'     => 'fa fa-moon',
) );

// Create a sub-tab
CSF::createSection( $prefix, array(
    'parent' => 'dark', // The slug id of the parent section
    'title'  => 'Dark Mode Options',
    'fields' => array(
            // A Submessage
            array(
              'type'    => 'submessage',
              'style'   => 'success',
              'content' => 'If you want to change color in some other elements you can use the Additional CSS field. CSS example: body.sp-night-mode-on .element-class { color: #000; }',
            ),
            array(
            'id'      => 'sp_night_mode_ebl',
            'type'    => 'checkbox',
            'title'   => 'Night Enable',
            'label'   => 'Enable night mode default',
            'default' => false // or false
        ),
        array(
            'id'      => 'sp_night_mode_default',
            'type'    => 'checkbox',
            'title'   => 'Night Mode as Default',
            'label'   => 'Enable night mode default',
            'default' => false // or false
        ),

        array(
            'id'          => 'sp_night_mode_toggle_style',
            'type'        => 'select',
            'title'       => 'Toggle Style',
            'placeholder' => 'Select an option',
            'options'     => array(
                '1'  => 'Style 1',
                '2'  => 'Style 2',
                '3'  => 'Style 3',
                '4'  => 'Style 4',
                '5'  => 'Style 5',
            ),
            'default'     => '1'
        ),

        array(
            'id' => 'sp_night_mode_body_background',
            'type'        => 'lvgshop_color',
            'title' => 'Body Background Color',
            'default' => '#181818',
        ),

        array(
            'id'    => 'sp_night_mode_text_color',
            'type'  => 'lvgshop_color',
            'title' => 'Text Color',
            'default'=>'#fff',
            'help' => 'This is the text color of Whole Website',
        ),
        
        
         array(
            'id' => 'sp_night_mode_alt_background',
            'type'        => 'lvgshop_color',
            'title' => 'Alternative Background Color',
            'default' => '#000',
        ),
        
        array(
            'id'    => 'sp_night_mode_link_color',
            'type'  => 'lvgshop_color',
            'title' => 'Link Color',
            'default'=>'#fff',
            'help' => 'This is the link color of Whole Website',
        ),
        
        array(
            'id'    => 'sp_night_mode_link_hover_color',
            'type'  => 'lvgshop_color',
            'title' => 'Link Hover Color',
            'default'=>'#fff',
            'help' => 'This is the link hover color of Whole Website',
        ),
        
        array(
            'id'    => 'sp_night_input_field_bg_color',
            'type'  => 'lvgshop_color',
            'title' => 'Input Field Background Color',
            'default'=>'#252528',
            'help' => 'This is the input background color of Whole Website',
        ),
        
        array(
            'id'    => 'sp_night_input_field_border_color',
            'type'  => 'lvgshop_color',
            'title' => 'Input Field Border Color',
            'default'=>'#252528',
            'help' => 'This is the input border color of Whole Website',
        ),
        
          array(
            'id'    => 'sp_night_input_field_text_color',
            'type'  => 'lvgshop_color',
            'title' => 'Input Field Text Color',
            'default'=>'#fff',
            'help' => 'This is the input text color of Whole Website',
        ),

    )


));