<?php
    $bg_image = get_field('bg_image'); 
    $become_a_friend_title = get_field('become_a_friend_title');  
    $become_a_friend_subtitle = get_field('become_a_friend_subtitle');  
    $become_a_friend_link = get_field('become_a_friend_link');  
    $become_a_friend_image = get_field('become_a_friend_image');  
?>
<!-- Become a Corporate Friend  -->
<section class="two-colum-section become-text bg-dark">
    <div class="goes-img-design ">
        <img src="<?php echo $bg_image['url'];?>" alt="">
    </div>
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="two-col-left-col colpe-left">
                    <h4 class="text-border-bottom"><?php echo $become_a_friend_title; ?></h4>
                    <p><?php echo $become_a_friend_subtitle; ?></p>
                    <a href="<?php echo $become_a_friend_link['url'];?>" target="<?php echo $become_a_friend_link['target'];?>" class="button button-dark"><?php echo $become_a_friend_link['title'];?></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="two-col-right-img">
                    <img src="<?php echo $become_a_friend_image['url'];?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>