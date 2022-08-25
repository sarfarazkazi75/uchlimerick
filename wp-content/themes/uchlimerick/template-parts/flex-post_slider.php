<?php 

        $post_image = get_sub_field('post_image');
?>

<section class="project-post">
    <div class="container-inner">
        <div class="post-container">
<div class="project-image-slider-row">
                <div class="project-image-slider">
                    <?php foreach($post_image as $all_image){
                        $images = $all_image['url']; 
                        ?>
                         <div class="project-big-image">
                            <img src="<?php echo $images ?>" alt="">
                        </div>

                        <?php 

                    } ?>
                   
                  
                </div>
                <div class="slider-nav">
                    <?php foreach($post_image as $all_image){
                        $images = $all_image['url']; 
                        ?>
                         <div class="project-image">
                            <img src="<?php echo $images ?>" alt="">
                        </div>

                        <?php 

                    } ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>