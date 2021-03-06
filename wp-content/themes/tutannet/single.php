<?php
/**
 * The template for displaying all single posts.
 *
 * @package TuTanNet
 */

get_header(); 
global $post;
$post_template_value =( of_get_option( 'global_post_template' ) == 'default-template' ) ? 'single' : 'style1';

$tutannet_post_template = get_post_meta( $post -> ID, 'tutannet_post_template_layout', true );
if($tutannet_post_template=='global-template'){
    $content_value = $post_template_value;
} 
else {
    if( $tutannet_post_template == 'default-template' ){
        $content_value = 'single';
    } else {
        $content_value = 'style1';
    }
} 
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', $content_value ); ?>
            <?php 
                $tutannet_show_author_box = of_get_option( 'show_author_box' );
                if( $tutannet_show_author_box == 1 ):
            ?>
            <div class="author-metabox">
                <?php
                    $author_id = $post->post_author;
                    $author_avatar = get_avatar( $author_id, '106' );
                    $author_nickname = get_the_author_meta( 'display_name' );                
                ?>
                <div class="author-avatar">
                    <a class="author-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo $author_avatar; ?></a>
                </div>
                <div class="author-desc-wrapper">                
                    <a class="author-title" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_attr( $author_nickname ); ?></a>
                    <div class="author-description"><?php echo get_the_author_meta('description');?></div>
                    <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) );?>" target="_blank"><?php echo esc_url( get_the_author_meta( 'user_url' ) );?></a>
                </div>
            </div><!--author-metabox-->
            <?php endif ;?>

			<?php 
                $show_post_navigation = of_get_option( 'show_post_nextprev' );
                if($show_post_navigation!='0'){ tutannet_post_navigation(); }
             ?>

			<?php
                // If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
            
            <?php tutannet_setPostViews(get_the_ID()); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
    $global_sidebar= of_get_option( 'global_post_sidebar' );
    $post_sidebar = get_post_meta( $post -> ID, 'tutannet_sidebar_layout', true );
    if( $post_sidebar == 'global-sidebar' ){
        $sidebar_option = $global_sidebar;
    } else {
        $sidebar_option = $post_sidebar;
    }
    if( $sidebar_option != 'no-sidebar' ){
        $option_value = explode( '-', $sidebar_option ); 
        get_sidebar( $option_value[0] );
    }
 ?>
</div>
<?php get_footer(); ?>