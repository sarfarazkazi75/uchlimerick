<section class="position-relative venur-box pb-100">
    <div class="container-inner">
        <div class="row justify-content-center">
            <?php if(have_rows('venue_box')) { 
                while(have_rows('venue_box')) { the_row();                      
                    $venue_box_icon = get_sub_field('venue_box_icon'); 
                    $venue_box_title = get_sub_field('venue_box_title'); 
            ?>     
                <div class="col-lg-4 col-md-6 venur-box-col" data-aos="fade-up">
                    <div class="venur-box-wrp text-center d-flex flex-column justify-content-center">
                        <div>
                            <div class="mb-3">
                                <img src="<?php echo $venue_box_icon['url'];?>" alt="">
                            </div>
                            <p class="mb-0 fw-medium"><?php echo $venue_box_title; ?></p>
                        </div>
                    </div>
                </div>
            <?php
                 } 
            } ?>  
        </div>
    </div>
</section>