<?php
$main_logo = cs_get_option('main-logo');
$offcanvas_logo = cs_get_option('offcanvas-logo');
$mobile_logo = cs_get_option('mobile-logo');
$top_switcher = cs_get_option('style-one-top-header-switcher');
$top_announcement = cs_get_option('top-header-announcement');
$search_switcher = cs_get_option('style-one-search-switcher');
$store_location = cs_get_option('store_location');
$store_location_link = cs_get_option('store_location_link');
$phone_number = cs_get_option('phone_number');
$sticky_enable = cs_get_option('sticky_enable');
$sticky_logo = cs_get_option('sticky_logo');
global $current_user;

$nav_column = class_exists('Lvgshop_Core') ? "col-lg-6" : "col-lg-9";
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
        
        <ul class="nav nav-tabs" id="lvgshop_mobile_tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="lvgshop-main-menu-tab" data-bs-toggle="tab" data-bs-target="#lvgshop-main-menu" type="button" role="tab" aria-controls="lvgshop-main-menu" aria-selected="true"><?php esc_html_e('Menu','lvgshop');?></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="lvgshop-category-menu-tab" data-bs-toggle="tab" data-bs-target="#lvgshop-category-menu" type="button" role="tab" aria-controls="lvgshop-category-menu" aria-selected="false"><?php esc_html_e('Category','lvgshop');?></button>
          </li>
          
        </ul>
        <div class="tab-content" id="lvgshop_mobile_tabContent">
          <div class="tab-pane fade show active" id="lvgshop-main-menu" role="tabpanel" aria-labelledby="lvgshop-main-menu-tab">
                <?php
         if (has_nav_menu("mobile-menu")){
        wp_nav_menu(array(
            'theme_location' => 'mobile-menu',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'mobile-nav-menu',
            'container_id' => 'mayosis-sidemenu',
            'walker' => new Lvgshop_Accordion_Walker(),

        ));
         }
        ?>
          </div>
          <div class="tab-pane fade" id="lvgshop-category-menu" role="tabpanel" aria-labelledby="lvgshop-category-menu-tab">
              
               <?php
         if (has_nav_menu("mobile-category-menu")){
        wp_nav_menu(array(
            'theme_location' => 'mobile-category-menu',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'mobile-nav-menu',
            'container_id' => 'mayosis-sidemenu',
            'walker' => new Lvgshop_Accordion_Walker(),

        ));
         }
        ?>
          </div>
         
        </div>

<?php } else { ?>
        <?php
         if (has_nav_menu("mobile-menu")){
        wp_nav_menu(array(
            'theme_location' => 'mobile-menu',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'mobile-nav-menu',
            'container_id' => 'mayosis-sidemenu',
            'walker' => new Lvgshop_Accordion_Walker(),

        ));
         }
        ?>
<?php } ?>

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

        <?php if ($search_switcher){ ?>
        <!-- cate search option -->
        <div class="el-search-with-category-wrapper mt-30 px-3 mb-30 header_one_mobile_search">
            <?php
            if (function_exists('lvgshop_live_search')) {
                lvgshop_live_search();
            } ?>
        </div>
        <?php } ?>
    </div>
</div>
<!-- mobile menus  & categories start end -->

