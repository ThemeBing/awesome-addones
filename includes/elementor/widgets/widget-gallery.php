<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class megaaddons_Widget_Gallery extends Widget_Base {
 
   public function get_name() {
      return 'gallery';
   }
 
   public function get_title() {
      return esc_html__( 'Gallery Item', 'megaaddons' );
   }
 
   public function get_icon() { 
      return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'gallery_section',
         [
            'label' => esc_html__( 'Gallery Item', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $gallery = new \Elementor\Repeater();

      $gallery->add_control(
         'image',
         [
            'label' => __( 'Image', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]     
      );

      $gallery->add_control(
         'title',
         [
            'label' => __( 'Feature', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Sequrity Management', 'megaaddons' )
         ]
      );

      $gallery->add_control(
         'text',
         [
            'label' => __( 'Feature', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Blending Image', 'megaaddons' )
         ]
      );

      $this->add_control(
         'gallery',
         [
            'label' => __( 'Gallery', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
      $settings = $this->get_settings_for_display(); ?>


      <div class="project-active">

         <?php foreach ( $gallery as $gallery_item ): ?>
            <div class="single-project text-center">
               <?php echo wp_get_attachment_image( $gallery_item['image']['id'],'full'); ?>
               <div class="project-overlay">
                  <h5><a href="#"><?php echo esc_html($gallery_item['title']); ?></a></h5>
                  <span><?php echo esc_html($gallery_item['text']); ?></span>
               </div>
            </div>
         <?php endforeach ?>

      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Gallery );