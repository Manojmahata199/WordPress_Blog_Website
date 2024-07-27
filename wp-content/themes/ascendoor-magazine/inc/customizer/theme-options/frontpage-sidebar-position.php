<?php
/**
 * Frontpage Sidebar Position
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_frontpage_sidebar',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Frontpage Sidebar Position', 'ascendoor-magazine' ),
	)
);

// Frontpage Sidebar Position - Frontpage Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_magazine_frontpage_sidebar_position',
	array(
		'default'           => 'frontpage-right-sidebar',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_frontpage_sidebar_position',
	array(
		'label'    => esc_html__( 'Frontpage Sidebar Position', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_frontpage_sidebar',
		'settings' => 'ascendoor_magazine_frontpage_sidebar_position',
		'type'     => 'select',
		'choices'  => array(
			'frontpage-left-sidebar'  => __( 'Left', 'ascendoor-magazine' ),
			'frontpage-right-sidebar' => __( 'Right', 'ascendoor-magazine' ),
		),
	)
);
