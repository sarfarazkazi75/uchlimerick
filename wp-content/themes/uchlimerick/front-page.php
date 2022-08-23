<?php
/* Template Name: Front Page  */
    get_header(); 

    get_template_part( 'template-parts/home/home_banner' );
    get_template_part('template-parts/flex', 'highlights'); 
    get_template_part( 'template-parts/home/home_whats_on' );
    get_template_part( 'template-parts/home/home_support_us' );
    get_template_part( 'template-parts/flex', 'venue_hire_section' );  
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
   
   get_footer(); 
?>