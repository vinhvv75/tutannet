<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package TuTanNet
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	
	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function tutannet_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'tutannet_render_title' );
endif;

function tutannet_header_scripts(){
    
    $tutannet_favicon = of_get_option('favicon_upload');
    if (!empty($tutannet_favicon)) {
        echo '<link rel="icon" type="image/png" href="' . esc_url( $tutannet_favicon ) . '">';
    }
}

add_action('wp_head', 'tutannet_header_scripts');

/*---------Hide meta boxes in Editor---------------*/
if (is_admin()) :
function my_remove_meta_boxes() {
 if( !current_user_can('manage_options') ) {
  remove_meta_box('linktargetdiv', 'link', 'normal');
  remove_meta_box('linkxfndiv', 'link', 'normal');
  remove_meta_box('linkadvanceddiv', 'link', 'normal');
  remove_meta_box('trackbacksdiv', 'post', 'normal');
  remove_meta_box('postcustom', 'post', 'normal');
  remove_meta_box('commentstatusdiv', 'post', 'normal');
  remove_meta_box('commentsdiv', 'post', 'normal');
  remove_meta_box('formatdiv', 'post', 'normal');
  remove_meta_box('authordiv', 'post', 'normal');
  remove_meta_box('sqpt-meta-tags', 'post', 'normal');
 }
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
endif;

/*---------Enqueue custom admin panel JS---------------*/
function tutannet_admin_scripts(){
    wp_enqueue_script('tutannet-custom-admin', get_template_directory_uri(). '/inc/option-framework/js/custom-admin.js', array( 'jquery'));    
 }
add_action('admin_enqueue_scripts','tutannet_admin_scripts');

/*---------Enqueue admin css---------------*/
function tutannet_admin_css(){
    wp_enqueue_style('tutannet-admin', get_template_directory_uri(). '/inc/option-framework/css/tutannet-admin.css');    
}
add_action('admin_head','tutannet_admin_css');

/*--------------------- Post Views-------------------*/

function tutannet_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function tutannet_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

/*--------------Sidebar layout for post & pages----------------------*/
function tutannet_sidebar_layout_class($classes){
    global $post;
    	if( is_404()){
    	$classes[] = ' ';
    	}elseif(is_singular()){
 	    $global_sidebar= of_get_option( 'global_post_sidebar' );
    	$post_sidebar = get_post_meta( $post -> ID, 'tutannet_sidebar_layout', true );        
        $page_sidebar = get_post_meta( $post -> ID, 'tutannet_page_sidebar_layout', true );
        if('post'==get_post_type()){
            if($post_sidebar=='global-sidebar'){
                $post_class = $global_sidebar;
            } else {
                $post_class = $post_sidebar;
            }
        	$classes[] = 'single-post-'.$post_class;
        } else {
            $classes[] = 'page-'.$page_sidebar;
        }
    	} elseif(is_archive()){
    	   $archive_sidebar = of_get_option( 'global_archive_sidebar' );
            $classes[] = 'archive-'.$archive_sidebar;
        } elseif(is_search()){
            $archive_sidebar = of_get_option( 'global_archive_sidebar' );
            $classes[] = 'archive-'.$archive_sidebar;
        }else{
    	$classes[] = 'page-right-sidebar';	
    	}
    	return $classes;
    }
add_filter( 'body_class', 'tutannet_sidebar_layout_class' );

/*--------------Template style layout for post & pages----------------------*/

function tutannet_template_layout_class($classes){
    global $post;
    	if( is_404()){
    	$classes[] = ' ';
    	}elseif(is_singular()){
 	    $global_template= of_get_option( 'global_post_template' );
    	$post_template = get_post_meta( $post -> ID, 'tutannet_post_template_layout', true );
        if('post'==get_post_type()){
            if($post_template=='global-template'){
                $post_template_class = $global_template;
            } else {
                $post_template_class = $post_template;
            }
        	$classes[] = 'single-post-'.$post_template_class;
        }       
    	} elseif(is_archive()){
            $archive_template = of_get_option( 'global_archive_template' );
            $classes[] = 'archive-page-'.$archive_template;
        } elseif(is_search()){
            $archive_template = of_get_option( 'global_archive_template' );
            $classes[] = 'archive-page-'.$archive_template;
        }else{
    	$classes[] = 'page-default-template';	
    	}
    	return $classes;
    }
add_filter( 'body_class', 'tutannet_template_layout_class' );

/*---------------------Website layout---------------------------------*/

function tutannet_website_layout_class( $classes ){
    $website_layout = of_get_option( 'website_layout_option' );
    if($website_layout == 'boxed' ){
        $classes[] = 'boxed-layout';
    } else {
        $classes[] = 'fullwidth-layout';
    }
    return $classes;
}
add_filter( 'body_class', 'tutannet_website_layout_class' );

/*----------------------Meta post on -----------------------------------*/
function tutannet_post_meta_cb(){
    global $post;
    $show_post_views = of_get_option('show_post_views');
    $show_comment_count = of_get_option('show_comment_count');
    if($show_comment_count==1){
        $post_comment_count = get_comments_number( $post->ID );
        echo '<span class="comment_count"><i class="fa fa-comments"></i>'.esc_attr( $post_comment_count ).'</span>';
    }
    if($show_post_views==1){
        echo '<span class="apmag-post-views"><i class="fa fa-eye"></i>'.esc_html( tutannet_getPostViews(get_the_ID()) ).'</span>';
    }
}
add_action( 'tutannet_post_meta', 'tutannet_post_meta_cb', 10 );

function tutannet_home_posted_on_cb(){
    global $post;
    
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('d.m.Y') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date('d.m.Y') )
	);
	
	$tagged_on = '';
	$posttags = get_the_tags();
	if ( $posttags ) 
	    {
	        $tag = current( $posttags );
	        $tagged_on = sprintf(
	            '<a href="%1$s">%2$s</a>',
	            get_tag_link( $tag->term_id ),
	            esc_html( $tag->name )
	         );
	    }
    
	$posted_on = sprintf(
    		_x( '%s', 'post date', 'tutannet' ),
    		$time_string
 	);	   
 	
 	if ( get_the_date('d.m.Y') == date('d.m.Y') ) {$post_date_status = 'today'; $posted_on = 'Hôm nay';} 
 	elseif ( strtotime($post->post_date) > strtotime('-7 days') ) {$post_date_status = 'new';}
 	else {$post_date_status = '';}
 	
 	echo '<span class="posted-on '. $post_date_status .'">' . $posted_on . '</span>';
 	echo '<span class="tagged_on">' . $tagged_on . '</span>';   
}
add_action( 'tutannet_home_posted_on', 'tutannet_home_posted_on_cb', 10 );

