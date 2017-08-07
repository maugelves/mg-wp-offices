<?php
/*
 * Register the JS scripts
 */
function mgwpoff_scripts() {

	wp_enqueue_script('jquery');

	// REGISTER
	wp_register_script('mgwpoff_gmapsapikey', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBRSSFQzl1Rp676GDg1VeOAgkMYHajuj7M' , array('jquery'),'',true);
	wp_register_script('mgwpoff_offices', MGWPOFF_URL . '/assets/js/offices.js', array('jquery', 'mgwpoff_gmapsapikey'), false, true);

	// ENQUQUE
	wp_enqueue_script('mgwpoff_gmapsapikey');
	wp_enqueue_script('mgwpoff_offices');

}
add_action( 'wp_enqueue_scripts', 'mgwpoff_scripts' );

?>