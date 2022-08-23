<?php
    get_header();

    get_template_part( 'template-parts/single_project', 'banner-section' ); 
    get_template_part( 'template-parts/single_project', 'content' ); 
    get_template_part( 'template-parts/single_project', 'support-help-section' ); 
	get_template_part( 'template-parts/flex', 'newsletter_section' );
    
	get_footer();
