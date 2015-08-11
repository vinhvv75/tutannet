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
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tutannet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Home top sidebar', 'tutannet' ),
		'id'            => 'tutannet-home-top-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
   	    'name'          => __( 'Home middle sidebar', 'tutannet' ),
    	'id'            => 'tutannet-home-middle-sidebar',
    	'description'   => '',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</aside>',
    	'before_title'  => '<h1 class="widget-title"><span>',
    	'after_title'   => '</span></h1>',
    ) );
    
    register_sidebar( array(
   	    'name'          => __( 'Home bottom sidebar', 'tutannet' ),
    	'id'            => 'tutannet-home-bottom-sidebar',
    	'description'   => '',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</aside>',
    	'before_title'  => '<h1 class="widget-title"><span>',
    	'after_title'   => '</span></h1>',
    ) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 1', 'tutannet' ),
		'id'            => 'tutannet-footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 2', 'tutannet' ),
		'id'            => 'tutannet-footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 3', 'tutannet' ),
		'id'            => 'tutannet-footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer 4', 'tutannet' ),
		'id'            => 'tutannet-footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'tutannet' ),
		'id'            => 'tutannet-sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
	
    register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'tutannet' ),
		'id'            => 'tutannet-sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Shop', 'tutannet' ),
		'id'            => 'shop',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Header Ad ', 'tutannet' ),
		'id'            => 'tutannet-header-ad',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Article Ad', 'tutannet' ),
		'id'            => 'tutannet-article-ad',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s widget-ads">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Inline Ad', 'tutannet' ),
		'id'            => 'tutannet-homepage-inline-ad',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s widget-ads">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Sidebar Top Ad', 'tutannet' ),
		'id'            => 'tutannet-homepage-sidebar-top-ad',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Sidebar Middle Ad', 'tutannet' ),
		'id'            => 'tutannet-homepage-sidebar-middle-ad',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
}
add_action( 'widgets_init', 'tutannet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tutannet_scripts() {
    $my_theme = wp_get_theme();
    $theme_version = $my_theme->get('Version'); 
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style( 'tutannet-style', get_stylesheet_uri(), array(), esc_attr($theme_version) );    
    wp_enqueue_style( 'easing', get_template_directory_uri() . '/css/easing.css');
    wp_enqueue_style( 'pace-theme', get_template_directory_uri() . '/css/pace-theme.css');
    
    
    /*** TuTanNet JS ***/
    wp_enqueue_script( 'tutannet-scripts', get_template_directory_uri() . '/js/tutannet-scripts.js', array('jquery'), '1.0' );
    wp_enqueue_script( 'tutannet-color-scripts', get_template_directory_uri() . '/js/color.js', array('jquery'), '1.0' );
    
    /*** Tech ***/
    // instant-article
    wp_enqueue_style( 'instant-article', get_template_directory_uri() . '/tech/instant-article/instant-article.css' );
    wp_enqueue_script( 'instant-article', get_template_directory_uri() . '/tech/instant-article/instant-article.js', array('jquery'), '1.0.0' );
    
    // site-header
	wp_enqueue_style( 'site-header', get_template_directory_uri() . '/tech/site-header/site-header.css' );
	wp_enqueue_script( 'site-header', get_template_directory_uri() . '/tech/site-header/site-header.js', array('jquery'), '1.0.0' );
	
	// animated-headline
	wp_enqueue_style( 'animated-headline', get_template_directory_uri() . '/tech/animated-headline/animated-headline.css' );
	wp_enqueue_script( 'animated-headline', get_template_directory_uri() . '/tech/animated-headline/animated-headline.js', array('jquery'), '1.0.0' );
	
	// ajax-login
	wp_enqueue_script( 'tutannet-login-scripts', get_template_directory_uri() . '/tech/ajax-login/login.js', array('jquery'), '1.0' );
	
	// ajax-search
	wp_enqueue_script( 'tutannet-search-scripts', get_template_directory_uri() . '/tech/ajax-search/search.js', array('jquery'), '1.0' );
	
	/*** Lib ***/
	// bootstrap 3.3.5
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap-3.3.5/css/bootstrap.min.css');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap-3.3.5/js/bootstrap.min.js', array('jquery'), '3.3.5' );
	
	// font-awesome  4.4.0
	wp_enqueue_style( 'fontawesome-font', get_template_directory_uri() . '/lib/font-awesome-4.4.0/font-awesome.min.css' );
	
	// color-thief-2.0
	wp_enqueue_script( 'color-thief', get_template_directory_uri() . '/lib/color-thief-2.0/color-thief.min.js', array(jquery), '2.0' );
	
	// jetpack tiled-gallery
	wp_enqueue_style( 'jetpack-tiled-gallery', get_template_directory_uri() . '/tech/tiled-gallery/tiled-gallery.css' );
	wp_enqueue_script( 'jetpack-tiled-gallery', get_template_directory_uri() . '/tech/tiled-gallery/tiled-gallery.js', array(), '', true );
	

	wp_enqueue_script( 'tutannet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/lib/wow.min.js', array(), '1.0.1');
	
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/lib/modernizr.js', array('jquery'), '2.8.3' );
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/lib/pace.min.js', array(), '1.0.0' );
	wp_enqueue_script( 'colors-js', get_template_directory_uri() . '/lib/colors.min.js', array('jquery'), '1.2.4' );
	
    
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
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/tutannet-functions.php';

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