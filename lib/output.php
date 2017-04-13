<?php
/*
 * Adds the required CSS to the front end.
 */

add_action( 'wp_enqueue_scripts', 'customizer_css' );
/**
* Checks the settings for the images and background colors for each image
* If any of these value are set the appropriate CSS is output
*
* @since 1.0
*/
function customizer_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$css = '';

  	$css .= '.home-widget-1 { background: url(' . get_option( 'home-widget-1-image', null) . ')}';

  	$css .= '.home-widget-4 { background: url(' . get_option( 'home-widget-4-image', null) . ')}';

  	$css .= '.blog-hero { background: url(' . get_option( 'blog-hero-image', null) . ')}';

	if( $css ){
		wp_add_inline_style( $handle, $css );
	}

}
