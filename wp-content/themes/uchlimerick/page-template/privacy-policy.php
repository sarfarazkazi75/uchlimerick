<?php 
/*Template Name: Privacy Policy */
get_header();
$download_pdf = get_field('download_pdf');
$download_pdf_title = get_field('download_pdf_title');
?>

<section class="basic-page-text">
<div class="container-inner">
    <div class="privacy-basic-text">
        <?php the_content();?>
        <?php if( $download_pdf ): ?>
            <a href="<?php echo $download_pdf['url']; ?>" class="button button-dark" downloa="Privacy Policy"d><img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/File-download.png" alt=""><?php echo $download_pdf_title; ?></a>
        <?php endif; ?>
    </div>
</div>
</section>
<?php 
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
    get_footer();
?>