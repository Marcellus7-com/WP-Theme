<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'blog', // Set a unique slug-like ID
    'title' => 'Blog',
    'icon'     => 'fa fa-book',
  ) );
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'blog', // The slug id of the parent section
    'title'  => 'Single Blog Options',
    'fields' => array(
 array(
          'id'         => 'x_sbl_width_set',
          'type'       => 'switcher',
          'title'      => 'Breadcrumb Width Type',
          'text_off'    => 'Full Width',
          'text_on'   => 'Boxed',
          'text_width' => 110
        ),
        
       array(
          'id'          => 'x_sblbreadcrumb_margin',
          'type'        => 'spacing',
          'title'       => 'Margin',
          'output'      => '.breadcrumb-section',
          'output_mode' => 'margin', // or margin, relative
          'default'     => array(
            'top'       => '0',
            'right'     => '0',
            'bottom'    => '0',
            'left'      => '0',
            'unit'      => 'px',
          ),
        ),
        
         array(
          'id'          => 'x_sblbreadcrumb_padding',
          'type'        => 'spacing',
          'title'       => 'Padding',
          'output'      => '.breadcrumb-section',
          'output_mode' => 'padding', // or margin, relative
          'default'     => array(
            'top'       => '40',
            'right'     => '15',
            'bottom'    => '40',
            'left'      => '15',
            'unit'      => 'px',
          ),
        ),
        
        array(
  'id'     => 'blog_thumnail_width',
  'type'   => 'dimensions',
  'title'  => 'Thumbnail Width',
  'height' => false,
  'output' => 'img.uron_single_page'
),
        
        array(
          'id'    => 'x_sblbreadcumb_bg',
          'type'  => 'lvgshop_gradient',
          'title' => 'Background Color',
          'default'=>'#F5F5F5',
          'output'      => '.breadcrumb-section',
          'output_mode' => 'background',
          
        ),
          array(
          'id'    => 'x_sblbreadcumb_color',
          'type'  => 'lvgshop_color',
          'title' => 'Color',
          'default'=>'#222',
          'output'      => '.breadcrumb-text a,.lvgshop-single-post-content .cat-links a, .lvgshop-single-post-content span.posted-on a,.blog-author-box p , .emerce-breadcrumb a,.emerce-single-blog-header .emerce-breadcrumb,
          .emerce-single-blog-header .woocommerce-breadcrumb a,
          .emerce-single-blog-header .woocommerce-breadcrumb',
          'output_mode' => 'color',
          
        ),


        )
        ));
        
         // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'blog', // The slug id of the parent section
    'title'  => 'Archive Options',
    'fields' => array(
         array(
  'id'     => 'archive_thumnail_width_blog',
  'type'   => 'dimensions',
  'title'  => 'Thumbnail Width',
  'height' => false,
  'output' => '.tctz-default-thumbnail img'
),
        array(
            'id' => 'arcuve_banner_gallerys_imgs',
            'type' => 'media',
            'title' => 'Quote Icon/Image',
        ),
        array(
            'id'    => 'arcive-titless-text',
            'type'  => 'text',
            'title' => 'Title Text',
        ),
        array(
            'id'    => 'arcive-subs-text',
            'type'  => 'text',
            'title' => 'Text',
        ),

        )
        
        ));
        
        
