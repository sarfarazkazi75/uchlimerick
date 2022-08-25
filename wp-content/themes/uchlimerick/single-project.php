<?php  get_header(); 

        
    while ( have_posts() ) {
        the_post();
?>

<!-- banner section  -->
<?php $banner_mobile_image = get_field('banner_mobile_image'); ?>

<section class="page-banner">
    
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="d-none d-md-block img-100">
    <?php if($banner_mobile_image != ""): ?><img src="<?php echo $banner_mobile_image['url']; ?>" alt="<?php echo $banner_mobile_image['alt']; ?>" class="d-md-none img-100"><?php endif; ?>
  
    <div class="page-banner-text">
        <div class="container-inner">
            <div class="page-border-bottom">
                <p class="small-yellow"><?php the_date('d.m.Y'); ?></p>
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</section>


<?php
      
      if( have_rows('post_details') ):
          while ( have_rows('post_details') ) : the_row();
             get_template_part( 'template-parts/flex', get_row_layout());
          endwhile;
        endif;


}

            $project_post= array(

                         'post_type'=>'project',
                        'post_status'=>'publish',
                        'posts_per_page'=>3
                       
            );


 
// The Query
$the_query = new WP_Query( $project_post );

?>
<?php 
 
// The Loop
if ( $the_query->have_posts() ) {
   
  ?>

 <section class="support-helps" id="support5">

    <div class="container-inner">
        <div class="row text-border-bottom">
            <div class="col-lg-6 col-md-6">
                <h4><?php  _e('How your support helps')?></h4>
            </div>
            <div class="col-lg-6 col-md-6 d-lg-block d-md-block d-none">
                <div class="all-project-btn">
                    <a href="<?php echo home_url('/Project')?>" class="bg-transparent button"><?php _e('View All Projects','uchlimerick');?></a>
                </div>
            </div>

        </div> 
<div class="row card-slider-row">
  <?php   
    while ( $the_query->have_posts() ) {
        $the_query->the_post();

   ?>

<div class="col-lg-4 col-md-6">
                <a href="<?php the_permalink();?>" class="project-card">
                    <div class="card-img"><?php 
                         if(has_post_thumbnail()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
 <?php endif; ?>
                    </div>
                    </a><div class="project-des"><a href="<?php the_permalink();?>" class="project-card">
                        <h6><?php the_title();?></h6>
                        </a><a href="<?php the_permalink();?>" class="read-btn"><?php _e('Read more');?> <img src="<?php echo home_url()?>wp-content/themes/uchlimerick/assets/images/righ-chevrow-yellow.svg" alt=""></a>
                    </div>
                
            </div>
   <?php      
    }
    
} 
wp_reset_postdata();  
?>
        </div>
        <div class="col-12 d-lg-none d-md-none d-block">
            <div class="all-project-btn">
                <a href="#" class="bg-transparent button">View All Projects</a>
            </div>
        </div>

    </div>
</section>

 <?php get_template_part( 'template-parts/flex', 'newsletter_section' ); ?>

<?php get_footer(); ?>