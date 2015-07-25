<?php 
/*The template for displaying Archive pages*/
global $best_magazine_options;
extract($best_magazine_options);
get_header(); 

?>
</header>
<div class="container"><?php 
	/* SIDBAR1 */	
	if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <aside id="sidebar1">
        <div class="sidebar-container">
            <?php  dynamic_sidebar( 'sidebar-1' ); 	?>	
			<div class="clear"></div>
        </div>
    </aside>
    <?php }?>

	<div id="blog" class="blog archive-page">

	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; ?>
		
		<?php  if (is_category()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For The ', 'best-magazine'); ?>&ldquo;<?php single_cat_title(); ?>&rdquo; <?php _e('Category', 'best-magazine'); ?></h2>
	 	<?php  } elseif( is_tag() ) { ?>
		<h2 class="styledHeading"><?php _e('Posts Tagged ', 'best-magazine'); ?>&ldquo;<?php single_tag_title(); ?>&rdquo;</h2>
		<?php  } elseif (is_day()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'best-magazine'); ?><?php the_time(get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_month()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'best-magazine'); ?><?php the_time(get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_year()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'best-magazine'); ?><?php the_time(get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_author()) { ?>
		<h2 class="styledHeading"><?php _e('Author Archive', 'best-magazine'); ?></h2>
		<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="styledHeading"><?php _e('Blog Archives', 'best-magazine'); ?></h2>
	 	<?php } ?>
			
		<?php while (have_posts()) : the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post">
				<h3 class="archive-header"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	
			</div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark">
			<?php
				            if($grab_image && !has_post_thumbnail()) 
                            {
                               echo best_magazine_display_thumbnail(150,150); 
                            }
                            else 
                            {
                               echo best_magazine_thumbnail(150,150);
                            }
			?>
			</a>
			<?php  if($blog_style){the_excerpt();}else{the_content();}  ?>
			

		</div>
        <?php if($date_enable) best_magazine_entry_meta(); ?>
		<?php endwhile; ?>
		  <div class="page-navigation">
		       <?php posts_nav_link(); ?>
	        </div>
	<?php else : ?>

		<h3 class="archive-header"><?php _e('Not Found', 'best-magazine'); ?></h3>
		<p><?php _e('There are not posts belonging to this category or tag. Try searching below:', 'best-magazine'); ?></p>
		<div id="search-block-category"><?php get_search_form(); ?></div>
	
	<?php endif; ?>
	
	 <?php 
	  if(comments_open())
	  {  ?>
			<div class="comments-template">
				<?php echo comments_template();	?>
			</div>
	<?php
		} ?>
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
</div>
	
<?php get_footer(); ?>
