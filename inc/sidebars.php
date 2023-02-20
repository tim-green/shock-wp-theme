<?php

/**
 * GroundCTRL Framework
 * https://developer.wordpress.org/themes/functionality/sidebars/
 */

if ( ! function_exists( 'grnd_sidebars' ) ) {

	function grnd_sidebars() {

		register_sidebar(
			array(
				'name' => esc_html__( 'Main Sidebar', 'groundctrl' ),
				'id' => 'sidebar-main',
				'description' => esc_html__( 'Main Sidebar', 'groundctrl' ),
				'before_widget' => '<div class="widget mb-4 %2$s clearfix">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="mb-4">',
				'after_title' => '</h3>',
			)
		);

	}
}

add_action( 'widgets_init', 'grnd_sidebars' );
