<?php 

        
        $quote_title = get_sub_field('quote_title');
        $quote_subtitle = get_sub_field('quote_subtitle');
        $quote_link = get_sub_field('quote_link');

        
?>
<section class="project-post ">
    <div class="container-inner">
        <div class="post-container">


            <div class="post-image-text bg-dark p-50">
                <div class="post-img-design">
                    <img src="<?php echo home_url(); ?>wp-content/uploads/2022/08/Vector-11.png" alt="">
                </div>
                <div class="row align-items-end">
                    <div class="col-lg-8 col-md-6">
                        <div class="post-sub">
                           <?php if(!empty($quote_title)){?> 
                            <h4 class="text-border-bottom"><?php echo $quote_title;?></h4>
                            <?php }?>
                           <?php if(!empty($quote_subtitle)){?><?php echo $quote_subtitle;?><?php }?>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right align-items-end mt-4 mt-md-0">
                        <?php if(!empty($quote_link['title'])){?>
                            <a href="<?php echo $quote_link['url'];?>" class="button button-dark"><?php echo $quote_link['title'];?></a>
                        <?php }?>
                    </div>
                </div>
            </div>

</div>
</div>
</section>