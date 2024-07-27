<?php
/**
 * Breadcrumb
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ascendoor-magazine' ),
		'panel' => 'ascendoor_magazine_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ascendoor_magazine_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ascendoor-magazine' ),
		'active_callback' => 'ascendoor_magazine_is_breadcrumb_enabled',
		'section'         => 'ascendoor_magazine_breadcrumb',
	)
);
