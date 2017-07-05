<?php

// Register Custom Post Types
function custom_post_types() {

	/**
	 * Custom Post Type Array
	 * Taxonomies: array of taxonomies (category build in, to register more, see here: https://generatewp.com/taxonomy/, 
	 * Icons: icon (from https://developer.wordpress.org/resource/dashicons/)
	 * To add more custom post types, just add more to the custom post type array
	 */

	$custom_post_types = [
		[
			'slug' 			=> 'example', 
			'single'	 	=> 'Example', 
			'plural' 		=> 'Examples', 
			'description' 	=> 'Example Post Type', 
			'taxonomies' 	=> ['category'], 
			'menu_icon' 	=> 'dashicons-lightbulb'
		]
	];

	foreach($custom_post_types as $custom_post_type) {

		$labels = array(
			'name'                  => _x( $custom_post_type['plural'], 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( $custom_post_type['single'], 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( $custom_post_type['plural'], 'text_domain' ),
			'name_admin_bar'        => __( $custom_post_type['single'], 'text_domain' ),
			'archives'              => __( $custom_post_type['single']. ' Archives', 'text_domain' ),
			'attributes'            => __( $custom_post_type['single'] . ' Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent ' . $custom_post_type['single'] . ':', 'text_domain' ),
			'all_items'             => __( 'All ' . $custom_post_type['plural'], 'text_domain' ),
			'add_new_item'          => __( 'Add New ' . $custom_post_type['single'], 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New ' . $custom_post_type['single'], 'text_domain' ),
			'edit_item'             => __( 'Edit ' . $custom_post_type['single'], 'text_domain' ),
			'update_item'           => __( 'Update ' . $custom_post_type['single'], 'text_domain' ),
			'view_item'             => __( 'View ' . $custom_post_type['single'], 'text_domain' ),
			'view_items'            => __( 'View ' . $custom_post_type['single'], 'text_domain' ),
			'search_items'          => __( 'Search ' . $custom_post_type['single'], 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into ' . $custom_post_type['single'], 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this ' . $custom_post_type['single'], 'text_domain' ),
			'items_list'            => __( $custom_post_type['plural'] . ' list', 'text_domain' ),
			'items_list_navigation' => __( $custom_post_type['plural']. ' list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter ' . $custom_post_type['plural']. ' list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( $custom_post_type['single'], 'text_domain' ),
			'description'           => __( $custom_post_type['description'], 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
			'taxonomies'            => $custom_post_type['taxonomies'],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> $custom_post_type['menu_icon'],
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( $custom_post_type['slug'], $args );
	}
	

}

add_action( 'init', 'custom_post_types', 0 );

?>

