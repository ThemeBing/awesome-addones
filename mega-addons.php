
<?php
/**
* Plugin Name: Mega Addons
* Plugin URI: https://github.com/Yeadh/saasbeyond-element
* Description: After install the SaasBeyond WordPress Theme, you must need to install this "SaasBeyond Element" first to get all functions of SaasBeyond WP Theme.
* Version: 1.0.0
* Author: CodeCorns
* Author URI: http://themeforest.net/user/nexttheme-org
* Text Domain: megaaddons
* License: GPL/GNU.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class MegaAddons {

	function __construct() {
		$this->load_plugin_textdomain();
		$this->load_dependencies();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'mega-addons', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

	public function enqueue_scripts() {
		wp_register_style( 'megaaddons-style', plugin_dir_url( __FILE__ ) . 'public/assets/css/style.css' );
		wp_register_script( 'megaaddons-main-js', plugin_dir_url( __FILE__ ) . 'public/assets/js/main.js' );

		wp_enqueue_style( 'megaaddons-style' );
		wp_enqueue_script( 'megaaddons-main-js' );
	}

	private function load_dependencies() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/custom-posts.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/elementor/elementor.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/recent-post.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/social-share.php';
	}

}
new MegaAddons();