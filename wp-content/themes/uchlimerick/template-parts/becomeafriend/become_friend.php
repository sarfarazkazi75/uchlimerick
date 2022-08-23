<?php
    $background_image = get_field('background_image'); 
    $title_desktop = get_field('title_desktop');  
    $title_mobile = get_field('title_mobile');  
    $section_content = get_field('section_content');  
    $singer_image = get_field('singer_image');  
?>
<section class="title-goes-heer">
    <div class="goes-img-design ">
        <img src="<?php echo $background_image['url'];?>" alt="">
    </div>
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-6">
                <div class="goes-left">
                    <div class="goes-title">
                        <h4 class="d-none d-lg-block d-md-block"><?php echo $title_desktop; ?></h4>
                        <h4 class="d-block d-lg-none d-md-none"><?php echo $title_mobile; ?></h4>
                        <p><?php echo $section_content; ?></p>
                    </div>
                    <?php if(have_rows('student_data')) { ?>
                    <?php while(have_rows('student_data')) { the_row(); 
                            $icon = get_sub_field('icon');
                            $details = get_sub_field('details');
                        ?>
                    <div class="goes-row">
                        <div class="goes-icon">
                            <img src="<?php echo $icon['url'];?>" alt="icon-img">
                        </div>
                        <div class="goes-des">
                            <?php echo $details; ?>
                        </div>

                    </div>
                    <?php } 
                            } ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="goes-right">
                    <img src="<?php echo $singer_image['url'];?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>