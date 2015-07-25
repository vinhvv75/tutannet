<?php 
global $best_magazine_options;
extract($best_magazine_options);

?>
<?php get_header(); 
/*update page layout*/
global $post;
best_magazine_wpb_set_post_views($post->ID);// most populiar

$best_magazine_meta = get_post_meta($post->ID,'best_magazine_meta_date',TRUE);
	/*update page layout end*/
	best_magazine_update_page_layout_meta_settings();
?>
</header>
<div class="container">
	<?php 
	/* SIDBAR1 */	
	if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <aside id="sidebar1">
        <div class="sidebar-container">
            <?php  dynamic_sidebar( 'sidebar-1' ); 	?>	
			<div class="clear"></div>
        </div>
    </aside>
    <?php }?>
	<div id="content">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
		<div class="single-post">
		<?php  $url = wp_get_attachment_url( get_post_thumbnail_id() );
			
			    if ( has_post_thumbnail() && $url ) { ?>
				  <div class="post-thumbnail-div">
					  <div class="post-thumbnail" style="background-image:url(<?php echo esc_url( $url );?>);">
					  </div>
					  <h2 class="single-title"><?php the_title(); ?></h2>
				  </div> 
			   <?php } else{ ?>
			   <h2><?php the_title(); ?></h2>
			  <?php }?>
		        
			<div class="entry">	
			    <?php  the_content(); ?>
			</div>
            <?php if($date_enable){ ?>
			<div class="entry-meta">
				  <?php best_magazine_posted_on_single(); ?>
			</div>
			 <?php best_magazine_entry_meta_cat(); }?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Page', 'best-magazine' ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="page-links-number">', 'link_after' => '</span>' ) ); 
	best_magazine_post_nav(); ?>
	<div class="clear"></div>
	<?php  if(comments_open()) {  ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php }	 ?>
	</div>

<?php endwhile; ?>

<?php endif;   ?>
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