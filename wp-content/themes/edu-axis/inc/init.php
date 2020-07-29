<?php

/**
 * Load Common Helper.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/helper/helper-common.php'; // phpcs:ignore
require get_template_directory() . '/inc/helper/helper-frontpage.php'; // phpcs:ignore
require get_template_directory() . '/inc/helper/helper-fontawesome.php'; // phpcs:ignore

/**
 * Theme Dynamic Styles.
 */
require get_template_directory() . '/inc/style/style.php'; // phpcs:ignore

 /**
 * Load Theme Options.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/customizer/theme-options.php'; // phpcs:ignore

 /**
 * Load Theme Breadcrumb.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/breadcrumb/breadcrumb.php'; // phpcs:ignore

/**
 * Add Template Blocks. [HTML Doctype, Head].
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/hooks/template-blocks.php'; // phpcs:ignore

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php'; // phpcs:ignore

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template/template-tags.php'; // phpcs:ignore

/**
 * Widget Init.
 */
require get_template_directory() . '/inc/widgets/init.php'; // phpcs:ignore

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template/template-functions.php'; // phpcs:ignore

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgmpa-hook.php'; // phpcs:ignore


/**
 * Load Is Active Section of Customizer.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/customizer/is-active.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/font-options/font-options.php'; // phpcs:ignore
// Customizer Panel & Sections.
require get_template_directory() . '/inc/customizer/panel.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/sections.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/settings.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/customizer-is-active-callback.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/sanitize-callbacks.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/custom-controls.php'; // phpcs:ignore

require get_template_directory() . '/inc/customizer.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/customizer.php'; // phpcs:ignore
require get_template_directory() . '/inc/customizer/reset.php'; // phpcs:ignore

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php'; // phpcs:ignore
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php'; // phpcs:ignore
}
