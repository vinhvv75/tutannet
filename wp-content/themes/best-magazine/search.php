<?php  get_header();
global $best_magazine_options;
extract($best_magazine_options); ?>
</header>
 <div class="container"><?php
 if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<aside id="sidebar1">
		<div class="sidebar-container">
			<?php  dynamic_sidebar( 'sidebar-1' ); 	?>	
			<div class="clear"></div>
		</div>
	</aside>
<?php }  ?>
    <div id="content" class="blog search-page">
        <div class="single-post">
            <h1>
                <a href="<?php the_permalink(); ?>"><?php echo __('Search','best-magazine'); ?></a>
            </h1>
        </div>
            <?php get_search_form(); ?>
        
        <?php /*print page content*/ 
        if( have_posts() ) { 
            while( have_posts()){ 
                the_post(); ?>
                 <div class="search-result">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <div class="entry">
					    <?php  if($blog_style=="on") 
							{
							   best_magazine_the_excerpt_max_charlength(300);
							}
							else 
							{
							   the_content(); 
							}  ?>
						<div class="clear"></div>
                    </div>
                </div>
      <?php } ?>
	           <div class="page-navigation">
					<?php posts_nav_link(); ?>
			   </div>
      <?php }
		else { ?>
		    <div class="search-no-result">
           <?php echo __(" Nothing was found. Please try another keyword.","best-magazine");  ?>
			</div>
		<?php } ?>
	</div>
	 <?php
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
		<?php   
get_footer(); ?>
