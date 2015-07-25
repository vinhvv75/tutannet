<?php 
global $best_magazine_options;
extract($best_magazine_options);


get_header(); ?>
</header>
		<div class="container">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<aside id="sidebar1">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'sidebar-1' );	?>
					<div class="clear"></div>
				</div>
			</aside>
		<?php } ?>
			<div id="blog" class="blog" ><?php

			 if(have_posts()) { 
					while (have_posts()) {
						the_post(); ?>
				<div class="blog-post home-post">				 
					<a class="title_href" href="<?php echo get_permalink() ?>">
					   <h2><?php the_title(); ?></h2>
					</a><?php  if($date_enable){ ?>
                         <div class="home-post-date">
                            <?php echo best_magazine_posted_on();?>
                         </div>
						<?php } 
					   if($grab_image)
					   {
			            echo best_magazine_display_thumbnail(150,150); 
			           }
				       else 
					   {
					    echo best_magazine_thumbnail(150,150);
				       }
					  if($blog_style) 
                        {
                           the_excerpt();
                        }
                        else 
                        {
                           the_content(__('More','best-magazine'));
					    }  
						 ?><div class="clear"></div>	
					
				</div>
				<?php  }
				if( $wp_query->max_num_pages > 2 ){ ?>
					<div class="page-navigation">
						<?php posts_nav_link(); ?>
					</div>	   
				<?php }
				} ?>
				<div class="clear"></div>			
			</div>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<aside id="sidebar2">
				<div class="sidebar-container">
				  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
				  <div class="clear"></div>
				</div>
			</aside>
		<?php } ?>
		</div>
<?php get_footer(); ?>