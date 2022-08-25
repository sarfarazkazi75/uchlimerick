<section class="information-top" data-aos="fade-up">
    <div class="container-inner">
        <div class="row">
            <?php
            if (have_rows('accessibility_information')) {
                $temp = 0;
                while (have_rows('accessibility_information')) {
                    the_row();
                    $accessibility_image     = get_sub_field('accessibility_image');
                    $accessibility_title     = get_sub_field('accessibility_title');
                    $accessibility_content   = get_sub_field('accessibility_content');
                    $show_accessibility_link = get_sub_field('show_accessibility_link');
                    $accessibility_link      = get_sub_field('accessibility_link');
                    $first_class= "";
                    if(get_row_index() != 1){
                        $first_class="image-left";
                    } 
                    if($temp == 0){ ?>
                            <div class="col-md-12 information <?php echo $first_class; ?>">
                                <div class="information-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-border-bottom">
                                            <h5><?php echo $accessibility_title; ?></h5>
                                        </div>
                                        <div class="paragaraph-medium">
                                            <p><?php echo $accessibility_content; ?></p>
                                        </div>
                                        <?php if($show_accessibility_link == 1){ ?>
                                        <a href="<?php echo $accessibility_link['url'];?>" target="<?php echo $accessibility_link['target'];?>" class="bg-transparent button"><?php echo $accessibility_link['title'];?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                    <?php echo wp_get_attachment_image($accessibility_image['ID'], 'full','',array('class'=>'')); ?>
                                    </div>
                                </div>
                                </div>
                            </div>

                 <?php  $temp++; } else { ?>
                             <div class="col-md-6 information">
                                <div class="information-block">
                                  <?php echo wp_get_attachment_image($accessibility_image['ID'], 'full','',array('class'=>'')); ?>
                                    <div class="text-border-bottom">
                                        <h5><?php echo $accessibility_title; ?></h5>
                                    </div>
                                    <div class="paragaraph-medium">
                                        <p><?php echo $accessibility_content; ?></p>
                                    </div>
                                    <?php if($show_accessibility_link == 1){ ?>
                                    <a href="<?php echo $accessibility_link['url'];?>" target="<?php echo $accessibility_link['target'];?>" class="bg-transparent button"><?php echo $accessibility_link['title'];?></a>
                                    <?php } ?>
                                </div>
                            </div>

               <?php  $temp++;
                      if($temp == 3){
                         $temp = 0;
                      }
                     // print_r($temp);
                  } //end else
                   
                }
            }
            ?>
        </div>
    </div>
</section>

