<?php
/**
 * Edu Axis Reset.
 *
 * @since 1.0.0
 * @package edu-axis
 */



if ( ! function_exists( 'edu_axis_reset_customizer' ) ) :
	/**
	 * Reset customizer options
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the reset is checked.
	 */
	function edu_axis_reset_customizer() {
		$reset = edu_axis_get_option( 'reset_customizer' );
		if ( true === $reset ) {
			// Reset custom theme options.
			set_theme_mod( 'theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
		}
	}
endif;
add_action( 'customize_save_after', 'edu_axis_reset_customizer' );
