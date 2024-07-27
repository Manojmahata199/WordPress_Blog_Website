<?php
/**
 * Header Options
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_header_options',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Header Options', 'ascendoor-magazine' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_topbar',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_header_options',
		)
	)
);

// Header Options - Enable Date.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_day_date',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_day_date',
		array(
			'label'           => esc_html__( 'Enable Date', 'ascendoor-magazine' ),
			'section'         => 'ascendoor_magazine_header_options',
			'active_callback' => 'ascendoor_magazine_is_topbar_enabled',
		)
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'ascendoor_magazine_header_advertisement',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ascendoor_magazine_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'ascendoor-magazine' ),
			'section'  => 'ascendoor_magazine_header_options',
			'settings' => 'ascendoor_magazine_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'ascendoor_magazine_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_header_options',
		'settings' => 'ascendoor_magazine_header_advertisement_url',
		'type'     => 'url',
	)
);
