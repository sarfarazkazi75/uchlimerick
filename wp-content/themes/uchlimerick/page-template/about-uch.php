<?php /*Template Name: About Uch */
   get_header();
    
    if( have_rows('about_us_data') ):
        while(have_rows('about_us_data')): the_row();
           get_template_part('template-parts/flex', get_row_layout());
        endwhile;
      endif;
  
    get_template_part( 'template-parts/flex', 'venue_hire_section' ); 
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
    get_footer();
    
?>
