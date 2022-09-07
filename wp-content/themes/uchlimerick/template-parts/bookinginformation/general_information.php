<section class="information information-top information-top" >
    <div class="container-inner">
        <div class="row">
            <?php if(have_rows('booking_fees_data')) { 
                $temp = 0;
                while(have_rows('booking_fees_data')) { the_row(); 
                    $booking_fees_data_title = get_sub_field('booking_fees_data_title');
                    $booking_fees_data_desc = get_sub_field('booking_fees_data_desc'); 
                    $booking_fees_right_data_title = get_sub_field('booking_fees_right_data_title'); 
                    $booking_fees_data_right_desc = get_sub_field('booking_fees_data_right_desc'); 
                    $show_booking_fees_data_link = get_sub_field('show_booking_fees_data_link'); 
                    $booking_fees_data_link = get_sub_field('booking_fees_data_link'); 
                    if($temp == 0 || $temp == 1){ ?>
                            <div class="col-md-12 information"  data-aos="fade-up">
                                <div class="information-block">
                                    <div class="text-border-bottom">
                                    <h2><?php echo $booking_fees_data_title; ?></h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"  >
                                            <div class="paragaraph-medium">
                                               <?php echo $booking_fees_data_desc; ?>  
                                            </div>
                                        </div>
                                        <div class="col-md-6"  >
                                            <div class="paragaraph-medium">
                                                <p><?php echo $booking_fees_right_data_title; ?></p>
                                                <p><?php echo $booking_fees_data_right_desc; ?></p>
                                            </div>
                                            <?php if($show_booking_fees_data_link == 1){ ?>
                                            <a href="<?php echo $booking_fees_data_link['url'];?>" target="<?php echo $booking_fees_data_link['target'];?>" class="bg-transparent button"><?php echo $booking_fees_data_link['title'];?></a>
                                            <?php } ?>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                    <?php  $temp++; } else { ?>
                                <div class="col-md-6 information"  data-aos="fade-up">
                                <div class="information-block">
                                        <div class="text-border-bottom">
                                        <h2><?php echo $booking_fees_data_title; ?></h2>
                                        </div>
                                        
                                        <div class="paragaraph-medium">
                                             <?php echo $booking_fees_data_desc; ?>
                                        </div>
                                        <div class="paragaraph-medium">
                                            <p class="p1"><b><?php echo $booking_fees_right_data_title; ?></b></p>
                                            <p><?php echo $booking_fees_data_right_desc; ?></p>
                                        </div>
                                        <?php if($show_booking_fees_data_link == 1){ ?>
                                            <a href="<?php echo $booking_fees_data_link['url'];?>" target="<?php echo $booking_fees_data_link['target'];?>" class="bg-transparent button"><?php echo $booking_fees_data_link['title'];?></a>
                                         <?php } ?>
                                    </div>
                               </div>
                    <?php  $temp++;
                            if($temp == 6){
                                $temp = 0;
                            }
                            // print_r($temp);
                        } //end else
                } 
            } ?>    
        </div>
    </div>
</section>

