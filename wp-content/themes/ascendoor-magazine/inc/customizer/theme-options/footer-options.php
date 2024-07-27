<?php
/**
 * Footer Options
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_footer_options',
	array(
		'panel' => 'ascendoor_magazine_theme_options',
		'title' => esc_html__( 'Footer Options', 'ascendoor-magazine' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'ascendoor-magazine' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'ascendoor_magazine_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_footer_options',
		'settings' => 'ascendoor_magazine_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'ascendoor_magazine_scroll_top',
	array(
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_footer_options',
		)
	)
);
