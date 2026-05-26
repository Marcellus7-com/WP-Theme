<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package lvgshop
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function lvgshop_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_filter('woocommerce_enqueue_styles', '__return_false');
}

add_action('after_setup_theme', 'lvgshop_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function lvgshop_woocommerce_scripts() {
    wp_enqueue_style('lvgshop-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

    wp_add_inline_style('lvgshop-woocommerce-style', $inline_font);
}

add_action('wp_enqueue_scripts', 'lvgshop_woocommerce_scripts');


/**
 * Locate a template and return the path for inclusion.
 *
 * @since 1.0.0
 */
function lvgshop_wc_locate_template($template, $template_name, $template_path) {
    global $woocommerce;

    $_template = $template;

    if (!$template_path) $template_path = $woocommerce->template_url;

    $theme_path = LVGSHOP_PATH . '/inc/vendor/woocommerce/';

    // Look within passed path within the theme - this is priority
    $template = locate_template(
        array(
            trailingslashit($template_path) . $template_name,
            $template_name
        )
    );

    // Modification: Get the template from this folder, if it exists
    if (!$template && file_exists($theme_path . $template_name))
        $template = $theme_path . $template_name;

    // Use default template
    if (!$template)
        $template = $_template;

    // Return what we found
    return $template;
}

function lvgshop_wc_locate_template_parts($template, $slug, $name) {
    $theme_path = LVGSHOP_PATH . '/inc/vendor/woocommerce/';
    if ($name) {
        $newpath = $theme_path . "{$slug}-{$name}.php";
    } else {
        $newpath = $theme_path . "{$slug}.php";
    }
    return file_exists($newpath) ? $newpath : $template;
}

add_filter('woocommerce_locate_template', 'lvgshop_wc_locate_template', 10, 3);
add_filter('wc_get_template_part', 'lvgshop_wc_locate_template_parts', 10, 3);
/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function lvgshop_woocommerce_active_body_class($classes) {
    $classes[] = 'woocommerce-active';

    return $classes;
}

add_filter('body_class', 'lvgshop_woocommerce_active_body_class');

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function lvgshop_woocommerce_products_per_page() {
    return 12;
}

add_filter('loop_shop_per_page', 'lvgshop_woocommerce_products_per_page');

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function lvgshop_woocommerce_thumbnail_columns() {
    return 4;
}

add_filter('woocommerce_product_thumbnails_columns', 'lvgshop_woocommerce_thumbnail_columns');

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function lvgshop_woocommerce_loop_columns() {
    return 3;
}

add_filter('loop_shop_columns', 'lvgshop_woocommerce_loop_columns');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function lvgshop_woocommerce_related_products_args($args) {
    $defaults = array(
        'posts_per_page' => 10,
        'columns' => 4,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}

add_filter('woocommerce_output_related_products_args', 'lvgshop_woocommerce_related_products_args');

if (!function_exists('lvgshop_woocommerce_product_columns_wrapper')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function lvgshop_woocommerce_product_columns_wrapper() {
        $columns = lvgshop_woocommerce_loop_columns();
        echo '<div class="columns-' . absint($columns) . '">';
    }
}
add_action('woocommerce_before_shop_loop', 'lvgshop_woocommerce_product_columns_wrapper', 40);

if (!function_exists('lvgshop_woocommerce_product_columns_wrapper_close')) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function lvgshop_woocommerce_product_columns_wrapper_close() {
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop', 'lvgshop_woocommerce_product_columns_wrapper_close', 40);

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('lvgshop_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function lvgshop_woocommerce_wrapper_before() {
        ?>
        <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'lvgshop_woocommerce_wrapper_before');

if (!function_exists('lvgshop_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function lvgshop_woocommerce_wrapper_after() {
        ?>
        </main><!-- #main -->
        </div><!-- #primary -->
        <?php
    }
}
add_action('woocommerce_after_main_content', 'lvgshop_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 */

if (!function_exists('lvgshop_refresh_mini_cart_count')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    add_filter('woocommerce_add_to_cart_fragments', 'lvgshop_refresh_mini_cart_count');
    function lvgshop_refresh_mini_cart_count($fragments) {
        ob_start();
        $items_count = WC()->cart->get_cart_contents_count();
        ?>
        <span class="icon-badge" id="mini-cart-count">
            <?php echo maybe_unserialize($items_count ? $items_count : '0'); ?>
        </span>
        <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
        return $fragments;
    }

}

if (!function_exists('lvgshop_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function lvgshop_woocommerce_cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php esc_attr_e('View your shopping cart', 'lvgshop'); ?>">
            <?php
            $item_count_text = sprintf(
            /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'lvgshop'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
            <span class="count"><?php echo esc_html($item_count_text); ?></span>
        </a>
        <?php
    }
}

if (!function_exists('lvgshop_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function lvgshop_woocommerce_header_cart() {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php lvgshop_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array(
                    'title' => '',
                );

                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
        <?php
    }
}


//==============================================================================
// Out of Stock
//==============================================================================
if (!function_exists('lvgshop_out_of_stock')) {

    function lvgshop_out_of_stock() {


        global $product;
        $out_of_stock = !$product->is_in_stock();
        if ($out_of_stock) { ?>
            <div class="lvgshop-out-of-stock-stacked"><?php _e('Out of stock', 'lvgshop'); ?></div>
        <?php }
    }
}
//==============================================================================
// LVG Shop by M7 Woo Normal Thumbnail
//==============================================================================
if (!function_exists('lvgshop_woo_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function lvgshop_woo_thumbnail() {

        if (has_post_thumbnail()) {

            the_post_thumbnail('full', true);


        }

    }
endif;
//==============================================================================
// LVG Shop by M7 Hover Thumbnail
//==============================================================================
if (!function_exists('lvgshop_woocommerce_get_alt_product_thumbnail')) {
    /**
     * Get Hover image for WooCommerce Grid
     */
    function lvgshop_woocommerce_get_alt_product_thumbnail() {


        global $product;
        $attachment_ids = $product->get_gallery_image_ids();
        $class = 'show-on-hover hide-for-small lvgshop-back-image';

        if ($attachment_ids) {
            $loop = 0;
            foreach ($attachment_ids as $attachment_id) {
                $image_link = wp_get_attachment_url($attachment_id);
                if (!$image_link) {
                    continue;
                }
                $loop++;
                echo apply_filters('lvgshop_woocommerce_get_alt_product_thumbnail',
                    wp_get_attachment_image($attachment_id, 'woocommerce_thumbnail', false, array('class' => $class)));
                if ($loop == 1) {
                    break;
                }
            }
        }
    }
}
add_action('lvgshop_woocommerce_shop_loop_images', 'lvgshop_woocommerce_get_alt_product_thumbnail', 11);
//add_action( 'lvgshop_woocommerce_shop_loop_images', 'lvgshop_woo_thumbnail', 11 );
/* Remove and add Product image */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('lvgshop_woocommerce_shop_loop_images', 'woocommerce_template_loop_product_thumbnail', 10);


if (class_exists('WPCleverWoosc')) {
    add_filter('woosc_button_position_archive', '__return_false');
    add_filter('woosc_button_position_single', '__return_false');
}

//==============================================================================
// Add Wishlist Icon in Product Card
//==============================================================================

function lvgshop_wishlist_icon_in_product_grid() {
    if (class_exists('YITH_WCWL')) :
        global $product;
        ?>

        <a href="<?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id()) ? esc_url(YITH_WCWL()->get_wishlist_url()) : esc_url(add_query_arg('add_to_wishlist', $product->get_id())); ?>"
           data-product-id="<?php echo esc_attr($product->get_id()); ?>"
           data-product-type="<?php echo esc_attr($product->get_type()); ?>"
           data-wishlist-url="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"
           data-browse-wishlist-text="<?php echo esc_attr(get_option('yith_wcwl_browse_wishlist_text')); ?>"
           class="button lvgshop_product_wishlist_button <?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id()) ? 'clicked added' : 'add_to_wishlist'; ?>"
           rel="nofollow" data-toggle="tooltip">
        </a>

    <?php
    endif;
}


//==============================================================================
// Add Compare Icon in Product Card
//==============================================================================

function lvgshop_compare_icon_in_product_card() {


    ?>


    <?php
    if (class_exists('YITH_Woocompare')) :
        global $product, $yith_woocompare;

        $productId = $product->get_id();


        if (!isset($button_text) || $button_text == 'default') {
            $button_text = get_option('yith_woocompare_button_text', __('Compare', 'lvgshop'));
            do_action('wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text);
            $button_text = apply_filters('wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text');
        }
        ?>
        <div class="woocommerce product compare-button">
            <a href="<?php echo esc_url(home_url()); ?>?action=yith-woocompare-add-product&id=<?php echo esc_html($productId); ?>"
               class="compare button" data-product_id="<?php echo esc_html($productId); ?>" rel="nofollow"><i
                        class="ri-repeat-2-line"></i>
                <span class="tooltip left">
				                    <?php esc_attr($button_text); ?>
				                    </span>

            </a>
        </div>

    <?php endif; ?>

    <?php
    if (class_exists('WPCleverWoosc')) {
        global $product;
        $productId = $product->get_id();
        $comparetxt = cs_get_option('lvgshop_compare_text');
        ?>
        <div class="woocommerce product compare-button woosc-compare-button">

            <a href="#" class="compare button woosc-btn woosc-btn-<?php echo esc_html($productId); ?>"
               data-id="<?php echo esc_html($productId); ?>" rel="nofollow"><i class="ri-repeat-2-line"></i>


            </a>
            <span class="tooltip left">
				                    <?php echo esc_html($comparetxt); ?>
				                    </span>
        </div>

    <?php } ?>

    <?php

}

//==============================================================================
// Add Quick view Icon in Product Card
//==============================================================================

if (!function_exists('lvgshop_add_quick_view_card')):
    function lvgshop_add_quick_view_card() {

        do_action('lvgshop_add_quick_view_action');

    }
endif;


//==============================================================================
// Add Product cart Icon in Product Card
//==============================================================================

function lvgshop_product_cart_card() {
    global $product;
    $productId = $product->get_id();
    $args = "";
    ?>
    <?php echo apply_filters('woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
        sprintf('<a href="%s" data-quantity="%s" class="%s lvgshop-grid-quick-view-btn add_to_cart_button ajax_add_to_cart" %s><i class="ri-shopping-cart-line"></i> <span class="tooltip left">
				                    %s
				                    </span></a>',
            esc_url($product->add_to_cart_url()),
            esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
            esc_attr(isset($args['class']) ? $args['class'] : 'button'),
            isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
            esc_html($product->add_to_cart_text())
        ),
        $product, $args);

    ?>


    <?php

}

// Product Grid Ajax Cart

function lvgshop_product_add_to_cart_sm_btn_action($post, $product, $nonce, $icon_class = 'ele-icon lvgshop-shopping-bag') {
    ?>
    <div class="">
        <?php
        $add_link = admin_url('admin-ajax.php?action=lvgshop_product_add&id=' . $post->ID . '&nonce=' . $nonce);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail', true);
        if ($image) {
            $image = $image[0];
        }
        if ($product->is_type('external')) {
            $product_url = $product->add_to_cart_url();
            $button_text = $product->single_add_to_cart_text();
            ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($button_text); ?>" href="<?php echo esc_url($product_url); ?>" class="add-to-cart-btn lvgshop-add-to-cart" data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>">
                <i class="btn-icon <?php echo esc_attr($icon_class); ?>"></i></a>
            <?php
        } elseif ($product->is_type('variable')) {
            ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__('View product', 'lvgshop'); ?>" href="<?php echo get_the_permalink(); ?>" class="add-to-cart-btn lvgshop-add-to-cart" data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>"><span class="tooltip-text">Add To Cart</span><i class="btn-icon"></i></a>
            <?php
        } elseif (($product->get_stock_status() == 'outofstock') || ($product->get_stock_quantity() && $product->get_stock_quantity() == 0)) { ?>
        <span data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__('Out of stock', 'lvgshop'); ?>" class="add-to-cart-btn lvgshop-add-to-cart"><i class="btn-icon <?php echo esc_attr($icon_class); ?>"></i></span><?php
        } else { ?>
            <a href="#" data-link="<?php echo esc_attr($add_link); ?>" class="add-to-cart-btn lvgshop-add-to-cart" data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>">
                <i class="btn-icon <?php echo esc_attr($icon_class); ?> "></i>
            </a>
            <?php
        }
        ?>
    </div>

    <?php

}

add_action('lvgshop_product_add_to_cart_sm_btn', 'lvgshop_product_add_to_cart_sm_btn_action', 10, 4);


function lvgshop_product_add_to_cart_with_text($post, $product, $nonce, $in_anchor_class = 'add-to-cart-btn', $icon_class = 'ele-icon lvgshop-arrow-right', $icon_show = true) {
    ?>
    <div class="lvgshop_product_style">
        <?php
        $add_link = admin_url('admin-ajax.php?action=lvgshop_product_add&id=' . $post->ID . '&nonce=' . $nonce);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail', true);
        if ($image) {
            $image = $image[0];
        }
        if ($product->is_type('external')) {
            $product_url = $product->add_to_cart_url();
            $button_text = $product->single_add_to_cart_text();
            ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($button_text); ?>" href="<?php echo esc_url($product_url); ?>" class="<?php echo esc_attr($in_anchor_class); ?> " data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>">
                Add To Cart
                <i class="btn-icon <?php echo esc_attr($icon_class); ?> "></i>
            </a>
            <?php
        } elseif ($product->is_type('variable')) {
            ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__('View product', 'lvgshop'); ?>" href="<?php echo get_the_permalink(); ?>" class="<?php echo esc_attr($in_anchor_class); ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>">
                Add To Cart <i class="btn-icon text-18 <?php echo esc_attr($icon_class); ?> lvgshop-icon-shopping-bag-2 align-self-center ri-handbag-line"></i>
            </a>
            <?php
        } elseif (($product->get_stock_status() == 'outofstock') || ($product->get_stock_quantity() && $product->get_stock_quantity() == 0)) {
            ?>
            <span data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__('Out of stock', 'lvgshop'); ?>" class="<?php echo esc_attr($in_anchor_class); ?>">
                <i class="btn-icon <?php echo esc_attr($icon_class); ?> "></i>
            </span>
            <?php
        } else { ?>
            <a href="#" data-link="<?php echo esc_attr($add_link); ?>" class="add-to-cart-btn lvgshop-add-to-cart <?php echo esc_attr($in_anchor_class); ?>" data-product_id="<?php echo esc_attr($post->ID); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>" data-img="<?php echo esc_attr($image); ?>">
                Add To Cart
                <?php if ($icon_show) { ?>
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                <?php } ?>
            </a>
            <?php
        }
        ?>
    </div>

    <?php

}

add_action('lvgshop_product_add_to_cart_with_text', 'lvgshop_product_add_to_cart_with_text', 10, 6);


add_action('wp_ajax_lvgshop_product_add', 'lvgshop_product_add');
add_action('wp_ajax_nopriv_lvgshop_product_add', 'lvgshop_product_add');
function lvgshop_product_add() {
// if ( !wp_verify_nonce( $_REQUEST['nonce'], "product_nonce")) {
// 	exit("Verification error, please try again!");
// }
    if (empty($_REQUEST['id'])) {
        exit('Error: Product ID is missing!');
    }
    if (class_exists('WooCommerce')) {
        echo WC()->cart->add_to_cart($_REQUEST['id']);
    }
    echo 'OK';
    wp_die();
}

add_action('wp_ajax_lvgshop_close_banner', 'lvgshop_close_banner');
add_action('wp_ajax_nopriv_lvgshop_close_banner', 'lvgshop_close_banner');
function lvgshop_close_banner() {
// if ( !wp_verify_nonce( $_REQUEST['nonce'], "close_banner")) {
// 	exit("Verification error, please try again!");
// }
    setcookie('lvgshop_close_banner', lvgshop_get_option('banner-id'), time() * 40, '/');
    wp_die();
}

function lvgshop_show_banner() {
    $id = lvgshop_get_option('banner-id');
    if (isset($_COOKIE['lvgshop_close_banner'])) {
        if ($_COOKIE['lvgshop_close_banner'] == $id) {
            return false;
        }
    }
    return true;
}


//==============================================================================
// Remove WooCommerce product and WordPress page results from the search form widget
//==============================================================================
function lvgshop_modify_search_result($query) {
    // Make sure this isn't the admin or is the main query
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Make sure this isn't the WooCommerce product search form
    if (isset($_GET['post_type']) && ($_GET['post_type'] == 'product')) {
        return;
    }

    if ($query->is_search()) {
        $in_search_post_types = get_post_types(array('exclude_from_search' => false));

        // The post types you're removing (example: 'product' and 'page')
        $post_types_to_remove = array('product');

        foreach ($post_types_to_remove as $post_type_to_remove) {
            if (is_array($in_search_post_types) && in_array($post_type_to_remove, $in_search_post_types)) {
                unset($in_search_post_types[$post_type_to_remove]);
                $query->set('post_type', $in_search_post_types);
            }
        }
    }

}

add_action('pre_get_posts', 'lvgshop_modify_search_result');


// Product review Star Reting Founction
add_action('woocommerce_after_shop_loop_item', 'lvgshop_get_star_rating');
function lvgshop_get_star_rating($r_count = '') {
    global $woocommerce, $product;
    $average = $product->get_average_rating();

    echo '<div class="star-rating"> ' . $r_count . ' <span style="width:' . (($average / 5) * 100) . '%"><strong class="rating">' . $average . '</strong> ' . __('out of 5', 'lvgshop') . '</span></div>';
}


remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function lvgshop_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
}

add_filter('get_the_archive_title', 'lvgshop_archive_title');

/*** Tiny Cart ***/
if (!function_exists('lvgshop_tiny_cart')) {
    function lvgshop_tiny_cart($show_cart_control = true, $show_cart_dropdown = true) {
        if (!class_exists('WooCommerce')) {
            return '';
        }
        $cart_empty = WC()->cart->is_empty();
        $cart_url = wc_get_cart_url();
        $checkout_url = wc_get_checkout_url();
        $cart_number = WC()->cart->get_cart_contents_count();
        ob_start();
        ?>
        <div class="ts-tiny-cart-wrapper cart-list">
            <?php if ($show_cart_control): ?>
                <div class="cart-icon">
                    <a class="cart-control" href="<?php echo esc_url($cart_url); ?>"
                       title="<?php esc_attr_e('View your shopping cart', 'lvgshop'); ?>">
                        <span class="ic-cart"></span>
                    </a>

                    <?php if ($show_cart_dropdown): ?>
                        <span class="cart-drop-icon drop-icon"></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($show_cart_dropdown): ?>
                <div class="cart-dropdown-form dropdown-container woocommerce">
                    <div class="form-content">
                        <?php if ($cart_empty): ?>

                            <label><?php esc_html_e('Your cart is currently empty', 'lvgshop'); ?></label>
                        <?php else: ?>

                            <div class="cart-wrapper">
                                <div class="cart-content">
                                    <ul class="cart_list">
                                        <?php
                                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
                                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                            if (!($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key))) {
                                                continue;
                                            }
                                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);

                                            ?>
                                            <li class="woocommerce-mini-cart-item">

                                                <div class="woo-min-thumbs">
                                                    <a class="thumbnail"
                                                       href="<?php echo esc_url($product_permalink); ?>">
                                                        <?php echo apply_filters('min-cart-image-thumbnail', $_product->get_image(), $cart_item, $cart_item_key); ?>
                                                    </a>

                                                    <?php echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-cart_item_key="%s"><i class="fas fa-xmark"></i></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_html__('Remove this item', 'lvgshop'), $cart_item_key), $cart_item_key); ?>
                                                </div>
                                                <div class="cart-item-wrapper">
                                                    <h3 class="product-name">
                                                        <a href="<?php echo esc_url($product_permalink); ?>">
                                                            <?php echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key); ?>
                                                        </a>
                                                    </h3>
                                                    <span class="min-unit-price"><?php esc_html_e('Unit Price: ', 'lvgshop'); ?><?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?></span>

                                                    <div class="mini-cart-qntt-box">
                                                        <?php
                                                        if ($_product->is_sold_individually()) {
                                                            $product_quantity = '<span class="quantity">1</span>';
                                                        } else {
                                                            $product_quantity = woocommerce_quantity_input(array(
                                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                                'input_value' => $cart_item['quantity'],
                                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                                'min_value' => '0',
                                                                'product_name' => $_product->get_name()
                                                            ), $_product, false);
                                                        }

                                                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                                        ?>
                                                    </div>


                                                </div>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="dropdown-footer">
                                        <div class="total"><span
                                                    class="total-title primary-text"><?php esc_html_e('Subtotal : ', 'lvgshop'); ?></span><?php echo WC()->cart->get_cart_subtotal(); ?>
                                        </div>
                                        <div class="mini-cart-btn-set-veg">
                                            <a href="<?php echo esc_url($cart_url); ?>"
                                               class="button view-cart"><?php esc_html_e('View Cart', 'lvgshop'); ?></a>
                                            <a href="<?php echo esc_url($checkout_url); ?>"
                                               class="button checkout-button"><?php esc_html_e('Checkout', 'lvgshop'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

add_filter('woocommerce_add_to_cart_fragments', 'lvgshop_tiny_cart_filter');
function lvgshop_tiny_cart_filter($fragments) {

    $fragments['.ts-tiny-cart-wrapper'] = lvgshop_tiny_cart(false, true);

    return $fragments;
}

add_action('wp_ajax_lvgshop_update_cart_quantity', 'lvgshop_update_cart_quantity');
add_action('wp_ajax_nopriv_lvgshop_update_cart_quantity', 'lvgshop_update_cart_quantity');
function lvgshop_update_cart_quantity() {
    if (isset($_POST['cart_item_key'], $_POST['qty'])) {
        $cart_item_key = $_POST['cart_item_key'];
        $qty = $_POST['qty'];
        $cart = WC()->cart->get_cart();
        if (isset($cart[$cart_item_key])) {
            $qty = apply_filters('woocommerce_stock_amount_cart_item', wc_stock_amount(preg_replace('/[^0-9\.]/', '', $qty)), $cart_item_key);
            if (!($qty === '' || $qty === $cart[$cart_item_key]['quantity'])) {
                if (!($cart[$cart_item_key]['data']->is_sold_individually() && $qty > 1)) {
                    WC()->cart->set_quantity($cart_item_key, $qty, false);
                    $cart_updated = apply_filters('woocommerce_update_cart_action_cart_updated', true);
                    if ($cart_updated) {
                        WC()->cart->calculate_totals();
                    }
                }
            }
        }
        WC_AJAX::get_refreshed_fragments();
    }
}


//==============================================================================
// Add Compare Icon in Product Card
//==============================================================================

function lvgshop__compare_icon_in_product_card() {

    if (class_exists('YITH_Woocompare')) :
        global $product, $yith_woocompare;
        $productId = $product->get_id();
        if (!isset($button_text) || $button_text == 'default') {
            $button_text = get_option('yith_woocompare_button_text', __('Compare', 'lvgshop'));
            do_action('wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text);
            $button_text = apply_filters('wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text');
        }
        ?>
        <div class="woocommerce product compare-button">
            <a href="<?php echo esc_url(home_url()); ?>?action=yith-woocompare-add-product&id=<?php echo esc_html($productId); ?>"
               class="compare button" data-product_id="<?php echo esc_html($productId); ?>" rel="nofollow"><i class="ri-arrow-left-right-line"></i>
                <span class="tooltip left">
                    <?php echo esc_html('Compare', 'lvgshop'); ?>
                </span>
            </a>
        </div>

    <?php endif; ?>

    <?php
    if (class_exists('WPCleverWoosc')) {
        global $product;
        $productId = $product->get_id();
        $productId = $product->get_id();
        $comparetxt = cs_get_option('nikstore_compare_text');
        ?>
        <div class="woocommerce product compare-button woosc-compare-button">
            <a href="#" class="compare button woosc-btn woosc-btn-<?php echo esc_html($productId); ?>"
               data-id="<?php echo esc_html($productId); ?>" rel="nofollow">
            </a>
        </div>
    <?php } ?>

    <?php

}


function lvgshop_compare_icon_in_product_list() {


    ?>


    <?php
    if (class_exists('YITH_Woocompare')) :
        global $product, $yith_woocompare;

        $productId = $product->get_id();


        if (!isset($button_text) || $button_text == 'default') {
            $button_text = get_option('yith_woocompare_button_text', __('Compare', 'lvgshop'));
            do_action('wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text);
            $button_text = apply_filters('wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text');
        }
        ?>
        <div class="woocommerce product compare-button">
            <a href="<?php echo esc_url(home_url()); ?>?action=yith-woocompare-add-product&id=<?php echo esc_html($productId); ?>"
               class="compare button" data-product_id="<?php echo esc_html($productId); ?>" rel="nofollow"><i
                        class="ri-repeat-2-line"></i>
                <span class="nick-compare-txt">
				                    <?php echo esc_html('Compare', 'lvgshop'); ?>
				                    </span>

            </a>
        </div>

    <?php endif; ?>

    <?php
    if (class_exists('WPCleverWoosc')) {
        global $product;
        $productId = $product->get_id();
        $comparetxt = cs_get_option('nikstore_compare_text');
        ?>
        <div class="woocommerce product compare-button woosc-compare-button">

            <a href="#"
               class="nikstore__list-style-compare-btn compare button woosc-btn woosc-btn-<?php echo esc_html($productId); ?>"
               data-id="<?php echo esc_html($productId); ?>" rel="nofollow"><i class="ri-repeat-2-line"></i>

                <span class="nick-compare-txt">
				                    <?php echo esc_html($comparetxt); ?>
				                    </span>
            </a>

        </div>

    <?php } ?>

    <?php

}

add_action('woocommerce_after_shop_loop_item_title', 'bbloomer_shop_product_short_description', 1, 2);

function bbloomer_shop_product_short_description() {
    the_excerpt();
}


add_filter('woocommerce_description', 'limit_woocommerce_description', 10, 1);
function limit_woocommerce_short_description($post_excerpt) {
    if (!is_product()) {
        $pieces = explode(" ", $post_excerpt);
        $post_excerpt = implode(" ", array_splice($pieces, 0, 20));

    }
    return $post_excerpt;
}