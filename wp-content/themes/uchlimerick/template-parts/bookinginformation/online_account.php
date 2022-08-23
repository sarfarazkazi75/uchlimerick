<?php
    $section_3_left_data = get_field('section_3_left_data');
    $section_3_right_data = get_field('section_3_right_data');
?>
<section class="information-col-two information" data-aos="fade-up">
<div class="container-inner">
    <div class="row">
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5><?php echo $section_3_left_data['section_3_left_data_title']; ?></h5>
            </div>
            
            <div class="paragaraph-medium">
                <?php echo $section_3_left_data['section_3_left_data_desc']; ?>
            </div>
            <a href="<?php echo $section_3_left_data['section_3_left_data_link']['url']; ?>" class="bg-transparent button"><?php echo $section_3_left_data['section_3_left_data_link']['title']; ?></a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5><?php echo $section_3_right_data['section_3_right_data_title']; ?></h5>
            </div>
            
            <div class="paragaraph-medium">
                <?php echo $section_3_right_data['section_3_right_data_desc']; ?>
            </div>
            <a href="<?php echo $section_3_right_data['section_3_right_data_link']['url']; ?>" class="bg-transparent button"><?php echo $section_3_right_data['section_3_right_data_link']['title']; ?></a>
        </div>
    </div>
    </div>
</div>
</section>