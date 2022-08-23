<?php 
    $post_banner_desktop = get_field('post_banner_desktop');
    $post_banner_mobile = get_field('post_banner_mobile');
?>
<section class="page-banner">
    <?php if($post_banner_desktop != ""): ?><img src="<?php echo $post_banner_desktop['url']; ?>" alt="" class="d-none d-md-block img-100"><?php endif; ?>
    <?php if($post_banner_mobile != ""): ?><img src="<?php echo $post_banner_mobile['url']; ?>" alt="" class="d-md-none img-100"><?php endif; ?>
    <div class="page-banner-text">
        <div class="container-inner">
            <div class="page-border-bottom">
                <p class="small-yellow"><?php echo get_the_date('d.m.Y'); ?></p>
                <h2><?php echo single_post_title(); ?></h2>
            </div>
        </div>
    </div>
</section>