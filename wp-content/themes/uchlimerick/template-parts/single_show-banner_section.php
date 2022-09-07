<?php
global $post;
$show_id     	              = get_the_id();

    $attachment_urls = get_post_meta($show_id,'attachments_urls',TRUE);
	$feature_img 	              = get_the_post_thumbnail_url($show_id);
	if(empty($feature_img)){
		if(isset($attachment_urls[0])){
			$feature_img = $attachment_urls[0];
		}
		else{
			$feature_img = get_template_directory_uri().'/assets/images/fallback-Image-2.png';
        }
    }
	
	$show_title  	              = get_the_title($show_id);
	$mobile_img  	              = get_field('uchlimerick_post_show_mobile_img',$show_id);
	$ticket      	              = get_field('uchlimerick_post_show_ticket',$show_id);
	$book_ticket                  = get_field('uchlimerick_post_show_book_ticket_link',$show_id);
    $show_date1                    = get_field('uchlimerick_post_show_date',$show_id); 
    //social
    $sb_url      = urlencode(get_permalink());
    $sb_title    = str_replace( ' ', '%20', get_the_title());
    $twitterURL  = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=Crunchify';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;
    $events = get_post_meta( $post->ID, 'events', TRUE );
    $price_obj=$event_prices = array();
    if ( $events ) {
        $event = isset( $events[0] ) ? $events[0] : [];
        if ( $event ) {
            $event_id      = $event['ID'];
            $transient_key = $event_id . '_' . $show_id;
            $eventObj      = get_transient( $transient_key );
            $show_date     = date( 'l jS F Y', strtotime( $eventObj['date_time'] ) );
            $show_date_link     = date('Ymd\THis',strtotime($eventObj['date_time']));
	        $enddate = date('Ymd\THis',strtotime($show_date_link . ' + 2 hours'));
            $book_ticket = $eventObj['url'];
            $ticket = $eventObj['available'];
        }
    }
    ?>
<!-- individual hero section  -->
<section class="page-banner individ-hero">
	<?php if(!empty($feature_img)){ ?>
         <img src="<?php echo $feature_img;?>" alt="" class="d-md-block img-100">
	<?php } ?>
	<?php if(!empty($mobile_img)){ ?>
         <img src="<?php echo $mobile_img['url'];?>" alt=""class="d-md-none img-100">
	<?php } ?>
    <div class="individual-socail">
        <div class="container-inner">
            <div class="socail-icon">   
                <ul>
                    <p><?php echo _('SHARE');?></p>
                    <li><a href="<?php echo $twitterURL;?>" target="blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="<?php echo $linkedInURL;?>" target="blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="<?php echo $facebookURL;?>" target="blank"><i class="fa-brands fa-facebook-f"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-banner-text">
        <div class="container-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title">
                        <p class="small-yellow"><?php echo _('UCH presents');?></p>
                        <h3><?php echo $show_title;?></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-book-box">
                        <div class="date-book ">
                            <div class="indi-destail">
							    <?php if(!empty($show_date)){ ?>
									<div class="des-text">
										<p class="small-yellow">
										<?php echo _('Date:');?></p><br>
										<span><?php echo $show_date;?></span>
									</div>
								<?php } ?>
								<?php if(!empty($ticket)){ ?>
                                <div class="des-text">
                                    <p class="small-yellow"><?php echo _('Ticket:');?></p><br>
                                    <span><?php echo $ticket;?></span>
                                </div>
								<?php } ?>
                            </div>
                            <div class="indi-cta">
							<?php if(!empty($book_ticket)){ ?>
                                <a href="<?php echo $book_ticket;?>" class="button button-dark me-15"><?php echo _e('Book Now','uchlimerick');?></a>
							<?php } ?>
                                <a href="<?php echo 'https://calendar.google.com/calendar/u/0/r/eventedit?text='.$show_title.'&dates='.$show_date_link.'/'.$enddate ?>" class="button-light button"><?php echo _('Add to Calendar');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>