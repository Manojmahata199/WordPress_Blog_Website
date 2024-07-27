<?php
if ( ! get_theme_mod( 'ascendoor_magazine_enable_post_carousel_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'ascendoor_magazine_post_carousel_content_type', 'post' );

for ( $i = 1; $i <= 4; $i++ ) {
	$content_ids[] = get_theme_mod( 'ascendoor_magazine_post_carousel_content_' . $content_type . '_' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 4 ),
	'ignore_sticky_posts' => true,
);

$args = apply_filters( 'ascendoor_magazine_post_carousel_section_args', $args );

ascendoor_magazine_render_post_carousel_section( $args );

/**
 * Render Post Carousel Section.
 */
function ascendoor_magazine_render_post_carousel_section( $args ) {
	$section_title = get_theme_mod( 'ascendoor_magazine_post_carousel_title', __( 'Post Carousel', 'ascendoor-magazine' ) );
	$button_label  = get_theme_mod( 'ascendoor_magazine_post_carousel_button_label', __( 'View All', 'ascendoor-magazine' ) );
	$button_link   = get_theme_mod( 'ascendoor_magazine_post_carousel_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="ascendoor_magazine_post_carousel_section" class="magazine-frontpage-section magazine-post-carousel-section">
			<?php
			if ( is_customize_preview() ) :
				ascendoor_magazine_section_link( 'ascendoor_magazine_post_carousel_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $button_label ) ) { ?>
				<div class="section-header">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<a href="<?php echo esc_url( $button_link ); ?>" class="mag-view-all-link"><?php echo esc_html( $button_label ); ?></a>
				</div>
				<?php } ?>
				<div class="magazine-section-body">
					<div class="magazine-post-carousel-section-wrapper post-carousel magazine-carousel-slider-navigation">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image tile-design">
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
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
