<?php
/* Template Name: Corporate Member */
    get_header();

    get_template_part( 'template-parts/corporatemember/corporate_member_image' );
    get_template_part( 'template-parts/single_show', 'quote_section' ); //Quote component
    get_template_part( 'template-parts/corporatemember/become_an_official' );
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
    
    get_footer();
?>