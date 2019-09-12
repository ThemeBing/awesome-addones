<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class megaaddons_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonial_section',
         [
            'label' => esc_html__( 'Testimonials', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'megaaddons' ),
               'style2' => __( 'Style 2', 'megaaddons' ),
               'style3' => __( 'Style 3', 'megaaddons' ),
            ],
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
            'condition' => ['style' => [ 'style2', 'style3']]
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'style1' ){ ?>

      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
          <div class="testimonial-active">
            <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
              <div class="single-testimonial text-center">
                  <div class="testimonial-icon mb-25">
                      <img src="<?php echo get_template_directory_uri() ?>/images/quote_icon.png" alt="quote">
                  </div>
                  <div class="testimonial-content">
                      <h5><?php echo esc_html($testimonial_single['testimonial']); ?></h5>
                      <div class="testi-avatar">
                          <h6><?php echo esc_html($testimonial_single['name']); ?></h6>
                          <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                      </div>
                  </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      
      <?php } elseif( $settings['style'] == 'style2' ){ ?>
        
      <div class="row t-testimonial-active">
        <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
          <div class="col-xl-4">
              <div class="t-single-testimonial text-center">
                  <div class="t-testimonial-img mb-30">
                      <img src="<?php echo get_template_directory_uri() ?>/images/testimonial_img01.png" alt="icon">
                  </div>
                  <div class="t-testimonial-content">
                      <h5><?php echo esc_html($testimonial_single['testimonial']); ?></h5>
                      <div class="testi-avatar">
                          <h6><?php echo esc_html($testimonial_single['name']); ?></h6>
                          <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                      </div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php } elseif( $settings['style'] == 'style3' ){ ?>

      <div class="s-testimonial-active">
          <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
          <div class="single-testimonial s-single-testimonial text-center">
              <div class="testimonial-icon mb-25">
                  <img src="<?php echo get_template_directory_uri() ?>/images/quote02.png" alt="icon">
              </div>
              <div class="testimonial-content">
                  <h5>“In promotion and of advertising, a testimonial or show consists person's written or spoken statement extoll product
                  "testimonial "</h5>
                  <div class="s-testi-avatar">
                      <div class="testi-avatar-img">
                          <img src="img/images/testi_avatar_img01.png" alt="img">
                      </div>
                      <div class="testi-avatar-info">
                          <h6><?php echo esc_html($testimonial_single['name']); ?> _ <span><?php echo esc_html($testimonial_single['designation']); ?></span></h6>
                      </div>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
      </div>

      <?php } ?>

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Testimonials );