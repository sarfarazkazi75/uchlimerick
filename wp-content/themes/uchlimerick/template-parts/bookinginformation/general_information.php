<section class="information-col-two information" data-aos="fade-up">
    <div class="container-inner">
        <div class="row">
            <?php if(have_rows('booking_fees_data')) { 
                while(have_rows('booking_fees_data')) { the_row(); 
                    $booking_fees_data_title = get_sub_field('booking_fees_data_title');
                    $booking_fees_data_desc = get_sub_field('booking_fees_data_desc'); 
                    $booking_fees_right_data_title = get_sub_field('booking_fees_right_data_title'); 
                    $booking_fees_data_right_desc = get_sub_field('booking_fees_data_right_desc'); 
                    $show_booking_fees_data_link = get_sub_field('show_booking_fees_data_link'); 
                    $booking_fees_data_link = get_sub_field('booking_fees_data_link'); 
            ?> 
                <div class="col-md-6">
                    <div class="information-block">
                        <?php if($booking_fees_data_title != ""): ?>
                            <div class="text-border-bottom">
                            <h5><?php echo $booking_fees_data_title; ?></h5>
                            </div>   
                        <?php endif; ?>    
                        <?php if($booking_fees_data_desc != ""): ?>
                            <div class="paragaraph-medium">
                            <?php echo $booking_fees_data_desc; ?>
                            </div>
                        <?php endif; ?>    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="information-block">
                        <?php if($booking_fees_right_data_title != ""): ?>
                            <div class="text-border-bottom">
                            <h5><?php echo $booking_fees_right_data_title; ?></h5>
                            </div> 
                        <?php endif; ?>     
                        <?php if($booking_fees_data_right_desc != ""): ?>         
                            <div class="paragaraph-medium">
                                <?php echo $booking_fees_data_right_desc; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($booking_fees_data_link != ""): ?>
                        <a href="<?php echo $booking_fees_data_link['url']; ?>" target=" <?php echo $booking_fees_data_link['url']; ?>" class="bg-transparent button"><?php echo $booking_fees_data_link['title']; ?></a>
                        <?php endif; ?>

                    </div>
                </div>
            <?php } 
            } ?>    
        </div>
    </div>
</section>
<section class="information information-top" data-aos="fade-up">
    <div class="container-inner">
    <div class="information-block">
    <div class="text-border-bottom">
    <h5>Booking Fees</h5>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <p><b class="pink-burgundy">*Standard Booking Fee:</b> €2.50 per ticket. (Booking fees include processing and service charges and are non-refundable)</p>
                <p><b class="pink-burgundy">Postage Fee:</b> €1.50 charge if post is chosen as delivery method (postage fees are non-refundable)</p>
                <p class="pink-burgundy">*Please note the above are “standard booking fees”. Some variations may apply. Please check event and booking fees at time of booking.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <ul>
                    <li>Online bookers will automatically receive an e-ticket at no extra cost</li>
                    <li>If booking in person or on the phone you can chose to receive an e-ticket at no extra cost</li>
                    <li>No booking fees apply if paying in person at the Box Office. However, some tickets may still be subject to a promoter fee</li>
                    <li>No booking fees apply for Groups of 10+</li>
                    <li>No booking fees apply for Friends of UCH</li>
                    <li>For further information on becoming a Friend of UCH please go to Play Your Part</li>
                    <li>With the exception of “Family” tickets for Panto, concession tickets are otherwise not available for sale online and must be purchased via the Box Office</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<section class="information" data-aos="fade-up">
    <div class="container-inner">
    <div class="information-block">
    <div class="text-border-bottom">
    <h5>Booking Fees</h5>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <ul>                 
                    <li>The University of Limerick is a smoke and vape free campus.</li>
                    <li>Please switch off all mobile phones during performances</li>
                    <li>Photography and video recording are strictly prohibited during performances</li>
                    <li>The management reserve the right to refuse admission</li>
                    <li>Admission to venue is by ticket and e-ticket only</li>
                    <li>Food and soft drinks are permitted in the Concert Hall, however, alcohol is not</li>
                    <li>We ask that all patrons respect other audience members.</li>
                    <li>Please keep movement and speech to a minimum during performances so as not to cause a disturbance</li>
        
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="paragaraph-medium">
                <p>For further information please go to</p>
                <p><b>Frequently Asked Questions</b></p>
                <p class="pb-30" >Please do not hesitate to ask a member of the UCH Front of House team for assistance at any stage during your visit. We are all happy to help!</p>
            </div>
            <a href="#" class="bg-transparent button">Frequently Asked Questions</a>
        </div>

    </div>
    </div>
    </div>
