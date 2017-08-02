<?php
/**
 * @package Tally Types
 *
 * Register custom Post Type
**/

add_action( 'init', 'tallytypes_register_postType__vcard' );
function tallytypes_register_postType__vcard() {
	
	$labels = array(
		'name'               => 'vCard',
		'singular_name'      => 'vCard',
		'menu_name'          => 'vCards',
		'name_admin_bar'     => 'vCards',
		'add_new'            => 'Add New vCard',
		'add_new_item'       => 'Add New vCard',
		'new_item'           => 'New vCard',
		'edit_item'          => 'Edit vCard',
		'view_item'          => 'View vCard',
		'all_items'          => 'vCards',
		'search_items'       => 'Search vCards',
		'parent_item_colon'  => 'Parent vCards:',
		'not_found'          => 'No vCards found.',
		'not_found_in_trash' => 'No vCards found in Trash.',
	);
	$args = array(
		'labels'             => apply_filters('tallytypes_vcard_labels', $labels),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => apply_filters('tallytypes_vcard_rewrite', 'tt-service') ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 101,
		'menu_icon'			 => TALLYTYPES_URL.'assets/images/vcard-icon.svg',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'tt_vcard', $args );
	
	
	$labels = array(
		'name'              => 'vCard Category',
		'singular_name'     => 'vCard Category',
		'search_items'      => 'Search Category',
		'all_items'         => 'All vCard Category',
		'parent_item'       => 'Parent vCard',
		'parent_item_colon' => 'Parent vCard:',
		'edit_item'         => 'Edit vCard',
		'update_item'       => 'Update vCard',
		'add_new_item'      => 'Add New vCard',
		'new_item_name'     => 'New vCard Name',
		'menu_name'         => 'vCard Category',
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => apply_filters('tallytypes_vcard_cat_labels', $labels),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => apply_filters('tallytypes_vcard_cat_rewrite', 'tt-vcard-cat') ),
	);

	register_taxonomy( 'tt_vcard_cat', array( 'tt_vcard' ), $args );
}



/*	Register Metabox
--------------------------------------*/
$mb_fields = array();
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
	'id' => 'email_tt',
	'type' => 'text',
	'title' => 'Email',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'phone_tt',
	'type' => 'text',
	'title' => 'Phone',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'address_tt',
	'type' => 'text',
	'title' => 'Address',
	'des' => '',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'wp_kses',
);
$mb_fields[] = array(
	'id' => 'website_link_tt',
	'type' => 'text',
	'title' => 'Website Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_url',
);
$mb_fields[] = array(
	'id' => 'facebook_link_tt',
	'type' => 'text',
	'title' => 'Facebook Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_url',
);
$mb_fields[] = array(
	'id' => 'twitter_link_tt',
	'type' => 'text',
	'title' => 'Twitter Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_url',
);
$mb_fields[] = array(
	'id' => 'linkedin_link_tt',
	'type' => 'text',
	'title' => 'Linkedin Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_url',
);
$mb_fields[] = array(
	'id' => 'instagram_link_tt',
	'type' => 'text',
	'title' => 'Instagram Link',
	'des' => 'Please enter the full URL including <code>http://</code>',
	'class' => '',
	'value' => '',
	'choices' => '',
	'sanitize' => 'esc_url',
);
new tallytypes_metabox(array(
	'id' => 'tt_vcard',
	'title' => 'vCard Settings',
	'post_type' => 'tt_vcard',
	'context' => 'normal',
	'priority' => 'default',
	'fields' => $mb_fields,
));