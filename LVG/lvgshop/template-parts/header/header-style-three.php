<?php

$main_logo = cs_get_option('main-logo');
$offcanvas_logo = cs_get_option('offcanvas-logo');
$mobile_logo = cs_get_option('mobile-logo');
$top_switcher = cs_get_option('style-one-top-header-switcher');
$top_announcement = cs_get_option('top-header-announcement');
$search_switcher = cs_get_option('style-one-search-switcher');
$store_location = cs_get_option('store_location');
$store_location_link = cs_get_option('store_location_link');
$phone_number_before_text = cs_get_option('phone_number_before_text');
$phone_number = cs_get_option('phone_number');
$opening_time_before_text = cs_get_option('opening_time_before_text');
$opening_time = cs_get_option('opening_time');
$sticky_enable = cs_get_option('sticky_enable');
$sticky_logo = cs_get_option('sticky_logo');
?>


<!-- mobile menus  & categories start -->
<div class="el-mobile-menu-and-category-sidebar">
    <!-- category search bar -->
    <?php if ($search_switcher){ ?>
    <div class="el-search-with-category-wrapper extended mt-30 px-3 mb-30">
        <?php
        if (function_exists('lvgshop_live_search')) {
            lvgshop_live_search();
        } ?>
    </div>
    <?php } ?>


 <?php
         if (has_nav_menu("mobile-category-menu")){ ?>
    <!-- tab navbar -->
    <ul class="nav" id="el-cate-and-menu-Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="el-sidebar-menus" data-bs-toggle="tab"
                    data-bs-target="#el-sidebar-menus-pane" type="button" role="tab" aria-controls="el-sidebar-menus-pane"
                    aria-selected="true"><?php _e('menu', 'lvgshop'); ?>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="el-sidebar-categories-tab" data-bs-toggle="tab"
                    data-bs-target="#el-sidebar-categories-tab-pane" type="button" role="tab"
                    aria-controls="el-sidebar-categories-tab-pane" aria-selected="false"><?php _e('categories', 'lvgshop'); ?>
            </button>
        </li>
    </ul>
<?php } ?>
    <!-- tab contents -->
    <div class="tab-content" id="myTabContent">
        <!-- mobile menu -->
        <div class="tab-pane fade show active" id="el-sidebar-menus-pane" role="tabpanel"
             aria-labelledby="el-sidebar-menus" tabindex="0">
            <div class="mobile-menu el-mobile-menu-wrapper">
               
<?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-menu',
                    'menu_id' => 'mobile-menu',
                    'menu_class' => 'mobile-nav-menu',
                    'container_id' => 'mayosis-sidemenu',
                    'walker' => new Lvgshop_Accordion_Walker(),
                ));
                ?>
                <!-- select options -->
                <div class="mobile-select-options mobile-select-options-extended d-md-none mt-30">
                    <?php
                    if (is_active_sidebar('header_language_bar')) {
                        dynamic_sidebar('header_language_bar');
                    }
                    ?>
                    <?php
                    if (is_active_sidebar('header_currency')) {
                        dynamic_sidebar('header_currency');
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- mobile category -->
        <div class="tab-pane fade" id="el-sidebar-categories-tab-pane" role="tabpanel"
             aria-labelledby="el-sidebar-categories-tab" tabindex="0">
            <div class="mobile-menu el-mobile-menu-wrapper">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-category-menu',
                    'menu_id' => 'mobile-menu',
                    'menu_class' => 'mobile-nav-menu',
                    'container_id' => 'mayosis-sidemenu',
                    'walker' => new Lvgshop_Accordion_Walker(),
                ));
                ?>
            </div>
        </div>
    </div>
    
    
</div>
<!-- mobile menus  & categories start end -->

<!--cart drawer start-->
<div class="cart-drawer position-fixed">
    <div class="drawer-close d-flex align-items-center justify-content-between position-absolute start-0 top-0 w-100 px-4 py-4 border-bottom">
        <?php
        $item_count_text = sprintf(
        /* translators: number of items in the mini cart. */
            _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'lvgshop'),
            WC()->cart->get_cart_contents_count()
        );
        ?>
        <h6 class="mb-0 fw-medium"><?php _e('Your Cart ', 'lvgshop'); ?> (<?php echo esc_html($item_count_text); ?>)</h6>
        <a href="javascript:void(0)" class="drawer-close"><i class="fas fa-xmark"></i></a>
    </div>
    <ul class="cart-list shopping-cart-wrapper">
        <?php echo lvgshop_tiny_cart(); ?>
    </ul>
