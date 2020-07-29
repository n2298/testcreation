<?php
/**
 * Author Widget.
 *
 * @since edu-axis 1.0.0
 */
if ( ! class_exists( 'Edu_Axis_Author_Profile_Widget' ) ) :

	class Edu_Axis_Author_Profile_Widget extends Edu_Axis_Widget {

		public $image_field = 'image';  // the image field ID

		public function __construct() {
			$widget_ops = array(
				'description'                 => esc_html__( 'Widget for your profile.', 'edu-axis' ),
				'customize_selective_refresh' => true,
			);

			parent::__construct(
				'edu_axis_author_profile_widget',
				esc_html__( 'Edu Axis Author', 'edu-axis' ),
				$widget_ops
			);

			$this->fields = array(
				'title'       => array(
					'label'   => esc_html__( 'Title', 'edu-axis' ),
					'type'    => 'text',
					'default' => esc_html__( 'About the Author', 'edu-axis' ),
				),
				'page_id'     => array(
					'label' => esc_html__( 'Select Page', 'edu-axis' ),
					'type'  => 'dropdown-pages',
				),
				'sub_title'   => array(
					'label'   => esc_html__( 'Sub Title', 'edu-axis' ),
					'type'    => 'text',
					'default' => esc_html__( 'Blogger', 'edu-axis' ),
				),
				'btn_text'    => array(
					'label'   => esc_html__( 'Button Text', 'edu-axis' ),
					'type'    => 'text',
					'default' => esc_html__( 'About Me', 'edu-axis' ),
				),
				'social_menu' => array(
					'label' => esc_html__( 'Select Social Menu', 'edu-axis' ),
					'type'  => 'dropdown-menus',
				),
			);
		}

		public function widget( $args, $instance ) {
			echo $args['before_widget']; // phpcs:ignore

			$instance  = $this->init_defaults( $instance );
			$unique_id = uniqid(); ?>
			<?php if ( $instance['page_id'] ) : ?>

				<?php
				echo '<div class="widget-title-wrap">' . $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] . '</div>'; // phpcs:ignore

				$query = new WP_Query(
					array(
						'p'         => $instance['page_id'],
						'post_type' => 'page',
					)
				);

				while ( $query->have_posts() ) {
					$query->the_post();
						$default = sprintf( '%s/assets/images/default-profile.jpg', get_template_directory_uri() );
						$src     = edu_axis_get_post_thumbnail_url( get_the_ID(), 'edu-axis-square-thumbnail-small', $default );
					?>
					<div class="widget-content">
						<div class="profile">
							<div class="avatar">
								<figure>
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url( $src ); ?>" alt="<?php the_title_attribute(); ?>" >
									</a>
								</figure>
							</div>
							<div class="name-title">
								<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
								<h3><?php echo esc_html( $instance['sub_title'] ); ?></h3>
							</div>
							<div class="socialgroup">
								<?php echo $this->get_menu( $instance['social_menu'] ); // phpcs:ignore ?>
							</div>
							<div class="read-more">
								<a href="<?php the_permalink(); ?>" class="btn btn-primary" >
									<?php echo esc_html( $instance['btn_text'] ); ?>
								</a>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			<?php endif; ?>
			<?php

			wp_reset_postdata();
			echo $args['after_widget']; // phpcs:ignore
		}
	}

endif;
