<?php
/**
 * Post Options
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ascendoor-magazine' ),
		'panel' => 'ascendoor_magazine_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_post_options',
		)
	)
);

// Post Options - Hide Author Info.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_author_info',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_author_info',
		array(
			'label'           => esc_html__( 'Hide Author Info', 'ascendoor-magazine' ),
			'section'         => 'ascendoor_magazine_post_options',
			'active_callback' => function( $control ) {
				return ( $control->manager->get_Setting( 'ascendoor_magazine_post_hide_author' )->value() == false );
			},
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ascendoor_magazine_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ascendoor-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'ascendoor-magazine' ),
		'section'  => 'ascendoor_magazine_post_options',
		'settings' => 'ascendoor_magazine_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'ascendoor_magazine_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'ascendoor-magazine' ),
			'section' => 'ascendoor_magazine_post_options',
		)
	)
);
