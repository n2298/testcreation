<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package edu-axis
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function edu_axis_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'edu_axis_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function edu_axis_woocommerce_scripts() {
	wp_enqueue_style( 'edu-axis-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = esc_url( WC()->plugin_url() ) . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'edu-axis-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'edu_axis_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function edu_axis_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'edu_axis_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function edu_axis_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'edu_axis_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function edu_axis_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'edu_axis_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function edu_axis_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'edu_axis_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function edu_axis_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'edu_axis_woocommerce_related_products_args' );

if ( ! function_exists( 'edu_axis_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function edu_axis_woocommerce_product_columns_wrapper() {
		$columns = edu_axis_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'edu_axis_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'edu_axis_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function edu_axis_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'edu_axis_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'edu_axis_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function edu_axis_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'edu_axis_woocommerce_wrapper_before' );

if ( ! function_exists( 'edu_axis_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function edu_axis_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'edu_axis_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'edu_axis_woocommerce_header_cart' ) ) {
			edu_axis_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'edu_axis_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function edu_axis_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		edu_axis_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'edu_axis_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'edu_axis_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function edu_axis_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'edu-axis' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'edu-axis' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function edu_axis_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php edu_axis_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_woocommerce_main_content_starts' ) ) {
	// Div Structure.
	function edu_axis_woocommerce_main_content_starts() {
		if ( is_woocommerce() ) {
			echo '<div class="container">';
		}
	}
}
// add_action( 'edu_axis_action_content', 'edu_axis_woocommerce_main_content_starts', 30 );

if ( ! function_exists( 'edu_axis_woocommerce_main_content_ends' ) ) {
	function edu_axis_woocommerce_main_content_ends() {
		if ( is_woocommerce() ) {
			echo '</div><!-- row -->';
		}
	}
}
add_action( 'edu_axis_action_before_content', 'edu_axis_woocommerce_main_content_ends', 30 );

if ( ! function_exists( 'edu_axis_woocommerce_breadcrumb_defaults' ) ) {
	/**
	 * Woocommerce breadcrumb defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Defaults Params.
	 * @return array
	 */
	function edu_axis_woocommerce_breadcrumb_defaults( $defaults ) {

		$defaults['delimiter']   = ' > ';
		$defaults['wrap_before'] = '<div id="edu-axis-breadcrumb"><div class="rt-wrapper"><div id="crumbs">';
		$defaults['wrap_after']  = '</div></div></div>';
		$defaults['before']      = '<span>';
		$defaults['after']       = '</span>';

		return $defaults;
	}
}

add_filter( 'woocommerce_breadcrumb_defaults', 'edu_axis_woocommerce_breadcrumb_defaults' );

if ( ! function_exists( 'edu_axis_remove_shop_breadcrumbs' ) ) {
	/**
	 * Woocommerce Breadcrumb customization at woocommerce pages.
	 *
	 * @since 1.0.0
	 **/
	function edu_axis_remove_shop_breadcrumbs() {
		if ( edu_axis_has_woocommerce() && is_woocommerce() ) {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );  // WooCommerce Breadcrumb.
			remove_action( 'edu_axis_action_before_content', 'edu_axis_get_breadcrumb', 20 ); // Theme Breadcrumb.

			$enable_breadcrumb = edu_axis_get_option( 'enable_breadcrumb' ); // Place only, when breadcrumb is enabled.
			if ( $enable_breadcrumb ) {
				add_action( 'edu_axis_action_before_content', 'woocommerce_breadcrumb', 20 ); // Placed the WooCommerce Breadcrumb at theme breadcrumb.
			}
		}
	}
}
add_action( 'template_redirect', 'edu_axis_remove_shop_breadcrumbs' );


if ( ! function_exists( 'edu_axis_woocommerce_pagination_args' ) ) {
	function edu_axis_woocommerce_pagination_args( $args ) {
		$args['prev_text'] = __( 'Previous', 'edu-axis' );
		$args['next_text'] = __( 'Next', 'edu-axis' );
	}
}

add_filter( 'woocommerce_pagination_args', 'edu_axis_woocommerce_pagination_args' );

add_filter( 'woocommerce_show_page_title', '__return_false' );
