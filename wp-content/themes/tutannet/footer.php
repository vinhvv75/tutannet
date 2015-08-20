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
                <div class="row">
	                <div class="tutannet-info col-md-3 col-lg-3">
	                	
	                </div>
	                <div class="tutannet-info col-md-3 col-lg-3">
	                	<h1></h1>
	                	
	                </div>
	                <div class="tutannet-info col-md-3 col-lg-3">
	                	<h1>Liên hệ</h1>
	                	<p>Địa chỉ: 90/153 Trường Chinh, P.12, Quận Tân Bình, TPHCM</p>
	                	<p>Điện Thoại: 08.3845 8297</p>
	                </div>
	                <div class="tutannet-info col-md-3 col-lg-3">
	                	<h1>Về ChuaTuTan.net</h1>
	                	<p>&#169; copyright <?php echo date("Y"); ?> Tu Tan Monastery,  All rights reserved.</p>
	                	<p>&#174; Chùa Từ Tân giữ bản quyền nội dung trên website này.</p>
	                	<a href="#"></a>
	                </div>
                </div>
            
            </div>
        </div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>
