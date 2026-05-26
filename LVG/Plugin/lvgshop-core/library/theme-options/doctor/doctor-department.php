<?php
 
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'doctor', // The slug id of the parent section
    'title'  => 'Doctor Department',
    'fields' => array(

        array(
          'id'          => 'department_column',
          'type'        => 'select',
          'title'       => 'Department Column',
          'placeholder' => 'Select an option',
          'options'     => array(
            '2'  => 'Two Column',
            '3'  => 'Three Column',
            '4'  => 'Four Column',
             '5'  => 'Five Column',
              '6'  => 'Six Column',
          ),
          'default'     => '4'
        ),
                
        )
        
        ));