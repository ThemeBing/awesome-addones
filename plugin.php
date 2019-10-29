<?php
namespace Mega_Addons_For_Elementor;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_categories
	 *
	 * Register new category for widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'mega_addons',
			[
				'title' => esc_html__( 'Mega Addons', 'megaaddons' ),
				'icon' => 'fa fa-plug',
			]
		);

	}


	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_enqueue_style( 'mega_addons', plugins_url( '/assets/css/infobox.css', __FILE__ ) );
		wp_enqueue_script( 'mega_addons', plugins_url( '/assets/js/infobox.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/widget-accordion.php' );
		require_once( __DIR__ . '/widgets/widget-banner.php' );
		require_once( __DIR__ . '/widgets/widget-blog.php' );
		require_once( __DIR__ . '/widgets/widget-button.php' );
		require_once( __DIR__ . '/widgets/widget-contact.php' );
		require_once( __DIR__ . '/widgets/widget-counter.php' );
		require_once( __DIR__ . '/widgets/widget-gallery.php' );
		require_once( __DIR__ . '/widgets/widget-infobox.php' );
		require_once( __DIR__ . '/widgets/widget-newsletter.php' );
		require_once( __DIR__ . '/widgets/widget-partner.php' );
		require_once( __DIR__ . '/widgets/widget-portfolio.php' );
		require_once( __DIR__ . '/widgets/widget-pricing.php' );
		require_once( __DIR__ . '/widgets/widget-team.php' );
		require_once( __DIR__ . '/widgets/widget-testimonials.php' );
		require_once( __DIR__ . '/widgets/widget-title.php' );
		require_once( __DIR__ . '/widgets/widget-video.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Accordion() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Blog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Infobox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_newsletter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Partner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ Mega_Addons_Widget_video() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/elements/categories_registered', [ $this, 'widget_categories' ] );

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
