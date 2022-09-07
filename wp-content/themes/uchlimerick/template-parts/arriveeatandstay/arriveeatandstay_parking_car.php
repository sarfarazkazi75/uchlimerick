<?php
    $parking_your_car_title = get_field('parking_your_car_title');
    $parking_your_car_content = get_field('parking_your_car_content');
    $parking_your_car_image = get_field('parking_your_car_image');
?>
<section class="img-with-text" id="support2">
    <div class="container-inner">
        <div class="row align-items-center">
            <div class="col-md-6 mb-md-0 mb-4 col-left">
                <div class="section-header">
                    <h2 class="text-border-bottom pb-md-1 pb-3 title color-black"><?php echo $parking_your_car_title; ?></h2>
                </div>
                <?php echo $parking_your_car_content; ?>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $parking_your_car_image['url']; ?>" alt="">
            </div>
        </div>
    </div>
</section>