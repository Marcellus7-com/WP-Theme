<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'global_style', // Set a unique slug-like ID
    'title' => 'Global Style',
    'icon' => 'fa fa-magic',
));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title' => 'Global Color',
    'fields' => array(

        array(
            'id' => 'color-set',
            'type' => 'tabbed',
            'title' => 'Site Colors',
            'tabs' => array(
                array(
                    'title' => 'Body Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'site-bg-color-main',
                            'type' => 'lvgshop_color',
                            'title' => 'Site Background Color',
                            'default' => '#ffffff',
                            'output' => 'body',
                            'output_mode' => 'background'
                        ),

                        array(
                            'id' => 'main_text_colot',
                            'type' => 'lvgshop_color',
                            'title' => 'Text Color',
                            'default' => '#717171',
                            'help' => 'This is the text color of Whole Website',
                            'output' => 'body,p,.pivoo-ingredients-items li, li',
                            'output_mode' => 'color',
                        ),
                    )),
                array(
                    'title' => 'Primary Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'primary_color',
                            'type' => 'lvgshop_color',
                            'title' => 'Primary Color',
                            'default' => '#085330',
                            'help' => 'This is the primary color for whole website.If you change it whole site main color will be changed.',
                            'output' => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a
          ',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'primary-text-color',
                            'type' => 'lvgshop_color',
                            'title' => 'Primary Text Color',
                            'default' => '#FFEBF0',
                            'help' => 'This is the text color of primary color',
                            'output' => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a',
                            'output_mode' => 'color',
                            'output_important' => true,
                        ),
                    )),

                array(
                    'title' => 'Secondary Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'secondary-color',
                            'type' => 'lvgshop_color',
                            'title' => 'Secondary Color',
                            'default' => '#1F7F38',
                            'help' => 'This is the secondary color for whole website.If you change it whole site main color will be changed.',
                            'output' => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'secondary-text-color',
                            'type' => 'lvgshop_color',
                            'title' => 'Secondary Text Color',
                            'default' => '#402500',
                            'output' => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
                            'output_mode' => 'color',
                            'help' => 'This is the text color of secondary color',
                        ),

                    )),

                array(
                    'title' => 'Input Field Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(

                        array(
                            'id' => 'global_input_bg',
                            'type' => 'lvgshop_color',
                            'title' => 'Input Field Background Color',
                            'default' => '#F5F5F5',
                            'help' => 'This is the input field background color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,
               select.lable-form-all',
                            'output_mode' => 'background-color',

                        ),

                        array(
                            'id' => 'global_input_border',
                            'type' => 'lvgshop_color',
                            'title' => 'Input Field Border Color',
                            'default' => '#F5F5F5',
                            'help' => 'This is the input field border color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single, select.lable-form-all',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_input_text',
                            'type' => 'lvgshop_color',
                            'title' => 'Input Field Text Color',
                            'default' => '#373833',
                            'help' => 'This is the input field Text color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,
              select.lable-form-all',
                            'output_mode' => 'color',

                        ),


                    )),


            )),


        array(
            'id' => 'btn_color',
            'type' => 'tabbed',
            'title' => 'Site Buttons Colors',
            'tabs' => array(
                array(
                    'title' => 'Button Normal State',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'global_btn_bg',
                            'type' => 'lvgshop_gradient',
                            'title' => 'Button Background',
                            'default' => '',
                            'help' => 'Site common button background color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .piv-lrn-button',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'global_btn_border',
                            'type' => 'lvgshop_color',
                            'title' => 'Button Border',
                            'default' => '',
                            'help' => 'Site common button border color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .piv-lrn-button',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_btn_text',
                            'type' => 'lvgshop_color',
                            'title' => 'Button Text',
                            'default' => '',
                            'help' => 'Site common button text color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .piv-lrn-button',
                            'output_mode' => 'color',


                        ),
                    )),

                array(
                    'title' => 'Button Hover State',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(

                        array(
                            'id' => 'global_btn_bg_hvr',
                            'type' => 'lvgshop_gradient',
                            'title' => 'Button Background',
                            'default' => '',
                            'help' => 'Site common button background color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover
                      ,.piv-lrn-button:hover',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'global_btn_border_hvr',
                            'type' => 'lvgshop_color',
                            'title' => 'Button Border',
                            'default' => '',
                            'help' => 'Site common button border color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover
                      ,.piv-lrn-button:hover',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_btn_text_hvr',
                            'type' => 'lvgshop_color',
                            'title' => 'Button Text',
                            'default' => '',
                            'help' => 'Site common button text color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover
                      ,.piv-lrn-button:hover',
                            'output_mode' => 'color',


                        ),

                    )),

            )),


        array(
            'id' => 'link_color',
            'type' => 'lvgshop_link',
            'title' => 'Link Color',
            'output' => 'a',
            'visited' => true,
        ),
        
        array(
          'id'       => 'edit_global_coolor',
          'type'     => 'switcher',
          'title'    => 'Edit Global Color',
          'text_on'  => 'Yes',
          'text_off' => 'No',
          'default'    => false
        ),
        
         array(
            'id' => 'gl_header_color',
            'type' => 'lvgshop_color',
            'title' => 'Headings Color',
            'default' => '#085330',
            'help' => 'This is the headings text color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
        
        array(
            'id' => 'gl_light_red_color',
            'type' => 'lvgshop_color',
            'title' => 'Light Red Color',
            'default' => '#fe4852',
            'help' => 'This is the light red color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
         array(
            'id' => 'gl_red_orange_color',
            'type' => 'lvgshop_color',
            'title' => 'Red Orange Color',
            'default' => '#fc5d2c',
            'help' => 'This is the red orange color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
         array(
            'id' => 'gl_yellow_color',
            'type' => 'lvgshop_color',
            'title' => 'Yellow Color',
            'default' => '#ffd612',
            'help' => 'This is the yellow color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
        
         array(
            'id' => 'gl_blue_color',
            'type' => 'lvgshop_color',
            'title' => 'Blue Color',
            'default' => '#1F7F38',
            'help' => 'This is the blue color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
         array(
            'id' => 'gl_green_color',
            'type' => 'lvgshop_color',
            'title' => 'Green Color',
            'default' => '#1FC157',
            'help' => 'This is the green color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
         array(
            'id' => 'gl_dark_color',
            'type' => 'lvgshop_color',
            'title' => 'Dark Color',
            'default' => '#085330',
            'help' => 'This is the dark color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
        array(
            'id' => 'gl_border_color',
            'type' => 'lvgshop_color',
            'title' => 'Border Color',
            'default' => '#3d3d3d',
            'help' => 'This is the border color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
        array(
            'id' => 'gl_border_gray_color',
            'type' => 'lvgshop_color',
            'title' => 'Border Gray Color',
            'default' => '#e8eaf2',
            'help' => 'This is the border gray color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
        
        array(
            'id' => 'gl_border_dark_color',
            'type' => 'lvgshop_color',
            'title' => 'Border Dark Color',
            'default' => '#242424',
            'help' => 'This is the border dark color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),




        array(
            'id' => 'alter_text_color',
            'type' => 'lvgshop_color',
            'title' => 'Alter Text Color',
            'default' => '#666666',
            'help' => 'This is the alternative text color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),

        array(
            'id' => 'light_color',
            'type' => 'lvgshop_color',
            'title' => 'Light Color',
            'default' => '#f6f6f6',
            'help' => 'This is the light color',
            'dependency' => array( 'edit_global_coolor', '==', 'true' ),
        ),
    )

));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title' => 'Page Builder Style',
    'fields' => array(


        array(
            'id' => 'elementor_content',
            'type' => 'tabbed',
            'title' => 'Elements Style',
            'tabs' => array(
                array(
                    'title' => 'Search Style',
                    'icon' => 'lvgshopo-semi-solid cs-orange',
                    'fields' => array(

                        array(
                            'id' => 'search-overlay',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Overlay Color',
                            'default' => '#e2e0f5',
                            'output' => '.lvgshop-ajax-s-offcanvas,#lvgshop-search-box-popup,.lvgshop-ajax-s-offcanvas .lvgshop-search-result',
                            'output_mode' => 'background',

                        ),
                        array(
                            'id' => 'ftitle_colose_color',
                            'type' => 'lvgshop_color',
                            'title' => 'Title color',
                            'default' => '#ffffff',
                            'output' => '.lvgshop-ajax-search-title',
                            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_input',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Input Background',
                            'default' => '#e2e0f5',
                            'output' => '.lvgshop-ajax-search-bar .search-wrapper input[type="text"],
              .lvgshop-search-style-two .search-wrapper input[type="text"]',
                            'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_input_border',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Input Border Color',
                            'default' => '#e2e0f5',
                            'output' => '.lvgshop-ajax-search-bar .search-wrapper input[type="text"],
              .lvgshop-search-style-two .search-wrapper input[type="text"]',
                            'output_mode' => 'border-color' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_input_txt',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Input Text Color',
                            'default' => '#77829D',
                            'output' => '.lvgshop-ajax-search-bar .search-wrapper input[type="text"],
              .lvgshop-search-style-two .search-wrapper input[type="text"]',
                            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_cat_bg',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Category Panel Background',
                            'default' => '#05A845',
                            'output' => '.lvgshop-ajax-search-bar .nice-select',
                            'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
                        ),
                        array(
                            'id' => 'search_cat_bar_border',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Category Panel Border',
                            'default' => '#05A845',
                            'output' => '.lvgshop-ajax-search-bar .nice-select',
                            'output_mode' => 'border-color' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_cat_bar_text',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Category Panel Text',
                            'default' => '#ffffff',
                            'output' => '.lvgshop-ajax-search-bar .nice-select',
                            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
                        ),
                        array(
                            'id' => 'search_icon_bg_clr',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Button Background',
                            'default' => '#ffffff',
                            'output' => '.lvgshop-ajax-search-btn,.search-wrapper svg',
                            'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'search_icon_clr',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Icon Color',
                            'default' => '#222',
                            'output' => '.search-wrapper i,.lvgshop-ajax-search-btn',
                            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
                        ),

                        array(
                            'id' => 'product_bg_color_src',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Product Background',
                            'default' => '#fff',
                            'output' => '.lvgshop-search-result ul li a',
                            'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
                        ),
                        array(
                            'id' => 'product_text_color_src',
                            'type' => 'lvgshop_color',
                            'title' => 'Search Product Title Color',
                            'default' => '#222',
                            'output' => '.lvgshop-ajax-product-data h3',
                            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
                        ),


                    )),
            )),

        array(
            'id' => 'search_product_style',
            'type' => 'button_set',
            'title' => 'Search Product Style',
            'options' => array(
                'list' => 'List',
                'grid' => 'Grid',

            ),
            'default' => 'list'
        ),

        array(
            'id' => 'search_product_grid_count',
            'type' => 'select',
            'title' => 'Grid Column Count',
            'placeholder' => 'Select an option',
            'dependency' => array('search_product_style', '==', 'grid'),
            'options' => array(
                '1' => 'One Column',
                '2' => 'Two Column',
                '3' => 'Three Column',
                '4' => 'Four Column',
                '5' => 'Five Column',
                '6' => 'Six Column',
            ),
            'default' => '6'
        ),
        array(
            'id' => 'search_category_ds',
            'type' => 'button_set',
            'title' => 'Search Category',
            'options' => array(
                'show' => 'Show',
                'hide' => 'Hide',

            ),
            'default' => 'show'
        ),

        array(
            'id' => 'search_style_ds',
            'type' => 'button_set',
            'title' => 'Search Style',
            'options' => array(
                'one' => 'One',
                'two' => 'Two',

            ),
            'default' => 'one'
        ),

    )

));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title' => 'Global Options',
    'fields' => array(
        array(
            'id' => 'gloabal_width_1400',
            'type' => 'slider',
            'title' => 'Global Container Width (From 1400px)',
            'min' => 600,
            'max' => 1600,
            'step' => 100,
            'unit' => 'px',
            'default' => 1320,
        ),

        array(
            'id' => 'gloabal_width_1200',
            'type' => 'slider',
            'title' => 'Global Container Width (From 1200px)',
            'min' => 600,
            'max' => 1400,
            'step' => 100,
            'unit' => 'px',
            'default' => 1140,
        ),

        array(
            'id' => 'elementor-width-overwrite',
            'type' => 'switcher',
            'title' => 'Elementor Container Width Overwrite',
        ),

        array(
            'id' => 'overwrite-elem-width',
            'type' => 'slider',
            'title' => 'Elementor Container Width',
            'min' => 600,
            'max' => 1400,
            'step' => 100,
            'unit' => 'px',
            'default' => 1140,

            'dependency' => array('elementor-width-overwrite', '==', 'true'),
        ),

    )

));

