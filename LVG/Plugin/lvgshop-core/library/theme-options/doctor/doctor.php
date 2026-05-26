<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'doctor', // Set a unique slug-like ID
    'title' => 'Doctor Options',
    'icon'     => 'fa fa-user',
  ) );
  
   // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'doctor', // The slug id of the parent section
    'title'  => 'Single Doctor Options',
    'fields' => array(

        array(
  'id'      => 'make_appointment',
  'type'    => 'text',
  'title'   => 'Make Appointment Subtitle',
  'default' => 'Make Appointment'
),



        array(
  'id'      => 'make_appointment_title',
  'type'    => 'text',
  'title'   => 'Make Appointment Title',
  'default' => 'Meet Our Doctors'
),

array(
  'id'    => 'make_appointment_desc',
  'type'  => 'wp_editor',
  'title' => 'Description',
),

array(
  'id'    => 'make_appointment_shortcode',
  'type'  => 'wp_editor',
  'title' => 'Shortcode',
),
        
        )
        
        ));