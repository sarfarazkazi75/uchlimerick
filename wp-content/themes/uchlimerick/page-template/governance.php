<?php /*Template Name: Governance */
   get_header();    
?>
<section class="governance-main-wrapper">
    <div class="container-inner">
        <div class="governance-main-cover">
            <?php if(have_rows('governance_menu')) { ?>  
                <?php while(have_rows('governance_menu')) { the_row();    
                    $governance_menu_title = get_sub_field('governance_menu_title');
                    $governance_menu_link = get_sub_field('governance_menu_link');  ?>   
                    <div class="governance-main-row">
                        <?php if($governance_menu_title != ""): ?><h5><?php echo $governance_menu_title; ?></h5><?php endif; ?>
                        <?php if($governance_menu_link != ""): ?><a href="<?php echo $governance_menu_link['url'];?>" target="<?php echo $governance_menu_link['target'];?>" class="button bg-transparent"><?php echo $governance_menu_link['title'];?></a><?php endif; ?>
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