function tutannet_attachment_image_on_cb(){
	global $post;
	
	$attachments_image = get_children(
	    array(
	    'post_type' => 'attachment',
	    'post_mime_type' => 'image',
	    'post_parent' => $post->ID
	    ));
	    
	$attachments_video = get_children(
	    array(
	    'post_type' => 'attachment',
	    'post_mime_type' => 'video',
	    'post_parent' => $post->ID
	    ));
	
	if ( $attachments_image ) {
		echo '<i class="fa fa-image"></i>';
	}
	
	if ( $attachments_video ) {
		echo '<i class="fa fa-video-camera"></i>';
	}
}
add_action( 'tutannet_attachment_image_on', 'tutannet_attachment_image_on_cb', 10 );

/*-------------------Excerpt length---------------------*/

function tutannet_customize_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'tutannet_customize_excerpt_more' );

function tutannet_word_count( $string, $limit ) {
    $string = strip_tags( $string );
    $string = strip_shortcodes( $string );
    $words = explode( ' ', $string );
	return implode( ' ', array_slice( $words, 0, $limit ));
}

function tutannet_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'tutannet_excerpt_length', 10 );

/*---------------Get excerpt content-------------------*/

function tutannet_excerpt(){
    global $post;
    $excerpt_length = of_get_option( 'excerpt_lenght' );
    $excerpt_content = get_the_excerpt($post -> ID);
    $excerpt_content = tutannet_word_count( $excerpt_content, 10 );
    echo '<p>'. $excerpt_content .'</p>';
}

/*--------------Install Required Plugins----------------------*/

function tutannet_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        
         array(
            'name'      => __( 'Newsletter', 'tutannet' ), //The plugin name
            'slug'      => 'newsletter',  // The plugin slug (typically the folder name)
            'required'  => false,  // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
                  
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
            'default_path' => '',                      // Default absolute path to pre-packaged plugins.
            'menu'         => 'tutannet-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'tutannet' ),
                'menu_title'                      => __( 'Install Plugins', 'tutannet' ),
                'installing'                      => __( 'Installing Plugin: %s', 'tutannet' ), // %s = plugin name.
                'oops'                            => __( 'Something went wrong with the plugin API.', 'tutannet' ),
                'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
                'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
                'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
                'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
                'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
                'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
                'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
                'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
                'return'                          => __( 'Return to Required Plugins Installer', 'tutannet' ),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'tutannet' ),
                'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tutannet' ), // %s = dashboard link.
                'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
          )
    );
    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tutannet_required_plugins' );