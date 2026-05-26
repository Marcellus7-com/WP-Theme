<?php

$main_logo = cs_get_option('main-logo');
$offcanvas_logo = cs_get_option('offcanvas-logo');
$mobile_logo = cs_get_option('mobile-logo');
$top_switcher = cs_get_option('style-one-top-header-switcher');
$top_announcement = cs_get_option('style-two-top-announcement');
$searh_swither = cs_get_option('style-one-search-switcher');
$phone_number = cs_get_option('phone_number');
$style_two_category_nav = cs_get_option('style-two-category-nav');
$search_switcher = cs_get_option('style-one-search-switcher');
$sticky_enable = cs_get_option('sticky_enable');
$sticky_logo = cs_get_option('sticky_logo');
?>
<!-- mobile menus  & categories start -->
<div class="el-mobile-menu-and-category-sidebar">
    <a href="javascript:void(0)" class="mobile-menu-close close"><i class="fas fa-xmark"></i></a>
    <div class="mobile-menu el-mobile-menu-wrapper">
        <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo mt-60 mb-20">
                <img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid">
            </a>
        <?php } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo mt-60 mb-20">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="logo" class="img-fluid">
            </a>
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
</div>
<!-- mobile menus  & categories start end -->

<?php
if ($search_switcher) {
    if (function_exists('lvgshop_live_search')) {
        lvgshop_live_search();
    }
}
?>


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

