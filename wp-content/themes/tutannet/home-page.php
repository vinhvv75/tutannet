<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TuTanNet
 */
get_header();
?>

	<?php 
		function catch_that_image() {
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();
		  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		  $first_img = $matches[1][0];
		
		  if(empty($first_img)) {
		    $first_img = "/path/to/default.png";
		  }
		  return $first_img;
		}
	?>

	<div id="primary" class="content-area cd-main">
		<main id="main" class="site-main cd-gallery" role="main">
						
			<div ng-view></div>			
			 			
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>