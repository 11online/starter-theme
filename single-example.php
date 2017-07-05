<?php

/*
 * This is a custom post type example single. To change it to use your custom post type, just rename to single-[your custom post type slug].php
 */

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_header', 'eo_add_featured_image', 5 );
function eo_add_featured_image() {
	global $post;
	if ( $image = genesis_get_image( 'format=url&size=full' ) ) {
		printf( '<img src="%s" alt="%s" class="aligncenter" />', $image, the_title_attribute( 'echo=0' ) );
	}
}

genesis();