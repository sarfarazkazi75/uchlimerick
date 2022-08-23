<?php
if(class_exists('acf')){
$banner_img        = get_field('uchlimerick_blog_post_banner_image','option');
$mobile_banner_img = get_field('uchlimerick_blog_post_banner_mobile_image','option');
$banner_title      = get_field('uchlimerick_blog_post_banner_title','option');
} ?>
<section class="page-banner">
    <?php if(!empty($banner_img)){  echo wp_get_attachment_image($banner_img['ID'], 'full','',array('class'=>'d-none d-md-block img-100')); } ?>
    <?php if(!empty($mobile_banner_img)){  echo wp_get_attachment_image($mobile_banner_img['ID'], 'full','',array('class'=>'d-md-none img-100')); } ?>
    <?php if(!empty($banner_title)){ ?>
    <div class="page-banner-text">
        <div class="container-inner">
            <div class="page-border-bottom">
                <h2><?php echo $banner_title;?></h2>
            </div>
        </div>
    </div>
    <?php } ?>
</section>