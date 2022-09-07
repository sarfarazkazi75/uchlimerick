<?php
    $get_here_title = get_field('get_here_title');
    $get_here_content = get_field('get_here_content');
    $get_here_address = get_field('get_here_address');
    $get_here_link = get_field('get_here_link');
    $get_here_map = get_field('get_here_map');
?>
<section class="map-sec" id="support1">
    <div class="container-inner">
        <div class="row align-items-center">
            <div class="col-xl-5 col-md-6 mb-md-0 mb-4 pb-md-0 pb-2">
                <div class="section-header">
                    <h2 class="text-border-bottom pb-xl-4 pb-lg-2 pb-md-0 pb-3 mb-lg-5 section-title">
                        <?php echo $get_here_title; ?></h2>
                </div>
                <?php echo $get_here_content; ?>
                <ul class="d-md-block d-none">
                    <li><a href="<?php echo $get_here_link; ?>" target="blank">
                            <span class="icon"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/map-wine.svg"
                                    alt=""></span>
                            <span><?php echo $get_here_address; ?></a></span>
                    </li>
                </ul>
                <a href="<?php echo $get_here_link; ?>" target="blank"
                    class="button button-dark text-center"><?php echo _('Open in Google Maps');?></a>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="embed-responsive embed-responsive-1by1">
                    <?php echo $get_here_map; ?>
                </div>
            </div>
        </div>
    </div>
</section>