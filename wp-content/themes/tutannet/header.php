<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Accesspress Mag
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'accesspress-mag' ); ?></a>
    <?php 
        $accesspress_mag_logo = get_theme_mod( 'header_image' );
        $branding_class = '';
        $accesspress_mag_top_menu_switch = of_get_option( 'top_menu_switch' );
        $accesspress_mag_logo_alt = of_get_option( 'logo_alt' );
        $accesspress_mag_logo_title = of_get_option( 'logo_title' );
    ?>  
	
    <header id="masthead" class="site-header" role="banner">    
        
        <div class="top-menu-wrapper clearfix">
            <div class="apmag-container">   
            <?php if ( has_nav_menu( 'top_menu' ) ) { ?>   
                <nav id="top-navigation" class="top-main-navigation" role="navigation">
                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu', 'accesspress-mag' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container_class' => 'top_menu_left' ) ); ?>
                </nav><!-- #site-navigation -->
            <?php } ?>
            <?php if ( has_nav_menu( 'top_menu_right' ) ) { ?>        
                <nav id="top-right-navigation" class="top-right-main-navigation" role="navigation">
                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu Right', 'accesspress-mag' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'top_menu_right', 'container_class' => 'top_menu_right' ) ); ?>
                </nav><!-- #site-navigation -->
            <?php } ?>
            </div>
        </div>
         
        <div class="logo-ad-wrapper clearfix">
            <div class="apmag-container">
        		<div class="site-branding <?php echo esc_attr( $branding_class ) ;?>">
                    <div class="sitelogo-wrap">  
                        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $accesspress_mag_logo ) ;?>" alt="<?php echo esc_attr( $accesspress_mag_logo_alt ); ?>" title="<?php echo esc_attr( $accesspress_mag_logo_title ); ?>" /></a>
                        <meta itemprop="name" content="<?php bloginfo( 'name' )?>" />
                    </div>
                    <div class="sitetext-wrap">  
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </a>
                    </div>                   
                 </div><!-- .site-branding -->        		
                
                
                <?php if ( is_active_sidebar( 'accesspress-mag-header-ad' ) ) : ?>
                    <div class="header-ad">
                        <?php dynamic_sidebar( 'accesspress-mag-header-ad' ); ?> 
                    </div><!--header ad-->
                <?php endif; ?>                
                
            </div>
        </div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="apmag-container">
                <div class="nav-wrapper">
                    <div class="nav-toggle hide">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                    </div>
        			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu' ) ); ?>
                </div>

                <?php get_search_form(); ?> 
            </div>
		</nav><!-- #site-navigation -->
        
	</header><!-- #masthead -->

	<div id="content" class="site-content">