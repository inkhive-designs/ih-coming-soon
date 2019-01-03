<?php
/*
Plugin Name: IH Cominng Soon
Plugin URI: http://inkhive.com
Description: A ihcs_plugin to create coming soon banner for websites.
Version: 0.9
Author: Shiv Kumar(InkHive)
Author URI: http://inkhive.com
License: GPL3
*/

if(!defined('IH_coming_soon_URL')){
    define('IH_coming_soon_URL', plugin_dir_url(__FILE__) );
    define( 'IH_coming_soon_PATH', plugin_dir_path( __FILE__ ) );
}

//enqueue js
function ihcs_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'ihcs-js', IH_coming_soon_URL . 'ihcs.js' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'jquery-datepicker-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', array(), null );
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style( 'ihcs-admin_css', IH_coming_soon_URL . 'ihcs_admin.css' );
    wp_enqueue_style( 'ihcs-style', IH_coming_soon_URL . 'style.css' );

}
add_action( 'admin_enqueue_scripts','ihcs_admin_scripts' );

//Front End Styles & Scripts
function ihcs_scripts() {
    wp_enqueue_style( 'ihcs-style', IH_coming_soon_URL . 'style.css'  );
    wp_enqueue_style( 'ihcs-bootstrap-style', IH_coming_soon_URL . 'bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'ihcs-bootstrap-js', IH_coming_soon_URL  . 'bootstrap/js/bootstrap.min.js' );
    wp_enqueue_script( 'ihcs-custom-js', IH_coming_soon_URL  . 'ihcs-custom.js' );
}
add_action( 'wp_enqueue_scripts', 'ihcs_scripts' );

function ihcs_custom_css_mods() {

    $custom_css = "";

    if ( get_option('banner_id') == '0' ) :
        $custom_css .= ".banner img { display: none }";
        $custom_css .= ".count-area { color: white; text-shadow: 1px 2px 3px #a7a7a7; }";
        $custom_css .= "@media screen and (max-width: 768px) { .banner { min-height: 250px; } .count-area { top: 25% !important; } }";
        $custom_css .= "@media screen and (min-width: 768px) { 
                            .banner { 
                                min-height: 500px; 
                            }
                            .count-area {
                                font-size: 80px !important;
                                top: 25% !important;
                            }
                            .count-area h1 {
                                font-size: 72px;
                            }      
                        }";
    endif;

    wp_add_inline_style( 'ihcs-style', strip_tags($custom_css) );

}
add_action('wp_enqueue_scripts', 'ihcs_custom_css_mods');

//The Purpose of creating a class here, is also to help theme check if plugin is installed by
// calling a class_exists() functions.

function IH_coming_soon_banner( ) {
    if( get_option('enable_disable') == 1 && !is_admin() && $GLOBALS['pagenow'] != 'wp-login.php' ):
        include IH_coming_soon_PATH.'/index.php';
        exit(0);
    endif;

}
add_action('init', 'IH_coming_soon_banner');

function adjust_plugin_menu() {
// add in your custom menu item
    add_options_page (
        'IH Coming Soon',   //Page title
        'IH Coming Soon',   //menu title
        'manage_options', //capability
        'ihcs-plugin-s',
        'ihcs_front'    //callback function
    );
}
add_action('admin_menu', 'adjust_plugin_menu');

function ihcs_front() {
    $destination = IH_coming_soon_PATH.'/ihcs_options.php';
    require $destination;
}

function ihcs_localize_js() {
    // Localize the script with new data
    $translation_array = array(
        'ihcs_cdate' => get_option('ihcs_input_coundown'),
    );
    wp_localize_script('ihcs-custom-js', 'ihcs_countdown_date', $translation_array );
}
add_action('wp_enqueue_scripts', 'ihcs_localize_js');