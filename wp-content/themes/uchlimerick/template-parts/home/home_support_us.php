<?php 
    $select_video_or_image = get_field('select_video_or_image');
    $support_us_desktop_image = get_field('support_us_desktop_image');
    $support_us_video = get_field('support_us_video'); 
    $support_us_mobile_image = get_field('support_us_mobile_image'); 
    $support_us_image = get_field('support_us_image'); 
?>

<section class="support-hero homepage">
    <?php 
        if( get_field('select_video_or_image') == 'image' ) {
            ?>
    <?php if($support_us_desktop_image != ""): ?>
        <img src="<?php echo $support_us_desktop_image['url']; ?>" class="d-none d-md-block img-100" alt="<?php echo $support_us_desktop_image['alt']; ?>">
    <?php endif; ?>
    <?php
        }
        if( get_field('select_video_or_image') == 'video' ) {   
            ?>
    <video loop muted autoplay class="d-none d-md-flex"> 
        <source src="<?php echo $support_us_video; ?>" type="video/mp4">
    </video>
    <?php
        }
    ?>
    <img src="<?php echo $support_us_mobile_image['url']; ?>" class="mobile-bgsupport" alt="">
    <div class="support-video-wrap"></div>
    <div class="support-hero-right">
        <img src="<?php echo $support_us_image['url']; ?>" alt="">
    </div>
    <div class="container-inner">
        <div class="banner-text">
            <h3 class="text-border-bottom"><?php echo _('Support Us'); ?></h3>
            <ul class="support-section-menu">
                <li><?php if(have_rows('banner_support_link')) { 
                    while(have_rows('banner_support_link')) { the_row(); 
                        $icon = get_sub_field('icon'); 
                        $support_link = get_sub_field('support_link'); 
                ?> 
                            <li><a href="<?php echo site_url('support-us'); ?>/#support<?php echo get_row_index();?>">
                                <?php if($icon != ""): ?><img src="<?php echo $icon['url']; ?>" class="support-icon" alt="<?php echo $icon['alt']; ?>"><?php endif; ?> <?php if($support_link != ""): ?><?php echo $support_link; ?><?php endif; ?> 
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                                class="support-rigth" alt="righ-icon"></a>
                            </li> 
                    <?php } 
                } ?> 
            </ul>
        </div>
    </div>
</section>