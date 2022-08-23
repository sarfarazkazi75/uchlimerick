<?php
    $banner_image = get_field('banner_image');
    $banner_title = get_field('banner_title');
    $banner_video = get_field('banner_video');
    $banner_right_image = get_field('banner_right_image');
    $get_here_title = get_field('get_here_title');
    $parking_your_car_title = get_field('parking_your_car_title');
    $food_and_drink = get_field('food_and_drink');
    $spend_the_night = get_field('spend_the_night');
?>
<section class="support-hero">
    <img src="<?php echo $banner_image['url']; ?>"
        class="mobile-bgsupport" alt="" class="d-md-none">

    <div class="support-video-wrap">
        <video loop="" muted="" autoplay="" class="d-none d-md-flex">
            <source src="<?php echo $banner_video ;?>" type="video/mp4"> 
        </video>
    </div>
    <div class="support-hero-right">
        <img src="<?php echo $banner_right_image['url']; ?>" alt="">
    </div>
    <div class="container-inner">
        <div class="banner-text">
            <h4 class="text-border-bottom"><?php echo $banner_title; ?></h4>
            <ul class="support-section-menu">
                <li><a href="#support1"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/Locationon.svg"
                            class="support-icon" alt="righ-icon"> <?php echo $get_here_title; ?><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                            class="support-rigth" alt="righ-icon"></a></li>
                <li><a href="#support2"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/Directionscar.svg"
                            class="support-icon" alt="righ-icon"> <?php echo $parking_your_car_title; ?><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                            class="support-rigth" alt="righ-icon"></a></li>
                <li><a href="#support3"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/Tapas.svg"
                            class="support-icon" alt="righ-icon"> <?php echo $food_and_drink['food_and_drink_title'] ; ?><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                            class="support-rigth" alt="righ-icon"></a></li>
                <li><a href="#support4"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/Hotel.svg"
                            class="support-icon" alt="righ-icon"><?php echo $spend_the_night['spend_the_night_title'] ; ?><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/right-chevrow-white.svg"
                            class="support-rigth" alt="righ-icon"></a></li>
            </ul>
        </div>
    </div>
</section>