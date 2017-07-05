<?php

// Register Custom Post Types
function custom_post_types() {

	/**
	 * Custom Post Type Array
	 * Taxonomies: array of taxonomies (category build in, to register more, see custom-taxonomies/index.php), 
	 * Icons: icon (from https://developer.wordpress.org/resource/dashicons/)
	 * To add more custom post types, just add more to the custom post type array
	 */

	$custom_post_types = [
		[
			'slug' 			=> 'example', 
			'single'	 	=> 'Example', 
			'plural' 		=> 'Examples', 
			'description' 	=> 'Example Post Type', 
			'menu_icon' 	=> 'dashicons-lightbulb'
		]
	];

	foreach($custom_post_types as $custom_post_type) {

		$labels = array(
			'name'                  => _x( $custom_post_type['plural'], 'Post Type General Name', 'Theme Name' ),
			'singular_name'         => _x( $custom_post_type['single'], 'Post Type Singular Name', 'Theme Name' ),
			'menu_name'             => __( $custom_post_type['plural'], 'Theme Name' ),
			'name_admin_bar'        => __( $custom_post_type['single'], 'Theme Name' ),
			'archives'              => __( $custom_post_type['single']. ' Archives', 'Theme Name' ),
			'attributes'            => __( $custom_post_type['single'] . ' Attributes', 'Theme Name' ),
			'parent_item_colon'     => __( 'Parent ' . $custom_post_type['single'] . ':', 'Theme Name' ),
			'all_items'             => __( 'All ' . $custom_post_type['plural'], 'Theme Name' ),
			'add_new_item'          => __( 'Add New ' . $custom_post_type['single'], 'Theme Name' ),
			'add_new'               => __( 'Add New', 'Theme Name' ),
			'new_item'              => __( 'New ' . $custom_post_type['single'], 'Theme Name' ),
			'edit_item'             => __( 'Edit ' . $custom_post_type['single'], 'Theme Name' ),
			'update_item'           => __( 'Update ' . $custom_post_type['single'], 'Theme Name' ),
			'view_item'             => __( 'View ' . $custom_post_type['single'], 'Theme Name' ),
			'view_items'            => __( 'View ' . $custom_post_type['single'], 'Theme Name' ),
			'search_items'          => __( 'Search ' . $custom_post_type['single'], 'Theme Name' ),
			'not_found'             => __( 'Not found', 'Theme Name' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'Theme Name' ),
			'featured_image'        => __( 'Featured Image', 'Theme Name' ),
			'set_featured_image'    => __( 'Set featured image', 'Theme Name' ),
			'remove_featured_image' => __( 'Remove featured image', 'Theme Name' ),
			'use_featured_image'    => __( 'Use as featured image', 'Theme Name' ),
			'insert_into_item'      => __( 'Insert into ' . $custom_post_type['single'], 'Theme Name' ),
			'uploaded_to_this_item' => __( 'Uploaded to this ' . $custom_post_type['single'], 'Theme Name' ),
			'items_list'            => __( $custom_post_type['plural'] . ' list', 'Theme Name' ),
			'items_list_navigation' => __( $custom_post_type['plural']. ' list navigation', 'Theme Name' ),
			'filter_items_list'     => __( 'Filter ' . $custom_post_type['plural']. ' list', 'Theme Name' ),
		);
		$args = array(
			'label'                 => __( $custom_post_type['single'], 'Theme Name' ),
			'description'           => __( $custom_post_type['description'], 'Theme Name' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
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

//* Don't want any custom post types? Just comment out this next line
add_action( 'init', 'custom_post_types', 0 );

?>

