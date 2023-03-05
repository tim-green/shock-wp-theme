<?php

/**
 * GroundCTRL Framework
 * https://developer.wordpress.org/themes/functionality/sidebars/
 */

if ( ! function_exists( 'grnd_sidebars' ) ) {

	function grnd_sidebars() {

		register_sidebar(
			array(
				'name'          => 'Footer Widget',
				'id'            => 'footer_widget',
				'before_widget' => '<div class="shock-footer-widget">',
				'after_widget'  => '</div>'
			)
		);

	}
}

add_action( 'widgets_init', 'grnd_sidebars' );
