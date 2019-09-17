<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class megaaddons_Widget_Feature extends Widget_Base {
 
   public function get_name() {
      return 'feature';
   }
 
   public function get_title() {
      return esc_html__( 'Feature', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-bullet-list';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Feature', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'feature_icon', [
            'label' => __( 'Feature Icon', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('All kind of Business tools integretion','megaaddons'),
         ]
      );

      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt','megaaddons'),
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'Text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Download','megaaddons'),
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'Text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );
      
      $this->end_controls_section();
   }
   
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>

      <div class="single-business-process">
          <div class="bp-icon mb-70">
              <img src="<?php echo esc_url($settings['feature_icon']['url']); ?>" alt="icon">
          </div>
          <div class="bp-content">
              <h2><?php echo $settings['title']; ?></h2>
              <p><?php echo esc_html($settings['text']); ?></p>
              <a href="<?php echo esc_url($settings['btn_url']); ?>" class="btn"><?php echo esc_html($settings['btn_text']); ?></a>
          </div>
        </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Feature );