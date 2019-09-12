<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class megaaddons_Widget_Soft_Integration extends Widget_Base {
 
   public function get_name() {
      return 'software_integration';
   }
 
   public function get_title() {
      return esc_html__( 'Software Integration', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-logo';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'software_integration_section',
         [
            'label' => esc_html__( 'Software Integration', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Software Logo', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );

      $repeater->add_control(
         'url',
         [
            'label' => __( 'Software URL', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );


      $this->add_control(
         'software_list',
         [
            'label' => __( 'Software List', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-10">
              <div class="target-software-wrap">
                  <div class="row text-center justify-content-center">
                    <?php foreach (  $settings['software_list'] as $software_single ): ?>
                      <div class="single-software-thumb">
                          <a href="<?php echo esc_url( $software_single['url'] ); ?>"><img src="<?php echo esc_url( $software_single['image']['url'] ); ?>" alt="img"></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Soft_Integration );