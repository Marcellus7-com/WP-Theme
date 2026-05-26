<?php

if( ! function_exists( 'lvgshop_custom_icons' ) ) {

    function lvgshop_custom_icons( $icons ) {

        //
        // Use this for reset current icons
        // $icons = array();

        //
        // Adding new icons
        $icons[]  = array(
            'title' => 'LVG Shop by M7 Custom Icons',
            'icons' => array(
                'ele-icon lvgshop-megaphone',
                'ele-icon lvgshop-map',
                'ele-icon lvgshop-profile-circle',
                'ele-icon lvgshop-heart',
                'ele-icon lvgshop-shopping-bag',
                'ele-icon lvgshop-search',
                'ele-icon lvgshop-angle-down',
                'ele-icon lvgshop-arrow-right',
                'ele-icon lvgshop-reload',
                'ele-icon lvgshop-heart-2',
                'ele-icon lvgshop-truck',
                'ele-icon lvgshop-headphone',
                'ele-icon lvgshop-wallet',
                'ele-icon lvgshop-percent',
                'ele-icon lvgshop-call',
                'ele-icon lvgshop-mail',
                'ele-icon lvgshop-twitter',
                'ele-icon lvgshop-linkedin',
                'ele-icon lvgshop-instagram',
                'ele-icon lvgshop-pinterest',
                'ele-icon lvgshop-tag',
                'ele-icon lvgshop-034-bubble-chat',
                'ele-icon lvgshop-mobile-phone',
                'ele-icon lvgshop-monitor',
                'ele-icon lvgshop-joystick',
                'ele-icon lvgshop-headset',
                'ele-icon lvgshop-watch',
                'ele-icon lvgshop-webcam',
                'ele-icon lvgshop-router',
                'ele-icon lvgshop-radio',
                'ele-icon lvgshop-time-circle',
            )
        );

        //
        // Move custom icons to top of the list.
        $icons = array_reverse( $icons );

        return $icons;

    }
    add_filter( 'csf_field_icon_add_icons', 'lvgshop_custom_icons' );
}