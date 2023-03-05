<?php
/**
 * GroundCTRL Framework 
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */

if ( ! function_exists( 'grnd_setup_theme' ) ) {

	function grnd_setup_theme() {

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('editor-styles');
		add_editor_style('assets/build/app.min.css' );
		add_editor_style('gutenberg/fixes.css' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'Primary', 'themeLangDomain' ),
				'slug' => 'primary',
				'color' => '#FFE700',
			),
			array(
				'name' => __( 'Secondary', 'themeLangDomain' ),
				'slug' => 'secondary',
				'color' => '#B5003A',
			),
			array(
				'name' => __( 'Black', 'themeLangDomain' ),
				'slug' => 'black',
				'color' => "#000000",
			),
			array(
				'name' => __( 'White', 'themeLangDomain' ),
				'slug' => 'white',
				'color' => "#ffffff",
			),
		));

		// Enable RSS feeds
		add_theme_support( 'automatic-feed-links' );

		// Enable HTML5 markup
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		// Enable title meta tag to <head>
		add_theme_support( 'title-tag' );

		// Enable Widgets refresh from Customizer
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Define custom image sizes
		require_once get_template_directory() . '/inc/imagesizes.php';

		// Set max content width (embedded)
		if ( ! isset( $content_width ) ) {
			$content_width = 1400;}

		// Load translations
		load_theme_textdomain( 'groundctrl', get_template_directory() . '/languages' );

		// Add excerpt to pages
		// add_post_type_support( 'page', 'excerpt' );
	}
}

add_action( 'after_setup_theme', 'grnd_setup_theme' );
