<?php if( have_rows('page_banner') ): ?>
    <?php while( have_rows('page_banner') ): the_row(); ?>
        <?php if( get_row_layout() == 'banner_section' ): ?>
        <?php
            $banner_image = get_sub_field('banner_image');
            $banner_small_image = get_sub_field('banner_small_image');
            $banner_title = get_sub_field('banner_title');
            
        ?>
        <section class="page-banner">
            <?php if($banner_image != ""): ?>
                <img src="<?php echo $banner_image['url']; ?>" alt="" class="d-none d-md-block img-100">
            <?php endif; ?>
            <?php if($banner_small_image != ""): ?>
                <img src="<?php echo $banner_small_image['url']; ?>" alt="" class="d-md-none img-100">
            <?php endif; ?>
            <div class="page-banner-text">
                <div class="container-inner">
                    <div class="page-border-bottom">
                        <?php if($banner_title = !empty($banner_title) ? $banner_title : get_the_title()): ?>
                            <h2><?php echo $banner_title; ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
 <?php endwhile; ?>
<?php endif; ?>