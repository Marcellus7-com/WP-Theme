<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'woocommerce', // Set a unique slug-like ID
    'title' => 'Woocoommerce',
    'icon' => 'fa fa-shopping-cart',
));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title' => 'Single Product',
    'fields' => array(
        array(
            'id'          => 'product-layout-style',
            'type'        => 'select',
            'title'       => 'Product Layout Style',
            'placeholder' => 'Select an option',
            'options'     => array(
                'style-1'  => 'Style 1',
                'style-2'  => 'Style 2',
                'style-3'  => 'Style 3',
            ),
            'default'     => 'style-1'
        ),
        array(
            'id'          => 'product-info-style',
            'type'        => 'select',
            'title'       => 'Product Info Style',
            'placeholder' => 'Select an option',
            'options'     => array(
                'style-1'  => 'Style 1',
                'style-2'  => 'Style 2',
            ),
            'default'     => 'style-1'
        ),
        array(
            'id' => 'single_woo_breadcumb_padding',
            'type' => 'spacing',
            'title' => 'Breradcrumb Padding',
            'output' => '.emerce-common-breadcrumbs.emerce-woo-breadcumb',
            'output_mode' => 'padding', // or margin, relative
            'default' => array(
                'top' => '65',
                'right' => '15',
                'bottom' => '58',
                'left' => '15',
                'unit' => 'px',
            ),
        ),

        array(
            'id' => 'xpc_bd_woo_bg_color',
            'type' => 'lvgshop_gradient',
            'title' => 'Breadcrumb Background Color',
            'output' => '.emerce-common-breadcrumbs.emerce-woo-breadcumb',
            'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
        ),

        array(
            'id' => 'xpc_bd_woo_txt_color',
            'type' => 'lvgshop_gradient',
            'title' => 'Breadcrumb Text Color',
            'output' => '.emerce-common-breadcrumbs.emerce-woo-breadcumb,
          .emerce-common-breadcrumbs.emerce-woo-breadcumb h1, 
          .emerce-common-breadcrumbs.emerce-woo-breadcumb .emerce-breadcrumb a, 
          .emerce-common-breadcrumbs.emerce-woo-breadcumb .emerce-breadcrumb, 
          .emerce-common-breadcrumbs.emerce-woo-breadcumb .woocommerce-breadcrumb a, 
          .emerce-common-breadcrumbs.emerce-woo-breadcumb .woocommerce-breadcrumb,
          .woocommerce-breadcrumb a, .woocommerce-breadcrumb,
          .woocommerce-breadcrumb h1',
            'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
        ),


        array(
            'id' => 'bd_title_hide_woo',
            'type' => 'switcher',
            'title' => 'Product Title Hide from Breadcrumb',
            'text_on' => 'Show',
            'text_off' => 'Hide',
            'text_width' => 120
        ),


        array(
            'id' => 'main_woo_ttl_typo',
            'type' => 'typography',
            'title' => 'Main Title Typography',
            'output' => '.pivoo-single-product-box .product_title',
            'text_align' => false,
            'default' => array(
                'font-family' => 'Urbanist',
                'font-size' => '30',
                'line-height' => '42',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
                'subset' => 'latin-ext',
                'type' => 'google',
                'unit' => 'px',
            ),
        ),
        array(
            'type'    => 'heading',
            'content' => 'Additional Information',
        ),
        array(
            'id' => 'social_shere_one_off',
            'type' => 'switcher',
            'title' => 'Social Share On / Off',
            'text_on' => 'Show',
            'text_off' => 'Hide',
            'text_width' => 120,
            'default' => 'text_on'
        ),
        array(
            'id'      => 'Vat-Included-text',
            'type'    => 'text',
            'title'   => 'Vat Included Text',
            'default' => '(+15% Vat Included)'
        ),
        array(
            'id'      => 'Ask-text',
            'type'    => 'text',
            'title'   => ' Ask About Products',
            'default' => ' Ask About Products'
        ),
        array(
            'id'      => 'Ask-text-link',
            'type'    => 'link',
            'title'   => ' Ask About Products Link',
        
        ),
        array(
            'id'    => 'free-shipping-text-icon',
            'type'  => 'icon',
            'title' => 'Free Shipping Icon',
        ),
        array(
            'id'      => 'free-shipping-text',
            'type'    => 'wp_editor',
            'title'   => 'Free Shipping Text',
            'height'        => '60px',
            'default' => 'Free shipping via DHL, fully insured'
        ),
        array(
            'id'    => 'return-text-icon',
            'type'  => 'icon',
            'title' => 'Return Text Icon',
            'dependency' => array( 'product-layout-style', '==', 'style-1' ),
        ),
        array(
            'id'      => 'return-text',
            'type'    => 'wp_editor',
            'title'   => 'Return Text',
            'default' => 'Free returns',
            'height'        => '60px',
            'dependency' => array( 'product-layout-style', '==', 'style-1' ),
        ),


        array(
            'id'      => 'payment_top_text',
            'type'    => 'text',
            'title'   => 'Payment Text',
            'library' => 'image',
        ),
        array(
            'id'      => 'payment_icon_single',
            'type'    => 'media',
            'title'   => 'Payment Image',
            'library' => 'image',
        ),
        array(
            'type'    => 'heading',
            'content' => 'Shipping sidebar widget Style 3',
            'dependency' => array( 'product-layout-style', '==', 'style-3' ),
        ),
        array(
            'id' => 'single_product_sidebar_box',
            'type' => 'repeater',
            'title' => 'Shipping sidebar widget Box',
            'dependency' => array( 'product-layout-style', '==', 'style-3' ),
            'fields' => array(
                array(
                    'id' => 'single_product_sidebar_box_icon_image',
                    'type' => 'media',
                    'title' => 'Box Icon',
                ),
                array(
                    'id' => 'single_product_sidebar_box_heading',
                    'type' => 'text',
                    'title' => 'Box Heading',
                ),
                array(
                    'id' => 'single_product_sidebar_box_text',
                    'type' => 'text',
                    'title' => 'Box Text',

                ),

            ),
        ),
        array(
            'type'    => 'heading',
            'content' => 'Banner sidebar widget Style 3',
            'dependency' => array( 'product-layout-style', '==', 'style-3' ),
        ),
        array(
            'id'      => 'banner-right-text-bg',
            'type'    => 'media',
            'title'   => 'Banner Image',
            'library' => 'image',
        ),
        array(
            'id'      => 'banner-right-text',
            'type'    => 'text',
            'title'   => 'Banner Sub Title',
            'default' => 'NEW COLLECTION'
        ),
        array(
            'id'      => 'banner-right-main-title',
            'type'    => 'wp_editor',
            'title'   => 'Banner Title',
            'height'        => '50px',
            'default' => 'Up to <span class="text-light-red">30% Off</span> Instand Discount'
        ),
        array(
            'id'      => 'banner-right-main-price',
            'type'    => 'wp_editor',
            'title'   => 'Banner Price',
            'height'        => '30px',
            'default' => 'Starting at <span class="text-light-red">$69.00</span> '
        ),
        array(
            'id'    => 'banner-right-main-link',
            'type'  => 'link',
            'title' => 'Banner Link',
        ),
    )


));