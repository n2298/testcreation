<?php
/**
 * Edu Axis Theme Options Customize Settings.
 *
 * @since 1.0.0
 * @package edu-axis
 */

 /**
  * Customizer Settings and control fields.
  */
function edu_axis_get_customizer_fields() {
	$strings  = edu_axis_strings();
	$default  = edu_axis_get_default_theme_options();
	$settings = array(
		// Colors.
		'theme_options[header_title_color]'        => array(
			'label'             => __( 'Header Title Color', 'edu-axis' ),
			'type'              => 'color', // Control type.
			'default'           => $default['header_title_color'],
			'section'           => 'colors',
			'priority'          => 5,
			'sanitize_callback' => 'sanitize_hex_color',
		),

		// Theme Options > Loader.
		'theme_options[enable_loader]'             => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox', // Control type.
			'default'           => $default['enable_loader'],
			'section'           => 'loader_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),

		'theme_options[sidebar_position_page]'     => array(
			'label'             => __( 'Sidebar Position - Page', 'edu-axis' ),
			'type'              => 'radio-image',
			'default'           => $default['sidebar_position_page'],
			'choices'           => edu_axis_sidebar_positions(),
			'section'           => 'layout_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_select',
		),
		'theme_options[sidebar_position_post]'     => array(
			'label'             => __( 'Sidebar Position - Post', 'edu-axis' ),
			'type'              => 'radio-image',
			'default'           => $default['sidebar_position_post'],
			'choices'           => edu_axis_sidebar_positions(),
			'section'           => 'layout_options',
			'priority'          => 20,
			'sanitize_callback' => 'edu_axis_sanitize_select',
		),
		'theme_options[sidebar_position_homepage]' => array(
			'label'             => __( 'Sidebar Position - Home Page', 'edu-axis' ),
			'type'              => 'radio-image',
			'default'           => $default['sidebar_position_homepage'],
			'choices'           => edu_axis_sidebar_positions(),
			'section'           => 'layout_options',
			'priority'          => 30,
			'sanitize_callback' => 'edu_axis_sanitize_select',
		),
		'theme_options[sidebar_position_archive]'  => array(
			'label'             => __( 'Sidebar Position - Blog / archive', 'edu-axis' ),
			'type'              => 'radio-image',
			'default'           => $default['sidebar_position_archive'],
			'choices'           => edu_axis_sidebar_positions(),
			'section'           => 'layout_options',
			'priority'          => 40,
			'sanitize_callback' => 'edu_axis_sanitize_select',
		),
		// Theme Options > Topbar.
		'theme_options[enable_topbar]'             => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_topbar'],
			'section'           => 'topbar_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),

		// Theme Options > Header.
		'theme_options[show_title]'                => array(
			'label'             => __( 'Show Title', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['show_title'],
			'section'           => 'header_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[show_tagline]'              => array(
			'label'             => __( 'Show Tagline', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['show_tagline'],
			'section'           => 'header_options',
			'priority'          => 20,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[sticky_primary_menu]'       => array(
			'label'             => __( 'Sticky Primary Menu', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['sticky_primary_menu'],
			'section'           => 'header_options',
			'priority'          => 30,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		
		// Theme Options > Breadcrumb.
		'theme_options[enable_breadcrumb]'         => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_breadcrumb'],

			'section'           => 'breadcrumb_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),

		// Theme Options > Blog.
		'theme_options[hide_post_date]'            => array(
			'label'             => __( 'Hide Post date.', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_post_date'],
			'section'           => 'blog_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[hide_post_author]'          => array(
			'label'             => __( 'Hide Post author.', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_post_author'],
			'section'           => 'blog_options',
			'priority'          => 20,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[hide_post_category]'        => array(
			'label'             => __( 'Hide Post category.', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_post_category'],
			'section'           => 'blog_options',
			'priority'          => 30,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[hide_post_tags]'            => array(
			'label'             => __( 'Hide Post tags.', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_post_tags'],
			'section'           => 'blog_options',
			'priority'          => 40,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[hide_post_featured_image]'  => array(
			'label'             => __( 'Hide Post featured image.', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_post_featured_image'],
			'section'           => 'blog_options',
			'priority'          => 50,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[hide_blog_content]'         => array(
			'label'             => __( 'Hide Blog Content', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['hide_blog_content'],
			'section'           => 'blog_options',
			'priority'          => 60,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[archive_content_type]'      => array(
			'label'             => __( 'Content Type', 'edu-axis' ),
			'type'              => 'select',
			'choices'           => edu_axis_archive_content_type(),
			'default'           => $default['archive_content_type'],
			'section'           => 'blog_options',
			'priority'          => 70,
			'sanitize_callback' => 'edu_axis_sanitize_select',

		),
		// Theme Options > Excerpt.
		'theme_options[excerpt_length]'            => array(
			'label'             => __( 'Excerpt Length', 'edu-axis' ),
			'type'              => 'number',
			'default'           => $default['excerpt_length'],
			'input_attrs'       => array(
				'min'  => 20,
				'max'  => 500,
				'step' => 1,
			),
			'section'           => 'excerpt_options',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_positive_number',
		),
		'theme_options[readmore_text]'             => array(
			'label'             => __( 'Read more text', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['readmore_text'],
			'input_attrs'       => array(
				'min'  => 20,
				'max'  => 500,
				'step' => 1,
			),
			'section'           => 'excerpt_options',
			'priority'          => 20,
			'sanitize_callback' => 'sanitize_text_field',
		),

		'theme_options[pagination_type]'           => array(
			'label'           => __( 'Pagination Type', 'edu-axis' ),
			'type'            => 'select',
			'choices'         => edu_axis_pagination_type(),
			'default'         => $default['pagination_type'],
			'section'         => 'pagination_options',
			'priority'        => 30,
			'active_callback' => 'edu_axis_customizer_is_slider_enabled',
		),

		'theme_options[footer_copyright]'          => array(
			'label'             => __( 'Footer Copyright', 'edu-axis' ),
			'type'              => 'textarea',
			'default'           => $default['footer_copyright'],
			'section'           => 'footer_options',
			'priority'          => 10,
			'sanitize_callback' => 'sanitize_text_field',
		),

		// Theme Options > Back to Top.
		'theme_options[back_to_top]'               => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['back_to_top'],

			'section'           => 'back_to_top_options',
			'priority'          => 100,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[scroll_speed]'              => array(
			'label'             => __( 'Scroll Speed', 'edu-axis' ),
			'type'              => 'number',
			'default'           => $default['scroll_speed'],
			'input_attrs'       => array(
				'min'  => 500,
				'max'  => 5000,
				'step' => 100,
			),
			'section'           => 'back_to_top_options',
			'priority'          => 100,
			'sanitize_callback' => 'edu_axis_sanitize_positive_number',
		),

		// Front Page Options > Edu Axis Slider.
		'theme_options[enable_slider]'             => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_slider'],
			'section'           => 'edu_axis_slider',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[slider_type]'               => array(
			'label'             => __( 'Slider Type', 'edu-axis' ),
			'type'              => 'select',
			'choices'           => edu_axis_slider_type(),
			'default'           => $default['slider_type'],
			'section'           => 'edu_axis_slider',
			'priority'          => 20,
			'active_callback'   => 'edu_axis_customizer_is_slider_enabled',
			'sanitize_callback' => 'edu_axis_sanitize_select',
		),
		'theme_options[number_of_slider]'          => array(
			'label'           => __( 'Number of Slider', 'edu-axis' ),
			'type'            => 'number',
			'default'         => $default['number_of_slider'],
			'input_attrs'     => array(
				'min' => 1,
				'max' => 3,
			),
			'description'     => __( 'Please enter number of slides between 1 - 3. Save them and refresh the page.', 'edu-axis' ),
			'transport'       => 'postMessage',
			'section'         => 'edu_axis_slider',
			'priority'        => 30,
			'active_callback' => 'edu_axis_customizer_is_slider_enabled',
		),
		'theme_options[header_image_as_slider]'    => array(
			'label'             => __( 'Use Header image', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['header_image_as_slider'],
			'description'       => __( 'Use header image instead of slider if slider is disabled.', 'edu-axis' ),
			'section'           => 'edu_axis_slider',
			'priority'          => 40,
			'active_callback'   => 'edu_axis_customizer_is_slider_disabled',
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',

		),
		// Front Page Options > Why us Section.
		'theme_options[enable_why_us]'             => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_why_us'],
			'section'           => 'edu_axis_why_us',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[why_us_title]'              => array(
			'label'             => __( 'Title', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['why_us_title'],
			'section'           => 'edu_axis_why_us',
			'priority'          => 20,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[why_us_subtitle]'           => array(
			'label'             => __( 'Sub Title', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['why_us_subtitle'],
			'section'           => 'edu_axis_why_us',
			'priority'          => 30,
			'sanitize_callback' => 'sanitize_text_field',
		),
		// Front Page Options > About us Section.
		'theme_options[enable_about_us]'           => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_about_us'],
			'section'           => 'homepage_about_us',
			'priority'          => 20,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[about_us_page]'             => array(
			'label'    => __( 'About us Page', 'edu-axis' ),
			'type'     => 'dropdown-pages',
			'default'  => '',
			'section'  => 'homepage_about_us',
			'priority' => 20,
		),

		// Front Page Options > Featured Post Section.
		'theme_options[enable_featured_post]'      => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_featured_post'],
			'section'           => 'homepage_featured_post',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),

		'theme_options[featured_title]'            => array(
			'label'             => __( 'Title', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['featured_title'],
			'section'           => 'homepage_featured_post',
			'priority'          => 20,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[featured_subtitle]'         => array(
			'label'             => __( 'Sub title', 'edu-axis' ),
			'type'              => 'textarea',
			'default'           => $default['featured_subtitle'],
			'section'           => 'homepage_featured_post',
			'priority'          => 30,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[featured_post_1]'           => array(
			'label'    => __( 'Course 1', 'edu-axis' ),
			'type'     => 'dropdown-posts',
			'section'  => 'homepage_featured_post',
			'priority' => 40,
		),
		'theme_options[featured_post_2]'           => array(
			'label'    => __( 'Course 2', 'edu-axis' ),
			'type'     => 'dropdown-posts',
			'section'  => 'homepage_featured_post',
			'priority' => 40,
		),
		'theme_options[featured_post_3]'           => array(
			'label'    => __( 'Course 3', 'edu-axis' ),
			'type'     => 'dropdown-posts',
			'section'  => 'homepage_featured_post',
			'priority' => 40,
		),
		// Front Page Options > Call to Action Section.
		'theme_options[enable_cta]'                => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_cta'],
			'section'           => 'homepage_cta',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[cta_title]'                 => array(
			'label'             => __( 'Title', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['cta_title'],
			'section'           => 'homepage_cta',
			'priority'          => 20,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[cta_description]'           => array(
			'label'             => __( 'Description', 'edu-axis' ),
			'type'              => 'textarea',
			'default'           => $default['cta_description'],
			'section'           => 'homepage_cta',
			'priority'          => 30,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[cta_button_text]'           => array(
			'label'             => __( 'Readmore text', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['cta_button_text'],
			'section'           => 'homepage_cta',
			'priority'          => 40,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[cta_button_link]'           => array(
			'label'             => __( 'Readmore link', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['cta_button_link'],
			'section'           => 'homepage_cta',
			'priority'          => 50,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[cta_background]'            => array(
			'label'             => __( 'Background Image', 'edu-axis' ),
			'type'              => 'image',
			'default'           => $default['cta_background'],
			'section'           => 'homepage_cta',
			'priority'          => 50,
			'sanitize_callback' => 'sanitize_text_field',
		),

		// Front Page Options > Latest Blogs Section.
		'theme_options[enable_blog]'               => array(
			'label'             => $strings['enable'],
			'type'              => 'checkbox',
			'default'           => $default['enable_blog'],
			'section'           => 'homepage_latest_blogs',
			'priority'          => 10,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
		'theme_options[blog_title]'                => array(
			'label'             => __( 'Title', 'edu-axis' ),
			'type'              => 'text',
			'default'           => $default['blog_title'],
			'section'           => 'homepage_latest_blogs',
			'priority'          => 20,
			'sanitize_callback' => 'sanitize_text_field',
		),
		'theme_options[blog_subtitle]'             => array(
			'label'             => __( 'Sub title', 'edu-axis' ),
			'type'              => 'textarea',
			'default'           => $default['blog_subtitle'],
			'section'           => 'homepage_latest_blogs',
			'priority'          => 30,
			'sanitize_callback' => 'sanitize_text_field',
		),

		// Reset All Options.
		'theme_options[reset_customizer]'          => array(
			'label'             => __( 'Reset all to default', 'edu-axis' ),
			'type'              => 'checkbox',
			'default'           => $default['reset_customizer'],
			'description'       => __( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects.', 'edu-axis' ),
			'transport'         => 'postMessage',
			'section'           => 'reset_section',
			'priority'          => 40,
			'sanitize_callback' => 'edu_axis_sanitize_checkbox',
		),
	);

	// Number of slides for slider.
	$number_of_slider   = edu_axis_get_option( 'number_of_slider' );
	$slider_type_labels = edu_axis_slider_type();
	foreach ( $slider_type_labels as $slider_type => $slider_type_label ) {

		for ( $i = 1; $i <= $number_of_slider; $i++ ) {
			$settings_key              = sprintf( 'theme_options[%s_%d]', $slider_type, $i );
			$settings[ $settings_key ] = array(
				'label'           => sprintf( '# %s %d ', $slider_type_label, $i ),
				'default'         => '',
				'section'         => 'edu_axis_slider',
				'panel'           => 'homepage_option_panel',
				'priority'        => 40 + $i,
				'active_callback' => "edu_axis_customizer_is_{$slider_type}_enabled",

			);

			if ( 'page_slider' === $slider_type ) {
				$settings[ $settings_key ]['type'] = 'dropdown-pages'; // Inbuild.
			} elseif ( 'post_slider' === $slider_type ) {
				$settings[ $settings_key ]['type'] = 'dropdown-posts'; // Custom.
			}
		}
	}

	// Font options.
	$font_settings = edu_axis_get_font_family_customizer_settings();
	$choices       = edu_axis_get_font_option_choices();
	$index         = 40;

	foreach ( $font_settings as $k => $setting ) {
		$settings_key              = sprintf( 'theme_options[%s]', $k );
		$settings[ $settings_key ] = array(
			'label'    => $setting['label'],
			'type'     => 'select',
			'choices'  => $choices,
			'default'  => isset( $default[ $k ] ) ? $default[ $k ] : '',
			'section'  => 'font_family_options',
			'panel'    => 'theme_option_panel',
			'priority' => 10 + $index,
		);
		$index                    += 10;
	}

	// Why us
	$default_index = 40;
	for ( $i = 1; $i <= 4; $i++ ) {
		$why_us_icon              = sprintf( 'theme_options[why_us_icon_%d]', $i );
		$settings[ $why_us_icon ] = array(
			'label'    => sprintf( '#Icon %d ', $i ),
			'type'     => 'select',
			'choices'  => edu_axis_get_fontawesome_icons(),
			'default'  => $default[ 'why_us_icon_' . $i ],
			'section'  => 'edu_axis_why_us',
			'panel'    => 'homepage_option_panel',
			'priority' => $default_index,
			// 'active_callback' => "edu_axis_customizer_is_{$slider_type}_enabled",
		);
		$default_index += 10;

		$why_us_post_id              = sprintf( 'theme_options[why_us_%d]', $i );
		$settings[ $why_us_post_id ] = array(
			'label'    => sprintf( '#Why us %d ', $i ),
			'type'     => 'dropdown-posts',
			'default'  => '',
			'section'  => 'edu_axis_why_us',
			'panel'    => 'homepage_option_panel',
			'priority' => $default_index,
			// 'active_callback' => "edu_axis_customizer_is_{$slider_type}_enabled",
		);
		$default_index += 10;
	}

	return apply_filters( 'edu_axis_filter_customizer_settings', $settings );

}
