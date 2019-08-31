<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codecorns.com
 * @since             1.0.0
 * @package           Mega_Addons_For_Elementor
 *
 * @wordpress-plugin
 * Plugin Name:       Mega Addons For Elementor
 * Plugin URI:        https://codecorns.com/mega-addons-for-elementor
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            CodeCorns
 * Author URI:        https://codecorns.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mega-addons-for-elementor
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
define( 'MEGA_ADDONS_FOR_ELEMENTOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mega-addons-for-elementor-activator.php
 */
function activate_mega_addons_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mega-addons-for-elementor-activator.php';
	Mega_Addons_For_Elementor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mega-addons-for-elementor-deactivator.php
 */
function deactivate_mega_addons_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mega-addons-for-elementor-deactivator.php';
	Mega_Addons_For_Elementor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mega_addons_for_elementor' );
register_deactivation_hook( __FILE__, 'deactivate_mega_addons_for_elementor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mega-addons-for-elementor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mega_addons_for_elementor() {

	$plugin = new Mega_Addons_For_Elementor();
	$plugin->run();

}
run_mega_addons_for_elementor();
