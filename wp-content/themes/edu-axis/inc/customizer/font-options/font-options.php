<?php
/**
 * Font Options for customizer.
 *
 * @package edu-axis
 * @since 1.0.0
 */


if ( ! function_exists( 'edu_axis_get_google_fonts' ) ) :

	/**
	 * Returns list of google font.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_get_google_fonts() {

		$fonts = array(
			'open-sans'  => array(
				'name'  => 'Open Sans',
				'label' => 'Open Sans, sans-serif',
			),
			'oswald'     => array(
				'name'  => 'Oswald',
				'label' => 'Oswald, sans-serif',
			),
			'pt-sans'    => array(
				'name'  => 'PT Sans',
				'label' => 'PT Sans, sans-serif',
			),
			'roboto'     => array(
				'name'  => 'Roboto',
				'label' => 'Roboto, sans-serif',
			),
			'montserrat' => array(
				'name'  => 'Montserrat',
				'label' => 'Montserrat, sans-serif',
			),

		);
		$fonts = apply_filters( 'edu_axis_filter_google_fonts', $fonts );

		if ( ! empty( $fonts ) ) {
			ksort( $fonts );
		}

		return $fonts;

	}

endif;

if ( ! function_exists( 'edu_axis_get_system_fonts' ) ) :

	/**
	 * Returns list of system fornts.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_get_system_fonts() {

		$fonts = array(
			'arial'      => array(
				'name'  => 'Arial',
				'label' => 'Arial, sans-serif',
			),
			'georgia'    => array(
				'name'  => 'Georgia',
				'label' => 'Georgia, serif',
			),
			'cambria'    => array(
				'name'  => 'Cambria',
				'label' => 'Cambria, Georgia, serif',
			),
			'tahoma'     => array(
				'name'  => 'Tahoma',
				'label' => 'Tahoma, Geneva, sans-serif',
			),
			'sans-serif' => array(
				'name'  => 'Sans Serif',
				'label' => 'Sans Serif, Arial',
			),
			'verdana'    => array(
				'name'  => 'Verdana',
				'label' => 'Verdana, Geneva, sans-serif',
			),
		);
		$fonts = apply_filters( 'edu_axis_filter_system_fonts', $fonts );

		if ( ! empty( $fonts ) ) {
			ksort( $fonts );
		}
		return $fonts;

	}

endif;

if ( ! function_exists( 'edu_axis_get_font_option_choices' ) ) :

	/**
	 * Returns list of font options to use in customizer font option.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_get_font_option_choices() {

		$google_fonts = edu_axis_get_google_fonts();
		$system_fonts = edu_axis_get_system_fonts();

		$all_fonts = array_merge( $google_fonts, $system_fonts );

		$font_options = array();
		if ( ! empty( $all_fonts ) ) {
			foreach ( $all_fonts as $k => $v ) {
				$font_options[ $k ] = esc_html( $v['label'] );
			}
		}
		if ( ! empty( $font_options ) ) {
			ksort( $font_options );
		}
		return $font_options;

	}

endif;

if ( ! function_exists( 'edu_axis_get_font_family_customizer_settings' ) ) :

	/**
	 * Returns list of customizer options and default font setting.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_get_font_family_customizer_settings() {

		$default = edu_axis_get_default_theme_options();

		$choices = array(
			'font_site_title'   => array(
				'label'   => __( 'Site Title', 'edu-axis' ),
				'default' => $default['font_site_title'], // This default key is just to check if value is changed or not.
			),
			'font_site_default' => array(
				'label'   => __( 'Default', 'edu-axis' ),
				'default' => $default['font_site_default'],
			),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'edu_axis_get_google_fonts_url' ) ) :

	/**
	 * Return google font URL.
	 *
	 * @since 1.0.0
	 * @return string URL.
	 */
	function edu_axis_get_google_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		$font_settings = edu_axis_get_font_family_customizer_settings();
		$google_fonts  = edu_axis_get_google_fonts();

		// Get all Used font family in customizer.
		$used_fonts = array();
		if ( ! empty( $font_settings ) ) {
			foreach ( $font_settings as $k => $v ) {
				$used_fonts[] = edu_axis_get_option( $k );
			}
		}
		$used_fonts = array_unique( $used_fonts );

		// Filter used google fonts form used fonts.
		$used_google_fonts = array();

		if ( ! empty( $used_fonts ) ) {
			foreach ( $used_fonts as $used_font ) {
				if ( array_key_exists( $used_font, $google_fonts ) ) {
					$used_google_fonts[] = $used_font;
				}
			}
		}

		if ( ! empty( $used_google_fonts ) ) {
			foreach ( $used_google_fonts as $google_font ) {
				$fonts[] = $google_fonts[ $google_font ]['name'] . ':400italic,700italic,300,400,500,600,700';
			}
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				),
				'//fonts.googleapis.com/css'
			);
		}

		return $fonts_url;

	}

endif;

// To disply font family in frontend.
if ( ! function_exists( 'edu_axis_get_font_family' ) ) :
	function edu_axis_get_font_family( $args = '' ) {
		if ( ! $args ) {
			return;
		}

		$font_options = edu_axis_get_option( $args );
		$choices      = edu_axis_get_font_option_choices();

		if ( is_array( $font_options ) ) {
			$fonts = array();
			foreach ( $font_options as $k => $font_key ) {
				if ( isset( $choices[ $font_key ] ) ) {
					$fonts[ $k ] = $choices[ $font_key ];
				}
			}
			return $fonts;

		} else {
			if ( isset( $choices[ $font_options ] ) ) {
				return $choices[ $font_options ];
			}
			return;
		}
	}
endif;
