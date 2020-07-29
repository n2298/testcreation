<?php
/**
 * Edu Axis Theme Options Customize Panel.
 *
 * @since 1.0.0
 * @package edu-axis
 */

 /**
  * Customizer Panels.
  */
function edu_axis_get_customizer_panels() {
	$panels = array(
		'theme_option_panel'    => array(
			'title'       => esc_html__( 'Theme Options ', 'edu-axis' ),
			'description' => esc_html__( 'Theme Options.', 'edu-axis' ),
			'priority'    => 90,
		),
		'homepage_option_panel' => array(
			'title'       => esc_html__( 'Front Page Options ', 'edu-axis' ),
			'description' => esc_html__( 'Front Page Options.', 'edu-axis' ),
			'priority'    => 100,
		),
	);
	return apply_filters( 'edu_axis_filter_customizer_panels', $panels );
}
