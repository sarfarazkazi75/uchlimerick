<section class="become-ofc">
    <div class="container-inner">
        <?php $benefit_list = get_field('benefit_list'); ?>
        <div class="row row-wrp align-items-center">
            <div class="col-md-6 mb-md-0 mb-3" data-aos="fade-up">
                <div class="section-header">
                    <h6 class="subtitle mb-2"><?php echo $benefit_list['benefit_title'] ;?></h6>
                    <h4 class="title mb-md-3 mb-4"><?php echo $benefit_list['benefit_subtitle'] ;?></h4>
                    <div class="d-md-block d-none">
                        <?php echo $benefit_list['benefit_content'] ;?>
                    </div>
                    <div class="sponser-detail d-md-none">
                        <div class="row justify-content-between mb-md-4 mb-3">
                            <div class="col-6">
                                <label class="mb-0 fw-bold color-black"><?php echo $benefit_list['benefit_type'] ;?></label>
                            </div>
                            <div class="col-6 text-right">
                                <label class="mb-0 fw-bold color-black"><?php echo $benefit_list['benefit_price'] ;?></label>
                            </div>
                        </div>
                        <?php
                            $repeaters = $benefit_list['benefit_type_data'];
                            foreach($repeaters as $repeater) {
                                ?>
                                    <div class="data py-3 mb-3">
                                        <div class="row justify-content-between">
                                            <div class="col-3">
                                                <span class="mb-0 color-black"><?php echo $repeater["benefit_type_details"]; ?></span>
                                            </div>
                                            <div class="col-9 text-right">
                                                <span class="mb-0 color-black"><?php echo $repeater["benefit_price_details"];?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                
                            }
                        ?>
                    </div>
                    <div class="row mb-4 mt-md-5 mt-4 pt-md-0 pt-2 btn-wrap">
                        <div class="col-md-6 mb-md-0 mb-2">
                            <a href="<?php echo $benefit_list['book_ticket_link']['url'] ;?>" class="button button-dark text-center w-100"><?php echo $benefit_list['book_ticket_link']['title'] ;?></a>
                        </div>
                        <div class="col-md-6 mb-md-0 mb-2">
                            <a href="<?php echo $benefit_list['email_us_link']['url'] ;?>" class="bg-transparent button text-center w-100"><?php echo $benefit_list['email_us_link']['title'] ;?></a>
                        </div>
                    </div>
                    <p>Call <a href="tel:<?php echo $benefit_list['call_us_link'] ;?>"><?php echo $benefit_list['call_us_link'] ;?></a> for further details or to join by phone</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <div class="benifit-box">
                    <?php echo $benefit_list['benefit_box'] ;?>
                </div>
            </div>
        </div>

        <?php $benefit_data = get_field('benefit_data'); ?>
        <div class="row row-wrp align-items-center">
            <div class="col-md-6 mb-md-0 mb-3" data-aos="fade-up">
                <div class="section-header">
                    <h6 class="subtitle mb-2"><?php echo $benefit_data['benefit_title'] ;?></h6>
                    <h4 class="title mb-4"><?php echo $benefit_data['benefit_subtitle'] ;?></h4>
                    <div class="sponser-detail">
                        <div class="row justify-content-between mb-4">
                            <div class="col-6">
                                <label class="mb-0 fw-bold color-black"><?php echo $benefit_data['benefit_type'] ;?></label>
                            </div>
                            <div class="col-6 text-right">
                                <label class="mb-0 fw-bold color-black"><?php echo $benefit_data['benefit_price'] ;?></label>
                            </div>
                        </div>
                        <?php
                            $repeaters = $benefit_data['benefit_type_data'];
                            foreach($repeaters as $repeater) {
                                ?>
                                    <div class="data py-3 mb-3">
                                        <div class="row justify-content-between">
                                            <div class="col-3">
                                                <span class="mb-0 color-black"><?php echo $repeater["benefit_type_details"]; ?></span>
                                            </div>
                                            <div class="col-9 text-right">
                                                <span class="mb-0 color-black"><?php echo $repeater["benefit_price_details"];?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                
                            }
                        ?>
                    </div>
                    <div class="row mb-4 mt-4 pt-2 btn-wrap">
                        <div class="col-md-6 mb-md-0 mb-2">
                            <a href="<?php echo $benefit_data['book_ticket_link']['url'] ;?>" class="button button-dark text-center w-100"><?php echo $benefit_data['book_ticket_link']['title'] ;?></a>
                        </div>
                        <div class="col-md-6 mb-md-0 mb-2">
                            <a href="<?php echo $benefit_data['email_us_link']['url'] ;?>" class="bg-transparent button text-center w-100"><?php echo $benefit_data['email_us_link']['title'] ;?></a>
                        </div>
                    </div>
                    <p>Call <a href="tel:<?php echo $benefit_data['call_us_link'] ;?>"><?php echo $benefit_data['call_us_link'] ;?></a> for further details or to join by phone</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <div class="benifit-box">
                    <?php echo $benefit_data['benefit_box'] ;?>
                </div>
            </div>
        </div>
    </div>
</section>