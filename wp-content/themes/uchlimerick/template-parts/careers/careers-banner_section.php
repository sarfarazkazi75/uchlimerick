<?php
if (class_exists('acf')) {
    $career_banner_title         = get_field('uchlimerick_post_career_banner_title', 'option');
    $career_banner_image_desktop = get_field('uchlimerick_post_career_banner_image_desktop', 'option');
    $career_banner_image_mobile  = get_field('uchlimerick_post_career_banner_image_mobile', 'option');
    $apply_for_this_job_email    = get_field('uchlimerick_career_apply_for_this_job_email', 'option');
    $apply_for_this_job_email    =!empty($apply_for_this_job_email) ? $apply_for_this_job_email : 'careers.email@uch.ie';
} ?>

<!-- banner  -->
<section class="page-banner">
    <?php if(!empty($career_banner_image_desktop)){ echo wp_get_attachment_image($career_banner_image_desktop, 'full','',array('class'=>'d-none d-md-block img-100')); }?>
    <?php if(!empty($career_banner_image_mobile)){ echo wp_get_attachment_image($career_banner_image_mobile, 'full','',array('class'=>'d-md-none img-100')); } ?>
    <div class="page-banner-text">
        <div class="container-inner">
             <?php if(!empty($career_banner_title)){ ?>
                <div class="page-border-bottom">
                    <h2><?php echo $career_banner_title;?></h2>
                </div>
             <?php } ?>
        </div>
    </div>
</section>