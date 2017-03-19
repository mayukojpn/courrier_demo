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
			$monthly_cat = get_term_by( 'slug', 'monthly', 'category' );
			$exclude_cat_id = '';
			if ($monthly_cat){

							$args = array(
								'parent' => (int)$monthly_cat->term_id
							);

			}

			$cats = get_categories( $args );

			foreach ( $cats as $cat ):
				$cat_id          = $cat->term_id;
				$exclude_cat_id .= $cat_id.',';
				$acf_cat_id      = 'category_'.$cat_id;
				$acf_cat         = get_field( 'catimg', $acf_cat_id );
				if ( !empty($acf_cat) ):
				?>
					<article class='swiper-slide' data-url="<?php echo get_category_link($cat->term_id); ?>">
						<div class="entry-header">
							<div class="entry-image">
								<a href="<?php echo get_category_link($cat->term_id); ?>" rel="bookmark">
									<?php echo wp_get_attachment_image($acf_cat, 'full'); ?>
								</a>
							</div>
						</div><!-- .entry-header -->
					</article><!-- #post-## -->
				<?php

				endif;

			endforeach;

			$args = array(
				'exclude' => $exclude_cat_id
			);

			$cats = get_categories( $args );

			foreach ( $cats as $cat ):
				$cat_id          = $cat->term_id;
				$acf_cat_id      = 'category_'.$cat_id;
				$acf_cat         = get_field( 'catimg', $acf_cat_id );
				if ( !empty($acf_cat) ):
				?>
					<article class='swiper-slide'>
						<div class="entry-header">
							<div class="entry-image">
								<a href="<?php echo get_category_link($cat->term_id); ?>" rel="bookmark">
									<?php echo wp_get_attachment_image($acf_cat, 'full'); ?>
								</a>
							</div>
						</div><!-- .entry-header -->
					</article><!-- #post-## -->
				<?php

				endif;

			endforeach; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
