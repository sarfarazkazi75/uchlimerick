
<?php 
/*Template Name: board of directors */
get_header();
$board_title   = get_field('board_title');
$board_details  = get_field('board_details'); ?>
<section class="board-directors-wrapper">
    <div class="board-bg-image" data-aos="fade-left">
        <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Vector-10.png" alt="">
    </div>
    <div class="container-inner">
        <div class="board-directors-header">
            <h5><?php echo $board_title= !empty($board_title) ? $board_title : '';?></h5>
            <?php if( $board_details ): ?><?php echo $board_details; ?><?php endif; ?>
        </div>
        <div class="row">
            <?php if(have_rows('directors_details')) { ?>   
                <?php while(have_rows('directors_details')) { the_row();
                    $directors_image = get_sub_field('directors_image');  
                    $directors_name  = get_sub_field('directors_name');  
                    $directors_description = get_sub_field('directors_description'); ?>  
                    <div class="col-md-6">
                        <div class="board-directors-column">
                            <div class="directors-profile">
                                <?php if( $directors_image ): ?><img src="<?php echo $directors_image['url']; ?>" alt=""><?php endif; ?>
                            </div>
                            <div class="directors-details">
                               <?php if( $directors_name ): ?><h6 class="text-border-bottom"><?php echo $directors_name; ?></h6><?php endif; ?>
                               <?php if( $directors_description ): ?><?php echo $directors_description; ?><?php endif; ?>
                            </div>
                        </div>
                    </div>                   
                <?php } ?>                                                         
            <?php } ?>  
        </div>
    </div>
</section>
<?php
    get_template_part( 'template-parts/flex', 'newsletter_section' ); 
    get_footer();
?>