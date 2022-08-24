<section class="more-helpful">
    <div class="container-inner">
        <?php $helpful_resource = get_field('helpful_resource', 'option'); ?>
        <div class="text-border-bottom">
            <h3><?php echo $helpful_resource; ?></h3>
        </div>
        <div class="row">          
            <?php if(have_rows('resource_data' , 'option')) { 
                while(have_rows('resource_data' , 'option')) { the_row();  
                    $resource_image = get_sub_field('resource_image' , 'option'); 
                    $resource_title = get_sub_field('resource_title' , 'option'); 
                    $resource_link = get_sub_field('resource_link' , 'option'); 
            ?>  
                <div class="col-md-4">
                    <div class="more-col" data-aos="fade-up">
                        <img src="<?php echo $resource_image['url']; ?>" alt="">
                        <div class="more-text"> 
                            <div class="text-border-bottom-two">
                                <h4><?php echo $resource_title; ?></h4>
                            </div>
                            <a href="<?php echo $resource_link['url']; ?>" target="<?php echo $resource_link['target']; ?>" class="button-light button"><?php echo $resource_link['title']; ?></a>
                        </div>
                    </div>
                </div>
            <?php } 
            } ?>  
        </div>
    </div>
</section>