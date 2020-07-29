<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package edu-axis
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses edu_axis_header_style()
 */
function edu_axis_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'edu_axis_filter_custom_header_args',
			array(
				'default-image'      => sprintf( '%s/assets/images/default.jpg', esc_url( get_template_directory_uri() ) ),
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'edu_axis_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'edu_axis_custom_header_setup' );

if ( ! function_exists( 'edu_axis_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see edu_axis_custom_header_setup().
	 */
	function edu_axis_header_style() {
		$args = array(
			'header_title_color',
			'font_site_title',
		);
		$options = edu_axis_get_option( $args );
		$title_color       = $options['header_title_color']; // Default title color
		$header_text_color = get_header_textcolor(); // Default Text color

		$default_theme_options = edu_axis_get_default_theme_options();

		$font_args = array(
			'font_site_title',
			'font_site_default'
		);
		// $fonts = edu_axis_get_font_family( $font_args );
		$fonts = edu_axis_get_font_family( 'font_site_title' );
		$fonts = edu_axis_get_font_family( 'font_site_default' );
		
		// echo $options['font_site_title'] .'-----';
		// print_r( $fonts );

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color && $title_color === $default_theme_options['header_title_color'] ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-branding .site-branding-text .site-title,
			.site-branding .site-branding-text .site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-branding .site-branding-text .site-title a{
				color: <?php echo esc_attr( $title_color ); ?>;
			}
			.site-branding .site-branding-text .site-description {
				color: <?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
