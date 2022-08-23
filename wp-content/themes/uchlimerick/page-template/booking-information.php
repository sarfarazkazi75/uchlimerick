<?php /* Template Name: Booking Information */ 
    get_header();

    get_template_part( 'template-parts/bookinginformation/general_information' );

    get_template_part('template-parts/flex', 'helpful_resource');  
    get_template_part('template-parts/flex', 'highlights');  
    get_template_part('template-parts/flex', 'newsletter_section');
    
    get_footer();
?>