<?php if ($top_switcher) { ?>
    <!--ticker section start-->
    <div class="el2-ticker-area overflow-hidden">
        <div class="el2-ticker-wrapper secondary-bg-color">
            <div class="el2-ticker">
                <?php if (!empty($top_announcement) && is_array($top_announcement)) { ?>
                    <?php
                    foreach ($top_announcement as $item) {
                        ?>
                        <span class="text-white"><?php _e($item['top-header-announcement-style-two'], 'lvgshop'); ?></span>
                        <?php
                    }
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--ticker section end-->
<?php } ?>

<!--header section start-->
<header class="el2-header-section bg-white ptb-5">
    <div class="container-1440 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-5 d-none d-lg-block">
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
            <div class="col-lg-2 col-5">
                <div class="text-xl-center">
                    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="logo" class="img-fluid logo"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-5 col-7">
                <div class="el2-header-right d-flex align-items-center justify-content-end pe-2">
                    <div class="el2-header-search d-none d-lg-block">
                        <button type="button" class="el2-header-search-toggle">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M22.0004 22.7504C21.9019 22.7506 21.8043 22.7313 21.7133 22.6935C21.6223 22.6558 21.5397 22.6003 21.4704 22.5304L18.2504 19.3104C18.1179 19.1682 18.0458 18.9801 18.0492 18.7858C18.0526 18.5915 18.1313 18.4062 18.2687 18.2687C18.4062 18.1313 18.5915 18.0526 18.7858 18.0492C18.9801 18.0458 19.1682 18.1179 19.3104 18.2504L22.5304 21.4704C22.6351 21.5753 22.7064 21.7088 22.7353 21.8542C22.7642 21.9996 22.7494 22.1503 22.6927 22.2873C22.6359 22.4243 22.5399 22.5413 22.4167 22.6238C22.2935 22.7062 22.1486 22.7502 22.0004 22.7504V22.7504Z"
                                        fill="#085330"/>
                                <path
                                        d="M11.0002 20.7502C9.07188 20.7502 7.18682 20.1784 5.58344 19.1071C3.98006 18.0357 2.73038 16.513 1.99242 14.7314C1.25447 12.9498 1.06139 10.9894 1.43759 9.09812C1.8138 7.2068 2.7424 5.46952 4.10596 4.10596C5.46952 2.7424 7.2068 1.8138 9.09812 1.43759C10.9894 1.06139 12.9498 1.25447 14.7314 1.99242C16.513 2.73038 18.0357 3.98006 19.1071 5.58344C20.1784 7.18682 20.7502 9.07188 20.7502 11.0002C20.7473 13.5852 19.7192 16.0635 17.8913 17.8913C16.0635 19.7192 13.5852 20.7473 11.0002 20.7502V20.7502ZM11.0002 2.75025C9.36855 2.75025 7.7735 3.2341 6.41679 4.14062C5.06009 5.04715 4.00267 6.33562 3.37824 7.84311C2.75382 9.3506 2.59044 11.0094 2.90877 12.6097C3.2271 14.2101 4.01283 15.6801 5.16662 16.8339C6.3204 17.9877 7.79041 18.7734 9.39075 19.0917C10.9911 19.4101 12.6499 19.2467 14.1574 18.6223C15.6649 17.9978 16.9534 16.9404 17.8599 15.5837C18.7664 14.227 19.2502 12.6319 19.2502 11.0002C19.2479 8.81294 18.3779 6.71591 16.8312 5.16925C15.2846 3.62259 13.1876 2.75263 11.0002 2.75025V2.75025Z"
                                        fill="#085330"/>
                            </svg>
                        </button>
                    </div>
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
                        <div class="el2-header-wishlist position-relative">
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
</header>
<!--header section end-->

<!-- desktop category navbar start-->
<div class="el2-category-navbar bg-white d-none d-lg-block">
    <div class="container-1440 position-relative">
        <div class="btm-bar-header">
            <ul class="menu-bar">
                <?php
                if ($style_two_category_nav && is_array($style_two_category_nav)) {
                    foreach ($style_two_category_nav as $item) {
                        ?>
                        <li>
                            <a class="main-link" href="<?php echo esc_url($item['category_nav_link']['url']); ?>">
                                <i class="<?php echo esc_attr($item['category_nav_icon']); ?> cate-icon"></i>
                                <?php _e($item['category_nav_text'], 'lvgshop'); ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <?php if ($phone_number) { ?>
                <div class="header-btn d-none d-xl-flex align-items-center">
                    <svg class="grow-animation me-2" width="19" height="19" viewBox="0 0 19 19" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_200_213" style="mask-type: luminance;" maskUnits="userSpaceOnUse" x="10" y="0" width="9"
                              height="8">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9617 0.697998H18.0775V7.94197H10.9617V0.697998Z"
                                  fill="white"/>
                        </mask>
                        <g mask="url(#mask0_200_213)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M17.4523 7.94197C17.1381 7.94197 16.8681 7.70171 16.8323 7.37656C16.5164 4.51049 14.3314 2.28623 11.5173 1.96788C11.1748 1.92882 10.9273 1.61471 10.9656 1.26494C11.0031 0.916021 11.3089 0.658788 11.6556 0.702934C15.0539 1.08751 17.6931 3.77275 18.0739 7.23394C18.1123 7.58371 17.8656 7.89867 17.5231 7.93772C17.4998 7.94027 17.4756 7.94197 17.4523 7.94197"
                                  fill="#085330"/>
                        </g>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M14.5022 7.95124C14.2088 7.95124 13.948 7.7407 13.8897 7.43678C13.6497 6.18033 12.6988 5.21167 11.4672 4.96802C11.128 4.90095 10.9072 4.56731 10.973 4.22179C11.0388 3.87627 11.3722 3.65044 11.7055 3.71836C13.4397 4.06134 14.7788 5.42476 15.1163 7.19228C15.1822 7.53865 14.9613 7.87229 14.623 7.93936C14.5822 7.947 14.5422 7.95124 14.5022 7.95124"
                              fill="#085330"/>
                        <mask id="mask1_200_213" style="mask-type: luminance;" maskUnits="userSpaceOnUse" x="0" y="0" width="18"
                              height="19">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.667023 0.697754H17.7506V18.1017H0.667023V0.697754Z"
                                  fill="white"/>
                        </mask>
                        <g mask="url(#mask1_200_213)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.63293 3.29686C2.63459 3.29686 2.59293 3.34101 2.54043 3.39364C2.33876 3.59315 1.92126 4.00828 1.91709 4.87676C1.91043 6.09162 2.69459 8.34729 6.47043 12.1931C10.2279 16.0201 12.4388 16.8283 13.6346 16.8283H13.6521C14.5046 16.8232 14.9113 16.3979 15.1071 16.1933C15.1663 16.1314 15.2146 16.0847 15.2488 16.0566C16.0796 15.2051 16.5046 14.5727 16.5004 14.166C16.4954 13.7517 15.9896 13.2627 15.2904 12.5844C15.0679 12.3696 14.8263 12.1345 14.5713 11.8747C13.9096 11.2032 13.5838 11.3178 12.8629 11.5759C11.8671 11.9316 10.5029 12.4189 8.37709 10.2515C6.25043 8.08581 6.72709 6.69607 7.07459 5.68072C7.32626 4.94723 7.44126 4.61359 6.78043 3.93952C6.52209 3.67634 6.28959 3.42675 6.07543 3.19753C5.41376 2.48951 4.93626 1.97759 4.53209 1.97164H4.52543C4.12626 1.97164 3.50626 2.40631 2.62876 3.30026C2.63126 3.29771 2.63209 3.29686 2.63293 3.29686V3.29686ZM13.6346 18.1018C11.5579 18.1018 8.85043 16.4174 5.58709 13.0938C2.31043 9.75655 0.654593 6.98981 0.667093 4.86997C0.674593 3.4692 1.39543 2.75183 1.66626 2.48271C1.68043 2.46489 1.72876 2.4165 1.74543 2.39952C2.94126 1.18127 3.76293 0.680384 4.54793 0.698212C5.47876 0.710947 6.14209 1.42152 6.98126 2.32056C7.18876 2.54214 7.41293 2.78409 7.66376 3.03878C8.87959 4.27825 8.53376 5.28936 8.25459 6.10096C7.95126 6.98642 7.68876 7.75047 9.26043 9.3516C10.8321 10.9527 11.5813 10.6853 12.4496 10.3737C13.2471 10.0902 14.2371 9.73533 15.4554 10.9748C15.7029 11.2269 15.9363 11.4528 16.1529 11.6625C17.0388 12.5216 17.7388 13.1999 17.7504 14.1507C17.7596 14.9606 17.2763 15.7875 16.0829 17.0032L15.5546 16.6382L16.0021 17.0822C15.7379 17.3581 15.0354 18.0933 13.6596 18.1018H13.6346Z"
                                  fill="#085330"/>
                        </g>
                    </svg>

                    <a href="tel:<?php echo esc_html($phone_number); ?>" class="btn-txt"><?php echo esc_html($phone_number); ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- desktop category navbar end-->


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
