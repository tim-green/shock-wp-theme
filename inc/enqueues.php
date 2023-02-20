<?php

/**
 * GroundCTRL Framework 
 * https://developer.wordpress.org/themes/basics/including-css-javascript/
 */

if ( ! function_exists( 'grnd_styles_scripts' ) ) {

	function grnd_styles_scripts() {

		$theme_version = wp_get_theme()->get( 'Version' );

		// CSS
		wp_enqueue_style( 'grnd-styles', get_template_directory_uri() . '/assets/build/app.min.css', false, $theme_version, 'all' );

		// JS
		//jQuery from JSdelivr CDN
		wp_enqueue_script( 'jquery', '//cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js', false, $theme_version, true );

		//FontAwesome - Free Version
		wp_enqueue_script( 'font-awesome', '//kit.fontawesome.com/f8466e44e0.js', false, $theme_version, true );

		//Bootstrap from JSdelivr CDN
		wp_enqueue_script( 'bootstrap',  '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', false, $theme_version, true );

		wp_enqueue_script( 'grnd-scripts', get_template_directory_uri() . '/assets/build/app.min.js', false, $theme_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' ); }

	}
}

add_action( 'wp_enqueue_scripts', 'grnd_styles_scripts' );

// Disable this action if not loading Google Fonts from their external server
// function grnd_google_fonts_preconnect() {
// 	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
// 	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
// }
// add_action( 'wp_head', 'grnd_google_fonts_preconnect', 7 );
