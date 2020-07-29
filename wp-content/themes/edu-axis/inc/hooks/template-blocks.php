<?php
/**
 * This file includes all functions containing Theme Template.
 *
 * @package edu-axis
 * @since 1.0.0
 */

 $options = edu_axis_get_option();

/**
 * Template hooks.
 */



add_action( 'edu_axis_action_doctype', 'edu_axis_doctype' );
add_action( 'edu_axis_action_head', 'edu_axis_head' );

if ( isset( $options['enable_loader'] ) && $options['enable_loader'] ) {
	add_action( 'edu_axis_action_before_start', 'edu_axis_loader' );
}
if ( isset( $options['back_to_top'] ) && $options['back_to_top'] ) {
	add_action( 'edu_axis_action_before_start', 'edu_axis_back_to_top' );
}
add_action( 'edu_axis_action_before_start', 'edu_axis_page_wrapper_start' );
add_action( 'edu_axis_action_before_start', 'edu_axis_screen_reader_text' );

add_action( 'edu_axis_action_before_header', 'edu_axis_top_section', 10 );
add_action( 'edu_axis_action_before_header', 'edu_axis_header_wrapper_start', 20 );
add_action( 'edu_axis_action_header', 'edu_axis_header' );
add_action( 'edu_axis_action_after_header', 'edu_axis_header_wrapper_end' );

add_action( 'edu_axis_action_before_content', 'edu_axis_main_slider', 10 );
add_action( 'edu_axis_action_before_content', 'edu_axis_get_breadcrumb', 20 );
add_action( 'edu_axis_action_before_content', 'edu_axis_main_content_start', 40 );
add_action( 'edu_axis_action_after_content', 'edu_axis_main_content_ends', 100 );

add_action( 'edu_axis_action_posts_navigation', 'edu_axis_posts_navigation' );

// Front page sections.
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_why_us', 10 );
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_about_us', 20 );
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_featured_posts', 30 );
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_cta', 40 );
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_latest_blog', 50 );
add_action( 'edu_axis_action_front_page', 'edu_axis_homepage_content_instagram', 60 );

/**
 * Hook Callback Functions.
 */
