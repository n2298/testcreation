<?php
/**
 * Edu Axis Theme Options.
 *
 * @since 1.0.0
 * @package edu-axis
 */

if ( ! function_exists( 'edu_axis_get_default_theme_options' ) ) :

	/**
	 * Function to get default theme options
	 *
	 * @since 1.0.0
	 * @return array Default theme options.
	 */
	function edu_axis_get_default_theme_options() {

		$defaults = array();

		// Colors.
		$defaults['header_title_color']   = '#1abc9c';
		$defaults['header_tagline_color'] = '#656565';

		// Theme Options > Loader.
		$defaults['enable_loader'] = true;

		// Theme Options > Layout.
		$defaults['page_layout']               = 'page-layout-boxed';
		$defaults['sidebar_position_page']     = 'right-sidebar';
		$defaults['sidebar_position_post']     = 'right-sidebar';
		$defaults['sidebar_position_homepage'] = 'right-sidebar';
		$defaults['sidebar_position_archive']  = 'right-sidebar';

		// Theme Options > Topbar.
		$defaults['enable_topbar'] = true;

		// Theme Options > Header.
		$defaults['show_title']          = true;
		$defaults['show_tagline']        = true;
		$defaults['sticky_primary_menu'] = true;
		$defaults['absolute_header']     = false;
		$defaults['hide_header_image']   = false;

		// Theme Options > Breadcrumb.
		$defaults['enable_breadcrumb'] = false;

		// Theme Options > Blog.
		$defaults['hide_post_date']           = false;
		$defaults['hide_post_author']         = false;
		$defaults['hide_post_category']       = false;
		$defaults['hide_post_tags']           = false;
		$defaults['hide_post_featured_image'] = false;
		$defaults['archive_content_type']     = 'post_excerpt';

		// Theme Options > Excerpt.
		$defaults['excerpt_length'] = 30;
		$defaults['readmore_text']  = __( 'Read More', 'edu-axis' );

		// Theme Options > Pagination
		$defaults['pagination_type'] = 'default';

		// Theme Options > Footer
		$defaults['footer_copyright'] = __( '&copy; Copyright. All Right Reserved.', 'edu-axis' );

		// Theme Options > Back to top Options.
		$defaults['back_to_top']  = false;
		$defaults['scroll_speed'] = 1000;

		// Front Page Options > Slider.
		$defaults['enable_slider']          = true;
		$defaults['slider_type']            = 'post_slider';
		$defaults['number_of_slider']       = 3;
		$defaults['header_image_as_slider'] = true;
		$defaults['page_slider_1']          = '';
		$defaults['page_slider_2']          = '';
		$defaults['page_slider_3']          = '';
		$defaults['post_slider_1']          = '';
		$defaults['post_slider_2']          = '';
		$defaults['post_slider_3']          = '';

		// Front Page Options > Why Us.
		$defaults['enable_why_us']   = true;
		$defaults['why_us_title']    = __( 'Why Edu Axis', 'edu-axis' );
		$defaults['why_us_subtitle'] = __( 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit.', 'edu-axis' );

		$defaults['why_us_icon_1']    = 'fas fa-graduation-cap';
		$defaults['why_us_title_1']   = __( 'Online Courses', 'edu-axis' );
		$defaults['why_us_content_1'] = __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vestibulum risus ac tellus luctus, ut volutpat', 'edu-axis' );

		$defaults['why_us_icon_2']    = 'fas fa-book-reader';
		$defaults['why_us_title_2']   = __( 'Syllable', 'edu-axis' );
		$defaults['why_us_content_2'] = __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vestibulum risus ac tellus luctus, ut volutpat', 'edu-axis' );

		$defaults['why_us_icon_3']    = 'fas fa-diagnoses';
		$defaults['why_us_title_3']   = __( 'Exam Pattern', 'edu-axis' );
		$defaults['why_us_content_3'] = __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vestibulum risus ac tellus luctus, ut volutpat', 'edu-axis' );

		$defaults['why_us_icon_4']    = 'fas fa-palette';
		$defaults['why_us_title_4']   = __( 'Graphic Design', 'edu-axis' );
		$defaults['why_us_content_4'] = __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vestibulum risus ac tellus luctus, ut volutpat', 'edu-axis' );

		// Front Page Options > Content.
		$defaults['hide_home_content'] = false;

		// Front Page Options > About us.
		$defaults['enable_about_us'] = true;
		$defaults['about_us_page']   = 0;

		// Front Page Options > Featured Post.
		$defaults['enable_featured_post'] = true;
		$defaults['featured_post_1']      = '';
		$defaults['featured_post_2']      = '';
		$defaults['featured_post_3']      = '';

		// Front Page Options > Call to action Section.
		$defaults['enable_cta']      = true;
		$defaults['cta_title']       = __( 'Call To Action', 'edu-axis' );
		$defaults['cta_description'] = __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'edu-axis' );
		$defaults['cta_button_text'] = __( 'Read more', 'edu-axis' );
		$defaults['cta_button_link'] = '#';
		$defaults['cta_background']  = esc_url( get_template_directory_uri() ) . '/assets/images/default.jpg';

		// Front Page Options > Latest Blogs Section.
		$defaults['enable_blog']       = true;
		$defaults['blog_title']        = __( 'Latest News', 'edu-axis' );
		$defaults['blog_subtitle']     = __( 'News sub title', 'edu-axis' );
		$defaults['hide_blog_content'] = true;

		// Reset All Options.
		$defaults['reset_customizer'] = false;

		$defaults['about_us_title']   = __( 'About Edu Axis', 'edu-axis' );
		$defaults['about_us_content'] = __( "Edu Axis is WordPress Education theme by Refresh Themes. It has multiple sections for homepage like 'Homepage slider', 'Why us', 'About us', 'Available courses' and more.", 'edu-axis' );

		$defaults['featured_title']         = __( 'Available classes', 'edu-axis' );
		$defaults['featured_subtitle']      = __( 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit.', 'edu-axis' );
		$defaults['featured_one_title']     = __( 'Javascript', 'edu-axis' );
		$defaults['featured_one_content']   = __( 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', 'edu-axis' );
		$defaults['featured_two_title']     = __( 'PHP', 'edu-axis' );
		$defaults['featured_two_content']   = __( 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pellentesque in ipsum id orci porta dapibus.', 'edu-axis' );
		$defaults['featured_three_title']   = __( 'Angular', 'edu-axis' );
		$defaults['featured_three_content'] = __( 'Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit.', 'edu-axis' );

		// Font options.
		$defaults['font_site_title']   = 'montserrat';
		$defaults['font_site_default'] = 'open-sans';

		$defaults = apply_filters( 'edu_axis_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;


if ( ! function_exists( 'edu_axis_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param Mixed $key Option key, It is either string or array.
	 * @return Mixed Option.
	 */
	function edu_axis_get_option( $key = '' ) {

		// Getting Default Options.
		$default_theme_options = edu_axis_get_default_theme_options();
		// Saved Theme Options.
		$theme_options = get_theme_mod( 'theme_options', $default_theme_options );

		// Theme option merged.
		$theme_options = array_merge( $default_theme_options, $theme_options );

		// Return all result if no key.
		if ( ! $key ) {
			return $theme_options;
		}

		if ( is_array( $key ) ) {
			if ( empty( $key ) ) {
				return;
			}
			// Return Specified option as per key [array].
			$options = array();
			foreach ( $key as $k ) {
				if ( isset( $theme_options[ $k ] ) ) {
					$options[ $k ] = $theme_options[ $k ];
				}
			}
		} else {
			// Return Specified option as per key [string].
			$options = '';

			if ( isset( $theme_options[ $key ] ) ) {
				$options = $theme_options[ $key ];
			}
		}

		return $options;
	}

endif;


/**
 * Page Layout Dropdown options.
 */
if ( ! function_exists( 'edu_axis_page_layouts' ) ) :
	/**
	 * Global layout
	 *
	 * @return array Global layout options.
	 */
	function edu_axis_page_layouts() {
		$edu_axis_page_layouts = array(
			'page-layout-boxed'  => esc_url( get_template_directory_uri() ) . '/assets/images/layout/boxed.png',
			'page-layout-framed' => esc_url( get_template_directory_uri() ) . '/assets/images/layout/framed.png',
		);

		return apply_filters( 'edu_axis_filter_page_layouts', $edu_axis_page_layouts );
	}
endif;

/**
 * Sidebar Position Dropdown options.
 */
if ( ! function_exists( 'edu_axis_sidebar_positions' ) ) :
	/**
	 * Sidebar layout
	 *
	 * @return array layout options.
	 */
	function edu_axis_sidebar_positions() {
		$edu_axis_sidebar_positions = array(
			'left-sidebar'  => esc_url( get_template_directory_uri() ) . '/assets/images/layout/left.png',
			'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/images/layout/right.png',
			'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/images/layout/framed.png',
		);

		return apply_filters( 'edu_axis_filter_sidebar_positions', $edu_axis_sidebar_positions );
	}
endif;

if ( ! function_exists( 'edu_axis_slider_type' ) ) :
	/**
	 * Slider Type
	 *
	 * @return array layout options.
	 */
	function edu_axis_slider_type() {
		$slider_type = array(
			'page_slider' => __( 'Page Slider', 'edu-axis' ),
			'post_slider' => __( 'Post Slider', 'edu-axis' ),
		);
		$output      = apply_filters( 'edu_axis_filter_slider_type', $slider_type );
		return $output;
	}
endif;

if ( ! function_exists( 'edu_axis_archive_content_type' ) ) :
	/**
	 * Archive Content TYpe layout
	 *
	 * @return array layout options.
	 */
	function edu_axis_archive_content_type() {
		$content_type = array(
			'full_content' => __( 'Full Content', 'edu-axis' ),
			'post_excerpt' => __( 'Post Excerpt', 'edu-axis' ),
		);
		$output       = apply_filters( 'edu_axis_filter_archive_content_type', $content_type );
		return $output;
	}
endif;

if ( ! function_exists( 'edu_axis_pagination_type' ) ) :
	/**
	 * Pagination type.
	 *
	 * @return array pagination type.
	 */
	function edu_axis_pagination_type() {
		$content_type = array(
			'default' => __( 'Default', 'edu-axis' ),
		);
		$output       = apply_filters( 'edu_axis_filter_pagination_type', $content_type );
		return $output;
	}
endif;
