<?php
global $product, $post;

$opt_select_reapter_styles = cs_get_option('single_product_sidebar_box');
$bn_bg = cs_get_option('banner-right-text-bg');
$bn_bg_img = $bn_bg['url'];
$bn_sub_tx = cs_get_option('banner-right-text');
$bn_main_ti = cs_get_option('banner-right-main-title');
$bn_main_price = cs_get_option('banner-right-main-price');
$bn_main_link = cs_get_option('banner-right-main-link');

//?>
<!-- shipping sidebar widget -->
<?php
if ($opt_select_reapter_styles) {
    ?>
    <ul class="shipping-sidebar-widget theme-border-1 wow fadeInUp">
        <?php
        foreach ($opt_select_reapter_styles as $item) {
            ?>
            <li>
                <img class="fea-icon" src="<?php echo esc_url($item['single_product_sidebar_box_icon_image']['url']); ?>" alt="">
                <div class="right-side">
                    <span class="title"><?php echo esc_html($item['single_product_sidebar_box_heading']) ?></span>
                    <span class="subtitle"><?php echo esc_html($item['single_product_sidebar_box_text']) ?></span>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>

<!-- banner widget -->
<div class="sidebar-banner-widget-3 mt-30 wow fadeInUp">
    <a href="shop-list.html" class="banner-1">
        <span class="banner-img" data-background="<?php echo esc_html($bn_bg_img); ?>"></span>
        <div class="inner-box">
            <span class="badge-title text-uppercase"><?php echo esc_html($bn_sub_tx); ?></span>
            <h3 class="title">
                <?php echo esc_html($bn_main_ti); ?>
            </h3>
            <span class="tag-line mb-20 d-block"><?php echo esc_html($bn_main_price); ?></span>
        </div>
    </a>
</div>



