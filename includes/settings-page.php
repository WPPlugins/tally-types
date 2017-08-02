<?php
/**
 * @package Tally Types
 *
 * Register settings page of the plugin
**/


/*	Regester Custom Admin Menu
--------------------------------------*/
add_action( 'admin_menu', 'tallytypes_register_admin_menu', 1 );
function tallytypes_register_admin_menu() {
	add_menu_page( 'Tally Types', 'Tally Types', 'manage_options', 'tally-types', 'tallytypes_settings_page_html', TALLYTYPES_URL.'assets/images/icon-light.png', 100 );
}


/*	Html of custom Menu
--------------------------------------*/
function tallytypes_settings_page_html() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
		echo '<h2>Tally Types</h2>';
		echo '<h3>Here you can enable or disable available Custom Post Type of <em><u>Tally Types</u></em>.</h3>';
		
		echo '<form action="options.php" method="post">';
			settings_fields( 'tallytypes' );
			do_settings_sections( 'tallytypes' );
			submit_button();
		echo '</form>';
		
	echo '</div>';
}


/*	Regester Settings API
--------------------------------------*/
add_action( 'admin_init', 'tallytypes_settings_api_init' );
function tallytypes_settings_api_init(  ) { 

	register_setting( 'tallytypes', TALLYTYPES_OPTION_NAME );

	add_settings_section('tallytypes_pluginPage_section', '', 'tallytypes_settings_section_callback', 'tallytypes');
	
	add_settings_field( 'carousel', 'Enabal Carousel', 'tallytypes_field_render_1', 'tallytypes', 'tallytypes_pluginPage_section' );
	add_settings_field( 'services', 'Enabal Services','tallytypes_field_render_2', 'tallytypes', 'tallytypes_pluginPage_section' );
	add_settings_field( 'testimonials', 'Enabal Testimonial', 'tallytypes_field_render_3', 'tallytypes', 'tallytypes_pluginPage_section');
	add_settings_field( 'vcard', 'Enabal vCard','tallytypes_field_render_4', 'tallytypes', 'tallytypes_pluginPage_section');
	add_settings_field( 'grid', 'Enabal Grid','tallytypes_field_render_5', 'tallytypes', 'tallytypes_pluginPage_section');
	add_settings_field( 'Slider', 'Enabal Slider','tallytypes_field_render_6', 'tallytypes', 'tallytypes_pluginPage_section');
	add_settings_field( 'Gallery', 'Enabal Gallery','tallytypes_field_render_7', 'tallytypes', 'tallytypes_pluginPage_section');
}



/*	Callback function of form field
--------------------------------------*/
function tallytypes_settings_section_callback(  ) { 
	echo '';
}


/*	Callback HTML fields for the Settings
--------------------------------------*/
function tallytypes_field_render_1(){ 
	$id = 'carousel';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('carousel');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_2(){ 
	$id = 'services';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('services');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_3(){ 
	$id = 'testimonials';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('testimonials');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_4(){ 
	$id = 'vcard';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('vcard');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_5(){ 
	$id = 'grid';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('grid');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_6(){ 
	$id = 'slider';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('slider');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}
function tallytypes_field_render_7(){ 
	$id = 'gallery';
	$options = get_option( TALLYTYPES_OPTION_NAME );
	$value = (isset($options[$id])) ? $options[$id] : tallytypes_options_std('gallery');
	$value = ($value == false) ? 0 : $value;
	echo '<select name="'.TALLYTYPES_OPTION_NAME.'['.$id.']">';
		echo '<option value="1" '.selected( $value, 1, false ).'>Yes</option>';
		echo '<option value="0" '.selected( $value, 0, false ).'>No</option>';
	echo '</select>';
}