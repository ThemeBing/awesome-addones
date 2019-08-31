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
         'feature_icon', [
            'label' => __( 'Feature Icon', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'feature',
         [
            'label' => __( 'Features', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'title_field' => '{{{ feature_title }}}',
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
                    <?php foreach (  $settings['feature'] as $index => $logo ) { ?>
                      <div class="col-12">
                        <div class="single-brand">
                            <img src="<?php echo $logo['brand_logo']['url'] ?>" alt="img">
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