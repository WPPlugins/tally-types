<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/

add_action( 'init', 'tallytypes_register_postType__carousel' );
function tallytypes_register_postType__carousel() {
	
	$labels = array(
		'name'               => 'Carousel',
		'singular_name'      => 'Carousel',
		'menu_name'          => 'Carousels',
		'name_admin_bar'     => 'Carousel',
		'add_new'            => 'Add New Carousel',
		'add_new_item'       => 'Add New Carousel',
		'new_item'           => 'New Carousel',
		'edit_item'          => 'Edit Carousel',
		'view_item'          => 'View Carousel',
		'all_items'          => 'Carousels',
		'search_items'       => 'Search Carousels',
		'parent_item_colon'  => 'Parent Carousels:',
		'not_found'          => 'No Carousels found.',
		'not_found_in_trash' => 'No Carousels found in Trash.',
	);

	$args = array(
		'labels'             => apply_filters('tallytypes_carousel_labels', $labels),
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
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/carousel-icon.svg',
		'supports'           => array( 'title')
	);

	register_post_type( 'tt_carousel', $args );
}


/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
$mb_fields[] = array(
	'id' => 'carousel_items_tt',
	'type' => 'group',
	'title' => 'Carousel Items',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
	'items' => array(
		array(
			'id' => 'image',
			'type' => 'image_upload',
			'title' => 'Image',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'wp_kses',
		),
		array(
			'id' => 'content',
			'type' => 'textarea',
			'title' => 'Content',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'wp_kses',
		),
		array(
			'id' => 'class',
			'type' => 'text',
			'title' => 'Class',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'wp_kses',
		),
	),
);
$mb_fields[] = array(
	'id' => 'dot_nav_tt',
	'type' => 'select',
	'title' => 'Enable Dot Nav',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => array(
		array('title' => 'Yes', 'value' => 'yes'),
		array('title' => 'No', 'value' => 'no'),
	),
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'arrow_nav_tt',
	'type' => 'select',
	'title' => 'Enable Arrow Nav',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => array(
		array('title' => 'Yes', 'value' => 'yes'),
		array('title' => 'No', 'value' => 'no'),
	),
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'items_tt',
	'type' => 'text',
	'title' => 'Content Items',
	'des' => 'How many column of content you want to show?',
	'class' => '',
	'value' => '4',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'items_desktop_tt',
	'type' => 'text',
	'title' => 'Content Items Desktop',
	'des' => 'How many column of content you want to show between 1000px and 901px?',
	'class' => '',
	'value' => '3',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'items_desktop_small_tt',
	'type' => 'text',
	'title' => 'Content Items DesktopSmall',
	'des' => 'How many column of content you want to show betweem 900px and 601px?',
	'class' => '',
	'value' => '2',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'items_mobile_tt',
	'type' => 'text',
	'title' => 'Content Items Mobile',
	'des' => 'How many column of content you want to show between 600 and 0?',
	'class' => '',
	'value' => '1',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
new tallytypes_metabox(array(
	'id' => 'tt_carousel',
	'title' => 'Settings',
	'post_type' => 'tt_carousel',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));