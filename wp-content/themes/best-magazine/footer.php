<?php
global $best_magazine_options;
extract($best_magazine_options);
?>
<div id="footer">
    <div>
    <?php  if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
				<div class="footer-sidbar">
                    <div id="sidebar-footer" class="container">
                      <?php  dynamic_sidebar( 'footer-widget-area' ); 	?>
                      <div class="clear"></div>
                    </div>	
                </div>     	
            <?php } ?>
            
        <div id="footer-bottom">
            <span id="copyright"><?php if($footer_text_enable=='on') echo stripslashes( $footer_text );  ?></span>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>