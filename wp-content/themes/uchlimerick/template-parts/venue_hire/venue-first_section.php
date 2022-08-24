<?php
$event_title   = get_field('event_title'); 
$event_content = get_field('event_content');  
$event_file    = get_field('event_file');   
$event_user_image = get_field('event_user_image');
?>
<section class="two-colum-section pt-100 pb-100" id="support1">
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-6">
                <div class="two-col-left-col colpe-left">
                    <h4 class="text-border-bottom"><?php echo $event_title; ?></h4>
                    <?php echo $event_content;?>
                    <?php if($event_file != ""): ?>
                    <a href="<?php echo $event_file['url']; ?>"  class="button button-dark text-center fw-medium" download="Technical Specs"><img src="<?php echo get_template_directory_uri(''); ?>/assets/images/download.svg" class="mr-3"><?php echo $event_file['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="two-col-right-img">
                    <img src="<?php echo $event_user_image['url'];?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>