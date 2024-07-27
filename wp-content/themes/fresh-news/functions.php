<?php
/**
 * Fresh News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fresh_News
 */

if ( ! function_exists( 'fresh_news_setup' ) ) :
	function fresh_news_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'fresh-news', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'fresh_news_setup' );

if ( ! function_exists( 'fresh_news_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function fresh_news_enqueue_styles() {
		$parenthandle = 'ascendoor-magazine-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'ascendoor-magazine-slick-style',
				'ascendoor-magazine-fontawesome-style',
				'ascendoor-magazine-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'fresh-news-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'fresh_news_enqueue_styles' );

// Widgets.
require get_theme_file_path() . '/inc/widgets/widgets.php';
