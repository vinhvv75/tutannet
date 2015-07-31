<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package TuTanNet
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="apmag-container">
					<div class="page-content">
						<div class="page-404-wrap clearfix">
							<span class="oops"><?php _e( 'Oops!!', 'tutannet' );?></span>
							<div class="error-num"> 
							<span class="num"><?php _e( '404', 'tutannet' );?></span>
							<span class="not_found"><?php _e( 'Page Not Found', 'tutannet' );?></span>
							</div>
						</div>
					</div><!-- .page-content -->
				</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
