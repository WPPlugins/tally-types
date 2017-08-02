<?php
/**
 * @package Tally Types
 *
/*
Plugin Name: Tally Types
Plugin URI: http://tallythemes.com/
Description: Provide Custom Post Types and Metaboxes
Version: 3.1
Author: TallyThemes
Author URI: http://tallythemes.com/
License: GPLv2 or later
Text Domain: tally-types
Prefix: tallytypes_
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA..
*/

// Make sure we don't expose any info if called directly

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'TALLYTYPES_URL', plugin_dir_url( __FILE__ ) );
define( 'TALLYTYPES_DRI', plugin_dir_path( __FILE__ ) );

define( 'TALLYTYPES_OPTION_NAME', apply_filters('tallytypes_option_name', 'tallytypes_option') );

function tallytypes_options_std($name){
	if($name == 'carousel'){
		return apply_filters('tallytypes_enable_carousel', false);
	}elseif($name == 'services'){
		return apply_filters('tallytypes_enable_services', false);
	}elseif($name == 'testimonials'){
		return apply_filters('tallytypes_enable_testimonials', false);
	}elseif($name == 'vcard'){
		return apply_filters('tallytypes_enable_vcard', false);
	}elseif($name == 'grid'){
		return apply_filters('tallytypes_enable_grid', false);
	}elseif($name == 'slider'){
		return apply_filters('tallytypes_enable_slider', false);
	}elseif($name == 'gallery'){
		return apply_filters('tallytypes_enable_gallery', false);
	}else{
		return false;
	}
}

include('includes/metabox-helper.php');
include('includes/script-loader.php');
include('includes/settings-page.php');

$tallytypes_std_data = array(
	'carousel' => tallytypes_options_std('carousel'),
	'services' => tallytypes_options_std('services'),
	'testimonials' => tallytypes_options_std('testimonials'),
	'vcard' => tallytypes_options_std('vcard'),
	'grid' => tallytypes_options_std('grid'),
	'slider' => tallytypes_options_std('slider'),
	'gallery' => tallytypes_options_std('gallery'),
);

$tallytypes_options = get_option( TALLYTYPES_OPTION_NAME, $tallytypes_std_data );

if($tallytypes_options['carousel'] == true){
	include('types/carousel.php');
}
if($tallytypes_options['services'] == true){
	include('types/services.php');
}
if($tallytypes_options['testimonials'] == true){
	include('types/testimonials.php');
}
if($tallytypes_options['vcard'] == true){
	include('types/vcard.php');
}
if($tallytypes_options['grid'] == true){
	include('types/grid.php');
}
if($tallytypes_options['slider'] == true){
	include('types/slider.php');
}
if($tallytypes_options['gallery'] == true){
	include('types/gallery.php');
}