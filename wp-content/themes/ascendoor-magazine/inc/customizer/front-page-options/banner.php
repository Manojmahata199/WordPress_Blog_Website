<?php
/**
 * Banner Section
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_banner_section',
	array(
		'panel' => 'ascendoor_magazine_front_page_options',
		'title' => esc_html__( 'Banner Section', 'ascendoor-magazine' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ascendoor-magazine' ),
			'section'  => 'ascendoor_magazine_banner_section',
			'settings' => 'ascendoor_magazine_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_magazine_enable_banner_section',
		array(
			'selector' => '#ascendoor_magazine_banner_section .section-link',
			'settings' => 'ascendoor_magazine_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'ascendoor_magazine_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_banner_section',
		'settings'        => 'ascendoor_magazine_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_magazine_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-magazine' ),
			'post' => esc_html__( 'Post', 'ascendoor-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_magazine_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_banner_section',
			'settings'        => 'ascendoor_magazine_banner_slider_content_post_' . $i,
			'active_callback' => 'ascendoor_magazine_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_post_choices(),
		)
	);

	// Banner Section - Select Page.
	$wp_customize->add_setting(
		'ascendoor_magazine_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_banner_section',
			'settings'        => 'ascendoor_magazine_banner_slider_content_page_' . $i,
			'active_callback' => 'ascendoor_magazine_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_page_choices(),
		)
	);

}

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ascendoor_magazine_banner_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Customize_Horizontal_Line(
		$wp_customize,
		'ascendoor_magazine_banner_horizontal_line',
		array(
			'section'         => 'ascendoor_magazine_banner_section',
			'settings'        => 'ascendoor_magazine_banner_horizontal_line',
			'active_callback' => 'ascendoor_magazine_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Banner Grid Posts Content Type.
$wp_customize->add_setting(
	'ascendoor_magazine_banner_grid_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_banner_grid_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Grid Posts Content Type', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_banner_section',
		'settings'        => 'ascendoor_magazine_banner_grid_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_magazine_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-magazine' ),
			'post' => esc_html__( 'Post', 'ascendoor-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Banner Section - Banner Grid Select Post.
	$wp_customize->add_setting(
		'ascendoor_magazine_banner_grid_post_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_banner_grid_post_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_banner_section',
			'settings'        => 'ascendoor_magazine_banner_grid_post_content_post_' . $i,
			'active_callback' => 'ascendoor_magazine_is_banner_grid_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_post_choices(),
		)
	);

	// Banner Section - Banner Grid Select Page.
	$wp_customize->add_setting(
		'ascendoor_magazine_banner_grid_post_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_banner_grid_post_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_banner_section',
			'settings'        => 'ascendoor_magazine_banner_grid_post_content_page_' . $i,
			'active_callback' => 'ascendoor_magazine_is_banner_grid_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_page_choices(),
		)
	);

}
