<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/

add_action( 'init', 'tallytypes_register_postType__gallery' );
function tallytypes_register_postType__gallery() {
	
	$labels = array(
		'name'               => 'Gallery',
		'singular_name'      => 'Gallery',
		'menu_name'          => 'Galleries',
		'name_admin_bar'     => 'Gallery',
		'add_new'            => 'Add New Gallery',
		'add_new_item'       => 'Add New Gallery',
		'new_item'           => 'New Gallery',
		'edit_item'          => 'Edit Gallery',
		'view_item'          => 'View Gallery',
		'all_items'          => 'Galleries',
		'search_items'       => 'Search Galleries',
		'parent_item_colon'  => 'Parent Galleries:',
		'not_found'          => 'No Galleries found.',
		'not_found_in_trash' => 'No Galleries found in Trash.',
	);

	$args = array(
		'labels'             => apply_filters('tallytypes_gallery_labels', $labels),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 101 ,
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/gallery-icon.svg',
		'supports'           => array( 'title')
	);

	register_post_type( 'tt_gallery', $args );
}


/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
$mb_fields[] = array(
	'id' => 'gallery_items_tt',
	'type' => 'group',
	'title' => 'Gallery Items',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => '',
	'items' => array(
		array(
			'id' => 'image',
			'type' => 'image_upload',
			'title' => 'Image',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'esc_url',
		),
		array(
			'id' => 'thumb_size',
			'type' => 'image_size_select',
			'title' => 'Thumb Size',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'esc_attr',
		),
		array(
			'id' => 'external_link',
			'type' => 'text',
			'title' => 'External Link',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'esc_url',
		),		
	),
);

$mb_fields[] = array(
	'id' => 'columns_tt',
	'type' => 'select',
	'title' => 'Columns',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'esc_attr',
	'choices' => array(
		array('title' => '1', 'value' => '1'),
		array('title' => '2', 'value' => '2'),
		array('title' => '3', 'value' => '3'),
		array('title' => '4', 'value' => '4'),
		array('title' => '5', 'value' => '5'),
		array('title' => '6', 'value' => '6'),
		array('title' => '7', 'value' => '7'),
		array('title' => '8', 'value' => '8'),
		array('title' => '9', 'value' => '9'),
	),
);
$mb_fields[] = array(
	'id' => 'column_margin_tt',
	'type' => 'select',
	'title' => 'Column Margin',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'esc_attr',
	'choices' => array(
		array('title' => '0 px', 'value' => '0'),
		array('title' => '1 px', 'value' => '1'),
		array('title' => '2 px', 'value' => '2'),
		array('title' => '3 px', 'value' => '3'),
		array('title' => '4 px', 'value' => '4'),
		array('title' => '5 px', 'value' => '5'),
		array('title' => '6 px', 'value' => '6'),
		array('title' => '7 px', 'value' => '7'),
		array('title' => '8 px', 'value' => '8'),
		array('title' => '9 px', 'value' => '9'),
		array('title' => '10 px', 'value' => '10'),
		array('title' => '15 px', 'value' => '15'),
		array('title' => '20 px', 'value' => '20'),
		array('title' => '25 px', 'value' => '25'),
		array('title' => '30 px', 'value' => '30'),
		array('title' => '35 px', 'value' => '35'),
		array('title' => '40 px', 'value' => '40'),
		array('title' => '45 px', 'value' => '45'),
		array('title' => '50 px', 'value' => '50'),
		array('title' => '55 px', 'value' => '55'),
		array('title' => '60 px', 'value' => '60'),
		array('title' => '65 px', 'value' => '65'),
		array('title' => '70 px', 'value' => '70'),
	),
);
$mb_fields[] = array(
	'id' => 'enable_masonry_tt',
	'type' => 'select',
	'title' => 'Enable Masonry',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'esc_attr',
	'choices' => array(
		array('title' => 'Yes', 'value' => 'yes'),
		array('title' => 'No', 'value' => 'no'),
	),
);
$mb_fields[] = array(
	'id' => 'thumb_size_tt',
	'type' => 'image_size_select',
	'title' => 'Thumb Size',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_attr',
);

new tallytypes_metabox(array(
	'id' => 'tt_gallery',
	'title' => 'Gallery',
	'post_type' => 'tt_gallery',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));