<!--header section start-->
<header>
    <?php if ($top_switcher) { ?>
        <!-- header top -->
        <div class="bg-blue lvgshop-header-top-one">
            <div class="el-top-header container container-xxxl">
                <?php if (!empty($top_announcement) ) { ?>
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
    <div class="el-middle-header container container-xxxl">
        <div class="row align-items-center px-2 px-md-0">
            <!-- logo:sm device -->
            <div class="col-5  col-lg-2 d-lg-block d-xl-none">
                <div class="logo-wrapper">
                    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="logo" class="img-fluid logo"></a>
                    <?php } ?>
                </div>
            </div>
            <!-- search bar with category -->
            <div class="d-none d-lg-block col-lg-5 col-xl-4">
                <?php if ($search_switcher){ ?>
                <div class="el-search-with-category-wrapper">
                    <?php
                    if (function_exists('lvgshop_live_search')) {
                        lvgshop_live_search();
                    } ?>
                </div>
                <?php } ?>
            </div>
            <!-- logo:lg -->
            <div class="d-none d-xl-block col-xl-4 col-xl-4">
                <div class="logo-wrapper">
                    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo" class="img-fluid logo"></a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="logo" class="img-fluid logo"></a>
                    <?php } ?>
                    <div class="logo-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" width="305" height="160" viewBox="0 0 305 160" fill="none">
                            <rect y="48" width="305" height="112" fill="#DBB500"/>
                            <path d="M0 160L78.3747 0H226.625L305 160H0Z" fill="#FFD612"/>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- info -->
            <div class="col-7  col-lg-5 col-xl-4 d-flex justify-content-end justify-content-lg-between el1-mobile-info-wrapper ">
                <?php if (class_exists('Lvgshop_Core')){ ?>
                <div class="info-box account-box me-2" id="account-box">
                    <div class="icon-wrapper">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M10.1004 11.2755C10.0837 11.2755 10.0587 11.2755 10.0421 11.2755C10.0171 11.2755 9.98372 11.2755 9.95872 11.2755C8.06706 11.2171 6.65039 9.74214 6.65039 7.92547C6.65039 6.07547 8.15872 4.56714 10.0087 4.56714C11.8587 4.56714 13.3671 6.07547 13.3671 7.92547C13.3587 9.75047 11.9337 11.2171 10.1254 11.2755C10.1087 11.2755 10.1087 11.2755 10.1004 11.2755ZM10.0004 5.80881C8.83372 5.80881 7.89206 6.75881 7.89206 7.91714C7.89206 9.0588 8.78372 9.98381 9.91706 10.0255C9.94206 10.0171 10.0254 10.0171 10.1087 10.0255C11.2254 9.96714 12.1004 9.05047 12.1087 7.91714C12.1087 6.75881 11.1671 5.80881 10.0004 5.80881Z"
                                    fill="#085330"/>
                            <path
                                    d="M9.99987 18.9586C7.75821 18.9586 5.61654 18.1253 3.95821 16.6086C3.80821 16.4753 3.74154 16.2753 3.75821 16.0836C3.86654 15.0919 4.48321 14.1669 5.50821 13.4836C7.99154 11.8336 12.0165 11.8336 14.4915 13.4836C15.5165 14.1753 16.1332 15.0919 16.2415 16.0836C16.2665 16.2836 16.1915 16.4753 16.0415 16.6086C14.3832 18.1253 12.2415 18.9586 9.99987 18.9586ZM5.06654 15.9169C6.44987 17.0753 8.19154 17.7086 9.99987 17.7086C11.8082 17.7086 13.5499 17.0753 14.9332 15.9169C14.7832 15.4086 14.3832 14.9169 13.7915 14.5169C11.7415 13.1503 8.26654 13.1503 6.19987 14.5169C5.60821 14.9169 5.21654 15.4086 5.06654 15.9169Z"
                                    fill="#085330"/>
                            <path
                                    d="M9.99935 18.9584C5.05768 18.9584 1.04102 14.9417 1.04102 10.0001C1.04102 5.05841 5.05768 1.04175 9.99935 1.04175C14.941 1.04175 18.9577 5.05841 18.9577 10.0001C18.9577 14.9417 14.941 18.9584 9.99935 18.9584ZM9.99935 2.29175C5.74935 2.29175 2.29102 5.75008 2.29102 10.0001C2.29102 14.2501 5.74935 17.7084 9.99935 17.7084C14.2493 17.7084 17.7077 14.2501 17.7077 10.0001C17.7077 5.75008 14.2493 2.29175 9.99935 2.29175Z"
                                    fill="#085330"/>
                        </svg>
                    </div>
                    <div class="d-none d-lg-flex flex-column">
                        <?php if (is_user_logged_in()) { ?>
                          <span class="subtitle"><?php _e('Hello', 'lvgshop'); ?></span>
                          <span class="title"><?php echo wp_kses_post($current_user->user_login);?></span>
                        <?php } else { ?>
                        <span class="subtitle"><?php _e('Sign in', 'lvgshop'); ?></span>
                        <span class="title"><?php _e('account', 'lvgshop'); ?></span>
                        <?php } ?>
                        
                    </div>
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
                <?php } ?>
                <?php
                if (class_exists('YITH_WCWL')) {
                    ?>
                    <div class="info-box me-2">
                        <div class="icon-wrapper position-relative">
                            <span class="wishlist-count icon-badge yith-wcwl-items-count">
                                <?php echo esc_html(yith_wcwl_count_all_products()); ?>
                            </span>
                            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="fs-sm fw-light text-uppercase">
                                <i class="ele-icon lvgshop-heart"></i>
                            </a>
                        </div>
                        <div class="d-none d-lg-flex flex-column">
                            <span class="subtitle"><?php _e('Wishlist', 'lvgshop'); ?></span>
                            <span class="title"><?php _e('My Items', 'lvgshop'); ?></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php if (class_exists('WooCommerce')) { ?>
                    <div class="info-box me-2">
                        <div class="icon-wrapper position-relative open-cart-drawer">
                        <span class="icon-badge" id="mini-cart-count">
                            <?php echo WC()->cart->get_cart_contents_count(); ?>
                        </span>
                            <a href="#">
                                <i class="ele-icon lvgshop-shopping-bag"></i>
                            </a>
                        </div>
                        <div class="d-none d-lg-flex flex-column">
                        <span class="subtitle">
                            <?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?>
                        </span>
                            <span class="title"><?php _e('Total', 'lvgshop'); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <!-- menu trigger -->
                <button class="sidebar-toggle-btn mobile-menu-toggle d-lg-none">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- header bottom -->
    <div class="el-header-btm d-none d-lg-block">
        <div class="container container-xxxl position-relative px-0">
            <div class="row align-items-center px-xl-0">
                <!-- location -->
                <div class="col-lg-3">
                    <?php if ($store_location) { ?>
                        <div class="location-wrapper">
                            <svg class="location-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9007 4.20209C14.5435 2.23786 12.3926 1.11108 9.99984 1.11108C7.6071 1.11108 5.45616 2.23786 4.09897 4.20209C2.74845 6.1564 2.43661 8.6306 3.26314 10.8165C3.48421 11.4135 3.83564 11.9934 4.30515 12.5369L9.52661 18.67C9.6447 18.8089 9.81772 18.8889 9.99984 18.8889C10.182 18.8889 10.355 18.8089 10.4731 18.67L15.6931 12.5386C16.1647 11.992 16.5156 11.4126 16.7349 10.8205C17.5631 8.6306 17.2512 6.1564 15.9007 4.20209ZM15.5708 10.3851C15.4018 10.842 15.1258 11.2937 14.7509 11.7282C14.7499 11.7292 14.7489 11.7303 14.748 11.7315L9.99984 17.3086L5.24873 11.728C4.87411 11.2939 4.5981 10.8423 4.42737 10.381C3.74383 8.5732 4.00324 6.52751 5.12151 4.90907C6.24328 3.28546 8.02147 2.35428 9.99984 2.35428C11.9782 2.35428 13.7562 3.28542 14.878 4.90907C15.9964 6.52751 16.2561 8.5732 15.5708 10.3851Z"
                                        fill="#085330"/>
                                <path
                                        d="M10.0001 4.79932C8.08077 4.79932 6.5191 6.36077 6.5191 8.28029C6.5191 10.1998 8.08056 11.7613 10.0001 11.7613C11.9196 11.7613 13.481 10.1998 13.481 8.28029C13.481 6.36098 11.9194 4.79932 10.0001 4.79932ZM10.0001 10.518C8.76619 10.518 7.7623 9.51414 7.7623 8.28025C7.7623 7.04637 8.76619 6.04248 10.0001 6.04248C11.234 6.04248 12.2379 7.04637 12.2379 8.28025C12.2379 9.51414 11.234 10.518 10.0001 10.518Z"
                                        fill="#085330"/>
                            </svg>
                            <?php if ($store_location_link){?>
                            <a href="<?php echo esc_url($store_location_link['url']); ?>" class="location-text" target="<?php echo esc_attr($store_location_link['target']); ?>"><?php echo esc_html($store_location); ?></a>
                        <?php } ?>
                        
                        </div>
                    <?php } ?>
                </div>
                <!-- navbar -->
                <div class="<?php echo esc_attr($nav_column); ?>">

                    <nav class="el-hm-one-nav lvgshop-m-menu header-navigation text-center text-xl-start ur-navmenu d-none d-customL-block navbar navbar-expand-lg">
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
                <!-- contact number -->
                <?php if ($phone_number) { ?>
                    <div class="col-lg-3 d-flex justify-content-end">
                        <div class="el-btn header-btn">
                            <svg class="grow-animation" width="19" height="19" viewBox="0 0 19 19" fill="none"
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
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0.667023 0.697754H17.7506V18.1017H0.667023V0.697754Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask1_200_213)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M2.63293 3.29686C2.63459 3.29686 2.59293 3.34101 2.54043 3.39364C2.33876 3.59315 1.92126 4.00828 1.91709 4.87676C1.91043 6.09162 2.69459 8.34729 6.47043 12.1931C10.2279 16.0201 12.4388 16.8283 13.6346 16.8283H13.6521C14.5046 16.8232 14.9113 16.3979 15.1071 16.1933C15.1663 16.1314 15.2146 16.0847 15.2488 16.0566C16.0796 15.2051 16.5046 14.5727 16.5004 14.166C16.4954 13.7517 15.9896 13.2627 15.2904 12.5844C15.0679 12.3696 14.8263 12.1345 14.5713 11.8747C13.9096 11.2032 13.5838 11.3178 12.8629 11.5759C11.8671 11.9316 10.5029 12.4189 8.37709 10.2515C6.25043 8.08581 6.72709 6.69607 7.07459 5.68072C7.32626 4.94723 7.44126 4.61359 6.78043 3.93952C6.52209 3.67634 6.28959 3.42675 6.07543 3.19753C5.41376 2.48951 4.93626 1.97759 4.53209 1.97164H4.52543C4.12626 1.97164 3.50626 2.40631 2.62876 3.30026C2.63126 3.29771 2.63209 3.29686 2.63293 3.29686V3.29686ZM13.6346 18.1018C11.5579 18.1018 8.85043 16.4174 5.58709 13.0938C2.31043 9.75655 0.654593 6.98981 0.667093 4.86997C0.674593 3.4692 1.39543 2.75183 1.66626 2.48271C1.68043 2.46489 1.72876 2.4165 1.74543 2.39952C2.94126 1.18127 3.76293 0.680384 4.54793 0.698212C5.47876 0.710947 6.14209 1.42152 6.98126 2.32056C7.18876 2.54214 7.41293 2.78409 7.66376 3.03878C8.87959 4.27825 8.53376 5.28936 8.25459 6.10096C7.95126 6.98642 7.68876 7.75047 9.26043 9.3516C10.8321 10.9527 11.5813 10.6853 12.4496 10.3737C13.2471 10.0902 14.2371 9.73533 15.4554 10.9748C15.7029 11.2269 15.9363 11.4528 16.1529 11.6625C17.0388 12.5216 17.7388 13.1999 17.7504 14.1507C17.7596 14.9606 17.2763 15.7875 16.0829 17.0032L15.5546 16.6382L16.0021 17.0822C15.7379 17.3581 15.0354 18.0933 13.6596 18.1018H13.6346Z"
                                          fill="#085330"/>
                                </g>
                            </svg>

                            <a href="tel:<?php echo esc_html($phone_number); ?>" class="btn-txt"><?php echo esc_html($phone_number); ?></a>
                        </div>
                    </div>
                <?php } ?>
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

<?php if (class_exists('Lvgshop_Core')){
 if (class_exists('WooCommerce')) {

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
<?php } }?>
