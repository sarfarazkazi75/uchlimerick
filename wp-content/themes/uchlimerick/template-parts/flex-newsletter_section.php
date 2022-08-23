<?php
    $newsletter_image = get_field('newsletter_image', 'option');  
    $newsletter_main_title = get_field('newsletter_main_title', 'option');  
    $newsletter_subtitle = get_field('newsletter_subtitle', 'option');  
    $newsletter_latest_show = get_field('newsletter_latest_show', 'option');  
    $form_shortcode = get_field('form_shortcode', 'option');  
    $form_footer = get_field('form_footer', 'option');  
?>
<section class="newsletter">
    <div class="row g-md-0">
        <div class="col-md-6 p-md-0">
            <div class="newsletter-left img-100-wrapper">
                <?php if($newsletter_image != ""): ?>
                    <img src="<?php echo $newsletter_image['url']; ?>" alt="image" title="image" class="img-100"> 
                <?php endif; ?>
            </div>
        </div> 
        <div class="col-md-6 p-md-0">
            <div class="newsletter-right">
            <div class="newsletter-text-wrapper">
                <?php if($newsletter_main_title != ""): ?><h4 class="text-border-bottom"><?php echo $newsletter_main_title; ?></h4><?php endif; ?>
                <?php if($newsletter_subtitle != ""): ?>
                    <p><?php echo $newsletter_subtitle; ?></p>
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
            </div>
        </div>
    </div>
</section>