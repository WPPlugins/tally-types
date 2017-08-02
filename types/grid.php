<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/

add_action( 'init', 'tallytypes_register_postType__grid' );
function tallytypes_register_postType__grid() {
	
	$labels = array(
		'name'               => 'Grid',
		'singular_name'      => 'Grid',
		'menu_name'          => 'Grids',
		'name_admin_bar'     => 'Grid',
		'add_new'            => 'Add New Grid',
		'add_new_item'       => 'Add New Grid',
		'new_item'           => 'New Grid',
		'edit_item'          => 'Edit Grid',
		'view_item'          => 'View Grid',
		'all_items'          => 'Grid',
		'search_items'       => 'Search Grid',
		'parent_item_colon'  => 'Parent Grid:',
		'not_found'          => 'No Grid found.',
		'not_found_in_trash' => 'No Grid found in Trash.',
	);

	$args = array(
		'labels'             => apply_filters('tallytypes_grid_labels', $labels),
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
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/grid-icon.svg',
		'supports'           => array( 'title')
	);

	register_post_type( 'tt_grid', $args );
}


/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
$mb_fields[] = array(
	'id' => 'grid_items_tt',
	'type' => 'group',
	'title' => 'Grid Items',
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
			'id' => 'fontawesome',
			'type' => 'text',
			'title' => 'FontAwesome',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'wp_kses',
		),
		array(
			'id' => 'link',
			'type' => 'text',
			'title' => 'Link',
			'des' => '',
			'class' => '',
			'value' => '',
			'choices' => '',
			'sanitize' => 'wp_kses',
		),
		array(
			'id' => 'more_text',
			'type' => 'text',
			'title' => 'More Text',
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


new tallytypes_metabox(array(
	'id' => 'tt_grid_content',
	'title' => 'Content',
	'post_type' => 'tt_grid',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));



$mb_fields = array();
$mb_fields[] = array(
	'id' => 'type_tt',
	'type' => 'select',
	'title' => 'Style Type',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
	'choices' => array(
		array('title' => 'Box 1', 'value' => 'box1'),
		array('title' => 'Info 1', 'value' => 'info1'),
	),
);
$mb_fields[] = array(
	'id' => 'columns_tt',
	'type' => 'select',
	'title' => 'Columns',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
	'choices' => array(
		array('title' => '1', 'value' => '1'),
		array('title' => '2', 'value' => '2'),
		array('title' => '3', 'value' => '3'),
		array('title' => '4', 'value' => '4'),
		array('title' => '5', 'value' => '5'),
		array('title' => '6', 'value' => '6'),
		array('title' => '7', 'value' => '7'),
		array('title' => '8', 'value' => '8'),
	),
);
$mb_fields[] = array(
	'id' => 'column_margin_tt',
	'type' => 'select',
	'title' => 'Column Margin',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
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
	),
);
$mb_fields[] = array(
	'id' => 'enable_masonry_tt',
	'type' => 'select',
	'title' => 'Enable Masonry',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
	'choices' => array(
		array('title' => 'Yes', 'value' => 'yes'),
		array('title' => 'No', 'value' => 'no'),
	),
);
$mb_fields[] = array(
	'id' => 'title_color_tt',
	'type' => 'color',
	'title' => 'Title Color',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'text_color_tt',
	'type' => 'color',
	'title' => 'Text Color',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'icon_color_tt',
	'type' => 'color',
	'title' => 'Icon Color',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'bg_color_tt',
	'type' => 'color',
	'title' => 'Background Color',
	'des' => '',
	'class' => '',
	'value' => '',
	'sanitize' => 'wp_kses',
);

new tallytypes_metabox(array(
	'id' => 'tt_grid',
	'title' => 'Settings',
	'post_type' => 'tt_grid',
	'context' => 'side',
	'priority' => 'default',
	'fields' => $mb_fields,
));