<?php get_header(); ?>
</header>
<div class="container">
		
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<aside id="sidebar1" >
					<div class="sidebar-container">			
						<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
						<div class="clear"></div>
					</div>
				</aside>
			<?php } 
			
		    best_magazine_content_posts_for_home();  
			
             if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
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