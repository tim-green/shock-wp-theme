<?php

/**
 * GroundCTRL Framework
 * Integration with Advanced Custom Fields
 */

// https://www.advancedcustomfields.com/resources/options-page/

// if ( function_exists( 'acf_add_options_page' ) ) {

// 	acf_add_options_page();

// }

function grnd_acf(){
    define( 'MY_ACF_PATH', get_stylesheet_directory() . '/lib/acf/' );
    define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/lib/acf/' );
    include_once( MY_ACF_PATH . 'acf.php' );
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    add_filter('acf/settings/save_json', 'set_acf_json_save_folder');
    function set_acf_json_save_folder( $path ) {
        $path = MY_ACF_PATH . '/acf-json';
        return $path;
    }
    add_filter('acf/settings/load_json', 'add_acf_json_load_folder');
    function add_acf_json_load_folder( $paths ) {
        unset($paths[0]);
        $paths[] = MY_ACF_PATH . '/acf-json';;
        return $paths;
    }

    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    function my_acf_settings_show_admin( $show_admin ) {
        return false;
    }
}

grnd_acf();

add_filter('render_block', 'grnd_wrap_blocks', 10, 2);

function grnd_wrap_blocks($block_content, $block){

    $skip =[
        "core/column"
    ];

    if (strpos($block["blockName"], "core/" !==
        false && in_array($block["blockName"], $skip)
        )){
            if(is_front_page()){
                $block_content = "<div class='fp-container mx-auto' data-block-name='{$block["blockName"]}'>". $block_content ."</div>";
            } else{
                $block_content = "<div class='sm-container mx-auto' data-block-name='{$block["blockName"]}'>". $block_content . "</div>";
            }
        }

        return $block_content;
}

add_action('acf/init', 'grnd_blocktypes');

function grnd_blocktypes(){
    //check if the function exists
    if( function_exists('acf_register_block_type')){
        acf_register_block_type(array(
            'name'              => 'hero',
            'title'             => __('Frontpage Hero'),
            'description'       => __('Hero to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/hero.php',
            'category'          => 'shock',
            'icon'              => '',
            'keywords'          => array( 'hero', 'frontpage' ),
            "supports"          => array(
                "anchor" => true
            )
        ));

        acf_register_block_type(array(
            'name'              => 'events',
            'title'             => __('Frontpage Event'),
            'description'       => __('Event list to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/events.php',
            'category'          => 'shock',
            'icon'              => '',
            'keywords'          => array( 'events', 'frontpage' ),
        ));

        acf_register_block_type(array(
            'name'              => 'projects',
            'title'             => __('Frontpage Project'),
            'description'       => __('List of Projects to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/projects.php',
            'category'          => 'shock',
            'icon'              => '',
            'keywords'          => array( 'projects', 'frontpage' ),
        ));

    }
}
