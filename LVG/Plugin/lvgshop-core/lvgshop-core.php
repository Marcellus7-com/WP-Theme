<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              ia.marcellus7.com
 * @since             1.0.0
 * @package           Lvgshop-core
 *
 * @wordpress-plugin
 * Plugin Name:       LVG Shop by M7 Core
 * Plugin URI:        https://ia.marcellus7.com/
 * Description:       Plugin complementar do tema LVG Shop by M7: tipos de conteudo personalizados, widgets do Elementor e recursos da loja.
 * Version:           1.4
 * Author:            Indigo Agency by M7
 * Author URI:        https://ia.marcellus7.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lvgshop-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LVGSHOP_CORE_VERSION', '1.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lvgshop-core-activator.php
 */
function activate_lvgshop_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lvgshop-core-activator.php';
	Lvgshop_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lvgshop-core-deactivator.php
 */
function deactivate_lvgshop_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lvgshop-core-deactivator.php';
	Lvgshop_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lvgshop_core' );
register_deactivation_hook( __FILE__, 'deactivate_lvgshop_core' );

 $lvgshop_options = get_option( 'lvgshop_options' );
$maintenancemode = (! empty( $lvgshop_options['maintenance_mode'] ) ) ? $lvgshop_options['maintenance_mode'] : '';
$nightmodeebl = (! empty( $lvgshop_options['sp_night_mode_ebl'] ) ) ? $lvgshop_options['sp_night_mode_ebl'] : '';
$woo_plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lvgshop-core.php';
require plugin_dir_path( __FILE__ ) . 'elementor/class-elementor-main.php';
require plugin_dir_path( __FILE__ ) . 'library/lvgshop-cpt.php';
require plugin_dir_path( __FILE__ ) . 'library/codestar/codestar-framework.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-panels.php';
require plugin_dir_path( __FILE__ ) . 'library/lvgshop-helper.php';
require plugin_dir_path( __FILE__ ) . 'library/lvgshop-nav-options.php';
require plugin_dir_path( __FILE__ ) . 'library/lvgshop-rating.php';
require plugin_dir_path( __FILE__ ) . 'library/lvgshop-custom-css.php';
require plugin_dir_path( __FILE__ ) . 'library/license/Lvgshop.php';

require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-gradient-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-group.php';

require plugin_dir_path( __FILE__ ) . 'library/metabox/page-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/pricing-table-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/user-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/team-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/case-study-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/product-meta.php';



require plugin_dir_path( __FILE__ ) . 'library/custom-options-helper.php';

require plugin_dir_path( __FILE__ ) . 'library/custom-fonts/custom-font-functions.php';
if($nightmodeebl){
require plugin_dir_path( __FILE__ ) . 'library/extension/sp-night-mode/sp-night-mode.php';
}

if($maintenancemode){
require plugin_dir_path( __FILE__ ) . 'library/maintenance/maintenance.php';
}

require plugin_dir_path( __FILE__ ) . 'library/widgets/about.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/search.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/tags.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/category.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/recent-post.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/custom-widget.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/product.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-about.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-useful-link.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-style-one-newsletter.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-style-two-newsletter.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-instagram-gallery.php';

if( is_multisite() ){
	$networkplugins = wp_get_active_network_plugins();
} else {
    $networkplugins =  wp_get_active_and_valid_plugins();
}

if (
    
    in_array( $woo_plugin_path, wp_get_active_and_valid_plugins() ) || in_array( $woo_plugin_path, $networkplugins )

) {

require plugin_dir_path( __FILE__ ) . 'library/extension/lvgshop-live-search/product-search.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/wishlist.php';

require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/login.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/register.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/woo-quick-view/init.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/ttc-ajax-filter/ttc-ajax-filter.php';

require plugin_dir_path( __FILE__ ) . 'library/extension/woo-sale-countdown/woo-sale-countdown.php';


}




/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lvgshop_core() {

	$plugin = new Lvgshop_Core();
	$plugin->run();

}
run_lvgshop_core();
