<?php
    $testimonial_bg_image = get_sub_field('testimonial_bg_image');
    $testimonial_bg_color = get_sub_field('testimonial_bg_color');
    $testimonial_content = get_sub_field('testimonial_content');
    $user_image = get_sub_field('user_image');
    $user_data = get_sub_field('user_data');
    $double_quote_start = get_sub_field('double_quote_start');
    $double_quote_end = get_sub_field('double_quote_end');
?>
<section class="testimoniyal testimonal-bg" style="background-image:url('<?php if($testimonial_bg_image != ""): ?><?php echo $testimonial_bg_image['url']; ?><?php endif; ?>'); background-color:<?php echo $testimonial_bg_color; ?> ">
    <div class="container-inner">
        <div class="testimona-cover">
            <div class="testimo-row">
                <div class="testi-content">
                    <?php if($testimonial_content != ""): ?><h5><?php echo $testimonial_content ;?></h5><?php endif; ?>
                    <div class="duble-cort duble-cort-bot d-block d-lg-none d-md-none">
                        <?php if($double_quote_end != ""): ?><img src="<?php echo $double_quote_end['url']; ?>" alt="bot-icon"><?php endif; ?>
                    </div>
                </div>
                <div class="img-namedes">
                    <div class="test-img-cover">
                        <?php if($user_image != ""): ?><img src="<?php echo $user_image['url']; ?>" alt=""><?php endif; ?>
                    </div>
                    <div class="per-name">
                        <?php if($user_data != ""): ?><?php echo $user_data; ?><?php endif; ?>
                    </div>
                </div>

                <div class="duble-cort duble-cort-top">
                    <?php if($double_quote_start != ""): ?><img src="<?php echo $double_quote_start['url']; ?>" alt="top-icon"><?php endif; ?>
                </div>
                <div class="duble-cort duble-cort-bot d-none d-lg-block d-md-block">
                    <?php if($double_quote_end != ""): ?><img src="<?php echo $double_quote_end['url']; ?>" alt="bot-icon"><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>