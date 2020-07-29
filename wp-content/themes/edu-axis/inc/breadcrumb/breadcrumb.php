<?php


if ( ! function_exists( 'edu_axis_default_breadcrumb' ) ) :

	/**
	 * De breadcrumb
	 *
	 * Source: https://gist.github.com/melissacabral/4032941
	 *
	 * @since  1.0.0
	 * @package edu-axis
	 */

	function edu_axis_default_breadcrumb( $args = array() ) {

		$args = wp_parse_args(
			(array) $args,
			array(
				'separator'    => '&gt;',
				'show_current' => 1,
				'show_on_home' => 0,
			)
		);

		/* === OPTIONS === */
		$text['home']     = __( 'Home', 'edu-axis' ); // text for the 'Home' link
		$text['category'] = __( 'Category : <em>%s</em>', 'edu-axis' ); // phpcs:ignore
		$text['tax']      = __( 'Archive : <em>%s</em>', 'edu-axis' ); // phpcs:ignore
		$text['search']   = __( 'Search results for: <em>%s</em>', 'edu-axis' ); // phpcs:ignore
		$text['tag']      = __( 'Posts tagged :<em>%s</em>', 'edu-axis' ); // phpcs:ignore
		$text['author']   = __( 'View all posts by <em>%s</em>', 'edu-axis' ); // phpcs:ignore
		$text['404']      = __( 'Error 404', 'edu-axis' ); // text for the 404 page

		$showCurrent = $args['show_current']; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = $args['show_on_home']; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = ' ' . $args['separator'] . ' '; // delimiter between crumbs
		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink   = home_url( '/' );
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter  = '</span>';
		$linkAttr   = ' rel="v:url" property="v:title"';
		$link       = $linkBefore . '<a' . esc_attr( $linkAttr ) . ' href="%1$s">%2$s</a>' . $linkAfter;

		if ( is_home() || is_front_page() ) {

			if ( $showOnHome == 1 ) {
				?>
				<div id="crumbs"><a href="<?php echo esc_url( $homeLink ); ?>"><?php echo esc_html( $text['home'] ); ?></a></div>
				<?php
			}
		} else {
			?>
			<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
				<span typeof="v:Breadcrumb">
					<a rel="v:url" property="v:title" href="<?php echo esc_url( $homeLink ); ?>" ><?php echo esc_html( $text['home'] ); ?></a>
				</span>
				<?php
				echo $delimiter; // phpcs:ignore 

				if ( is_category() ) {
					$thisCat = get_category( get_query_var( 'cat' ), false );
					if ( $thisCat->parent != 0 ) {
						$cats = get_category_parents( $thisCat->parent, true, $delimiter );
						$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
						$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
						echo $cats; // phpcs:ignore 
					}
					?><span class="current"> <?php echo sprintf( $text['category'], single_cat_title( '', false ) ); // phpcs:ignore ?></span><?php
				} elseif ( is_tax() ) {
					$thisCat = get_category( get_query_var( 'cat' ), false );
					if ( $thisCat->parent != 0 ) {
						$cats = get_category_parents( $thisCat->parent, true, $delimiter );
						$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
						$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
						echo $cats; // phpcs:ignore 
					}
					?><span class="current"><?php echo sprintf( $text['tax'], single_cat_title( '', false ) ); // phpcs:ignore ?></span><?php
				} elseif ( is_search() ) {
					?><span class="current"><?php echo sprintf( $text['search'], esc_html( get_search_query() ) ); // phpcs:ignore ?></span><?php

				} elseif ( is_day() ) {
					echo sprintf( $link, esc_html( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) ) ) . $delimiter; // phpcs:ignore 
					echo sprintf( $link, esc_html( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), esc_html( get_the_time( 'F' ) ) ) . $delimiter; // phpcs:ignore 
					?>
					<span class="current"><?php echo esc_html( get_the_time( 'd' ) ); ?></span>
					<?php

				} elseif ( is_month() ) {
					echo sprintf( $link, esc_html( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) ) ) . $delimiter; // phpcs:ignore 
					?>
					<span class="current"><?php echo esc_html( get_the_time( 'F' ) ); ?></span>
					<?php

				} elseif ( is_year() ) {
					?>
					<span class="current"><?php echo esc_html( get_the_time( 'Y' ) ); ?></span>
					<?php

				} elseif ( is_single() && ! is_attachment() ) {
					if ( 'product' == get_post_type() ) {
						$post_type     = get_post_type_object( get_post_type() );
						$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
						printf( $link, $shop_page_url . '/', $post_type->labels->singular_name ); // phpcs:ignore 
						if ( $showCurrent == 1 ) {
							echo $delimiter; // phpcs:ignore
							?>
							<span class="current"><?php the_title(); ?></span>
							<?php
						}
					} elseif ( get_post_type() != 'post' ) {
						$post_type = get_post_type_object( get_post_type() );
						$slug      = $post_type->rewrite;
						printf( $link, esc_url( $homeLink ) . '/' . $slug['slug'] . '/', $post_type->labels->singular_name ); // phpcs:ignore 
						if ( $showCurrent == 1 ) {
							echo $delimiter; // phpcs:ignore
							?>
							<span class="current"><?php the_title(); ?></span>
							<?php
						}
					} else {
						$cat  = get_the_category();
						$cat  = $cat[0];
						$cats = get_category_parents( $cat, true, $delimiter );
						if ( $showCurrent == 0 ) {
							$cats = preg_replace( "#^(.+)$delimiter$#", '$1', $cats );
						}
						$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
						$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
						echo $cats; // phpcs:ignore 
						if ( $showCurrent == 1 ) {
							?>
							<span class="current"><?php the_title(); ?></span>
							<?php
						}
					}
				} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
					$post_type = get_post_type_object( get_post_type() );
					?>
					<span class="current"><?php echo esc_html( $post_type->labels->singular_name ); ?></span>
					<?php

				} elseif ( is_attachment() ) {
					$parent = get_post( $post->post_parent );
					$cat    = get_the_category( $parent->ID );
					$cat    = $cat[0];
					$cats   = get_category_parents( $cat, true, $delimiter );
					$cats   = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
					$cats   = str_replace( '</a>', '</a>' . $linkAfter, $cats );
					echo $cats; // phpcs:ignore 
					printf( $link, esc_url( get_permalink( $parent ) ), esc_html( $parent->post_title ) ); // phpcs:ignore 
					if ( $showCurrent == 1 ) {
						echo $delimiter; // phpcs:ignore 
						?>
						<span class="current"><?php the_title(); ?></span>
						<?php
					}
				} elseif ( is_page() && ! $post->post_parent ) {
					if ( $showCurrent == 1 ) {
						?>
						<span class="current"><?php the_title(); ?></span>
						<?php
					}
				} elseif ( is_page() && $post->post_parent ) {
					$parent_id   = $post->post_parent;
					$breadcrumbs = array();
					while ( $parent_id ) {
							$page          = get_page( $parent_id );
							$breadcrumbs[] = sprintf( $link, esc_url( get_permalink( $page->ID ) ), esc_html( get_the_title( $page->ID ) ) );
							$parent_id     = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
						echo $breadcrumbs[ $i ]; // phpcs:ignore 
						if ( $i != count( $breadcrumbs ) - 1 ) {
							echo $delimiter; // phpcs:ignore 
						}
					}
					if ( $showCurrent == 1 ) {
						echo $delimiter; // phpcs:ignore
						?>
						<span class="current"><?php the_title(); ?></span>
						<?php
					}
				} elseif ( is_tag() ) {
					?>
						<span class="current"><?php echo sprintf( $text['tag'], esc_html( single_tag_title( '', false ) ) ); // phpcs:ignore ?></span><?php

				} elseif ( is_author() ) {
					global $author;
					$userdata = get_userdata( $author );
					?><span class="current"><?php echo sprintf( $text['author'], esc_html( $userdata->display_name ) ); // phpcs:ignore ?></span><?php

				} elseif ( is_404() ) {
					?>
					<span class="current"><?php echo esc_html( $text['404'] ); ?></span>
					<?php
				}

				if ( get_query_var( 'paged' ) ) {
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						echo ' (';
					}
					echo esc_html__( 'Page', 'edu-axis' ) . ' ' . esc_html( get_query_var( 'paged' ), 'edu-axis' ); // phpcs:ignore 
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						echo ')';
					}
				}
				?>
			</div>
			<?php
		}
	}

endif;
