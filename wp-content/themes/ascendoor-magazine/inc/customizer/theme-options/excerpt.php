<?php
/**
 * Excerpt
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_excerpt_options',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Excerpt', 'ascendoor-magazine' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ascendoor_magazine_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ascendoor-magazine' ),
		'section'     => 'ascendoor_magazine_excerpt_options',
		'settings'    => 'ascendoor_magazine_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Excerpt - Read More Text.
$wp_customize->add_setting(
	'ascendoor_magazine_excerpt_more_text',
	array(
		'default'           => esc_html__( 'Read More', 'ascendoor-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_excerpt_more_text',
	array(
		'label'    => esc_html__( 'Read More Text', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_excerpt_options',
		'settings' => 'ascendoor_magazine_excerpt_more_text',
		'type'     => 'text',
	)
);
