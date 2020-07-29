<?php
/**
 * Footer Widgets class.
 *
 * @package edu-axis
 */

/**
 * Footer Widgets class init.
 *
 * @since 1.0.0
 */
class Edu_Axis_Footer_Widgets {

	/**
	 * Max registered widgets.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	protected $max_widgets = 0;

	/**
	 * Active widgets.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	protected $active_widgets = 0;

	/**
	 * Construcor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		$this->init_widgets();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 */
	function init_widgets() {

		$footer_widget = get_theme_support( 'footer-widgets' );
		if ( empty( $footer_widget ) ) {
			return;
		}
		if ( absint( $footer_widget[0] ) < 1 ) {
			return;
		}
		$this->max_widgets    = absint( $footer_widget[0] );
		$this->active_widgets = $this->get_active_widgets_count();

		// Init footer widgets.
		add_action( 'widgets_init', array( $this, 'widgets_init_footer' ), 15 );

		// add footer widgets into frontend before footer section.
		if ( $this->active_widgets > 0 ) {
			add_action( 'edu_axis_action_before_footer', array( $this, 'add_footer_widgets' ), 3 );
		}

	}

	/**
	 * Register footer widgets.
	 *
	 * @since 1.0.0
	 */
	function widgets_init_footer() {

		for ( $i = 1; $i <= $this->max_widgets; $i++ ) {
			register_sidebar(
				array(
					'name'          => sprintf( __( 'Footer Widget %d', 'edu-axis' ), $i ), // phpcs:ignore
					'id'            => sprintf( 'footer-%d', $i ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}

	}

	/**
	 * Returns number of active footer widgets.
	 *
	 * @since 1.0.0
	 *
	 * @return int Number of active widgets.
	 */
	private function get_active_widgets_count() {

		$count = 0;

		for ( $i = 1; $i <= $this->max_widgets; $i++ ) {
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}

		return $count;

	}

	/**
	 * Add footer widgets content in front end.
	 *
	 * @since 1.0.0
	 */
	function add_footer_widgets() {

		$args                   = array(
			'container' => 'div',
			'before'    => '<div class="rt-wrapper">',
			'after'     => '</div>',
		);
		$footer_widgets_content = $this->get_footer_widgets_content( $args );
		echo $footer_widgets_content; // phpcs:ignore

	}

	/**
	 * Returns all active footer widgets number in array.
	 *
	 * @since 1.0.0
	 *
	 * @return array Active widgets
	 */
	function all_active_widgets() {

		$arr = array();

		for ( $i = 1; $i <= $this->max_widgets; $i++ ) {
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$arr[] = $i;
			}
		}
		return $arr;

	}

	/**
	 * Returns footer widget contents.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Footer widget arguments.
	 */
	function get_footer_widgets_content( $args ) {

		$number             = $this->active_widgets;
		$all_active_widgets = $this->all_active_widgets();

		// $default_columns = isset( $number ) ? sprintf( 'col-%s', $number ) : 'col-3';
		// Default arguments.
		$args = wp_parse_args(
			(array) $args,
			array(
				'container'       => 'div',
				'container_class' => 'footer-widget-area footer-column-' . $number,
				'container_style' => '',
				'container_id'    => 'footer-widgets',
				'wrap_class'      => 'hentry',
				'before'          => '',
				'after'           => '',
			)
		);
		$args = apply_filters( 'edu_axis_filter_footer_widgets_args', $args );

		ob_start();
		$container_open  = '';
		$container_close = '';

		if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
			$container_open = sprintf(
				'<%s %s %s %s>',
				$args['container'],
				( $args['container_class'] ) ? 'class="' . $args['container_class'] . '"' : '',
				( $args['container_id'] ) ? 'id="' . $args['container_id'] . '"' : '',
				( $args['container_style'] ) ? 'style="' . esc_attr( $args['container_style'] ) . '"' : ''
			);
		}
		if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
			$container_close = sprintf(
				'</%s>',
				$args['container']
			);
		}

		echo $container_open; // phpcs:ignore

		echo $args['before']; // phpcs:ignore

		for ( $i = 1; $i <= $number; $i++ ) {

			$item_class  = apply_filters( 'edu_axis_filter_footer_widget_class', '', $i );
			$div_classes = implode( ' ', array( $item_class, $args['wrap_class'] ) );
			$div_classes = trim( $div_classes );

			echo '<div class="' . esc_attr( $div_classes ) . '">';
			$sidebar_name = 'footer-' . $all_active_widgets[ $i - 1 ];
			dynamic_sidebar( $sidebar_name );
			echo '</div><!-- .' . esc_attr( $args['wrap_class'] ) . ' -->';

		} // End for loop.

		echo $args['after']; // phpcs:ignore

		echo $container_close; // phpcs:ignore

		$output = ob_get_contents();
		ob_end_clean();
		return $output;

	}
}

// Initialize.
new Edu_Axis_Footer_Widgets();
