<?php
    $supporter_title = get_field('supporter_title');
?>
<section class="our-supporters mt-30">
    <div class="container-inner">
        <div class="support-heding-row">
            <div class="our-supporters-sub">
                <h4><?php echo $supporter_title; ?></h4>
            </div>
            <div class="custom-border"></div>
        </div>

        <div class="supporters-logo-row">
            <?php if(have_rows('supporters')) { 
                while(have_rows('supporters')) { the_row(); 
                    $supporters_logo = get_sub_field('supporters_logo'); 
                    $supporters_logo_link = get_sub_field('supporters_logo_link');
            ?>
            <?php if($supporters_logo_link != ""): ?>
                <a href="<?php $supporters_logo_link['url']; ?>" target="<?php $supporters_logo_link['target']; ?>" class="support-logo" data-aos="fade-left">
                <img src="<?php echo $supporters_logo['url']; ?>" alt="logo-1">
                </a>
            <?php endif; ?>
            <?php } 
            } ?>
        </div>
    </div>
</section>