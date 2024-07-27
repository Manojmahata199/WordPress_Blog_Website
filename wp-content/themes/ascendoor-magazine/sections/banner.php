<?php
if ( ! get_theme_mod( 'ascendoor_magazine_enable_banner_section', false ) ) {
	return;
}

$content_ids         = $grid_content_ids = array();
$slider_content_type = get_theme_mod( 'ascendoor_magazine_banner_slider_content_type', 'post' );
$gird_content_type   = get_theme_mod( 'ascendoor_magazine_banner_grid_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$content_ids[] = get_theme_mod( 'ascendoor_magazine_banner_slider_content_' . $slider_content_type . '_' . $i );
}
$banner_slider_args = array(
	'post_type'           => $slider_content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$banner_slider_args = apply_filters( 'ascendoor_magazine_banner_section_args', $banner_slider_args );

for ( $i = 1; $i <= 4; $i++ ) {
	$grid_content_ids[] = get_theme_mod( 'ascendoor_magazine_banner_grid_post_content_' . $gird_content_type . '_' . $i );
}
$banner_grid_args = array(
	'post_type'           => $gird_content_type,
	'post__in'            => array_filter( $grid_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 4 ),
	'ignore_sticky_posts' => true,
);
$banner_grid_args = apply_filters( 'ascendoor_magazine_banner_section_args', $banner_grid_args );

ascendoor_magazine_render_banner_section( $banner_slider_args, $banner_grid_args );

/**
 * Render Banner Section.
 */
function ascendoor_magazine_render_banner_section( $banner_slider_args, $banner_grid_args ) {
	?>
	<section id="ascendoor_magazine_banner_section" class="banner-section banner-section-style-1">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_magazine_section_link( 'ascendoor_magazine_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<?php
				$query = new WP_Query( $banner_slider_args );
				if ( $query->have_posts() ) :
					?>
					<div class="slider-part">
						<div class="magazine-slider-wrapper banner-slider magazine-carousel-slider-navigation">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="mag-post-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'full' ); ?>
										</a>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-category with-background">
											<?php ascendoor_magazine_categories_list( true ); ?>
										</div>
										<h3 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="mag-post-meta">
											<?php
											ascendoor_magazine_posted_by();
											ascendoor_magazine_posted_on();
											?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
					<?php
				endif;

				$grid_query = new WP_Query( $banner_grid_args );
				if ( $grid_query->have_posts() ) :
					while ( $grid_query->have_posts() ) :
						$grid_query->the_post();
						?>
						<div class="mag-post-single banner-gird-single has-image tile-design">
							<div class="mag-post-img">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<div class="mag-post-detail">
								<div class="mag-post-category with-background">
									<?php ascendoor_magazine_categories_list( true ); ?>
								</div>
								<h3 class="mag-post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="mag-post-meta">
									<?php
										ascendoor_magazine_posted_by();
										ascendoor_magazine_posted_on();
									?>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>
	<?php
}
