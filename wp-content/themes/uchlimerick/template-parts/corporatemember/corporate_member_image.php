<?php
    $corporate_image = get_field('corporate_image'); 
    $corporate_title = get_field('corporate_title');  
    $corporate_subtitle = get_field('corporate_subtitle');  
?>
<section class="img-with-text dark position-relative">
    <div class="container-inner">
        <div class="row align-items-center flex-md-row flex-column-reverse">            
            <div class="col-md-6">
                <img src="<?php echo $corporate_image['url'];?>" alt="" class="w-100">
            </div>
            <div class="col-md-6 col-left mb-md-0 mb-4">
                <div class="section-header text-white mb-4 pb-xl-2">
                    <h6 class="title mb-3"><?php echo $corporate_title; ?></h6>
                    <p><?php echo $corporate_subtitle; ?></p>
                </div>
                <ul class="img-list text-white">
                    <?php if(have_rows('member_list')) { 
                        while(have_rows('member_list')) { the_row(); 
                            $member_image = get_sub_field('member_image');
                            $member_title = get_sub_field('member_title');
                            $member_content = get_sub_field('member_content');
                    ?>  
                        <li class="d-flex">
                            <span class="icon mr-3">
                                <img src="<?php echo $member_image['url'];?>" alt="icon-img">
                            </span>
                            <div class="desc">
                                <h6 class="fw-bold mb-2"><?php echo $member_title;?></h6>
                                <p><?php echo $member_content;?></p>
                            </div>
                        </li> 
                    <?php } } ?>  
                </ul>
            </div>
        </div>
    </div>
</section>