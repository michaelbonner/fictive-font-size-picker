<?php
/*
Plugin Name: Fictive Font Size Picker
Plugin URI: https://github.com/shekki25/fictive-font-size-picker
Description: Simple widget to control font size on page
Author: Fictive Web
Version: 1.0
Author URI: https://fictiveweb.com/
Text Domain: fictive-font-size-picker
License: GPLv3
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// constants for path and url of this plugin
define( 'FICTIVE_FONT_SIZE_PICKER_PATH', plugin_dir_path( __FILE__ ) );
define( 'FICTIVE_FONT_SIZE_PICKER_URL', plugin_dir_url( __FILE__ ) );


// add scripts and styles
function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'FSP', FICTIVE_FONT_SIZE_PICKER_URL . 'assets/css/fictive-font-size-picker.css' );

	wp_register_script( 'FSP', FICTIVE_FONT_SIZE_PICKER_URL . 'assets/js/fictive-font-size-picker.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'FSP', 'FSP_data', array( 'ajax_url' => admin_url('admin-ajax.php') ) );
	// wp_enqueue_script( 'FSP' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// load up php scripts
require_once 'widget-font-size-picker.php';
require_once 'classes/font-size-picker-ajax.php';

// add current font size to body tag on load
function fictive_add_body_class( $classes ){
	$current_font_size = isset( $_SESSION['fictive_font_size'] ) ? $_SESSION['fictive_font_size'] : 'font-regular';
	$classes[] = $current_font_size;
	return $classes;

}
add_filter( 'body_class', 'fictive_add_body_class' );
