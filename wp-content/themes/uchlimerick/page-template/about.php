<?php /*Template Name: About Page */
get_header(); 
if(class_exists('acf')){
    $about_con=get_field('uchlimerick_page_about_content',get_the_id());
}
if(!empty($about_con)){ 
   foreach($about_con as $key=>$val){
       $title = $val['inner_title'];
       $con   = $val['inner_content'];
       $img   = $val['inner_image'];
       $classs='';
       $padding_class='';
       $outer_class_1= '';
       $outer_class_2= '';
       if($key % 2 == 0){
       $classs='colpe-left';
       $outer_class_1= '';
       $outer_class_2= '';
       }else{
        $classs='colps-right';
        $outer_class_1= 'order-lg-2';
        $outer_class_2= 'order-lg-1';
        }
        if($key == 1){
            get_template_part( 'template-parts/single_show', 'quote_section' ); //Quote component
        }
        if($key == 0){
            $padding_class= "section-bottom-padding";
        }
        ?>
        <section class="about-two-colum-section pt-100 <?php echo $padding_class;?>">
        <div class="container-inner">
            <div class="row align-items-center">
                <div class="col-lg-6 <?php echo $outer_class_1;?> order-1 ">
                    <div class="about-two-col-left-col <?php echo $classs;?>">
                            <?php if(!empty($title)){ ?>
                            <h4 class="text-border-bottom"><?php echo $title;?></h4>
                            <?php } ?>
                            <?php if(!empty($con)){
                                echo $con;
                            }?>
                       </div>
                </div>
                <?php if(!empty($img)){ ?>
                <div class="col-lg-6 <?php echo $outer_class_2;?> order-2">
                    <div class="about-two-col-right-img">
                        <?php echo wp_get_attachment_image($img['ID'], 'full','',array('class'=>'')); ?>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
       </section>
  <?php 
  }
} ?>
<?php 
get_template_part( 'template-parts/flex', 'venue_hire_section' ); 
get_template_part( 'template-parts/flex', 'newsletter_section' );
get_footer(); ?>
    

