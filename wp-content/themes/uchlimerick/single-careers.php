<?php
get_header();
$post_id                    = get_the_id();
$title                      = get_the_title($post_id);
$content                    = get_the_content($post_id);
$permalink                  = get_the_permalink($post_id);
$featured_img               = get_the_post_thumbnail_url( $post_id, 'full' );
$date                       = get_the_date('d.m.Y', $post_id);
$career_banner_image_mobile = get_field('uchlimerick_post_career_single_banner_image_mobile', $post_id);
$apply_for_this_job_email   = get_field('uchlimerick_career_apply_for_this_job_email', 'option');
$apply_for_this_job_email   = !empty($apply_for_this_job_email) ? $apply_for_this_job_email : 'careers.email@uch.ie';
?>
<section class="page-banner">
    <?php if(!empty($featured_img)){ ?>
        <img src="<?php echo $featured_img;?>" alt="" class="d-none d-md-block img-100">
   <?php  } ?>

    <?php if(!empty($career_banner_image_mobile)){
     echo wp_get_attachment_image($career_banner_image_mobile['id'], 'full','',array('class'=>'d-md-none img-100')); 
    } ?>
   <div class="page-banner-text">
        <div class="container-inner">
            <div class="page-border-bottom mb-4">
                <p class="small-yellow"><?php echo $date; ?></p>
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="pt-xl-2">
                <a href="mailto:<?php echo $apply_for_this_job_email; ?>?subject=<?php echo $title; ?>" class="button button-dark fw-medium text-center"><?php echo  _('Apply for this Job');?></a>
            </div>
        </div>
    </div>
</section>
<section class="project-post pt-100 pb-100">
    <div class="container-inner">
        <div class="post-container">
            <?php echo $content; ?>
            <a href="mailto:<?php echo $apply_for_this_job_email; ?>?subject=<?php echo $title; ?>" class="button button-dark fw-medium text-center text-white"><?php echo  _('Apply for this Job');?></a>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/flex', 'newsletter_section'); ?>
<?php get_footer();?>