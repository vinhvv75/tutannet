<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package TuTanNet
 */
?>

	

    <footer id="colophon" class="site-footer" role="contentinfo">
    
        <?php 
            if($tutannet_show_footer_switch!='0'){
            if ( is_active_sidebar( 'tutannet-footer-1' ) ||  is_active_sidebar( 'tutannet-footer-2' )  || is_active_sidebar( 'tutannet-footer-3' ) || is_active_sidebar( 'tutannet-footer-4' )  ) : ?>
			<div class="top-footer footer-<?php echo esc_attr($tutannet_footer_layout); ?>">
    			<div class="tutannet-container">
                    <div class="footer-block-wrapper clearfix">
        				<div class="footer-block-1 footer-block wow fadeInLeft" data-wow-delay="0.5s">
        					<?php if ( is_active_sidebar( 'tutannet-footer-1' ) ) : ?>
        						<?php dynamic_sidebar( 'tutannet-footer-1' ); ?>
        					<?php endif; ?>
        				</div>
        
        				<div class="footer-block-2 footer-block wow fadeInLeft" data-wow-delay="0.8s" style="display: <?php if( $tutannet_footer_layout == 'column1' ){ echo 'none'; } else { echo 'block'; }?>;">
        					<?php if ( is_active_sidebar( 'tutannet-footer-2' ) ) : ?>
        						<?php dynamic_sidebar( 'tutannet-footer-2' ); ?>
        					<?php endif; ?>	
        				</div>
        
        				<div class="footer-block-3 footer-block wow fadeInLeft" data-wow-delay="1.2s" style="display: <?php if ( $tutannet_footer_layout == 'column1' || $tutannet_footer_layout == 'column2' ){ echo 'none'; } else { echo 'block'; } ?>;">
        					<?php if ( is_active_sidebar( 'tutannet-footer-3' ) ) : ?>
        						<?php dynamic_sidebar( 'tutannet-footer-3' ); ?>
        					<?php endif; ?>	
        				</div>
                        <div class="footer-block-4 footer-block wow fadeInLeft" data-wow-delay="1.2s" style="display: <?php if ( $tutannet_footer_layout != 'column4' ){ echo 'none'; } else { echo 'block'; }?>;">
        					<?php if ( is_active_sidebar( 'tutannet-footer-4' ) ) : ?>
        						<?php dynamic_sidebar( 'tutannet-footer-4' ); ?>
        					<?php endif; ?>	
        				</div>
                    </div> <!-- footer-block-wrapper -->
                 </div><!--tutannet-container-->
            </div><!--top-footer-->
        <?php endif; } ?>
        	         
        <div class="bottom-footer clearfix">
            <div class="tutannet-container">
            <?php if( $tutannet_sub_footer_switch == 1 ){ ?>
        		<div class="site-info">
                    <?php if( $tutannet_copyright_symbol == 1 ){ ?>
                        <span class="copyright-symbol"><?php echo esc_attr( $trans_copyright ) ; ?> &copy; <?php echo date( 'Y' ) ?></span>
                    <?php } ?> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php
                        if( !empty( $tutannet_copyright_text ) ){ 
                            echo '<span class="copyright-text">'.esc_html( $tutannet_copyright_text ).'</span>'; 
                        }
                    ?> 
                    </a>           
        		</div><!-- .site-info -->
            <?php } ?>
                <div class="ak-info">
                    <?php _e( 'Powered by ', 'tutannet' );  ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'tutannet' ) ); ?>"><?php _e( 'WordPress', 'tutannet' ); ?> </a>
                    <?php _e( '| Theme: ' );?>
                    <a title="TuTanNet Themes" href="<?php echo esc_url( 'http://chuatutan.net', 'tutannet' ); ?>">TuTanNet</a>
                </div>
             <?php if ( ( has_nav_menu( 'footer_menu' ) ) && ( $tutannet_sub_footer_switch == 1 ) ) { ?>      
                <div class="subfooter-menu">
                    <nav id="footer-navigation" class="footer-main-navigation" role="navigation">
                        <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Footer Menu', 'tutannet' ); ?></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_class' => 'footer_menu' ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
             <?php } ?>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>