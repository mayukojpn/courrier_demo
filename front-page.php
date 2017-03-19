<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Courrier-mobile
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main swiper-container" role="main">
			<div class="swiper-wrapper">

			<?php

			$cats = get_categories();

			foreach ( $cats as $cat ):
				$acf_cat_id = 'category_'.$cat->term_id;
				$acf_cat    = get_field( 'catimg', $acf_cat_id );

				?>
			<article class='swiper-slide'>
				<div class="entry-header">
					<div class="entry-image">
						<a href="<?php echo get_category_link($cat->term_id); ?>" rel="bookmark">
							<?php echo wp_get_attachment_image($acf_cat, 'full'); ?>
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
			<?php

			endforeach;


			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

				if( has_post_thumbnail() ) {

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', 'cover' );
				}


				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
