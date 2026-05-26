<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       ia.marcellus7.com
 * @since      1.0.0
 *
 * @package    Lvgshop_Core
 * @subpackage Lvgshop_Core/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lvgshop_Core
 * @subpackage Lvgshop_Core/includes
 * @author     Indigo Agency by M7 <hello@ia.marcellus7.com>
 */
class Lvgshop_Core_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lvgshop-core',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
