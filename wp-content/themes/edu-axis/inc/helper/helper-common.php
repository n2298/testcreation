<?php
/**
 * Helper functions.
 *
 * @since 1.0.0
 * @package edu-axis
 */

if ( ! function_exists( 'edu_axis_custom_logo' ) ) :
	/**
	 * Custom Logo
	 *
	 * @since 1.0.0
	 */
	function edu_axis_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}
endif;

if ( ! function_exists( 'edu_axis_menu_fallback_cb' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_menu_fallback_cb( $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		switch ( $args['theme_location'] ) {
			case 'primary':
				$label = __( 'Add primary menu', 'edu-axis' );
				break;
			case 'top-right':
				$label = __( 'Add top right menu', 'edu-axis' );
				break;
			case 'top-left':
				$label = __( 'Add top left menu', 'edu-axis' );
				break;
			default:
				$label = __( 'Add a menu', 'edu-axis' );
				break;
		}
		// see wp-includes/nav-menu-template.php for available arguments.
		$link = '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $args['link_before'] . $args['before'] . esc_html( $label ) . $args['after'] . $args['link_after'] . '</a>';

		if ( false !== stripos( $args['items_wrap'], '<ul' ) || false !== stripos( $args['items_wrap'], '<ol' )
		) {
			$link = "<li>$link</li>";
		}
		$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
		if ( ! empty( $args['container'] ) ) {
			$output = sprintf( '<%1$s class="%2$s" >%3$s</%1$s>', $args['container'], $args['container_class'], $output );
		}
		if ( $args['echo'] ) {
			echo $output; // phpcs:ignore 
		}
		return $output;
	}

endif;

if ( ! function_exists( 'edu_axis_strings' ) ) {
	/**
	 * Return All Theme Strings.
	 *
	 * @since 1.0.0
	 *
	 * Return Array of Strings.
	 */
	function edu_axis_strings() {
		$strings = array(
			'enable'     => __( 'Enable', 'edu-axis' ),
			'contact_no' => __( 'Contact Number', 'edu-axis' ),
		);

		return apply_filters( 'edu_axis_filter_strings', $strings );
	}
}


if ( ! function_exists( 'edu_axis_get_post_thumbnail' ) ) {
	/**
	 * Return Post Thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return Array of Strings.
	 */
	function edu_axis_get_post_thumbnail( $post_id, $image_size = 'thumbnail' ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id && ! is_page( $post_id ) ) { // Only for post
			return get_the_post_thumbnail( $post_id, $image_size );
		} elseif ( edu_axis_get_header_image() ) {

			return edu_axis_get_header_image();
		}

		// default image;
		return edu_axis_get_default_thumbnail();

	}
}

if ( ! function_exists( 'edu_axis_get_post_thumbnail_url' ) ) {
	/**
	 * Return Post Thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return Array of Strings.
	 */
	function edu_axis_get_post_thumbnail_url( $post_id, $image_size = 'thumbnail', $default_src = '' ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id ) { // Only for post
			return get_the_post_thumbnail_url( $post_id, $image_size );
		}

		// default image;
		return edu_axis_get_default_thumbnail( true );

	}
}

if ( ! function_exists( 'edu_axis_get_default_thumbnail' ) ) {
	/**
	 * Return Default Thumbnail image.
	 *
	 * @since 1.0.0
	 *
	 * @return HTML.
	 */
	function edu_axis_get_default_thumbnail( $return_url = false, $src = '' ) {
		if ( ! $src ) {
			$src = sprintf( '%s/assets/images/default.jpg', get_template_directory_uri() );
		}
		if ( $return_url ) {
			return $src;
		}
		return sprintf( '<img src="%s" >', $src );
	}
}

if ( ! function_exists( 'edu_axis_get_header_image' ) ) {
	/**
	 * Return Header image.
	 *
	 * @since 1.0.0
	 *
	 * @return HTML.
	 */
	function edu_axis_get_header_image( $return_url = false, $default_src = '' ) {
		$header_image = get_header_image();
		if ( $header_image ) {
			if ( $return_url ) {
				return $header_image; // return src.
			}
			return sprintf( '<img src="%s" >', $header_image );
		}

		if ( $return_url ) {
			return edu_axis_get_default_thumbnail( true, $default_src ); // return src.
		}
		// Return default thumbnail.
		return edu_axis_get_default_thumbnail( false, $default_src );
	}
}

if ( ! function_exists( 'edu_axis_header_title' ) ) {
	/**
	 * Return Header image.
	 *
	 * @param $post_id Post Id
	 * @since 1.0.1
	 *
	 * @return HTML
	 */
	function edu_axis_header_title( $post_id = null ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		ob_start();
		if ( is_home() || is_front_page() ) {
			if ( ! is_front_page() && is_home() ) {
				esc_html_e( 'Blog', 'edu-axis' );
			} else {
				esc_html_e( 'Home', 'edu-axis' );
			}
		} else {
			if ( is_category() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Category : ', 'edu-axis' ), esc_html( single_cat_title( '', false ) ) );
			} elseif ( is_tax() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Archive : ', 'edu-axis' ), esc_html( single_cat_title( '', false ) ) );
			} elseif ( is_tag() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Archive : ', 'edu-axis' ), esc_html( single_tag_title( '', false ) ) );
			} elseif ( is_day() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Archive : ', 'edu-axis' ), esc_html( get_the_time( 'd' ) ) );
			} elseif ( is_month() ) {
				echo sprintf( '<span>%s</span><em>%s, %s</em>', esc_html__( 'Archive : ', 'edu-axis' ), esc_html( get_the_time( 'F' ) ), esc_html( get_the_time( 'Y' ) ) );
			} elseif ( is_year() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Archive : ', 'edu-axis' ), esc_html( get_the_time( 'Y' ) ) );
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Author : ', 'edu-axis' ), esc_html( $userdata->display_name ) );
			} elseif ( is_search() ) {
				echo sprintf( '<span>%s</span><em>%s</em>', esc_html__( 'Search Results for : ', 'edu-axis' ), get_search_query() );
			} elseif ( is_404() ) {
				esc_html_e( 'Error 404', 'edu-axis' );
			} elseif ( ! is_single() && ! is_page() && get_post_type() !== 'post' && ! is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo esc_html( $post_type->labels->singular_name );
			} else {
				echo esc_html( get_the_title() );
			}
		}
		$title = ob_get_contents();
		ob_end_clean();
		$title = apply_filters( 'edu_axis_filter_header_title', $title, $post_id );
		echo $title; // phpcs:ignore
	}
}


if ( ! function_exists( 'edu_axis_has_woocommerce' ) ) :

	/**
	 * Check if WooCommerce exists.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Active status.
	 */
	function edu_axis_has_woocommerce() {
		if ( class_exists( 'WooCommerce' ) ) {
			return true;
		}
		return false;
	}

endif;

