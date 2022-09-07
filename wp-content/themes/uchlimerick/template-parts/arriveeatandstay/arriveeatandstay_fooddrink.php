<?php
    $food_and_drink = get_field('food_and_drink');
?>
<section class="food-drink position-relative" id="support3">
    <div class="container-inner">
        <div class="section-header">
            <div class="row alige-itmes-end">

                <div class="col-md-6 col-left">
                    <div class="text-border-bottom food-title">
                        <h2 class="mb-md-3 mb-0 fw-bold pb-md-0 pb-2">
                            <?php echo $food_and_drink['food_and_drink_title'] ; ?>
                        </h2>
                    </div>
                </div>
                <div class="col-md-6 col-right">
                    <?php echo $food_and_drink['food_and_drink_content'] ; ?>
                </div>
            </div>
        </div>
        <div class="food-drink-wrp">
            <?php if(have_rows('food_and_drink_data')) { 
                while(have_rows('food_and_drink_data')) { the_row();    
                    $food_and_drink_list_image = get_sub_field('food_and_drink_list_image');  
                    $food_and_drink_list_title = get_sub_field('food_and_drink_list_title');  
                    $food_and_drink_list_content = get_sub_field('food_and_drink_list_content');  
                    $show_food_and_drink_link = get_sub_field('show_food_and_drink_link');  
                    $food_and_drink_list_link = get_sub_field('food_and_drink_list_link');  
            ?>
            <div class="row">
                <div class="col-md-6 mb-md-0 mb-4">
                    <div class="img-wrapper">
                        <img src="<?php echo $food_and_drink_list_image['url']; ?>"
                            alt="<?php echo $food_and_drink_list_image['alt']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-right">
                    <div class="text-border-bottom">
                        <h5><?php echo $food_and_drink_list_title; ?></h5>
                    </div>
                    <?php echo $food_and_drink_list_content; ?>
                    <?php if( $show_food_and_drink_link ) { ?>
                    <a href="<?php echo $food_and_drink_list_link['url']; ?>"
                        target="<?php echo $food_and_drink_list_link['target']; ?>"
                        class="button-light button"><?php echo $food_and_drink_list_link['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php } 
            }
            ?>
        </div>
    </div>
</section>