<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uchlimerick
 */

    get_header();

    get_template_part( 'template-parts/single_post', 'banner-section' ); 
    get_template_part( 'template-parts/single_post', 'content' ); 
    get_template_part( 'template-parts/single_post', 'support-help-section' ); 
	get_template_part( 'template-parts/flex', 'newsletter_section' );
    
	get_footer();
