<?php

/*
 * Enqueue the stylesheets
 */
function mgwpoff_site_styles() {
	// Register the styles
	wp_register_style('mgwpoff-style', MGWPOFF_URL . '/assets/css/mgwpoff-style.css' , array(),false);


	// Enqueue the styles
	wp_enqueue_style('mgwpoff-style');
}
add_action( 'wp_enqueue_scripts', 'mgwpoff_site_styles' );

?>