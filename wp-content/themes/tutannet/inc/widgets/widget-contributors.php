<?php

/**
 * Article Contributors Widgets
 *
 * @package TuTanNet
 */
/**
 * Adds tutannet_contributors widget.
 */
add_action('widgets_init', 'article_contributors_widget');

function article_contributors_widget() {
    register_widget('tutannet_article_contributors');
}

class tutannet_article_contributors extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'tutannet_article_contributors', 'AP-Mag :  Article Contributors', array(
            'description' => __('A widget that shows article contributors', 'tutannet')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'contributors_title' => array(
                'tutannet_widgets_name' => 'contributors_title',
                'tutannet_widgets_title' => __('Title', 'tutannet'),
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
    public function widget($args, $instance) {
        extract($args);
        $contributors_title = $instance['contributors_title'];
        echo $before_widget; ?>
        <div class="contributors-wrapper clearfix">
           <h1 class="widget-title"><span><?php if( !empty( $contributors_title )  ){ echo esc_attr($contributors_title); } ?></span></h1>     
           <div class="single-user-wrapper">
                 <?php
                    $roles = array('Administrator', 'Author', 'Editor');
                    foreach($roles as $role)
                    {
                        $user_args = array(
                                        'fields'=>'all_with_meta',
                                        'orderby'=>'user_nicename',
                                        'role'=>$role
                                        );
                        $user_query = new WP_User_Query( $user_args );
                        //echo '<pre>';
//                        	print_r($user_query);
//                        echo '</pre>';
                                if ( ! empty( $user_query->results ) ) {
                                	foreach ( $user_query->results as $user ) {
                                		$user_name = $user->display_name;
                                        $user_nickname = $user->user_nicename;
                                        $user_id = $user->ID;
                                        $user_avatar = get_avatar($user_id, '82'); 
                ?>
                            <div class="single-user">
                                <a href="<?php echo esc_url( get_author_posts_url( $user_id, $user_nickname ) ) ;?>">
                                    <div class="user-image"><?php echo  $user_avatar ;?></div>
                                    <h3 class="user-name"><?php echo esc_attr( $user_name );?></h3>
                                </a>
                            </div>
                <?php
                                	}
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
