<?php /*Template Name: Your Visit */
    get_header();  
    $main_title = get_field('main_title');
    $card_1_image = get_field('card_1_image');
    $card_1_title = get_field('card_1_title');    
    $card_1_content = get_field('card_1_content');  
    $card_1_link = get_field('card_1_link');    
?>

<section class="visit-main-wrapper">
    <div class="container-inner">
        <div class="visit-title">
            <h2 class="text-border-bottom">
            <?php echo $main_title; ?>
            </h2>
        </div>
        <div class="row">
            <?php if( have_rows('card_list') ):
                $temp = 0; ?>
                <?php while( have_rows('card_list') ): the_row();
                // echo get_row_index();
                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');    
                    $card_content = get_sub_field('card_content');
                    $card_link = get_sub_field('card_link');
                    $class_add = '';
                    if( get_row_index() == 1 ){
                        $class_add = 'col-md-12';
                    }elseif($temp == 0 || $temp == 3){
                    $class_add = 'col-md-7';
                      $temp++;
                      if($temp == 4){
                          $temp= 0;
                      }
                   }else{
                     $class_add = 'col-md-5';
                     $temp++;
                   }
                    
                  ?>
                   <div class="<?php echo $class_add;?>" data-aos="fade-up">
                     <div class="visit-card">
                        <img src="<?php echo $card_image['url'];?>" alt="">
                        <div class="visit-details">
                            <h4 class="text-border-bottom"><?php echo $card_title; ?></h4>
                            <?php echo $card_content; ?>
                            <a href="<?php echo $card_link['url'];?>" class="button-light button"><?php echo $card_link['title'];?></a>
                        </div>
                    </div>
                  </div>
              
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</section>

<?php 
    get_template_part('template-parts/flex', 'newsletter_section'); 
    get_footer(); 
?>
