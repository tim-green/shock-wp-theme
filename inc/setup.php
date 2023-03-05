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

// The Breadcrumbs
function the_breadcrumb($args = array()){
	$args = wp_parse_args( $args, array(
		"text-color" => "text-spred",
		"opacity" => "opacity-100"
	));

	$showOnHome = 0; // 1 = show breadcrumbs, 0 = don't show
	$delimiter = '<i data-feather="arrow-right" class="inline h-4 w4"></i>';
	$home = get_bloginfo("name"); //text for home link
	$showCurrent = 1; // 1= show current post/page title in breadcrumbs, 0 = don't show
	$before = '<span class="current">'; //tag before current
	$after = '</span>';

	global $post;
	$homeLInk = get_bloginfo('url');
	if (is_home() || is_front_page()){
		if($showOnHome == 1){
			echo(
				<<<EOD
				<div id='crumbs' class='shock-breadcrumbs {$args["text-color"]} {$args["opacity"]} text-sm'><a href='{$homeLink}'>{$home}</a></div> 
				EOD);
		}
	}
		else{
			echo(
				<<<EOD
				<div id='crumbs' class='shock-breadcrumbs {$args["text-color"]} {$args["opacity"]} text-sm'><a href='{$homeLink}'>{$home}</a> {$delimiter}
				EOD);

				if (is_category()) {
					$thisCat = get_category(get_query_var('cat'), false);
					if ($thisCat->parent != 0) {
						echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
					}
					echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
				} elseif (is_search()) {
					echo $before . 'Search results for "' . get_search_query() . '"' . $after;
				} elseif (is_day()) {
					echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
					echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
					echo $before . get_the_time('d') . $after;
				} elseif (is_month()) {
					echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
					echo $before . get_the_time('F') . $after;
				} elseif (is_year()) {
					echo $before . get_the_time('Y') . $after;
				} elseif (is_single() && !is_attachment()) {
					if (get_post_type() != 'post') {
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						echo(
							<<<EOD
							<a href="{$homeLink}/{$slug['slug']}/">{$post_type->labels->singular_name}</a>
							EOD);
						if ($showCurrent == 1) {
							echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
						}
					} else {
						$cat = get_the_category();
						$cat = $cat[0];
						$cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
						if ($showCurrent == 0) {
							$cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
						}
						echo $cats;
						if ($showCurrent == 1) {
							echo $before . get_the_title() . $after;
						}
					}
				} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
					$post_type = get_post_type_object(get_post_type());
					echo $before . $post_type->labels->singular_name . $after;
				} elseif (is_attachment()) {
					$parent = get_post($post->post_parent);
					$cat = get_the_category($parent->ID);
					$cat = $cat[0];
					echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
					echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
					if ($showCurrent == 1) {
						echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
					}
				} elseif (is_page() && !$post->post_parent) {
					if ($showCurrent == 1) {
						echo $before . get_the_title() . $after;
					}
				} elseif (is_page() && $post->post_parent) {
					$parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						$permalink = get_permalink($page->ID);
						$title = get_the_title($page->ID);
						$breadcrumbs[] = <<<EOD
						<a href="{$permalink}">{$title}</a>
						EOD;
						$parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						echo $breadcrumbs[$i];
						if ($i != count($breadcrumbs)-1) {
							echo ' ' . $delimiter . ' ';
						}
					}
					if ($showCurrent == 1) {
						echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
					}
				} elseif (is_tag()) {
					echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
				} elseif (is_author()) {
					global $author;
					$userdata = get_userdata($author);
					echo $before . 'Articles posted by ' . $userdata->display_name . $after;
				} elseif (is_404()) {
					echo $before . 'Error 404' . $after;
				}
				if (get_query_var('paged')) {
					if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
						echo ' (';
					}
					echo __('Page') . ' ' . get_query_var('paged');
					if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
						echo ')';
					}
				}
				echo '</div>';
		}
}
