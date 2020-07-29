<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edu-axis
 */

get_header();
$hide_home_content = apply_filters( 'edu_axis_filter_hide_home_content', false );
if ( ! $hide_home_content ) :
	$args    = array(
		'page_layout',
		'sidebar_position_page',
	);
	$options = edu_axis_get_option( $args );

	$sidebar_class = edu_axis_get_sidebar_class();
	if ( 'left-sidebar' == $sidebar_class ) {
		get_sidebar();
	} ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			do_action( 'edu_axis_action_posts_navigation' );
			?>
		</main> <!-- #main -->
	</section><!-- #primary -->
	<?php
	if ( 'right-sidebar' == $sidebar_class ) {
		get_sidebar();
	}
endif;
get_footer();

