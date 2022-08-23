<?php

$show_id     	              = get_the_id();
$show_content  	              = get_the_content($show_id);
$show_date                    = get_field('uchlimerick_post_show_date',$show_id);
$show_time                    = get_field('uchlimerick_post_show_time',$show_id);
/*$show_full_price              = get_field('uchlimerick_post_show_full_price',$show_id);
$show_consession              = get_field('uchlimerick_post_show_consession',$show_id);
$show_student_price           = get_field('uchlimerick_post_show_student_price',$show_id);
$show_friend_price            = get_field('uchlimerick_post_show_friend_price',$show_id);*/
$show_age_restriction         = get_field('uchlimerick_post_show_age_restriction',$show_id);
$show_covid19_other_faq       = get_field('uchlimerick_post_show_covid19_other_faq',$show_id);
$show_brochure_programme_fill = get_field('uchlimerick_post_show_brochure_programme_file',$show_id);
$show_tag_add                 = get_field('uchlimerick_post_show_tag_add',$show_id);

global $post;
$events = get_post_meta( $post->ID, 'events', TRUE );
$price_obj=$event_prices = array();
if ( $events ) {
    $event = isset( $events[0] ) ? $events[0] : [];
    if ( $event ) {
        $event_id            = $event['ID'];
        $transient_key = $event_id.'_'.$show_id;
        if(empty(get_transient($transient_key))){
            $import_property_url = 'https://uch.ticketsolve.com/shows/1173630311/events/' . $event_id . '.xml';
            $response            = wp_remote_get( $import_property_url );
            $body                = wp_remote_retrieve_body( $response );
            $xml = new SimpleXMLElement( $body, LIBXML_NOCDATA );
            $json = json_encode( $xml );
            $eventObj = json_decode( $json,TRUE );
            set_transient($transient_key,$eventObj,HOUR_IN_SECONDS);
        }
        $eventObj = get_transient($transient_key);
        $show_date = date('l jS F Y',strtotime($eventObj['date_time']));
        $show_time = date('g:i a',strtotime($eventObj['date_time']));
        $status = $eventObj['status'];
        $available = $eventObj['available'];
        $capacity = $eventObj['capacity'];
        $price_obj= $eventObj['prices']['price'];
        if (count($price_obj) == count($price_obj, COUNT_RECURSIVE)){
            $event_prices[] =$price_obj;
        }
        else{
            $event_prices = $price_obj;
        }
    }
}

?>
<!-- About section  -->
<section class="about-inner">
    <div class="container-inner">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="about-price-list">
                    <h4>About</h4>
                    <ul>
					   <?php if(!empty($show_date)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Date:');?></span> <?php echo $show_date;?></a>
                        </li>
						<?php } ?>
						<?php if(!empty($show_time)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Time:');?></span><?php echo __('Venue Doors: '). $show_time;?></a>
                        </li>
						<?php } ?>
                        <?php
                        if($event_prices){
                            foreach ($event_prices as $price){
                                ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/euro-symbol.svg"
                                         alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo $price['type'].':&nbsp;' ;?></span>€<?php echo $price['selling_price'] ;?></a>
                                </li>
                                <?php
                            }
                        }
                        /*
                        ?>
                        
						<?php if(!empty($show_full_price)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/euro-symbol.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Full Price:');?></span><?php echo $show_full_price;?></a>
                        </li>
						<?php } ?>
						<?php if(!empty($show_consession)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/euro-symbol.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Concession:');?></span><?php echo $show_consession;?></a>
                        </li>
						<?php } ?>
      
						<?php if(!empty($show_student_price)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/euro-symbol.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Student Price:');?></span><?php echo $show_student_price;?></a>
                        </li>
						<?php } ?>
						<?php if(!empty($show_friend_price)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/euro-symbol.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Friends Price:');?></span><?php echo $show_friend_price;?> </a>
                        </li>
						<?php }
                        */
                        ?>
						<?php if(!empty($show_age_restriction)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('Age Restriction:');?></span><?php echo $show_age_restriction;?> </a>
                        </li>
						<?php } ?>
						<?php if(!empty($show_covid19_other_faq)){ ?>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mask-icon.svg"
                                alt="phone-icon"><a href="javascript:void(0)"> <span><?php echo _('COVID-19 & Other FAQ:');?></span> <a href="<?php echo $show_covid19_other_faq['url'];?>" class="clic-link">
                                <?php echo $show_covid19_other_faq['title'];?></a>
                            </a>
                        </li>
						<?php } ?>

                    </ul>
					<?php if(!empty($show_brochure_programme_fill)){ ?>
                    <a href="<?php echo $show_brochure_programme_fill['url'];?>" download="Brochure Programme" class="bg-transparent button"><?php echo $show_brochure_programme_fill['title'];?></a>
					<?php } ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 offset-lg-2">
                <div class="about-price-des-right">

                <ul class="btn-grup">
                       <?php if(!empty($show_tag_add)){
						   foreach($show_tag_add as $val){
							   $toggle	= $val['show_onoff_tag'];
							   $color	= $val['show_tag_color'];
							   $icon	= $val['show_tag_icon'];
							   $link	= $val['show_tag_link']; ?>
                               <?php if($toggle == 1){ ?>
							     <li><a href="<?php echo $link['url'];?>" class="btn-1" style="background-color :<?php echo $color = !empty($color) ? $color : '#cf820e';?>">
								 <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
								 <?php echo $link['title'];?></a>
								</li>
						 <?php  } }
					     }  ?>
                    </ul>
                    <div class="btn-event-des">
                        <p><?php echo $show_content;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>