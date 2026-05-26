<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
?>
<!--order tracking start-->
<div class="order-tracking ptb-120 bg-white">
    <div class="container">
        <form class="theme-form" action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" >

            <label for="orderid"><?php esc_html_e( 'Enter Order Id', 'lvgshop' ); ?></label>
            <input type="text" placeholder="Find in your order confirmation mail" class="theme-input" id="orderid" name="orderid" value="<?php echo isset( $_REQUEST['orderid'] ) ? esc_attr( wp_unslash( $_REQUEST['orderid'] ) ) : ''; ?>">

            <label for="order_email" class="mt-32"><?php esc_html_e( 'Enter Email Address', 'lvgshop' ); ?></label>
            <input type="email" placeholder="Email you used during checkout" class="theme-input" id="order_email" name="order_email" value="<?php echo isset( $_REQUEST['order_email'] ) ? esc_attr( wp_unslash( $_REQUEST['order_email'] ) ) : ''; ?>">

            <button type="submit" class="template-btn primary-btn d-block w-100 text-uppercase fw-normal mt-40" name="track" value="<?php esc_attr_e( 'Track Order', 'lvgshop' ); ?>"><span><?php esc_html_e( 'Track Order', 'lvgshop' ); ?></span></button>
            <?php wp_nonce_field( 'woocommerce-order_tracking', 'woocommerce-order-tracking-nonce' ); ?>
        </form>
</div>
<!--order tracking end-->
