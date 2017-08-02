<?php
/**
 * @package Tally Types
 *
 * Load admin scripts for the plugin
**/

function tallytypes_load_admin_script() {
	wp_enqueue_style( 'tallytypes-admin', TALLYTYPES_URL . '/assets/css/tally-types-admin.css');
	wp_enqueue_style('wp-color-picker');
	
	wp_enqueue_script( 'tallytypes-admin', TALLYTYPES_URL.'/assets/js/tally-types-admin.js', array( 'wp-color-picker', 'jquery-ui-core', 'jquery-ui-sortable', "jquery-ui-tabs" ), false, true ); 
	
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'tallytypes_load_admin_script' );