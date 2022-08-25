<?php $highlights_title = get_field('highlights_title', 'option'); ?>
<section class="highlights highlights-patten">
   <div class="text-border-left">
      <div class="container-inner">
         <h3 class=""><?php echo $highlights_title; ?></h3>
      </div>
   </div>
   <div class="car-wrappper">
      <div class="main-car">
         <div class="page-wrapper">
            <?php if(have_rows('highlights_details', 'option')) { 
               while(have_rows('highlights_details', 'option')) { the_row(); 
                  $highlights_image = get_sub_field('highlights_image', 'option'); 
                  $highlights_title = get_sub_field('highlights_title', 'option'); 
                  $highlights_date = get_sub_field('highlights_date', 'option'); 
                  $highlights_link = get_sub_field('highlights_link', 'option'); 
                  $class_add = '';
                  if( get_row_index() == 1 ){
                        $class_add = 'active';
                    }elseif( get_row_index() == 3 ){
                        $class_add = 'section-two';
                    }elseif(get_row_index() == 4){
                    $class_add = 'section-three';
                    }elseif(get_row_index() == 5){
                    $class_add = 'section-four';
                    }
            ?> 
                <div class="section <?php echo $class_add;?>" >
                  <img src="<?php echo $highlights_image['url']; ?>" alt="image" class="img-100">
                  <div class="highlight">
                     <div class="highlight-text">
                        <h6 class="highlight-title text-border-bottom"><?php echo $highlights_title; ?></h6>
                        <div class="date-info">
                           <p><?php echo $highlights_date; ?></p>
                           <a href="<?php echo $highlights_link['url']; ?>" target="<?php echo $highlights_link['target']; ?>" class="more-info"><?php echo $highlights_link['title']; ?></a>
                        </div>
                     </div>
                  </div>
               </div> 
               <?php } 
            } ?>
         </div>
      </div>
   </div> 
</section>