<?php
get_header();
global $post;

$events = get_post_meta( $post->ID, 'events', TRUE );
$price_obj=$event_prices = array();
if ( $events ) {
    $event = isset( $events[0] ) ? $events[0] : [];
    if ( $event ) {
        $event_id      = $event['ID'];
        $transient_key = $event_id . '_' . $post->ID;
        if ( empty( get_transient( $transient_key ) ) ) {
            $import_property_url = 'https://uch.ticketsolve.com/shows/1173630311/events/' . $event_id . '.xml';
            $response            = wp_remote_get( $import_property_url );
            $body                = wp_remote_retrieve_body( $response );
            $xml                 = new SimpleXMLElement( $body, LIBXML_NOCDATA );
            $json                = json_encode( $xml );
            $eventObj            = json_decode( $json, TRUE );
            set_transient( $transient_key, $eventObj, HOUR_IN_SECONDS );
        }
    }
}

get_template_part( 'template-parts/single_show', 'banner_section' ); // hero section
get_template_part( 'template-parts/single_show', 'about_section' ); // About section
get_template_part( 'template-parts/single_show', 'video_section' ); //youtu video
get_template_part( 'template-parts/single_show', 'quote_section' ); //Quote component
get_template_part( 'template-parts/single_show', 'upcomming_show_book' ); //book now section
get_template_part( 'template-parts/single_show', 'you_might_like' ); //You might also like
get_template_part( 'template-parts/flex', 'newsletter_section' );
get_footer();
