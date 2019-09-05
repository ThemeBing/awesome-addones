<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class megaaddons_Widget_Counter extends Widget_Base {
 
   public function get_name() {
      return 'counter';
   }
 
   public function get_title() {
      return esc_html__( 'Counter', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Counter', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'Choose Icon', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter Value', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '123'
         ]
      );

      $this->add_control(
         'in_word',
         [
            'label' => __( 'In Word', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('M','megaaddons' )
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Download','megaaddons' )
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'counter', 'basic' );
      
      ?>

      <div class="single-count text-center mb-40">
        <div class="counter">
         <span class="count"><?php echo esc_html( $settings['counter'] ); ?></span>
         <?php if ($settings['in_word']): ?>
           <span><?php echo esc_html( $settings['in_word'] ); ?></span>
         <?php endif ?></div>
        <p><?php echo esc_html( $settings['title'] ); ?></p>
                
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Counter );