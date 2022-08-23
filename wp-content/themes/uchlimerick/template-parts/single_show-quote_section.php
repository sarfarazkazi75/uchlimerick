<?php 
if(is_page()){
     $data = get_the_id();
}else{
    $data = 'option';
}
$choose_section = get_field('uchlimerick_quote_choose_section', $data);
$content        = get_field('quote_choose_section_content', $data);
$profile_img    = get_field('quote_choose_section_profile_image', $data);
$profile_des    = get_field('quote_choose_section_profile_titlejob_desciption', $data);

if($choose_section == 0 || $choose_section == 1 ){ ?>
<section class="testimoniyal" style="background-color:#E7E9EC;">
    <div class="container-inner">
        <div class="testimona-cover">
            <div class="testimo-row">
                <div class="testi-content" style="color: #000;">
                    <h5><?php echo $content;?></h5>
                    <div class="duble-cort duble-cort-bot d-block d-lg-none d-md-none">
                        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/bot-q.png"alt="bot-icon">
                    </div>
                </div>
                <?php if($choose_section == 0){ ?>
                <div class="img-namedes">
                    <div class="test-img-cover"> <?php echo wp_get_attachment_image($profile_img['ID'], 'full'); ?></div>
                    <div class="per-name" style="color: #701D45;"><?php echo $profile_des;?></div>
                </div>
                <?php }else{ ?>
                    <div class="img-namedes text-center">
                        <div class="per-name" style="color: #701D45;"> <?php echo $profile_des;?> </div>
                    </div>
                <?php } ?>
                <div class="duble-cort duble-cort-top">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/top-q.png"alt="top-icon">
                </div>
                <div class="duble-cort duble-cort-bot d-none d-lg-block d-md-block">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/bot-q.png"alt="bot-icon">
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
if($choose_section == 2){ ?>
<section class="testimoniyal" style="background-image:url('https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/dark-gold-design.png'); background-color:#343a40; ">
    <div class="container-inner">
        <div class="testimona-cover">
            <div class="testimo-row">
                <div class="testi-content">
                    <h5><?php echo $content;?></h5>
                    <div class="duble-cort duble-cort-bot d-block d-lg-none d-md-none">
                        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/unnamed-file-1.png" alt="bot-icon">
                    </div>
                </div>
                <div class="img-namedes">
                    <div class="test-img-cover">
                        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Ellipse-1.png" alt="">
                    </div>
                    <div class="per-name"><?php echo $profile_des;?></div>
                </div>
                <div class="duble-cort duble-cort-top">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/unnamed-file.png" alt="top-icon">
                </div>
                <div class="duble-cort duble-cort-bot d-none d-lg-block d-md-block">
                    <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/unnamed-file-1.png" alt="bot-icon">
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
if($choose_section == 3){ ?>
<section class="testimoniyal" style="background-image:url('https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/dark-gold-design.png'); background-color:#343a40;">
    <div class="container-inner">
        <div class="testi-content text-center">
            <?php echo $content;?>
        </div>
    </div>
</section>
<?php }