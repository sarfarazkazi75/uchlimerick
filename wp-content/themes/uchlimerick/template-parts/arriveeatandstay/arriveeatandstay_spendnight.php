<?php
    $spend_the_night = get_field('spend_the_night');
?>
<section class="food-drink light position-relative" id="support4">
    <div class="container-inner">
        <div class="section-header">
            <div class="row alige-itmes-end">
                <div class="col-md-6 col-left">
                    <div class="text-border-bottom">
                        <h3 class="mb-3 fw-bold pb-md-0 pb-2"><?php echo $spend_the_night['spend_the_night_title'] ; ?></h3>
                    </div>
                </div>
                <div class="col-md-6 col-right">
                    <?php echo $spend_the_night['spend_the_night_content'] ; ?>
                </div>
            </div>
        </div>
        <div class="food-drink-wrp">
            <?php if(have_rows('spend_the_night_data')) { 
                while(have_rows('spend_the_night_data')) { the_row();    
                    $spend_the_night_image = get_sub_field('spend_the_night_image');  
                    $spend_the_night_title = get_sub_field('spend_the_night_title');  
                    $spend_the_night_content = get_sub_field('spend_the_night_content');  
                    $spend_the_night_link = get_sub_field('spend_the_night_link');  
            ?>                                                                          
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="img-wrapper">
                            <img src="<?php echo $spend_the_night_image['url']; ?>" alt="<?php echo $spend_the_night_image['alt']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-right">
                        <div class="text-border-bottom">
                            <h5><?php echo $spend_the_night_title; ?></h5>
                        </div>
                        <?php echo $spend_the_night_content; ?>
                        <a href="<?php echo $spend_the_night_link['url']; ?>" target="<?php echo $spend_the_night_link['target']; ?>" class="button-light button"><?php echo $spend_the_night_link['title']; ?></a>
                    </div>
                </div>                                                                        
            <?php } 
            }
            ?> 
        </div>
    </div>
</section>