</div>
<!--cart drawer end-->

<!--header section start-->
<header class="header-home-3">
    <?php if ($top_switcher) { ?>
        <!-- header top -->
        <div class="bg-yellow">
            <div class="el-top-header el-top-header-3 container container-xxxl">
                <?php if ($store_location) { ?>
                    <div class="location-wrapper d-none d-lg-block">
                        <svg class="location-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M15.9007 4.20209C14.5435 2.23786 12.3926 1.11108 9.99984 1.11108C7.6071 1.11108 5.45616 2.23786 4.09897 4.20209C2.74845 6.1564 2.43661 8.6306 3.26314 10.8165C3.48421 11.4135 3.83564 11.9934 4.30515 12.5369L9.52661 18.67C9.6447 18.8089 9.81772 18.8889 9.99984 18.8889C10.182 18.8889 10.355 18.8089 10.4731 18.67L15.6931 12.5386C16.1647 11.992 16.5156 11.4126 16.7349 10.8205C17.5631 8.6306 17.2512 6.1564 15.9007 4.20209ZM15.5708 10.3851C15.4018 10.842 15.1258 11.2937 14.7509 11.7282C14.7499 11.7292 14.7489 11.7303 14.748 11.7315L9.99984 17.3086L5.24873 11.728C4.87411 11.2939 4.5981 10.8423 4.42737 10.381C3.74383 8.5732 4.00324 6.52751 5.12151 4.90907C6.24328 3.28546 8.02147 2.35428 9.99984 2.35428C11.9782 2.35428 13.7562 3.28542 14.878 4.90907C15.9964 6.52751 16.2561 8.5732 15.5708 10.3851Z"
                                    fill="#085330"/>
                            <path
                                    d="M10.0001 4.79932C8.08077 4.79932 6.5191 6.36077 6.5191 8.28029C6.5191 10.1998 8.08056 11.7613 10.0001 11.7613C11.9196 11.7613 13.481 10.1998 13.481 8.28029C13.481 6.36098 11.9194 4.79932 10.0001 4.79932ZM10.0001 10.518C8.76619 10.518 7.7623 9.51414 7.7623 8.28025C7.7623 7.04637 8.76619 6.04248 10.0001 6.04248C11.234 6.04248 12.2379 7.04637 12.2379 8.28025C12.2379 9.51414 11.234 10.518 10.0001 10.518Z"
                                    fill="#085330"/>
                        </svg>

                        <a href="<?php echo esc_url($store_location_link['url']); ?>" class="location-text"><?php echo esc_html($store_location); ?></a>
                    </div>
                <?php } ?>

                <?php if (!empty($top_announcement)) { ?>
                    <div class="left-side">
                        <svg class="shipping-img me-3" width="18" height="18" viewBox="0 0 18 18" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M9.59999 16.8099C9.46507 16.8097 9.33039 16.7986 9.19724 16.7769C8.84253 16.7194 8.50513 16.5835 8.20967 16.379C7.91421 16.1745 7.66816 15.9066 7.48949 15.5949L6.75674 14.3296C6.69687 14.2264 6.67136 14.1069 6.6839 13.9882C6.69644 13.8696 6.74637 13.758 6.82649 13.6696C6.89052 13.598 6.97178 13.544 7.06255 13.5126C7.15333 13.4813 7.25061 13.4736 7.34518 13.4903C7.43975 13.5071 7.52848 13.5477 7.60295 13.6083C7.67743 13.669 7.73518 13.7477 7.77074 13.8369L8.46374 15.0331C8.56117 15.2005 8.69445 15.3442 8.85402 15.454C9.01359 15.5637 9.19549 15.6368 9.38664 15.6679C9.5778 15.699 9.77347 15.6874 9.95961 15.634C10.1458 15.5805 10.3177 15.4865 10.4632 15.3586C10.6915 15.1594 10.8435 14.887 10.8933 14.5882C10.9431 14.2893 10.8876 13.9824 10.7362 13.7199L10.4707 13.2699C10.4333 13.2062 10.4087 13.1358 10.3984 13.0626C10.3882 12.9894 10.3924 12.915 10.411 12.8434C10.4295 12.7719 10.4619 12.7047 10.5064 12.6457C10.5509 12.5867 10.6066 12.5371 10.6702 12.4996C10.7339 12.4621 10.8043 12.4376 10.8775 12.4273C10.9507 12.4171 11.0252 12.4213 11.0967 12.4398C11.1682 12.4584 11.2354 12.4908 11.2944 12.5353C11.3534 12.5798 11.403 12.6354 11.4405 12.6991L11.7097 13.1566C11.9224 13.5271 12.034 13.9469 12.0335 14.374C12.0329 14.8012 11.9202 15.2207 11.7066 15.5906C11.493 15.9605 11.1859 16.2678 10.8162 16.4818C10.4465 16.6958 10.0271 16.8089 9.59999 16.8099V16.8099Z"
                                    fill="white"/>
                            <path
                                    d="M4.27482 15.4575C4.17615 15.4575 4.07923 15.4314 3.99379 15.3821C3.90835 15.3327 3.83741 15.2617 3.78807 15.1763L1.53807 11.2763C1.47536 11.1677 1.45075 11.0412 1.46814 10.917C1.48554 10.7928 1.54394 10.678 1.63407 10.5908L10.5231 1.99578C10.5851 1.9372 10.6595 1.8933 10.7407 1.86733C10.822 1.84137 10.9081 1.83401 10.9926 1.84578C11.0772 1.85761 11.1581 1.88862 11.2289 1.93645C11.2997 1.98429 11.3587 2.04768 11.4013 2.12178L16.6513 11.2148C16.6946 11.2889 16.7204 11.372 16.7267 11.4576C16.7329 11.5432 16.7195 11.6291 16.6874 11.7087C16.6554 11.7884 16.6055 11.8596 16.5417 11.917C16.4778 11.9744 16.4017 12.0164 16.3191 12.0398L4.42482 15.4358C4.37608 15.45 4.32559 15.4573 4.27482 15.4575V15.4575ZM2.72982 11.1L4.54032 14.2373L15.3171 11.1533L10.7878 3.30528L2.72982 11.1Z"
                                    fill="white"/>
                            <path
                                    d="M4.83597 16.4318C4.73717 16.4318 4.6401 16.4059 4.55452 16.3565C4.46894 16.3071 4.39787 16.2361 4.34847 16.1505L0.974972 10.305C0.90038 10.1757 0.880204 10.0221 0.918884 9.87791C0.957563 9.73374 1.05193 9.61084 1.18122 9.53625C1.31052 9.46166 1.46414 9.44148 1.60831 9.48016C1.75248 9.51884 1.87538 9.61321 1.94997 9.7425L5.32497 15.588C5.37433 15.6735 5.40032 15.7704 5.40033 15.8692C5.40035 15.9679 5.37439 16.0648 5.32507 16.1503C5.27575 16.2358 5.20479 16.3068 5.11934 16.3562C5.03388 16.4056 4.93693 16.4317 4.83822 16.4318H4.83597Z"
                                    fill="white"/>
                            <path
                                    d="M16.5407 12.7051C16.4417 12.7053 16.3445 12.6795 16.2587 12.6301C16.173 12.5807 16.1018 12.5095 16.0524 12.4238L10.0524 2.03181C9.97783 1.90252 9.95766 1.74889 9.99634 1.60472C10.035 1.46055 10.1294 1.33765 10.2587 1.26306C10.388 1.18847 10.5416 1.16829 10.6858 1.20697C10.8299 1.24565 10.9528 1.34001 11.0274 1.46931L17.0274 11.8613C17.077 11.9467 17.1032 12.0436 17.1033 12.1424C17.1035 12.2411 17.0776 12.3381 17.0284 12.4237C16.9791 12.5092 16.9081 12.5803 16.8226 12.6297C16.7372 12.6791 16.6402 12.7051 16.5414 12.7051H16.5407Z"
                                    fill="white"/>
                        </svg>
                        <div class="shipping-container">
                            <span class="shipping-text"><?php echo esc_html($top_announcement); ?></span>
                        </div>
                    </div>
                <?php } ?>

                <div class="right-side d-none d-md-flex">
                    <?php
                    if (is_active_sidebar('header_language_bar')) {
                        dynamic_sidebar('header_language_bar');
                    }
                    ?>
                    <?php
                    if (is_active_sidebar('header_currency')) {
                        dynamic_sidebar('header_currency');
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!--  header middle -->
    <div class="el-middle-header el-middle-header-3 container container-xxxl">
        <div class="row align-items-center px-2 px-md-0">
            <!-- logo-->
            <div class="col-5  col-lg-2 col-xl-3 d-flex justify-content-start">
                <div class="logo-wrapper">
                    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="logo" class="img-fluid logo"></a>
                    <?php } ?>
                </div>
            </div>
            <!-- search bar with category -->
            <div class="col-lg-7 col-xl-6 d-lg-block d-none">
                <?php if ($search_switcher){ ?>
                <div class="el-search-with-category-wrapper">
                    <?php
                    if (function_exists('lvgshop_live_search')) {
                        lvgshop_live_search();
                    } ?>
                </div>
                <?php } ?>
            </div>
            <!-- actions btns -->
            <div class="col-7  col-lg-3 col-xl-3">
                <div class="el2-header-right d-flex align-items-center justify-content-end pe-2">
                    <div class="el2-header-user">
                        <a href="#">
                            <i class="fa-regular fa-user"></i>
                        </a>
                        <ul class="info-menu">
                            <?php if (is_user_logged_in()) { ?>
                                <li>
                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', 'lvgshop'); ?>"><?php _e('My Account', 'lvgshop'); ?></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('Login / Register', 'lvgshop'); ?>"><?php _e('Login / Register', 'lvgshop'); ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    if (class_exists('YITH_WCWL')) {
                        ?>
                        <div class="el2-header-wishlist position-relative d-md-block">
                            <span class="count-item yith-wcwl-items-count"><?php echo esc_html(yith_wcwl_count_all_products()); ?></span>
                            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12 22.0002C11.407 22.0002 10.8398 21.7682 10.4059 21.3488L3.13984 14.3028C1.8207 13.0266 1 10.9739 1 8.9436V8.70263C1 4.99894 3.8875 2.00028 7.45391 2.00028C9.15547 2.00028 10.7926 2.70086 12 3.94584C14.5266 1.33986 18.6129 1.35325 21.1266 3.97707C22.3254 5.23097 23 6.93111 23 8.69817V8.93913C23 10.9695 22.1793 13.0221 20.8602 14.2983L13.5941 21.3488C13.1602 21.7682 12.593 22.0002 12 22.0002ZM7.44961 3.46391C4.66523 3.46391 2.40937 5.80661 2.40937 8.69817V8.70263V8.9436C2.40937 10.5589 3.07109 12.2412 4.09805 13.2319L11.3641 20.2778C11.7207 20.6214 12.275 20.6214 12.6316 20.2778L19.8977 13.2319C20.9246 12.2368 21.5906 10.5545 21.5906 8.9436V8.70263C21.5906 5.81107 19.3305 3.46391 16.5418 3.46391C15.2055 3.46391 13.9207 4.01723 12.9754 4.99894L12 6.01187L11.0203 4.99447C10.0707 4.01277 8.78594 3.46391 7.44961 3.46391Z"
                                            fill="#085330"/>
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if (class_exists('WooCommerce')) { ?>
                        <div class="el2-header-cart position-relative open-cart-drawer">
                        <span class="count-item" id="mini-cart-count">
                             <?php echo WC()->cart->get_cart_contents_count(); ?>
                        </span>
                            <a href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M17.5997 22.7383H6.39971C5.86804 22.7383 5.34244 22.6252 4.85781 22.4066C4.37318 22.1879 3.9406 21.8687 3.58878 21.47C3.23697 21.0714 2.97397 20.6025 2.81723 20.0945C2.6605 19.5864 2.61362 19.0508 2.67971 18.5233L3.92971 8.52328C4.04405 7.61692 4.48489 6.78333 5.16966 6.17863C5.85444 5.57393 6.73616 5.23961 7.64971 5.23828H16.3497C17.2632 5.23977 18.1448 5.57399 18.8296 6.17842C19.5145 6.78286 19.9557 7.6161 20.0707 8.52228L21.3207 18.5223C21.3868 19.05 21.3399 19.5857 21.1831 20.0938C21.0263 20.602 20.7632 21.071 20.4113 21.4697C20.0594 21.8685 19.6267 22.1878 19.142 22.4065C18.6572 22.6252 18.1315 22.7383 17.5997 22.7383ZM7.64571 6.73828C7.09764 6.73929 6.56872 6.93996 6.1579 7.30274C5.74709 7.66552 5.48252 8.16555 5.41371 8.70928L4.16371 18.7093C4.12378 19.0262 4.15185 19.348 4.24603 19.6532C4.34022 19.9584 4.49837 20.24 4.70994 20.4793C4.92151 20.7186 5.18165 20.9101 5.47302 21.0409C5.76439 21.1718 6.0803 21.2391 6.39971 21.2383H17.5997C17.9188 21.2385 18.2343 21.1708 18.5252 21.0397C18.8162 20.9086 19.0759 20.7171 19.2871 20.4778C19.4983 20.2386 19.6562 19.9572 19.7503 19.6523C19.8443 19.3474 19.8724 19.0259 19.8327 18.7093L18.5827 8.70928C18.5133 8.16564 18.2484 7.66584 17.8375 7.30316C17.4266 6.94047 16.8978 6.73969 16.3497 6.73828H7.64571Z"
                                            fill="#085330"/>
                                    <path
                                            d="M15.4998 9.75024C15.3008 9.75024 15.1101 9.67123 14.9694 9.53057C14.8288 9.38992 14.7498 9.19916 14.7498 9.00024V5.50024C14.7498 4.7709 14.46 4.07143 13.9443 3.5557C13.4286 3.03998 12.7291 2.75024 11.9998 2.75024C11.2704 2.75024 10.5709 3.03998 10.0552 3.5557C9.53949 4.07143 9.24976 4.7709 9.24976 5.50024V9.00024C9.24976 9.19916 9.17074 9.38992 9.03009 9.53057C8.88943 9.67123 8.69867 9.75024 8.49976 9.75024C8.30084 9.75024 8.11008 9.67123 7.96943 9.53057C7.82877 9.38992 7.74976 9.19916 7.74976 9.00024V5.50024C7.74976 4.37307 8.19752 3.29207 8.99455 2.49504C9.79158 1.69801 10.8726 1.25024 11.9998 1.25024C13.1269 1.25024 14.2079 1.69801 15.005 2.49504C15.802 3.29207 16.2498 4.37307 16.2498 5.50024V9.00024C16.2498 9.19916 16.1707 9.38992 16.0301 9.53057C15.8894 9.67123 15.6987 9.75024 15.4998 9.75024V9.75024Z"
                                            fill="#085330"/>
                                    <path
                                            d="M13.9998 18.75H9.99976C9.80084 18.75 9.61008 18.671 9.46943 18.5303C9.32877 18.3897 9.24976 18.1989 9.24976 18C9.24976 17.8011 9.32877 17.6103 9.46943 17.4697C9.61008 17.329 9.80084 17.25 9.99976 17.25H13.9998C14.1987 17.25 14.3894 17.329 14.5301 17.4697C14.6707 17.6103 14.7498 17.8011 14.7498 18C14.7498 18.1989 14.6707 18.3897 14.5301 18.5303C14.3894 18.671 14.1987 18.75 13.9998 18.75V18.75Z"
                                            fill="#085330"/>
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                    <!-- menu trigger -->
                    <button class="sidebar-toggle-btn mobile-menu-toggle d-lg-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </div>
            </div>


        </div>
    </div>

    <!-- header bottom -->
    <div class="el-header-btm el-header-btm-3 d-none d-lg-block">
        <div class="container container-xxxl position-relative px-0">
            <div class="row align-items-center px-xl-0">
                <!-- navbar -->
                <div class="col-lg-8 col-xxl-8 d-flex align-items-center">
                    <div class="lvgshop-vertical-nav">
                        <a id="lvgshop-vertical-nav-trigger" href="#" class="el3-cate-lg-btn el3-cate-dropdown-trigger-btn-disable">
                          <span class="d-flex align-items-center">
                            <svg class="el3-cate-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_60_2507)">
                                <path
                                        d="M13.333 15.1668H10.6663C10.1802 15.1665 9.71411 14.9732 9.37037 14.6295C9.02663 14.2857 8.83336 13.8196 8.83301 13.3335V10.6668C8.83336 10.1807 9.02663 9.7146 9.37037 9.37086C9.71411 9.02712 10.1802 8.83385 10.6663 8.8335H13.333C13.4656 8.8335 13.5928 8.88617 13.6866 8.97994C13.7803 9.07371 13.833 9.20089 13.833 9.3335C13.833 9.4661 13.7803 9.59328 13.6866 9.68705C13.5928 9.78082 13.4656 9.8335 13.333 9.8335H10.6663C10.4454 9.83385 10.2337 9.92176 10.0775 10.078C9.92127 10.2342 9.83336 10.4459 9.83301 10.6668V13.3335C9.83336 13.5544 9.92127 13.7662 10.0775 13.9224C10.2337 14.0786 10.4454 14.1665 10.6663 14.1668H13.333C13.5539 14.1665 13.7657 14.0786 13.9219 13.9224C14.0781 13.7662 14.166 13.5544 14.1663 13.3335V10.6668C14.1663 10.5342 14.219 10.407 14.3128 10.3133C14.4066 10.2195 14.5337 10.1668 14.6663 10.1668C14.7989 10.1668 14.9261 10.2195 15.0199 10.3133C15.1137 10.407 15.1663 10.5342 15.1663 10.6668V13.3335C15.166 13.8196 14.9727 14.2857 14.629 14.6295C14.2852 14.9732 13.8191 15.1665 13.333 15.1668Z"
                                        fill="white"/>
                                <path
                                        d="M5.33301 7.16683H2.66634C2.18022 7.16648 1.71411 6.97321 1.37037 6.62947C1.02663 6.28573 0.833361 5.81962 0.833008 5.3335V2.66683C0.833361 2.18071 1.02663 1.7146 1.37037 1.37086C1.71411 1.02712 2.18022 0.833849 2.66634 0.833496H5.33301C5.81913 0.833849 6.28524 1.02712 6.62898 1.37086C6.97272 1.7146 7.16599 2.18071 7.16634 2.66683V5.3335C7.16599 5.81962 6.97272 6.28573 6.62898 6.62947C6.28524 6.97321 5.81913 7.16648 5.33301 7.16683ZM2.66634 1.8335C2.44544 1.83385 2.23368 1.92176 2.07747 2.07796C1.92127 2.23417 1.83336 2.44592 1.83301 2.66683V5.3335C1.83336 5.5544 1.92127 5.76616 2.07747 5.92236C2.23368 6.07857 2.44544 6.16648 2.66634 6.16683H5.33301C5.55391 6.16648 5.76567 6.07857 5.92187 5.92236C6.07808 5.76616 6.16599 5.5544 6.16634 5.3335V2.66683C6.16599 2.44592 6.07808 2.23417 5.92187 2.07796C5.76567 1.92176 5.55391 1.83385 5.33301 1.8335H2.66634Z"
                                        fill="white"/>
                                <path
                                        d="M13.333 7.16683H10.6663C10.1802 7.16648 9.71411 6.97321 9.37037 6.62947C9.02663 6.28573 8.83336 5.81962 8.83301 5.3335V2.66683C8.83336 2.18071 9.02663 1.7146 9.37037 1.37086C9.71411 1.02712 10.1802 0.833849 10.6663 0.833496H13.333C13.8191 0.833849 14.2852 1.02712 14.629 1.37086C14.9727 1.7146 15.166 2.18071 15.1663 2.66683V5.3335C15.166 5.81962 14.9727 6.28573 14.629 6.62947C14.2852 6.97321 13.8191 7.16648 13.333 7.16683ZM10.6663 1.8335C10.4454 1.83385 10.2337 1.92176 10.0775 2.07796C9.92127 2.23417 9.83336 2.44592 9.83301 2.66683V5.3335C9.83336 5.5544 9.92127 5.76616 10.0775 5.92236C10.2337 6.07857 10.4454 6.16648 10.6663 6.16683H13.333C13.5539 6.16648 13.7657 6.07857 13.9219 5.92236C14.0781 5.76616 14.166 5.5544 14.1663 5.3335V2.66683C14.166 2.44592 14.0781 2.23417 13.9219 2.07796C13.7657 1.92176 13.5539 1.83385 13.333 1.8335H10.6663Z"
                                        fill="white"/>
                                <path
                                        d="M5.33301 15.1668H2.66634C2.18022 15.1665 1.71411 14.9732 1.37037 14.6295C1.02663 14.2857 0.833361 13.8196 0.833008 13.3335V10.6668C0.833361 10.1807 1.02663 9.7146 1.37037 9.37086C1.71411 9.02712 2.18022 8.83385 2.66634 8.8335H5.33301C5.81913 8.83385 6.28524 9.02712 6.62898 9.37086C6.97272 9.7146 7.16599 10.1807 7.16634 10.6668V13.3335C7.16599 13.8196 6.97272 14.2857 6.62898 14.6295C6.28524 14.9732 5.81913 15.1665 5.33301 15.1668ZM2.66634 9.8335C2.44544 9.83385 2.23368 9.92176 2.07747 10.078C1.92127 10.2342 1.83336 10.4459 1.83301 10.6668V13.3335C1.83336 13.5544 1.92127 13.7662 2.07747 13.9224C2.23368 14.0786 2.44544 14.1665 2.66634 14.1668H5.33301C5.55391 14.1665 5.76567 14.0786 5.92187 13.9224C6.07808 13.7662 6.16599 13.5544 6.16634 13.3335V10.6668C6.16599 10.4459 6.07808 10.2342 5.92187 10.078C5.76567 9.92176 5.55391 9.83385 5.33301 9.8335H2.66634Z"
                                        fill="white"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_60_2507">
                                  <rect width="16" height="16" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                            Browse All Categories
                          </span>
                            <svg class="el3-arrow-icon" width="10" height="8" viewBox="0 0 10 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M9.68636 1.68969C9.68941 1.55115 9.64925 1.41511 9.5714 1.30047C9.49356 1.18583 9.38188 1.0983 9.25198 1.05004C9.12209 1.00177 8.98041 0.995184 8.8466 1.03118C8.71278 1.06717 8.59356 1.14397 8.50541 1.25088L5.01063 5.33031L1.51707 1.25088C1.46271 1.17692 1.3937 1.11499 1.3143 1.06895C1.2349 1.02291 1.14682 0.993757 1.05563 0.983325C0.964435 0.972892 0.872091 0.9814 0.784341 1.00832C0.69659 1.03523 0.615317 1.07998 0.54566 1.13975C0.476003 1.19952 0.419499 1.27303 0.379567 1.35567C0.339636 1.43831 0.317207 1.52831 0.313668 1.62003C0.31013 1.71175 0.325515 1.80321 0.35896 1.88868C0.392405 1.97416 0.443137 2.05181 0.507981 2.11677L4.50412 6.78734C4.56671 6.86069 4.6444 6.91958 4.73196 6.95997C4.81952 7.00036 4.91482 7.02127 5.01124 7.02127C5.10766 7.02127 5.20297 7.00036 5.29052 6.95997C5.37808 6.91958 5.45585 6.86069 5.51844 6.78734L9.51842 2.11677C9.62322 1.99878 9.6828 1.84745 9.68652 1.68969L9.68636 1.68969Z"
                                        fill="white"/>
                            </svg>
                        </a>
                        <?php if (is_home() || is_front_page()){ ?>
                        <nav id="lvgshop-vertical-nav-menu" class="lvgshop-vertical-nav-dropdown <?php /*echo esc_html($bar_type);*/?>">
                        <?php } else { ?>
                            <nav id="lvgshop-vertical-nav-menu" class="lvgshop-vertical-nav-dropdown <?php /*echo esc_html($bar_type);*/?>" style="display:none">
                        <?php } ?>

                            <?php get_template_part('template-parts/header/header-vertical-nav');?>
                        </nav>
                    </div>
                    <!-- navbar for desktop -->
                    <nav class="el-hm-one-nav lvgshop-m-menu left-side-position header-navigation text-center text-xl-start ur-navmenu d-none d-customL-block navbar navbar-expand-lg">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main',
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse venturi-m-menu',
                            'menu_class' => 'nav navbar-nav nav-style-megamenu',
                            'walker' => new WP_Bootstrap_Navwalker(),
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        ));
                        ?>
                    </nav>
                </div>
                <!-- contact info -->
                <div class="col-lg-4 col-xxl-4 d-flex justify-content-end">
                    <?php if ($phone_number) { ?>
                        <a class="add-hover me-4" href="tel:<?php echo esc_html($phone_number); ?>">
                          <span class="el3-header-info-box">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M19.5293 0.75C25.0808 1.3665 29.4668 5.7465 30.0893 11.298" stroke="#1F7F38"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M19.5293 6.06445C22.1858 6.58045 24.2618 8.65795 24.7793 11.3145" stroke="#1F7F38"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.5473 15.7086C20.5308 21.6905 21.8882 14.7701 25.6979 18.5772C29.3707 22.2491 31.4833 22.9848 26.8282 27.6371C26.2453 28.1055 22.5419 33.7414 9.5267 20.7295C-3.49011 7.716 2.14235 4.00867 2.61092 3.42592C7.27565 -1.23923 8.00023 0.884074 11.6731 4.55599C15.4812 8.36474 8.5638 9.72662 14.5473 15.7086Z"
                                        stroke="#1F7F38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            <span class="content-box add-hover">
                                <?php if ($phone_number_before_text) { ?>
                                    <span class="title"><?php echo esc_html($phone_number_before_text); ?></span>
                                <?php } ?>
                              <span class="subtitle"><?php echo esc_html($phone_number); ?></span>
                            </span>
                          </span>
                        </a>
                    <?php } ?>

                    <?php if ($opening_time) { ?>
                        <span class="el3-header-info-box">
                          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M28.875 15.001C28.875 22.6645 22.6635 28.876 15 28.876C7.3365 28.876 1.125 22.6645 1.125 15.001C1.125 7.33748 7.3365 1.12598 15 1.12598C22.6635 1.12598 28.875 7.33748 28.875 15.001Z"
                                  stroke="#1F7F38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.1472 19.4145L14.4922 16.041V8.77051" stroke="#1F7F38" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>

                          <span class="content-box">
                              <?php if ($opening_time_before_text) { ?>
                                  <span class="title"><?php echo esc_html($opening_time_before_text); ?></span>
                              <?php } ?>
                            <span class="subtitle"><?php echo esc_html($opening_time); ?></span>
                          </span>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header section end-->




<?php if ($sticky_enable== true){ ?>
<!--Sticky header section start-->
<div class="el_sticky_header sticky-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4">
                 <div class="logo-wrapper">
                    <?php if (is_array($sticky_logo) && !empty($sticky_logo['url'])) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($sticky_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } else { ?>
                       <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } ?>
                </div>
            </div>
            
            <div class="col-6 col-md-8">
                  <nav class="el-hm-one-nav lvgshop-m-menu right-side-position header-navigation text-center text-xl-start ur-navmenu d-none d-customL-block navbar navbar-expand-lg">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main',
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse venturi-m-menu',
                        'menu_class' => 'nav navbar-nav nav-style-megamenu',
                        'walker' => new WP_Bootstrap_Navwalker(),
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    ));
                    ?>
                </nav>
                
                 <!-- menu trigger -->
                <button class="sidebar-toggle-btn mobile-menu-toggle d-lg-none">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?php } ?>





