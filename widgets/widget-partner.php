<?php 
namespace Mega_Addons_For_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class Mega_Addons_Widget_Partner extends Widget_Base {
 
   public function get_name() {
      return 'partner';
   }
 
   public function get_title() {
      return esc_html__( 'Partner', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-logo';
   }
 
   public function get_categories() {
      return [ 'mega_addons' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'partner_section',
         [
            'label' => esc_html__( 'partner', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );


      $this->add_control(
         'partner_list',
         [
            'label' => __( 'Partner List', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- brand-area -->
      <div class="brand-area brand-mb">
          <div class="container">
              <div class="row brand-active">
              <?php foreach (  $settings['partner_list'] as $partner_single ): ?>
                  <div class="col-12">
                      <div class="single-brand">
                          <img src="<?php echo esc_url($partner_single['image']['url']); ?>" alt="img">
                      </div>
                  </div>
              <?php endforeach; ?>
              </div>
          </div>
      </div>
      <!-- brand-area-end -->
   <?php } 
 
}