if ( ! function_exists( 'edu_axis_doctype' ) ) {
	/**
	 * Doctype Declearation.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_doctype() {
		?><!doctype html><html <?php language_attributes(); ?>>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_head' ) ) {
	/**
	 * Header Declearation.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php
	}
}

if ( ! function_exists( 'edu_axis_loader' ) ) {
	/**
	 * Loader.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_loader() {
		?>
		<div class="rt-preloader-wrapper" id="rt-preloader-wrapper">
			<div class="rt-cube-grid">
				<div class="rt-cube rt-cube1"></div>
				<div class="rt-cube rt-cube2"></div>
				<div class="rt-cube rt-cube3"></div>
				<div class="rt-cube rt-cube4"></div>
				<div class="rt-cube rt-cube5"></div>
				<div class="rt-cube rt-cube6"></div>
				<div class="rt-cube rt-cube7"></div>
				<div class="rt-cube rt-cube8"></div>
				<div class="rt-cube rt-cube9"></div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_back_to_top' ) ) {
	/**
	 * Loader.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_back_to_top() {
		?>
		<a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_page_wrapper_start' ) ) {
	/**
	 * Page Wrapper Start.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_page_wrapper_start() {
		?>
		<div class="site" id="page">
		<?php
	}
}

if ( ! function_exists( 'edu_axis_screen_reader_text' ) ) {
	/**
	 * Screen reader text.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_screen_reader_text() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edu-axis' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'edu_axis_header_wrapper_start' ) ) {
	/**
	 * Header wrapper start.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_header_wrapper_start() {
		?>
		<header id="masthead" class="site-header" >
		<?php
	}
}

if ( ! function_exists( 'edu_axis_top_section' ) ) {
	/**
	 * Top content.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_top_section() {
		$enable = edu_axis_get_option( 'enable_topbar' );
		if ( $enable ) :
			$contact_number = edu_axis_get_option( 'contact_number' );
			$contact_email  = edu_axis_get_option( 'contact_email' );
			?>
			<section id="top-bar" class="" >
				<button class="topbar-toggle"><i class="fas fa-phone"></i></button>
				<div class="rt-wrapper">

					<div class="address-block-container clearfix">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'top-left',
								'menu_id'         => 'top-left',
								'fallback_cb'     => false,
								'depth'           => 1,
								'menu_class'      => 'top-left',
								'container_class' => 'top-left-menu-container',
								'fallback_cb'     => 'edu_axis_menu_fallback_cb',
							)
						);
						?>
					</div><!-- end .address-block-container -->
						
					<div class="top-right-menu-wrapper">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'top-right',
								'menu_id'         => 'top-right-menu',
								'fallback_cb'     => false,
								'depth'           => 2,
								'menu_class'      => 'top-right-menu',
								'container_class' => 'top-right-menu-container clearfix',
								'fallback_cb'     => 'edu_axis_menu_fallback_cb',
							)
						);

						if ( edu_axis_has_woocommerce() ) {
							?>
							<ul class="top-card-info float-lg-right clearfix">
								<li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart"><i class="fas fa-shopping-basket"></i><span class="cart-num"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span></a></li>
							</ul>
							<?php
						}
						?>
					</div>

				</div><!-- end .container -->
			</section><!-- #top-bar -->
			<?php
		endif;
	}
}

if ( ! function_exists( 'edu_axis_header' ) ) {
	/**
	 * Header section.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_header() {

		$args    = array( 'show_title', 'show_tagline' );
		$options = edu_axis_get_option( $args );

		$show_title   = $options['show_title'];
		$show_tagline = $options['show_tagline'];

		?>
		<section id="rt-header" class="">
			<div class="rt-wrapper">
				<div class="site-branding">
					<div class="site-logo">
						<?php edu_axis_custom_logo(); ?>
					</div>

					<?php if ( true === $show_title || true === $show_tagline ) : ?>
						<div class="site-branding-text">
							<?php if ( true === $show_title ) : ?>
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( true === $show_tagline ) : ?>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
							<?php endif; ?>
						</div><!-- #site-identity -->
					<?php endif; ?>
				</div>
				<div class="site-header-menu" id="site-header-menu">
					<div class="menu-container">
						<button class="menu-toggle" aria-controls="primary-menu" area-label="<?php esc_attr_e( 'Menu', 'edu-axis' ); ?>" aria-hidden="true" aria-expanded="false">
							<span class="icon"></span>
							<span class="menu-label"><?php esc_html_e( 'Menu', 'edu-axis' ); ?></span>
						</button>
						<?php
							wp_nav_menu(
								array(
									'container'       => 'nav',
									'container_class' => 'main-navigation',
									'container_id'    => 'site-navigation',
									'menu_class'      => 'menu nav-menu',
									'menu_id'         => 'primary-menu',
									'theme_location'  => 'primary',
									'fallback_cb'     => 'edu_axis_menu_fallback_cb',
								)
							);
						?>
					</div>
					<ul class="rt-header-search">
						<li class="search-menu">
							<button class="rt-top-search" ><i class="fas fa-search"></i></button>
						</li>
					</ul>
					<div class="top-search-form hidden">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</section>
	   
		<?php
	}
}

if ( ! function_exists( 'edu_axis_header_wrapper_end' ) ) {
	/**
	 * Header wrapper end.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_header_wrapper_end() {
		?>
		</header>
		<?php
	}
}
if ( ! function_exists( 'edu_axis_main_content_start' ) ) :
	/**
	 *  Main Content Start.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_main_content_start() {
		?>
	<div id="content" class="site-content">
		<?php
	}
endif;
if ( ! function_exists( 'edu_axis_main_content_ends' ) ) :
	/**
	 *  Main Content Ends.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_main_content_ends() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;



if ( ! function_exists( 'edu_axis_main_slider' ) ) {
	/**
	 *  Header image / Slider.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_main_slider() {
		$args    = array(
			'enable_slider',
			'slider_type',
			'number_of_slider',
			'header_image_as_slider',
			'hide_header_image',
			'hide_post_author',
			'hide_post_date',
			'readmore_text',
		);
		$options = edu_axis_get_option( $args );

		$enable_slider          = $options['enable_slider'];
		$header_image_as_slider = $options['header_image_as_slider'];
		$hide_header_image      = $options['hide_header_image'];
		$readmore_text          = $options['readmore_text'];
		$number_of_slider       = absint( $options['number_of_slider'] );
		$slider_type            = $options['slider_type'];

		$slider_args = array();
		if ( $number_of_slider > 0 ) :
			for ( $i = 1; $i <= $number_of_slider; $i++ ) {
				$slider_args[] = sprintf( '%s_%d', $slider_type, $i );
			}
		endif;
		$sliders  = edu_axis_get_option( $slider_args );
		$post_ids = array();

		$has_slider_count = 0;

		foreach ( $sliders as $slider_id ) {
			if ( ! empty( $slider_id ) ) {
				$post_ids[] = $slider_id;
				$has_slider_count++;
			}
		}

		$display_slider = false;

		if ( ! is_front_page() && is_home() ) { // Blog page.
			$display_slider = false;
		} elseif ( ( is_home() || is_front_page() ) && $enable_slider && $has_slider_count > 0 ) { // Front page.
			$display_slider = true;
		} else { // Other Pages.
			// if ( $header_image_as_slider && ! $hide_header_image ) {
				$display_slider = false;
			// }
		}

		$display_slider = apply_filters( 'edu_axis_filter_display_slider', $display_slider );

		if ( $display_slider ) {
			?>
			<div id="custom-header-media" class="relative">
				
				<div class="rt-slider-wrapper edu-axis-main-slider">
						
					<?php

					if ( ! $has_slider_count ) { // use default image if none of post have selected.
						?>
						<div class="slide-item" style="background-image:url('<?php echo esc_url( edu_axis_get_header_image( true ) ); ?>')" >
							<div class="rt-overlay"></div>
							<?php if ( is_home() || is_front_page() ) : ?>
								<div class="rt-wrapper">
									<div class="slider-caption">
										<header class="entry-header">
											<h2 class="entry-title align-center">
												<?php edu_axis_header_title(); ?>
											</h2>
										</header><!-- .entry-header -->
									</div>
								</div><!-- .wrapper -->							
							<?php endif; ?>
							
						</div>
						<?php
					} else {
						$post_type = ( 'page_slider' === $slider_type ) ? 'page' : 'post';

						$slider_args = array(
							'post_type'           => $post_type,
							'post__in'            => $post_ids,
							'posts_per_page'      => 3,
							'orderby'             => 'post__in',
							'ignore_sticky_posts' => 1,
						);

						$slider_post_query = new WP_Query( $slider_args );
						if ( $slider_post_query->have_posts() ) :
							while ( $slider_post_query->have_posts() ) :
								$slider_post_query->the_post();
								?>
								<div class="slide-item" style="background-image:url('<?php echo esc_url( edu_axis_get_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>')" >
									<div class="rt-overlay"></div>
									<div class="rt-wrapper" >
										<div class="slider-caption">
											<header class="entry-header" >
												<h2 class="entry-title  animated fadeInDown" style="animation-delay: 0s;  animation-duration: 1s;"  ><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title( get_the_ID() ) ); ?></a></h2>
											</header><!-- .entry-header -->
											
											<span class="entry-meta animated fadeInUp" style="animation-delay: 0.5s;  animation-duration: 1s;">
												<?php the_excerpt(); ?>
											</span>
											<div class="read-more  animated fadeInUp" style="animation-delay: 1s;  animation-duration: 1.2s;" >
												<a href="<?php the_permalink(); ?>" class="btn btn-alt"><?php echo esc_html( $readmore_text ); ?></a>
											</div><!-- .read-more -->
										</div>
									</div><!-- .wrapper -->
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
					}
					?>
				</div>
			</div>
			<?php
			$slider_options = array(
				'autoplay' => 'false',
				'dots'     => 'true',
				'fade'     => 'true',
			);
			$slider_options = apply_filters( 'edu_axis_slick_slider_options', $slider_options );
			foreach ( $slider_options as $k => $v ) {
				$option = sprintf( "%s:'%s',", $k, $v );
			}
			$option = rtrim( $option, ',' );
			?>

			<script>
				jQuery(document).ready(function($) {
					$( '.edu-axis-main-slider' ).slick( {
						<?php foreach ( $slider_options as $k => $v ) : ?> 
							<?php echo esc_attr( $k ); ?>:
									   <?php
										if ( 'true' == $v || 'false' == $v ) {
											echo esc_attr( $v ); } else {

											?>
								'<?php echo esc_attr( $v ); ?>'<?php } ?>,
						<?php endforeach; ?>
					});
				});
			</script>
			<?php
		} else {
			global $post;
			$url = is_home() || is_front_page() ? edu_axis_get_header_image( true, '' ) : edu_axis_get_post_thumbnail_url( $post->ID, 'full' );
			$url = apply_filters( 'edu_axis_filter_header_image_url', $url, $post->ID );
			?>
			<div id="custom-header-media" class="relative">
				<div class="rt-slider-wrapper">
					<?php if ( $url ) : ?>
					<div class="slide-item" style="background-image:url('<?php echo esc_url( $url ); ?>')" >
					<?php else : ?>
						<div class="slide-item">
					<?php endif; ?>
						<div class="rt-overlay"></div>
						<div class="rt-wrapper">
							<header class="entry-header">
								<h2 class="entry-title  align-center">
									<?php edu_axis_header_title(); ?>
								</h2>
							</header><!-- .entry-header -->
						</div>
					</div>
				</div>
			</div>
			<?php
		}

	}
}

if ( ! function_exists( 'edu_axis_get_breadcrumb' ) ) {
	/**
	 *  Header image / Slider.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_get_breadcrumb() {

		$enable_breadcrumb = edu_axis_get_option( 'enable_breadcrumb' );
		if ( $enable_breadcrumb ) {
			$args = array(
				'separator'    => '>',
				'show_current' => 1,
				'show_on_home' => 0,
			);
			if ( is_home() || is_front_page() ) {

				if ( $args['show_on_home'] ) {
					?>
					<div id="edu-axis-breadcrumb">
						<div class="rt-wrapper">
							<?php edu_axis_default_breadcrumb( $args ); ?>
						</div>
					</div>
					<?php
				}
			} else {
				?>
				<div id="edu-axis-breadcrumb">
					<div class="rt-wrapper">
						<?php edu_axis_default_breadcrumb( $args ); ?>
					</div>
				</div>
				<?php
			}
		}

	}
}

if ( ! function_exists( 'edu_axis_posts_navigation' ) ) :

	/**
	 * Posts navigation
	 *
	 * @since edu-axis 1.0
	 */
	function edu_axis_posts_navigation() {
		the_posts_pagination();

	}
endif;

// Home page sections.
if ( ! function_exists( 'edu_axis_homepage_content_why_us' ) ) {

	// Available Courses Section.
	function edu_axis_homepage_content_why_us() {
		$args    = array(
			'enable_why_us',
			'why_us_title',
			'why_us_subtitle',

			'why_us_1',
			'why_us_2',
			'why_us_3',
			'why_us_4',

			'why_us_icon_1',
			'why_us_title_1',
			'why_us_content_1',
			'why_us_icon_2',
			'why_us_title_2',
			'why_us_content_2',
			'why_us_icon_3',
			'why_us_title_3',
			'why_us_content_3',
			'why_us_icon_4',
			'why_us_title_4',
			'why_us_content_4',
		);
		$options = edu_axis_get_option( $args );

		if ( ! $options['enable_why_us'] ) {
			return;
		}
		$why_us_ids = array();
		for ( $i = 1; $i <= 4; $i++ ) {
			if ( ! empty( $options[ 'why_us_' . $i ] ) ) {
				$why_us_ids[] = $options[ 'why_us_' . $i ];
			}
		}

		?>
		<section id="rt-why-us" class="edu-axis-section relative">
			<div class="rt-wrapper">
				<?php if ( ! empty( $options['why_us_title'] ) || ! empty( $options['why_us_subtitle'] ) ) : ?>
					<div class="section-header">
						<?php if ( ! empty( $options['why_us_title'] ) ) : ?>
							<h2 class="section-title"><?php echo esc_html( $options['why_us_title'] ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $options['why_us_subtitle'] ) ) : ?>
							<h5 class="section-subtitle"><?php echo esc_html( $options['why_us_subtitle'] ); ?></h5>
						<?php endif; ?>
					</div><!-- .section-header -->
				<?php endif; ?>
				<div class="rt-why-us-content">
					<?php
					if ( ! empty( $why_us_ids ) ) :
						$why_us_ids = array_unique( $why_us_ids );
						$counter    = 1;
						foreach ( $why_us_ids as $why_us_id ) { // temp fixes because of orderby post__in not working.
							?>
							<div class="rt-why-us-single">
								<div class="rt-why-us-icon"><div class="rt-why-us-icon-wrap"><i class="<?php echo esc_attr( $options[ 'why_us_icon_' . $counter ] ); ?>"></i> </div></div>
								<div class="rt-why-us-content">
									<h2><a href="<?php echo esc_url( get_the_permalink( $why_us_id ) ); ?>"><?php echo esc_html( get_the_title( $why_us_id ) ); ?></a></h2>
									<?php echo wp_kses_post( get_the_excerpt( $why_us_id ) ); ?>
								</div>
							</div>
							<?php
							$counter ++;
						}
					else :
						for ( $i = 1; $i <= 4; $i++ ) {
							?>
							<div class="rt-why-us-single">
								<div class="rt-why-us-icon"><div class="rt-why-us-icon-wrap"><i class="<?php echo esc_attr( $options[ 'why_us_icon_' . $i ] ); ?>"></i> </div></div>
								<div class="rt-why-us-content">
									<h2><?php echo esc_html( $options[ 'why_us_title_' . $i ] ); ?></h2>
									<p><?php echo esc_html( $options[ 'why_us_content_' . $i ] ); ?></p>
								</div>
							</div>

							<?php
						}
						?>
					<?php endif; ?>
					
					
				</div>
			</div>
					
		</section>
		<?php
	}
}
if ( ! function_exists( 'edu_axis_homepage_content_about_us' ) ) {

	// About Section.
	function edu_axis_homepage_content_about_us() {
		$args    = array(
			'enable_about_us',
			'about_us_page',
			'readmore_text',
			'about_us_title',
			'about_us_content',
		);
		$options = edu_axis_get_option( $args );

		if ( ! $options['enable_about_us'] ) {
			return;
		}
		$about_us_page = $options['about_us_page']; // Page id for about us page.
		$readmore_text = $options['readmore_text'];

		if ( $about_us_page ) :
			$about_args = array(
				'post_type'           => 'page',
				'page_id'             => $about_us_page,
				'ignore_sticky_posts' => 1,
			);
			$about_us   = new WP_Query( $about_args );
			if ( $about_us->have_posts() ) :
				while ( $about_us->have_posts() ) :
					$about_us->the_post();
					?>
					<section id="about-us" class="edu-axis-section relative">
						<div class="rt-wrapper">
							<article class="has-featured-image">
								<div class="featured-post-image">
										<div class="rt-featured-image">
											<img src="<?php echo esc_url( edu_axis_get_post_thumbnail_url( $about_us_page, 'full' ) ); ?>" alt="about-us">
										</div>
									</div><!-- .featured-image -->
							
									<div class="entry-container">
										<div class="section-header">
											<h2 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</div><!-- .section-header -->
							
										<div class="entry-content">
											<?php the_excerpt(); ?> 
										</div><!-- .entry-content -->
							
										<div class="read-more">
											<a href="<?php echo esc_url( the_permalink() ); ?>" class="btn btn-primary"><?php echo esc_html( $readmore_text ); ?></a>
										</div><!-- .read-more -->
									</div><!-- .entry-container -->
							</article>
						</div>
					</section>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
		else :
			?>
			<section id="about-us" class="edu-axis-section relative">
				<div class="rt-wrapper">
					<article class="has-featured-image">
						<div class="featured-post-image">
							<div class="rt-featured-image">
								<img src="<?php echo esc_url( edu_axis_get_default_thumbnail( true ) ); ?>" alt="about-us">
							</div>
						</div><!-- .featured-image -->
				
						<div class="entry-container">
							<div class="section-header">
								<h2 class="section-title"><a href="#"><?php echo esc_html( $options['about_us_title'] ); ?></a></h2>
							</div><!-- .section-header -->
				
							<div class="entry-content">
								<p><?php echo wp_kses( $options['about_us_content'], array( 'div', 'p' ) ); ?></p>
							</div><!-- .entry-content -->
				
							<div class="read-more">
								<a href="#" class="btn btn-primary"><?php echo esc_html( $readmore_text ); ?></a>
							</div><!-- .read-more -->
						</div><!-- .entry-container -->
					</article>
				</div>
			</section>
			<?php
		endif;

	}
}

