<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edu-axis
 */

 /**
  * Hook - edu_axis_action_doctype.
  *
  * @hooked edu_axis_doctype -  10
  */
 do_action( 'edu_axis_action_doctype' );
?>
<head>	
	<?php
	/**
	 * Hook - edu_axis_action_head.
	 *
	 * @hooked edu_axis_head -  10
	 */
	do_action( 'edu_axis_action_head' );
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<?php
	/**
	 * Body Open Hook to add Additional scripts inside body tag.
	 */
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}

	/**
	 * Hook - edu_axis_action_before_start.
	 *
	 * @hooked edu_axis_loader - 10
	 * @hooked edu_axis_page_wrapper_start -  10
	 * $hooked edu_axis_screen_reader_text - 10
	 */
	do_action( 'edu_axis_action_before_start' );

	/**
	 * Hook - edu_axis_action_before_header.
	 *
	 * @hooked edu_axis_header_wrapper_start - 10
	 * @hooked edu_axis_top_section - 10
	 */
	do_action( 'edu_axis_action_before_header' );

	/**
	 * Hook - edu_axis_action_header.
	 *
	 * @hooked edu_axis_header - 10
	 */
	do_action( 'edu_axis_action_header' );

	/**
	 * Hook - edu_axis_action_after_header.
	 *
	 * @hooked edu_axis_header_wrapper_end - 10
	 * @hooked edu_axis_slider - 10
	 */
	do_action( 'edu_axis_action_after_header' );

	/**
	 * Hook - edu_axis_action_before_content.
	 *
	 * @hooked edu_axis_main_slider 10
	 * @hooked edu_axis_get_breadcrumb 20
	 * @hooked edu_axis_woocommerce_main_content_ends 30 [ need to be after breadcrubm ]
	 * @hooked edu_axis_main_content_start - 40
	 */
	do_action( 'edu_axis_action_before_content' );

	/**
	 * Hook - edu_axis_action_content.
	 *
	 */
	do_action( 'edu_axis_action_content' );
