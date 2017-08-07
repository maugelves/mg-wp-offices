<?php


function fn_mgwpoffices() {

	$output = "";

	$args = array(
		'post_type'     => 'office',
		'post_status'   => 'publish'
	);

	$query = new WP_Query( $args );


if( $query->have_posts() ):
	$output .= '<div class="acf-map">';
	while( $query->have_posts() ): $query->the_post();

		$location = get_field('mgwpoff_address');

		$output .= sprintf( '<div class="marker" data-lat="%s" data-lng="%s">', $location['lat'], $location['lng'] );
		$output .= "<h3>" . get_the_title() . "</h3>";
		$output .= "<p>" . get_the_content() . "</p>";
		$output .= "<p><b>Dirección</b>: " . $location['address'] . "<br>";
		if( get_field('mgwpoff_telephone') )
			$output .= "<b>Teléfono</b>: " . get_field('mgwpoff_telephone') . "</br>";
		if( get_field('mgwpoff_fax') )
			$output .= "<b>Fax</b>: " . get_field('mgwpoff_fax') . "</br>";
		$output .= '</p></div>';

	endwhile;
	$output .= '</div>';

endif;

return $output;

}
add_shortcode( 'mgwpoffices', 'fn_mgwpoffices' );