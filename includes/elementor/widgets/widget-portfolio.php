<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class megaaddons_Widget_Portfolio extends Widget_Base {
 
   public function get_name() {
      return 'portfolio';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio Item', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'portfolio_section',
         [
            'label' => esc_html__( 'Portfolio Item', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'image',
         [
            'label' => __( 'Image', 'megaaddons' ),
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
            'default' => __('Awesome Design','megaaddons'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Sub title', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are used here so replace your app data, ipsum dummy text are used here so','megaaddons'),
         ]
      );

      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>

      <div class="inner-single-project text-center mb-30">
          <?php echo wp_get_attachment_image( $settings['image']['id'],'full'); ?>
          <div class="project-overlay">
              <h5><a href="#"><?php echo esc_html($settings['title']); ?></a></h5>
              <span><?php echo esc_html($settings['text']); ?></span>
          </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Portfolio );