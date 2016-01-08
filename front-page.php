<?php
/**
 * This file adds the Home Page to the Owner Direct Theme.
 *
 */

add_action( 'genesis_meta', 'starter_theme_home_genesis_meta' );
function starter_theme_home_genesis_meta(){

}

//* Remove the default Genesis loop (don't do the posts)
remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_after_header', 'add_home_page_widgets');
function add_home_page_widgets() {
  genesis_widget_area( 'home-widget-1', array(
		'before' => '<div class="home-widget-1 widget-area">',
		'after'  => '</div>',
  ) );
  genesis_widget_area( 'home-widget-2', array(
		'before' => '<div class="home-widget-2 widget-area">',
		'after'  => '</div>',
  ) );
  genesis_widget_area( 'home-widget-3', array(
		'before' => '<div class="home-widget-3 widget-area">',
		'after'  => '</div>',
  ) );
}

genesis();
?>
