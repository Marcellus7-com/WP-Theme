<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function lvgshop_welcome_page(){
    require_once 'lvgshop-welcome.php';
}

function lvgshop_admin_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_menu_page( 'LVG Shop by M7', 'LVG Shop by M7', 'administrator', 'lvgshop-admin-menu', 'lvgshop_welcome_page',  LVGSHOP_URL .'/assets/images/Icon.svg', 4 );
        add_submenu_page( 'lvgshop-admin-menu', 'lvgshop', esc_html__('Welcome','lvgshop'), 'administrator', 'lvgshop-admin-menu', 'lvgshop_welcome_page',0 );
      
        
        
     
    }
}

add_action( 'admin_menu', 'lvgshop_admin_menu' );
