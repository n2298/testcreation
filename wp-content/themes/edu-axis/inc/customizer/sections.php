<?php
/**
 * Edu Axis Theme Options Customize Section.
 *
 * @since 1.0.0
 * @package edu-axis
 */

 /**
  * Customizer Sections.
  */
function edu_axis_get_customizer_sections() {
	$sections = array(

		// Theme Options.
		'font_family_options'    => array(
			'title'    => __( 'Font Family', 'edu-axis' ),
			'priority' => 9,
			'panel'    => 'theme_option_panel',
		),
		'loader_options'         => array(
			'title'    => __( 'Loader', 'edu-axis' ),
			'priority' => 10,
			'panel'    => 'theme_option_panel',
		),
		'layout_options'         => array(
			'title'    => __( 'Layout', 'edu-axis' ),
			'priority' => 20,
			'panel'    => 'theme_option_panel',
		),
		'topbar_options'         => array(
			'title'       => __( 'Topbar', 'edu-axis' ),
			'description' => esc_html__( 'Check to enable Topbar.', 'edu-axis' ),
			'priority'    => 30,
			'panel'       => 'theme_option_panel',
		),
		'header_options'         => array(
			'title'    => __( 'Header', 'edu-axis' ),
			'priority' => 40,
			'panel'    => 'theme_option_panel',
		),
		'breadcrumb_options'     => array(
			'title'    => __( 'Breadcrumb', 'edu-axis' ),
			'priority' => 50,
			'panel'    => 'theme_option_panel',
		),
		'blog_options'           => array(
			'title'    => __( 'Blog', 'edu-axis' ),
			'priority' => 60,
			'panel'    => 'theme_option_panel',
		),
		'excerpt_options'        => array(
			'title'    => __( 'Excerpt', 'edu-axis' ),
			'priority' => 70,
			'panel'    => 'theme_option_panel',
		),
		'pagination_options'     => array(
			'title'    => __( 'Pagination', 'edu-axis' ),
			'priority' => 80,
			'panel'    => 'theme_option_panel',
		),
		'footer_options'         => array(
			'title'    => __( 'Footer', 'edu-axis' ),
			'priority' => 90,
			'panel'    => 'theme_option_panel',
		),
		'back_to_top_options'    => array(
			'title'    => __( 'Back to Top', 'edu-axis' ),
			'priority' => 100,
			'panel'    => 'theme_option_panel',
		),

		// Front Page Options.
		'edu_axis_slider'        => array(
			'title'    => esc_html__( 'Edu Axis Slider', 'edu-axis' ),
			'priority' => 10,
			'panel'    => 'homepage_option_panel',
		),
		'edu_axis_why_us'        => array(
			'title'    => esc_html__( 'Why us Section', 'edu-axis' ),
			'priority' => 20,
			'panel'    => 'homepage_option_panel',
		),
		'homepage_content'       => array(
			'title'    => esc_html__( 'Content', 'edu-axis' ),
			'priority' => 30,
			'panel'    => 'homepage_option_panel',
		),
		'homepage_about_us'      => array(
			'title'    => esc_html__( 'About us Section', 'edu-axis' ),
			'priority' => 40,
			'panel'    => 'homepage_option_panel',
		),
		'homepage_featured_post' => array(
			'title'    => esc_html__( 'Available Classes Section', 'edu-axis' ),
			'priority' => 50,
			'panel'    => 'homepage_option_panel',
		),

		'homepage_cta'           => array(
			'title'    => esc_html__( 'Call to action Section', 'edu-axis' ),
			'priority' => 60,
			'panel'    => 'homepage_option_panel',
		),
		'homepage_latest_blogs'  => array(
			'title'       => esc_html__( 'Recent Blog', 'edu-axis' ),
			'description' => esc_html__( 'For more options, go to "Theme Options > Blog"', 'edu-axis' ),
			'priority'    => 70,
			'panel'       => 'homepage_option_panel',
		),

		// Reset All Options.
		'reset_section'          => array(
			'title'    => __( 'Reset All Options', 'edu-axis' ),
			'priority' => 200,
		),
	);
	return apply_filters( 'edu_axis_filter_customizer_sections', $sections );
}



