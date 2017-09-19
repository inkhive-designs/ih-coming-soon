<?php
/*
Plugin Name: IH Cominng Soon
Plugin URI: http://inkhive.com
Description: A plugin to create coming soon banner for websites.
Version: 0.9
Author: Mr. Shiv Kumar(InkHive)
Author URI: http://inkhive.com
License: GPL3
*/

if(!defined('IH_coming_soon_URL')){
    define('IH_coming_soon_URL', plugin_dir_url(__FILE__) );
    define( 'IH_coming_soon_PATH', plugin_dir_path( __FILE__ ) );
}

//The Purpose of creating a class here, is also to help theme check if plugin is installed by
// calling a class_exists() functions.

function IH_coming_soon_banner( ) {
    if( get_theme_mod('ih_coming_soon_banner_image') !='' && !is_admin() && $GLOBALS['pagenow'] != 'wp-login.php' ):
        include IH_coming_soon_PATH.'/index.php';
        exit(0);
    endif;
}
add_action('init', 'IH_coming_soon_banner');


 function IH_coming_soon( $wp_customize ) {
    $wp_customize->add_section('ih_coming_soon_banner_section', array(
            'priority' => 55,
            'title' => __('Coming Soon Banner', 'ih-coming-soon-banner'),
        )
    );




     $wp_customize->add_setting('ih_coming_soon_banner_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_control(
            $wp_customize,
            'ih_coming_soon_banner_image',
            array(
                'section' => 'ih_coming_soon_banner_section',
                'setting' => 'ih_coming_soon_banner_image',
                'label' => __('Upload an image to display', 'ih-coming-soon-banner'),
            )
        )
    );

    $wp_customize->add_setting('ih_coming_soon_banner_text',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('ih_coming_soon_banner_text',
        array(
            'setting' => 'ih_coming_soon_banner_text',
            'section' => 'ih_coming_soon_banner_section',
            'label' => __('Greenting Text', 'ih-coming-soon-banner'),
            'description' => __('Enter your text to be displayed as greeting', 'ih-coming-soon-banner'),
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'IH_coming_soon');

 /* Sanitize Checkbox*/
function IHCS_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
