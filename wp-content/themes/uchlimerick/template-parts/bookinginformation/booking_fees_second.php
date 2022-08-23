<?php
    $section_2_title = get_field('section_2_title');
    $section_2_left_data = get_field('section_2_left_data');
    $section_2_right_data = get_field('section_2_right_data');
    $section_2_link = get_field('section_2_link');
?>
<section class="information" data-aos="fade-up">
    <div class="container-inner">
    <div class="information-block">
    <div class="text-border-bottom">
    <h5><?php echo $section_2_title; ?></h5>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <?php echo $section_2_left_data; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <?php echo $section_2_right_data; ?>
            </div>
            <a href="<?php echo $section_2_link['url']; ?>" class="bg-transparent button"><?php echo $section_2_link['title']; ?></a>
        </div>

    </div>
    </div>
    </div>
</section>