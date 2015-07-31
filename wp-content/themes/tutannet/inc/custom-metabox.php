<?php
/**
 * TuTanNet Theme Options
 *
 * @package TuTanNet
 */
 
//add_action('add_meta_boxes', 'tutannet_add_sidebar_layout_box'); 
 
function tutannet_add_sidebar_layout_box()
{
    
    add_meta_box(
                 'tutannet_post_settings', // $id
                 __( 'Post settings', 'tutannet' ), // $title
                 'tutannet_post_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'tutannet_page_settings', // $id
                 __( 'Sidebar Layout', 'tutannet' ), // $title
                 'tutannet_page_settings_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
 
}

$tutannet_sidebar_layout = array(
        'global-sidebar' => array(
                        'value'     => 'global-sidebar',
                        'label'     => __( 'Theme option sidebar', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/theme-option-sidebar.png'
                    ), 
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/right-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/no-sidebar.png'
                    )   

    );

$tutannet_page_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/right-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/no-sidebar.png'
                    )   

    );

$tutannet_post_template_layout = array(
        'global-template' => array(
                        'value'     => 'global-template',
                        'label'     => __( 'Theme option Template', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-theme.png',
                        'available'=> 'free'
                    ),
        'default-template' => array(
                        'value'     => 'default-template',
                        'label'     => __( 'Default Template', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-0.png',
                        'available'=> 'free'
                    ), 
        'style1-template' => array(
                        'value' => 'style1-template',
                        'label' => __( 'Style 1', 'tutannet' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/option-framework/images/post_template/post-templates-icons-1.png',
                        'available'=> 'free'
                    )
    );

/*-------------------Function for Post settings meta box----------------------------*/

function tutannet_post_settings_callback()
{
    global $post, $tutannet_post_template_layout, $tutannet_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'tutannet_post_settings_nonce' );
?>

<div class="my_post_settings">
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e( 'Post template:', 'tutannet' )?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($tutannet_post_template_layout as $field) {  
                            $tutannet_post_template_metalayout = get_post_meta( $post->ID, 'tutannet_post_template_layout', true );?>
                                            
                            <div class="radio-post-template-wrapper" available="<?php echo $field['available'];?>" style="float:left; margin-right:30px;">
                            <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="tutannet_post_template_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $tutannet_post_template_metalayout ); if(empty($tutannet_post_template_metalayout) && $field['value']=='global-template'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                            </div>
                            <?php } // end foreach 
                            ?>
                            <span class="pro-tmp-msg" style="display: none;"><?php _e( 'Template available in pro version', 'tutannet' );?></span>
                            <div class="clear"></div>
            </td>
            </tr>
            
        </table>
        
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e( 'Post Sidebar', 'tutannet' ); ?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($tutannet_sidebar_layout as $field) {  
                $tutannet_sidebar_metalayout = get_post_meta( $post->ID, 'tutannet_sidebar_layout', true ); ?>

                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                <input type="radio" name="tutannet_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $tutannet_sidebar_metalayout ); if(empty($tutannet_sidebar_metalayout) && $field['value']=='global-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                </label>
                </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content ', 'tutannet' );?> <a href="<?php echo admin_url('/themes.php?page=options-framework'); ?>"><?php _e( 'here', 'tutannet' )?></a></em></td>
            </tr>
        </table>
</div>

<?php
}

/*---------Function for Page sidebar meta box----------------------------*/

function tutannet_page_settings_callback()
{
    global $post, $tutannet_page_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'tutannet_page_settings_nonce' );
?>
        <table class="form-table">
            <tr>
            <td colspan="4"><em class="f13"><?php _e('Page Sidebar','tutannet'); ?></em></td>
            </tr>
            
            <tr>
            <td>
            <?php  
               foreach ($tutannet_page_sidebar_layout as $field) {  
                            $tutannet_page_sidebar_metalayout = get_post_meta( $post->ID, 'tutannet_page_sidebar_layout', true ); ?>
            
                            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                            <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="tutannet_page_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $tutannet_page_sidebar_metalayout ); if(empty($tutannet_page_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                            </div>
                            <?php } // end foreach 
                            ?>
                            <div class="clear"></div>
            </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'tutannet' );?> <a href="<?php echo esc_url( admin_url('/themes.php?page=options-framework') ); ?>"><?php _e( 'here', 'tutannet' );?></a></em></td>
            </tr>
        </table>

<?php
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */

/*-------------------Save function for Post Setting-------------------------*/

function tutannet_save_post_settings( $post_id ) { 
    global $tutannet_post_template_layout, $tutannet_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'tutannet_post_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'tutannet_post_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach ($tutannet_post_template_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'tutannet_post_template_layout', true); 
        $new = sanitize_text_field($_POST['tutannet_post_template_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'tutannet_post_template_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'tutannet_post_template_layout', $old);  
        }
     } // end foreach  
     
   foreach ($tutannet_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'tutannet_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['tutannet_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'tutannet_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'tutannet_sidebar_layout', $old);  
        }
     } // end foreach   
     
       
}
add_action('save_post', 'tutannet_save_post_settings');

/*-------------------Save function for Page Setting-------------------------*/

function tutannet_save_page_settings( $post_id ) { 
    global $tutannet_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'tutannet_page_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'tutannet_page_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach ($tutannet_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'tutannet_page_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['tutannet_page_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'tutannet_page_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'tutannet_page_sidebar_layout', $old);  
        } 
     } // end foreach 
    
}
add_action('save_post', 'tutannet_save_page_settings');
?>