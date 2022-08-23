<?php
    $post_content = get_field('post_content');
    $post_content_after_slider = get_field('post_content_after_slider');
    $post_images = get_field('post_images');
    $post_title = get_field('post_title');
    $post_subtitle = get_field('post_subtitle');
    $post_link = get_field('post_link');
    $content_before_single_image = get_field('content_before_single_image');
    $single_image_desktop = get_field('single_image_desktop');
    $single_image_mobile = get_field('single_image_mobile');
    $content_after_single_image = get_field('content_after_single_image');
    $post_quote = get_field('post_quote');
    $content_after_quote = get_field('content_after_quote');
?>
<section class="project-post pb-80">
    <div class="container-inner">
        <div class="post-container">
        	<?php if($post_content != ""): ?><?php echo $post_content; ?><?php endif; ?>
            <div class="project-image-slider-row">
                <div class="project-image-slider">
                    <?php if(have_rows('post_slider')) { ?>
                    	<?php while(have_rows('post_slider')) { the_row();
                    		$post_image = get_sub_field('post_image');
                    	?>	
                    	<div class="project-big-image">
	                        <img src="<?php echo $post_image['url']; ?>" alt="">
	                    </div>
						<?php } 
					} ?>
                </div>
                <div class="slider-nav">
                    <?php if(have_rows('post_slider')) { ?>
                    	<?php while(have_rows('post_slider')) { the_row();
                    		$post_image = get_sub_field('post_image');
                    	?>	
                    	<div class="project-image">
	                        <img src="<?php echo $post_image['url']; ?>" alt="">
	                    </div>
						<?php } 
					} ?>
                </div>
            </div>
            <?php if($post_content_after_slider != ""): ?><?php echo $post_content_after_slider; ?><?php endif; ?>
            <div class="post-image-text bg-dark p-50">
                <?php if($post_images != ""): ?>
                <div class="post-img-design">
                    <img src="<?php echo $post_images['url']; ?>" alt="">
                </div>
                <?php endif; ?>
                <div class="row align-items-end">
                    <div class="col-lg-8 col-md-6">
                        <div class="post-sub">
                            <?php if($post_title != ""): ?><h4 class="text-border-bottom"><?php echo $post_title; ?></h4><?php endif; ?>
                            <?php if($post_subtitle != ""): ?><p><?php echo $post_subtitle; ?></p><?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right align-items-end mt-4 mt-md-0">
                        <?php if($post_link != ""): ?><a href="<?php echo $post_link['url']; ?>" target="<?php echo $post_link['target']; ?>" class="button button-dark"><?php echo $post_link['title']; ?></a><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="color-gray">
            	<?php if($content_before_single_image != ""): ?><?php echo $content_before_single_image; ?><?php endif; ?>
            </div>
            <div class="">
                <?php if($single_image_desktop != ""): ?><img class="only-desktop" src="<?php echo $single_image_desktop['url']; ?>" alt=""><?php endif; ?>
                <?php if($single_image_mobile != ""): ?><img class="only-mobile w-100" src="<?php echo $single_image_mobile['url']; ?>" alt=""><?php endif; ?>
            </div>
            <br>
            <?php if($content_after_single_image != ""): ?><?php echo $content_after_single_image; ?><?php endif; ?>
            <div class="client-flat">
                <?php if($post_quote != ""): ?><img src="<?php echo $post_quote['quote_icon']['url']; ?>" alt="">
                <?php echo $post_quote['quote_content']; ?><?php endif; ?>
            </div>
    		<?php if($content_after_quote != ""): ?><?php echo $content_after_quote; ?><?php endif; ?>
        </div>
    </div>
</section>