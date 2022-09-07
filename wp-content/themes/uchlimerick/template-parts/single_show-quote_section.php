<?php 
if(is_page()){
     $data = get_the_id();
}else{
    $data = 'option';
}
$choose_section = get_field('uchlimerick_quote_choose_section', $data);
$content        = get_field('quote_choose_section_content', $data);
$profile_img    = get_field('quote_choose_section_profile_image', $data);
$profile_title  = get_field('quote_choose_section_profile_title', $data);
$job_desciption = get_field('quote_choose_section_job_desciption', $data);
$Background_Image    = get_field('quote_choose_section_background_image', $data);
$background_image_mobile    = get_field('quote_choose_section_background_image_mobile', $data);
$Background_Color    = get_field('quote_choose_section_background_color', $data);
$section_mail    = get_field('quote_choose_section_mail', $data);
$section_numbe    = get_field('quote_choose_section_number', $data);
$section_title    = get_field('quote_choose_section_title', $data);

if($choose_section == 0 || $choose_section == 1 || $choose_section == 2 ){ ?>
<section class="testimoniyal" style="background-color:<?php echo $Background_Color;?>">
<?php if(!empty($Background_Image)){ ?>
    <div class="background-shape">
     <img src="<?php echo $Background_Image['url']; ?>" alt="" class="d-md-block d-none">
     <img src="<?php echo $background_image_mobile['url']; ?>" alt="" class="d-md-none d-block">
    </div>
<?php } ?>

    <div class="container-inner">
        <div class="testimona-cover">
            <div class="testimo-row">
                <?php if($choose_section == 2){ ?>
                    <div class="testi-content">
                    <h5><?php echo $content;?></h5>
                    <div class="duble-cort duble-cort-bot d-block d-lg-none d-md-none">

                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/unnamed-file-1.png" alt="bot-icon">
                    </div>
                </div>
               <?php  } else { ?>
                <div class="testi-content" style="color: #000;">
                    <h5><?php echo $content;?></h5>
                    <div class="duble-cort duble-cort-bot d-block d-lg-none d-md-none">

                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bot-q.png" alt="bot-icon">
                    </div>
                </div>
                <?php } ?>


                <?php if($choose_section == 0 || $choose_section == 2 ){ ?>
                <?php if ($choose_section == 0){
                        $c ="#701D45";
                 }else{
                        $c ="#FFC72C"; 
                  };?>
                <div class="img-namedes">
                    <?php if($profile_img != ""): ?><div class="test-img-cover"> <?php echo wp_get_attachment_image($profile_img['ID'], 'full'); ?></div><?php endif; ?>
                    <div class="per-name" style="color:<?php echo $c;?>;"> <h4><?php echo $profile_title;?></h4>
                        <p><?php echo $job_desciption;?></p></div>
                </div>
                <?php } else { ?>
                    <div class="img-namedes text-center">
                        <div class="per-name" style="color:#701D45;"> 
                            <h4><?php echo $profile_title;?></h4>
                            <p><?php echo $job_desciption;?></p>
                        </div>
                    </div>
                <?php } ?>

                <?php if($choose_section == 2){ ?>
                    <div class="duble-cort duble-cort-top">
   
                                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/unnamed-file.png" alt="top-icon">
                    </div>
                    <div class="duble-cort duble-cort-bot d-none d-lg-block d-md-block">
              
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/unnamed-file-1.png" alt="bot-icon">
                    </div>
                <?php  } else { ?>
                <div class="duble-cort duble-cort-top">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top-q.png" alt="top-icon">
                </div>
                <div class="duble-cort duble-cort-bot d-none d-lg-block d-md-block">  
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bot-q.png" alt="bot-icon">
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<?php }
if($choose_section == 3){ ?>
<section class="testimoniyal" style="background-color:<?php echo $Background_Color;?>;">
<?php if(!empty($Background_Image)){ ?>
    <div class="background-shape">
     <img src="<?php echo $Background_Image['url']; ?>" alt="" class="d-md-block d-none">
     <img src="<?php echo $background_image_mobile['url']; ?>" alt="" class="d-md-none d-block">
    </div>
<?php } ?>
<div class="container-inner">
        <div class="testi-content text-center">
        <h3><?php echo $section_title;?></h3>
         <h5><?php echo $content;?></h5>
         <div class="per-name" style="color: #FFC72C;"> 
         <a href="tel:+ <?php echo $section_numbe;?>">+ <?php echo $section_numbe;?></a>
        <a href="mailto:<?php echo $section_mail;?>"><?php echo $section_mail;?></a>
        </div>
    </div>
</section>
<?php }