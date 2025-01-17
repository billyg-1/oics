<?php
add_filter( 'wpsl_templates', 'pallikoodam_wpsl_custom_templates' );
function pallikoodam_wpsl_custom_templates( $templates ) {

    $templates[] = array (
        'id'   => 'custom',
        'name' => esc_html__('Custom template', 'dt-elementor' ),
        'path' => PALLIKOODAM_THEME_DIR . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}

add_filter( 'wpsl_listing_template', 'pallikoodam_custom_listing_template' );
function pallikoodam_custom_listing_template() {

    global $wpsl_settings;

    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . wpsl_store_header_template( 'listing' ) . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    $listing_template .= "\t\t" . '</div>' . "\r\n";

    if ( !$wpsl_settings['hide_distance'] ) {
        $listing_template .= "\t\t" . '<p><span><%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] ) . '</span></p>' . "\r\n";
    }

	$appointment_pageurl = pallikoodam_get_page_permalink_by_its_template('tpl-reservation.php');
	if($appointment_pageurl != '' && $appointment_pageurl != '#' && class_exists( 'DTElementorCore' )) {
		$listing_template .= "\t\t\t" . '<a href="'.$appointment_pageurl.'?storeid=<%= id %>" target="_blank" class="dt-appointment-fix dt-sc-button filled medium">' . esc_html__( 'Fix an Appointment', 'dt-elementor' ) . '</a>' . "\r\n";
	}

    $listing_template .= "\t\t" . '<%= createDirectionUrl() %>' . "\r\n"; 

    $listing_template .= "\t" . '</li>' . "\r\n"; 

    return $listing_template;
	
}

add_filter( 'wpsl_thumb_size', 'pallikoodam_wpsl_custom_thumb_size' );
function pallikoodam_wpsl_custom_thumb_size() {    
    $size = array( 90, 90 );
    return $size;	
}