<?php
    $section_5_title = get_field('section_5_title');
    $section_5_data = get_field('section_5_data');
?>
<section class="information information-bottom">
    <div class="container-inner">
        <div class="information-block">
            <div class="text-border-bottom">
                <h5><?php echo $section_5_title; ?></h5>
            </div>
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <div class="paragaraph-medium">
                        <?php echo $section_5_data; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>