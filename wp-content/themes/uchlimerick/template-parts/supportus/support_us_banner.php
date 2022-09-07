<?php
	$banner_image = get_field('banner_image');
    $banner_video = get_field('banner_video');
    $hero_image = get_field('hero_image'); 
?>
<section class="support-hero">
    <!-- <img src="" alt="" class="d-none d-md-block img-100"> -->
    <img src="<?php echo $banner_image['url']; ?>" class="mobile-bgsupport" alt="">
    <div class="support-video-wrap">
        <video loop="" muted="" autoplay="" class="d-none d-md-flex">
            <source src="<?php echo $banner_video; ?>" type="video/mp4">
        </video>
    </div>
    <div class="support-hero-right">
        <img src="<?php echo $hero_image['url']; ?>" alt="">
    </div>
    <div class="container-inner">
        <div class="banner-text">
            <h1 class="text-border-bottom"><?php echo get_the_title(); ?></h1>
            <ul class="support-section-menu">
                <li><?php if(have_rows('banner_support_link')) { 
                    while(have_rows('banner_support_link')) { the_row(); 
                        $icon = get_sub_field('icon'); 
                        $support_link = get_sub_field('support_link'); 
                ?>
                <li><a href="#support<?php echo get_row_index();?>">
                        <?php if($icon != ""): ?><img src="<?php echo $icon['url']; ?>" class="support-icon"
                            alt="righ-icon"><?php endif; ?>
                        <?php echo $support_link; ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                            class="support-rigth" alt="righ-icon"></a>
                </li>
                <?php } 
                } ?>
            </ul>
        </div>
    </div>
</section>