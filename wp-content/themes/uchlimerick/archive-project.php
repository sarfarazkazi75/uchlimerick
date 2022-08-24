
<?php get_header(); 
if(class_exists('acf')){
    $banner_img        = get_field('uchlimerick_product_post_banner_image','option');
    $mobile_banner_img = get_field('uchlimerick_product_post_banner_mobile_image','option');
    $banner_title      = get_field('uchlimerick_product_post_banner_title','option');
    } ?>
<section class="page-banner">
    <?php if(!empty($banner_img)){  echo wp_get_attachment_image($banner_img['ID'], 'full','',array('class'=>'d-none d-md-block img-100')); } ?>
    <?php if(!empty($mobile_banner_img)){  echo wp_get_attachment_image($mobile_banner_img['ID'], 'full','',array('class'=>'d-md-none img-100')); } ?>
    <?php if(!empty($banner_title)){ ?>
    <div class="page-banner-text">
        <div class="container-inner">
            <div class="page-border-bottom">
                <h2><?php echo $banner_title;?></h2>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<section class="project-post-main-wrapper">
    <div class="container-inner">
        <div class="post-main-cover">
            <div class="row" id="show_project_content_wrap_full">
                <?php if ( have_posts() ) : 
                    $i = 1; 
                    $temp_data = 1;
                     while ( have_posts() ) : the_post();
                    $class ='';
                    $inner_class ='';
                    $col_8_content ='';
                     if($temp_data == 1 || $temp_data == 7){
                         $class = 'col-md-8';
                         $col_8_content = '
                            <div class="row">
                                 <div class="col-md-6">
                                     <h6 class="text-border-bottom">'.get_the_title().'</h6>
                                </div>
                                <div class="col-md-6">
                                <p> '.get_the_content().' </p>
                                     
                                    <a class="post-date arrwo-has-link" href="'.get_permalink().'">Reed more</a>
                                </div>
                            </div>';
                        $temp_data ++ ;
                     }else{
                        $class = 'col-md-4';
                        $col_8_content= '
                            <h4 class="text-border-bottom">'.get_the_title().'</h4>
                           <p> '.get_the_content().' </p>
                            <a class="post-date arrwo-has-link" href="'.get_permalink().'">Read more</a>';
                        if($temp_data == 10){
                            $temp_data = 0;
                        }
                        $temp_data ++ ;
                     }
                     if($i == 3){
                         $inner_class='donate-cover bg-gold';
                     }elseif($i == 10){
                        $inner_class='donate-cover Become-friend-cover bg-light-gray';
                     }else{
                        $inner_class='post-card';
                     }
                    ?>    
                    <!-- do stuff ... -->
                    <div class="project_single_wrap <?php echo $class;?> order-md-<?php echo $i;?> order-<?php echo $i;?>">
                        <div class="<?php echo $inner_class;?>">
                            <div class="post-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="post-details">
                              <?php echo $col_8_content;?>
                             </div>
                        </div>
                   </div>
                    <?php $i++; endwhile; ?>
                <?php  endif; ?>
            </div>
            <div class="load-more-btn text-center">
                <a id="load_more_project" href="javascript:void(0);" class="button-light button" ><?php echo _('Load More');?></a>
            </div>
        </div>
    </div>
</section>


<?php
    get_template_part('template-parts/flex', 'newsletter_section');
    get_footer();
?>