<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package edu-axis
 */

if ( ! function_exists( 'edu_axis_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function edu_axis_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf( '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">%1$s</a></span>', $time_string ); // phpcs:ignore

	}
endif;

if ( ! function_exists( 'edu_axis_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function edu_axis_posted_by( $icon_size = 40 ) {
		if ( is_author() ) {
			return;
		}

		echo '<span class="byline"> <span class="author vcard">' . get_avatar( get_the_author_meta( 'ID' ), $icon_size ) . '
		<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'; // phpcs:ignore
	}
endif;

if ( ! function_exists( 'edu_axis_post_comment' ) ) {
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function edu_axis_post_comment() {
		echo '<span class="comment-meta"><a href="' . get_comments_link() . '">' . absint( wp_count_comments( get_the_ID() )->approved ) . '</a></span>';  // phpcs:ignore
	}
}

if ( ! function_exists( 'edu_axis_post_tag' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edu_axis_post_tag( $options = array() ) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			if ( ! $options ) { // this value only passed from blog archive.
				$args          = array(
					'hide_post_tags',
				);
				$options = edu_axis_get_option( $args );
			}

			if ( ! $options['hide_post_tags'] ) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'edu-axis' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">%1$s</span>', $tags_list ); // phpcs:ignore
				}
			}
		}
	}
endif;

if ( ! function_exists( 'edu_axis_post_category' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edu_axis_post_category( $post_id = false ) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type( $post_id ) ) {
			$hide_post_category = edu_axis_get_option( 'hide_post_category' );
			if ( ! $hide_post_category['hide_post_category'] ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'edu-axis' ), '', $post_id ); // seperator, parent, post_id
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">%1$s</span>', $categories_list ); // phpcs:ignore
				}
			}
		}
	}
endif;

if ( ! function_exists( 'edu_axis_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edu_axis_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'edu-axis' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'edu-axis' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'edu_axis_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function edu_axis_post_thumbnail( $size = 'post-thumbnail' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $size ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					$size,
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>
			<?php
		endif; // End is_singular().
	}
endif;
