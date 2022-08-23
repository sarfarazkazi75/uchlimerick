<section class="information-col-two" data-aos="fade-up">
    <div class="container-inner">
        <div class="row">
            <?php if(have_rows('accessibility_information')) { 
                while(have_rows('accessibility_information')) { the_row();    
                    $accessibility_image = get_sub_field('accessibility_image');  
                    $accessibility_title = get_sub_field('accessibility_title');  
                   // $accessibility_content = get_sub_field('accessibility_content');
                    $accessibility_content = get_sub_field('accessibility_content');
                    $show_accessibility_link = get_sub_field('show_accessibility_link');  
                    $accessibility_link = get_sub_field('accessibility_link');  
                ?>
            <div class="information">
                <div class="col-md-6">
                    <div class="information-block">
                        <img src="<?php echo $accessibility_image['url']; ?>" alt="">

                        <div class="text-border-bottom">
                            <h5><?php echo $accessibility_title; ?></h5>
                        </div>
                        <div class="paragaraph-medium">
                            <?php echo $accessibility_content; ?>
                        </div>

                        <?php if($accessibility_link != ""): ?><a href="<?php echo $accessibility_link['url']; ?>"
                            target="<?php echo $accessibility_link['target']; ?>"
                            class="bg-transparent button"><?php echo $accessibility_link['title']; ?></a><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } 
            }
            ?>
        </div>
    </div>
</section>

<section class="information information-top" data-aos="fade-up">
    <div class="container-inner">
        <div class="information-block image-left">
            <div class="row ">
                <div class="col-md-6">
                    <div class="text-border-bottom">
                        <h5>Wheelchair Users and Impaired Mobility</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/wheelchair-user.png"
                        alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="information-col-two information" data-aos="fade-up">
    <div class="container-inner">
        <div class="row">
            <div class="col-md-6">
                <div class="information-block">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/access-parking.png"
                        alt="">
                    <div class="text-border-bottom">
                        <h5>Access & Parking</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has
                            minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam
                            minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>
                    <a href="#" class="bg-transparent button">How to Get Here</a>
                </div>
            </div>
        </div>
</section>
<section class="information-col-two information" data-aos="fade-up">
    <div class="container-inner">
        <div class="col-md-6">
            <div class="information-block">
                <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/seat-loction.png"
                    alt="">
                <div class="text-border-bottom">
                    <h5>Seat Location</h5>
                </div>
                <div class="paragaraph-medium">
                    <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At
                        nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has minim
                        elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum
                        ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                </div>
                <a href="#" class="bg-transparent button">Contact Us</a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- img text full section  -->
<section class="information" data-aos="fade-up">
    <div class="container-inner">
        <div class="information-block">
            <div class="row ">
                <div class="col-md-6">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/wheelchair-user.png"
                        alt="">
                </div>
                <div class="col-md-6">
                    <div class="text-border-bottom">
                        <h5>Booking Tickets</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has
                            minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam
                            minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- img text col section  -->
<section class="information-col-two information" data-aos="fade-up">
    <div class="container-inner">
        <div class="row">
            <div class="col-md-6">
                <div class="information-block">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/hearingf.png"
                        alt="">
                    <div class="text-border-bottom">
                        <h5>Hard of Hearing</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has
                            minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam
                            minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="information-block">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/seat-loction.png"
                        alt="">
                    <div class="text-border-bottom">
                        <h5>Seat Location</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has
                            minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam
                            minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="information" data-aos="fade-up">
    <div class="container-inner">
        <div class="information-block">
            <div class="row ">
                <div class="col-md-6">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/friendly-performance.png"
                        alt="">
                </div>
                <div class="col-md-6">
                    <div class="text-border-bottom">
                        <h5>Sensory Friendy Performances</h5>
                    </div>
                    <div class="paragaraph-medium">
                        <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.
                            At nam minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum. Et has
                            minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam
                            minimum ponderum. Est audiam animal molestiae te. Ex duo eripuit mentitum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>