<?php
/**
 * Accesspress Mag functions and definitions
 *
 * @package Accesspress Mag
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_mag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_mag_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Accesspress Mag, use a find and replace
	 * to change 'tutannet' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tutannet', get_template_directory() . '/languages' );

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
endif; // accesspress_mag_setup
add_action( 'after_setup_theme', 'accesspress_mag_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_mag_widgets_init() {
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
add_action( 'widgets_init', 'accesspress_mag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_mag_scripts() {
	$font_args = array(
        'family' => 'Open+Sans:400,600,700,300|Oswald:400,700,300|Dosis:400,300,500,600,700',
    );
    wp_enqueue_style('google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));
    $my_theme = wp_get_theme();
    $theme_version = $my_theme->get('Version'); 
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style( 'tutannet-style', get_stylesheet_uri(), array(), esc_attr($theme_version) ); 
    wp_enqueue_style( 'fontawesome-font', get_template_directory_uri(). '/css/font-awesome.min.css' );	
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'easing', get_template_directory_uri() . '/css/easing.css');
    wp_enqueue_style( 'pace-theme', get_template_directory_uri() . '/css/pace-theme.css');
    wp_enqueue_style( '3d-folding-panel-style', get_template_directory_uri() . '/js/codyhouse/3d-folding-panel-style.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

    wp_enqueue_script( 'bxslider-js', get_template_directory_uri(). '/js/jquery.bxslider.min.js', array(), '4.1.2', true );
    wp_enqueue_script( 'tutannet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'tutannet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.1');
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/codyhouse/modernizr.js', array('jquery'), '2.8.3' );
	wp_enqueue_script( 'tutannet-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '1.0.1' );
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array(), '1.0.0' );
	wp_enqueue_script( 'instant-article', get_template_directory_uri() . '/js/instant-article.js', array(), '1.0.0' );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_mag_scripts' );


/**
 * Framework path
 */
require get_template_directory().'/inc/option-framework/options-framework.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

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
require get_template_directory() . '/inc/accesspress-widgets.php';

/**
 * Load Options Plugin Activation
 */
require get_template_directory() . '/inc/accesspress-plugin-activation.php';

define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri(). '/inc/option-framework/');