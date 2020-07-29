<?php

/**
 * Load Styles.
 *
 * @since 1.0.0
 */


if ( ! function_exists( 'edu_axis_theme_styles' ) ) :

	/**
	 * Hook to add theme style.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_theme_styles() {

		/**
		 * Hook - edu_axis_action_theme_styles.
		 *
		 * @hooked edu_axis_custom_theme_styles -  10
		 */
		do_action( 'edu_axis_action_theme_styles' );

	}

endif;

add_action( 'wp_head', 'edu_axis_theme_styles', 80 );


if ( ! function_exists( 'edu_axis_custom_theme_styles' ) ) :
	/**
	 * Theme Styles.
	 */
	function edu_axis_custom_theme_styles() {
		?>
		<style type="text/css">
			<?php
			// Font Styles.
			$font_settings = edu_axis_get_font_family_customizer_settings();
			if ( ! empty( $font_settings ) ) {

				$font_args = array_keys( $font_settings );
				$options   = edu_axis_get_option( $font_args );

				$customizer_fonts     = array();
				$customizer_font_args = array();
				foreach ( $font_settings as $key => $val ) {
					if ( ! empty( $options[ $key ] ) && $val['default'] !== $options[ $key ] ) { // set if value is different than default.
						$customizer_fonts[ $key ] = $options[ $key ];
						$customizer_font_args[]   = $key;
					}
				}

				if ( ! empty( $customizer_fonts ) ) {
					$fonts = edu_axis_get_font_family( $customizer_font_args );
					foreach ( $customizer_fonts as $option_key => $font_key ) {
						switch ( $option_key ) {
							case 'font_site_title':
								?>
								.site-branding .site-branding-text .site-title,
								.site-branding .site-branding-text .site-title a,
								h1, h2, h3, h4, h5, h6 {
									font-family: <?php echo esc_attr( $fonts[ $option_key ] ); ?>
								}
								<?php
								break;
							case 'font_site_default':
								?>
								body, p {
									font-family: <?php echo esc_attr( $fonts[ $option_key ] ); ?>
								}
								<?php
								break;
						}
					}
				}
			} // End of Font Styles.
			?>
		</style>
		<?php

	}
endif;
add_action( 'edu_axis_action_theme_styles', 'edu_axis_custom_theme_styles' );
