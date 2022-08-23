<?php get_header();
if (class_exists('acf')) {
    $career_work_with_us_title   = get_field('uchlimerick_post_career_work_with_us_title', 'option');
    $career_work_with_us_details = get_field('uchlimerick_post_career_work_with_us_details', 'option');
    $career_work_with_us_mail    = get_field('uchlimerick_career_work_with_us_mail', 'option');
    $career_work_with_us_img     = get_field('uchlimerick_post_career_work_with_us_bg_img', 'option');
    $career_work_with_us_color   = get_field('uchlimerick_post_career_work_with_us_bg_color', 'option');

    $apply_for_this_job_email   = get_field('uchlimerick_career_apply_for_this_job_email', 'option');
    $apply_for_this_job_email   = !empty($apply_for_this_job_email) ? $apply_for_this_job_email : 'careers.email@uch.ie';   
     
} ?>
<?php get_template_part('template-parts/careers/careers', 'banner_section');  ?>
<!-- list of careers post  -->
<section class="list-careers-post">
    <div class="container-inner">
        <div class="cont-991">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $post_id   = get_the_id();
                    $title     = get_the_title($post_id);
                    $content   = get_the_excerpt($post_id);
                    $permalink = get_the_permalink($post_id);
                    $date      = get_the_date('d.m.Y', $post_id); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="post-heding">
                                <p><?php echo $date; ?></p>
                                <h5><?php echo $title; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="post-des">
                                <p><?php echo wp_trim_words($content, 50); ?></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="btn-row">
                                <div class="list-btn-cover">
                                    <a href="<?php echo $permalink; ?>" class="button bg-transparent"><?php echo _('Read More'); ?></a>
                                </div>
                                <div class="list-btn">
                                    <a href="mailto:<?php echo $apply_for_this_job_email;?>?subject=<?php echo $title; ?>" class="button button-dark"><?php echo _('Apply Now'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } // end while
            } // end if
            ?>
        </div>
    </div>
</section>
<!-- quote comment  -->
<section class="testimoniyal" style="background-image:url('<?php echo $career_work_with_us_img['url'];?>');background-color:<?php echo $career_work_with_us_color;?>;">
    <div class="container-inner">
        <div class="testi-content font-style text-center">
            <h3><?php echo $career_work_with_us_title; ?></h3>
            <h6><?php echo $career_work_with_us_details; ?></h6>
            <a href="mailto:<?php echo $career_work_with_us_mail; ?>"><?php echo $career_work_with_us_mail; ?> </a>
        </div>
    </div>
</section>
<!-- newsletter /// -->
<?php 
get_template_part('template-parts/flex', 'newsletter_section'); 
get_footer(); ?>