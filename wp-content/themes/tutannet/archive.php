<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TuTanNet
 */

get_header(); ?>
<div class="container">
    	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
            $archive_template = of_get_option( 'global_archive_template' );
            if($archive_template=='default-template'){
                $archive_template = 'archive-default';
            } else {
                $archive_template = 'archive-style1';
            } 
            if ( have_posts() ) : 
        ?>

			<header class="page-header">
				<?php
					tutannet_the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
                    get_template_part( 'content', $archive_template );
				?>

			<?php endwhile; wp_reset_query(); ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
 $sidebar_option = of_get_option('global_archive_sidebar');
 if($sidebar_option!='no-sidebar'){
        $option_value = explode('-',$sidebar_option); 
        get_sidebar($option_value[0]);
    }
?>
</div>
<?php get_footer(); ?>