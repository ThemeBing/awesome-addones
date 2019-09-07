<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Features
class megaaddons_Widget_Features extends Widget_Base {
 
   public function get_name() {
      return 'features';
   }
 
   public function get_title() {
      return esc_html__( 'Features', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'features',
         [
            'label' => esc_html__( 'Features', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Layout Style', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'megaaddons' ),
               'style2' => __( 'Style 2', 'megaaddons' ),
            ],
         ]
      );

      $this->add_control(
         'feature_icon', [
            'label' => __( 'Feature Icon', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $this->add_control(
         'feature_title', [
            'label' => __( 'Feature Title', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Market Analysis',
         ]
      );

      $this->add_control(
         'feature_text', [
            'label' => __( 'Feature Text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Orem Ipsum is simply dummy text the printing and typesetting industry sum has been the industrys',
         ]
      );

      $this->add_control(
         'feature_btn_text', [
            'label' => __( 'Button Text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'More About',
         ]
      );

      $this->add_control(
         'feature_btn_url', [
            'label' => __( 'Button URL', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'active',
         [
            'label' => __( 'Active', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'megaaddons' ),
            'label_off' => __( 'Off', 'megaaddons' ),
            'return_value' => 'active',
            'default' => 'off',
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'style1' ){ ?>

      <div class="single-features <?php echo esc_html($settings['active']) ?>">
          <div class="features-icon mb-25">
              <i class="<?php echo esc_attr($settings['feature_icon']) ?>"></i>
          </div>
          <div class="features-content">
              <h3><?php echo esc_html($settings['feature_title']) ?></h3>
              <p><?php echo esc_html($settings['feature_text']) ?></p>
              <a href="<?php echo esc_url($settings['feature_btn_url']) ?>"><?php echo esc_html($settings['feature_btn_text']) ?></a>
          </div>
      </div>


    <?php } elseif( $settings['style'] == 'style2' ){ ?>


      <div class="single-services">
          <div class="services-icon">
              <i class="<?php echo esc_attr($settings['feature_icon']) ?>"></i>
          </div>
          <div class="services-content">
              <h4><?php echo esc_html($settings['feature_title']) ?></h4>
              <p><?php echo esc_html($settings['feature_text']) ?></p>
          </div>
      </div>

    <?php } ?>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Features );