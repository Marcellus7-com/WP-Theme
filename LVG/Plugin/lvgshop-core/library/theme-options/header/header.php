<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'header', // Set a unique slug-like ID
    'title' => 'Header',
    'icon' => 'fa fa-arrow-up',
));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Logo',
    'fields' => array(
        array(
            'id' => 'main-logo',
            'type' => 'media',
            'title' => 'Logo',
        ),
        array(
            'id' => 'offcanvas-logo',
            'type' => 'media',
            'title' => 'Offcanvas Logo',
        ),
        array(
            'id' => 'mobile-logo',
            'type' => 'media',
            'title' => 'Mobiel Logo',
        ),

        array(
            'id' => 'lvgshop-favicon',
            'type' => 'media',
            'title' => 'Favicon',
        ),

        array(
            'id' => 'logo-width',
            'type' => 'slider',
            'title' => 'Logo Width',
            'min' => 10,
            'max' => 300,
            'step' => 1,
            'unit' => 'px',
            'default' => 170,
            'output' => '.site-main-logo img,.el-middle-header .logo-wrapper .logo',
            'output_mode' => 'width',
        ),
        
      
    )


));


CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Header Options',
    'fields' => array(
        array(
            'id' => 'lvgshop-header-style',
            'type' => 'image_select',
            'title' => 'Header Style',
            'options' => array(
                'style-one' => get_template_directory_uri() . '/assets/images/header-1.png',
                'style-two' => get_template_directory_uri() . '/assets/images/header-2.png',
                'style-three' => get_template_directory_uri() . '/assets/images/header-3.png',
            ),
            'default' => 'style-one'
        ),
        array(
            'type' => 'heading',
            'content' => 'Style One Content',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'type' => 'heading',
            'content' => 'Style Two Content',
            'dependency' => array('lvgshop-header-style', '==', 'style-two'),
        ),
        array(
            'type' => 'heading',
            'content' => 'Style Three Content',
            'dependency' => array('lvgshop-header-style', '==', 'style-three'),
        ),
        array(
            'id' => 'style-one-top-header-switcher',
            'type' => 'switcher',
            'title' => 'Top Header Switcher',
            'default' => true,
        ),
        array(
            'id' => 'top-header-announcement',
            'type' => 'text',
            'title' => 'Top Header Announcement',
            'default' => 'Free Shipping + Free Return for above $54.99',
             'dependency' => array( 'lvgshop-header-style', 'any', 'style-one,style-three' ),
             
             ),
           
        array(
            'id' => 'style-two-top-announcement',
            'type' => 'repeater',
            'title' => 'Top Header Announcement',
            'fields' => array(
                array(
                    'id' => 'top-header-announcement-style-two',
                    'type' => 'text',
                    'title' => 'Top Header Offer',
                    'default' => 'Free Shipping + Free Return for above $54.99'
                ),
            ),
            'dependency' =>
                array('lvgshop-header-style', '==', 'style-two'),
        ),
        array(
            'id' => 'store_location',
            'type' => 'text',
            'title' => 'Store Location',
            'default' => 'Find Store Location',
            'dependency' => array( 'lvgshop-header-style', 'any', 'style-two,style-three' ),
        ),
        array(
            'id' => 'store_location_link',
            'type' => 'link',
            'title' => 'Store Location Link',
             'dependency' => array( 'lvgshop-header-style', 'any', 'style-two,style-three' ),
        ),
        array(
            'id' => 'phone_number_before_text',
            'type' => 'text',
            'title' => 'Phone Number Before Text',
            'default' => 'Support 24/7',
            'dependency' =>
                array('lvgshop-header-style', '==', 'style-three'),
        ),
        array(
            'id' => 'phone_number',
            'type' => 'text',
            'title' => 'Phone Number',
            'default' => '943 097 254 928',
        ),
        array(
            'id' => 'opening_time_before_text',
            'type' => 'text',
            'title' => 'Opening Time Before Text',
            'default' => 'Opening hours',
            'dependency' =>
                array('lvgshop-header-style', '==', 'style-three'),
        ),
        array(
            'id' => 'opening_time',
            'type' => 'text',
            'title' => 'Opening Time',
            'default' => '09:00AM - 10:00PM',
            'dependency' =>
                array('lvgshop-header-style', '==', 'style-three'),
        ),
        array(
            'id' => 'style-one-search-switcher',
            'type' => 'switcher',
            'title' => 'Header Search Switcher',
            'default' => true,
        ),
        array(
            'id' => 'style-two-category-nav',
            'type' => 'repeater',
            'title' => 'Category Nav List',
            'fields' => array(
                array(
                    'id' => 'category_nav_text',
                    'type' => 'text',
                    'title' => 'Category Nav Text',
                    'default' => 'Computer & Laptop'
                ),
                array(
                    'id' => 'category_nav_link',
                    'type' => 'link',
                    'title' => 'Category Nav Link',
                ),
                array(
                    'id' => 'category_nav_icon',
                    'type' => 'icon',
                    'title' => 'Category Nav Icon',
                ),
            ),
            'dependency' =>
                array('lvgshop-header-style', '==', 'style-two'),
        ),
        // Output for background color
        array(
            'id' => 'top_header_bg_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Top Header Background Color',
            'output' => '.lvgshop-header-top-one',
            'output_mode' => 'background-color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'top_header_content_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Top Header Content Color',
            'output' => array(
                'color' => '.el-top-header .left-side .shipping-text,
                .el-top-header .right-side .language-switcher button,
                .el-top-header .right-side .currency-select',
                'fill' => '.lvgshop-header-top-one svg path'),
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'icon_bg_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Icon BG Color',
            'output' => '
                    .lvgshop-ajax-search-header-one .lvgshop-ajax-search-btn-stl-one,
                    .el-middle-header .info-box:hover .icon-wrapper',
            'output_mode' => 'background-color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'icon_badge_bg_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Icon Badge BG Color',
            'output' => '.el-middle-header .info-box .icon-wrapper .icon-badge',
            'output_mode' => 'background-color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'phone_number_bg_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Phone Number BG Color',
            'output' => '.el-header-btm .header-btn',
            'output_mode' => 'background-color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'phone_number_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Phone Number Color',
            'output' => array(
                'color' => '.el-header-btm .header-btn a',
            ),
            'output_mode' => 'color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
        array(
            'id' => 'logo_bg_shape_color_style_one',
            'type' => 'lvgshop_color',
            'title' => 'Logo BG Shape Color',
            'output' => array(
                'fill' => '.logo-shape path, .logo-shape rect',
            ),
            'output_mode' => 'color',
            'dependency' => array('lvgshop-header-style', '==', 'style-one'),
        ),
    )
));
// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Menu Style',
    'fields' => array(

        array(
            'id' => 'main_menu_typography_options',
            'type' => 'typography',
            'title' => 'Main Menu Typography',
            'output' => '.nav-style-megamenu>li.nav-item .nav-link',
            'text_align' => false,
            'subset' => false,
            'default' => array(
                'color' => '#fff',
                'font-family' => 'Albert Sans',
                'font-size' => '16',
                'line-height' => '20',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
                'subset' => 'latin-ext',
                'type' => 'google',
                'unit' => 'px',
            ),
        ),

        array(
            'id' => 'main_menu_text_color',
            'type' => 'lvgshop_color',
            'title' => 'Main Menu Hover Color',
            'output' => array(
                'color' => '.nav-style-megamenu>li.nav-item .nav-link:hover',
            ),
        ),


        array(
            'id' => 'sub_menu_typography_options',
            'type' => 'typography',
            'title' => 'Sub Menu Typography',
            'output' => '.nav-style-megamenu>li.nav-item .dropdown-menu .dropdown-item',
            'text_align' => false,
            'subset' => false,
            'default' => array(
                'color' => '#121111',
                'font-family' => 'Albert Sans',
                'font-size' => '16',
                'line-height' => '20',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
                'subset' => 'latin-ext',
                'type' => 'google',
                'unit' => 'px',
            ),
        ),

        array(
            'id' => 'sub_menu_text_color',
            'type' => 'lvgshop_color',
            'title' => 'Sub Menu Hover Color',
            'output' => array(
                'color' => '.nav-style-megamenu>li.nav-item .dropdown-menu .dropdown-item:hover',
            ),
        ),


        array(
            'id' => 'sub_menu_bg_color',
            'type' => 'lvgshop_gradient',
            'title' => 'Sub Menu Background Color',
            'output' => array(
                'background' => '.lvgshop-m-menu .nav-style-megamenu>li.nav-item .dropdown-menu .submenu-box',
            ),
        ),


        array(
            'id' => 'mega_menu_title_options',
            'type' => 'typography',
            'title' => 'Mega Menu Title Typography',
            'output' => '.nav-style-megamenu>li.nav-item .dropdown-menu h5.lvgshop-mg-col-title',
            'text_align' => false,
            'subset' => false,
            'default' => array(
                'color' => '#121111',
                'font-family' => 'Albert Sans',
                'font-weight' => '600',
                'font-size' => '16',
                'line-height' => '20',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
                'subset' => 'latin-ext',
                'type' => 'google',
                'unit' => 'px',
            ),
        ),


    )


));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Breadcrumb',
    'fields' => array(


        array(
            'id' => 'x_breadcrumb_margin',
            'type' => 'spacing',
            'title' => 'Margin',
            'output' => '#lvgshop-hero-banner',
            'output_mode' => 'margin', // or margin, relative
            'default' => array(
                'top' => '0',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
            ),
        ),

        array(
            'id' => 'x_breadcrumb_padding',
            'type' => 'spacing',
            'title' => 'Padding',
            'output' => '#lvgshop-hero-banner',
            'output_mode' => 'padding', // or margin, relative
            'default' => array(
                'top' => '176',
                'right' => '15',
                'bottom' => '64',
                'left' => '15',
                'unit' => 'px',
            ),
        ),


        array(
            'id' => 'x_breadcumb_bg',
            'type' => 'lvgshop_gradient',
            'title' => 'Background Color',
            'default' => '#2B2F3E',
            'output' => '#lvgshop-hero-banner',
            'output_mode' => 'background',

        ),


        array(
            'id' => 'x_breadcumb_color',
            'type' => 'lvgshop_color',
            'title' => 'Color',
            'default' => '#fff',
            'output' => '#lvgshop-hero-banner,#lvgshop-hero-banner h1,#lvgshop-hero-banner .lvgshop-breadcrumb a,#lvgshop-hero-banner .lvgshop-breadcrumb,
          #lvgshop-hero-banner .woocommerce-breadcrumb a,
          #lvgshop-hero-banner .woocommerce-breadcrumb',
            'output_mode' => 'color',

        ),


    )


));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Loader',
    'fields' => array(
        array(
            'id' => 'enable_dbl_loader',
            'type' => 'button_set',
            'title' => 'Loader Enable/Disable',
            'options' => array(
                'enabled' => 'Enabled',
                'disabled' => 'Disabled',
            ),
            'default' => 'disabled'
        ),


        array(
            'id' => 'ldr_bg',
            'type' => 'lvgshop_gradient',
            'title' => 'Background Color',
            'default' => '#fff',
            'output' => '.preloader',
            'output_mode' => 'background',

        ),

        array(
            'id' => 'ldr_cirl_clr',
            'type' => 'lvgshop_gradient',
            'title' => 'Text Color',
            'default' => '#121111',
            'output' => '.preloader h1',
            'output_mode' => 'color',

        ),


        array(
            'id' => 'ldr_progree_bar',
            'type' => 'lvgshop_gradient',
            'title' => 'Progress bar Background Color',
            'default' => '#121111',
            'output' => '.preloader .preload-progress span',
            'output_mode' => 'background',

        ),

        array(
            'id' => 'ldr_main_txt',
            'type' => 'text',
            'title' => 'Loader Text',
            'default' => 'Lvgshop'
        ),


    )
));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Sticky Header',
    'fields' => array(
        
        array(
              'id'         => 'sticky_enable',
              'type'       => 'switcher',
              'title'      => 'Sticky Header',
              'text_on'    => 'Enabled',
              'text_off'   => 'Disabled',
              'text_width' => 100
            ),
        array(
            'id' => 'sticky_logo',
            'type' => 'media',
            'title' => 'Sticky Logo',
        ),
        
         array(
            'id' => 'sticky_header_bg',
            'type' => 'lvgshop_gradient',
            'title' => 'Sticky Header Background',
            'default' => '#ffff',
            'output' => '.sticky-wrapper.header-sticky',
            'output_mode' => 'background',

        ),
        
        array(
            'id' => 'sticky_header_text',
            'type' => 'lvgshop_gradient',
            'title' => 'Sticky Header Menu Color',
            'default' => '#222',
            'output' => '.sticky-wrapper.header-sticky .nav-style-megamenu>li.nav-item .nav-link',
            'output_mode' => 'color',

        ),
        
    )


));