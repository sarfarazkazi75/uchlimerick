<?php
/* Template Name: FAQ */
get_header();
if (class_exists('acf')) {
    $banner_img        = get_field('uchlimerick_faq_post_banner_image', 'option');
    $mobile_banner_img = get_field('uchlimerick_faq_post_banner_mobile_image', 'option');
    $banner_title      = get_field('uchlimerick_faq_post_banner_title', 'option');
}
?>
<section class="page-banner">
    <?php
    if (!empty($banner_img)) {
        echo wp_get_attachment_image($banner_img['ID'], 'full', '', array('class' => 'd-none d-md-block img-100'));
    }
    ?>
    <?php
    if (!empty($mobile_banner_img)) {
        echo wp_get_attachment_image($mobile_banner_img['ID'], 'full', '', array('class' => 'd-md-none img-100'));
    }
    ?>
    <?php if (!empty($banner_title)) { ?>
        <div class="page-banner-text">
            <div class="container-inner">
                <div class="page-border-bottom">
                    <h1><?php echo $banner_title; ?></h1>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<section class="faq-accordion-wrapper">
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <?php
                $custom_terms = get_terms('faq_cat');
                foreach ($custom_terms as $custom_term) {
                    wp_reset_query();
                    $args = array('post_type' => 'faq',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'faq_cat',
                                'field'    => 'slug',
                                'terms'    => $custom_term->slug,
                            ),
                        ),
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        $i = 1;
                        ?>
                        <div class="only-desktop">
                        <div class="accordion-box faq-accordion-box">
                            <a href="javascript:void(0);" class="position-relative title-wrp d-block">
                                <span class="h6 fw-bold title color-black"><?php echo $custom_term->name; ?></span>
                                <div class="accordion-sign closed">
                                    <div class="horizontal"></div>
                                    <div class="vertical"></div>
                                </div>
                            </a>
                            <div class="content faq-content" style="display: none;">
                                <div class="faq-menu-visit-container faq-link-content">
                                    <ul class="faq_active">
                                        <?php
                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?><li><a href="#<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></a></li><?php
                                            $i++;
                                        endwhile;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="only-mobile">
                        <div class="accordion-box faq-accordion-box">
                            <a href="javascript:void(0);" class="position-relative title-wrp d-block">
                                <span class="h6 fw-bold title color-black"><?php echo $custom_term->name; ?></span>
                                <div class="accordion-sign closed">
                                    <div class="horizontal"></div>
                                    <div class="vertical"></div>
                                </div>
                            </a>
                            <div class="content faq-content" style="display: none;">
                                <div class="faq-menu-visit-container faq-link-content">
                                   <?php
                                        while ($loop->have_posts()) : $loop->the_post();
                                            ?>
                                            <h5><?php echo get_the_title(); ?></h5>
                                            <p><?php echo get_the_content(); ?></p>
                                            <?php
                                        endwhile;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-lg-8 col-md-7 order-md-2 order-1">
                <div class="faq-right-cover">
                    <p class="faq_questions_heading"><?php echo _('What is your question?'); ?></p>
                    <div class="faq-search">
                        <form role="search" id="searchform">
                            <input type="text" name="faq_search" id="faq_search" placeholder="Search your question here"></input>
                            <input type="submit" alt="Search" value="Search" />
                        </form> 
                    </div>
                    


                    <div class="only-desktop" id="faq_content_wrap_full">
                        <?php
                        $custom_terms = get_terms('faq_cat');

                        foreach ($custom_terms as $custom_term) {
                            wp_reset_query();
                            $args = array('post_type' => 'faq',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'faq_cat',
                                        'field'    => 'slug',
                                        'terms'    => $custom_term->slug,
                                    ),
                                ),
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                $i = 1;
                                while ($loop->have_posts()) : $loop->the_post();
                                    $helpfull = get_field('uchlimerick_faq_did_you_find_this_helpful');
                                    $no_of_likes = get_field('no_of_likes');
                                    ?>
                                    <div class="faq-search-lorem from_faq_archieve" id="<?php echo get_the_ID(); ?>">
                                        <h5><?php echo get_the_title(); ?></h5>
                                        <p><?php echo get_the_content(); ?></p>
                                        <div class="help-full-cover">
                                            <?php echo _('Did you find this helpful?'); ?>
                                            <?php if($helpfull == 1){ ?>
                                            <div class="help-full-thumbh">
                                                <a class="like_thumb" href="javascript:void(0);" data-postid="<?php echo get_the_ID(); ?>" data-totallikes="<?php echo $no_of_likes; ?>">
                                                    <span class="thumbh-like like_thumb_span">
                                                        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Vector-8.png" alt="">
                                                    </span>                                                    
                                                </a>
                                                <a class="dis_like_thumb" href="javascript:void(0);" data-postid="<?php echo get_the_ID(); ?>" data-totallikes="<?php echo $no_of_likes; ?>">
                                                    <span class="thumbh-like dis_like_thumb_span">
                                                        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Vector-9.png" alt="">
                                                    </span>
                                                </a>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                            }
                        }
                        ?>
                        <div class="contact-link">
                            <?php echo _('Couldn&lsquo;t find your answer?'); ?>
                            <a href="<?php echo site_url('contact'); ?>"><?php echo _('Contact Us'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/flex', 'helpful_resource');
get_template_part('template-parts/flex', 'newsletter_section');
get_footer();
?>
