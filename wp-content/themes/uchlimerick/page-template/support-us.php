<?php /*Template Name: support-us */ 
    get_header(); 

    get_template_part( 'template-parts/supportus/support_us_banner' );
    get_template_part('template-parts/supportus/support_us_image_content'); 
    get_template_part( 'template-parts/supportus/support_us_supporters_logo' );
    get_template_part( 'template-parts/supportus/support_us_support help' );
    get_template_part('template-parts/flex', 'newsletter_section'); 
    
    get_footer(); 
?>