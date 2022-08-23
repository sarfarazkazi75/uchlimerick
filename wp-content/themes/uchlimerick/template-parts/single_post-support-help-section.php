<?php
    $support_help_title = get_field('support_help_title');
    $view_post_link = get_field('view_post_link');
?>
<section class="support-helps" id="support5">
    <div class="container-inner">
        <div class="row text-border-bottom">
            <div class="col-lg-6 col-md-6">
                <?php if($support_help_title != ""): ?><h4><?php echo $support_help_title; ?></h4><?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-6 d-lg-block d-md-block d-none">
                <div class="all-project-btn">
                    <?php if($view_post_link != ""): ?><a href="<?php echo $view_post_link['url'];?>" target="<?php echo $view_post_link['target'];?>" class="bg-transparent button"><?php echo $view_post_link['title']; ?></a><?php endif; ?>
                </div>
            </div>

        </div>
        <!-- card  -->
        <div class="row card-slider-row">
        	<?php echo do_shortcode('[recent_posts num="3"]'); ?>
        </div>
        <div class="col-12 d-lg-none d-md-none d-block">
            <div class="all-project-btn">
                <?php if($view_post_link != ""): ?><a href="<?php echo $view_post_link['url'];?>" target="<?php echo $view_post_link['target'];?>" class="bg-transparent button"><?php echo $view_post_link['title']; ?></a><?php endif; ?>
            </div>
        </div>

    </div>
</section>
