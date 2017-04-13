<?php

add_action('genesis_after_header', 'add_blog_hero_area');
function add_blog_hero_area() {
			
    echo '<div class="blog-hero"><div class="wrap">';
    genesis_do_posts_page_heading();
    echo '</div></div>';
}
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	
add_filter( 'post_class', 'eo_grid_post_class' );
function eo_grid_post_class( $classes ) {
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
add_action( 'genesis_entry_header', 'eo_posts_grid', 5 );
function eo_posts_grid() {
	global $post;
	if ( $image = genesis_get_image( 'format=url&size=product' ) ) {
		printf( '<div class="grid-image"><a href="%s" rel="bookmark"><img src="%s" alt="%s" class="aligncenter" /></a></div>', get_permalink(), $image, the_title_attribute( 'echo=0' ) );
	}
	else {
		printf( '<div class="grid-image"><a href="%s" rel="bookmark"><img src="%s" alt="%s" class="aligncenter" /></a></div>', get_permalink(), get_bloginfo( 'stylesheet_directory' ) . '/images/blank.jpg', the_title_attribute( 'echo=0' ) );
	}
}
genesis();