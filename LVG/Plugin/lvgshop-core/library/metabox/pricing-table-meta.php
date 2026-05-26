<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'med_pricing_options';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Pricing Table Options',
    'post_type' => 'pricingtable',
    'data_type'          => 'unserialize',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Pricing Table',
    'fields' => array(

    array(
  'id'     => 'med_pricing_table',
  'type'   => 'repeater',
  'title'  => 'Pricing Table Box',
  'button_title' => 'Add Pricing Table',
  'fields' => array(

    array(
      'id'    => 'title',
      'type'  => 'text',
      'title' => 'Title',
      'default' => 'Standard Plan'
    ),
    
     array(
      'id'    => 'description',
      'type'  => 'text',
      'title' => 'Small Description Text',
      'default' => 'Beautiful views that make project planning a breeze'
    ),
    
    
    array(
  'id'      => 'icon',
  'type'    => 'icon',
  'title'   => 'Icon',
),

array(
  'id'    => 'imgmed',
  'type'  => 'media',
  'title' => 'Image Insted Icon',
),

 array(
      'id'    => 'price',
      'type'  => 'text',
      'title' => 'Price',
      'default' => '249'
    ),
    
     array(
      'id'    => 'currency',
      'type'  => 'text',
      'title' => 'Currency',
      'default' => '$'
    ),
    
     array(
      'id'    => 'duration',
      'type'  => 'text',
      'title' => 'Duration',
      'default' => 'mo'
    ),
    
    array(
      'id'    => 'ext_price_text',
      'type'  => 'text',
      'title' => 'Price Extra Text',
      'default' => 'With unlimited consultation'
    ),
    
    
    array(
  'id'     => 'pricing-item',
  'type'   => 'repeater',
  'title'  => 'Pricing Table Item',
  'fields' => array(

    array(
      'id'    => 'pt-title',
      'type'  => 'text',
      'title' => 'Title',
      'default' => '100,00+ Treatments'
      
    ),
   
     array(
  'id'      => 'icon',
  'type'    => 'icon',
  'title'   => 'Icon',
  
),

   array(
  'id'      => 'cs_image',
  'type'    => 'media',
  'title'   => 'Custom Icon',
  
),

  ),
),


 array(
      'id'    => 'btn_text',
      'type'  => 'text',
      'title' => 'Button Text',
      'default' => 'Get Started'
    ),
    
    array(
      'id'    => 'btn_url',
      'type'  => 'text',
      'title' => 'Button Url',
      'default' => ''
    ),
    
    array(
  'id'         => 'featured',
  'type'       => 'switcher',
  'title'      => 'Featured Column',
  'text_on'    => 'Enabled',
  'text_off'   => 'Disabled',
  'text_width' => 100
),



  ),
),



array(
  'id'     => 'compare_table_title',
  'type'   => 'repeater',
  'title'  => 'Compare Table Title',
  'fields' => array(

    array(
      'id'    => 'title',
      'type'  => 'text',
      'title' => 'Title'
    ),

  ),
),



    )
  ) );



}
