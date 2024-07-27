<?php
/**
 * Post Carousel Section
 *
 * @package Ascendoor_Magazine
 */

$wp_customize->add_section(
	'ascendoor_magazine_post_carousel_section',
	array(
		'panel' => 'ascendoor_magazine_front_page_options',
		'title' => esc_html__( 'Post Carousel Section', 'ascendoor-magazine' ),
	)
);

// Post Carousel Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_magazine_enable_post_carousel_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_magazine_enable_post_carousel_section',
		array(
			'label'    => esc_html__( 'Enable Post Carousel Section', 'ascendoor-magazine' ),
			'section'  => 'ascendoor_magazine_post_carousel_section',
			'settings' => 'ascendoor_magazine_enable_post_carousel_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_magazine_enable_post_carousel_section',
		array(
			'selector' => '#ascendoor_magazine_post_carousel_section .section-link',
			'settings' => 'ascendoor_magazine_enable_post_carousel_section',
		)
	);
}

// Post Carousel Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_magazine_post_carousel_title',
	array(
		'default'           => __( 'Post Carousel', 'ascendoor-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_carousel_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_post_carousel_section',
		'settings'        => 'ascendoor_magazine_post_carousel_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_magazine_is_post_carousel_section_enabled',
	)
);

// Post Carousel Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_magazine_post_carousel_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_carousel_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_post_carousel_section',
		'settings'        => 'ascendoor_magazine_post_carousel_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_magazine_is_post_carousel_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-magazine' ),
			'post' => esc_html__( 'Post', 'ascendoor-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Post Carousel Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_magazine_post_carousel_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_post_carousel_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_post_carousel_section',
			'settings'        => 'ascendoor_magazine_post_carousel_content_post_' . $i,
			'active_callback' => 'ascendoor_magazine_is_post_carousel_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_post_choices(),
		)
	);

	// Post Carousel Section - Select Page.
	$wp_customize->add_setting(
		'ascendoor_magazine_post_carousel_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_magazine_post_carousel_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-magazine' ), $i ),
			'section'         => 'ascendoor_magazine_post_carousel_section',
			'settings'        => 'ascendoor_magazine_post_carousel_content_page_' . $i,
			'active_callback' => 'ascendoor_magazine_is_post_carousel_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_magazine_get_page_choices(),
		)
	);

}

// Post Carousel Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_magazine_post_carousel_button_label',
	array(
		'default'           => __( 'View All', 'ascendoor-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_carousel_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_post_carousel_section',
		'settings'        => 'ascendoor_magazine_post_carousel_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_magazine_is_post_carousel_section_enabled',
	)
);

// Post Carousel Section - Button Link.
$wp_customize->add_setting(
	'ascendoor_magazine_post_carousel_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_magazine_post_carousel_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ascendoor-magazine' ),
		'section'         => 'ascendoor_magazine_post_carousel_section',
		'settings'        => 'ascendoor_magazine_post_carousel_button_link',
		'type'            => 'url',
		'active_callback' => 'ascendoor_magazine_is_post_carousel_section_enabled',
	)
);
