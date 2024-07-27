<?php

/**
 * Active Callbacks
 *
 * @package Ascendoor_Magazine
 */

// Theme Options.
function ascendoor_magazine_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_magazine_enable_pagination' )->value() );
}
function ascendoor_magazine_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_magazine_enable_breadcrumb' )->value() );
}

// Header Options.
function ascendoor_magazine_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'ascendoor_magazine_enable_topbar' )->value() );
}

// Flash News Section.
function ascendoor_magazine_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_magazine_enable_flash_news_section' )->value() );
}
function ascendoor_magazine_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_flash_news_content_type' )->value();
	return ( ascendoor_magazine_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_magazine_is_flash_news_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_flash_news_content_type' )->value();
	return ( ascendoor_magazine_is_flash_news_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Banner Slider Section.
function ascendoor_magazine_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_magazine_enable_banner_section' )->value() );
}
function ascendoor_magazine_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_banner_slider_content_type' )->value();
	return ( ascendoor_magazine_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_magazine_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_banner_slider_content_type' )->value();
	return ( ascendoor_magazine_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function ascendoor_magazine_is_banner_grid_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_banner_grid_content_type' )->value();
	return ( ascendoor_magazine_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_magazine_is_banner_grid_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_banner_grid_content_type' )->value();
	return ( ascendoor_magazine_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Post Carousel Section.
function ascendoor_magazine_is_post_carousel_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_magazine_enable_post_carousel_section' )->value() );
}
function ascendoor_magazine_is_post_carousel_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_post_carousel_content_type' )->value();
	return ( ascendoor_magazine_is_post_carousel_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_magazine_is_post_carousel_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_magazine_post_carousel_content_type' )->value();
	return ( ascendoor_magazine_is_post_carousel_section_enabled( $control ) && ( 'page' === $content_type ) );
}
