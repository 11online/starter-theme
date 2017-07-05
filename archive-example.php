<?php

/*
 * This is a custom post type example archive. To change it to use your custom post type, just rename to archive-[your custom post type slug].php
 */

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_filter( 'post_class', 'eo_grid_custom_post_class' );
function eo_grid_custom_post_class( $classes ) {
	global $wp_query;
	if ( ! $wp_query->is_main_query() ) {
		return $classes;
	}
	$term         = $wp_query->get_queried_object();
	$layout       = genesis_site_layout( $term );
	$number       = 2;
	$column_class = 'one-half';
	$classes[] = 'grid ' . $column_class;
	if ( 0 == $wp_query->current_post % $number ) {
		$classes[] = 'first';
	}
	return $classes;
}

add_action( 'genesis_entry_header', 'eo_custom_posts_grid', 5 );
function eo_custom_posts_grid() {
	global $post;
	if ( $image = genesis_get_image( 'format=url&size=medium' ) ) {
		printf( '<div class="grid-image"><a href="%s" rel="bookmark"><img src="%s" alt="%s" class="aligncenter" /></a></div>', get_permalink(), $image, the_title_attribute( 'echo=0' ) );
	}
}

genesis();