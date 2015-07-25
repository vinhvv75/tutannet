<?php get_header(); ?>
<?php best_magazine_slideshow();
		
	  best_magazine_top_posts(); ?>
</header>

<div class="container">
		
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<aside id="sidebar1" >
					<div class="sidebar-container">			
						<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
						<div class="clear"></div>
					</div>
				</aside>
			<?php } ?>
			<div id="content">
			<?php
			if( 'posts' == get_option( 'show_on_front' ) ){
				best_magazine_category_tab();
				best_magazine_home_video_post();
				best_magazine_content_posts();
            }				
			elseif('page' == get_option( 'show_on_front' ))
				best_magazine_content_posts_for_home();
			?>		
            </div>
           <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<aside id="sidebar2">
				<div class="sidebar-container">
				  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
				  <div class="clear"></div>
				</div>
			</aside>
		<?php } ?>
		<div class="clear"></div>

  </div>

<?php get_footer(); ?>
