<?php
/**
 * Flash News Section
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_flash_news_section',
	array(
		'panel' => 'ascendoor_magazine_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'ascendoor-magazine' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'ascendoor-magazine' ),
			'section'  => 'ascendoor_magazine_flash_news_section',
			'settings' => 'ascendoor_magazine_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_magazine_enable_flash_news_section',
		array(
			'selector' => '#ascendoor_magazine_flash_news_section .section-link',
			'settings' => 'ascendoor_magazine_enable_flash_news_section',
		)
	);
}

// Flash News Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_magazine_flash_news_title',
	array(
		'default'           => __( 'Flash News', 'ascendoor-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_flash_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_flash_news_section',
		'settings'        => 'ascendoor_magazine_flash_news_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_magazine_is_flash_news_section_enabled',
	)
);

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'ascendoor_magazine_flash_news_speed_controller',
	array(
		'default'           => 600,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'ascendoor-magazine' ),
		'description'     => esc_html__( 'Note: Default speed value is 600.', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_flash_news_section',
		'settings'        => 'ascendoor_magazine_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'ascendoor_magazine_is_flash_news_section_enabled',
	)
);

// Flash News Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_magazine_flash_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_flash_news_section',
		'settings'        => 'ascendoor_magazine_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_magazine_is_flash_news_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-magazine' ),
			'post' => esc_html__( 'Post', 'ascendoor-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Flash News Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_magazine_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_flash_news_section',
			'settings'        => 'ascendoor_magazine_flash_news_content_post_' . $i,
			'active_callback' => 'ascendoor_magazine_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_post_choices(),
		)
	);

	// Flash News Section - Select Page.
	$wp_customize->add_setting(
		'ascendoor_magazine_flash_news_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_flash_news_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_flash_news_section',
			'settings'        => 'ascendoor_magazine_flash_news_content_page_' . $i,
			'active_callback' => 'ascendoor_magazine_is_flash_news_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_page_choices(),
		)
	);

}
