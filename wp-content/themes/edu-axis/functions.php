<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edu-axis
 */

if ( ! function_exists( 'edu_axis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function edu_axis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'edu-axis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'   => esc_html__( 'Primary', 'edu-axis' ),
				'top-right' => esc_html__( 'Top Right', 'edu-axis' ),
				'top-left'  => esc_html__( 'Top Left', 'edu-axis' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'edu_axis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add Theme Support for footer widgets.
		$number_of_widgets = apply_filters( 'edu_axis_filter_footer_max_widgets', 4 );
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/widgets/class-footer-widgets.php' );

		// Enable excerpt for page.
		add_post_type_support( 'page', 'excerpt' );

		// Archive Images.
		add_image_size( 'edu-axis-thumbnail', 450, 450, true ); // used in Archive.
		add_image_size( 'edu-axis-featured-homepage', 512, 288, true ); // used in homepage latest news. [16:9]
		add_image_size( 'edu-axis-featured', 1056, 594, true ); // used in Post Single page. [16:9]

		add_image_size( 'edu-axis-square-thumbnail-small', 200, 200, true ); // used in author profile.

	}
endif;
add_action( 'after_setup_theme', 'edu_axis_setup', 99 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edu_axis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'edu_axis_filter_content_width', 640 );
}
add_action( 'after_setup_theme', 'edu_axis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edu_axis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'edu-axis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'edu-axis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'edu_axis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edu_axis_scripts() {
	/**
	 * Assign the version to a var.
	 */
	$theme   = wp_get_theme( 'storefront' );
	$version = $theme['Version'];
	$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Styles.
	$font_url = edu_axis_get_google_fonts_url();
	if ( ! empty( $font_url ) ) {
		wp_enqueue_style( 'googlefonts', esc_url( $font_url ) );
	} else {
		wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900' );
	}
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/plugins/fontawesome/css/fontawesome-all.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'edu-axis-style', get_stylesheet_uri() );

	// Scripts Register.
	wp_register_script( 'edu-axis-scripts', get_template_directory_uri() . '/assets/js/scripts' . $suffix . '.js', array( 'jquery' ) );

	// Script Localize.
	$scroll_speed = edu_axis_get_option( 'scroll_speed' );
	$localized    = array(
		'strings'      => edu_axis_strings(),
		'scroll_speed' => $scroll_speed,
	);
	wp_localize_script( 'edu-axis-scripts', 'edu_axis', $localized );

	// Script Enqueue.
	wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array(), $version, true );

	wp_enqueue_script( 'edu-axis-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), $version, true );
	wp_enqueue_script( 'edu-axis-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), $version, true );
	wp_enqueue_script( 'edu-axis-scripts' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	do_action( 'edu_axis_action_additional_scripts' );
}
add_action( 'wp_enqueue_scripts', 'edu_axis_scripts' );

/**
 * Initialize.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/init.php';
