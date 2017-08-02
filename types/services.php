<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/

add_action( 'init', 'tallytypes_register_postType__service' );
function tallytypes_register_postType__service() {
	
	$labels = array(
		'name'               => 'Service',
		'singular_name'      => 'Service',
		'menu_name'          => 'Services',
		'name_admin_bar'     => 'Service',
		'add_new'            => 'Add New Service',
		'add_new_item'       => 'Add New Service',
		'new_item'           => 'New Service',
		'edit_item'          => 'Edit Service',
		'view_item'          => 'View Service',
		'all_items'          => 'Services',
		'search_items'       => 'Search Services',
		'parent_item_colon'  => 'Parent Services:',
		'not_found'          => 'No Services found.',
		'not_found_in_trash' => 'No Services found in Trash.',
	);
	$args = array(
		'labels'             => apply_filters('tallytypes_service_labels', $labels),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => apply_filters('tallytypes_service_rewrite', 'tt-service') ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 101,
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/services-icon.svg',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'tt_service', $args );
	
	
	$labels = array(
		'name'              => 'Services Category',
		'singular_name'     => 'Services Category',
		'search_items'      => 'Search Category',
		'all_items'         => 'All Services Category',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Category Name',
		'menu_name'         => 'Services Category',
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => apply_filters('tallytypes_service_cat_labels', $labels),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => apply_filters('tallytypes_service_cat_rewrite', 'tt-service-cat') ),
	);

	register_taxonomy( 'tt_service_cat', array( 'tt_service' ), $args );
}



/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
$mb_fields[] = array(
	'id' => 'subtitle_tt',
	'type' => 'text',
	'title' => 'Subtitle',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'caption_tt',
	'type' => 'textarea',
	'title' => 'Caption',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'additional_image_tt',
	'type' => 'image_upload',
	'title' => 'Additional Image',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'icon_font_tt',
	'type' => 'text',
	'title' => 'FontAwesome Icon',
	'des' => 'Font Awesome Icon class example <code>fa-facebook</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'more_text_tt',
	'type' => 'text',
	'title' => 'More Text',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'extranal_linl_tt',
	'type' => 'text',
	'title' => 'Extranal Link',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
new tallytypes_metabox(array(
	'id' => 'tt_service',
	'title' => 'Service Settings',
	'post_type' => 'tt_service',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));