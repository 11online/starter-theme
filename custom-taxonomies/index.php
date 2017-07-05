<?php

// Register Custom Taxonomies
function custom_taxonomies() {

	/**
	 * Custom Taxonomy Array
	 * To add more custom taxonomies, just add more to the custom taxonomy array
	 * Post Type: Array of post types that the taxonomy should be connected to
	 */

	$custom_taxonomies = [
		[
			'slug' 			=> 'example-taxonomy', 
			'single'	 	=> 'Example Taxonomy', 
			'plural' 		=> 'Example Taxonomies',
			'post-types'	=> ['example']
		]
	];

	foreach($custom_taxonomies as $custom_taxonomy) {

		// Register Custom Taxonomy
		$labels = array(
			'name'                       => _x( $custom_taxonomy['plural'], 'Taxonomy General Name', 'Theme Name' ),
			'singular_name'              => _x( $custom_taxonomy['single'], 'Taxonomy Singular Name', 'Theme Name' ),
			'menu_name'                  => __( $custom_taxonomy['plural'], 'Theme Name' ),
			'all_items'                  => __( 'All ' . $custom_taxonomy['plural'], 'Theme Name' ),
			'parent_item'                => __( 'Parent ' . $custom_taxonomy['single'], 'Theme Name' ),
			'parent_item_colon'          => __( 'Parent ' . $custom_taxonomy['single']. ':', 'Theme Name' ),
			'new_item_name'              => __( 'New ' . $custom_taxonomy['single']. ' Name', 'Theme Name' ),
			'add_new_item'               => __( 'Add New ' . $custom_taxonomy['single'], 'Theme Name' ),
			'edit_item'                  => __( 'Edit ' . $custom_taxonomy['single'], 'Theme Name' ),
			'update_item'                => __( 'Update ' . $custom_taxonomy['single'], 'Theme Name' ),
			'view_item'                  => __( 'View ' . $custom_taxonomy['single'], 'Theme Name' ),
			'separate_items_with_commas' => __( 'Separate ' . $custom_taxonomy['plural'] . ' with commas', 'Theme Name' ),
			'add_or_remove_items'        => __( 'Add or remove ' . $custom_taxonomy['single'], 'Theme Name' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'Theme Name' ),
			'popular_items'              => __( 'Popular ' . $custom_taxonomy['plural'], 'Theme Name' ),
			'search_items'               => __( 'Search ' . $custom_taxonomy['plural'], 'Theme Name' ),
			'not_found'                  => __( 'Not Found', 'Theme Name' ),
			'no_terms'                   => __( 'No ' . $custom_taxonomy['plural'], 'Theme Name' ),
			'items_list'                 => __( $custom_taxonomy['plural'] . ' list', 'Theme Name' ),
			'items_list_navigation'      => __( $custom_taxonomy['plural'] . ' list navigation', 'Theme Name' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( $custom_taxonomy['slug'], $custom_taxonomy['post-types'], $args );
	}

}

//* Don't want any taxonomies? Just comment out this next line
add_action( 'init', 'custom_taxonomies', 0 );

?>

