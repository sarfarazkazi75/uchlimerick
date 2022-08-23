<?php if( have_rows('image_text_list') ): ?>
    <?php while( have_rows('image_text_list') ): the_row();
        $section_image = get_sub_field('section_image');
        $section_title = get_sub_field('section_title');    
        $section_content = get_sub_field('section_content');
        $show_button = get_sub_field('show_button');
        $section_link = get_sub_field('section_link');
        if( get_row_index() % 2 == 0 ){ 
    ?>
    <section class="two-colum-section pt-100 pb-100" id="support1">
        <div class="container-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="two-col-left-col colpe-left">
                        <h4 class="text-border-bottom"><?php echo $section_title; ?></h4>
                        <?php echo $section_content; ?>
                        <?php
                        if($show_button == 1){
                         if($section_link != ""): ?>
                        <a href="<?php echo $section_link['url']; ?>" target="<?php echo $section_link['target']; ?>" class="bg-transparent button text-center fw-medium"><?php echo $section_link['title']; ?></a>
                        <?php endif;
                        } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="two-col-right-img">
                        <img src="<?php echo $section_image['url']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="two-colum-section column-reverse" id="support3">
        <div class="container-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="two-col-right-img">
                        <img src="<?php echo $section_image['url']; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="two-col-left-col colps-right">
                        <h4 class="text-border-bottom"><?php echo $section_title; ?></h4>
                        <?php echo $section_content; ?>
                        <?php
                         if($show_button == 1){
                        if($section_link != ""): ?>
                        <a href="<?php echo $section_link['url']; ?>" target="<?php echo $section_link['target']; ?>" class="bg-transparent button text-center fw-medium"><?php echo $section_link['title']; ?></a>
                        <?php endif; 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>                        
    <?php endwhile; ?>
<?php endif; ?>     