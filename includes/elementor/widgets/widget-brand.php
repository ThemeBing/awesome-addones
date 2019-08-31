<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Features
class saasbeyond_Widget_Brand extends Widget_Base {
 
   public function get_name() {
      return 'brand';
   }
 
   public function get_title() {
      return esc_html__( 'Brand', 'saasbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'saasbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'brand',
         [
            'label' => esc_html__( 'Brand', 'saasbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'brand_logo', [
            'label' => __( 'Logo', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- brand-area -->
      <div class="brand-area brand-mb">
        <div class="box-wrap">
            <div class="container">
                <div class="row brand-active">
                    <?php foreach (  $settings['screenshot'] as $index => $screenimage ) { ?>
                      <div class="col-12">
                        <div class="single-brand">
                            <img src="<?php echo $screenimage['brand_logo']['url'] ?>" alt="img">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
      </div>
      <!-- brand-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new saasbeyond_Widget_Brand );