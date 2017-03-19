<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Courrier-mobile
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'swiper-slide' ); ?> data-url="<?php echo esc_url( get_permalink() ); ?>">
	<div class="entry-header">
		<div class="entry-image">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
		<?php
		/*
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">', '</h2>' );
		endif;
		*/ ?>
	</div><!-- .entry-header -->
</article><!-- #post-## -->
