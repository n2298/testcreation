<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edu-axis
 */

$args    = array(
	'hide_post_date',
	'hide_post_author',
	'hide_post_category',
	'hide_post_tags',
	'hide_post_featured_image',
	'archive_content_type',
);
$options = edu_axis_get_option( $args );

$thumbnail_url = get_the_post_thumbnail_url();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-post-image">
		<div class="rt-featured-image">
			<?php
			if ( ! $options['hide_post_featured_image'] ) {
				if( ( ! is_front_page() && is_home() ) || is_archive() ) {
					$image_size = 'edu-axis-thumbnail';
				} else {
					$image_size = 'edu-axis-featured';

				}
				// edu_axis_post_thumbnail( $image_size );
				edu_axis_post_thumbnail( $image_size );
			}
			?>
		</div>
	</div><!-- .featured-post-image -->

	<div class="entry-container ">
		<header class="entry-header">
			<?php if ( ! is_single() ) : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php else : ?>
				<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php endif; ?>
		</header>
		<div class="entry-meta ">
			<?php edu_axis_posted_on(); ?>
			<?php edu_axis_post_category(); ?>
			<?php edu_axis_post_tag( $options ); ?>
		</div><!-- .entry-meta -->

		<div class="entry-content">
			<?php
			if ( 'full_content' === $options['archive_content_type'] || is_single() ) {

				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'edu-axis' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edu-axis' ),
						'after'  => '</div>',
					)
				);
			} else {
				the_excerpt();
			}
			?>
		</div><!-- .entry-content -->
		<?php if ( ! $options['hide_post_author'] ) : ?>
			<div class="author-meta">
				<?php edu_axis_posted_by( 18 ); ?>
			</div><!-- .author-meta -->
		<?php endif; ?>

	</div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->

