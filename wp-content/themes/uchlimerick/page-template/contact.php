<?php  /* Template Name: Contact */
get_header();
$address      = get_field('address'); 
$address_link = get_field('address_link'); 
$phone_number = get_field('phone_number'); 
$email        = get_field('email'); 
$office_hours = get_field('office_hours');
$contact_email_title = get_field('contact_email_title'); 
$map_frame = get_field('map_frame');
$open_in_google_maps = get_field('open_in_google_maps'); ?>
<section class="map-sec contact">
    <div class="container-inner">
        <div class="row align-items-center">
            <div class="col-xl-5 col-md-6 mb-md-0 mb-4 pb-md-0 pb-2">
                <ul class="d-md-block">
                    <li>
                        <?php if($address != ""): ?><a href="<?php echo $address_link; ?>" target="blank">
                        <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/map-wine.svg" alt=""></span>
                        <span class="text"><b><?php echo _('Address');?></b><br><p><?php echo $address; ?></p></a></span><?php endif; ?>
                    </li>
                    <li>
                        <?php if($phone_number != ""): ?><a href="tel:<?php echo $phone_number; ?>">
                        <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.svg" alt=""></span>
                        <span class="text"><b><?php echo _('Phone');?></b><br><p><?php echo $phone_number; ?></p></a></span><?php endif; ?>
                    </li>
                    <li>
                        <?php if($email != ""): ?><a href="mailto:<?php echo $email; ?>">
                        <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt=""></span>
                        <span class="text"><b><?php echo _('Email');?></b><br><p><?php echo $email; ?></p></a></span><?php endif; ?>
                    </li>
                    <li><a href="javascript:void(0)">
                        <?php if($office_hours != ""): ?>
                        <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/access-time.svg" alt=""></span>
                        <span><b><?php echo _('Box Office Hours');?></b><br><p><?php echo $office_hours;?></p></span></a><?php endif; ?>
                    </li>
                </ul>
                <div class="contact-email">
                    <div class="contact-email-title">
                    <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt=""></span>
                    <span><b><?php echo $contact_email_title; ?></b></a></span>
                    </div>
                    <div class="row">
                        <?php if(have_rows('contact_emails')) { 
                            while(have_rows('contact_emails')) { the_row(); 
                            $contact_title = get_sub_field('contact_title');
                            $contact_mail = get_sub_field('contact_mail'); 
                            $contact_phone = get_sub_field('contact_phone'); ?> 
                            <div class="col-md-6 contact-email-col">
                                <p class="pink-burgundy"><?php echo $contact_title; ?></p>
                                <a href="mailto:<?php echo $contact_mail; ?>"><?php echo $contact_mail;?></a>
                                <a href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
                            </div> 
                        <?php } 
                        } ?>  
                    </div>
                </div>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="embed-responsive embed-responsive-1by1"><?php echo $map_frame; ?></div>
                <a href="<?php echo $open_in_google_maps;?>" target="blank" class="button button-dark text-center d-md-none mt-2"><?php echo _('Open in Google Maps');?></a>
            </div>
        </div>
    </div>
</section>
<?php  get_template_part( 'template-parts/flex', 'venue_hire_section' ); 
       get_template_part( 'template-parts/flex', 'newsletter_section' ); 
       get_footer(); ?>