<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edu-axis
 */

get_header();
$hide_home_content = apply_filters( 'edu_axis_filter_hide_home_content', false );
if ( ! $hide_home_content ) :

	if ( is_front_page() && ! is_home() ) :

		/**
		 * edu_axis_action_front_page hook
		 *
		 * @since 1.0.0
		 */
		do_action( 'edu_axis_action_front_page' );

	else :

		$args = array(
			'page_layout',
			'sidebar_position_archive',
		);

		$options       = edu_axis_get_option( $args );
		$page_layout   = $options['page_layout'];
		$sidebar_class = edu_axis_get_sidebar_class();

		if ( 'left-sidebar' == $sidebar_class ) {
			get_sidebar();
		}
		?>
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php if ( is_home() ) : ?>
					<div class="blog-posts-wrapper"> <!-- Blog Wrapper -->
				<?php endif; ?>
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-archive' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;


					endwhile; // End of the loop.
					?>
				<?php do_action( 'edu_axis_action_posts_navigation' ); ?>
				<?php if ( is_home() ) : ?>
					</div>
				<?php endif; ?>
			</main> <!-- #main -->
		</section><!-- #primary -->

		<?php
		if ( 'right-sidebar' == $sidebar_class ) {
			get_sidebar();
		}
		?>
				
		<?php
	endif;
endif;
get_footer();
