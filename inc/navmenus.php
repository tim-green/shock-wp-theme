<?php

/**
 * GroundCTRL Framework
 * https://developer.wordpress.org/themes/functionality/navigation-menus/
 */

if ( ! function_exists( 'grnd_navmenus' ) ) {

	function grnd_navmenus() {

		register_nav_menus(
			array(
				'header' => esc_html__( 'Header Menu', 'groundctrl' ),
				'footer' => esc_html__( 'Footer Menu', 'groundctrl' ),
			)
		);

	}
}

add_action( 'after_setup_theme', 'grnd_navmenus' );
