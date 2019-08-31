<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codecorns.com
 * @since      1.0.0
 *
 * @package    Mega_Addons_For_Elementor
 * @subpackage Mega_Addons_For_Elementor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mega_Addons_For_Elementor
 * @subpackage Mega_Addons_For_Elementor/includes
 * @author     CodeCorns <info@codecorns.com>
 */
class Mega_Addons_For_Elementor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mega-addons-for-elementor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
