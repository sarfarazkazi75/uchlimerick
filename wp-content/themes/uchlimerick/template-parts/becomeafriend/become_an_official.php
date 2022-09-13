<section class="become-ofc">
    <div class="container-inner">
        <?php if(have_rows('benefit_data')) { 
            while(have_rows('benefit_data')) { the_row(); 
                $benefit_title = get_sub_field('benefit_title'); 
                $benefit_subtitle = get_sub_field('benefit_subtitle'); 
                $benefit_type = get_sub_field('benefit_type'); 
                $benefit_price = get_sub_field('benefit_price'); 
                $book_ticket_link = get_sub_field('book_ticket_link'); 
                $email_us_link = get_sub_field('email_us_link'); 
                $call_us_link = get_sub_field('call_us_text'); 
                $benefit_box_title = get_sub_field('benefit_box_title'); 
                $benefit_box = get_sub_field('benefit_box'); 
        ?>
        <div class="row row-wrp align-items-center" data-aos="fade-up">
            <div class="col-md-6 mb-md-0 mb-3 aos-init aos-animate">
                <div class="section-header">
                    <?php if($benefit_title != ""){ ?><h6 class="subtitle mb-2"><?php echo $benefit_title; ?></h6><?php } ?>
                    <?php if($benefit_subtitle != ""){ ?><h4 class="title mb-4"><?php echo $benefit_subtitle; ?></h4><?php } ?>
                    <div class="sponser-detail">
                        <div class="row justify-content-between mb-4">
                            <div class="col-6">
                                <?php if($benefit_type != ""){ ?><label class="mb-0 fw-bold color-black"><?php echo $benefit_type; ?></label><?php } ?>
                            </div>
                            <div class="col-6 text-right">
                                <?php if($benefit_price != ""){ ?><label class="mb-0 fw-bold color-black"><?php echo $benefit_price; ?></label><?php } ?>
                            </div>
                        </div>
                        <?php
                                if( have_rows('benefit_type_data') ): while ( have_rows('benefit_type_data') ) : the_row(); 
                                    $benefit_type_details = get_sub_field('benefit_type_details'); 
                                    $benefit_price_details = get_sub_field('benefit_price_details'); 

                                    ?>
                        <div class="data py-3 mb-3">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <?php if($benefit_type_details != ""){ ?><span class="mb-0 color-black"><?php echo $benefit_type_details; ?></span><?php } ?>
                                </div>
                                <div class="col-9 text-right">
                                    <?php if($benefit_price_details != ""){ ?><span class="mb-0 color-black"><?php echo $benefit_price_details; ?></span><?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                endwhile; endif;
                            ?>
                    </div>
                    <div class="row mb-4 mt-4 pt-2 btn-wrap">
                        <div class="col-md-6 mb-md-0 mb-2">
                            <?php if($book_ticket_link != ""){ ?><a href="<?php echo $book_ticket_link['url']; ?>" target="<?php echo $book_ticket_link['target']; ?>"
                                class="button button-dark text-center w-100"><?php echo $book_ticket_link['title'];?></a><?php } ?>
                        </div>
                        <div class="col-md-6 mb-md-0 mb-2">
                            <?php if($email_us_link != ""){ ?><a href="<?php echo $email_us_link['url']; ?>" target="<?php echo $email_us_link['target']; ?>"
                                class="bg-transparent button text-center w-100"><?php echo $email_us_link['title']; ?></a><?php } ?>
                        </div>
                    </div>
                    <p><?php echo _('Call');?> <?php if($call_us_link != ""){ ?><a href="tel:<?php echo $call_us_link; ?>"><?php echo $call_us_link; ?></a><?php } ?> <?php echo _('for further details or to join by phone');?></p>
                </div>
            </div>
            <?php if(!empty($benefit_box)){ ?>
                <div class="col-md-6 aos-init aos-animate">
                    <div class="benifit-box">
                        <?php if($benefit_box_title != ""): ?><h5><?php echo $benefit_box_title; ?></h5><?php endif; ?>
                        <?php if($benefit_box != ""): ?><?php echo $benefit_box; ?><?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } 
        } ?>
    </div>
</section>
