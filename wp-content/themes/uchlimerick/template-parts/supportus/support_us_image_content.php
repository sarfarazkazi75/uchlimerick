<div class="section-wrapper">
    <div class="section-bg-design">
    <?php $background_image = get_field('background_image'); ?> 
        <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>">
    </div>
    <?php if(have_rows('image_text_data')) : $i=1;
        while(have_rows('image_text_data')) : the_row();     
            $support_title = get_sub_field('support_title'); 
            $support_description = get_sub_field('support_description'); 
            $support_link = get_sub_field('support_link'); 
            $support_image = get_sub_field('support_image');

        if( get_row_index() % 2 == 0 ){ 
    ?>
    <section class="two-colum-section bg-design column-reverse" id="support<?php echo $i; ?>">

        <div class="container-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="two-col-right-img">
                        <?php if($support_image != ""): ?>
                        <img src="<?php echo $support_image['url']; ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="two-col-left-col colps-right">
                        <h4 class="text-border-bottom"><?php echo $support_title; ?></h4>
                        <?php echo $support_description; ?>
                        <?php if($support_link != ""): ?>
                        <a href="<?php echo $support_link['url'] ;?>" target="<?php echo $support_link['target']; ?>" class="button button-dark"><?php echo $support_link['title']; ?></a><?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="two-colum-section pt-100 pb-100" id="support<?php echo $i; ?>">
        <div class="container-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="two-col-left-col colpe-left">
                        <h4 class="text-border-bottom"><?php echo $support_title; ?></h4>
                        <?php echo $support_description; ?>
                        <?php if($support_link != ""): ?>
                        <a href="<?php echo $support_link['url'] ;?>" target="<?php echo $support_link['target']; ?>"
                            class="button button-dark"><?php echo $support_link['title']; ?></a><?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="two-col-right-img">
                        <?php if($support_image != ""): ?>
                        <img src="<?php echo $support_image['url']; ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php } ?>

    <?php $i++; endwhile;  ?>
    <?php endif; ?>
</div>