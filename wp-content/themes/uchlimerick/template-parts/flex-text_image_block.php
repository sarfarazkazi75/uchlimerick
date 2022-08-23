<?php
    $text_title = get_sub_field('text_title');  
    $text_content = get_sub_field('text_content');  
    $block_image = get_sub_field('block_image'); 
    $section_spacing_class = get_sub_field('section_spacing_class');    
    $main_div_class = get_sub_field('main_div_class');   
    $div_class = get_sub_field('div_class');     
    $title_class = get_sub_field('title_class');     
    $image_class = get_sub_field('image_class');    
?>
<section class="about-two-colum-section <?php echo $section_spacing_class; ?>">
    <div class="container-inner">
        <div class="row align-items-center">
            <div class="col-lg-6 <?php echo $div_class; ?>">
                <div class="<?php echo $main_div_class; ?>">
                    <?php if($text_title != ""): ?><h4 class="<?php echo $title_class; ?>"><?php echo $text_title; ?></h4><?php endif; ?>
                    <?php if($text_content != ""): ?><?php echo $text_content; ?><?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 <?php echo $image_class; ?>">
                <div class="about-two-col-right-img">
                     <?php if($block_image != ""): ?><img src="<?php echo $block_image['url']; ?>" alt=""><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>