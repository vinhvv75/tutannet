<?php
/*
Template Name: AjaxPost
*/
?>



<?php
	$post = get_post($_GET['id']);
?>
<?php if ($post) : ?>
	<?php setup_postdata($post); ?>
	<div class="instant-article">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
			
			<div class="entry"> 
				<?php the_content(); ?>
			</div>		
		</div>
	</div>
<?php endif; ?>