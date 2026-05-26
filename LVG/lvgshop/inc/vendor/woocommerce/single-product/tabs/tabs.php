<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());
$product_tab_style = cs_get_option('product-info-style');
?>
<?php if ($product_tab_style == 'style-2') {
    ?>
    <!--pd-accordion start-->
    <section class="pd-accordion-section pt-100 pb-140 bg-white overflow-hidden">
        <div class="container">
            <div class="accrodion pd-accordion" id="pd_accordion">
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <?php if ($key == 'description') {
                        $linactiv = 'show';
                    } else {
                        $linactiv = '';
                        $class_clopsed = 'collapsed';
                    } ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <a href="#<?php echo esc_attr($key); ?>" data-bs-toggle="collapse"
                               class="<?php echo esc_attr($class_clopsed); ?>"><h5
                                        class="mb-0 fw-semibold"><?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?></h5>
                            </a>
                        </div>
                        <div class="accordion-collapse collapse <?php echo esc_attr($linactiv); ?>"
                             id="<?php echo esc_attr($key); ?>" data-bs-parent="#pd_accordion">
                            <div class="accordion-body">
                                <?php
                                if (isset($product_tab['callback'])) {
                                    call_user_func($product_tab['callback'], $key, $product_tab);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--pd-accordion end-->
    <?php
} else {
    ?>
    <div class="main-details-des-review-tab-section pb-100 wow fadeInUp">
        <div class="container container-xxxl">
            <div class="single-product-tab">
                <div class="divider"></div>
                <ul class="nav des-review-navbar mb-40" id="myTab2" role="tablist">
                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                        <?php if ($key == 'description') {
                            $linactiv = 'active';
                        } else {
                            $linactiv = '';
                        } ?>
                        <li class="nav-item" role="presentation">
                            <a href="#tab-<?php echo esc_attr($key); ?>" id="tab-id-<?php echo esc_attr($key); ?>"
                               data-bs-toggle="tab" class="<?php echo esc_attr($linactiv); ?> nav-link">
                                <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab-content mt-32">
                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                        <?php if ($key == 'description') {
                            $linactiv = 'show active';
                        } else {
                            $linactiv = '';
                        } ?>
                        <div class="tab-pane fade <?php echo esc_attr($linactiv); ?>"
                             id="tab-<?php echo esc_attr($key); ?>" role="tabpanel">
                            <?php
                            if (isset($product_tab['callback'])) {
                                call_user_func($product_tab['callback'], $key, $product_tab);
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--trending products section start-->
                <?php  woocommerce_output_related_products(); ?>
    <!--trending products section end-->
<?php
}
?>

