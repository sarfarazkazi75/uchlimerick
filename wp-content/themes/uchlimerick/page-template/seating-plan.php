<?php /* Template Name: Seating plan */ 

    get_header();

    $seating_plan_content = get_field('seating_plan_content');
    $seating_plan_image = get_field('seating_plan_image');
?>

<section class="seat-plan">
    <div class="container-inner">
    <div class="row ">
        <div class="col-md-5">
            <?php echo $seating_plan_content ;?>
        </div>
        <div class="col-md-7 light-box-image">
            <a data-fancybox href="<?php echo $seating_plan_image['url'] ;?>">
                <img class="fancybox-img" src="<?php echo $seating_plan_image['url'] ;?>" alt="">
            </a>
        </div>
    </div>
    </div>
</section>
<?php 
   get_template_part('template-parts/flex', 'helpful_resource');  
   get_template_part('template-parts/flex', 'highlights');  
   get_template_part('template-parts/flex', 'newsletter_section'); 
   get_footer();
?>