if ( ! function_exists( 'edu_axis_homepage_content_latest_blog' ) ) {
	/**
	 * Services Section.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_homepage_content_latest_blog() {
		$args    = array(
			'enable_blog',
			'blog_title',
			'blog_subtitle',
			'hide_blog_content',
			'readmore_text',
			'hide_post_featured_image',
			'hide_post_author',
			'hide_post_date',
			'hide_post_category',
		);
		$options = edu_axis_get_option( $args );

		$enable_blog = $options['enable_blog'];

		if ( $enable_blog ) {
			$blog_title    = $options['blog_title'];
			$blog_subtitle = $options['blog_subtitle'];
			$readmore_text = $options['readmore_text'];
			?>
			<section class="edu-axis-section latest-blog">
				<div class="rt-wrapper">
					<?php if ( ! empty( $blog_title ) && ! empty( $blog_subtitle ) ) : ?>
						<div class="section-header">
														<?php if ( ! empty( $blog_title ) ) : ?>
								<h2 class="section-title"><?php echo esc_html( $blog_title ); ?></h2>
							<?php endif; ?>
														<?php if ( ! empty( $blog_subtitle ) ) : ?>
								<h5 class="section-subtitle"><?php echo esc_html( $blog_subtitle ); ?></h5>
							<?php endif; ?>
						</div><!-- .section-header -->
					<?php endif; ?>

					<div class="section-content">
						<?php
						$query_args           = array(
							'posts_per_page' => 6,
							'no_found_rows'  => true,
							'post_type'      => 'post',
						);
						$homepage_latest_blog = new WP_Query( $query_args );
						if ( $homepage_latest_blog->have_posts() ) :
							while ( $homepage_latest_blog->have_posts() ) :
								$homepage_latest_blog->the_post();
								?>
								<article id="latest-post-<?php echo esc_attr( get_the_ID() ); ?>" class="hentry">
									<div class="rt-featured-image">
										<?php
										if ( ! $options['hide_post_featured_image'] ) {
											edu_axis_post_thumbnail( 'edu-axis-featured-homepage' );
										}
										?>
										<div class="rt-overlay"></div>
										<div class="read-more">
											<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $readmore_text ); ?></a>
										</div><!-- .read-more -->
									</div><!-- .featured-image -->

									<div class="entry-container">
										<span class="entry-meta">
											<?php
											if ( ! $options['hide_post_category'] ) {
												edu_axis_post_category();
											}
											?>
										</span>

										<header class="entry-header">
											<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
										</header>
										
										<?php if ( ! $options['hide_blog_content'] ) : ?>
											<div class="entry-content">
												<?php the_excerpt(); ?>
											</div><!-- .entry-content -->
										<?php endif; ?>
										<div class="entry-footer">
											<?php if ( ! $options['hide_post_author'] ) : ?>
												<?php edu_axis_posted_by( 18 ); ?>
											<?php endif; ?>
											<?php edu_axis_post_comment(); ?>
											<div class="entry-footer-posted-on">
												<?php
												if ( ! $options['hide_post_date'] ) {
													edu_axis_posted_on();
												}
												?>
											</div>
										</div><!-- .entry-footer -->
										
									</div><!-- .entry-container -->
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div><!-- .section-content -->

					<div class="section-separator"></div>
				</div><!-- .blog-posts-wrapper -->
			</section><!-- #latest-posts -->
			<?php

		}
	}
}

if ( ! function_exists( 'edu_axis_homepage_content_cta' ) ) {
	/**
	 * Services Section.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_homepage_content_cta() {
		$args    = array(

			'enable_cta',
			'cta_title',
			'cta_description',
			'cta_button_text',
			'cta_button_link',
			'cta_background',
			'readmore_text',
		);
		$options = edu_axis_get_option( $args );

		if ( $options['enable_cta'] ) {

			$cta_title       = $options['cta_title'];
			$cta_description = $options['cta_description'];
			$cta_button_text = $options['cta_button_text'];
			$cta_button_link = $options['cta_button_link'];

			$cta_image = get_template_directory_uri() . '/assets/images/default.jpg';
			if ( ! empty( $options['cta_background'] ) ) {
				$cta_image = $options['cta_background'];

			}
			?>
			<section id="call-to-action" class="edu-axis-section relative" style="background-image: url( <?php echo esc_url( $cta_image ); ?> )">
				<div class="rt-overlay"></div>
				<div class="rt-wrapper relative">

					<?php if ( ! empty( $cta_title ) ) : ?>
						<div class="section-header">
							<h2 class="section-title"><?php echo esc_html( $cta_title ); ?></h2>
						</div><!-- .section-header -->
					<?php endif; ?>

									<?php if ( ! empty( $cta_description ) ) : ?>
						<div class="section-content">
																		<?php echo esc_html( $cta_description ); ?>
						</div><!-- .section-content -->
					<?php endif; ?>

					<div class="read-more">
						<a href="<?php echo esc_url( $cta_button_link ); ?>" class="btn btn-transparent"><?php echo esc_html( $cta_button_text ); ?></a>
					</div><!-- .read-more -->
				</div><!-- .wrapper -->
			</section><!-- #call-to-action -->
											<?php
		}
	}
}

if ( ! function_exists( 'edu_axis_homepage_content_featured_posts' ) ) {
	/**
	 * Services Section.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_homepage_content_featured_posts() {
		$args    = array(
			'enable_featured_post',
			'readmore_text',
			'featured_title',
			'featured_subtitle',
			'featured_post_1',
			'featured_post_2',
			'featured_post_3',
		);
		$options = edu_axis_get_option( $args );

		$enable_featured_post = $options['enable_featured_post'];
		if ( $enable_featured_post ) {

			$featured_posts = edu_axis_get_homepage_featured_post();
			if ( is_array( $featured_posts ) && count( $featured_posts ) > 0 ) :
				?>
				<section id="featured-posts" class="edu-axis-section relative">
					<?php if ( ! empty( $options['featured_title'] ) || ! empty( $options['featured_subtitle'] ) ) : ?>
						<div class="section-header">
							<?php if ( ! empty( $options['featured_title'] ) ) : ?>
								<h2 class="section-title"><?php echo esc_html( $options['featured_title'] ); ?></h2>
							<?php endif; ?>
							<?php if ( ! empty( $options['featured_subtitle'] ) ) : ?>
								<h5 class="section-subtitle"><?php echo esc_html( $options['featured_subtitle'] ); ?></h5>
							<?php endif; ?>
						</div><!-- .section-header -->
					<?php endif; ?>
					<div class="rt-wrapper featured-post-content">
						<?php
						foreach ( $featured_posts as $k => $featured_post ) :
							$thumbnail_url = isset( $featured_post['thumbnail_url'] ) && ! empty( $featured_post['thumbnail_url'] ) ? $featured_post['thumbnail_url'] : sprintf( '%s/assets/images/default.jpg', get_template_directory_uri() );
							?>
							<!-- <div class="featured-post-content"> -->
								<article style="background-image:url('<?php echo esc_url( $thumbnail_url ); ?>')">

										<div class="section-body">
											
										</div>
										<h3 class="entry-title">
										<a href="<?php echo esc_url( $featured_post['link'] ); ?>" target="_self">
											<?php echo $featured_post['title']; // phpcs:ignore ?>
										</a>
									</h3>
								</article>
							<!-- </div> -->
						<?php endforeach; ?>
					</div>
				</section>

				<?php
			endif;
		}

	}
}

if ( ! function_exists( 'edu_axis_homepage_content_instagram' ) ) {
	/**
	 * Instagram Feed.
	 *
	 * @since 1.0.0
	 */
	function edu_axis_homepage_content_instagram() {
		if ( shortcode_exists( 'instagram-feed' ) ) {

			?>
			<section>
				<?php echo do_shortcode( '[instagram-feed]' ); ?>
			</section>
											<?php
		}
	}
}
