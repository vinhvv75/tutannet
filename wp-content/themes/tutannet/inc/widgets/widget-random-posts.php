<?php

/**
 * Random Posts Widgets
 *
 * @package TuTanNet
 */
/**
 * Adds tutannet_random_posts widget.
 */
add_action('widgets_init', 'register_random_posts_widget');

function register_random_posts_widget() {
    register_widget('tutannet_register_random_posts');
}

class tutannet_register_random_posts extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'tutannet_register_random_posts', 'AP-Mag :  Random Posts', array(
            'description' => __( 'A widget that shows Random posts', 'tutannet' )
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'random_posts_title' => array(
                'tutannet_widgets_name' => 'random_posts_title',
                'tutannet_widgets_title' => __( 'Title', 'tutannet' ),
                'tutannet_widgets_field_type' => 'title',
            ),            
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $random_posts_title = $instance['random_posts_title'];
        echo $before_widget; ?>
        <div class="random-posts clearfix">
           <h1 class="widget-title"><span><?php if( !empty( $random_posts_title ) ){ echo esc_attr( $random_posts_title ); } ?></span></h1>     
           <div class="random-posts-wrapper">
                <?php
                    $rand_posts_args = array( 'post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'rand' );
                    $rand_posts_query = new WP_Query($rand_posts_args);
                    if($rand_posts_query->have_posts()){
                        while($rand_posts_query->have_posts()){
                            $rand_posts_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $image_path = wp_get_attachment_image_src( $image_id, 'tutannet-block-small-thumb', true );
                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                ?>
                    <div class="rand-single-post clearfix">
                        <div class="post-img"><a href="<?php the_permalink();?>">
                            <?php if(has_post_thumbnail()): ?>
                            <img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" />
                            <?php else: ?>
                            <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-small.jpg' );?>" alt="<?php _e( 'No image', 'tutannet' );?>" />                            
                            <?php endif ;?>
                        </a></div>
                        <div class="post-desc-wrapper">
                            <h3 class="post-title">
                                <a href="<?php the_permalink();?>">
                                    <?php 
                                        $post_title = get_the_title();
                                            echo tutannet_letter_count( $post_title, 20 ) ;
                                    ?>
                                </a>
                            </h3>
                            <div class="block-poston"><?php do_action( 'tutannet_home_posted_on' );?></div>
                        </div>                    
                    </div>
                <?php
                        }                                               
                    }
                ?>
           </div> 
        </div>
        <?php 
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$tutannet_widgets_name] = tutannet_widgets_updated_field_value($widget_field, $new_instance[$tutannet_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $tutannet_widgets_field_value = !empty($instance[$tutannet_widgets_name]) ? esc_attr($instance[$tutannet_widgets_name]) : '';
            tutannet_widgets_show_widget_field($this, $widget_field, $tutannet_widgets_field_value);
        }
    }

}
