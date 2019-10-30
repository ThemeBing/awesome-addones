<?php 
namespace Mega_Addons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// video
class Mega_Addons_Widget_video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'Video', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-video-camera';
   }
 
   public function get_categories() {
      return [ 'mega_addons' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'background', [
            'label' => __( 'Background', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'url',
         [
            'label' => __( 'URL', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <section class="video-area">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-10">
                      <div class="video-wrap p-relative">
                          <img src="<?php echo esc_url($settings['background']['url']); ?>" alt="img">
                          <a href="<?php echo esc_url($settings['url']); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
   
      <?php }
}