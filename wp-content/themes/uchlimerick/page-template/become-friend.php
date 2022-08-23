<?php /*Template Name: become-friend  */
    get_header();

    get_template_part( 'template-parts/becomeafriend/become_friend' );
    get_template_part( 'template-parts/single_show', 'quote_section' ); //Quote component
    get_template_part( 'template-parts/becomeafriend/become_an_official' );
    get_template_part( 'template-parts/becomeafriend/become_a_corporate_friend' );
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
   
    get_footer(); 
?>