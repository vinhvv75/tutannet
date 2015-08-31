<?php
/**
 * TuTanNet functions and definitions
 *
 * @package TuTanNet
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tutannet_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tutannet_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TuTanNet, use a find and replace
	 * to change 'tutannet' to the name of your theme in all the template files
	 */
	 
	 load_theme_textdomain( 'tutannet', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'tutannet-slider-big-thumb', 765, 496, true); //Big image for homepage slider
    add_image_size( 'tutannet-slider-small-thumb', 364, 164, true); //Small image for homepage slider
    add_image_size( 'tutannet-block-big-thumb', 554, 305, true ); //Big thumb for homepage block
    add_image_size( 'tutannet-block-medium-thumb', 369, 203, true ); //Big thumb for homepage block
    add_image_size( 'tutannet-block-small-thumb', 177, 118, true ); //Small thumb for homepage block
    add_image_size( 'tutannet-singlepost-default', 1132, 509, true); //Default image size for single post
    add_image_size( 'tutannet-singlepost-style1', 326, 235, true); //Style1 image size for single post 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tutannet' ),
		'top_menu' => __( 'Top Menu', 'tutannet' ),
		'top_menu_right' => __( 'Top Menu (Right)', 'tutannet' ),
		'footer_menu' => __( 'Footer Menu', 'tutannet' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'audio',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'static_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tutannet_setup
add_action( 'after_setup_theme', 'tutannet_setup' );


/**
 * Enqueue scripts and styles.
 */
function tutannet_scripts() {
    $my_theme = wp_get_theme();
    $version = $my_theme->get('Version'); 
    
//    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css');
    
    
    wp_enqueue_style( 'tutannet-style', get_stylesheet_uri(), array(), esc_attr($version) );    
    wp_enqueue_style( 'easing', get_template_directory_uri() . '/css/easing.css');
    wp_enqueue_style( 'pace-theme', get_template_directory_uri() . '/css/pace-theme.css');
    
    
    /*** TuTanNet JS ***/
    wp_enqueue_script( 
    	'tutannet-scripts', 
    	get_template_directory_uri() . '/js/tutannet-scripts.js', 
    	array('jquery'), 
    	$version 
    );
    wp_register_script( 
    	'tutannet-color-scripts', 
    	get_template_directory_uri() . '/js/color.js', 
    	array('jquery','tinycolor','color-thief'), 
    	$version 
    );
    wp_enqueue_script( 
    	'tutannet-time-scripts', 
    	get_template_directory_uri() . '/js/time.js', 
    	array('jquery','suncalc','amlich-hnd','planet-phase'), 
    	$version 
    );
//    wp_register_script( '
//    	tutannet-star-scripts', 
//    	get_template_directory_uri() . '/js/star.js', 
//    	array('jquery'), 
//    	$version 
//    );
    
    /*** Tech ***/
    // instant-article
    wp_enqueue_style( 'instant-article', get_template_directory_uri() . '/tech/instant-article/instant-article.css' );
    wp_enqueue_script( 'instant-article', get_template_directory_uri() . '/tech/instant-article/instant-article.js', array('jquery', 'modernizr'), $version );
    
    // site-header
	wp_enqueue_style( 'site-header', get_template_directory_uri() . '/tech/site-header/site-header.css' );
	wp_enqueue_script( 'site-header', get_template_directory_uri() . '/tech/site-header/site-header.js', array('jquery'), $version );
	
	// animated-headline
	wp_enqueue_style( 'animated-headline', get_template_directory_uri() . '/tech/animated-headline/animated-headline.css' );
	wp_enqueue_script( 'animated-headline', get_template_directory_uri() . '/tech/animated-headline/animated-headline.js', array('jquery'), $version );
	
	// ajax-login
	wp_enqueue_script( 'tutannet-login-scripts', get_template_directory_uri() . '/tech/ajax-login/login.js', array('jquery'), $version );
	
	// ajax-search
	wp_enqueue_script( 'tutannet-search-scripts', get_template_directory_uri() . '/tech/ajax-search/search.js', array('jquery'), $version );
	
	// ajax-load
	wp_register_script( 'tutannet-load', get_template_directory_uri() . '/tech/ajax-load/ajax-load.js', array('jquery'), $version );
	wp_enqueue_script( 'tutannet-load-news-scripts', get_template_directory_uri() . '/tech/ajax-load/ajax-load-scripts-news.js', array('jquery', 'tutannet-load'), $version );
	wp_enqueue_script( 'tutannet-load-teaching-scripts', get_template_directory_uri() . '/tech/ajax-load/ajax-load-scripts-teaching.js', array('jquery' , 'tutannet-load', 'color-thief' , 'tinycolor'), $version );
	wp_register_script( 'tutannet-load-media-scripts', get_template_directory_uri() . '/tech/ajax-load/ajax-load-scripts-media.js', array('jquery' , 'tutannet-load'), $version );
	
	// vinyl-cover
	wp_enqueue_style( 'vinyl-cover', get_template_directory_uri() . '/tech/vinyl-cover/vinyl-cover.css' );
	wp_enqueue_script( 'vinyl-cover', get_template_directory_uri() . '/tech/vinyl-cover/vinyl-cover.js', array('jquery', 'velocity', 'tutannet-load-media-scripts'), $version );
	
	
	
	/*** Lib ***/
	
	// bootstrap 3.3.5
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap-scripts', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '3.3.5' );
	
	// font-awesome  4.4.0
	wp_enqueue_style( 'fontawesome-font', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	
	// color-thief-2.0
	wp_register_script( 'color-thief', get_template_directory_uri() . '/lib/color-thief-2.0/color-thief.min.js', array('jquery'), '2.0' );
	
	// tinycolor 1.1.2
	wp_register_script( 'tinycolor', 'https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.1.2/tinycolor.min.js', array('jquery'), '1.1.2');
	
	// vietnamese lunar calendar
	wp_register_script( 'amlich-hnd', get_template_directory_uri() . '/lib/amlich-hnd.js');
	
	// planet phase
	wp_register_script( 'planet-phase', get_template_directory_uri() . '/lib/planet-phase.js');
	
	// suncalc
	wp_register_script( 'suncalc', get_template_directory_uri() . '/lib/suncalc.min.js', array('jquery'));	
	
	// wow 1.1.2
	wp_enqueue_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', '1.1.2');
	
	// velocity 1.2.2
	wp_register_script( 'velocity', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js', array('jquery'));
		
	// modernizr 2.8.3
	wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'));
	
	// pace 1.0.2
	wp_enqueue_script( 'pace', 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js' );
	
	
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tutannet_scripts' );




/**
 * Framework path
 */
require get_template_directory().'/inc/option-framework/options-framework.php';

/**
 * YouTube Embed path
 */
require get_template_directory().'/inc/youtube-embed/youtube-embed.php';

/**
 * WP-User-Avatar path
 */
//require get_template_directory().'/inc/wp-user-avatar/wp-user-avatar.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/tutannet-functions.php';

/**
 * Custom gallery functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/tutannet-gallery-functions.php';

/**
 * Custom event functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/tutannet-event-functions.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Options AP-Mag Widgets
 */
require get_template_directory() . '/inc/tutannet-widgets.php';

/**
 * Load Options Plugin Activation
 */
require get_template_directory() . '/inc/tutannet-plugin-activation.php';

/**
 * Load AJAX Login
 */
require_once get_template_directory() . '/tech/ajax-login/ajax-auth.php';


define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri(). '/inc/option-framework/');