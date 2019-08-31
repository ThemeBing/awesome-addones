<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class saasbeyond_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'saasbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'saasbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'saasbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'style',
         [
            'label' => __( 'Banner Style', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'saasbeyond' ),
               'style2' => __( 'Style 2', 'saasbeyond' ),
            ],
         ]
      );


      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'saasbeyond' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Get the Apps & Enjoy!','saasbeyond')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipxumd dummy text are used in this industry. So replace your orginal text. Lorem dummy','saasbeyond')
         ]
      );

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('DOWNLOAD','saasbeyond'),
            'condition' => ['style' => 'style1']
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'saasbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'condition' => ['style' => 'style1']
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'style1' ){ ?>
        <!-- slider-area -->
        <section class="slider-area slider-bg" data-background="<?php echo esc_url( $settings['banner_image']['url'] ) ?>">
            <div class="container">
                <div class="slider-overflow">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="slider-content mt-15">
                                <h2 class="wow slideInLeft" data-wow-delay="0.2s">Thinking <span>Software</span> High Quality</h2>
                                <p class="wow slideInLeft" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, con sectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna eiusmod aliqua.</p>
                                <a href="#" class="btn wow slideInLeft" data-wow-delay="0.6s">Start now</a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                            <div class="slider-img animate-slider-img position-relative ml-50">
                                <img src="<?php echo get_template_directory_uri() ?>/images/slider_img01.png" alt="img" class="slider-main-img">
                                <img src="<?php echo get_template_directory_uri() ?>/images/board_img.png" alt="img" class="wow slideInDown" data-wow-delay="0.6s">
                                <img src="<?php echo get_template_directory_uri() ?>/images/man_img.png" alt="img" class="wow slideInLeftS" data-wow-delay="1s">
                                <div class="<?php echo get_template_directory_uri() ?>/images-r wow slideInLeftS" data-wow-delay="1.4s"><img src="<?php echo get_template_directory_uri() ?>/images/cog_img1.png" alt="img" class="rotateme"></div>
                                <div class="img-nth-five wow slideInRight" data-wow-delay="1.8s"><img src="<?php echo get_template_directory_uri() ?>/images/cog_img2.png" alt="img" class="rotateme"></div>
                                <img src="<?php echo get_template_directory_uri() ?>/images/cog_img3.png" alt="img" class="wow slideInLeftS" data-wow-delay="2.2s">
                                <img src="<?php echo get_template_directory_uri() ?>/images/cog_img4.png" alt="img" class="wow fadeInUp" data-wow-delay="2.6s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-shape s-shape-one"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape01.png" alt="img"></div>
            <div class="slider-shape s-shape-two"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape03.png" alt="img"></div>
            <div class="slider-shape s-shape-three"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape02.png" alt="img"></div>
            <div class="slider-shape s-shape-four"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape04.png" alt="img"></div>
            <div class="slider-shape s-shape-five"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape05.png" alt="img"></div>
            <div class="slider-shape s-shape-six"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape06.png" alt="img"></div>
        </section>
        <!-- slider-area-end -->
      <?php } elseif( $settings['style'] == 'style2' ){ ?>
        <!-- banner-area -->
        <section class="banner-area s-banner-bg d-flex align-items-center p-relative" data-background="<?php echo $settings['banner_image']['url'] ?>">
            <div id="particles-js"></div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content s-banner-content">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $settings['title']; ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.4s"><?php echo $settings['description']; ?></p>
                            <a href="#" class="btn wow fadeInLeft" data-wow-delay="0.6s">Buy Now</a>
                            <a href="#" class="btn wow fadeInRight" data-wow-delay="0.6s">Learn More</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="s-banner-app p-relative">
                            <img src="<?php echo $settings['app_mockup']['url'] ?>" alt="img">
                            <img src="<?php echo get_template_directory_uri() ?>/img/banner_app_shape.png" class="b-app-shape wow zoomIn" data-wow-delay="1s" alt="img">
                            <div class="circle-animation">
                                <div class="slider-pulse"></div>
                                <div class="circle" style="animation-delay: -2s"></div>
                                <div class="circle" style="animation-delay: -1s"></div>
                                <div class="circle" style="animation-delay: 0s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-area-end -->
      <?php } ?>

      
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new saasbeyond_Widget_Banner );