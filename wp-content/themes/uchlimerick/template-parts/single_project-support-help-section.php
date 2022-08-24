<?php
$support_help_title = get_field('support_help_title');
$view_post_link     = get_field('view_post_link');
?>
<section class="support-helps" id="support5">
    <div class="container-inner">
        <div class="row text-border-bottom">
            <div class="col-lg-6 col-md-6">
                <?php if ($support_help_title != ""): ?><h4><?php echo $support_help_title; ?></h4><?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-6 d-lg-block d-md-block d-none">
                <div class="all-project-btn">
                    <?php if ($view_post_link != ""): ?><a href="<?php echo $view_post_link['url']; ?>" target="<?php echo $view_post_link['target']; ?> class="bg-transparent button"><?php echo $view_post_link['title']; ?></a><?php endif; ?>
                </div>
            </div>

        </div>
        <!-- card  -->
        <div class="row card-slider-row">
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'post_type'   => 'Project',
                'numberposts' => 3,
                'post_status' => 'publish'
            ));
            foreach ($recent_posts as $post) :
                ?>
                <div class="col-lg-4 col-md-6">
                    <a href="<?php get_the_permalink(); ?>" class="project-card">
                        <div class="card-img">
                            <?php echo get_the_post_thumbnail() ?>
                        </div>
                    </a>
                    <div class="project-des"><a href="#" class="project-card">
                            <h6><?php echo get_the_title() ?> </h6>
                        </a><a href="<?php get_the_permalink(); ?>" target="blank" class="read-btn"><?php echo _('Read more');?> <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/themes/uchlimerick/assets/images/righ-chevrow-yellow.svg" alt=""></a>
                    </div>          
                </div>
                <?php
            endforeach;
            wp_reset_query();
            ?>
        </div>
        <div class="col-12 d-lg-none d-md-none d-block">
            <div class="all-project-btn">
                <?php if ($view_post_link != ""): ?><a href="<?php echo $view_post_link['url']; ?>" target="<?php echo $view_post_link['target']; ?>" class="bg-transparent button"><?php echo $view_post_link['title']; ?></a><?php endif; ?>
            </div>
        </div>
    </div>
</section>
