<?php
/**
 * Typography
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_typography',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Typography', 'ascendoor-magazine' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ascendoor_magazine_site_title_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_typography',
		'settings' => 'ascendoor_magazine_site_title_font',
		'type'     => 'select',
		'choices'  => ascendoor_magazine_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ascendoor_magazine_site_description_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_typography',
		'settings' => 'ascendoor_magazine_site_description_font',
		'type'     => 'select',
		'choices'  => ascendoor_magazine_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ascendoor_magazine_header_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_typography',
		'settings' => 'ascendoor_magazine_header_font',
		'type'     => 'select',
		'choices'  => ascendoor_magazine_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ascendoor_magazine_body_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_typography',
		'settings' => 'ascendoor_magazine_body_font',
		'type'     => 'select',
		'choices'  => ascendoor_magazine_get_all_google_font_families(),
	)
);
