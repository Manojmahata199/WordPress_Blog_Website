<?php
/**
 * Sidebar Position
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'ascendoor-magazine' ),
		'panel' => 'ascendoor_magazine_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_magazine_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ascendoor-magazine' ),
		'section' => 'ascendoor_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-magazine' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-magazine' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_magazine_post_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ascendoor-magazine' ),
		'section' => 'ascendoor_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-magazine' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-magazine' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_magazine_page_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ascendoor-magazine' ),
		'section' => 'ascendoor_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-magazine' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-magazine' ),
		),
	)
);
