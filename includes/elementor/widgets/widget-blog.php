<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class megaaddons_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'megaaddons' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'megaaddons-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'megaaddons' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'megaaddons' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'megaaddons' ),
               'DESC' => __( 'Descending', 'megaaddons' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>
              <div class="col-lg-4 col-md-6">
                <div class="single-blog-post mb-30">
                    <div class="b-post-thumb">
                      <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'saascloud-404x302'); ?>" alt="<?php the_title() ?>"></a>
                    </div>
                    <div class="blog-content">
                        <span><?php the_date(); ?></span>
                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_content(), 7, '.' ); ?></p>
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'megaaddons' ); ?> <i class="fa fa-plus"></i></a>
                    </div>
                </div>
              </div>

               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new megaaddons_Widget_Blog );