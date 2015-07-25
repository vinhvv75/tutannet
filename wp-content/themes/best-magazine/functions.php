<?php

	/*****************Empty***************************/
	/* 				INCLUDE ADMIN		   		*/
	/********************************************/
	
require_once('admin/main_admin_controler.php');
require_once('front_end/front_end_functions.php');


	/********************************************/
	/*  ADD REQUERID SCRIPTS STYLES FRONT END	*/
	/********************************************/
	

add_filter('wp_enqueue_scripts','best_magazine_include_requerid_scripts_for_theme');
function best_magazine_include_requerid_scripts_for_theme(){
	global $best_magazine_options;
	extract($best_magazine_options);
	$best_magazine_slider_options=array(
		"animation_speed" => $animation_speed,
		"effect" => $effect,
		"image_height" => $image_height,
		"slideshow_interval" => $slideshow_interval,
		"stop_on_hover" => $stop_on_hover,
	);
	wp_enqueue_script('jquery-effects-core');	
	wp_enqueue_script('jquery-effects-explode');	
	wp_enqueue_script('jquery-effects-slide');	
	wp_enqueue_script('jquery-effects-transfer');
	
	wp_enqueue_script('best_magazine_custom_js',get_template_directory_uri().'/scripts/javascript.js',array('jquery'));
	
	if($hide_slider && is_home() && count($imgs_url) && is_array($imgs_url)){ 
		wp_register_script('best_magazine_slider_js',get_template_directory_uri().'/scripts/slider.js',array('jquery'));
		wp_localize_script('best_magazine_slider_js', 'best_magazine_slider_options', $best_magazine_slider_options);
		wp_enqueue_script('best_magazine_slider_js');
	}
	
	wp_enqueue_script('best_magazine_response', get_template_directory_uri().'/scripts/responsive.js', array('jquery'), false, true);
	wp_enqueue_style( 'best_magazine-style', get_stylesheet_uri(), array(), '2013-11-18' );
	wp_enqueue_style( 'best_magazine-slideshow-style', get_template_directory_uri().'/slideshow/style.css', array(), '2013-11-18' );
	//if ( is_singular() && get_theme_mod( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}


	/***********************************/
	/* 		 HEAD ADDED CODE		   */
	/***********************************/
add_filter('wp_head','best_magazine_custom_head');
function best_magazine_custom_head(){
	global $best_magazine_options;
	extract($best_magazine_options);
	?><script>var skzbi_hasce="<?php echo get_template_directory_uri();?>";</script><?php
	if(($custom_css_enable=='on'))
	echo "<style>".esc_html( $custom_css_text )."</style>";	
}

	/*************************************/
	/*FUNCTIONS FOR PAGE/POST INFORMATION*/
	/*************************************/

function best_magazine_posted_on() {
	printf( __( '<span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>', 'best-magazine' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
} 

function best_magazine_posted_on_single() {
	printf( __( '<span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep author"></span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'best-magazine' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'best-magazine' ), get_the_author() ) ),
		get_the_author()
	);
}

function best_magazine_entry_meta_cat() {
	$categories_list = get_the_category_list(', ' );
	echo '<div class="entry-meta-cat">';
	if ( $categories_list ) {
		echo '<span class="categories-links"><span class="sep category"></span> ' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', ' , ' );
	if ( $tag_list ) {
		echo '<span class="tags-links"><span class="sep tag"></span>' . $tag_list . '</span>';
	}
	echo '</div>';
}

function best_magazine_wp_title( $title, $sep ) {
	global $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";


	return $title;
}
add_filter( 'wp_title', 'best_magazine_wp_title', 10, 2 );

function best_magazine_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next    = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<nav class="page-navigation">
			<?php previous_post_link( '%link', _x('<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'best-magazine' ) ); ?> 
			<?php next_post_link( '%link', _x('%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'best-magazine' )  ); ?>
		</nav>
	<?php
}

	/*************************************/
	/*	   UPDATE MOST POPULIAR POSTS    */
	/*************************************/

function best_magazine_wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
       delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

	/*************************************/
	/*   REGISTR SIDBARS [WIDGET AREA]   */
	/*************************************/

function best_magazine_widgets_init()
{

    // Area 1, located at the top of the sidebar.

    register_sidebar(array(

            'name' => __('Primary Widget Area','best-magazine'),

            'id' => 'sidebar-1',

            'description' => __('The primary widget area','best-magazine'),

            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',

            'after_widget' => '</div> ',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(

            'name' => __('Secondary Widget Area','best-magazine'),

            'id' => 'sidebar-2',

            'description' => __('The secondary widget area','best-magazine'),

            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',

            'after_widget' => '</div>',

            'before_title' => '<h3 class="widget-title">',

            'after_title' => '</h3>',
        )
    );
	
	// footer widget area
	
	register_sidebar(array(

            'name' => __('Footer Widget Area','best-magazine'),

            'id' => 'footer-widget-area',

            'description' => __('The secondary widget area','best-magazine'),

            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',

            'after_widget' => '</div>',

            'before_title' => '<h3 class="widget-title">',

            'after_title' => '</h3>',
        )
    );
	
	
	
  
}
add_action('widgets_init', 'best_magazine_widgets_init');


	/*************************************/
	/*        BODY CLASS BAD CLASS       */
	/*************************************/

add_filter('body_class', 'best_magazine_multisite_body_classes');
function best_magazine_multisite_body_classes($classes){
	foreach($classes as $key=>$class)
	{
		if($class=='blog')
		$classes[$key]='blog_body';
	}
	return $classes;
	
}

	/*************************************/
	/* CALL FUNCTIONS AFTER THEME SETUP  */
	/*************************************/

function best_magazine_setup_elements()
{
	// add custom header in admin menu
	add_theme_support( 'custom-header', array(
	    'default-text-color'  => '220e10',
		'default-image'       => '',
		'header-text'         => false,
		'height'              => 230,
		'width'               => 1024	
		
	) );
	
	// add custom background in admin menu
	$expert_defaults = array(
		'default-color'          => 'FEFEFE',
		'default-image'          => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);	
	add_theme_support( 'custom-background', $expert_defaults );
	
	// For Post thumbnail
	add_theme_support('post-thumbnails', array('post'));
    set_post_thumbnail_size(150, 150);
	
	// requerid  features
	add_theme_support('automatic-feed-links');
	
	/// include language
	load_theme_textdomain('best-magazine', get_template_directory() . '/languages' );
	
	// registr menu,
    register_nav_menu('primary-menu', __('Primary Menu','best-magazine'));
	
	// for editor styles
	add_editor_style();
}
add_action('after_setup_theme', 'best_magazine_setup_elements');




	/**************************************/
	/*FUNCTION FOR FRONT END PRINT CONTENT*/
	/**************************************/

function best_magazine_the_excerpt_max_charlength($charlength,$content=false) {
	
	if($content){
		$excerpt=$content;
	}
	else{
		$excerpt = get_the_excerpt();
	}
	$charlength++;
	
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut ).'...';
		} else {
			echo $subex.'...';
		}
	} 
	else {
		echo $excerpt;
	}
}

	/**************************************/
	/*	GET POST FRSTIMAGE FOR WHUMBNAIL  */
	/**************************************/

function best_magazine_catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if(isset($matches [1] [0])){	
    	$first_img = $matches [1] [0];
	}
    if (empty($first_img)) {
        $first_img = get_template_directory_uri() . "/images/default.jpg";
    }
    return $first_img;
}


function best_magazine_first_image($width, $height,$url_or_img=0)
{
    $thumb = best_magazine_catch_that_image();
    if ($thumb) {
        $str = "<img src=\"";
        $str .= $thumb;
        $str .= '"';
        $str .= 'alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'" border="0" />';
        return $str;
    }
}

function best_magazine_empty_thumb()
{
    $thumb = get_post_custom_values("Image");
    return !empty($thumb);
}


	/**************************************/
	/*  GENERETE IMAGE FOR POST THUMBNAIL */
	/**************************************/


function best_magazine_display_thumbnail($width, $height)
{
    if (has_post_thumbnail()) the_post_thumbnail(array($width, $height));
    elseif (!best_magazine_empty_thumb()) {
        return best_magazine_first_image($width, $height);
    } else {
        return best_magazine_post_thumbnail($width, $height);
    }
}

function best_magazine_thumbnail($width, $height)
{
    if (has_post_thumbnail())
        the_post_thumbnail(array($width, $height));
    elseif (best_magazine_empty_thumb()) {
    	return best_magazine_post_thumbnail($width, $height);
    }
	else
		return '';
}

	/**************************************/
	/*   REMOVE MORE IN POSTS AND PAGES   */
	/**************************************/

function best_magazine_remove_more_jump_link($link)
{
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'best_magazine_remove_more_jump_link');

	/**************************************/
	/*   REMOVE MORE IN POSTS AND PAGES   */
	/**************************************/





/*******************************/
/*PAGE AND POST LEAYUT METADATE*/
/*******************************/

function best_magazine_update_page_layout_meta_settings()
{
    /*update page layout*/
    global $post,$best_magazine_options;
	extract($best_magazine_options);
	
	if(isset($post))
    	$best_magazine_meta_date = get_post_meta($post->ID, 'best_magazine_meta_date', TRUE);

	if(!isset($best_magazine_meta_date['content_width']))
		$best_magazine_meta_date['content_width'] = esc_html( $content_area );
	if(!isset($best_magazine_meta_date['main_col_width']))
		$best_magazine_meta_date['main_col_width'] = esc_html( $main_column );
	if(!isset($best_magazine_meta_date['layout']))
		$best_magazine_meta_date['layout'] = esc_html( $default_layout );
	if(!isset($best_magazine_meta_date['pr_widget_area_width']))
		$best_magazine_meta_date['pr_widget_area_width'] = esc_html( $pwa_width );
		
   if (isset($best_magazine_meta_date['fullwidthpage']) && $best_magazine_meta_date['fullwidthpage']=='on') {
		$them_content_are_width='100%';
		?><script>var full_width_magazine = 1</script><?php
	}
	else {
		if(isset($best_magazine_meta_date['content_width']))
			$them_content_are_width = esc_html( $best_magazine_meta_date['content_width'] ). "px;";
		else
			$them_content_are_width = esc_html( $content_area ). "px;";
		?><script>var full_width_magazine = 0</script><?php	
	}
  
    switch ($best_magazine_meta_date['layout']) {
        case 1:
			?>
            <style type="text/css">
			#sidebar1,
			#sidebar2 {
				display:none;
			}
			#blog	{
				display:block; 
				float:left;
			};
       
            .container{
				width:<?php echo $them_content_are_width; ?>
            }        
            #blog{
				width:<?php echo $them_content_are_width; ?>
            }               
            </style>
			<?php
            break;
        case 2:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:right;
			}
			#blog{
				display:block;
				float:left;
			} 
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $best_magazine_meta_date['main_col_width'] ; ?>%;
            }
            #sidebar1{
				width:<?php echo (100 - $best_magazine_meta_date['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 3:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $best_magazine_meta_date['main_col_width'] ; ?>%;
            }
            #sidebar1{
				width:<?php echo (100 -  $best_magazine_meta_date['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 4:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block; float:right;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $best_magazine_meta_date['main_col_width'] ; ?>%;
            }
            #sidebar1{
				width:<?php if(isset($best_magazine_meta_date['pr_widget_area_width'])) echo $best_magazine_meta_date['pr_widget_area_width'] ; ?>%;
            }
            #sidebar2{
				width:<?php echo (100 -  $best_magazine_meta_date['pr_widget_area_width'] - $best_magazine_meta_date['main_col_width']); ?>%;
            }
            </style>
			 <?php
            break;
        case 5:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:left;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog, #content{
				display:block;
				float:right;
			}
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $best_magazine_meta_date['main_col_width'] ; ?>%;
            }
            #sidebar1{
				width:<?php echo $best_magazine_meta_date['pr_widget_area_width'] ; ?>%;
            }
            #sidebar2{
				width:<?php echo (100 - $best_magazine_meta_date['pr_widget_area_width'] - $best_magazine_meta_date['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 6:
		?>
            <style type="text/css">
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block;
				float:left; 
			} 
			#blog{
				display:block;
				float:left;
			}    			       
            .container{
				width:<?php echo $them_content_are_width; ?>
            }
            #blog{
				width:<?php echo $best_magazine_meta_date['main_col_width']; ?>%;
            }
            #sidebar1{
				width:<?php echo $best_magazine_meta_date['pr_widget_area_width']; ?>%;
            }
            #sidebar2{
				width:<?php echo (100 - $best_magazine_meta_date['pr_widget_area_width'] - $best_magazine_meta_date['main_col_width']); ?>%;
            }            
            </style><?php
            break;
    }
    /*update page layout end*/
}



		/******************************************/
		/* OTHER FUNCTION HELP FOR CREATING THEME */
		/******************************************/


function best_magazine_remove_last_comma($string=''){
	
	if(substr($string,-1)==',')
		return substr($string, 0, -1);
	else
		return $string;
	
}



?>
