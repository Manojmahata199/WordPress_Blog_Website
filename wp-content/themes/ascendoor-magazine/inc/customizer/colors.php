<?php
/**
 * Color Option
 *
 * @package Ascendoor_Magazine
 */

$default_color = ascendoor_magazine_get_default_color();

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => $default_color['primary'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'ascendoor-magazine' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
