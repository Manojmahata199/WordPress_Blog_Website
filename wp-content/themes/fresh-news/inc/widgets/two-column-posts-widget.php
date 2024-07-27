<?php
if ( ! class_exists( 'Fresh_News_Two_Column_Posts_Widget' ) ) {
	/**
	 * Adds Fresh_News_Two_Column_Posts_Widget.
	 */
	class Fresh_News_Two_Column_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$fresh_news_two_column_posts_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-double-category-section',
				'description' => __( 'Retrive Two Column Posts Widgets', 'fresh-news' ),
			);
			parent::__construct(
				'fresh_news_double_category_widget',
				__( 'Ascendoor Two Column Posts Widget', 'fresh-news' ),
				$fresh_news_two_column_posts_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$two_column_posts_count   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$two_column_posts_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$two_column_posts_orderby = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$two_column_posts_order   = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';

			echo $args['before_widget'];
			?>
			<div class="magazine-section-body">
				<div class="magazine-double-category-section-wrapper">
					<?php
					for ( $i = 1; $i <= 2; $i++ ) {
						$two_column_posts_title    = ( ! empty( $instance[ 'title_' . $i ] ) ) ? ( $instance[ 'title_' . $i ] ) : '';
						$two_column_posts_title    = apply_filters( 'widget_title_' . $i, $two_column_posts_title, $instance, $this->id_base );
						$two_column_posts_category = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
						?>
						<div class="magazine-category-single">
							<div class="section-header">
								<?php
								if ( ! empty( $two_column_posts_title ) ) {
									echo $args['before_title'] . esc_html( $two_column_posts_title ) . $args['after_title'];
								}
								?>
							</div>
							<?php
							$two_column_posts_widgets_args = array(
								'post_type'      => 'post',
								'posts_per_page' => absint( $two_column_posts_count ),
								'offset'         => absint( $two_column_posts_offset ),
								'orderby'        => $two_column_posts_orderby,
								'order'          => $two_column_posts_order,
								'cat'            => absint( $two_column_posts_category ),
							);

							$query = new WP_Query( $two_column_posts_widgets_args );
							if ( $query->have_posts() ) :
								$j = 1;
								while ( $query->have_posts() ) :
									$query->the_post();
									$post_single_additional_class = ( 1 === $j ) ? 'tile-design' : 'list-design';
									$post_single_category_class   = ( 1 === $j ) ? 'with-background' : '';
									?>
									<div class="mag-post-single has-image <?php echo esc_attr( $post_single_additional_class ); ?>">
										<div class="mag-post-img">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail(); ?>
											</a>
										</div>
										<div class="mag-post-detail">
											<div class="mag-post-category <?php echo esc_attr( $post_single_category_class ); ?>">
												<?php
												$with_background = false;
												if ( 'with-background' === $post_single_category_class ) {
													$with_background = true;
												}
												ascendoor_magazine_categories_list( $with_background );
												?>
											</div>
											<h3 class="mag-post-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<div class="mag-post-meta">
												<span class="post-author">
													<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
												</span>
												<span class="post-date">
													<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
												</span>
											</div>
										</div>
									</div>
									<?php
									$j++;
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$two_column_posts_title_1    = isset( $instance['title_1'] ) ? ( $instance['title_1'] ) : '';
			$two_column_posts_title_2    = isset( $instance['title_2'] ) ? ( $instance['title_2'] ) : '';
			$two_column_posts_count      = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$two_column_posts_offset     = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$two_column_posts_category_1 = isset( $instance['category_1'] ) ? absint( $instance['category_1'] ) : '';
			$two_column_posts_category_2 = isset( $instance['category_2'] ) ? absint( $instance['category_2'] ) : '';
			$two_column_posts_orderby    = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$two_column_posts_order      = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_1' ) ); ?>"><?php esc_html_e( 'Section Title 1', 'fresh-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_1' ) ); ?>" type="text" value="<?php echo esc_attr( $two_column_posts_title_1 ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category_1' ) ); ?>"><?php esc_html_e( 'Select the category 1 to show posts', 'fresh-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_1' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories_1 = ascendoor_magazine_get_post_cat_choices();
					foreach ( $categories_1 as $category_1 => $value_1 ) {
						?>
						<option value="<?php echo absint( $category_1 ); ?>" <?php selected( $two_column_posts_category_1, $category_1 ); ?>><?php echo esc_html( $value_1 ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_2' ) ); ?>"><?php esc_html_e( 'Section Title 2', 'fresh-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_2' ) ); ?>" type="text" value="<?php echo esc_attr( $two_column_posts_title_2 ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category_2' ) ); ?>"><?php esc_html_e( 'Select the category 2 to show posts', 'fresh-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_2' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories_2 = ascendoor_magazine_get_post_cat_choices();
					foreach ( $categories_2 as $category_2 => $value_2 ) {
						?>
						<option value="<?php echo absint( $category_2 ); ?>" <?php selected( $two_column_posts_category_2, $category_2 ); ?>><?php echo esc_html( $value_2 ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show', 'fresh-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="4" value="<?php echo absint( $two_column_posts_count ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over', 'fresh-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $two_column_posts_offset ); ?>" />
			</p>
			<p>
				<label><?php esc_html_e( 'Order By', 'fresh-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="date" <?php checked( 'date', $two_column_posts_orderby ); ?> />
							<?php esc_html_e( 'Published Date', 'fresh-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="title" <?php checked( 'title', $two_column_posts_orderby ); ?> />
							<?php esc_html_e( 'Alphabetical Order', 'fresh-news' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<p>
				<label><?php esc_html_e( 'Sort By', 'fresh-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="asc" <?php checked( 'asc', $two_column_posts_order ); ?> />
							<?php esc_html_e( 'Ascending Order', 'fresh-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="desc" <?php checked( 'desc', $two_column_posts_order ); ?> />
							<?php esc_html_e( 'Descending Order', 'fresh-news' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance               = $old_instance;
			$instance['title_1']    = sanitize_text_field( $new_instance['title_1'] );
			$instance['title_2']    = sanitize_text_field( $new_instance['title_2'] );
			$instance['number']     = (int) $new_instance['number'];
			$instance['offset']     = (int) $new_instance['offset'];
			$instance['category_1'] = (int) $new_instance['category_1'];
			$instance['category_2'] = (int) $new_instance['category_2'];
			$instance['orderby']    = wp_strip_all_tags( $new_instance['orderby'] );
			$instance['order']      = wp_strip_all_tags( $new_instance['order'] );
			return $instance;
		}

	}
}
