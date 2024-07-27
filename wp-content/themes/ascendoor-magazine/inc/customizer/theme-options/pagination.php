<?php
/**
 * Pagination
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_pagination',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Pagination', 'ascendoor-magazine' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ascendoor-magazine' ),
			'section'  => 'ascendoor_magazine_pagination',
			'settings' => 'ascendoor_magazine_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ascendoor_magazine_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_pagination',
		'settings'        => 'ascendoor_magazine_pagination_type',
		'active_callback' => 'ascendoor_magazine_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ascendoor-magazine' ),
			'numeric' => __( 'Numeric', 'ascendoor-magazine' ),
		),
	)
);