</section>
<section class="information-col-two information" data-aos="fade-up">
<div class="container-inner">
    <div class="row">
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5>Your Online Account</h5>
            </div>
            
            <div class="paragaraph-medium">
                <p>You can book tickets online <a href="#"class="link">HERE</a></p>
                <p>Please click HERE to log in to Your Account (from here you can check your future bookings, forward tickets to friends, download tickets or access them for scanning).</p>
                <p class="pb-30" >Please do not hesitate to ask a member of the UCH Front of House team for assistance at any stage during your visit. We are all happy to help!</p>
            </div>
            <a href="#" class="bg-transparent button">Log in My Account</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5>Group Bookings</h5>
            </div>
            
            <div class="paragaraph-medium">
                <p><b>Group bookers can sometimes avail of concession rates.</b></p>
                <p>Please contact the Box Office on support@uch.ie directly to make enquiries or if you would like to be kept up to date on events as a booker for groups / Sports & Social clubs etc.</p> 
            </div>
            <a href="#" class="bg-transparent button">Contact Us</a>
        </div>
    </div>
    </div>
</div>
</section>
<section class="information-col-two information" data-aos="fade-up">
<div class="container-inner">
    <div class="row">
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5>General Information</h5>
            </div>
            
            <div class="paragaraph-medium">
                <p>UCH are not currently offering a collection service from the Box Office. Tickets will be issued as e-tickets or can be posted</p>
                <p>Once purchased, tickets cannot be exchanged or refunded. If the show is Sold Out, however, please contact the Box Office and the team will endeavour to sell on your tickets for you. Additional charges may apply</p>
                <p>An e-ticket can be e-mailed to you, even if booking by phone/in person</p>
                <p>Please note wheelchair and companion spaces can only be booked via the Box Office and are not available for sale online. For further information please go to Accessibility
For any further information please contact the on support@uch.ie/ 061 331549</p>
            </div>
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="information-block">
            <div class="text-border-bottom">
            <h5>Data Protection</h5>
            </div>
            
            <div class="paragaraph-medium">
                <p>When you book tickets with University Concert Hall, your details will be held on our database in order to process your booking and to facilitate future bookings. From time to time, we may send you information about University Concert Hall and its programme of events, but only if you have agreed to receive this at time of booking.</p>
                <p>If you currently receive information, but would now like to Opt Out, please click the Opt Out link at the bottom of e-mails received from us, or please contact the UCH Box Office at 061 331549 and a member of the team will change your contact status on our system.
</p> 
                <p>If you don’t currently receive information, but would like to, please use the Newsletter Sign Up form, which is located towards the bottom of the Home page of this website.</p>
                <p>Please click UCH Privacy Policy for full details.</p>
            </div>
            <a href="#" class="bg-transparent button">Privacy Policy</a>
        </div>
    </div>
    </div>
</div>
</section>
<section class="information information-bottom" data-aos="fade-up">
    <div class="container-inner">
    <div class="information-block">
    <div class="text-border-bottom">
    <h5>Booking Fees</h5>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="paragaraph-medium">
                <p>UCH are not currently offering a collection service from the Box Office. Tickets will be issued as e-tickets or can be posted</p>
                <p>Once purchased, tickets cannot be exchanged or refunded. If the show is Sold Out, however, please contact the Box Office and the team will endeavour to sell on your tickets for you. Additional charges may apply</p>
                <p>An e-ticket can be e-mailed to you, even if booking by phone/in person</p>
                <p>Please note wheelchair and companion spaces can only be booked via the Box Office and are not available for sale online. For further information please go to Accessibility<br>
For any further information please contact the on support@uch.ie/ 061 331549</p>
            </div>
            
        </div>

    </div>
    </div>
    </div>
</section>