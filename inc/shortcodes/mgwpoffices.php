<?php

/**
 * This shortcode gets all the offices and load them into
 * a Google Map with the specific offices markers.
 *
 * @return string
 */
function fn_mgwpoffices() {

	$output = "";

	$args = array(
		'post_type'         => 'office',
		'post_status'       => 'publish',
		'posts_per_page'    =>  -1
	);

	$query = new WP_Query( $args );


	if( $query->have_posts() ):
		$output .= '<div class="acf-map">';
		while( $query->have_posts() ): $query->the_post();

			$location = get_field('mgwpoff_address');

			$output .= sprintf( '<div class="marker" data-lat="%s" data-lng="%s">', $location['lat'], $location['lng'] );
			$output .= "<h3>" . get_the_title() . "</h3>";
			$output .= get_the_content();
			$output .= "<p><b>" . __("Dirección", MGWPOFF_DOMAIN) . " </b>: " . $location['address'] . "<br>";
			if( get_field('mgwpoff_telephone') )
				$output .= "<b>" . __("Teléfono", MGWPOFF_DOMAIN ) .  "</b>: " . get_field('mgwpoff_telephone') . "</br>";
			if( get_field('mgwpoff_fax') )
				$output .= "<b>Fax</b>: " . get_field('mgwpoff_fax') . "</br>";
			$output .= '</p></div>';

		endwhile;
		$output .= '</div>';
		wp_reset_postdata();

	endif;

	return $output;

}
add_shortcode( 'mgwpoffices', 'fn_mgwpoffices' );





/**
 * This shortcode gets and sets a list with all the offices.
 *
 * @return string
 */
function fn_mgwpoffices_list() {

	$output = "";

	$args = array(
		'post_type'     => 'office',
		'post_status'   => 'publish',
		'posts_per_page'    =>  -1
	);

	$query = new WP_Query( $args );


	if( $query->have_posts() ):
		$output .= '<ul class="mgwpoff__list">';
		while( $query->have_posts() ): $query->the_post();

			$location = get_field('mgwpoff_address');

			$output .= '<li class="mgwpoff__list__item">';
			$output .= '<h4 class="mgwpoff__list__h">' . get_the_title() . '</h4>';
			$output .= "<div class='mgwpoff__list__b'>" . get_the_content() . "</div>";
			$output .= "<p><b>Dirección</b>: " . $location['address'] . "<br>";
			if( get_field('mgwpoff_telephone') )
				$output .= "<b>Teléfono</b>: " . get_field('mgwpoff_telephone') . "</br>";
			if( get_field('mgwpoff_fax') )
				$output .= "<b>Fax</b>: " . get_field('mgwpoff_fax') . "</br>";
			$output .= '</p>';
			$output .= '</li>';

		endwhile;
		$output .= '</ul>';
		wp_reset_postdata();

	endif;

	return $output;

}
add_shortcode( 'mgwpoffices-list', 'fn_mgwpoffices_list' );