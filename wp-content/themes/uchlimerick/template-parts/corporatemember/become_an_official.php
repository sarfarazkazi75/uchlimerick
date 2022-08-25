


<section class="become-ofc">
    <div class="container-inner">


<?php $banifit_data= get_field('benefit_data_corporate',get_the_id());
    if(!empty($banifit_data)){
        foreach($banifit_data as $key=>$val){
            $subtitle              =$val['benefit_subtitle'];
            $title                 =$val['benefit_title'];
            $type_data             =$val['benefit_type_data'];
            $book_ticket_link      =$val['book_ticket_link'];
            $email_us_link         =$val['email_us_link'];
            $call_us_text          =$val['call_us_text'];
            $benefit_box_title     =$val['benefit_box_title'];
            $benefit_box           =$val['benefit_box'];
            $extra_content_add     =$val['benifit_extra_content_add'];
            $extra_content         =$val['benifit_extra_content'];
            if($key % 2 == 0){
            ?>
                <div class="row row-wrp align-items-center">
                    <div class="col-md-6 mb-md-0 mb-3" data-aos="fade-up">
                        <div class="section-header">
                            <h6 class="subtitle mb-2"><?php echo $subtitle;?></h6>
                            <h4 class="title mb-md-3 mb-4"><?php echo $title;?></h4>
                        <?php if($extra_content_add == 1) { ?>
                            <div class="d-md-block">
                                <p><?php echo $extra_content;?></p>
                            </div>
                            <?php } ?>
                            <div class="sponser-detail">
                                <div class="row justify-content-between mb-md-4 mb-3">
                                    <div class="col-6">
                                        <label class="mb-0 fw-bold color-black"><?php echo _('Type');?></label>
                                    </div>
                                    <div class="col-6 text-right">
                                        <label class="mb-0 fw-bold color-black"><?php echo _('Price');?></label>
                                    </div>
                                </div>
                                <?php if(!empty($type_data)) { 
                                    foreach($type_data as $value){ 
                                        $type_details  = $value['benefit_type_details']; 
                                        $price_details = $value['benefit_price_details'];?>
                                        <div class="data py-3 mb-3">
                                            <div class="row justify-content-between">
                                                <div class="col-3">
                                                    <span class="mb-0 color-black"><?php echo $type_details;?></span>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <span class="mb-0 color-black"><?php echo $price_details;?></span>
                                                </div>
                                            </div>
                                        </div>
                                <?php } } ?>
                            </div>
                            <div class="row mb-4 mt-md-5 mt-4 pt-md-0 pt-2 btn-wrap">
                                <?php if(!empty($book_ticket_link)){ ?>
                                <div class="col-md-6 mb-md-0 mb-2">
                                    <a href="<?php echo $book_ticket_link['url']; ?>" target="<?php echo $book_ticket_link['target']; ?>" class="button button-dark text-center w-100"><?php echo $book_ticket_link['title']; ?></a>
                                </div>
                                <?php } ?>
                                <?php if(!empty($email_us_link)){ ?>
                                <div class="col-md-6 mb-md-0 mb-2">
                                    <a href="<?php echo $email_us_link['url']; ?>" target="<?php echo $email_us_link['target']; ?>" class="bg-transparent button text-center w-100"><?php echo $email_us_link['title']; ?></a>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if(!empty($call_us_text)){ ?>
                            <p><?php echo _('Call');?> <a href="tel:<?php echo $call_us_text;?>"><?php echo $call_us_text;?></a><?php echo _('for further details or to join by phone');?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="benifit-box">
                            <?php if(!empty($benefit_box_title)){ ?>
                            <h5><?php echo $benefit_box_title;?></h5>
                            <?php } ?>
                            <?php if(!empty($benefit_box)){ 
                            echo $benefit_box;
                            } ?>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                    <div class="row row-wrp align-items-center">
                        <div class="col-md-6 mb-md-0 mb-3" data-aos="fade-up">
                            <div class="section-header">
                                <h6 class="subtitle mb-2"><?php echo $subtitle;?></h6>
                                <h4 class="title mb-4"><?php echo $title;?></h4>
                                <div class="sponser-detail">
                                    <div class="row justify-content-between mb-4">
                                        <div class="col-6">
                                            <label class="mb-0 fw-bold color-black"><?php echo _('Type');?></label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <label class="mb-0 fw-bold color-black"><?php echo _('Price');?></label>
                                        </div>
                                    </div>
                                    <?php if(!empty($type_data)) { 
                                    foreach($type_data as $value){ 
                                        $type_details  = $value['benefit_type_details']; 
                                        $price_details = $value['benefit_price_details'];?>
                                        <div class="data py-3 mb-3">
                                            <div class="row justify-content-between">
                                                <div class="col-3">
                                                    <span class="mb-0 color-black"><?php echo $type_details;?></span>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <span class="mb-0 color-black"><?php echo $price_details;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                                <div class="row mb-4 mt-4 pt-2 btn-wrap">
                                <?php if(!empty($book_ticket_link)){ ?>
                                    <div class="col-md-6 mb-md-0 mb-2">
                                        <a href="<?php echo $book_ticket_link['url']; ?>" target="<?php echo $book_ticket_link['target']; ?>" class="button button-dark text-center w-100"><?php echo $book_ticket_link['title']; ?></a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($email_us_link)){ ?>
                                    <div class="col-md-6 mb-md-0 mb-2">
                                        <a href="<?php echo $email_us_link['url']; ?>" target="<?php echo $email_us_link['target']; ?>" class="bg-transparent button text-center w-100"><?php echo $email_us_link['title']; ?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if(!empty($call_us_text)){ ?>
                                <p><?php echo _('Call');?> <a href="tel:<?php echo $call_us_text;?>"><?php echo $call_us_text;?></a><?php echo _('for further details or to join by phone');?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="benifit-box">
                            <?php if(!empty($benefit_box_title)){ ?>
                            <h5><?php echo $benefit_box_title;?></h5>
                            <?php } ?>
                            <?php if(!empty($benefit_box)){ 
                            echo $benefit_box;
                            } ?>
                            </div>
                        </div>
                    </div>
        <?php  }  
            }
         }
    
    ?>

        </div></section>