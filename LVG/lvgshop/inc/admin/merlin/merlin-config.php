<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

      $config = array(
		'directory'            => 'inc/admin/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'lvgshop-wizard', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'lvgshop-admin-menu', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => '', // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Setup Wizard', 'lvgshop' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'lvgshop' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'lvgshop' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'lvgshop' ),

		'btn-skip'                 => esc_html__( 'Skip', 'lvgshop' ),
		'btn-next'                 => esc_html__( 'Next', 'lvgshop' ),
		'btn-start'                => esc_html__( 'Start', 'lvgshop' ),
		'btn-no'                   => esc_html__( 'Cancel', 'lvgshop' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'lvgshop' ),
		'btn-child-install'        => esc_html__( 'Install', 'lvgshop' ),
		'btn-content-install'      => esc_html__( 'Install', 'lvgshop' ),
		'btn-import'               => esc_html__( 'Import', 'lvgshop' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'lvgshop' ),
		'btn-license-skip'         => esc_html__( 'Later', 'lvgshop' ),

		/* translators: Theme Name */
		'license-header'         => esc_html__( 'Activate Theme', 'lvgshop' ),
		'license-header2'         => esc_html__( 'Activate Your Theme', 'lvgshop' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'lvgshop' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Please add your Envato purchase code along with your email address to confirm the purchase.', 'lvgshop' ),
		'license-label'            => esc_html__( 'License key', 'lvgshop' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'lvgshop' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'lvgshop' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'lvgshop' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Let\'s Get You Started', 'lvgshop' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'lvgshop' ),
		'welcome%s'                => esc_html__( 'Thanks for purchasing LVG Shop by M7! Start wizard to generate child theme, intstall plugins and import demo date.', 'lvgshop' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'lvgshop' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'lvgshop' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'lvgshop' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'lvgshop' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'lvgshop' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'lvgshop' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'lvgshop' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'lvgshop' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'lvgshop' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'lvgshop' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get you started.', 'lvgshop' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'lvgshop' ),
		'plugins-action-link'      => esc_html__( 'View Plugins', 'lvgshop' ),

		'import-header'            => esc_html__( 'Import Demo', 'lvgshop' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'lvgshop' ),
		'import-action-link'       => esc_html__( 'Advanced', 'lvgshop' ),

		'ready-header'             => esc_html__( 'You\'re Ready!', 'lvgshop' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'lvgshop' ),
		'ready-action-link'        => esc_html__( 'Extras', 'lvgshop' ),
		'ready-big-button'         => esc_html__( 'View your website', 'lvgshop' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://ia.marcellus7.com/', esc_html__( 'Help center', 'lvgshop' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://ia.marcellus7.com/', esc_html__( 'Youtube', 'lvgshop' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'lvgshop' ) ),
	)
);