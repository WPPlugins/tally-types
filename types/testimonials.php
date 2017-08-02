<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/
add_action( 'init', 'tallytypes_register_postType__testimonials' );
function tallytypes_register_postType__testimonials() {
	
	$labels = array(
		'name'               => 'Testimonial',
		'singular_name'      => 'Testimonial',
		'menu_name'          => 'Testimonials',
		'name_admin_bar'     => 'Testimonial',
		'add_new'            => 'Add New Testimonial',
		'add_new_item'       => 'Add New Testimonial',
		'new_item'           => 'New Testimonial',
		'edit_item'          => 'Edit Testimonial',
		'view_item'          => 'View Testimonial',
		'all_items'          => 'Testimonials',
		'search_items'       => 'Search Testimonials',
		'parent_item_colon'  => 'Parent Testimonials:',
		'not_found'          => 'No Testimonials found.',
		'not_found_in_trash' => 'No Testimonials found in Trash.',
	);

	$args = array(
		'labels'             => apply_filters('tallytypes_testimonials_labels', $labels),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 101,
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/testimonials-icon.svg',
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'tt_testimonial', $args );
	
	
	
	$labels = array(
		'name'              => 'Testimonials Category',
		'singular_name'     => 'Testimonials Category',
		'search_items'      => 'Search Testimonials',
		'all_items'         => 'All Testimonials Category',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Category Name',
		'menu_name'         => 'Testimonials Category',
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => apply_filters('tallytypes_testimonial_cat_labels', $labels),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => apply_filters('tallytypes_testimonial_cat_rewrite', 'tt-testimonial-cat') ),
	);

	register_taxonomy( 'tt_testimonial_cat', array( 'tt_testimonial' ), $args );
}



/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
$mb_fields[] = array(
	'id' => 'content_tt',
	'type' => 'textarea',
	'title' => 'Content',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'position_tt',
	'type' => 'text',
	'title' => 'Position',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'link_tt',
	'type' => 'text',
	'title' => 'Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'rating_tt',
	'type' => 'select',
	'title' => 'Rating',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => array(
		array('title' => '1', 'value' => '1'),
		array('title' => '2', 'value' => '2'),
		array('title' => '3', 'value' => '3'),
		array('title' => '4', 'value' => '4'),
		array('title' => '5', 'value' => '5'),
	),
	'sanitize' => 'wp_kses',
);
new tallytypes_metabox(array(
	'id' => 'tt_testimonial',
	'title' => 'Testimonial Settings',
	'post_type' => 'tt_testimonial',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));