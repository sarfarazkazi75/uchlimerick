<section class="accordion-sec">
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php if(have_rows('accordion_list')) { ?> 
                    <?php while(have_rows('accordion_list')) { the_row(); 
                        $accordion_title = get_sub_field('accordion_title'); 
                        $accordion_description = get_sub_field('accordion_description');
                    ?> 
                         <div class="accordion-box">
                            <a href="javascript:void(0);" class="position-relative title-wrp d-block">
                                <?php if($accordion_title != ""): ?><span class="h6  title color-black"><?php echo $accordion_title; ?></span><?php endif; ?>

                                <div class="accordion-sign closed">
                                    <div class="horizontal"></div>
                                    <div class="vertical"></div>
                                </div>
                            </a>
                            <div class="content" style="display: none;">
                               <?php if($accordion_description != ""): ?><?php echo $accordion_description; ?><?php endif; ?>

                            </div>
                        </div>
                    <?php } ?> 
                <?php } ?>
            </div>
        </div>
    </div>
</section>