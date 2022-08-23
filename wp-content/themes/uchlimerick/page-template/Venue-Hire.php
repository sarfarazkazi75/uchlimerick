<?php
/* Template Name: Venue Hire */
get_header();
get_template_part( 'template-parts/venue_hire/venue', 'first_section' );
get_template_part( 'template-parts/venue_hire/venue', 'venue_box' );
get_template_part( 'template-parts/venue_hire/venue', 'event_section' );
get_template_part( 'template-parts/single_show', 'quote_section' ); //Quote component
get_template_part( 'template-parts/flex', 'newsletter_section' );
get_footer();
?>