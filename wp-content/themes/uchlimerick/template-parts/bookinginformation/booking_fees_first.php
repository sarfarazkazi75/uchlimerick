<?php
    $section_1_title = get_field('section_1_title');
    $section_1_left_data = get_field('section_1_left_data');
    $section_1_right_data = get_field('section_1_right_data');
?>
<section class="information information-top" data-aos="fade-up">
    <div class="container-inner">
        <div class="information-block">
            <div class="text-border-bottom">
                <h5><?php echo $section_1_title; ?></h5>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div class="paragaraph-medium">
                        <?php echo $section_1_left_data; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="paragaraph-medium">
                        <?php echo $section_1_right_data; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>