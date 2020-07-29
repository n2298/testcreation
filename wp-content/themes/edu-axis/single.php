<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package edu-axis
 */

get_header();

$args = array(
	'page_layout',
	'sidebar_position_post',
);

$options       = edu_axis_get_option( $args );
$page_layout   = $options['page_layout'];
$sidebar_class = edu_axis_get_sidebar_class();

if ( 'left-sidebar' == $sidebar_class ) {
	get_sidebar();
}
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php
	if ( 'right-sidebar' == $sidebar_class ) {
		get_sidebar();
	}

	get_footer();
