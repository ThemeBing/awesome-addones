<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class megaaddons_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'megaaddons' ),
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
               'style2' => __( 'Style 2', 'megaaddons' )
            ],
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'megaaddons' ),
               'Weekly'  => __( 'Weekly', 'megaaddons' ),
               'Monthly' => __( 'Monthly', 'megaaddons' ),
               'Yealry' => __( 'Yealry', 'megaaddons' ),
               'none' => __( 'None', 'megaaddons' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'megaaddons' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'megaaddons' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'megaaddons' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'megaaddons' )
               ],
               [
                  'feature' => __( '100 Email Account', 'megaaddons' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'megaaddons' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'subscribe',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'megaaddons' ),
            'label_off' => __( 'Off', 'megaaddons' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      
      <?php if ( $settings['style'] == 'style1' ){ ?>

      <div class="single-pricing <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?> text-center">
         <div class="pricing-head mb-30">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <h2><?php echo esc_html( $settings['price'] ); ?><span>$/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-icon mb-45">
             <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
         </div>
         <div class="pricing-list mb-35">
             <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

      <?php } elseif( $settings['style'] == 'style2' ){ ?>

      <div class="single-pricing s-single-pricing active text-center mb-30">
         <div class="pricing-head mb-35">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <p><?php echo esc_html( $settings['desc'] ); ?></p>
             <h2  class="price-count">$<?php echo esc_html( $settings['price'] ); ?><span>/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-list mb-35">
            <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="s-pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

   <?php }

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Pricing );