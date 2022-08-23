<section class="hero-section">
    <?php $banner_details = get_field('banner_details'); ?>
    <div class="bg-video-wrap outside">
        <div class="clip-border">
            <video loop muted autoplay class="d-none d-md-flex"> 
                <source src="<?php echo $banner_details['banner_video']; ?>" type="video/mp4">
            </video>
            <img src="<?php echo $banner_details['banner_image']['url']; ?>" alt="image" class="d-md-none">
            <div class="overlay"></div>
            <div class="container-inner">
                <div class="banner-text" >
                    <h1 data-aos="fade-up"><?php echo $banner_details['banner_title']; ?></h1>
                    <span class="banner-border"></span>
                    <p data-aos="fade-up"><?php echo $banner_details['banner_subtitle']; ?></p>
                    <div class="btn-wrapper" data-aos="fade-up">
                          <a href="<?php echo $banner_details['book_ticket_link']['url']; ?>" class="button button-dark"><?php echo $banner_details['book_ticket_link']['title']; ?></a>
                          <a href="<?php echo $banner_details['support_us_link']['url']; ?>" class="button-light button"><?php echo $banner_details['support_us_link']['title']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $newsletter_main_title = get_field('newsletter_main_title', 'option');
        $newsletter_latest_show = get_field('newsletter_latest_show', 'option'); 
        $form_shortcode = get_field('form_shortcode', 'option'); 
        $form_footer = get_field('form_footer', 'option'); 
    ?>
    <div class="newsletter-popup newsletter" data-aos="fade-left" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
            <?php if($newsletter_main_title != ""): ?>
                <h4 class="text-border-bottom"><?php echo $newsletter_main_title; ?></h4>
            <?php endif; ?>
            <?php if($newsletter_latest_show != ""): ?>
                <h6><?php echo $newsletter_latest_show; ?></h6>
            <?php endif; ?>
            <?php if($form_shortcode != ""): ?>
                <?php echo do_shortcode( $form_shortcode ); ?>  
            <?php endif; ?>
            <?php if($form_footer != ""): ?>
                <p class="p-small"><?php echo $form_footer; ?></p>
            <?php endif; ?>
    </div>
</section>