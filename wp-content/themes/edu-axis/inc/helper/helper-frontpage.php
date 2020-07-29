<?php
/**
 * Helper functions.
 *
 * @since 1.0.0
 * @package edu-axis
 */

if ( ! function_exists( 'edu_axis_get_homepage_featured_post' ) ) {
	function edu_axis_get_homepage_featured_post() {
		$args    = array(
			'featured_post_1',
			'featured_post_2',
			'featured_post_3',
			'featured_one_title',
			'featured_one_content',
			'featured_two_title',
			'featured_two_content',
			'featured_three_title',
			'featured_three_content',
		);
		$options = edu_axis_get_option( $args );
		// Default.
		$services_data = array(
			array(
				'title'   => $options['featured_one_title'],
				'content' => $options['featured_one_content'],
				'link'    => '#',
			),
			array(
				'title'   => $options['featured_two_title'],
				'content' => $options['featured_two_content'],
				'link'    => '#',
			),
			array(
				'title'   => $options['featured_three_title'],
				'content' => $options['featured_three_content'],
				'link'    => '#',
			),
		);

		$page_ids = array();
		for ( $i = 1; $i <= 3; $i++ ) {
			$page_id = isset( $options[ 'featured_post_' . $i ] ) ? $options[ 'featured_post_' . $i ] : '';
			if ( ! $page_id ) {
				continue;
			}
			$page_ids[] = $page_id;
		}
		if ( ! empty( $page_ids ) ) {
			$services_args = array(
				'post_type'           => 'post',
				'post__in'            => $page_ids,
				'posts_per_page'      => 3,
				'orderby'             => 'post__in',
				'ignore_sticky_posts' => 1,
			);

			$service_post_query = new WP_Query( $services_args );
			if ( $service_post_query->have_posts() ) :
				$i = 0;
				while ( $service_post_query->have_posts() ) :
					$service_post_query->the_post();

					$title   = get_the_title();
					$content = get_the_content();
					if ( ! empty( $title ) ) {
						$services_data[ $i ]['title'] = $title;
					}
					if ( ! empty( $content ) ) {
						$services_data[ $i ]['content'] = get_the_excerpt();
					}
					$services_data[ $i ]['link']          = get_permalink();
					$services_data[ $i ]['ID']            = get_the_ID();
					$services_data[ $i ]['thumbnail_url'] = edu_axis_get_post_thumbnail_url( get_the_ID(), 'edu-axis-thumbnail' );

					$i++;
				endwhile;
				wp_reset_postdata();
			endif;
		}
		return $services_data;
	}
}
