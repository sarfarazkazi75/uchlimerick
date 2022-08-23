<?php 
    $support_us_video = get_field('support_us_video'); 
    $support_us_mobile_image = get_field('support_us_mobile_image'); 
    $support_us_image = get_field('support_us_image'); 
?>

<section class="support-hero homepage">
    <video loop muted autoplay class="d-none d-md-flex"> 
        <source src="<?php echo $support_us_video; ?>" type="video/mp4">
    </video>
    <img src="<?php echo $support_us_mobile_image['url']; ?>" class="mobile-bgsupport" alt="">
    <div class="support-video-wrap"></div>
    <div class="support-hero-right">
        <img src="<?php echo $support_us_image['url']; ?>" alt="">
    </div>
    <div class="container-inner">
        <div class="banner-text">
            <h3 class="text-border-bottom">Support Us</h3>
            <ul class="support-section-menu">
                <li><?php if(have_rows('banner_support_link' , '19')) { 
                    while(have_rows('banner_support_link' , '19')) { the_row(); 
                        $icon = get_sub_field('icon' , '19'); 
                        $support_link = get_sub_field('support_link' , '19'); 
                ?> 
                            <li><a href="<?php echo $support_link['url']; ?>">
                                <img src="<?php echo $icon['url']; ?>"
                                class="support-icon" alt="righ-icon"> <?php echo $support_link['title']; ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                                class="support-rigth" alt="righ-icon"></a>
                            </li> 
                    <?php } 
                } ?> 
            </ul>
        </div>
    </div>
</section>