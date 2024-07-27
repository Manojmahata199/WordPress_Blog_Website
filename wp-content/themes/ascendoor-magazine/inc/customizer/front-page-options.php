<?php
/**
 * Front Page Options
 *
 * @package Ascendoor Magazine
 */

$wp_customize->add_panel(
	'ascendoor_magazine_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ascendoor-magazine' ),
		'priority' => 130,
	)
);

// Flash News Section.
require get_template_directory() . '/inc/customizer/front-page-options/flash-news.php';

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Post Carousel Section.
require get_template_directory() . '/inc/customizer/front-page-options/post-carousel.php';
