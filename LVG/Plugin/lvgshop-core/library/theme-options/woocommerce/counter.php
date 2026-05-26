<?php
// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title' => 'Sale Counter',
    'fields' => array(
        array(
            'id'      => 'counter_enable_disable',
            'type'    => 'switcher',
            'title'   => 'Switcher',
            'label'   => 'Counter Enable/ Disable',
            'default' => true
        ),
    )


));